<?php
if (session_status() == PHP_SESSION_NONE) {
        session_start();   
}
if(isset($_SESSION['user'])){

if(isset($_POST['skillid'])){ $skillid = $_POST['skillid']; }
if(isset($_POST['userid'])){ $userid = $_POST['userid']; }
include 'Database.php';
$database = new Database();
date_default_timezone_set('Asia/Manila');
$logtimestamp = date("Y-m-d H:i:s");  
include "serverlogconfig.php";


    if(isset($_POST['skilltag'])){ $skilltag = $_POST['skilltag']; }
    if(isset($_POST['skillid'])){ $skillid = $_POST['skillid']; }

    $database->query('Delete from skilltags where id=:skillid and userid=:userid');

    $database->bind(':skillid', $skillid); 
    $database->bind(':userid', $userid);
    try{
        $database->execute();
        $msg = "delete skilltag";
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