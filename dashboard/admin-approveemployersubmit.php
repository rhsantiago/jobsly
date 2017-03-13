<?php
if (session_status() == PHP_SESSION_NONE) {
        session_start();   
}
if(isset($_SESSION['user'])){

if(isset($_POST['employerid'])){ $employerid = $_POST['employerid']; }
if(isset($_POST['mode'])){ $mode = $_POST['mode']; }
include 'Database.php';
$database = new Database();
date_default_timezone_set('Asia/Manila');
$logtimestamp = date("Y-m-d H:i:s");  
include "serverlogconfig.php";

    if($mode=="approve"){
        $database->query('UPDATE useraccounts set isverified=1 where id=:employerid');
        $database->bind(':employerid', $employerid);     
        $msg = "approved employerid=".$employerid;
    }
    try{
        $database->execute();        
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