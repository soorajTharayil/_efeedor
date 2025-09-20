<?php defined('BASEPATH') or exit('No direct script access allowed');



class Isr_opt_model_weekly extends CI_Model
{

	private $table = 'tickets_esr';

	//keep
	public function key_highlights2($table_patients, $table_feedback, $sorttime, $setup, $totalFeedbackList)
	{
		$question_list_parent = $this->setup_result($setup);
		$question_list_reasons = $this->setup_sub_result($setup);

		$feedback_data = $totalFeedbackList;

		// Preprocess feedback data to decode the dataset only once
		$processed_feedback = [];
		foreach ($feedback_data as $row) {
			$processed_feedback[] = [
				'dataset' => json_decode($row->dataset, true),
			];
		}

		// Prepare parent data
		$set = [];
		foreach ($question_list_parent as $row) {
			$key = $row->shortkey;
			$shortname = $row->shortname;

			$totals = $this->calculate_parent_feedback($key, $processed_feedback);

			$set[] = [
				'parent_param' => $shortname,
				'parent_percentage' => $totals['percentage'],
				'shortkey' => $key,
			];
		}

		// Prepare sub-reasons data
		$set1 = [];
		foreach ($question_list_reasons as $row2) {
			$key = $row2->shortkey;
			$shortname = $row2->shortname;

			$total = $this->calculate_sub_feedback($key, $processed_feedback);

			$set1[] = [
				'sub_param' => $shortname,
				'sub_count' => $total,
				'shortkey' => $key,
			];
		}

		return [
			'parent' => $set,
			'sub' => $set1,
		];
	}

	private function calculate_parent_feedback($key, $feedback)
	{
		$total = 0;
		$total_incidence = 0;

		foreach ($feedback as $row) {
			$dataset = $row['dataset'];
			if (isset($dataset[$key]) && $dataset[$key] > 0) {
				$total_incidence++;
				$total += $dataset[$key];
			}
		}

		$percentage = $total_incidence > 0
			? round(($total / ($total_incidence * 5)) * 100)
			: 0;

		return ['percentage' => $percentage];
	}

	private function calculate_sub_feedback($key, $feedback)
	{
		$total = 0;

		foreach ($feedback as $row) {
			$dataset = $row['dataset'];
			if (isset($dataset['reason']) && is_array($dataset['reason'])) {
				if (isset($dataset['reason'][$key]) && $dataset['reason'][$key] > 0) {
					$total += $dataset['reason'][$key];
				}
			}
		}

		return $total;
	}




	public function ticket_rate($table_tickets, $status, $table_feedback, $table_ticket_action)
	{
		$fdate = date('Y-m-d 23:59:59'); // End of today
		$tdate = date('Y-m-d 00:00:00', strtotime('-6 days')); // Start date (last Monday)
		

		$get_tickes = $this->get_tickets($table_feedback, $table_tickets);
		$closed_tickets = 0;
		$time = 0;
		$this->db->select('*');
		$this->db->from($table_ticket_action);
		$query = $this->db->get();
		$alltickets = $query->result();

		foreach ($get_tickes as $row) {
			foreach ($alltickets as $t) {
				if ($t->ticketid == $row->id && $row->status == 'Closed') {
					// print_r($t);
					$closed_tickets++;
					$time += strtotime($t->created_on) - strtotime($row->created_on);
				}
			}
		}
		if ($closed_tickets > 0 && $time > 0) {
			$seconds = $time / $closed_tickets;
		} else {
			$seconds = 0;
		}
		return $seconds;
	}



