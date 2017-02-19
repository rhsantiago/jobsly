<?php
if(isset($_POST['id'])){ $id = $_POST['id']; }
if(isset($_POST['mode'])){ $mode = $_POST['mode']; }
if(isset($_POST['dposition'])){ $dposition = $_POST['dposition']; } 
if(isset($_POST['specialization'])){ $specialization = $_POST['specialization']; }
if(isset($_POST['userid'])){ $userid = $_POST['userid']; }
if(isset($_POST['plevel'])){ $plevel = $_POST['plevel']; }
if(isset($_POST['esalary'])){ $esalary = $_POST['esalary']; }
if(isset($_POST['pworkloc'])){ $pworkloc = $_POST['pworkloc']; }
if(isset($_POST['yexp'])){ $yexp = $_POST['yexp']; }
if(isset($_POST['wtravel'])){ $wtravel = $_POST['wtravel']; }
if(isset($_POST['wrelocate'])){ $wrelocate = $_POST['wrelocate']; }
if(isset($_POST['pholder'])){ $pholder = $_POST['pholder']; }
if(isset($_POST['languages'])){ $languages = $_POST['languages']; }

include "serverlogconfig.php";
include 'Database.php';
$database = new Database();
    
    if($mode=='insert'){
         $database->query(' INSERT INTO additionalinformation (id, userid, dposition,specialization,plevel,esalary,pworkloc,yexp,wtravel,wrelocate,pholder,languages) VALUES (NULL, :userid, :dposition, :specialization,:plevel,:esalary,:pworkloc,:yexp,:wtravel,:wrelocate,:pholder,:languages)');
         
    }

    if($mode=='update'){
       $database->query(' UPDATE additionalinformation SET userid = :userid, dposition = :dposition, specialization = :specialization, plevel = :plevel, esalary = :esalary, pworkloc = :pworkloc, yexp = :yexp, wtravel = :wtravel, wrelocate = :wrelocate, pholder = :pholder, languages = :languages WHERE additionalinformation.id = :pid or userid = :userid'); 
        $database->bind(':pid', $id);
        
    }

   
    
    $database->bind(':userid', $userid);
    $database->bind(':dposition', $dposition);
    $database->bind(':specialization', $specialization);  
    $database->bind(':plevel', $plevel);
    $database->bind(':esalary', $esalary); 
    $database->bind(':pworkloc', $pworkloc); 
    $database->bind(':yexp', $yexp); 
    $database->bind(':wtravel', $wtravel); 
    $database->bind(':wrelocate', $wrelocate);
    $database->bind(':pholder', $pholder);
    $database->bind(':languages', $languages);
    try{
    $database->execute();
    $msg = "additionalinfo submit ";
    include "serverlog.php";    
    }catch (PDOException $e) {
        $error = true;
        $msg = $e->getTraceAsString()." ".$e->getMessage();
        include "serverlog.php";
        die("");
    }
?> 
  