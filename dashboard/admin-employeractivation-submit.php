<?php
if (session_status() == PHP_SESSION_NONE) {
        session_start();   
}
if(isset($_SESSION['user'])){

if(isset($_POST['employerid'])){ $employerid = $_POST['employerid']; }
if(isset($_POST['action'])){ $action = $_POST['action']; }
include 'Database.php';
$database = new Database();
date_default_timezone_set('Asia/Manila');
$logtimestamp = date("Y-m-d H:i:s");  
include "serverlogconfig.php";

    if($action=='deactivate'){
        $database->query('Update useraccounts set isverified=0 where id=:employerid');
    }else if($action=='activate'){
        $database->query('Update useraccounts set isverified=1 where id=:employerid');
    }
    $database->bind(':employerid', $employerid); 

    try{
        $database->execute();
        $msg = $action." ".$employerid;
        $log->info($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
    }catch (PDOException $e) {
         $msg = $e->getTraceAsString()." ".$e->getMessage();
         $log->error($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
         die("");
    }
    echo employerid;
}else{
    header("Location: logout.php");
}                                      
?> 