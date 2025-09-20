<?php
$i = 0;
include('db.php');

// DESIGNATION
$sql1 = 'SELECT * FROM `bf_hand_audit_designation` WHERE 1 ORDER BY title ASC';
$result = mysqli_query($con, $sql1);
$num1 = mysqli_num_rows($result);
$j = 0;
if ($num1 > 0) {
    while ($row = mysqli_fetch_object($result)) {
        $data['designation'][$j]['title'] = $row->title;
        $data['designation'][$j]['guid'] = $row->guid;
        $data['designation'][$j]['bedno'] = explode(',', $row->bed_no);
        $i++;
        $j++;
    }
}

// ACTION
$sql2 = 'SELECT * FROM `bf_hand_audit_action` WHERE 1 ORDER BY title ASC';
$result = mysqli_query($con, $sql2);
$num1 = mysqli_num_rows($result);
$j = 0;
if ($num1 > 0) {
    while ($row = mysqli_fetch_object($result)) {
        $data['action'][$j]['title'] = $row->title;
        $data['action'][$j]['guid'] = $row->guid;
        $data['action'][$j]['bedno'] = explode(',', $row->bed_no);
        $i++;
        $j++;
    }
}

// COMPLIANCE
$sql3 = 'SELECT * FROM `bf_hand_audit_compliance` WHERE 1 ORDER BY title ASC';
$result = mysqli_query($con, $sql3);
$num1 = mysqli_num_rows($result);
$j = 0;
if ($num1 > 0) {
    while ($row = mysqli_fetch_object($result)) {
        $data['compliance'][$j]['title'] = $row->title;
        $data['compliance'][$j]['guid'] = $row->guid;
        $data['compliance'][$j]['bedno'] = explode(',', $row->bed_no);
        $i++;
        $j++;
    }
}

// INDICATION
$sql4 = 'SELECT * FROM `bf_hand_audit_indication` WHERE 1 ORDER BY title ASC';
$result = mysqli_query($con, $sql4);
$num1 = mysqli_num_rows($result);
$j = 0;
if ($num1 > 0) {
    while ($row = mysqli_fetch_object($result)) {
        $data['indication'][$j]['title'] = $row->title;
        $data['indication'][$j]['guid'] = $row->guid;
        $data['indication'][$j]['bedno'] = explode(',', $row->bed_no);
        $i++;
        $j++;
    }
}

echo json_encode($data);
mysqli_close($con);
?>
