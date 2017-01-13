<?php

if(isset($_POST['jobid'])){ $jobid = $_POST['jobid']; }
if(isset($_POST['applicantid'])){ $userid = $_POST['applicantid']; }
include 'Database.php';
$database = new Database();

    $database->query('SELECT id from jobapplications where jobid= :jobid and userid = :userid and userid = :applicantid');
    $database->bind(':userid', $userid);
    $database->bind(':jobid', $jobid);
    $database->bind(':applicantid', $applicantid);
    $checkrow = $database->single();
    if(!empty($checkrow)){
        $database->query(' UPDATE jobapplications SET isshortlisted = 1 where jobid= :jobid and userid = :userid');
        $database->bind(':jobid', $jobid);  
        $database->bind(':userid', $userid);       
        $database->execute();
    }else{
        echo 'shortlisted';
    }

    
  
?> 