	//keep
	public function ticket_resolution_rate($table_tickets, $status, $table_feedback)
	{
		$fdate = date('Y-m-d 23:59:59'); // End of today
		$tdate = date('Y-m-d 00:00:00', strtotime('-6 days')); // Start date (last Monday)
				
		$this->db->select('*');
		$this->db->from($table_tickets);
		$this->db->join($table_feedback, $table_feedback . '.id=' . $table_tickets . '.feedbackid');
		

		$this->db->where($table_tickets . '.created_on <=', $fdate . ' 23:59:59');
		$this->db->where($table_tickets . '.created_on >=', $tdate);
		$query = $this->db->get();
		$alltickets = $query->result();
		$tickets = 0;
		foreach ($alltickets as $t) {
			if ($t->status == $status) {
				$tickets++;
			}
		}
		if ($tickets > 0 && count($alltickets) > 0) {
			$countofclosed = round(($tickets / count($alltickets)) * 100);
			return $countofclosed;
		} else {
			return 0;
		}
	}



	//keep
	public function setup_result($table)
	{
		$this->db->order_by('sort_order');
		$this->db->where('parent', 1);
		$query = $this->db->get($table);
		return $result = $query->result();
	}


	//keep
	public function setup_sub_result($table)
	{
		$this->db->order_by('id');
		$this->db->where('parent', 0);
		$query = $this->db->get($table);
		return $result = $query->result();
	}

	//keep
	public function tickets_recived_by_department($type, $table_feedback, $table_tickets, $department, $get_tickes)
	{
		$set = array();
		// $i = 0;
		foreach ($department as $key => $row) {
			// exit;
			$i = $row->slug;
			if (count($get_tickes) >= 1) {

				$data =  $this->get_toal_ticket_by_department($row->dprt_id, $get_tickes);
				$percentage  = $data['percentage'];
				$total_count  = $data['total_count'];
				$total_count = $data['total_count'];
				$open_tickets = $data['open_tickets'];
				$closed_tickets = $data['closed_tickets'];
				$addressed_tickets = $data['addressed_tickets'];
				$res_time = $data['res_time'];
				$tr_rate = $data['tr_rate'];
				$set[$i]['department'] = $row->description;
				$set[$i]['slug'] = $row->slug;
				$set[$i]['percentage'] = $percentage;
				$set[$i]['count'] = $total_count;
				$set[$i]['alltickets'] = $total_count;
				$set[$i]['closed_tickets'] = $closed_tickets;
				$set[$i]['open_tickets'] = $open_tickets;
				$set[$i]['addressed_tickets'] = $addressed_tickets;
				$set[$i]['tr_rate'] = $tr_rate;
				$set[$i]['res_time'] = $res_time;
				// $i++;
			}
		}
		return $set;
	}
	//keep
	public function get_toal_ticket_by_department($key, $tickes)
	{
		$total = 0;
		$total_percentage = 0;
		$open_tickets = 0;
		$closed_tickets = 0;
		$addressed_tickets = 0;
		$time = 0;
		foreach ($tickes as $row) {
			if ($row->departmentid == $key) {
				$total++;
			}
		}
		foreach ($tickes as $row) {
			if ($row->departmentid == $key && $row->status == 'Open') {
				$open_tickets++;
			} elseif ($row->departmentid == $key && $row->status == 'Addressed') {
				$addressed_tickets++;
			} elseif ($row->departmentid == $key && $row->status == 'Closed') {
				$closed_tickets++;
				$time += strtotime($row->last_modified) - strtotime($row->created_on);
			}
		}
		if ($total > 0 && count($tickes) > 0) {
			$total_percentage = round(($total / count($tickes)) * 100);
		}
		if ($closed_tickets > 0 && count($tickes) > 0) {
			$tr_rate = round(($closed_tickets / count($tickes)) * 100);
			$seconds = $time / $closed_tickets;
		} else {
			$tr_rate = 0;
			$seconds = 0;
		}



		$data = array();
		$data['percentage'] = $total_percentage;
		$data['total_count'] = $total;
		$data['open_tickets'] = $open_tickets;
		$data['closed_tickets'] = $closed_tickets;
		$data['addressed_tickets'] = $addressed_tickets;
		$data['tr_rate'] = $tr_rate;
		$data['res_time'] = $seconds;
		return $data;
	}

	//keep
	public function get_department($type)
	{
		$this->db->where('type', $type);
		$this->db->group_by('setkey');
		$query = $this->db->get('department');
		return $department = $query->result();
	}

