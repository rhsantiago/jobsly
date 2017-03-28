<?php
if (session_status() == PHP_SESSION_NONE) {
        session_start();   
}
if(isset($_SESSION['user'])){

if(isset($_POST['jobid'])){ $jobid = $_POST['jobid']; }
if(isset($_POST['action'])){ $action = $_POST['action']; }
include 'Database.php';
$database = new Database();
date_default_timezone_set('Asia/Manila');
$logtimestamp = date("Y-m-d H:i:s");  
include "serverlogconfig.php";

    if($action=='deactivate'){
        $database->query('Update jobads set isactive=0 where id=:jobid');
    }else if($action=='activate'){
        $database->query('Update jobads set isactive=1 where id=:jobid');
    }
    $database->bind(':jobid', $jobid); 

    try{
        $database->execute();
        $msg = $action." ".$jobid;
        $log->info($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
    }catch (PDOException $e) {
         $msg = $e->getTraceAsString()." ".$e->getMessage();
         $log->error($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
         die("");
    }
    echo $skillid;
}else{
    header("Location: logout.php");
}                                      
?> 