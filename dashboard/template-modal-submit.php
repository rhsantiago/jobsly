<?php
if (session_status() == PHP_SESSION_NONE) {
        session_start();   
}
if(isset($_SESSION['user'])){
    
if(isset($_POST['templateid'])){ $templateid = $_POST['templateid']; }
if(isset($_POST['mode'])){ $mode = $_POST['mode']; }
if(isset($_POST['userid'])){ $userid = $_POST['userid']; }
include "serverlogconfig.php";
include 'Database.php';
$database = new Database();
date_default_timezone_set('Asia/Manila');
$logtimestamp = date("Y-m-d H:i:s"); 

 
    $database->query('delete from jobtemplates where id = :templateid and userid=:userid');

    $database->bind(':templateid', $templateid);
    $database->bind(':userid', $userid);
    try{   
        $database->execute();
        $msg = "jobtemplates delete id=".$templateid;
        $log->info($logtimestamp." - ".$_SESSION['user'] . " " .$msg);
    }catch (PDOException $e) {
        $msg = $e->getTraceAsString()." ".$e->getMessage();
        $log->error($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
        die("");
    }    
  
                                                   
}else{
    header("Location: logout.php");
}   
?> 