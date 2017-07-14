<?php

date_default_timezone_set('Etc/UTC');
require 'dashboard/phpmailer/PHPMailerAutoload.php';

$mail = new PHPMailer;

$mail->isSMTP();
//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 2;
$mail->Debugoutput = 'html';
$mail->Host = 'smtp.gmail.com';
//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
$mail->Port = 587;
//Set the encryption system to use - ssl (deprecated) or tls
//$mail->SMTPSecure = 'tls';
//Whether to use SMTP authentication
$mail->SMTPAuth = true;
$mail->Username = "info@jobsly.net";
$mail->Password = "r33c3*fr3y";

$mail->isHTML(true);  
$mail->setFrom('info@jobsly.net', 'jobsly info');
$mail->Subject = 'PHPMailer GMail SMTP test';
$mail->addAddress('reggie1@gmail.com', 'reg User');
$mail->Body    = 'This is the HTML message body <b>in bold!</b>';
//$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
//$mail->AltBody = 'This is a plain-text message body';
//Attach an image file
//$mail->addAttachment('images/phpmailer_mini.png');
//send the message, check for errors
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message sent!";
}
?>