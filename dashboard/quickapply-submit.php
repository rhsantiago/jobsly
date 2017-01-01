<?php

if(isset($_POST['jobid'])){ $jobid = $_POST['jobid']; }
if(isset($_POST['userid'])){ $userid = $_POST['userid']; }
if(isset($_POST['esalary'])){ $esalary = $_POST['esalary']; }
if(isset($_POST['essay'])){ $essayd = $_POST['essay']; }
include 'Database.php';
$database = new Database();



    $database->query(' INSERT INTO jobapplications (id, jobid, userid,esalary,essayanswer) VALUES (NULL, :jobid,:userid,:esalary,:essay)');
    
    
    $database->bind(':jobid', $jobid);  
    $database->bind(':userid', $userid);
    $database->bind(':esalary', $esalary);
    $database->bind(':essay', $essay);

$database->execute();
  
?> 