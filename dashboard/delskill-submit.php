<?php

if(isset($_POST['skillid'])){ $skillid = $_POST['skillid']; }
if(isset($_POST['userid'])){ $userid = $_POST['userid']; }
include 'Database.php';
$database = new Database();
include "serverlogconfig.php";


    if(isset($_POST['skilltag'])){ $skilltag = $_POST['skilltag']; }
    if(isset($_POST['skillid'])){ $skillid = $_POST['skillid']; }

    $database->query('Delete from skilltags where id=:skillid and userid=:userid');

    $database->bind(':skillid', $skillid); 
    $database->bind(':userid', $userid);
    try{
    $database->execute();
    $msg = "delete skilltag";
    include "serverlog.php";    
    }catch (PDOException $e) {
        $error = true;
        $msg = $e->getTraceAsString()." ".$e->getMessage();
        include "serverlog.php";
        die("");
    }
    echo $skillid;
                                      
?> 