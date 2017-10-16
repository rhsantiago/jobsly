<?php
if (session_status() == PHP_SESSION_NONE) {
        session_start();   
}
if(isset($_SESSION['user'])){
    
if(isset($_POST['id'])){ $id = $_POST['id']; }
if(isset($_POST['mode'])){ $mode = $_POST['mode']; }
if(isset($_POST['dposition'])){ $dposition = $_POST['dposition']; } 
if(isset($_POST['specialization'])){ $specialization = $_POST['specialization']; }
if(isset($_POST['otherspec'])){ $otherspec = $_POST['otherspec']; }    
if(isset($_POST['userid'])){ $userid = $_POST['userid']; }
if(isset($_POST['plevel'])){ $plevel = $_POST['plevel']; }
if(isset($_POST['esalary'])){ $esalary = $_POST['esalary']; }
if(isset($_POST['pworkloc'])){ $pworkloc = $_POST['pworkloc']; }
if(isset($_POST['yexp'])){ $yexp = $_POST['yexp']; }
if(isset($_POST['wtravel'])){ $wtravel = $_POST['wtravel']; }
if(isset($_POST['wrelocate'])){ $wrelocate = $_POST['wrelocate']; }
if(isset($_POST['pholder'])){ $pholder = $_POST['pholder']; }
if(isset($_POST['languages'])){ $languages = $_POST['languages']; }
if(isset($_POST['profsum'])){ $profsum = $_POST['profsum']; }
date_default_timezone_set('Asia/Manila');
$logtimestamp = date("Y-m-d H:i:s");
include "serverlogconfig.php";
include 'Database.php';
$database = new Database();
$database->query('SELECT * from additionalinformation where userid = :userid');
    $database->bind(':userid', $userid);   
    
    try{
    $row = $database->single();
    }catch (PDOException $e) {
        $msg = $e->getTraceAsString()." ".$e->getMessage();
        $log->error($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
        die("");
    }    
    $checkid = $row['id'];
    if(!empty($checkid)){
        $mode = 'update';               
    }else{
        $mode = 'insert';
    }   
    
    if($mode=='insert'){
         $database->query(' INSERT INTO additionalinformation (id, userid, dposition,specialization, otherspec, plevel,esalary,pworkloc,yexp, wtravel, wrelocate, pholder,languages, profsum) VALUES (NULL, :userid, :dposition, :specialization, :otherspec, :plevel, :esalary, :pworkloc,:yexp,:wtravel,:wrelocate,:pholder,:languages,:profsum)');
         
    }

    if($mode=='update'){
       $database->query(' UPDATE additionalinformation SET userid = :userid, dposition = :dposition, specialization = :specialization, otherspec=:otherspec, plevel = :plevel, esalary = :esalary, pworkloc = :pworkloc, yexp = :yexp, wtravel = :wtravel, wrelocate = :wrelocate, pholder = :pholder, languages = :languages, profsum=:profsum WHERE additionalinformation.id = :pid or userid = :userid'); 
        $database->bind(':pid', $id);
        
    }

   
    
    $database->bind(':userid', $userid);
    $database->bind(':dposition', $dposition);
    $database->bind(':specialization', $specialization);
    $database->bind(':otherspec', $otherspec);  
    $database->bind(':plevel', $plevel);
    $database->bind(':esalary', $esalary); 
    $database->bind(':pworkloc', $pworkloc); 
    $database->bind(':yexp', $yexp); 
    $database->bind(':wtravel', $wtravel); 
    $database->bind(':wrelocate', $wrelocate);
    $database->bind(':pholder', $pholder);
    $database->bind(':languages', $languages);
    $database->bind(':profsum', $profsum);
    try{
        $database->execute();
        $msg = "logged";
        $log->info($logtimestamp." - ".$_SESSION['user'] . " " .$msg);    
    }catch (PDOException $e) {
        $msg = $e->getTraceAsString()." ".$e->getMessage();
        $log->error($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
        die("");
    }
}else{
    header("Location: logout.php");
}    
?> 
  