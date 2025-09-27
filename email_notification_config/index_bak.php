<?php
ini_set ('display_errors', 1);  
ini_set ('display_startup_errors', 1);  
error_reporting (E_ALL);  
$all_pending_email = file_get_contents('http://efeedor.com/pendingemail.php');
$all_email_array = json_decode($all_pending_email,false); 


if(count($all_email_array) > 0){
	foreach($all_email_array as $row){
$EMAIL_CONTENT = $row;
date_default_timezone_set('Etc/UTC');

require 'PHPMailer/PHPMailerAutoload.php';
$mail = new PHPMailer;
$mail->isSMTP();
$mail->SMTPDebug = 2;
$mail->Debugoutput = 'html';
$mail->Host = "smtp-relay.sendinblue.com";
$mail->Port = 587;
$mail->SMTPAuth = true;
$mail->Username = "developer@efeedor.com";
$mail->Password = "fr413V8mLXFHIp7D";
$mail->setFrom('app@efeedor.com', 'Patients Feedback');
$mail->addReplyTo('app@efeedor.com', 'Patients Feedback');
$mail->AltBody = $EMAIL_CONTENT->message;
$mail->Subject = $EMAIL_CONTENT->subject;
$messages = $EMAIL_CONTENT->message;
$mail->ClearAddresses();
$mail->addAddress($EMAIL_CONTENT->mobile_email, $EMAIL_CONTENT->mobile_email);
$mail->msgHTML($messages);
if (!$mail->send()) {
	echo "Mailer Error: " . $mail->ErrorInfo;
} else {
	echo "Message sent!";
} 
	}
}

?>
