<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Messageint extends CI_Controller
{


	public function __construct()
	{
		parent::__construct();
		$this->load->model(
			array(

				'opt/int_opt_model_weekly',
				'pc_model'

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
		$table_feedback = 'bf_feedback_int';
		$table_patients = 'bf_patients';
		$sorttime = 'asc';
		$setup = 'setup_int';
		$asc = 'asc';
		$desc = 'desc';
		$table_tickets = 'tickets_int';
		$open = 'Open';
		$closed = 'Closed';
		$addressed = 'Addressed';
		$table_ticket_action = 'ticket_int_message';
		$type = 'interim';
		$department = 'department';
		$reopen = 'Reopen';
		$fdate = date('Y-m-d 23:59:59'); // End of today
		$tdate = date('Y-m-d 00:00:00', strtotime('-6 days')); // Start date (last Monday)

		$this->db->select('id');
		$this->db->from('bf_feedback_int');
		$this->db->where('datet >=', $tdate);
		$this->db->where('datet <=', $fdate);
		$query = $this->db->get();

		$weekly_feedback_count = $query->num_rows(); // Count of feedback
		$ip_feedbacks_count = $this->int_opt_model_weekly->patient_and_feedback($table_patients, $table_feedback, $sorttime, $setup);
		$totalFeedbackList = $ip_feedbacks_count;
		$allTickets = $this->int_opt_model_weekly->get_tickets($table_feedback, $table_tickets);
		$ip_psat = $this->int_opt_model_weekly->psat_analytics($table_patients, $table_feedback, $table_tickets, $sorttime, $allTickets, $totalFeedbackList);
		$ip_psat_tool = 'Satisfied Patients: ' . ($ip_psat['satisfied_count']) . ', ' . "Unsatisfied Patients: " . ($ip_psat['unsatisfied_count']) . '. ';

		// IP ANALYTICS
		$ip_nps = $this->int_opt_model_weekly->nps_analytics($table_feedback, $asc, $setup);
		$ip_nps_tool = 'Promoters: ' . ($ip_nps['promoters_count']) . ', ' . "Detractors: " . ($ip_nps['detractors_count']) . ', ' . "Passives: " . ($ip_nps['passives_count']);
		$ip_tickets_count = $this->int_opt_model_weekly->feedback_and_ticket($table_feedback, $table_tickets, $sorttime);
		$total_ticket_count = count($ip_tickets_count);
		$key_highlights = $this->int_opt_model_weekly->key_highlights($table_patients, $table_feedback, $sorttime, $setup, $totalFeedbackList);

		$alltickets = $this->int_opt_model_weekly->alltickets();
		$opentickets = $this->int_opt_model_weekly->read();
		$closedtickets = $this->int_opt_model_weekly->read_close();
		$addressedtickets = $this->int_opt_model_weekly->addressedtickets();
		$ticket = $this->pc_model->tickets_recived_by_department_interim($type, $table_feedback, $table_tickets);

		$ticket_resolution_rate = $this->int_opt_model_weekly->ticket_resolution_rate($table_tickets, $closed, $table_feedback, $allTickets);
		$close_rate = $this->int_opt_model_weekly->ticket_rate($table_tickets, $status, $table_feedback, $table_ticket_action, $allTickets);
		$ticket_close_rate = secondsToTime($close_rate);


		$maxPercentage = PHP_INT_MIN;
		$minPercentage = PHP_INT_MAX;

		$maxDepartment = [];
		$minDepartment = [];

		foreach ($ticket as $item) {
			// print_r(count($ticket));

			if ($item['percentage'] > 0) {
				if ($item['percentage'] > $maxPercentage) {
					$maxPercentage = $item['percentage'];
					$maxDepartment = $item['department'];
				}

				if ($item['percentage'] < $minPercentage) {
					$minPercentage = $item['percentage'];
					$minDepartment = $item['department'];
				}
			}
		}

		if ($minDepartment && $maxDepartment != null) {
			$lowest_complain = $minDepartment;
			$highest_complain = $maxDepartment;
		} else {
			$lowest_complain = '-';
			$highest_complain = '-';
		}




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

		$user = $this->get_user_by_sms_activity('PCF-WEEKLY-FEEDBACKS-REPORT-WHATSAPP');
		foreach ($user as $rowuser) {
			$number = $rowuser->mobile;
			// $this->sendsms($message1, $number, $TEMPID);
			$this->sendsms_whatsapp($number, $fdate, $tdate, $alltickets, $opentickets, $addressedtickets, $closedtickets, $lowest_complain, $ticket_resolution_rate, $ticket_close_rate);
		}
	}
	public function sendsms_whatsapp($mobile, $fdate, $tdate, $v1, $v2, $v3, $v4, $v5, $v6, $v7)
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


		$val7 = strip_tags(trim($val7)); // Remove HTML tags

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
			  'weeklyoverallsummary_patientcomplaint_reports', 
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
			trim($val7),
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




	// Reminder alert for Preventive Maintainnance 
	public function sendAssetPreventiveAlert()
	{
		$today = date('Y-m-d');

		// Get assets with a reminder due today (either reminder_alert_1 or reminder_alert_2)
		$this->db->select('*');
		$this->db->from('bf_feedback_asset_creation');
		$this->db->where('DATE(reminder_alert_1)', $today);
		$this->db->or_where('DATE(reminder_alert_2)', $today);
		$query = $this->db->get();


		if ($query->num_rows() > 0) {
			$assets = $query->result();

			foreach ($assets as $asset) {

				// Prepare message content

				$assetId = $asset->id;
				$assetName = $asset->assetname;
				$assetCode = $asset->patientid;
				$locationSite = $asset->locationsite ?? '';
				$bedNo = $asset->bedno ?? '';
				$assetGroup = $asset->ward;
				$assetLastPreventive = $asset->preventive_maintenance_date;
				$assetUpcomingPreventive = $asset->upcoming_preventive_maintenance_date;

				$reminderDate = ($asset->reminder_alert_1 == $today) ? $asset->reminder_alert_1 : $asset->reminder_alert_2;
				$daysRemaining = (strtotime($asset->upcoming_preventive_maintenance_date) - strtotime($reminderDate)) / (60 * 60 * 24);
				$daysRemaining = (int) $daysRemaining;

				$assetLink = base_url("asset/track/" . $assetId);


				if (!empty($asset->assignee)) {
					$this->db->select('mobile');
					$this->db->from('user');
					$this->db->where('firstname', $asset->assignee);
					$query = $this->db->get();

					// If a user is found, update mobile
					if ($query->num_rows() > 0) {
						$result = $query->row();
						$mobile = $result->mobile;
					}
				}

				// Send WhatsApp message
				$this->send_whatsapp_asset_preventive_alert($mobile, $daysRemaining, $assetName, $assetCode, $locationSite, $bedNo, $assetGroup, $assetLastPreventive, $assetUpcomingPreventive, $assetLink);
			}
		} else {
			echo "No asset reminders for today.";
		}
	}

	public function send_whatsapp_asset_preventive_alert($mobile, $daysRemaining, $assetName, $assetCode, $locationSite, $bedNo, $assetGroup, $assetLastPreventive, $assetUpcomingPreventive, $assetLink)
	{

		$setting = $this->db->get('setting')->result();
		$HID = $setting[0]->description;
		$hospitalname = $setting[0]->title;
		$COMPANYNAME = '-%20ITATONE';
		$number = $mobile;
		include('/home/cpefeedor/globalconfig.php');

		$daysRemaining = $daysRemaining;
		$assetName = $assetName;
		$assetCode = $assetCode;
		$locationSite = $locationSite;
		$bedNo = $bedNo;
		$assetGroup = $assetGroup;
		$assetLastPreventive = $assetLastPreventive;
		$assetUpcomingPreventive = $assetUpcomingPreventive;
		$assetLink = $assetLink;


		$templateParamsArray = [
			$daysRemaining,
			$assetName,
			$assetCode,
			$locationSite = $locationSite,
			$bedNo = $bedNo,
			$assetGroup,
			$assetLastPreventive,
			$assetUpcomingPreventive,
			$assetLink,
			$hospitalname
		];

		// Convert all values to strings
		$templateParamsArray = array_map('strval', $templateParamsArray);

		// Encode to JSON
		$templateParams = json_encode($templateParamsArray);



		$insert_notification_query = "INSERT INTO notifications_whatsapp 
      (destination, userName, campaignName, templateParams, source, media, buttons, carouselCards, location, paramsFallbackValue, status) 
      VALUES (
          '91$mobile', 
          'ITATONE POINT CONSULTING LLP 7345', 
          'preventive_maintance_alert_for_30days', 
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
			$daysRemaining,
			$assetName,
			$assetCode,
			$locationSite = $locationSite,
			$bedNo = $bedNo,
			$assetGroup,
			$assetLastPreventive,
			$assetUpcomingPreventive,
			$assetLink,
			$hospitalname
		]);


		echo "Template Params: " . $templateParams;
		exit;

		$conn_g->close();
	}


	// Reminder alert for Calibration
	public function sendAssetCalibrationAlert()
	{
		$today = date('Y-m-d');

		// Get assets with a reminder due today (either reminder_alert_1 or reminder_alert_2)
		$this->db->select('*');
		$this->db->from('bf_feedback_asset_creation');
		$this->db->where('DATE(calibration_reminder_alert_1)', $today);
		$this->db->or_where('DATE(calibration_reminder_alert_2)', $today);
		$query = $this->db->get();


		if ($query->num_rows() > 0) {
			$assets = $query->result();

			foreach ($assets as $asset) {

				// Prepare message content

				$assetId = $asset->id;
				$assetName = $asset->assetname;
				$assetCode = $asset->patientid;
				$locationSite = $asset->locationsite ?? '';
				$bedNo = $asset->bedno ?? '';
				$assetGroup = $asset->ward;
				$assetLastCalibration = $asset->asset_calibration_date;
				$assetUpcomingCalibration = $asset->upcoming_calibration_date;

				$reminderDate = ($asset->calibration_reminder_alert_1 == $today) ? $asset->calibration_reminder_alert_1 : $asset->calibration_reminder_alert_2;
				$daysRemaining = (strtotime($asset->upcoming_calibration_date) - strtotime($reminderDate)) / (60 * 60 * 24);
				$daysRemaining = (int) $daysRemaining;

				$assetLink = base_url("asset/track/" . $assetId);


				if (!empty($asset->assignee)) {
					$this->db->select('mobile');
					$this->db->from('user');
					$this->db->where('firstname', $asset->assignee);
					$query = $this->db->get();

					// If a user is found, update mobile
					if ($query->num_rows() > 0) {
						$result = $query->row();
						$mobile = $result->mobile;
					}
				}

				// Send WhatsApp message
				$this->send_whatsapp_asset_calibration_alert($mobile, $daysRemaining, $assetName, $assetCode, $locationSite, $bedNo, $assetGroup, $assetLastCalibration, $assetUpcomingCalibration, $assetLink);
			}
		} else {
			echo "No asset reminders for today.";
		}
	}

	public function send_whatsapp_asset_calibration_alert($mobile, $daysRemaining, $assetName, $assetCode, $locationSite, $bedNo, $assetGroup, $assetLastCalibration, $assetUpcomingCalibration, $assetLink)
	{

		$setting = $this->db->get('setting')->result();
		$HID = $setting[0]->description;
		$hospitalname = $setting[0]->title;
		$COMPANYNAME = '-%20ITATONE';
		$number = $mobile;
		include('/home/cpefeedor/globalconfig.php');

		$daysRemaining = $daysRemaining;
		$assetName = $assetName;
		$assetCode = $assetCode;
		$locationSite = $locationSite;
		$bedNo = $bedNo;
		$assetGroup = $assetGroup;
		$assetLastCalibration = $assetLastCalibration;
		$assetUpcomingCalibration = $assetUpcomingCalibration;
		$assetLink = $assetLink;


		$templateParamsArray = [
			$daysRemaining,
			$assetName,
			$assetCode,
			$locationSite = $locationSite,
			$bedNo = $bedNo,
			$assetGroup,
			$assetLastCalibration,
			$assetUpcomingCalibration,
			$assetLink,
			$hospitalname
		];

		// Convert all values to strings
		$templateParamsArray = array_map('strval', $templateParamsArray);

		// Encode to JSON
		$templateParams = json_encode($templateParamsArray);



		$insert_notification_query = "INSERT INTO notifications_whatsapp 
      (destination, userName, campaignName, templateParams, source, media, buttons, carouselCards, location, paramsFallbackValue, status) 
      VALUES (
          '91$mobile', 
          'ITATONE POINT CONSULTING LLP 7345', 
          'asset_calibration_alert', 
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
			$daysRemaining,
			$assetName,
			$assetCode,
			$locationSite = $locationSite,
			$bedNo = $bedNo,
			$assetGroup,
			$assetLastCalibration,
			$assetUpcomingPreventive,
			$assetLink,
			$hospitalname
		]);


		echo "Template Params: " . $templateParams;
		exit;

		$conn_g->close();
	}


	// Reminder alert for warranty
	public function sendAssetWarrantyAlert()
	{
		$today = date('Y-m-d');

		// Get assets with a reminder due today (either reminder_alert_1 or reminder_alert_2)
		$this->db->select('*');
		$this->db->from('bf_feedback_asset_creation');
		$this->db->where('DATE(warranty_alert_1)', $today);
		$this->db->or_where('DATE(warranty_alert_2)', $today);
		$query = $this->db->get();


		if ($query->num_rows() > 0) {
			$assets = $query->result();

			foreach ($assets as $asset) {

				// Prepare message content

				$assetId = $asset->id;
				$assetName = $asset->assetname;
				$assetCode = $asset->patientid;
				$locationSite = $asset->locationsite ?? '';
				$bedNo = $asset->bedno ?? '';
				$assetGroup = $asset->ward;
				$assetWarrenty = $asset->warrenty;
				$assetWarrentyEnd = $asset->warrenty_end;

				$reminderDate = ($asset->warranty_alert_1 == $today) ? $asset->warranty_alert_1 : $asset->warranty_alert_2;
				$daysRemaining = (strtotime($asset->warrenty_end) - strtotime($reminderDate)) / (60 * 60 * 24);
				$daysRemaining = (int) $daysRemaining;

				$assetLink = base_url("asset/track/" . $assetId);


				if (!empty($asset->assignee)) {
					$this->db->select('mobile');
					$this->db->from('user');
					$this->db->where('firstname', $asset->assignee);
					$query = $this->db->get();

					// If a user is found, update mobile
					if ($query->num_rows() > 0) {
						$result = $query->row();
						$mobile = $result->mobile;
					}
				}

				// Send WhatsApp message
				$this->send_whatsapp_asset_warranty_alert($mobile, $daysRemaining, $assetName, $assetCode, $locationSite, $bedNo, $assetGroup, $assetWarrenty, $assetWarrentyEnd, $assetLink);
			}
		} else {
			echo "No asset reminders for today.";
		}
	}

	public function send_whatsapp_asset_warranty_alert($mobile, $daysRemaining, $assetName, $assetCode, $locationSite, $bedNo, $assetGroup, $assetWarrenty, $assetWarrentyEnd, $assetLink)
	{

		$setting = $this->db->get('setting')->result();
		$HID = $setting[0]->description;
		$hospitalname = $setting[0]->title;
		$COMPANYNAME = '-%20ITATONE';
		$number = $mobile;
		include('/home/cpefeedor/globalconfig.php');

		$daysRemaining = $daysRemaining;
		$assetName = $assetName;
		$assetCode = $assetCode;
		$locationSite = $locationSite;
		$bedNo = $bedNo;
		$assetGroup = $assetGroup;
		$assetWarrenty = $assetWarrenty;
		$assetWarrentyEnd = $assetWarrentyEnd;
		$assetLink = $assetLink;


		$templateParamsArray = [
			$daysRemaining,
			$assetName,
			$assetCode,
			$locationSite = $locationSite,
			$bedNo = $bedNo,
			$assetGroup,
			$assetWarrenty,
			$assetWarrentyEnd,
			$assetLink,
			$hospitalname
		];

		// Convert all values to strings
		$templateParamsArray = array_map('strval', $templateParamsArray);

		// Encode to JSON
		$templateParams = json_encode($templateParamsArray);



		$insert_notification_query = "INSERT INTO notifications_whatsapp 
      (destination, userName, campaignName, templateParams, source, media, buttons, carouselCards, location, paramsFallbackValue, status) 
      VALUES (
          '91$mobile', 
          'ITATONE POINT CONSULTING LLP 7345', 
          'warrantyexpire_alert_dynamic', 
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
			$daysRemaining,
			$assetName,
			$assetCode,
			$locationSite = $locationSite,
			$bedNo = $bedNo,
			$assetGroup,
			$assetWarrenty,
			$assetWarrentyEnd,
			$assetLink,
			$hospitalname
		]);


		echo "Template Params: " . $templateParams;
		exit;

		$conn_g->close();
	}


	// Reminder alert for contract
	public function sendAssetContractAlert()
	{
		$today = date('Y-m-d');

		// Get assets with a reminder due today (either reminder_alert_1 or reminder_alert_2)
		$this->db->select('*');
		$this->db->from('bf_feedback_asset_creation');
		$this->db->where('DATE(contract_alert_1)', $today);
		$this->db->or_where('DATE(contract_alert_2)', $today);
		$query = $this->db->get();


		if ($query->num_rows() > 0) {
			$assets = $query->result();

			foreach ($assets as $asset) {

				// Prepare message content

				$assetId = $asset->id;
				$assetName = $asset->assetname;
				$assetCode = $asset->patientid;
				$locationSite = $asset->locationsite ?? '';
				$bedNo = $asset->bedno ?? '';
				$assetGroup = $asset->ward;
				$assetContract = $asset->contract;
				$assetContractStart = $asset->contract_start_date;
				$assetContractEnd = $asset->contract_end_date;

				$reminderDate = ($asset->contract_alert_1 == $today) ? $asset->contract_alert_1 : $asset->contract_alert_2;
				$daysRemaining = (strtotime($asset->contract_end_date) - strtotime($reminderDate)) / (60 * 60 * 24);
				$daysRemaining = (int) $daysRemaining;

				$assetLink = base_url("asset/track/" . $assetId);


				if (!empty($asset->assignee)) {
					$this->db->select('mobile');
					$this->db->from('user');
					$this->db->where('firstname', $asset->assignee);
					$query = $this->db->get();

					// If a user is found, update mobile
					if ($query->num_rows() > 0) {
						$result = $query->row();
						$mobile = $result->mobile;
					}
				}

				// Send WhatsApp message
				$this->send_whatsapp_asset_contract_alert($mobile, $daysRemaining, $assetName, $assetCode, $locationSite, $bedNo, $assetGroup, $assetContract , $assetContractStart, $assetContractEnd, $assetLink);
			}
		} else {
			echo "No asset reminders for today.";
		}
	}

	public function send_whatsapp_asset_contract_alert($mobile, $daysRemaining, $assetName, $assetCode, $locationSite, $bedNo, $assetGroup, $assetContract , $assetContractStart, $assetContractEnd, $assetLink)
	{

		$setting = $this->db->get('setting')->result();
		$HID = $setting[0]->description;
		$hospitalname = $setting[0]->title;
		$COMPANYNAME = '-%20ITATONE';
		$number = $mobile;
		include('/home/cpefeedor/globalconfig.php');

		$daysRemaining = $daysRemaining;
		$assetName = $assetName;
		$assetCode = $assetCode;
		$locationSite = $locationSite;
		$bedNo = $bedNo;
		$assetGroup = $assetGroup;
		$assetContract = $assetContract;
		$assetContractStart = $assetContractStart;
		$assetContractEnd = $assetContractEnd;
		$assetLink = $assetLink;


		$templateParamsArray = [
			$daysRemaining,
			$assetName,
			$assetCode,
			$locationSite = $locationSite,
			$bedNo = $bedNo,
			$assetGroup,
			$assetContract,
			$assetContractStart,
			$assetContractEnd,
			$assetLink,
			$hospitalname
		];

		// Convert all values to strings
		$templateParamsArray = array_map('strval', $templateParamsArray);

		// Encode to JSON
		$templateParams = json_encode($templateParamsArray);



		$insert_notification_query = "INSERT INTO notifications_whatsapp 
      (destination, userName, campaignName, templateParams, source, media, buttons, carouselCards, location, paramsFallbackValue, status) 
      VALUES (
          '91$mobile', 
          'ITATONE POINT CONSULTING LLP 7345', 
          'amc_cmc_alerts', 
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
			$daysRemaining,
			$assetName,
			$assetCode,
			$locationSite = $locationSite,
			$bedNo = $bedNo,
			$assetGroup,
			$assetContract,
			$assetContractStart,
			$assetContractEnd,
			$assetLink,
			$hospitalname
		]);


		echo "Template Params: " . $templateParams;
		exit;

		$conn_g->close();
	}

}
