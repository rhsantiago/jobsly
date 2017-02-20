<?php

if(isset($_POST['jobid'])){ $jobid = $_POST['jobid']; }
if(isset($_POST['userid'])){ $userid = $_POST['userid']; }
if(isset($_POST['esalary'])){ $esalary = $_POST['esalary']; }
if(isset($_POST['essay'])){ $essay = $_POST['essay']; }
include 'Database.php';
include "serverlogconfig.php";
$database = new Database();
$dateapplied = date("Y-m-d");
    $database->query('SELECT * from jobapplications where jobid= :jobid and userid = :userid');
    $database->bind(':userid', $userid);
    $database->bind(':jobid', $jobid);
    try{
        $checkrow = $database->single();
    }catch (PDOException $e) {
        $error = true;
        $msg = $e->getTraceAsString()." ".$e->getMessage();
        include "serverlog.php";
        die("");
    }     
    if(empty($checkrow)){
        $database->query(' INSERT INTO jobapplications (id, jobid, userid,esalary,essayanswer,dateapplied,isnew,isshortlisted,isreject) VALUES (NULL, :jobid,:userid,:esalary,:essay,:dateapplied,1,0,0)');
        $database->bind(':jobid', $jobid);  
        $database->bind(':userid', $userid);
        $database->bind(':esalary', $esalary);
        $database->bind(':essay', $essay);
        $database->bind(':dateapplied', $dateapplied);
        try{
            $database->execute();
        }catch (PDOException $e) {
            $error = true;
            $msg = $e->getTraceAsString()." ".$e->getMessage();
            include "serverlog.php";
            die("");
        } 
        $database->query('Delete from savedapplications where jobid=:jobid and userid=:userid');
        $database->bind(':jobid', $jobid);  
        $database->bind(':userid', $userid);
        try{    
            $database->execute();
         }catch (PDOException $e) {
            $error = true;
            $msg = $e->getTraceAsString()." ".$e->getMessage();
            include "serverlog.php";
            die("");
        }    
    }else{
        echo 'applied';
    }

    
  
?> 