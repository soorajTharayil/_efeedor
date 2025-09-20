<?php
$i = 0;

include('db.php');

// ----------------------
// Fetch Ward Information
// ----------------------
$sql = 'SELECT * FROM `bf_ward` ORDER BY title ASC';
$result = mysqli_query($con, $sql);
$num1 = mysqli_num_rows($result);
$j = 0;

if ($num1 > 0) {
    while ($row = mysqli_fetch_object($result)) {
        $data['ward'][$j]['title']   = $row->title;
        $data['ward'][$j]['titlek']  = $row->titlek;
        $data['ward'][$j]['titlem']  = $row->titlem;
        $data['ward'][$j]['guid']    = $row->guid;

        // Null-safe explode
        $data['ward'][$j]['bedno']   = !empty($row->bed_no)  ? explode(',', $row->bed_no)  : [];
        $data['ward'][$j]['bednok']  = !empty($row->bed_nok) ? explode(',', $row->bed_nok) : [];
        $data['ward'][$j]['bednom']  = !empty($row->bed_nom) ? explode(',', $row->bed_nom) : [];

        $i++;
        $j++;
    }
}

// ----------------------
// Fetch Users
// ----------------------
$sql = 'SELECT * FROM `user`';
$result = mysqli_query($con, $sql);
$num1 = mysqli_num_rows($result);

if ($num1 > 0) {
    while ($row = mysqli_fetch_object($result)) {
        $data['user'][] = $row;
    }
}

// ----------------------
// Fetch Consultants
// ----------------------
$sql = 'SELECT * FROM `bf_departmentop` ORDER BY title ASC';
$result = mysqli_query($con, $sql);
$num1 = mysqli_num_rows($result);
$j = 0;

if ($num1 > 0) {
    while ($row = mysqli_fetch_object($result)) {
        $data['consultant'][$j]['title'] = $row->title;
        $data['consultant'][$j]['guid']  = $row->guid;

        // Null-safe explode
        $data['consultant'][$j]['bedno'] = !empty($row->bed_no) ? explode(',', $row->bed_no) : [];

        $i++;
        $j++;
    }
}

// ----------------------
// Fetch Settings
// ----------------------
$sql = 'SELECT * FROM `setting` WHERE 1';
$result = mysqli_query($con, $sql);
$data['setting_data'] = mysqli_fetch_object($result);

// Function to convert image to base64 safely
function imageToBase64($path) {
    if (file_exists($path)) {
        $type  = pathinfo($path, PATHINFO_EXTENSION);
        $datap = file_get_contents($path);
        return 'data:image/' . $type . ';base64,' . base64_encode($datap);
    }
    return null;
}

// Process images
$data['setting_data']->qr_code_image   = imageToBase64('../uploads/' . $data['setting_data']->qr_code_image);
$data['setting_data']->ip_qr_code_image = imageToBase64('../uploads/' . $data['setting_data']->ip_qr_code_image);
$data['setting_data']->op_qr_code_image = imageToBase64('../uploads/' . $data['setting_data']->op_qr_code_image);
$data['setting_data']->logo             = imageToBase64('../uploads/' . $data['setting_data']->logo);

// APK link
if (!empty($data['setting_data']->android_apk)) {
    $data['setting_data']->android_apk = 'https://' . $link . '/uploads/' . $data['setting_data']->android_apk;
}

// ----------------------
// Fetch Question Set via cURL
// ----------------------
$ch = curl_init('https://' . $link . '/SetupEfeeder/questionjson');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_BINARYTRANSFER, true);
$output = curl_exec($ch);
curl_close($ch);

if ($output !== false) {
    $data['question_set'] = json_decode($output, true);
} else {
    $data['question_set'] = [];
}

// ----------------------
// Patient Info
// ----------------------
$patientid = $_GET['patientid'] ?? '';
if (!empty($patientid)) {
    $sql = 'SELECT * FROM `patient_discharge` WHERE guid="' . mysqli_real_escape_string($con, $patientid) . '" AND check_status="active"';
    $result = mysqli_query($con, $sql);
    $data['pinfo'] = mysqli_fetch_object($result);
} else {
    $data['pinfo'] = null;
}

// ----------------------
// Setup Config
// ----------------------
$data['baseurl'] = $config_set['BASE_URL'] ?? '';
$domain_name     = $config_set['DOMAIN_NAME'] ?? 'default';
$configPath      = '../config/' . $domain_name . '.json';

if (file_exists($configPath)) {
    $data['setup'] = json_decode(file_get_contents($configPath), true);
} else {
    $data['setup'] = [];
}

// ----------------------
// Output JSON
// ----------------------
header('Content-Type: application/json');
echo json_encode($data);

mysqli_close($con);
?>
