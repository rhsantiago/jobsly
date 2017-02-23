<?php
if (session_status() == PHP_SESSION_NONE) {
        session_start();   
}
if(isset($_SESSION['user'])){
    
if(isset($_POST['mode'])){ $mode = $_POST['mode']; }
if(isset($_POST['userid'])){ $userid = $_POST['userid']; }
if(isset($_POST['companyname'])){ $companyname = $_POST['companyname']; }
if(isset($_POST['companyaddress'])){ $companyaddress = $_POST['companyaddress']; }
if(isset($_POST['companywebsite'])){ $companywebsite = $_POST['companywebsite']; }
if(isset($_POST['telno'])){ $telno = $_POST['telno']; }
if(isset($_POST['companytin'])){ $companytin = $_POST['companytin']; }
if(isset($_POST['cperson'])){ $cperson = $_POST['cperson']; }
if(isset($_POST['designation'])){ $designation = $_POST['designation']; }
if(isset($_POST['cpersonemail'])){ $cpersonemail = $_POST['cpersonemail']; }
if(isset($_POST['cpersontelno'])){ $cpersontelno = $_POST['cpersontelno']; }
if(isset($_POST['industry'])){ $industry = $_POST['industry']; }
if(isset($_POST['numemp'])){ $numemp = $_POST['numemp']; }
if(isset($_POST['ctype'])){ $ctype = $_POST['ctype']; }
if(isset($_POST['cdesc'])){ $cdesc = $_POST['cdesc']; }
date_default_timezone_set('Asia/Manila');
$logtimestamp = date("Y-m-d H:i:s");
include "serverlogconfig.php";
include 'Database.php';
$database = new Database();

    if($mode=='insert'){
         $database->query(' INSERT INTO companyinfo (id, userid,companyname, companyaddress,companywebsite,telno,companytin, cperson,designation,cpersonemail,cpersontelno,industry,numemp,ctype,cdesc) VALUES (NULL, :userid,:companyname,:companyaddress,:companywebsite, :telno,:companytin,:cperson,:designation,:cpersonemail,:cpersontelno,:industry,:numemp,:ctype,:cdesc)');
    }
    if(strcmp($mode,'update')==0){
         $database->query('Update companyinfo set  companyname=:companyname, companyaddress=:companyaddress,companywebsite=:companywebsite ,telno=:telno,companytin=:companytin, cperson=:cperson,designation=:designation,cpersonemail=:cpersonemail, cpersontelno=:cpersontelno,industry=:industry,numemp=:numemp,ctype=:ctype,cdesc=:cdesc where userid=:userid');
    }
    $database->bind(':companyname', $companyname); 
    $database->bind(':companyaddress', $companyaddress);
    $database->bind(':companywebsite', $companywebsite);
    $database->bind(':telno', $telno);
    $database->bind(':companytin', $companytin);
    $database->bind(':cperson', $cperson);
    $database->bind(':designation', $designation);
    $database->bind(':cpersonemail', $cpersonemail);
    $database->bind(':cpersontelno', $cpersontelno);
    $database->bind(':industry', $industry);
    $database->bind(':numemp', $numemp);
    $database->bind(':ctype', $ctype);
    $database->bind(':cdesc', $cdesc);

    $database->bind(':userid', $userid);
    try{   
        $database->execute();
        $msg = "full registration submit ".$mode;
        $log->info($logtimestamp." - ".$_SESSION['user'] . " " .$msg);    
    }catch (PDOException $e) {
        $msg = $e->getTraceAsString()." ".$e->getMessage();
        $log->error($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
        die("");
        }    
    echo 'success';
    
}else{
    header("Location: logout.php");
}    
?> 