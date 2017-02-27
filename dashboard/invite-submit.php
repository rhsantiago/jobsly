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
    
    echo "invited";
}else{
    header("Location: logout.php");
}                                      
?> 