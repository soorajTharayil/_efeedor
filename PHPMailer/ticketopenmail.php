<?php



date_default_timezone_set('Etc/UTC');

$mail->Subject = 'Ticket Ageing Alert ' . date('d M, Y');
include('../api/db.php');
include('/home/cpefeedor/globalconfig.php');

$fdate = date('Y-m-d', time());

$tdate = date('Y-m-d', strtotime('-2 days'));

$tdate7day = date('Y-m-d', strtotime('-7 days'));

$query = 'SELECT * FROM  tickets  WHERE status = "Open" AND created_on <= "' . $tdate . '" AND created_on  > "' . $tdate7day . '"';

$tickets = mysqli_query($con, $query);

$html1 = 'Hi, This ticket was not closed <br /><br />';

$c = 0;

while ($t = mysqli_fetch_object($tickets)) {

	if ($c == 0) {

		$html1 .= '<table border="1" width="100%"  cellpadding="5" cellspacing="0">';

		$html1 .= '<tr><td colspan="6" style="text-align:center;"><h2>Tickets open since 48 hours</h2></td></tr>';

		$html1 .= '<tr><td>Sl No</td><td>Patient Details</td><td>Rating</td><td>Department</td><td>Assigned to</td><td>Created On</td></tr>';
	}

	$c++;

	$query = 'SELECT * FROM  bf_patients  WHERE patient_id = "' . $t->created_by . '"';

	$patient = mysqli_query($con, $query);

	$p = mysqli_fetch_object($patient);

	//print_r($p);

	$html1 .= '<tr><td>' . $c . '</td>';

	$html1 .= '<td>' . $p->name . '(' . $p->patient_id . ')</td>';

	$query = 'SELECT * FROM  tickets  inner JOIN department ON department.dprt_id = tickets.departmentid   WHERE  tickets.id = ' . $t->id;

	$tic = mysqli_query($con, $query);

	$tp = mysqli_fetch_object($tic);



	if ($tp->rating == 2) {

		$ratingp = 'Average';
	} else {

		$ratingp = 'Poor';
	}

	$html1 .= '<td>' . $ratingp . '</td>';

	$html1 .= '<td>' . $tp->description . '</td>';

	$html1 .= '<td>' . $tp->pname . '</td>';

	$html1 .= '<td>' . date('d M, Y H:i', strtotime($t->created_on)) . '</td></td></tr>';
}

$html1 .= '</table>';

$c = 0;

$tdate15day = date('Y-m-d', strtotime('-15 days'));

$query = 'SELECT * FROM  tickets  WHERE status = "Open" AND created_on <= "' . $tdate7day . '" AND created_on  > "' . $tdate15day . '"';

$tickets = mysqli_query($con, $query);

while ($t = mysqli_fetch_object($tickets)) {

	if ($c == 0) {

		$html1 .= '<table  border="1" width="100%"  cellpadding="5" cellspacing="0">';

		$html1 .= '<tr ><td colspan="6"  style="text-align:center;"><h2>Tickets open since  7 days</h2></td></tr>';

		$html1 .= '<tr><td>Sl No</td><td>Patient Details</td><td>Rating</td><td>Department</td><td>Assigned to</td><td>Created On</td></tr>';
	}

	$c++;

	$query = 'SELECT * FROM  bf_patients  WHERE patient_id = "' . $t->created_by . '"';

	$patient = mysqli_query($con, $query);

	$p = mysqli_fetch_object($patient);

	//print_r($p);

	$html1 .= '<tr><td>' . $c . '</td>';

	$html1 .= '<td>' . $p->name . '(' . $p->patient_id . ')</td>';

	$query = 'SELECT * FROM  tickets  inner JOIN department ON department.dprt_id = tickets.departmentid   WHERE  tickets.id = ' . $t->id;

	$tic = mysqli_query($con, $query);

	$tp = mysqli_fetch_object($tic);



	if ($tp->rating == 2) {

		$ratingp = 'Average';
	} else {

		$ratingp = 'Poor';
	}

	$html1 .= '<td>' . $ratingp . '</td>';

	$html1 .= '<td>' . $tp->description . '</td>';

	$html1 .= '<td>' . $tp->pname . '</td>';

	$html1 .= '<td>' . date('d M, Y H:i', strtotime($t->created_on)) . '</td></td></tr>';
}

$html1 .= '</table>';



$c = 0;

$query = 'SELECT * FROM  tickets  WHERE status = "Open" AND  created_on  < "' . $tdate15day . '"';

$tickets = mysqli_query($con, $query);

while ($t = mysqli_fetch_object($tickets)) {

	if ($c == 0) {

		$html1 .= '<table  border="1" width="100%" cellpadding="5" cellspacing="0">';

		$html1 .= '<tr><td colspan="6"  style="text-align:center;"><h2>Tickets open since 15 days</h2></td></tr>';

		$html1 .= '<tr><td >Sl No</td><td>Patient Details</td><td>Rating</td><td>Department</td><td>Assigned to</td><td>Created On</td></tr>';
	}

	$c++;

	$query = 'SELECT * FROM  bf_patients  WHERE patient_id = "' . $t->created_by . '"';

	$patient = mysqli_query($con, $query);

	$p = mysqli_fetch_object($patient);

	//print_r($p);

	$html1 .= '<tr><td>' . $c . '</td>';

	$html1 .= '<td>' . $p->name . '(' . $p->patient_id . ')</td>';

	$query = 'SELECT * FROM  tickets  inner JOIN department ON department.dprt_id = tickets.departmentid   WHERE  tickets.id = ' . $t->id;

	$tic = mysqli_query($con, $query);

	$tp = mysqli_fetch_object($tic);



	if ($tp->rating == 2) {

		$ratingp = 'Average';
	} else {

		$ratingp = 'Poor';
	}







	$html1 .= '<td>' . $ratingp . '</td>';

	$html1 .= '<td>' . $tp->description . '</td>';

	$html1 .= '<td>' . $tp->pname . '</td>';

	$html1 .= '<td>' . date('d M, Y H:i', strtotime($t->created_on)) . '</td></td></tr>';
}

$html1 .= '</table>';

$html1 .= '<br /><br />Kindly click the below link to view the same.<br />http://' . $link . '<br /><br />';

$html1 .= '<br /><br />Regards,<br />' . $hospitalname . ' ';




$query = 'SELECT * FROM  user  WHERE user_id = 2';

$patient = mysqli_query($con, $query);

$u = mysqli_fetch_object($patient);


$query = 'INSERT INTO `notification`(`type`, `message`, `status`, `mobile_email`,`subject` ,`HID`) VALUES ("email","' . $conn_g->real_escape_string($message) . '",0,"' . $conn_g->real_escape_string($u->email) . '","' . $conn_g->real_escape_string($Subject) . '","' . $HID . '")';
$conn_g->query($query);


mysqli_close($con);
$conn_g->close();
exit;

	

//send the message, check for errors
