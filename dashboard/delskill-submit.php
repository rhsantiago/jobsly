<?php

if(isset($_POST['skillid'])){ $skillid = $_POST['skillid']; }
if(isset($_POST['userid'])){ $userid = $_POST['userid']; }
include 'Database.php';
$database = new Database();



    if(isset($_POST['skilltag'])){ $skilltag = $_POST['skilltag']; }
    if(isset($_POST['skillid'])){ $skillid = $_POST['skillid']; }

    $database->query('Delete from skilltags where id=:skillid and userid=:userid');

    $database->bind(':skillid', $skillid); 
    $database->bind(':userid', $userid);
    $database->execute();
  
    echo $skillid;
                                      
?> 