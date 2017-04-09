<?php
if (session_status() == PHP_SESSION_NONE) {
        session_start();   
}
if(isset($_SESSION['user'])){

if(isset($_POST['applicantid'])){ $applicantid = $_POST['applicantid']; }
if(isset($_POST['action'])){ $action = $_POST['action']; }
include 'Database.php';
$database = new Database();
date_default_timezone_set('Asia/Manila');
$logtimestamp = date("Y-m-d H:i:s");  
include "serverlogconfig.php";

    if($action=='deactivate'){
        $database->query('Update useraccounts set isverified=0 where id=:applicantid');
    }else if($action=='activate'){
        $database->query('Update useraccounts set isverified=1 where id=:applicantid');
    }
    $database->bind(':applicantid', $applicantid); 

    try{
        $database->execute();
        $msg = $action." jobseeker ".$applicantid;
        $log->info($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
    }catch (PDOException $e) {
         $msg = $e->getTraceAsString()." ".$e->getMessage();
         $log->error($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
         die("");
    }
   // echo $applicantid;
}else{
    header("Location: logout.php");
}                                      
?> 