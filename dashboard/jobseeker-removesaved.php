<?php
if (session_status() == PHP_SESSION_NONE) {
        session_start();
}
if(isset($_SESSION['user'])){
     $userid = $_SESSION['userid'];  
 
    if(isset($_POST['jobid'])){ $jobid = $_POST['jobid']; }
    include "serverlogconfig.php";
    include 'Database.php';
    $database = new Database();
    date_default_timezone_set('Asia/Manila');
    $logtimestamp = date("Y-m-d H:i:s"); 


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
    header("Location: logout.php");
}  
?> 