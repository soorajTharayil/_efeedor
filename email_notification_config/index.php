<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// ✅ If using Composer
require __DIR__ . '/vendor/autoload.php';

// ✅ If NOT using Composer, instead use:
// require __DIR__ . '/PHPMailer/src/Exception.php';
// require __DIR__ . '/PHPMailer/src/PHPMailer.php';
// require __DIR__ . '/PHPMailer/src/SMTP.php';

date_default_timezone_set('Etc/UTC');

// Fetch pending emails from your API
$all_pending_email = file_get_contents('http://qms.pmhcp.com/pendingemail.php');
$all_email_array   = json_decode($all_pending_email);

if (!empty($all_email_array)) {
    foreach ($all_email_array as $EMAIL_CONTENT) {
        $mail = new PHPMailer(true);

        try {
            // SMTP configuration
            $mail->isSMTP();
            $mail->SMTPDebug = 4; // set 2 for verbose debug output
            $mail->Debugoutput = 'html';
            $mail->Host       = "mail.meitra.com";
            $mail->Port       = 587;
            $mail->SMTPAuth   = true;
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Username   = "qmsalerts@meitra.com"; // your SMTP username
            $mail->Password   = "Welcome@123"; // your SMTP password

            // Sender
            $mail->setFrom('qmsalerts@meitra.com', 'Efeedor Quality Management Software Alerts');
            $mail->addReplyTo('qmsalerts@meitra.com', 'Efeedor Quality Management Software Alerts');

            // Recipient
            $mail->clearAddresses();
            $mail->addAddress($EMAIL_CONTENT->mobile_email, $EMAIL_CONTENT->mobile_email);

            // Content
            $mail->Subject = $EMAIL_CONTENT->subject ?? '(No Subject)';
            $mail->Body    = $EMAIL_CONTENT->message ?? '';
            $mail->AltBody = strip_tags($EMAIL_CONTENT->message ?? '');

            // Extra options (ignore SSL errors if needed)
            $mail->SMTPOptions = [
                'ssl' => [
                    'verify_peer'       => false,
                    'verify_peer_name'  => false,
                    'allow_self_signed' => true,
                ]
            ];

            // Send
            $mail->send();
            echo "Message sent to {$EMAIL_CONTENT->mobile_email}<br>";
        } catch (Exception $e) {
            echo "Mailer Error ({$EMAIL_CONTENT->mobile_email}): {$mail->ErrorInfo}<br>";
        }
    }
}

