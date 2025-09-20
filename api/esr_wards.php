<?php
$i = 0;
include('db.php');

// ----------------------
// Fetch Settings
// ----------------------
$sql = 'SELECT * FROM `setting` WHERE 1';
$result = mysqli_query($con, $sql);
$data['setting_data'] = mysqli_fetch_object($result);

// Safe image loader
function imageToBase64($path) {
    if (!empty($path) && file_exists($path)) {
        $type  = pathinfo($path, PATHINFO_EXTENSION);
        $datap = file_get_contents($path);
        return 'data:image/' . $type . ';base64,' . base64_encode($datap);
    }
    return null;
}

$data['setting_data']->qr_code_image = imageToBase64('../uploads/' . $data['setting_data']->qr_code_image);
$data['setting_data']->logo          = imageToBase64('../uploads/' . $data['setting_data']->logo);

// Android APK link
if (!empty($data['setting_data']->android_apk)) {
    $data['setting_data']->android_apk = 'https://' . $link . '/uploads/' . $data['setting_data']->android_apk;
}

// ----------------------
// Fetch Question Set
// ----------------------
$ch = curl_init($baseurl . 'SetupEfeeder/questionjson_esr?s=E-SERVICE');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_BINARYTRANSFER, true);
$output = curl_exec($ch);
curl_close($ch);

$data['question_set'] = $output ? json_decode($output, true) : [];
$x = count($data['question_set']);

// ----------------------
// Wards
// ----------------------
$sql = 'SELECT * FROM `bf_ward_esr` ORDER BY title ASC';
$result = mysqli_query($con, $sql);
$num1 = mysqli_num_rows($result);
$j = 0;

if ($num1 > 0) {
    while ($row = mysqli_fetch_object($result)) {
        $data['ward'][$j]['title'] = $row->title;
        $data['ward'][$j]['guid']  = $row->guid;

        // Safe explode
        $data['ward'][$j]['bedno'] = !empty($row->bed_no) ? explode(',', $row->bed_no) : [];

        $i++;
        $j++;
    }
}

// ----------------------
// Users
// ----------------------
$sql = 'SELECT * FROM `user`';
$result = mysqli_query($con, $sql);
while ($row = mysqli_fetch_object($result)) {
    $data['user'][] = $row;
}

// ----------------------
// Roles
// ----------------------
$sql = 'SELECT * FROM `bf_roles` ORDER BY title ASC';
$result = mysqli_query($con, $sql);
$j = 0;
while ($row = mysqli_fetch_object($result)) {
    $data['role'][$j]['title'] = $row->title;
    $data['role'][$j]['guid']  = $row->guid;
    $i++;
    $j++;
}

// ----------------------
// Priority
// ----------------------
$sql = 'SELECT * FROM `priority` ORDER BY orderd ASC';
$result = mysqli_query($con, $sql);
$j = 0;
while ($row = mysqli_fetch_object($result)) {
    $data['priority'][$j]['title'] = $row->title;
    $data['priority'][$j]['guid']  = $row->guid;
    $i++;
    $j++;
}

// ----------------------
// Healthcare Employee Info
// ----------------------
$mobile = $_GET['mobile'] ?? '';
if (!empty($mobile)) {
    $mobile = mysqli_real_escape_string($con, $mobile);
    $sql = "SELECT * FROM `healthcare_employees` WHERE mobile='$mobile'";
    $result = mysqli_query($con, $sql);
    $data['pinfo'] = mysqli_fetch_object($result);
} else {
    $data['pinfo'] = null; // avoid undefined array key "mobile"
}

// ----------------------
// Config Setup
// ----------------------
$data['baseurl'] = $baseurl;
$domain_name     = $config_set['DOMAIN_NAME'] ?? 'default';
$configPath      = '../config/' . $domain_name . '.json';
$data['setup']   = file_exists($configPath) ? json_decode(file_get_contents($configPath), true) : [];

// ----------------------
// Asset Match
// ----------------------
$assetname = $_GET['assetname'] ?? '';
$assetcode = $_GET['assetcode'] ?? '';

if (!empty($assetname) && !empty($assetcode)) {
    $sql4 = 'SELECT * FROM `bf_feedback_asset_creation` WHERE assetname = ? AND patientid = ?';
    $stmt = $con->prepare($sql4);
    $stmt->bind_param("ss", $assetname, $assetcode);
    $stmt->execute();
    $result4 = $stmt->get_result();

    if ($result4->num_rows > 0) {
        $data['asset_details'] = $result4->fetch_assoc();
    } else {
        $data['asset_details'] = null;
    }
    $stmt->close();
}

// ----------------------
// Asset Department
// ----------------------
$sql = 'SELECT * FROM `bf_departmentasset` ORDER BY title ASC';
$result = mysqli_query($con, $sql);
while ($row = mysqli_fetch_object($result)) {
    $data['assetdept'][] = [
        'title'      => $row->title,
        'guid'       => $row->guid,
        'bedno'      => !empty($row->bed_no) ? explode(',', $row->bed_no) : [],
        'method'     => $row->method,
        'short_code' => $row->short_code
    ];
    $i++;
}

mysqli_close($con);

// ----------------------
// Output
// ----------------------
header('Content-Type: application/json');
echo json_encode($data);
