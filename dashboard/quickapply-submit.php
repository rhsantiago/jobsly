<?php
if (session_status() == PHP_SESSION_NONE) {
        session_start();   
}
if(isset($_SESSION['user'])){
if(isset($_POST['jobid'])){ $jobid = $_POST['jobid']; }
if(isset($_POST['userid'])){ $userid = $_POST['userid']; }
if(isset($_POST['esalary'])){ $esalary = $_POST['esalary']; }
if(isset($_POST['essay'])){ $essay = $_POST['essay']; }
include 'Database.php';
date_default_timezone_set('Asia/Manila');
$logtimestamp = date("Y-m-d H:i:s");
include "serverlogconfig.php";
$database = new Database();
$dateapplied = date("Y-m-d");
    $database->query('SELECT * from jobapplications where jobid= :jobid and userid = :userid');
    $database->bind(':userid', $userid);
    $database->bind(':jobid', $jobid);
    try{
        $checkrow = $database->single();
    }catch (PDOException $e) {
        $msg = $e->getTraceAsString()." ".$e->getMessage();
        $log->error($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
        die("");
    }     
    if(empty($checkrow)){
        $database->query(' INSERT INTO jobapplications (id, jobid, userid,esalary,essayanswer,dateapplied,isnew,isshortlisted,isreject) VALUES (NULL, :jobid,:userid,:esalary,:essay,:dateapplied,1,0,0)');
        $database->bind(':jobid', $jobid);  
        $database->bind(':userid', $userid);
        $database->bind(':esalary', $esalary);
        $database->bind(':essay', $essay);
        $database->bind(':dateapplied', $dateapplied);
        try{
            $database->execute();
            $msg = "insert job application";
            $log->info($logtimestamp." - ".$_SESSION['user'] . " " .$msg);
        }catch (PDOException $e) {
            $msg = $e->getTraceAsString()." ".$e->getMessage();
            $log->error($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
            die("");
        } 
        $database->query('Delete from savedapplications where jobid=:jobid and userid=:userid');
        $database->bind(':jobid', $jobid);  
        $database->bind(':userid', $userid);
        try{    
            $database->execute();
         }catch (PDOException $e) {
            $msg = $e->getTraceAsString()." ".$e->getMessage();
            $log->error($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
            die("");
        }    
    }else{
        echo 'applied';
    }
}else{
    header("Location: logout.php");
}
    
  
?> 