<?php
if (session_status() == PHP_SESSION_NONE) {
        session_start();   
}
if(isset($_SESSION['user'])){

if(isset($_POST['employerid'])){ $employerid = $_POST['employerid']; }
include 'Database.php';
$database = new Database();
date_default_timezone_set('Asia/Manila');
$logtimestamp = date("Y-m-d H:i:s");  
include "serverlogconfig.php";

        $database->query("UPDATE companyinfo set header='' where userid=:employerid");
        $database->bind(':employerid', $employerid);     
        $msg = "delete header employerid=".$employerid;
 
    try{
        $database->execute();        
        $log->info($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
    }catch (PDOException $e) {
         $msg = $e->getTraceAsString()." ".$e->getMessage();
         $log->error($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
         die("");
    }
    header('Location: admin-employers.php?ajax=emppage&employerid='.$employerid);
}else{
    header("Location: logout.php");
}                                      
?> 