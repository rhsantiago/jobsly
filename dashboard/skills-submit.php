<?php
if (session_status() == PHP_SESSION_NONE) {
        session_start();   
}
if(isset($_SESSION['user'])){

if(isset($_POST['id'])){ $id = $_POST['id']; }
if(isset($_POST['skills'])){ $skills = $_POST['skills']; }
if(isset($_POST['mode'])){ $mode = $_POST['mode']; }
if(isset($_POST['userid'])){ $userid = $_POST['userid']; }
include 'Database.php';
$database = new Database();
date_default_timezone_set('Asia/Manila');
$logtimestamp = date("Y-m-d H:i:s");
include "serverlogconfig.php";

if($skills=='skilltag'){
    if(isset($_POST['skilltag'])){ $skilltag = $_POST['skilltag']; }
    if(isset($_POST['skill'])){ $skill = $_POST['skill']; }
    
    $skilltagdate = date("Y-m-d");
    if($mode=='insert'){
         $database->query(' INSERT INTO skilltags (id, userid, skill,skilltag,skilltagdate) VALUES (NULL, :userid,:skill,:skilltag,:skilltagdate)');
    }
    
    $database->bind(':skill', $skill);  
    $database->bind(':skilltag', $skilltag);
    $database->bind(':skilltagdate', $skilltagdate);
}
 $database->bind(':userid', $userid);
 try{      
    $database->execute();
 }catch (PDOException $e) {
    $msg = $e->getTraceAsString()." ".$e->getMessage();
    $log->error($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
    die("");
}     
  
                                                    $database->query('SELECT * FROM skilltags where userid = :userid');
                                                    $database->bind(':userid', $userid); 
                                                    try{  
                                                        $rows = $database->resultset();
                                                    }catch (PDOException $e) {
                                                        $msg = $e->getTraceAsString()." ".$e->getMessage();
                                                        $log->error($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
                                                        die("");
                                                    } 
                                                    foreach($rows as $row){
                                                        $skillid = $row['id'];
                                                        $skilltag = $row['skilltag'];
                                                        
                                                        echo "<span id='$skillid'><a href='#skills-modal-del' class='text-info' data-userid='$userid' data-skillid='$skillid' data-skilltag='$skilltag' data-toggle='modal' data-target='#skills-modal-del'>$skilltag</a></span> ";
                                                    }
 }else{
    header("Location: logout.php");
}   
?> 