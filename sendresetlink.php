<?php

if(isset($_POST['email'])){ $email = $_POST['email']; } 

include 'Database.php';
$database = new Database();

$database->query('SELECT email,verifyhash from useraccounts where email = :email');
$database->bind(':email', $email);

$row = $database->single();
$emailok = $row['email'];
$verifyhash = $row['verifyhash'];

if(is_null($emailok)){
    echo 'notfound';
}else{
    
require 'dashboard/phpmailer/PHPMailerAutoload.php';

require 'dashboard/emailconfig.php';

$mail->isHTML(true);  
$mail->setFrom('info@jobsly.net', 'jobsly');
$mail->Subject = 'Reset your jobsly password';
$mail->addAddress($email);
$mail->Body    = "Forgot your jobsly password? We got you covered! <a href='https://www.jobsly.net/forgot.php?mode=reset&email=".$email."&verify=".$verifyhash."'>Click here to reset your password</a> <br><br>jobsly team";

if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {        
 echo "success";   
}

}
?>