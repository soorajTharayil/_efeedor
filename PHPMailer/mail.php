<?php

include('../api/db.php');
include('/home/cpefeedor/globalconfig.php');

$Subject = 'HID: ' . $HID . ' NEW DISCHARGED INPATIENT FEEDBACK TICKET- EFEEDOR';
$query = 'SELECT * FROM  bf_feedback  WHERE emailstatus = 0';
$flore = mysqli_query($con, $query);
while ($r = mysqli_fetch_object($flore)) {

	$query = 'SELECT * FROM  tickets  inner JOIN department ON department.dprt_id = tickets.departmentid   WHERE  feedbackid = ' . $r->id . ' GROUP BY  department.description';
	$ticket = mysqli_query($con, $query);
	$rowcount = mysqli_num_rows($ticket);
	$department = '';
	while ($t = mysqli_fetch_object($ticket)) {
		$message = 'HID: ' . $HID . '<br />';
		$message .= 'Hi,<br /><br />';
		$message .= 'A new ticket was generated: <br /><br />';
		$query = 'SELECT * FROM  tickets  inner JOIN department ON department.dprt_id = tickets.departmentid   WHERE  feedbackid = ' . $r->id . ' AND department.description="' . $t->description . '"';
		$department .= $t->description . ', ';
		$tic = mysqli_query($con, $query);
		$ticcount = mysqli_num_rows($tic);
		if ($ticcount > 1) {
			$k = 1;
		} else {
			$k = '';
		}
		$query = 'SELECT * FROM  bf_patients  WHERE patient_id = "' . $r->patientid . '"';
		$patient = mysqli_query($con, $query);
		$p = mysqli_fetch_object($patient);
		$query = 'SELECT * FROM  bf_ward  WHERE title = "' . $p->ward . '"';
		$patient = mysqli_query($con, $query);
		$f = mysqli_fetch_object($patient);
		$tlink = $config_set['BASE_URL'] . 'ipd/track/' . $t->id;
		$message .= 'Feedback ticket from <br />Patient: ' . $p->name . ', <br />PID: ' . $p->patient_id . ', <br />Floor: ' . $f->smallname . ' <br />Department: ' . $t->description;
		$section = '';
		while ($tp = mysqli_fetch_object($tic)) {
			if ($tp->rating == 2) {
				$ratingp = 'Average';
			} else {
				$ratingp = 'Poor';
			}
			$section .= ' ,<br />Parameter' . $k . ': ' . $tp->name . ', <br />Rating: ' . $ratingp;
			$k++;
		}
		$message .= $section;

		$message .= '<br /><br />Kindly click the below link to view the same.<br />' . $tlink . ' <br /><br />';
		$message .= '<br /><br />Regards,<br />' . $hospitalname . ' ';
		$query = 'INSERT INTO `notification`(`type`, `message`, `status`, `mobile_email`,`subject` ,`HID`) VALUES ("email","' . $conn_g->real_escape_string($message) . '",0,"' . $conn_g->real_escape_string($t->email) . '","' . $conn_g->real_escape_string($Subject) . '","' . $HID . '")';

		$conn_g->query($query);
	}

	if ($rowcount > 1) {
		$messages = 'HID: ' . $HID . '<br />';
		$messages .= 'Hi,<br /><br />';
		$messages .= 'A new ticket was generated: <br /><br />';
		$messages .= 'Feedback ticket from <br />Patient:  ' . $p->name . ',<br /> PID: ' . $p->patient_id . ',<br /> Floor: ' . $f->smallname;
		$messages .= ' <br />Department:' . $department;
		$messages .= '<br /><br />Kindly click the below link to view the same.<br />' . $tlink . ' <br /><br />';
		$messages .= '<br /><br />Regards,<br />' . $hospitalname . ' ';
	} else {
		$messages = $message;
	}
	if ($rowcount > 0) {
		$query = 'SELECT * FROM  user  WHERE 1';
		$patient = mysqli_query($con, $query);
		while ($u = mysqli_fetch_object($patient)) {
			$permission = json_decode($u->departmentpermission);
			if ($permission->email_ticket_ip == 1) {
				$query = 'INSERT INTO `notification`(`type`, `message`, `status`, `mobile_email`,`subject` ,`HID`) VALUES ("email","' . $conn_g->real_escape_string($messages) . '",0,"' . $conn_g->real_escape_string($u->email) . '","' . $conn_g->real_escape_string($Subject) . '","' . $HID . '")';

				$conn_g->query($query);
			}
		}
	}



	$quiery = 'Update bf_feedback set emailstatus = 1 WHERE id=' . $r->id;
	mysqli_query($con, $quiery);
}
mysqli_close($con);
$conn_g->close();

//send the message, check for errors
