<?php
if (session_status() == PHP_SESSION_NONE) {
        session_start();   
}
if(isset($_SESSION['user'])){

if(isset($_POST['jobid'])){ $jobid = $_POST['jobid']; }
if(isset($_POST['mode'])){ $mode = $_POST['mode']; }
include 'Database.php';
$database = new Database();
date_default_timezone_set('Asia/Manila');
$logtimestamp = date("Y-m-d H:i:s");  
include "serverlogconfig.php";

    if($mode=="approve"){
        $database->query('UPDATE jobads set isactive=1 where id=:jobid');
        $database->bind(':jobid', $jobid);     
        $msg = "approved jobid=".$jobid;
    }
    try{
        $database->execute();        
        $log->info($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
    }catch (PDOException $e) {
         $msg = $e->getTraceAsString()." ".$e->getMessage();
         $log->error($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
         die("");
    }

$database->query('SELECT jobtitle,email from jobads left join useraccounts on jobads.userid= useraccounts.id where jobads.id = :jobid');
   
    $database->bind(':jobid', $jobid);
    try{
        $row = $database->single();
     }catch (PDOException $e) {
        $msg = $e->getTraceAsString()." ".$e->getMessage();
        $log->error($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
        die("");
    }     
    $jobtitle = $row['jobtitle'];
    $email = $row['email'];
    
require 'phpmailer/PHPMailerAutoload.php';
require 'emailconfig.php';
$mail->isHTML(true);  
$mail->setFrom('info@jobsly.net', 'jobsly');
$mail->Subject = 'Job Ad Approved! - jobsly';
$mail->addAddress($email);
$mail->Body    = "Your job ad <b>".$jobtitle."</b> has been approved! View it on your dashboard now and start inviting applicants <a href='https://www.jobsly.net/'>Click here</a> <br><br>jobsly team";

if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
}   
    
}else{
    header("Location: logout.php");
}                                      
?> 