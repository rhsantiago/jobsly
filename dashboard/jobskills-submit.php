<?php
if (session_status() == PHP_SESSION_NONE) {
        session_start();   
}
if(isset($_SESSION['user'])){
    
if(isset($_POST['jobid'])){ $jobid = $_POST['jobid']; }
if(isset($_POST['mode'])){ $mode = $_POST['mode']; }
if(isset($_POST['userid'])){ $userid = $_POST['userid']; }
include "serverlogconfig.php";
include 'Database.php';
$database = new Database();
date_default_timezone_set('Asia/Manila');
$logtimestamp = date("Y-m-d H:i:s"); 


    if(isset($_POST['jobskilltag'])){ $jobskilltag = $_POST['jobskilltag']; }
    if(isset($_POST['jobskill'])){ $jobskill = $_POST['jobskill']; }
   
    $jobskilltagdate = date("Y-m-d");
    if($mode=='insert'){
         $database->query(' INSERT INTO jobskills (id, userid,jobid, jobskill,jobskilltag,jobskilltagdate) VALUES (NULL, :userid,:jobid,:jobskill,:jobskilltag,:jobskilltagdate)');
    }
    $database->bind(':jobid', $jobid); 
    $database->bind(':jobskill', $jobskill);  
    $database->bind(':jobskilltag', $jobskilltag);
    $database->bind(':jobskilltagdate', $jobskilltagdate);
    $database->bind(':userid', $userid);
    try{   
        $database->execute();
        $msg = "jobskill ".$mode;
        $log->info($logtimestamp." - ".$_SESSION['user'] . " " .$msg);
    }catch (PDOException $e) {
        $msg = $e->getTraceAsString()." ".$e->getMessage();
        $log->error($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
        die("");
    }    
  
                                                    $database->query('SELECT * FROM jobskills where jobid = :jobid');
                                                    $database->bind(':jobid', $jobid);  
                                                    try{      
                                                        $rows = $database->resultset();
                                                    }catch (PDOException $e) {
                                                        $msg = $e->getTraceAsString()." ".$e->getMessage();
                                                        $log->error($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
                                                        die("");
                                                    }
                                                    foreach($rows as $row){
                                                        echo $row['jobskilltag'];
                                                        echo ' ';
                                                      
                                                    }
}else{
    header("Location: logout.php");
}   
?> 