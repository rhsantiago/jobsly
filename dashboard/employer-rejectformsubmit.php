<?php

if(isset($_POST['jobid'])){ $jobid = $_POST['jobid']; }
if(isset($_POST['applicantid'])){ $applicantid = $_POST['applicantid']; }
if(isset($_POST['mode'])){ $mode = $_POST['mode']; }
include 'Database.php';
$database = new Database();

     $database->query(' UPDATE jobapplications SET isreject = 1 where jobid= :jobid and userid = :userid');
     $database->bind(':jobid', $jobid);  
     $database->bind(':userid', $applicantid);
     $database->execute();

        
        $database->query('select (select count(id) from jobapplications where jobid=:jobid and isreject=0) as active,(select count(id) from jobapplications where jobid=:jobid and isshortlisted=1 and isreject=0) as shortlist from jobapplications');
        $database->bind(':jobid', $jobid);
        $row = $database->single();   
        $active = $row['active'];
        $shortlist = $row['shortlist'];
        
      
        $arr = array($active,$shortlist);

       // header('Content-Type: application/json');
       echo  json_encode($arr,JSON_FORCE_OBJECT);
       //echo $active; 
?> 