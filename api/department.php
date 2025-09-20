<?php
$i = 0;
include('db.php');

// ----------------------
// Departments / OP Wards
// ----------------------
$sql = "SELECT * FROM `bf_departmentop` ORDER BY CASE WHEN title = 'EMERGENCY' THEN 1 WHEN title = 'HEALTH CHECKUP' THEN 2 WHEN title = 'DIALYSIS' THEN 3 WHEN title = 'CHEMOTHERAPY' THEN 4 WHEN title = 'ENDOSCOPY' THEN 5 WHEN title = 'RADIOLOGY' THEN 6 WHEN title = 'LABORATORY' THEN 7 WHEN title = 'PHARMACY' THEN 8 WHEN title = 'PHYSIOTHERAPY' THEN 9 ELSE 0 END ASC, title ASC";

$result = mysqli_query($con, $sql);
$j = 0;
if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_object($result)) {
        $data['ward'][$j]['title']      = $row->title;
        $data['ward'][$j]['guid']       = $row->guid;
        $data['ward'][$j]['bedno']      = !empty($row->bed_no) ? explode(',', $row->bed_no) : [];
        $data['ward'][$j]['doctorname'] = !empty($row->doctorname) ? explode(',', $row->doctorname) : [];
        $i++;
        $j++;
    }
}

// ----------------------
// Users
// ----------------------
$sql = 'SELECT * FROM `user`';
$result = mysqli_query($con, $sql);
if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_object($result)) {
        $data['user'][] = $row;
    }
}

// ----------------------
// Settings
// ----------------------
$sql = 'SELECT * FROM `setting`';
$result = mysqli_query($con, $sql);
$data['setting_data'] = mysqli_fetch_object($result);

// helper to safely encode images
function imageToBase64($filePath) {
    if (!empty($filePath) && file_exists($filePath)) {
        $type  = pathinfo($filePath, PATHINFO_EXTENSION);
        $datap = file_get_contents($filePath);
        return 'data:image/' . $type . ';base64,' . base64_encode($datap);
    }
    return null;
}

$data['setting_data']->qr_code_image = imageToBase64('../uploads/' . $data['setting_data']->qr_code_image);
$data['setting_data']->logo          = imageToBase64('../uploads/' . $data['setting_data']->logo);

// APK link
if (!empty($data['setting_data']->android_apk)) {
    $data['setting_data']->android_apk = 'https://' . $link . '/uploads/' . $data['setting_data']->android_apk;
}

// ----------------------
// Question Set (via API)
// ----------------------
$ch = curl_init('https://' . $link . '/SetupEfeeder/op_questionjson');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_BINARYTRANSFER, true);
$output = curl_exec($ch);
curl_close($ch);
$data['question_set'] = $output ? json_decode($output, true) : [];

// ----------------------
// Patient Info (safe check)
// ----------------------
$patientId = $_GET['patientid'] ?? '';
if (!empty($patientId)) {
    $patientId = mysqli_real_escape_string($con, $patientId);
    $sql = "SELECT * FROM `patients_from_admission_op` WHERE guid='" . $patientId . "'";
    $result = mysqli_query($con, $sql);
    $data['pinfo'] = $result ? mysqli_fetch_object($result) : null;
} else {
    $data['pinfo'] = null;
}


$data['baseurl'] = $config_set['BASE_URL'] ?? '';
$domain_name     = $config_set['DOMAIN_NAME'] ?? 'default';
$configPath      = '../config/' . $domain_name . '.json';

if (file_exists($configPath)) {
    $data['setup'] = json_decode(file_get_contents($configPath), true);
} else {
    $data['setup'] = [];
}

// ----------------------
// Output
// ----------------------
header('Content-Type: application/json');
echo json_encode($data);

mysqli_close($con);
