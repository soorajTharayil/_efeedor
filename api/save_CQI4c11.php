<?php
include('db.php');

$patinet_id = $_GET['patient_id'];

$month = $_GET['month'];  // e.g., "January"
$year = $_GET['year'];    // e.g., "2024"

$d = file_get_contents('php://input');

$data = json_decode($d, true);

if (count($data) > 1) {
	date_default_timezone_set('Asia/Kolkata');
	$data['name'] = strtoupper($data['name']);
	$today = date('Y-m-d');

	
	// Convert month name to number
    $monthNumber = date('m', strtotime($month));  // Converts "January" to "01", etc.
    
    // Get the current day and time
    $currentDay = date('d');  // Get the current day
    $currentTime = date('H:i:s');  // Get the current time
    
    // Construct `datet` and `datetime`
    //$datet = $year . '-' . $monthNumber . '-'. $currentDay;  // Constructs the date as "YYYY-MM-01"
    $datetime = $year . '-' . $monthNumber . '-' . $currentDay . ' ' . $currentTime;  // Constructs the datetime as "YYYY-MM-DD HH:MM:SS"



	
	$name =	$data['name'];
	$patientid =	$data['patientid'];
	$department =	$data['department'];
	$patient_category =	$data['patient_category'];
	$email =	$data['email'];
	$contactnumber =	$data['contactnumber'];
	$patient_got_admitted =	$data['initial_assessment_hr1'];
	$doctor_completed_assessment =	$data['initial_assessment_hr2'];
	$initial_assessment =	$data['calculatedResult'];
	$consent_verified =	$data['consent_verified'];
	$consent_verified_comment = $data['consent_comment'];
	$discharge_summary =	$data['discharge_summary'];
	$error_prone =	$data['error_prone'];
	$error_prone_comment =	$data['error_prone_comment'];
	$doctor_adviced_discharge =	$data['initial_assessment_hr3'];
	$bill_paid_time =	$data['initial_assessment_hr4'];
	$time_taken_for_discharge =	$data['calculatedDoctorAdviceToBillPaid'];
	$comments = $data['dataAnalysis'];
	
	




   $query = 'INSERT INTO `bf_feedback_CQI4c11` (`name`,`patientid`,`department`,`patient_category`,`mobile`,`email`,`datetime`,`datet`,`patient_got_admitted`, `doctor_completed_assessment`, `initial_assessment`, `consent_verified`,`consent_comment`, `discharge_summary`,`error_prone`,`error_prone_comment`,`doctor_adviced_discharge`, `bill_paid_time`, `time_taken_for_discharge`,`comments`, `dataset`) 
   VALUES ("' . $name . '","' . $patientid . '","' . $department . '","' . $patient_category . '","' . $contactnumber . '","' . $email . '","' . $datetime . '","' . $today . '","' . $patient_got_admitted . '","' . $doctor_completed_assessment . '","' . $initial_assessment . '","' . $consent_verified . '","' . $consent_verified_comment . '","' . $discharge_summary . '","' . $error_prone . '","' . $error_prone_comment . '","' . $doctor_adviced_discharge . '","' . $bill_paid_time . '","' . $time_taken_for_discharge . '","' . $comments . '","' . mysqli_real_escape_string($con, json_encode($data)) . '")';

  $result = mysqli_query($con, $query);
  $fid = mysqli_insert_id($con);

	$response['status'] = 'success';
	$response['message'] = 'Data saved sucessfully';

	echo json_encode($response);


	mysqli_close($con);
}


//TRIGGER CURL.php
$curl = curl_init();
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_URL, $baseurl . 'api/curl.php');
curl_exec($curl);
