<?php



date_default_timezone_set('Etc/UTC');


include('../api/db.php');
include('/home/cpefeedor/globalconfig.php');


$Subject = 'HID: ' . $HID . ' NEW INTERNAL SERVICE REQUEST FROM EMPLOYEE - EFEEDOR';



$query = 'SELECT * FROM  bf_feedback_esr  WHERE emailstatus = 0';

$flore = mysqli_query($con, $query);



while ($r = mysqli_fetch_object($flore)) {



	$query = 'SELECT * FROM  tickets_esr  inner JOIN department ON department.dprt_id = tickets_esr.departmentid   WHERE  feedbackid = ' . $r->id . '  AND type="interim" GROUP BY  department.description ';

	$ticket = mysqli_query($con, $query);

	$rowcount = mysqli_num_rows($ticket);

	$department = '';

	while ($t = mysqli_fetch_object($ticket)) {

		$message = 'HID: ' . $HID . '<br />';

		$message .= 'Hi,<br /><br />';

		$message .= 'A new ticket was generated: <br /><br />';

		$query = 'SELECT * FROM  tickets_esr  inner JOIN department ON department.dprt_id = tickets.departmentid   WHERE  feedbackid = ' . $r->id . ' AND department.description="' . $t->description . '" AND type="interim"';

		$department .= $t->description . ', ';

		$tic = mysqli_query($con, $query);

		$ticcount = mysqli_num_rows($tic);

		$ticket = mysqli_fetch_object($tic);

		if ($ticcount > 1) {

			$k = 1;
		} else {

			$k = '';
		}

		$TID = $ticket->id;

		$query = 'SELECT * FROM  bf_patients  WHERE id = "' . $r->pid . '"';

		$patient = mysqli_query($con, $query);

		$p = mysqli_fetch_object($patient);

		$query = 'SELECT * FROM  bf_ward  WHERE title = "' . $p->ward . '"';

		$patient = mysqli_query($con, $query);

		$f = mysqli_fetch_object($patient);



		$tlink = $config_set['BASE_URL'] . 'isr/track/' . $t->id;

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



		$message .= '<br /><br />Kindly click the below link to view the same.<br />http://' . $tlink . ' <br /><br />';

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

		$messages .= '<br /><br />Kindly click the below link to view the same.<br />http://' . $tlink . ' <br /><br />';

		$messages .= '<br /><br />Regards,<br />' . $hospitalname . ' ';
	} else {

		$messages = $message;
	}

	if ($rowcount > 0) {

		$query = 'SELECT * FROM  user  WHERE 1';

		$patient = mysqli_query($con, $query);

		while ($u = mysqli_fetch_object($patient)) {

			$permission = json_decode($u->departmentpermission);

			if ($permission->message_ticket_int == 1) {
				$query = 'INSERT INTO `notification`(`type`, `message`, `status`, `mobile_email`,`subject` ,`HID`) VALUES ("email","' . $conn_g->real_escape_string($messages) . '",0,"' . $conn_g->real_escape_string($u->email) . '","' . $conn_g->real_escape_string($Subject) . '","' . $HID . '")';

				$conn_g->query($query);
			}
		}
	}

	$quiery = 'Update bf_feedback_esr set emailstatus = 1 WHERE id=' . $r->id;

	mysqli_query($con, $quiery);
}
mysqli_close($con);
$conn_g->close();
