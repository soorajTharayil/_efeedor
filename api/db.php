<?php
include("../env.php");
error_reporting(E_ALL);
// Set headers
header('Content-Type: application/json; charset=utf-8');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS");
header("Access-Control-Max-Age: 1000");
header("Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token, Authorization");

// Validate config
if (
    empty($config_set['DBHOST']) || empty($config_set['DBUSER'])  || empty($config_set['DBNAME'])
) {
    http_response_code(500);
    echo json_encode(['status' => 'error', 'message' => 'Missing DB configuration values']);
    exit;
}

// Assign DB config
$db['hostname'] = $config_set['DBHOST'];
$db['username'] = $config_set['DBUSER'];
$db['password'] = $config_set['DBPASSWORD'];
$db['database'] = $config_set['DBNAME'];
$baseurl = $config_set['BASE_URL'] ?? '';
$link = $config_set['DOMAIN'] ?? '';

// Establish connection
$con = mysqli_connect($db['hostname'], $db['username'], $db['password'], $db['database']);
if (!$con) {
    http_response_code(500);
    echo json_encode(['status' => 'error', 'message' => 'Database connection failed: ' . mysqli_connect_error()]);
    exit;
}



// Execute query
$sql = 'SELECT * FROM `setting` WHERE 1';
$result = mysqli_query($con, $sql);

if (!$result) {
    http_response_code(500);
    echo json_encode(['status' => 'error', 'message' => 'Query failed: ' . mysqli_error($con)]);
    exit;
}

$reviewlink = mysqli_fetch_object($result);

if (!$reviewlink) {
    http_response_code(404);
    echo json_encode(['status' => 'error', 'message' => 'No settings found']);
    exit;
}

// Assign result values
$slink = $reviewlink->google_review_link ?? '';
$hospitalname = $reviewlink->title ?? '';
$HID = $reviewlink->description ?? '';
$COMPANYNAME = '-%20ITATONE';

?>
