<?php
include('db.php');

$patient_id = $_GET['patient_id'];

$month = $_GET['month'];  // e.g., "January"
$year = $_GET['year'];    // e.g., "2024"
$table = $_GET['table'];

$monthNumber = (int)date('m', strtotime($month)); // Convert month into integer


$allowedTables = [
	'bf_feedback_CQI3a1',
	'bf_feedback_CQI3a2',
	'bf_feedback_CQI3a3',
	'bf_feedback_CQI3a4',
	'bf_feedback_CQI3a5',
	'bf_feedback_CQI3a6',
	'bf_feedback_CQI3a7',

	
];

if (!in_array($table, $allowedTables)) {
	echo json_encode(["status" => "invalid_table"]);
	exit();
}

$query = "SELECT * FROM `$table` WHERE MONTH(`datetime`) = '$monthNumber' AND YEAR(`datetime`) = '$year'";
$result = mysqli_query($con, $query);

if (mysqli_num_rows($result) > 0) {
	echo json_encode(["status" => "exists"]);
} else {
	echo json_encode(["status" => "not_exists"]);
}
?>
