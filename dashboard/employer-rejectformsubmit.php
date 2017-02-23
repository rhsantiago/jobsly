<?php
if (session_status() == PHP_SESSION_NONE) {
        session_start();   
}
if(isset($_SESSION['user'])){
if(isset($_POST['jobid'])){ $jobid = $_POST['jobid']; }
if(isset($_POST['applicantid'])){ $applicantid = $_POST['applicantid']; }
if(isset($_POST['mode'])){ $mode = $_POST['mode']; }
date_default_timezone_set('Asia/Manila');
$logtimestamp = date("Y-m-d H:i:s");
include "serverlogconfig.php";
include 'Database.php';
$database = new Database();

     $database->query(' UPDATE jobapplications SET isreject = 1 where jobid= :jobid and userid = :userid');
     $database->bind(':jobid', $jobid);  
     $database->bind(':userid', $applicantid);
     try{
         $database->execute();
         $msg = "rejected an application ";
         $log->info($logtimestamp." - ".$_SESSION['user'] . " " .$msg);     
     }catch (PDOException $e) {
         $msg = $e->getTraceAsString()." ".$e->getMessage();
         $log->error($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
         die("");
     }     
        
        $database->query('select (select count(id) from jobapplications where jobid=:jobid and isreject=0) as active,(select count(id) from jobapplications where jobid=:jobid and isshortlisted=1 and isreject=0) as shortlist from jobapplications');
        $database->bind(':jobid', $jobid);
        try{
            $row = $database->single();  
        }catch (PDOException $e) {
            $msg = $e->getTraceAsString()." ".$e->getMessage();
            $log->error($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
            die("");
        }    
        $active = $row['active'];
        $shortlist = $row['shortlist'];
        
      
        $arr = array($active,$shortlist);

       // header('Content-Type: application/json');
       echo  json_encode($arr,JSON_FORCE_OBJECT);
}else{
    header("Location: logout.php");
}
?> 