	public function get_departmentint($type)
	{
		$this->db->where('type', $type);
		$query = $this->db->get('department');
		return $department = $query->result();
	}

	public function check_demo($settings)
	{
		$this->db->select($settings . '.*');
		$this->db->from($settings);
		$query = $this->db->get();
		$response  = $query->result();
		return $response;
	}

	//keep
	public function get_satisfied_count($table_feedback, $table_tickets, $all_feedback)
	{
		$fdate = date('Y-m-d 23:59:59'); // End of today
		$tdate = date('Y-m-d 00:00:00', strtotime('-6 days')); // Start date (last Monday)

		$this->db->select($table_tickets . ".*");
		$this->db->from($table_tickets);
		$this->db->where($table_tickets . '.created_on <=', $fdate . ' 23:59:59');
		$this->db->where($table_tickets . '.created_on >=', $tdate);
		$query = $this->db->get();
		$all_tickets = $query->result();
		$satisfied = 0;
		foreach ($all_feedback as $row) {
			$check = true;
			foreach ($all_tickets as $t) {
				if ($row->id == $t->feedbackid && $check == true) {
					$satisfied = $satisfied - 1;
				}
			}
			if ($check == true) {
				$satisfied = $satisfied + 1;
				$check = false;
			}
		}
		return $satisfied;
	}


	//keep
	public function get_unsatisfied_count($table_feedback, $table_tickets, $all_feedback)
	{
		$unsatisfied = 0;
		foreach ($all_feedback as $row) {
			if ($row) {
				$unsatisfied = $unsatisfied + 1;
			}
		}
		return $unsatisfied;
	}
	//keep
	function convertSecondsToTime($inputSeconds)
	{
		$isNegative = $inputSeconds < 0 ? true : false;

		// Always work with positive values for calculations
		$inputSeconds = abs($inputSeconds);

		$days = floor($inputSeconds / 86400);
		$inputSeconds %= 86400;

		$hours = floor($inputSeconds / 3600);
		$inputSeconds %= 3600;

		$minutes = floor($inputSeconds / 60);
		$inputSeconds %= 60;

		$seconds = $inputSeconds;

		return array(
			'isNegative' => $isNegative,
			'days' => $days,
			'hours' => $hours,
			'minutes' => $minutes,
			'seconds' => $seconds
		);
	}


	//keep
	public function tickets_feeds($table_feedback, $table_tickets, $sorttime, $status)
	{
		$fdate = date('Y-m-d 23:59:59'); // End of today
		$tdate = date('Y-m-d 00:00:00', strtotime('-6 days')); // Start date (last Monday)
		$this->db->select($table_feedback . ".*");
		$this->db->from($table_feedback);
		$this->db->join($table_tickets, $table_tickets . '.feedbackid = ' . $table_feedback . '.id');
		

		$this->db->where($table_tickets . '.status=', $status);
		$this->db->where($table_feedback . '.datet <=', $fdate);
		$this->db->where($table_feedback . '.datet >=', $tdate);
		$this->db->order_by('datetime', $sorttime);
		$query = $this->db->get();
		return $feedbackandticket = $query->result();
	}


	//keep
	public function patient_and_feedback($table_patient, $table_feedback, $sorttime)
	{

		$fdate = date('Y-m-d 23:59:59'); // End of today
		$tdate = date('Y-m-d 00:00:00', strtotime('-6 days')); // Start date (last Monday)
		$this->db->select($table_feedback . '.*');
		$this->db->from($table_feedback);
		$this->db->join($table_patient, $table_patient . '.id = ' . $table_feedback . '.pid', 'inner');

		

		$this->db->where($table_feedback . '.datet <=', $fdate);
		$this->db->where($table_feedback . '.datet >=', $tdate);
		$this->db->order_by('datetime', $sorttime);

		$query = $this->db->get();
		return $patientandfeedback = $query->result();
	}

