<?php 
include('db.php'); 
$ticket_id = $_GET['ticket_id'];
$section = $_GET['section'];
if($section == 'inpatient'){
	$query = 'SELECT * FROM  tickets WHERE  id = ' . $ticket_id;
	$tic = mysqli_query($con, $query);
	$ticket_detail = mysqli_fetch_object($tic);
	echo strtoupper($ticket_detail->status);
}
if($section == 'outpatient'){
	$query = 'SELECT * FROM  ticketsop WHERE  id = ' . $ticket_id;
	$tic = mysqli_query($con, $query);
	$ticket_detail = mysqli_fetch_object($tic);
	echo strtoupper($ticket_detail->status);
}
if($section == 'employees'){
	$query = 'SELECT * FROM  	ticketsemployees WHERE  id = ' . $ticket_id;
	$tic = mysqli_query($con, $query);
	$ticket_detail = mysqli_fetch_object($tic);
	echo strtoupper($ticket_detail->status);
}
if($section == 'service'){
	$query = 'SELECT * FROM  tickets_service WHERE  id = ' . $ticket_id;
	$tic = mysqli_query($con, $query);
	$ticket_detail = mysqli_fetch_object($tic);
	echo strtoupper($ticket_detail->status);
}
if($section == 'interim'){
	$query = 'SELECT * FROM  tickets_int WHERE  id = ' . $ticket_id;
	$tic = mysqli_query($con, $query);
	$ticket_detail = mysqli_fetch_object($tic);
	echo strtoupper($ticket_detail->status);
}
if($section == 'esr'){
	$query = 'SELECT * FROM  tickets_esr WHERE  id = ' . $ticket_id;
	$tic = mysqli_query($con, $query);
	$ticket_detail = mysqli_fetch_object($tic);
	echo strtoupper($ticket_detail->status);
}

if($section == 'incident'){
	$query = 'SELECT * FROM  tickets_incident WHERE  id = ' . $ticket_id;
	$tic = mysqli_query($con, $query);
	$ticket_detail = mysqli_fetch_object($tic);
	echo strtoupper($ticket_detail->status);
}


?>