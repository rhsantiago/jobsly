<?php
if (session_status() == PHP_SESSION_NONE) {
        session_start();   
}
if(isset($_SESSION['user'])){

if(isset($_POST['userid'])){ $userid = $_POST['userid']; }
if(isset($_POST['applicantid'])){ $applicantid= $_POST['applicantid']; }
if(isset($_POST['jobid'])){ $jobid = $_POST['jobid']; }
if(isset($_POST['mode'])){ $mode = $_POST['mode']; }    
include 'Database.php';
$database = new Database();
date_default_timezone_set('Asia/Manila');
$logtimestamp = date("Y-m-d H:i:s");  
include "serverlogconfig.php";

    if($mode=='insert'){
        $database->query('INSERT into jobinvitations (id, jobid, userid) VALUES (NULL, :jobid, :userid)');
    }
    $database->bind(':jobid', $jobid); 
    $database->bind(':userid', $applicantid);
        try{
            $database->execute();
            $msg = "invite to apply ";
            $log->info($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
        }catch (PDOException $e) {
             $msg = $e->getTraceAsString()." ".$e->getMessage();
             $log->error($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
             die("");
        }
    
    $database->query('SELECT email from useraccounts  where id = :applicantid');
    $database->bind(':applicantid', $applicantid);
   
    try{
        $row = $database->single();
        $applicantemail = $row['email'];
    }catch (PDOException $e) {
        $msg = $e->getTraceAsString()." ".$e->getMessage();
        $log->error($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
    }
    
    if(!empty($applicantemail)){
        require 'phpmailer/PHPMailerAutoload.php';
        require 'emailconfig.php';
        $mail->isHTML(true);  
        $mail->setFrom('info@jobsly.net', 'jobsly');
        $mail->Subject = 'Invitation to apply - jobsly';
        $mail->addAddress($applicantemail);
        $mail->Body    = "You have been invited to a apply for a new job!. Log in to jobsly and view under Applications. <a href='https://www.jobsly.net'>Click Here</a>";

        if (!$mail->send()) {
            $msg = "Mailer Error: ".$mail->ErrorInfo;
            $log->error($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
        } 
    }
}else{
    header("Location: logout.php");
}                                      
?> 