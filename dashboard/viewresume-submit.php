<?php


    if (session_status() == PHP_SESSION_NONE) {
        session_start();
         if (!isset($database)){
            include 'Database.php';
         }
    }
date_default_timezone_set('Asia/Manila');
$logtimestamp = date("Y-m-d H:i:s");
include 'specialization.php';
if(isset($_POST['jobid'])){ $jobid = $_POST['jobid']; } 
if(isset($_POST['applicantid'])){ $applicantid = $_POST['applicantid']; } 
if(isset($_SESSION['user'])){
   $user = $_SESSION['user'];
   $password = $_SESSION['password'];
   $userid = $_SESSION['userid'];
    
    include "serverlogconfig.php";
    $database = new Database();
}
     $database->query(' UPDATE jobapplications SET isnew = 0 where jobid= :jobid and userid = :userid');
     $database->bind(':jobid', $jobid);  
     $database->bind(':userid', $applicantid);
     try{
        $database->execute();
     }catch (PDOException $e) {
        $msg = $e->getTraceAsString()." ".$e->getMessage();
        $log->error($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
        die("");
     }

    $database->query('select (select count(id) from jobapplications where jobid=:jobid and isnew=1) as napps from jobapplications');
$database->bind(':jobid', $jobid);
try{
    $row = $database->single();   
}catch (PDOException $e) {
    $msg = $e->getTraceAsString()." ".$e->getMessage();
    $log->error($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
    die("");
} 
$napps = $row['napps'];
echo $napps;
?>    

