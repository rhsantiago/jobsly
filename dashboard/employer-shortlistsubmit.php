<?php

if(isset($_POST['jobid'])){ $jobid = $_POST['jobid']; }
if(isset($_POST['applicantid'])){ $applicantid = $_POST['applicantid']; }
if(isset($_POST['mode'])){ $mode = $_POST['mode']; }
include 'Database.php';
$database = new Database();

    $database->query('SELECT id from jobapplications where jobid= :jobid and userid = :userid and isshortlisted=1');
    $database->bind(':userid', $applicantid);
    $database->bind(':jobid', $jobid);
  
    $checkrow = $database->single();
    if(empty($checkrow)){
        $isshortlisted = 1;
    }else{
        $isshortlisted = 0; 
    }
     $database->query(' UPDATE jobapplications SET isshortlisted = :isshortlisted where jobid= :jobid and userid = :userid');
     $database->bind(':jobid', $jobid);  
     $database->bind(':userid', $applicantid);
     $database->bind(':isshortlisted', $isshortlisted);
     $database->execute();

  
        $database->query('select (select count(id) from jobapplications where jobid=:jobid and isshortlisted=1) as shortlisted from jobapplications');
        $database->bind(':jobid', $jobid);
        $row = $database->single();   
        $shortlisted = $row['shortlisted'];
        echo $shortlisted;
  
?> 