	public function get_feedback_count()
	{
		// Retrieve the login email from the session
		$login_email = $this->session->userdata('email');

		// Query to count feedback entries with matching login email
		$this->db->select('COUNT(*) as feedback_count');
		$this->db->from('bf_feedback_esr');
		$this->db->where('JSON_EXTRACT(dataset, "$.loginemail") =', $login_email);

		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			$result = $query->row();
			return $result->feedback_count;
		}

		return 0; // Return 0 if no matching entries are found
	}

	//keep
	public function feedback_and_ticket($table_feedback, $table_tickets, $sorttime)
	{
		$fdate = date('Y-m-d 23:59:59'); // End of today
		$tdate = date('Y-m-d 00:00:00', strtotime('-6 days')); // Start date (last Monday)
		$this->db->select($table_feedback . ".*");
		$this->db->from($table_feedback);
		$this->db->join($table_tickets, $table_tickets . '.feedbackid = ' . $table_feedback . '.id');
	

		$this->db->where($table_feedback . '.datet <=', $fdate);
		$this->db->where($table_feedback . '.datet >=', $tdate);
		$this->db->order_by('datetime', $sorttime);
		$query = $this->db->get();
		return $feedbackandticket = $query->result();
	}

	//keep
	public function get_tickets($table_feedback, $table_tickets)
	{

		$fdate = date('Y-m-d 23:59:59'); // End of today
		$tdate = date('Y-m-d 00:00:00', strtotime('-6 days')); // Start date (last Monday)
		$this->db->select($table_tickets . ".*");
		$this->db->from($table_feedback);
		$this->db->join($table_tickets, $table_tickets . '.feedbackid = ' . $table_feedback . '.id');
		

		$this->db->where($table_feedback . '.datet <=', $fdate);
		$this->db->where($table_feedback . '.datet >=', $tdate);
		$query = $this->db->get();
		return 	$feedbackandticket = $query->result();
	}


	public function get_tickets2($table_feedback, $table_tickets)
	{
		$fdate = date('Y-m-d 23:59:59'); // End of today
		$tdate = date('Y-m-d 00:00:00', strtotime('-6 days')); // Start date (last Monday)
		$this->db->select($table_feedback . ".*");
		$this->db->from($table_tickets);
		$this->db->join($table_tickets, $table_tickets . '.feedbackid = ' . $table_feedback . '.id');
		
		$this->db->where($table_feedback . '.datet <=', $fdate);
		$this->db->where($table_feedback . '.datet >=', $tdate);
		$query = $this->db->get();
		return 	$tickets23 = $query->result();
	}

	//keep
	public function nps_analytics($table_feedback, $sorttime)
	{
		$fdate = date('Y-m-d 23:59:59'); // End of today
		$tdate = date('Y-m-d 00:00:00', strtotime('-6 days')); // Start date (last Monday)
		
		$this->db->select($table_feedback . '.*');
		$this->db->from($table_feedback);
		

		$this->db->where($table_feedback . '.datet <=', $fdate);
		$this->db->where($table_feedback . '.datet >=', $tdate);
		$this->db->order_by('datetime', $sorttime);
		$query = $this->db->get();
		$nps_analytics = $query->result();


		$promoters_count = 0;
		$detractors_count = 0;
		$passives_count = 0;

		$promoters_feedback = array();
		$detractors_feedback = array();
		$passives_feedback = array();

		foreach ($nps_analytics as $row) {
			$param = json_decode($row->dataset);
			$rating = $param->recommend1Score * 2;
			if ($rating >= 9) {
				$promoters_count++;
				$promoters_feedback[$row->id] = $param;
			} elseif ($rating <= 6) {
				$detractors_count++;
				$detractors_feedback[$row->id] = $param;
			} else {
				$passives_count++;
				$passives_feedback[$row->id] = $param;
			}
		}

		$nps_score = count($nps_analytics) > 0 ? round((($promoters_count - $detractors_count) / count($nps_analytics)) * 100) : 0;

		$targetNPS = 0.85;
		$totalResponses = count($nps_analytics);
		$x = (($targetNPS * $totalResponses) + (100 * $detractors_count) - (100 * $promoters_count)) / (100 - $targetNPS);
		$neededPromoters = ceil($x) + $promoters_count;


		$nps = array();
		$nps['nps_score'] = $nps_score;
		$nps['promoters_count'] = $promoters_count;
		$nps['promoters_feedbacks'] = $promoters_feedback;
		$nps['detractors_count'] = $detractors_count;
		$nps['detractors_feedback'] = $detractors_feedback;
		$nps['passives_count'] = $passives_count;
		$nps['passives_feedback'] = $passives_feedback;
		$nps['to_reach_benchmark'] = 	$neededPromoters;
		// echo $neededPromoters;
		return $nps;
	}



	

	public function alltickets()
	{
		$fdate = date('Y-m-d 23:59:59'); // End of today
		$tdate = date('Y-m-d 00:00:00', strtotime('-6 days')); // Start date (last Monday)
	
		$this->db->from($this->table);
		$this->db->where('created_on >=', $tdate);
		$this->db->where('created_on <=', $fdate);
	
		return $this->db->count_all_results(); // Returns only the count
	}

	public function read_close()
	{
		$fdate = date('Y-m-d 23:59:59'); // End of today
		$tdate = date('Y-m-d 00:00:00', strtotime('-6 days')); // Start date (last Monday)
	
		$this->db->from($this->table);
		$this->db->where('status', 'Closed');
		$this->db->where('created_on >=', $tdate);
		$this->db->where('created_on <=', $fdate);
	
		return $this->db->count_all_results(); // Returns only the count
	}
	public function read()
	{
		$fdate = date('Y-m-d 23:59:59'); // End of today
		$tdate = date('Y-m-d 00:00:00', strtotime('-6 days')); // Start date (last Monday)
	
		$this->db->from($this->table);
		$this->db->where('status', 'Open');
		$this->db->where('created_on >=', $tdate);
		$this->db->where('created_on <=', $fdate);
	
		return $this->db->count_all_results(); // Returns only the count
	}
	public function addressedtickets()
	{
		$fdate = date('Y-m-d 23:59:59'); // End of today
		$tdate = date('Y-m-d 00:00:00', strtotime('-6 days')); // Start date (last Monday)
	
		$this->db->from($this->table);
		$this->db->where('status', 'Addressed');
		$this->db->where('created_on >=', $tdate);
		$this->db->where('created_on <=', $fdate);
	
		return $this->db->count_all_results(); // Returns only the count
	}

	//keep
	public function psat_analytics($table_patients, $table_feedback, $table_tickets, $sorttime, $all_tickets, $feedback_data)
	{
		$satisfied_count = 0;
		$unsatisfied_count = 0;
		$satisfied_feedback = [];
		$unsatisfied_feedback = [];

		// Preprocess tickets into a lookup array for faster matching
		$ticket_lookup = [];
		foreach ($all_tickets as $t) {
			$ticket_lookup[$t->feedbackid][] = $t;
		}

		// Process each feedback
		foreach ($feedback_data as $row) {
			$param = json_decode($row->dataset);
			$nps_score = ($param->recommend1Score * 2);

			$has_ticket = isset($ticket_lookup[$row->id]) && count($ticket_lookup[$row->id]) > 0;

			if (!$has_ticket && $nps_score > 6) {
				$satisfied_count++;
				$satisfied_feedback[$row->id] = $param;
			} else {
				$unsatisfied_count++;
				$unsatisfied_feedback[$row->id] = $param;
			}
		}

		$total_count = $satisfied_count + $unsatisfied_count;

		// Calculate PSAT score
		$psat_score = $total_count > 0
			? round((($total_count - $unsatisfied_count) / $total_count) * 100)
			: 0;

		// Prepare result
		return [
			'psat_score' => $psat_score,
			'satisfied_count' => $satisfied_count,
			'satisfied_feedback' => $satisfied_feedback,
			'unsatisfied_count' => $unsatisfied_count,
			'unsatisfied_feedback' => $unsatisfied_feedback,
		];
	}






	public function recent_comments($table_feedback, $sorttime, $setup)
	{
		$fdate = date('Y-m-d 23:59:59'); // End of today
		$tdate = date('Y-m-d 00:00:00', strtotime('-6 days')); // Start date (last Monday)
		$this->db->select($table_feedback . '.*');
		$this->db->from($table_feedback);
		
		$this->db->where($table_feedback . '.datet <=', $fdate);
		$this->db->where($table_feedback . '.datet >=', $tdate);
		$this->db->order_by('datetime', $sorttime);
		$query = $this->db->get();
		$recent_comments = $query->result();
		$dataexport = array();
		$this->db->select($setup . '.*');
		$this->db->from($setup);
		$this->db->order_by('id', 'asc');
		$query = $this->db->get();
		$sresult = $query->result();
		foreach ($sresult as $r) {
			$setarray[$r->type] = $r->title;
			$questionarray[$r->shortkey] = $r->shortkey;
		}

		$i = 0;

		foreach ($recent_comments as $row) {
			$data = json_decode($row->dataset, true);
			$dataexport[$i]['id'] = $row->id;
			$dataexport[$i]['name'] = $data['name'];
			$dataexport[$i]['patientid'] = $data['patientid'];
			$dataexport[$i]['ward'] = $data['ward'];
			$dataexport[$i]['bed'] = $data['bedno'];
			$dataexport[$i]['suggestions']  = $data['suggestionText'];
			$dataexport[$i]['avgrating']  = $data['overallScore'];
			foreach ($setarray as $key => $t) {
				if ($data['comment'][$key]) {
					$dataexport[$i]['comment'] = $data['comment'];
				}
				foreach ($questionarray as $skey => $tss) {
					$dataexport[$i]['reason'] = $data['reason'];
				}
			}
			$i++;
		}
		return $dataexport;
	}

	public function feedbacks_data($table_feedback, $sorttime, $setup)
	{
		//date capture from session data
		$fdate = date('Y-m-d 23:59:59'); // End of today
		$tdate = date('Y-m-d 00:00:00', strtotime('-6 days')); // Start date (last Monday)
		$this->db->select($table_feedback . '.*');
		$this->db->from($table_feedback);
		// floor/ ward condition
		
		// date condition for querry
		$this->db->where($table_feedback . '.datet <=', $fdate);
		$this->db->where($table_feedback . '.datet >=', $tdate);
		$this->db->order_by('datetime', $sorttime);
		$query = $this->db->get();
		$feedbacks_data = $query->result();
		$dataexport = array();
		//index varriable
		$i = 0;
		//questions and set for comparison 
		$this->db->select($setup . '.*');
		$this->db->from($setup);
		$this->db->order_by('id', 'asc');
		$query = $this->db->get();
		$sresult = $query->result();
		foreach ($sresult as $r) {
			$setarray[$r->type] = $r->title;
		}
		foreach ($sresult as $r) {
			//change short key to question if question has to be displayed.
			$questionarray[$r->shortkey] = $r->shortkey;
		}

		foreach ($feedbacks_data as $row) {
			$data = json_decode($row->dataset, true);
			$dataexport['id'] = $row->id;
			$dataexport['name'] = $data['name'];
			$dataexport['patientid'] = $data['patientid'];
			$dataexport['mobile'] = $data['contactnumber'];
			$dataexport['ward'] = $data['ward'];
			$dataexport['bed'] = $data['bedno'];
			$dataexport['suggestions']  = $data['suggestionText'];
			$dataexport['average_rating']  = $data['overallScore'];
			$dataexport['source']  = $row->source;
			$dataexport['feedtime']  = date('g:i A, d-m-y', strtotime($row->datetime));
			foreach ($setarray as $key => $t) {
				if ($data['comment'][$key]) {
					$dataexport[$i][$t] = $data['comment'][$key];
					// $dataexport[$i]['reason'] = $data;
				}
			}
			foreach ($questionarray as $key => $t3) {
				if ($data['reason'][$key]) {
					$dataexport[$i]['reason'] = $t3;
				}
			}
			$i++;
		}
		return $dataexport;
		//returns array with all demography of the patient.
	}

	//keep
	public function reason_to_choose_hospital($table_feedback, $sorttime, $totalFeedbackList)
	{
		$choiceArray = [
			'location' => 'Location',
			'specificservice' => 'Specific services offered',
			'referred' => 'Referred by doctors',
			'friend' => 'Friend/Family recommendation',
			'previous' => 'Previous experience',
			'docAvailability' => 'Insurance facilities',
			'companyRecommend' => 'Company Recommendation',
			'otherReason' => 'Print or Online Media'
		];

		$totalCount = 0;

		// Calculate the total count of feedback reasons
		foreach ($totalFeedbackList as $feedback) {
			$params = json_decode($feedback->dataset, true);
			foreach ($choiceArray as $key => $label) {
				if (!empty($params[$key])) {
					$totalCount++;
				}
			}
		}

		$pieChart = [];

		// Calculate percentages and prepare pie chart data
		foreach ($choiceArray as $key => $label) {
			$count = 0;

			foreach ($totalFeedbackList as $feedback) {
				$params = json_decode($feedback->dataset, true);
				if (!empty($params[$key])) {
					$count++;
				}
			}

			$percentage = $totalCount > 0 ? round(($count / $totalCount) * 100) : 0;

			$pieChart[] = (object) [
				'percentage' => $percentage,
				'title' => $label,
				'count' => $count
			];
		}

		return $pieChart;
	}



	//keep
	public function key_highlights($table_patients, $table_feedback, $sorttime, $setup, $totalFeedbackList)
	{


		$highestPercentage = -1; // Initial value to ensure any positive value in the array is higher
		$lowestPercentage = 101; // Initial value to ensure any value in the array is lower
		$highestName = "";
		$lowestName = "";

		$highestCount = -1; // Initial value to ensure any positive value in the array is higher
		$lowestCount = PHP_INT_MAX; // Set initial value to the largest possible integer value
		$highestSubParam = "";
		$lowestSubParam = "";

		$res = $this->key_highlights2($table_patients, $table_feedback, $sorttime, $setup, $totalFeedbackList);

		foreach ($res['parent'] as $item) {
			$percentage = $item['parent_percentage'];
			if ($percentage > 0) { // exclude zeros
				if ($percentage > $highestPercentage) {
					$highestPercentage = $percentage;
					$highestName = $item['parent_param'];
					$highesthortkey = $item['shortkey'];
				}
				if ($percentage < $lowestPercentage) {
					$lowestPercentage = $percentage;
					$lowestName = $item['parent_param'];
					$lowestshortkey = $item['shortkey'];
				}
			}
		}

		foreach ($res['sub'] as $item) {
			$count = $item['sub_count'];
			if ($count > 0) {
				if ($count > $highestCount) {
					$highestCount = $count;
					$highestSubParam = $item['sub_param'];
					$highestreasonshortkey = $item['shortkey'];
				}
				if ($count < $lowestCount) {
					$lowestCount = $count;
					$lowestSubParam = $item['sub_param'];
					$lowestreasonshortkey = $item['shortkey'];
				}
			}
		}

		$keyhighlights = array();
		$keyhighlights['best_param'] = $highestName;
		$keyhighlights['highestvalue'] = $highestPercentage;
		$keyhighlights['highesthortkey'] = $highesthortkey;

		$keyhighlights['lowest_param'] = $lowestName;
		$keyhighlights['lowestvalue'] = $lowestPercentage;
		$keyhighlights['lowestshortkey'] = $lowestshortkey;

		$keyhighlights['badparam'] = $highestSubParam;


		$keyhighlights['highestCount'] = $highestCount;
		$keyhighlights['highestSubParam'] = $highestSubParam;
		$keyhighlights['highestreasonshortkey'] = $highestreasonshortkey;


		$keyhighlights['lowestCount'] = $lowestCount;
		$keyhighlights['lowestSubParam'] = $lowestSubParam;
		$keyhighlights['lowestreasonshortkey'] = $lowestreasonshortkey;


		// print_r($keyhighlights);
		return $keyhighlights;
	}



	public function tickets_recived_by_department_interim($type, $table_feedback, $table_tickets)
	{
		$department = $this->get_departmentint($type);
		$i = 0;
		$all_tickes = $this->get_tickets($table_feedback, $table_tickets);
		$report = array();
		$response = array();
		$department_set = array();
		foreach ($department as $departmentRow) {
			if (isset($department_set[$departmentRow->setkey])) {
				$department_set[$departmentRow->setkey]['department_id_set'][] = $departmentRow->dprt_id;
			} else {
				$department_set[$departmentRow->setkey] = array();
				$department_set[$departmentRow->setkey]['department_id_set'] = array();
				$department_set[$departmentRow->setkey]['department_id_set'][] = $departmentRow->dprt_id;
				$department_set[$departmentRow->setkey]['department_name'] = $departmentRow->description;
			}
			asort($department_set);
		}
		$set = array();
		foreach ($department_set as $key => $department_set_row) {
			// echo '<pre>';
			// print_r($department_set_row); exit;
			$data =  $this->get_toal_ticket_by_department_interim($all_tickes, $department_set_row);
			$percentage  = $data['percentage'];
			$total_count  = $data['total_count'];
			$open_tickets = $data['open_tickets'];
			$closed_tickets = $data['closed_tickets'];
			$addressed_tickets = $data['addressed_tickets'];
			$tr_rate = $data['tr_rate'];
			$res_time = $data['res_time'];
			// $total_tickets = $data['total_tickets'];
			$set[$i]['department'] = $department_set_row['department_name'];

			$set[$i]['percentage'] = $percentage;
			$set[$i]['total_count'] = $total_count;
			$set[$i]['closed_tickets'] = $closed_tickets;
			$set[$i]['open_tickets'] = $open_tickets;
			$set[$i]['addressed_tickets'] = $addressed_tickets;
			$set[$i]['tr_rate'] = $tr_rate;
			$set[$i]['res_time'] = $res_time;
			$i++;
		}
		return $set;
	}


	private function get_toal_ticket_by_department_interim($tickes, $department_set_row)
	{
		$total_count = 0;
		$total_percentage = 0;
		$open_tickets = 0;
		$closed_tickets = 0;
		$addressed_tickets = 0;
		$time = 0;
		foreach ($tickes as $row) {
			if (in_array($row->departmentid, $department_set_row['department_id_set'])) {
				$total_count++;
			}
		}
		foreach ($tickes as $row) {
			if (in_array($row->departmentid, $department_set_row['department_id_set']) && $row->status == 'Open') {
				$open_tickets++;
			}
			if (in_array($row->departmentid, $department_set_row['department_id_set']) && $row->status == 'Closed') {
				$closed_tickets++;
				$time += strtotime($row->last_modified) - strtotime($row->created_on);
			}
			if (in_array($row->departmentid, $department_set_row['department_id_set']) && $row->status == 'Addressed') {
				$addressed_tickets++;
			}
		}
		if ($total_count > 0 && count($tickes) > 0) {
			$total_percentage = round(($total_count / count($tickes)) * 100);
		}
		if ($closed_tickets > 0 && count($tickes) > 0) {
			$tr_rate = round(($closed_tickets / count($tickes)) * 100);
			$seconds = $time / $closed_tickets;
		} else {
			$tr_rate = 0;
		}

		$data = array();
		$data['percentage'] = $total_percentage;
		$data['total_count'] = $total_count;
		$data['open_tickets'] = $open_tickets;
		$data['closed_tickets'] = $closed_tickets;
		$data['addressed_tickets'] = $addressed_tickets;
		$data['tr_rate'] = $tr_rate;
		$data['res_time'] = $seconds;
		// $data['total_tickets'] = count($tickes);
		return $data;
	}
}
