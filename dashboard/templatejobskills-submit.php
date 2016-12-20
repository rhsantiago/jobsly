<?php

if(isset($_POST['templateid'])){ $templateid = $_POST['templateid']; }
if(isset($_POST['mode'])){ $mode = $_POST['mode']; }
if(isset($_POST['userid'])){ $userid = $_POST['userid']; }
include 'Database.php';
$database = new Database();



    if(isset($_POST['jobskilltag'])){ $jobskilltag = $_POST['jobskilltag']; }
    if(isset($_POST['jobskill'])){ $jobskill = $_POST['jobskill']; }
    date_default_timezone_set('Asia/Manila');
    $jobskilltagdate = date("Y-m-d");
    if($mode=='insert'){
         $database->query(' INSERT INTO jobskillstemplate (id, userid,templateid, jobskill,jobskilltag,jobskilltagdate) VALUES (NULL, :userid,:templateid,:jobskill,:jobskilltag,:jobskilltagdate)');
    }
    $database->bind(':templateid', $templateid); 
    $database->bind(':jobskill', $jobskill);  
    $database->bind(':jobskilltag', $jobskilltag);
    $database->bind(':jobskilltagdate', $jobskilltagdate);
    $database->bind(':userid', $userid);
       
    $database->execute();
  
                                                    $database->query('SELECT * FROM jobskillstemplate where templateid = :templateid');
                                                    $database->bind(':templateid', $templateid);  
                                                    $rows = $database->resultset();
                                                           // echo $row['name'];
                                                    foreach($rows as $row){
                                                        echo $row['jobskilltag'];
                                                        echo ' ';
                                                      
                                                    }
?> 