<?php
if (session_status() == PHP_SESSION_NONE) {
        session_start();   
}
if(isset($_SESSION['user'])){
if(isset($_POST['jobid'])){ $jobid = $_POST['jobid']; }
if(isset($_POST['applicantid'])){ $applicantid = $_POST['applicantid']; }
if(isset($_POST['mode'])){ $mode = $_POST['mode']; }
include "serverlogconfig.php";
date_default_timezone_set('Asia/Manila');
$logtimestamp = date("Y-m-d H:i:s");   
include 'Database.php';
$database = new Database();

    $database->query('SELECT jobapplications.id from jobapplications  where jobid= :jobid and userid = :userid and isshortlisted=1');
    $database->bind(':userid', $applicantid);
    $database->bind(':jobid', $jobid);
    try{
        $checkrow = $database->single();        
    }catch (PDOException $e) {
        $msg = $e->getTraceAsString()." ".$e->getMessage();
        $log->error($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
        die("");
    }     
    if(empty($checkrow)){
        $isshortlisted = 1;
    }else{
        $isshortlisted = 0; 
    }
     $database->query(' UPDATE jobapplications SET isshortlisted = :isshortlisted where jobid= :jobid and userid = :userid');
     $database->bind(':jobid', $jobid);  
     $database->bind(':userid', $applicantid);
     $database->bind(':isshortlisted', $isshortlisted);
     try{
        $database->execute();
        $msg = "shortlisted to ".$isshortlisted." ";
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
        $mail->Subject = 'Congratulations! Your were shortlisted - jobsly';
        $mail->addAddress($applicantemail);
        $mail->Body    = "Your application was reviewed and shortlisted by the employer! To view, log in to your jobsly account and view under Applications. <a href='https://www.jobsly.net'>Click Here</a>";

        if (!$mail->send()) {
            $msg = "Mailer Error: ".$mail->ErrorInfo;
            $log->error($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
        } 
    }
  
        $database->query('select (select count(id) from jobapplications where jobid=:jobid and isshortlisted=1) as shortlisted from jobapplications');
        $database->bind(':jobid', $jobid);
        try{
            $row = $database->single();   
        }catch (PDOException $e) {
            $msg = $e->getTraceAsString()." ".$e->getMessage();
            $log->error($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
            die("");
        }     
        $shortlisted = $row['shortlisted'];
        echo $shortlisted;
}else{
    header("Location: logout.php");
}
?> 