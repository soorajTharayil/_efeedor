<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);


//error_reporting(E_ALL);
$i = 0;
include('db.php');




$sql = 'SELECT * FROM `setting` WHERE 1';
$result = mysqli_query($con, $sql);
$data['setting_data'] = mysqli_fetch_object($result);
$path = '../uploads/' . $data['setting_data']->qr_code_image;
$type = pathinfo($path, PATHINFO_EXTENSION);
$datap = file_get_contents($path);
$data['setting_data']->qr_code_image = 'data:image/' . $type . ';base64,' . base64_encode($datap);


$path = '../uploads/' . $data['setting_data']->logo;
$type = pathinfo($path, PATHINFO_EXTENSION);
$datap = file_get_contents($path);
$data['setting_data']->logo = 'data:image/' . $type . ';base64,' . base64_encode($datap);


$data['setting_data']->android_apk = 'https://' . $link . '/uploads/' . $data['setting_data']->android_apk;


//$ch = curl_init($baseurl . 'SetupEfeeder/questionsinc?s=INCIDENT');
//curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//curl_setopt($ch, CURLOPT_BINARYTRANSFER, true);
//$output = curl_exec($ch);

//$data['question_set'] = json_decode($output, true);

// If decode fails or API gives nothing, set to []
//if (json_last_error() !== JSON_ERROR_NONE || !is_array($data['question_set'])) {
  //  $data['question_set'] = [];
//}

//$x = count($data['question_set']);

$apiUrl = $baseurl . 'SetupEfeeder/questionsinc?s=INCIDENT';
$ch = curl_init($apiUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$output = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

if ($output === false) {
    $data['question_set'] = [];
    $data['question_set_error'] = 'Curl error: ' . curl_error($ch);
} elseif ($httpCode !== 200) {
    $data['question_set'] = [];
    $data['question_set_error'] = "HTTP error: $httpCode";
    $data['question_set_raw'] = $output;
} else {
    $decoded = json_decode($output, true);
    if (json_last_error() !== JSON_ERROR_NONE) {
        $data['question_set'] = [];
        $data['question_set_error'] = 'JSON decode error: ' . json_last_error_msg();
        $data['question_set_raw'] = $output;
    } else {
        $data['question_set'] = $decoded;
    }
}
curl_close($ch);


$sql = 'SELECT * FROM `bf_ward_esr` WHERE 1 order by orderd	 asc';
$result = mysqli_query($con, $sql);
$num1 = mysqli_num_rows($result);

$j = 0;

if ($num1 > 0) {
	while ($row = mysqli_fetch_object($result)) {

		$data['ward'][$j]['title'] = $row->title;
		$data['ward'][$j]['guid'] = $row->guid;
		$data['ward'][$j]['bedno'] = explode(',', $row->bed_no);
		$i++;
		$j++;
	}
}

$sql = 'SELECT * FROM `user` WHERE 1 ';
$result = mysqli_query($con, $sql);
$num1 = mysqli_num_rows($result);
$j = 0;
if ($num1 > 0) {
	while ($row = mysqli_fetch_object($result)) {

		$data['user'][] = $row;
	
	}
}

$sql = 'SELECT * FROM `bf_roles` WHERE 1 order by title asc';
$result = mysqli_query($con, $sql);
$num2 = mysqli_num_rows($result);

$j = 0;
if ($num2 > 0) {
	while ($row = mysqli_fetch_object($result)) {

		$data['role'][$j]['title'] = $row->title;
		$data['role'][$j]['guid'] = $row->guid;

		$i++;
		$j++;
	}
}

$sql = 'SELECT * FROM `incident_type` WHERE 1 order by orderd asc';
$result = mysqli_query($con, $sql);
$num2 = mysqli_num_rows($result);

$j = 0;
if ($num2 > 0) {
	while ($row = mysqli_fetch_object($result)) {

		$data['incident_type'][$j]['title'] = $row->title;
		$data['incident_type'][$j]['guid'] = $row->guid;

		$i++;
		$j++;
	}
}

$sql = 'SELECT * FROM `priority` WHERE 1 order by orderd asc';
$result = mysqli_query($con, $sql);
$num2 = mysqli_num_rows($result);

$j = 0;
if ($num2 > 0) {
	while ($row = mysqli_fetch_object($result)) {

		$data['priority'][$j]['title'] = $row->title;
		$data['priority'][$j]['guid'] = $row->guid;

		$i++;
		$j++;
	}
}

$data['pinfo'] = null;

if (isset($_GET['mobile']) && $_GET['mobile'] !== '') {
    $mobile = mysqli_real_escape_string($con, $_GET['mobile']);
    $sql = "SELECT * FROM `healthcare_employees` WHERE mobile='$mobile' LIMIT 1";
    $result = mysqli_query($con, $sql);
    $data['pinfo'] = mysqli_fetch_object($result);
}

mysqli_close($con);
echo json_encode($data);
?>
