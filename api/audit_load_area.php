<?php
$i = 0;
include('db.php');

$sql2 = 'SELECT * FROM `bf_audit_area` ORDER BY title ASC';
$result2 = mysqli_query($con, $sql2);
$num2 = mysqli_num_rows($result2);
$k = 0;
if ($num2 > 0) {
	while ($row2 = mysqli_fetch_object($result2)) {
		$data['area'][$k]['title'] = $row2->title;
		$data['area'][$k]['guid']  = $row2->guid;
		$k++;
	}
}


echo json_encode($data);
mysqli_close($con);
