<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Message extends CI_Controller
{


	public function __construct()
	{
		parent::__construct();
		$this->load->model(
			array(

				'opt/ipd_opt_model_weekly',

			)
		);
	}

	public function get_user_by_sms_activity($type)
	{

		$user_list = array();

		$query = $this->db->get_where('features', array('feature_name' => $type));
		$feature_result = $query->row();



		$feature_id = $feature_result->feature_id;

		$user_permission_query = 'SELECT * FROM `user_permissions` WHERE status = 1 AND `feature_id` =' . $feature_id;
		$permission_result = $this->db->query($user_permission_query);

		foreach ($permission_result->result() as $role_permission) {
			$role = $role_permission->user_id;

			$user_query = 'SELECT * FROM `user` WHERE `user_id` =' . $role;
			$user_result = $this->db->query($user_query);

			foreach ($user_result->result() as $user) {
				$user_list[] = $user;
			}
		}

		return $user_list;
	}

	public function inweeklyreport()
	{
		$table_feedback = 'bf_feedback';
		$table_patients = 'bf_patients';
		$sorttime = 'asc';
		$setup = 'setup';
		$asc = 'asc';
		$desc = 'desc';
		$table_tickets = 'tickets';
		$open = 'Open';
		$closed = 'Closed';
		$addressed = 'Addressed';
		$table_ticket_action = 'ticket_message';
		$type = 'inpatient';
		$department = 'department';
		$reopen = 'Reopen';
		$fdate = date('Y-m-d 23:59:59'); // End of today
		$tdate = date('Y-m-d 00:00:00', strtotime('-6 days')); // Start date (last Monday)

		$this->db->select('id');
		$this->db->from('bf_feedback');
		$this->db->where('datet >=', $tdate);
		$this->db->where('datet <=', $fdate);
		$query = $this->db->get();

		$weekly_feedback_count = $query->num_rows(); // Count of feedback
		$ip_feedbacks_count = $this->ipd_opt_model_weekly->patient_and_feedback($table_patients, $table_feedback, $sorttime, $setup);
		$totalFeedbackList = $ip_feedbacks_count;
		$allTickets = $this->ipd_opt_model_weekly->get_tickets($table_feedback, $table_tickets);
		$ip_psat = $this->ipd_opt_model_weekly->psat_analytics($table_patients, $table_feedback, $table_tickets, $sorttime, $allTickets, $totalFeedbackList);
		$ip_psat_tool = 'Satisfied Patients: ' . ($ip_psat['satisfied_count']) . ', ' . "Unsatisfied Patients: " . ($ip_psat['unsatisfied_count']) . '. ';

		// IP ANALYTICS
		$ip_nps = $this->ipd_opt_model_weekly->nps_analytics($table_feedback, $asc, $setup);
		$ip_nps_tool = 'Promoters: ' . ($ip_nps['promoters_count']) . ', ' . "Detractors: " . ($ip_nps['detractors_count']) . ', ' . "Passives: " . ($ip_nps['passives_count']);
		$ip_tickets_count = $this->ipd_opt_model_weekly->feedback_and_ticket($table_feedback, $table_tickets, $sorttime);
		$total_ticket_count = count($ip_tickets_count);
		$key_highlights = $this->ipd_opt_model_weekly->key_highlights($table_patients, $table_feedback, $sorttime, $setup, $totalFeedbackList);

		$alltickets = $this->ipd_opt_model_weekly->alltickets();
		$opentickets = $this->ipd_opt_model_weekly->read();
		$closedtickets = $this->ipd_opt_model_weekly->read_close();
		$addressedtickets = $this->ipd_opt_model_weekly->addressedtickets();

		$ticket_resolution_rate = $this->ipd_opt_model_weekly->ticket_resolution_rate($table_tickets, $closed, $table_feedback, $allTickets);
		$close_rate = $this->ipd_opt_model_weekly->ticket_rate($table_tickets, $status, $table_feedback, $table_ticket_action, $allTickets);
		$ticket_close_rate = secondsToTime($close_rate);

		$ticket_resolution_rate .= '%'; // Append %
		$ip_psat['psat_score'] .= '%'; // Append %
		$ip_nps['nps_score'] .= '%'; // Append %
		// print_r($weekly_feedback_count);
		// print_r($ip_psat['satisfied_count']);
		// print_r($ip_psat['unsatisfied_count']);
		// print_r($ip_psat['psat_score']);
		// print_r($ip_nps['nps_score']);
		// print_r($ip_nps['promoters_count']);
		// print_r($ip_nps['detractors_count']);
		// print_r($ip_nps['passives_count']);
		// print_r($alltickets);

		// print_r($key_highlights['lowest_param']);
		// print_r($opentickets);
		// print_r($addressedtickets);
		// print_r($closedtickets);
		// print_r($ticket_resolution_rate);
		// print_r($ticket_close_rate);

		$user = $this->get_user_by_sms_activity('IP-WEEKLY-FEEDBACKS-REPORT-WHATSAPP');
		foreach ($user as $rowuser) {
			$number = $rowuser->mobile;
			// $this->sendsms($message1, $number, $TEMPID);
			$this->sendsms_whatsapp($number, $fdate, $tdate, $weekly_feedback_count, $ip_psat['satisfied_count'], $ip_psat['unsatisfied_count'], $ip_psat['psat_score'], $ip_nps['nps_score'], $ip_nps['promoters_count'], $ip_nps['detractors_count'], $ip_nps['passives_count'], $alltickets, $key_highlights['lowest_param'], $opentickets, $addressedtickets, $closedtickets, $ticket_resolution_rate, $ticket_close_rate);
		}
	}

	public function dailyreport()
	{
		// Get yesterday's date
		$yesterday = date('Y-m-d', strtotime('-1 day'));
		$start_datetime = $yesterday . ' 00:00:00';
		$end_datetime = $yesterday . ' 23:59:59';

		// Count inpatient feedbacks
		$this->db->from('bf_feedback');
		$this->db->where('datet >=', $start_datetime);
		$this->db->where('datet <=', $end_datetime);
		$inpatient_feedback_count_ip = $this->db->count_all_results();

		// Count concerns / tickets
		$this->db->from('bf_feedback_int');
		$this->db->where('datet >=', $start_datetime);
		$this->db->where('datet <=', $end_datetime);
		$inpatient_feedback_count_int = $this->db->count_all_results();

		// Count outpatient feedbacks
		$this->db->from('bf_outfeedback');
		$this->db->where('datet >=', $start_datetime);
		$this->db->where('datet <=', $end_datetime);
		$inpatient_feedback_count_op = $this->db->count_all_results();
		// Feedbacks by area (example: by ward)
		$areas = [
			'1ST FLOOR- CARMEL BLOCK' => 0,
			'1ST FLOOR- MARIAN BLOCK' => 0,
			'2ND FLOOR- SANJUVAN' => 0,
			'2ND FLR - ST.THERESA BLK' => 0,
			'SHDU' => 0,
		];

		foreach ($areas as $area => $count) {
			$this->db->select('COUNT(*) as count');
			$this->db->from('bf_patients');
			$this->db->join('bf_feedback', 'bf_patients.patient_id = bf_feedback.patientid');
			$this->db->where('bf_patients.ward', $area);
			$this->db->where('bf_feedback.datet >=', $start_datetime);
			$this->db->where('bf_feedback.datet <=', $end_datetime);
			$query = $this->db->get()->row();

			$areas[$area] = $query ? $query->count : 0;
		}

		// Now assign to individual variables
		$carmel_block = $areas['1ST FLOOR- CARMEL BLOCK'];
		$marian_block = $areas['1ST FLOOR- MARIAN BLOCK'];
		$sanjuvan_block = $areas['2ND FLOOR- SANJUVAN'];
		$sttheresa_block = $areas['2ND FLR - ST.THERESA BLK'];
		$shdu_block = $areas['SHDU'];

		$report_date = date('F j, Y', strtotime($yesterday)); // "April 24, 2025"
		$setting = $this->db->get('setting')->result();
		$HID = $setting[0]->description;
		$hospitalname = $setting[0]->title;



		$user = $this->get_user_by_sms_activity('DAILY-FEEDBACKS-WHATSAPP-ALERT');
		foreach ($user as $rowuser) {
			$number = $rowuser->mobile;
			$this->sendsms_whatsapp_daily($number, $hospitalname, $report_date, $inpatient_feedback_count_ip, $inpatient_feedback_count_int, $inpatient_feedback_count_op, $carmel_block, $marian_block, $sanjuvan_block, $sttheresa_block, $shdu_block);
		}
	}


	public function sendsms_whatsapp_daily($mobile, $hospitalname, $report_date, $ip_count, $int_count, $op_count, $carmel_block, $marian_block, $sanjuvan_block, $sttheresa_block, $shdu_block)
	{
		include('/home/cpefeedor/globalconfig.php'); // for $conn_g

		// Assign values to variables for template
		$td = $report_date;
		$COMPANYNAME = '-%20ITATONE';
		$number = $mobile;

		$val1 = $ip_count;
		$val2 = $int_count;
		$val3 = $op_count;
		$val4 = $carmel_block;
		$val5 = $marian_block;
		$val6 = $sanjuvan_block;
		$val7 = $sttheresa_block;
		$val8 = $shdu_block;

		// You can keep rest as placeholders for now
		$val9 = '';
		$val10 = '';
		$val11 = '';
		$val12 = '';
		$val13 = '';
		$val14 = '';
		$val15 = '';

		$val15 = strip_tags(trim($val15)); // Sanitize

		$templateParamsArray = [
			$hospitalname,
			$td,
			$val1,
			$val2,
			$val3,
			$val4,
			$val5,
			$val6,
			$val7,
			$val8,
			$hospitalname
		];

		// Encode safely
		$templateParams = json_encode(array_map('strval', $templateParamsArray));

		$insert_notification_query = "INSERT INTO notifications_whatsapp 
        (destination, userName, campaignName, templateParams, source, media, buttons, carouselCards, location, paramsFallbackValue, status) 
        VALUES (
            '91$number', 
            'ITATONE POINT CONSULTING LLP 7345', 
            'dailyfeedback_report_staff', 
            '" . addslashes($templateParams) . "', 
            'new-landing-page form', '{}', '[]', '[]', '{}', 
            '" . json_encode(["FirstName" => "user"]) . "', 'pending'
        )";

		if ($conn_g->query($insert_notification_query) === TRUE) {
			echo "Data inserted into notifications table successfully.<br>";
		} else {
			echo "Error: " . $conn_g->error . "<br>";
		}

		if (json_last_error() !== JSON_ERROR_NONE) {
			echo "JSON Error: " . json_last_error_msg();
			exit;
		}

		echo "Template Params: " . $templateParams;
		exit;
	}


	public function inmonthlyreport()
	{
		$fdate = date('Y-m-d', strtotime('-1 days'));
		$tdate = date('Y-m-d', strtotime('-30 days'));
		$this->db->select('bf_feedback.*,bf_patients.name as pname,bf_patients.patient_id as pid');
		$this->db->from('bf_feedback');
		$this->db->join('bf_patients', 'bf_patients.patient_id = bf_feedback.patientid', 'inner');

		if (isset($_SESSION['ward']) && $_SESSION['ward'] != 'ALL') {
			$this->db->where('bf_patients.ward', $_SESSION['ward']);
		}

		$fdate = date('Y-m-d', strtotime($fdate) + 86399);
		$fdatet = date('Y-m-d H:i:s', strtotime($fdate) + 86399);
		$this->db->where('bf_feedback.datet <=', $fdatet);
		$this->db->where('bf_feedback.datet >=', $tdate);
		$this->db->order_by('datetime', 'desc');
		$query = $this->db->get();
		$feedbacktaken = $query->result();
		$promoter = 0;
		$depromoter = 0;
		$passive = 0;
		foreach ($feedbacktaken as $r) {
			$this->db->where('feedbackid', $r->id);
			$query = $this->db->get('tickets');
			$dtata = $query->result();
			if (count($dtata) > 0) {
				//$param = json_decode($r->dataset);
				$below3++;
			}
			$param = json_decode($r->dataset);
		
			if ($param->recommend1Score > 4) {
				$promoter = $promoter + 1;
			} else {
				if ($param->recommend1Score == 4 || $param->recommend1Score == 3.5) {
					$passive = $passive + 1;
				} else {
					$depromoter = $depromoter + 1;
				}
			}
			//}
		}
		$d1 = date('Md', strtotime($tdate));
		$d2 = date('Md', strtotime($fdatet));
		$message1 = 'Monthly IP feedbacks report: ' . $d1 . ' to ' . $d2 . '%0a%0aTotal feedbacks:' . count($feedbacktaken) . '%0aSatisfied Patients:' . (count($feedbacktaken) - $below3) . '%0aUnsatisfied Patients:' . $below3 . '%0aSatisfaction Index:' . round((count($feedbacktaken) - $below3) / (count($feedbacktaken)) * 100) . '%25%0aNPS Score:' . round((($promoter - $depromoter) / ($depromoter + $promoter + $passive)) * 100) . '%25';

		//$query = ;


		$TEMPID = '1607100000000084990';
		$user = $this->get_user_by_sms_activity('IP-MONTHLY-FEEDBACKS-REPORT-SMS');
		foreach ($user as $rowuser) {
			$number = $rowuser->mobile;
			$this->sendsms($message1, $number, $TEMPID);
		}
	}

	public function weeklyipticketreport()
	{
		$fdate = date('Y-m-d', strtotime('-1 days'));
		$tdate = date('Y-m-d 00:00:00', strtotime('-7 days'));
		$fdate = date('Y-m-d', strtotime($fdate) + 86399);
		$fdatet = date('Y-m-d H:i:s', strtotime($fdate) + 86399);
		$this->db->select('tickets.*,bf_patients.name as pname');
		$this->db->from('tickets');

		$this->db->join('bf_feedback', 'bf_feedback.id = tickets.feedbackid', 'left');
		$this->db->join('bf_patients', 'bf_patients.patient_id = bf_feedback.patientid', 'left');
		$this->db->where('bf_feedback.datet <=', $fdate);
		$this->db->where('bf_feedback.datet >=', $tdate);
		$this->db->order_by('datetime', 'desc');
		$query = $this->db->get();
		$ticket = $query->result();

		$tickets = array();
		$ticketbydepartment = array();
		$ticketbydepartmentopen = array();
		$ticketbydepartmentname = array();
		$TEMPID = '';
		foreach ($ticket as $row) {
			$this->db->where('patient_id', $row->created_by);
			$query = $this->db->get('bf_patients');
			$patient = $query->result();

			$this->db->where('dprt_id', $row->departmentid);
			$query = $this->db->get('department');
			$department = $query->result();
			$slug2 = preg_replace('/[^A-Za-z0-9-]+/', '-', $department[0]->description);
			$row->slug = $slug2;
			$slug = $patient[0]->id . preg_replace('/[^A-Za-z0-9-]+/', '-', $department[0]->description);
			$tickets[] = $row;


			$ticketbydepartment[$slug2] = (int)$ticketbydepartment[$slug2] + 1;
			$ticketbydepartmentname[$slug2] = $department[0]->description;
		}

		$opent = 0;
		$closedt = 0;
		foreach ($tickets as $t) {
			//$ticketbydepartment[$slug2] = $ticketbydepartment[$slug2]*1+1;
			if ($t->status == 'Open') {
				$opent++;
				$ticketbydepartmentopen[$t->slug] = (int)$ticketbydepartmentopen[$t->slug] + 1;
			} else {
				$closedt++;
			}
		}
		$d1 = date('Md', strtotime($tdate));
		$d2 = date('Md', strtotime($fdatet));
		/*$message2 = 'Weekly IP Tickets Report: '.$d1.' to '.$d2.'%0a%0aTotal tickets:'.count($tickets).'%0aTickets Open:'.$opent.'%0aTickets Closed:'.$closedt.'%0a%0a';
								$ticketdepart = arsort($ticketbydepartment);
								$i = 0;
								foreach($ticketbydepartment as $key=>$depart){
									if($i < 5){
										$closed = $ticketbydepartment[$key] - $ticketbydepartmentopen[$key];
										$open = $ticketbydepartmentopen[$key]*1;
										$i++;
										if($i == 2){
											$message2 .=$ticketbydepartmentname[$key].':Total:'.$ticketbydepartment[$key].', Open:'.$open.', Closed:'.$closed.'%0a';
										}else{
											$message2 .=$ticketbydepartmentname[$key].'-Total:'.$ticketbydepartment[$key].', Open:'.$open.', Closed:'.$closed.'%0a';
										}
									}
								}*/
		$message2 = 'Weekly IP Tickets Report: ' . $d1 . ' to ' . $d2 . '%0aTotal tickets: ' . count($tickets) . '%0aTickets Open: ' . $opent . '%0aTickets closed: ' . $closedt . '%0aTo view more details, please login to dashboard and click the link below:%0a' . base_url() . '';


		$TEMPID = '1607100000000141422';
		$user = $this->get_user_by_sms_activity('IP-WEEKLY-TICKETS-REPORT-SMS');
		foreach ($user as $rowuser) {
			$number = $rowuser->mobile;
			$this->sendsms($message2, $number, $TEMPID);
		}
	}

	public function montlyipticketreport()
	{
		$fdate = date('Y-m-d', strtotime('-1 days'));
		$tdate = date('Y-m-d', strtotime('-30 days'));
		$fdate = date('Y-m-d', strtotime($fdate) + 86399);
		$fdatet = date('Y-m-d H:i:s', strtotime($fdate) + 86399);
		$this->db->select('tickets.*,bf_patients.name as pname');
		$this->db->from('tickets');

		$this->db->join('bf_feedback', 'bf_feedback.id = tickets.feedbackid', 'left');
		$this->db->join('bf_patients', 'bf_patients.patient_id = bf_feedback.patientid', 'left');
		$this->db->where('bf_feedback.datet <=', $fdate);
		$this->db->where('bf_feedback.datet >=', $tdate);
		$this->db->order_by('datetime', 'desc');
		$query = $this->db->get();
		$ticket = $query->result();

		$tickets = array();
		$ticketbydepartment = array();
		$ticketbydepartmentopen = array();
		$ticketbydepartmentname = array();
		foreach ($ticket as $row) {
			$this->db->where('patient_id', $row->created_by);
			$query = $this->db->get('bf_patients');
			$patient = $query->result();

			$this->db->where('dprt_id', $row->departmentid);
			$query = $this->db->get('department');
			$department = $query->result();
			$slug2 = preg_replace('/[^A-Za-z0-9-]+/', '-', $department[0]->description);
			$row->slug = $slug2;
			$slug = $patient[0]->id . preg_replace('/[^A-Za-z0-9-]+/', '-', $department[0]->description);
			$tickets[] = $row;


			$ticketbydepartment[$slug2] = (int)$ticketbydepartment[$slug2] + 1;
			$ticketbydepartmentname[$slug2] = $department[0]->description;
		}

		$opent = 0;
		$closedt = 0;
		foreach ($tickets as $t) {
			//$ticketbydepartment[$slug2] = $ticketbydepartment[$slug2]*1+1;
			if ($t->status == 'Open') {
				$opent++;
				$ticketbydepartmentopen[$t->slug] = (int)$ticketbydepartmentopen[$t->slug] + 1;
			} else {
				$closedt++;
			}
		}
		$d1 = date('Md', strtotime($tdate));
		$d2 = date('Md', strtotime($fdatet));
		/*$message2 = 'Monthly IP Tickets Report: '.$d1.' to '.$d2.'%0a%0aTotal tickets:'.count($tickets).'%0aTickets Open:'.$opent.'%0aTickets Closed:'.$closedt.'%0a%0a';
								$ticketdepart = arsort($ticketbydepartment);
								$i=0;
								foreach($ticketbydepartment as $key=>$depart){
									if($i < 5){
										$closed = $ticketbydepartment[$key] - $ticketbydepartmentopen[$key];
										$open = $ticketbydepartmentopen[$key]*1;
										$i++;
										if($i == 2){
											$message2 .=$ticketbydepartmentname[$key].':Total:'.$ticketbydepartment[$key].', Open:'.$open.', Closed:'.$closed.'%0a';
										}else{
											$message2 .=$ticketbydepartmentname[$key].'-Total:'.$ticketbydepartment[$key].', Open:'.$open.', Closed:'.$closed.'%0a';
										}
									}
								}*/
		$message2 = 'Monthly IP Tickets Report: ' . $d1 . ' to ' . $d2 . '%0aTotal tickets: ' . count($tickets) . '%0aTickets Open: ' . $opent . '%0aTickets closed: ' . $closedt . '%0aTo view more details, please login to dashboard and click the link below:' . base_url() . '';

		$TEMPID = '1607100000000141423';
		$user = $this->get_user_by_sms_activity('IP-MONTHLY-TICKETS-REPORT-SMS');
		foreach ($user as $rowuser) {
			$number = $rowuser->mobile;
			$this->sendsms($message2, $number, $TEMPID);
		}
	}



	public function weeklynpsscore()
	{
		$fdate = date('Y-m-d', strtotime('-1 days'));
		$tdate = date('Y-m-d 00:00:00', strtotime('-7 days'));
		$this->db->select('bf_feedback.*,bf_patients.name as pname,bf_patients.patient_id as pid');
		$this->db->from('bf_feedback');
		$this->db->join('bf_patients', 'bf_patients.patient_id = bf_feedback.patientid', 'inner');

		if (isset($_SESSION['ward']) && $_SESSION['ward'] != 'ALL') {
			$this->db->where('bf_patients.ward', $_SESSION['ward']);
		}

		$fdate = date('Y-m-d', strtotime($fdate) + 86399);
		$fdatet = date('Y-m-d H:i:s', strtotime($fdate) + 86399);
		$this->db->where('bf_feedback.datet <=', $fdatet);
		$this->db->where('bf_feedback.datet >=', $tdate);
		$this->db->order_by('datetime', 'desc');
		$query = $this->db->get();
		$feedbacktaken = $query->result();
		$promoter = 0;
		$depromoter = 0;
		$passive = 0;
		foreach ($feedbacktaken as $r) {
			$this->db->where('feedbackid', $r->id);
			$query = $this->db->get('tickets');
			$dtata = $query->result();
			if (count($dtata) > 0) {
				//$param = json_decode($r->dataset);
				$below3++;
			}
			$param = json_decode($r->dataset);
		
			if ($param->recommend1Score > 4) {
				$promoter = $promoter + 1;
			} else {
				if ($param->recommend1Score == 4 || $param->recommend1Score == 3.5) {
					$passive = $passive + 1;
				} else {
					$depromoter = $depromoter + 1;
				}
			}
			//}
		}
		$d1 = date('Md', strtotime($tdate));
		$d2 = date('Md', strtotime($fdatet));
		$permoterpercentage = round((($promoter - $depromoter) / ($depromoter + $promoter + $passive)) * 100);
		$total = $depromoter + $promoter;
		$message1 = 'Weekly NPS Analysis: ' . $d1 . ' to ' . $d2 . '%0a%0aNet Promoters Score: ' . $permoterpercentage . '%25%0a';
		$message1 .= 'No. of Promoters: ' . $promoter . '/' . $total . '%0a';
		$message1 .= 'No. of Demoters: ' . $depromoter . '/' . $total . '%0a';
		$message1 .= 'No. of Passives: ' . $passive . '/' . $total . '%0a';
		$message1 .= '%0aNPS increased by 13%25 from last week';


		//$query = ;
		//echo $message1; exit;


		$TEMPID = '1607100000000084996';
		$user = $this->get_user_by_sms_activity('IP-WEEKLY-NPS-REPORT-SMS');
		foreach ($user as $rowuser) {
			$number = $rowuser->mobile;
			$this->sendsms($message1, $number, $TEMPID);
		}
	}

	public function monthlynpsscore()
	{
		$fdate = date('Y-m-d', strtotime('-1 days'));
		$tdate = date('Y-m-d', strtotime('-30 days'));
		$this->db->select('bf_feedback.*,bf_patients.name as pname,bf_patients.patient_id as pid');
		$this->db->from('bf_feedback');
		$this->db->join('bf_patients', 'bf_patients.patient_id = bf_feedback.patientid', 'inner');

		if (isset($_SESSION['ward']) && $_SESSION['ward'] != 'ALL') {
			$this->db->where('bf_patients.ward', $_SESSION['ward']);
		}

		$fdate = date('Y-m-d', strtotime($fdate) + 86399);
		$fdatet = date('Y-m-d H:i:s', strtotime($fdate) + 86399);
		$this->db->where('bf_feedback.datet <=', $fdatet);
		$this->db->where('bf_feedback.datet >=', $tdate);
		$this->db->order_by('datetime', 'desc');
		$query = $this->db->get();
		$feedbacktaken = $query->result();
		$promoter = 0;
		$depromoter = 0;
		$passive = 0;
		foreach ($feedbacktaken as $r) {
			$this->db->where('feedbackid', $r->id);
			$query = $this->db->get('tickets');
			$dtata = $query->result();
			if (count($dtata) > 0) {
				//$param = json_decode($r->dataset);
				$below3++;
			}
			$param = json_decode($r->dataset);
		
			if ($param->recommend1Score > 4) {
				$promoter = $promoter + 1;
			} else {
				if ($param->recommend1Score == 4 || $param->recommend1Score == 3.5) {
					$passive = $passive + 1;
				} else {
					$depromoter = $depromoter + 1;
				}
			}
			//}
		}
		$d1 = date('Md', strtotime($tdate));
		$d2 = date('Md', strtotime($fdatet));
		$permoterpercentage = round((($promoter - $depromoter) / ($depromoter + $promoter + $passive)) * 100);
		$total = $depromoter + $promoter;
		$message1 = 'Monthly NPS Analysis: ' . $d1 . ' to ' . $d2 . '%0a%0aNet Promoters Score: ' . $permoterpercentage . '%25%0a';
		$message1 .= 'No. of Promoters: ' . $promoter . '/' . $total . '%0a';
		$message1 .= 'No. of Demoters: ' . $depromoter . '/' . $total . '%0a';
		$message1 .= 'No. of Passives: ' . $passive . '/' . $total . '%0a';
		$message1 .= '%0aNPS increased by 13%25 from last month';


		//$query = ;

		$this->db->where('user_id', 2);
		$query = $this->db->get('user');
		$user = $query->result();

		$number = $user[0]->mobile;

		$TEMPID = '1607100000000084997';
		$user = $this->get_user_by_sms_activity('IP-MONTHLY-NPS-REPORT-SMS');
		foreach ($user as $rowuser) {
			$number = $rowuser->mobile;
			$this->sendsms($message1, $number, $TEMPID);
		}
	}

	public function weeklyiphospitalselection()
	{
		$fdate = date('Y-m-d', strtotime('-1 days'));
		$tdate = date('Y-m-d 00:00:00', strtotime('-7 days'));
		$overallarray = array(
			'location' => 'Location',
			'specificservice' => 'Specific services offered',
			'referred' => 'Referred by doctors',
			'friend' => 'Friend/Family recommendation',
			'previous' => 'Previous experience',
			'docAvailability' => 'Insurance facilities',
			'companyRecommend' => 'Company Recommendation',
			'otherReason' => 'Print or Online Media'
		);
		$this->db->select('bf_feedback.*,bf_patients.name as pname,bf_patients.patient_id as pid');
		$this->db->from('bf_feedback');
		$this->db->join('bf_patients', 'bf_patients.patient_id = bf_feedback.patientid', 'inner');

		if (isset($_SESSION['ward']) && $_SESSION['ward'] != 'ALL') {
			$this->db->where('bf_patients.ward', $_SESSION['ward']);
		}

		$fdate = date('Y-m-d', strtotime($fdate) + 86399);
		$fdatet = date('Y-m-d H:i:s', strtotime($fdate) + 86399);
		$this->db->where('bf_feedback.datet <=', $fdatet);
		$this->db->where('bf_feedback.datet >=', $tdate);
		$this->db->order_by('datetime', 'desc');
		$query = $this->db->get();
		$feedbacktaken = $query->result();
		$tcount = 0;

		foreach ($overallarray as $row => $v) {
			foreach ($feedbacktaken as $r) {
				$param = json_decode($r->dataset, true);
				foreach ($param as $k => $rval) {
					if ($k == $row) {
						if ($param[$k] != '') {
							$tcount++;
						}
					}
				}
			}
		}
		$message = 'Efeedor Weekly Insights:%0a';
		$d1 = date('Md', strtotime($tdate));
		$d2 = date('Md', strtotime($fdatet));
		$message .= 'Do you know why patients chose your hospital between ' . $d1 . ' to ' . $d2 . '?%0a';
		$message .= 'Out of ' . count($feedbacktaken) . ' patients%0a';
		$ratebartext = '';
		$ratebarparanamev = '';
		$t = 0;
		$selectionarray = array();
		$selectionarrayname = array();
		foreach ($overallarray as $row => $v) {
			$count = 0;
			foreach ($feedbacktaken as $r) {
				$param = json_decode($r->dataset, true);
				foreach ($param as $k => $rval) {
					if ($k == $row) {
						if ($param[$k] != '') {
							$count++;
						}
					}
				}
			}

			if (count($feedbacktaken) > 0) {
				$percentage = round(($count / $tcount) * 100);
			} else {
				$percentage = 0;
			}
			$selectionarray[$row] = $percentage;
			$selectionarrayname[$row] = $v;
		}

		arsort($selectionarray);
		foreach ($selectionarray as $key => $value) {
			$message .= $value . '%25 due to ' . $selectionarrayname[$key] . '%0a';
		}


		$TEMPID = '1607100000000084998';
		$user = $this->get_user_by_sms_activity('IP-WEEKLY-HOSPITAL-SELECTION-ANALYSIS-SMS');
		foreach ($user as $rowuser) {
			$number = $rowuser->mobile;
			$this->sendsms($message, $number, $TEMPID);
		}
	}

	public function montylyiphospitalselection()
	{
		$fdate = date('Y-m-d', strtotime('-1 days'));
		$tdate = date('Y-m-d', strtotime('-30 days'));
		$overallarray = array(
			'location' => 'Location',
			'specificservice' => 'Specific services offered',
			'referred' => 'Referred by doctors',
			'friend' => 'Friend/Family recommendation',
			'previous' => 'Previous experience',
			'docAvailability' => 'Insurance facilities',
			'companyRecommend' => 'Company Recommendation',
			'otherReason' => 'Print or Online Media'
		);
		$this->db->select('bf_feedback.*,bf_patients.name as pname,bf_patients.patient_id as pid');
		$this->db->from('bf_feedback');
		$this->db->join('bf_patients', 'bf_patients.patient_id = bf_feedback.patientid', 'inner');

		if (isset($_SESSION['ward']) && $_SESSION['ward'] != 'ALL') {
			$this->db->where('bf_patients.ward', $_SESSION['ward']);
		}

		$fdate = date('Y-m-d', strtotime($fdate) + 86399);
		$fdatet = date('Y-m-d H:i:s', strtotime($fdate) + 86399);
		$this->db->where('bf_feedback.datet <=', $fdatet);
		$this->db->where('bf_feedback.datet >=', $tdate);
		$this->db->order_by('datetime', 'desc');
		$query = $this->db->get();
		$feedbacktaken = $query->result();
		$tcount = 0;

		foreach ($overallarray as $row => $v) {
			foreach ($feedbacktaken as $r) {
				$param = json_decode($r->dataset, true);
				foreach ($param as $k => $rval) {
					if ($k == $row) {
						if ($param[$k] != '') {
							$tcount++;
						}
					}
				}
			}
		}
		$message = 'Efeedor Monthly Insights:%0a';
		$d1 = date('Md', strtotime($tdate));
		$d2 = date('Md', strtotime($fdatet));
		$message .= 'Do you know why patients chose your hospital between ' . $d1 . ' to ' . $d2 . '?%0a';
		$message .= 'Out of ' . count($feedbacktaken) . ' patients%0a';
		$ratebartext = '';
		$ratebarparanamev = '';
		$t = 0;
		$selectionarray = array();
		$selectionarrayname = array();
		foreach ($overallarray as $row => $v) {
			$count = 0;
			foreach ($feedbacktaken as $r) {
				$param = json_decode($r->dataset, true);
				foreach ($param as $k => $rval) {
					if ($k == $row) {
						if ($param[$k] != '') {
							$count++;
						}
					}
				}
			}

			if (count($feedbacktaken) > 0) {
				$percentage = round(($count / $tcount) * 100);
			} else {
				$percentage = 0;
			}
			$selectionarray[$row] = $percentage;
			$selectionarrayname[$row] = $v;
		}

		arsort($selectionarray);
		foreach ($selectionarray as $key => $value) {
			$message .= $value . '%25 due to ' . $selectionarrayname[$key] . '%0a';
		}


		$TEMPID = '1607100000000084999';
		$user = $this->get_user_by_sms_activity('IP-MONTHLY-HOSPITAL-SELECTION-ANALYSIS-SMS');
		foreach ($user as $rowuser) {
			$number = $rowuser->mobile;
			$this->sendsms($message, $number, $TEMPID);
		}
	}


	public function weeklyinsighthighlow()
	{
		//TODO
		$fdate = date('Y-m-d', strtotime('-1 days'));
		$tdate = date('Y-m-d 00:00:00', strtotime('-7 days'));
		$this->db->order_by('id');
		$query = $this->db->get('setup');
		$sresult = $query->result();
		$setarray = array();
		$questioarray = array();
		foreach ($sresult as $r) {
			$setarray[$r->type] = $r->title;
		}
		foreach ($sresult as $r) {
			$questioarray[$r->type][$r->shortkey] = $r->shortname;
		}
		$arraydata = array();
		foreach ($questioarray as $setr) {
			foreach ($setr as $k => $v) {
				$arraydata[$k] = $v;
			}
		}
		foreach ($arraydata as $key => $set) {
			$scoresets[$key] = 0;
			$scoresetcount[$key] = 0;
			$positive[$key] = 0;
			$negative[$key] = 0;
		}

		$this->db->select('bf_feedback.*,bf_patients.name as pname,bf_patients.patient_id as pid');
		$this->db->from('bf_feedback');
		$this->db->join('bf_patients', 'bf_patients.patient_id = bf_feedback.patientid', 'inner');

		if (isset($_SESSION['ward']) && $_SESSION['ward'] != 'ALL') {
			$this->db->where('bf_patients.ward', $_SESSION['ward']);
		}
		$fdate = date('Y-m-d', strtotime($fdate) + 86399);
		$fdatet = date('Y-m-d H:i:s', strtotime($fdate) + 86399);
		$this->db->where('bf_feedback.datet <=', $fdatet);
		$this->db->where('bf_feedback.datet >=', $tdate);
		$this->db->order_by('datetime', 'desc');
		$query = $this->db->get();
		$feedbacktaken = $query->result();
		foreach ($arraydata as $key => $set) {
			$score = 0;
			$maxscore = 0;
			foreach ($feedbacktaken as $r) {
				$param = json_decode($r->dataset);
				foreach ($param as $k => $p) {
					if ($k == $key) {
						if ($p > 0) {
							$scoresets[$key] = $scoresets[$key] + $p;
							$scoresetcount[$key] = $scoresetcount[$key] + 1;					//print_r($key); 					//print_r($param); exit;		

							if ($p > 2) {
								$positive[$key] = $positive[$key] + 1;
							} else {
								if ($p != 0) {
									$negative[$key] = $negative[$key] + 1;
								}
							}
						}
					}
				}
			}
		}
		foreach ($scoresets as $k => $val) {
			$scoreseto[$k] = round(($val / ($scoresetcount[$k] * 5)) * 100);

			$positives[$k] = round(($positive[$k] / $scoresetcount[$k]) * 100);

			$positive[$k] = $positive[$k];

			$negative[$k] = $negative[$k];

			// $negative[$k] = round(($negative[$k]/$scoresetcount[$k])   * 100);

			$scoreset[$k] = $positive[$k] + $negative[$k];
		}
		arsort($scoreseto);

		$k = 0;
		$highestname = '';
		$lowestname = '';
		$highestvalue = '';
		$lowestvalue = '';
		foreach ($scoreseto as $key => $value) {
			if ($k == 0) {
				$highestname = $arraydata[$key];
				$highestvalue = $value;
				$k = 1;
			} else {
				$lowestname = $arraydata[$key];
				$lowestvalue = $value;
			}
		}
		$d1 = date('Md', strtotime($tdate));
		$d2 = date('Md', strtotime($fdatet));

		$message = 'Efeedor Weekly Insights:%0a';
		$message .= 'The Highest and least performing feedback parameter from ' . $d1 . ' to ' . $d2 . ' are%0a';
		$message .= $highestname . ':' . round($highestvalue) . '%25%0a';
		$message .= $lowestname . ':' . round($lowestvalue) . '%25';

		$TEMPID = '1607100000000085000';
		$user = $this->get_user_by_sms_activity('IP-WEEKLY-TOP-&-LEAST-PERFORMING-PARAMETERS-SMS');
		foreach ($user as $rowuser) {
			$number = $rowuser->mobile;
			$this->sendsms($message, $number, $TEMPID);
		}
	}



	public function monthlyinsighthighlow()
	{
		//TODO
		$fdate = date('Y-m-d', strtotime('-1 days'));
		$tdate = date('Y-m-d', strtotime('-30 days'));
		$this->db->order_by('id');
		$query = $this->db->get('setup');
		$sresult = $query->result();
		$setarray = array();
		$questioarray = array();
		foreach ($sresult as $r) {
			$setarray[$r->type] = $r->title;
		}
		foreach ($sresult as $r) {
			$questioarray[$r->type][$r->shortkey] = $r->shortname;
		}
		$arraydata = array();
		foreach ($questioarray as $setr) {
			foreach ($setr as $k => $v) {
				$arraydata[$k] = $v;
			}
		}
		foreach ($arraydata as $key => $set) {
			$scoresets[$key] = 0;
			$scoresetcount[$key] = 0;
			$positive[$key] = 0;
			$negative[$key] = 0;
		}

		$this->db->select('bf_feedback.*,bf_patients.name as pname,bf_patients.patient_id as pid');
		$this->db->from('bf_feedback');
		$this->db->join('bf_patients', 'bf_patients.patient_id = bf_feedback.patientid', 'inner');

		if (isset($_SESSION['ward']) && $_SESSION['ward'] != 'ALL') {
			$this->db->where('bf_patients.ward', $_SESSION['ward']);
		}
		$fdate = date('Y-m-d', strtotime($fdate) + 86399);
		$fdatet = date('Y-m-d H:i:s', strtotime($fdate) + 86399);
		$this->db->where('bf_feedback.datet <=', $fdatet);
		$this->db->where('bf_feedback.datet >=', $tdate);
		$this->db->order_by('datetime', 'desc');
		$query = $this->db->get();
		$feedbacktaken = $query->result();
		foreach ($arraydata as $key => $set) {
			$score = 0;
			$maxscore = 0;
			foreach ($feedbacktaken as $r) {
				$param = json_decode($r->dataset);
				foreach ($param as $k => $p) {
					if ($k == $key) {
						if ($p > 0) {
							$scoresets[$key] = $scoresets[$key] + $p;
							$scoresetcount[$key] = $scoresetcount[$key] + 1;					//print_r($key); 					//print_r($param); exit;		

							if ($p > 2) {
								$positive[$key] = $positive[$key] + 1;
							} else {
								if ($p != 0) {
									$negative[$key] = $negative[$key] + 1;
								}
							}
						}
					}
				}
			}
		}
		foreach ($scoresets as $k => $val) {
			$scoreseto[$k] = round(($val / ($scoresetcount[$k] * 5)) * 100);

			$positives[$k] = round(($positive[$k] / $scoresetcount[$k]) * 100);

			$positive[$k] = $positive[$k];

			$negative[$k] = $negative[$k];

			// $negative[$k] = round(($negative[$k]/$scoresetcount[$k])   * 100);

			$scoreset[$k] = $positive[$k] + $negative[$k];
		}
		arsort($scoreseto);

		$k = 0;
		$highestname = '';
		$lowestname = '';
		$highestvalue = '';
		$lowestvalue = '';
		foreach ($scoreseto as $key => $value) {
			if ($k == 0) {
				$highestname = $arraydata[$key];
				$highestvalue = $value;
				$k = 1;
			} else {
				$lowestname = $arraydata[$key];
				$lowestvalue = $value;
			}
		}
		$d1 = date('Md', strtotime($tdate));
		$d2 = date('Md', strtotime($fdatet));

		$message = 'Efeedor Monthly Insights:%0a';
		$message .= 'The Highest and least performing feedback parameter from ' . $d1 . ' to ' . $d2 . ' are%0a';
		$message .= $highestname . ':' . round($highestvalue) . '%25%0a';
		$message .= $lowestname . ':' . round($lowestvalue) . '%25';

		$TEMPID = '1607100000000085001';
		$user = $this->get_user_by_sms_activity('IP-MONTHLY-TOP-&-LEAST-PERFORMING-PARAMETERS-SMS');
		foreach ($user as $rowuser) {
			$number = $rowuser->mobile;
			$this->sendsms($message, $number, $TEMPID);
		}
	}

	public function weeklyratinganalysis()
	{
		//$fdate = date('Y-m-d');
		$fdate = date('Y-m-d', strtotime('-1 days'));
		$tdate = date('Y-m-d 00:00:00', strtotime('-7 days'));

		$this->db->select('bf_feedback.*,bf_patients.name as pname,bf_patients.patient_id as pid');
		$this->db->from('bf_feedback');
		$this->db->join('bf_patients', 'bf_patients.patient_id = bf_feedback.patientid', 'inner');

		if (isset($_SESSION['ward']) && $_SESSION['ward'] != 'ALL') {
			$this->db->where('bf_patients.ward', $_SESSION['ward']);
		}
		$fdate = date('Y-m-d', strtotime($fdate) + 86399);
		$fdatet = date('Y-m-d H:i:s', strtotime($fdate) + 86399);
		$this->db->where('bf_feedback.datet <=', $fdatet);
		$this->db->where('bf_feedback.datet >=', $tdate);
		$this->db->order_by('datetime', 'desc');
		$query = $this->db->get();
		$feedbacktaken = $query->result();
		$for5 = array();
		$for4 = array();
		$for3 = array();
		$for2 = array();
		$for1 = array();
		$for1 = array();
		$for = array();
		foreach ($feedbacktaken as $row) {
			$param = json_decode($row->dataset);
			if ($param->overallScore == 5) {
				$for5['overallScore'] = $for5['overallScore'] + 1;
			}
			if ($param->overallScore == 4) {
				$for4['overallScore'] = $for4['overallScore'] + 1;
			}
			if ($param->overallScore == 3) {
				$for3['overallScore'] = $for3['overallScore'] + 1;
			}
			if ($param->overallScore == 2) {
				$for2['overallScore'] = $for2['overallScore'] + 1;
			}
			if ($param->overallScore == 1) {
				$for1['overallScore'] = $for1['overallScore'] + 1;
			}
			$for['overallScore'] = $for['overallScore'] + 1;
			$for['overallScoresum'] = $for['overallScoresum'] + $param->overallScore;
		}

		$d1 = date('Md', strtotime($tdate));
		$d2 = date('Md', strtotime($fdatet));
		$average = round(round($for['overallScoresum'] / ($for['overallScore'] * 5), 1) * 5, 1);
		$value5 = round((($for5['overallScore'] * 5) / ($for['overallScore'] * 5)) * 100, 1);
		$value4 = round((($for4['overallScore'] * 5) / ($for['overallScore'] * 5)) * 100, 1);
		$value3 = round((($for3['overallScore'] * 5) / ($for['overallScore'] * 5)) * 100, 1);
		$value2 = round((($for2['overallScore'] * 5) / ($for['overallScore'] * 5)) * 100, 1);
		$value1 = round((($for1['overallScore'] * 5) / ($for['overallScore'] * 5)) * 100, 1);
		$message = 'Efeedor Weekly Insights:%0a';
		$message .= 'Average patient rating from ' . $d1 . ' to ' . $d2 . '-' . $average . '/5%0a';
		$message .= 'Excellent:' . $value5 . '%25%0a';
		$message .= 'Very Good:' . $value4 . '%25%0a';
		$message .= 'Good:' . $value3 . '%25%0a';
		$message .= 'Poor:' . $value2 . '%25%0a';
		$message .= 'Worst:' . $value1 . '%25%0a';

		$TEMPID = '1607100000000085002';
		$user = $this->get_user_by_sms_activity('IP-WEEKLY-RATING-ANALYSIS-SMS');
		foreach ($user as $rowuser) {
			$number = $rowuser->mobile;
			$this->sendsms($message, $number, $TEMPID);
		}
	}


	public function monthlyratinganalysis()
	{
		//$fdate = date('Y-m-d');
		$fdate = date('Y-m-d', strtotime('-1 days'));
		$tdate = date('Y-m-d', strtotime('-30 days'));

		$this->db->select('bf_feedback.*,bf_patients.name as pname,bf_patients.patient_id as pid');
		$this->db->from('bf_feedback');
		$this->db->join('bf_patients', 'bf_patients.patient_id = bf_feedback.patientid', 'inner');

		if (isset($_SESSION['ward']) && $_SESSION['ward'] != 'ALL') {
			$this->db->where('bf_patients.ward', $_SESSION['ward']);
		}
		$fdate = date('Y-m-d', strtotime($fdate) + 86399);
		$fdatet = date('Y-m-d H:i:s', strtotime($fdate) + 86399);
		$this->db->where('bf_feedback.datet <=', $fdatet);
		$this->db->where('bf_feedback.datet >=', $tdate);
		$this->db->order_by('datetime', 'desc');
		$query = $this->db->get();
		$feedbacktaken = $query->result();
		$for5 = array();
		$for4 = array();
		$for3 = array();
		$for2 = array();
		$for1 = array();
		$for1 = array();
		$for = array();
		foreach ($feedbacktaken as $row) {
			$param = json_decode($row->dataset);
			if ($param->overallScore == 5) {
				$for5['overallScore'] = $for5['overallScore'] + 1;
			}
			if ($param->overallScore == 4) {
				$for4['overallScore'] = $for4['overallScore'] + 1;
			}
			if ($param->overallScore == 3) {
				$for3['overallScore'] = $for3['overallScore'] + 1;
			}
			if ($param->overallScore == 2) {
				$for2['overallScore'] = $for2['overallScore'] + 1;
			}
			if ($param->overallScore == 1) {
				$for1['overallScore'] = $for1['overallScore'] + 1;
			}
			$for['overallScore'] = $for['overallScore'] + 1;
			$for['overallScoresum'] = $for['overallScoresum'] + $param->overallScore;
		}

		$d1 = date('Md', strtotime($tdate));
		$d2 = date('Md', strtotime($fdatet));
		$average = round(round($for['overallScoresum'] / ($for['overallScore'] * 5), 1) * 5, 1);
		$value5 = round((($for5['overallScore'] * 5) / ($for['overallScore'] * 5)) * 100, 1);
		$value4 = round((($for4['overallScore'] * 5) / ($for['overallScore'] * 5)) * 100, 1);
		$value3 = round((($for3['overallScore'] * 5) / ($for['overallScore'] * 5)) * 100, 1);
		$value2 = round((($for2['overallScore'] * 5) / ($for['overallScore'] * 5)) * 100, 1);
		$value1 = round((($for1['overallScore'] * 5) / ($for['overallScore'] * 5)) * 100, 1);
		$message = 'Efeedor Monthly Insights:%0a';
		$message .= 'Average patient rating from ' . $d1 . ' to ' . $d2 . '-' . $average . '/5%0a';
		$message .= 'Excellent:' . $value5 . '%25%0a';
		$message .= 'Very Good:' . $value4 . '%25%0a';
		$message .= 'Good:' . $value3 . '%25%0a';
		$message .= 'Poor:' . $value2 . '%25%0a';
		$message .= 'Worst:' . $value1 . '%25%0a';

		$TEMPID = '1607100000000085003';
		$user = $this->get_user_by_sms_activity('IP-MONTHLY-RATING-ANALYSIS-SMS');
		foreach ($user as $rowuser) {
			$number = $rowuser->mobile;
			$this->sendsms($message, $number, $TEMPID);
		}
	}

	public function sendsms($sms, $mobile, $TEMPID)
	{

		$setting = $this->db->get('setting')->result();
		$HID = $setting[0]->description;
		$hospitalname = $setting[0]->title;
		$COMPANYNAME = '-%20ITATONE';
		$number = $mobile;
		//$number = 7349519468;

		$sms = 'HID:' . $HID . '%0a' . str_replace(' ', '%20', $sms) . '%0a' . $COMPANYNAME;
		$number = $mobile;
		//$number = 7349519468;
		$sms = str_replace(' ', '%20', $sms);
		$sms = str_replace('&', 'and', $sms);
		$sms = str_replace('NAN', '0', $sms);
		include('/home/cpefeedor/globalconfig.php');
		$query = 'INSERT INTO `notification`(`type`, `message`, `status`, `mobile_email`,`template_id` ,`HID`) VALUES ("message","' . $sms . '",0,"' . $mobile . '","' . $TEMPID . '","' . $HID . '")';
		$conn_g->query($query);



		$conn_g->close();

		/*$d = array(
										'type'=>'message',
										'status'=>0,
										'mobile_email'=>$mobile,
										'message'=>$sms,
										'template_id'=>$TEMPID
									 );
								$this->db->insert('notification',$d);*/
	}

	public function sendsms_whatsapp($mobile, $fdate, $tdate, $v1, $v2, $v3, $v4, $v5, $v6, $v7, $v8, $v9, $v10, $v11, $v12, $v13, $v14, $v15)
	{
		$fdate = (new DateTime($fdate))->format('Y-m-d');
		$tdate = (new DateTime($tdate))->format('Y-m-d');

		$setting = $this->db->get('setting')->result();
		$HID = $setting[0]->description;
		$hospitalname = $setting[0]->title;
		$COMPANYNAME = '-%20ITATONE';
		$number = $mobile;
		include('/home/cpefeedor/globalconfig.php');
		// Assign values to separate variables
		$td = $tdate;
		$fd = $fdate;

		$val1 = $v1;
		$val2 = $v2;
		$val3 = $v3;
		$val4 = $v4;
		$val5 = $v5;
		$val6 = $v6;
		$val7 = $v7;
		$val8 = $v8;
		$val9 = $v9;
		$val10 = $v10;
		$val11 = $v11;
		$val12 = $v12;
		$val13 = $v13;
		$val14 = $v14;
		$val15 = $v15;
		$val15 = strip_tags(trim($val15)); // Remove HTML tags

		$templateParamsArray = [
			$td,
			$fd,
			$hospitalname,
			$val1,
			$val2,
			$val3,
			$val4,
			$val5,
			$val6,
			$val7,
			$val8,
			$val9,
			$val10,
			$val11,
			$val12,
			$val13,
			$val14,
			$val15,
			$hospitalname
		];

		// Convert all values to strings
		$templateParamsArray = array_map('strval', $templateParamsArray);

		// Encode to JSON
		$templateParams = json_encode($templateParamsArray);

		$insert_notification_query = "INSERT INTO notifications_whatsapp 
		  (destination, userName, campaignName, templateParams, source, media, buttons, carouselCards, location, paramsFallbackValue, status) 
		  VALUES (
			  '91$number', 
			  'ITATONE POINT CONSULTING LLP 7345', 
			  'weeklyoverallsummary_inpatient_feedback_report_for_user', 
			  '" . addslashes($templateParams) . "', 
			  'new-landing-page form', '{}', '[]', '[]', '{}', 
			  '" . json_encode(["FirstName" => "user"]) . "', 'pending'
		  )";
		// Execute the second query
		if ($conn_g->query($insert_notification_query) === TRUE) {
			echo "Data inserted into notifications table successfully.<br>";
		} else {
			echo "Error: " . $conn_g->error . "<br>";
		}
		if (json_last_error() !== JSON_ERROR_NONE) {
			echo "JSON Error: " . json_last_error_msg();
			exit;
		}
		$templateParams = json_encode([
			$td,
			$fd,
			$hospitalname,
			$val1,
			$val2,
			$val3,
			$val4,
			$val5,
			$val6,
			$val7,
			$val8,
			$val9,
			$val10,
			$val11,
			$val12,
			$val13,
			$val14,
			trim($val15),
			$hospitalname
		]);


		echo "Template Params: " . $templateParams;
		exit;

		$conn_g->close();

		/*$d = array(
										'type'=>'message',
										'status'=>0,
										'mobile_email'=>$mobile,
										'message'=>$sms,
										'template_id'=>$TEMPID
									 );
								$this->db->insert('notification',$d);*/
	}


	public function shedule_messages()
	{
		//$section = array('IP','OP','HC','EM');
		$shedules = $this->db->get('shedule_notification')->result();
		foreach ($shedules as $row) {
			$day = date('l');
			$hour = date('H');
			$min = date('i');
			$date = date('d');
			$hourapi = date('H', strtotime($row->time));
			$dateapi = $row->datevalue;
			$minapi = date('i', strtotime($row->time));
			$dayapi = $row->day;
			if (strpos($row->path, 'email') === false) {
				if (strpos($row->path, 'messageop') === false) {
					$fun = str_replace('/', '', str_replace('message/', '', $row->path));
					if ($row->datevalue == 0) {
						if ($day == $dayapi && $hour == $hourapi && $min == $minapi) {
							//echo $fun; exit;
							$this->$fun();
						}
					} else {
						if ($date == $dateapi && $hour == $hourapi && $min == $minapi) {
							$this->$fun();
						}
					}
				}
			}
		}
	}

	/*public function send_message_now(){
					
					$messages = $this->db->where('status',0)->where('type','message')->get('notification',1)->result();
					foreach($messages as $row){
						$TEMPID = $row->template_id;
						$number = $row->mobile_email;
						$message = $row->message;
						echo $url = 'http://sms.digimiles.in/bulksms/bulksms?username=di78-ehrapp&password=digi123&type=0&dlr=1&entityid=1201159118005685119&tempid='.$TEMPID.'&destination='.$number.'&source=FEEDOR&message='.$message;
						$curl_handle=curl_init();
						curl_setopt($curl_handle,CURLOPT_URL,$url);
						curl_setopt($curl_handle,CURLOPT_CONNECTTIMEOUT,2);
						curl_setopt($curl_handle,CURLOPT_RETURNTRANSFER,1);
						$buffer = curl_exec($curl_handle);
						curl_close($curl_handle);
						if (empty($buffer)){
							  print "Nothing returned from url.<p>";
						}else{
							  echo 'Done';
							  print $buffer;
						}
						$d = array('status'=>1);
						$this->db->where('id',$row->id)->update('notification',$d);
					}
				}*/
}
