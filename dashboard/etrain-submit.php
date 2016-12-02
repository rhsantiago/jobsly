<?php

if(isset($_POST['id'])){ $id = $_POST['id']; }
if(isset($_POST['etrain'])){ $etrain = $_POST['etrain']; }
if(isset($_POST['mode'])){ $mode = $_POST['mode']; }
if(isset($_POST['userid'])){ $userid = $_POST['userid']; }
include 'Database.php';
$database = new Database();

if($etrain=='hs'){
    $hssdate = "";
    if(isset($_POST['hsschool'])){ $hsschool = $_POST['hsschool']; } 
    if(isset($_POST['hsadd'])){ $hsadd = $_POST['hsadd']; }
    if(isset($_POST['hsgraddate'])){ $hsgraddate = $_POST['hsgraddate']; }
    $hssdate = explode("/", $hsgraddate);
    $hsgraddate = $hssdate[2] .'-'.$hssdate[0].'-'.$hssdate[1];
    if(isset($_POST['smhs'])){ $smhs = $_POST['smhs']; }
    
    if($mode=='insert'){
         $database->query(' INSERT INTO educationandtraining (id, userid, hsschool,hsadd,hsgraddate,hsawards) VALUES (NULL, :userid, :hsschool, :hsadd,:hsgraddate,:smhs)');
    }

    if($mode=='update'){
       $database->query(' UPDATE educationandtraining SET hsschool = :hsschool, hsadd = :hsadd, hsgraddate = :hsgraddate, hsawards = :smhs WHERE userid = :userid');  
    }
  
    $database->bind(':hsschool', $hsschool);
    $database->bind(':hsadd', $hsadd);  
    $database->bind(':hsgraddate', $hsgraddate);
    $database->bind(':smhs', $smhs);
}



if($etrain=='col'){
    $colsdate = "";
    if(isset($_POST['coluni'])){ $coluni = $_POST['coluni']; } 
    if(isset($_POST['coladd'])){ $coladd = $_POST['coladd']; } 
    if(isset($_POST['colgpa'])){ $colgpa = $_POST['colgpa']; } 
    if(isset($_POST['colgraddate'])){ $colgraddate = $_POST['colgraddate']; } 
    $colsdate = explode("/", $colgraddate);
    $colgraddate = $colsdate[2] .'-'.$colsdate[0].'-'.$colsdate[1];
    if(isset($_POST['colmajor'])){ $colmajor = $_POST['colmajor']; } 
    if(isset($_POST['smcol'])){ $smcol = $_POST['smcol']; } 
    
    if($mode=='insert'){
         $database->query(' INSERT INTO educationandtraining (id, userid, coluni,coladd,colgpa,colgraddate,colmajor,colawards) VALUES (NULL, :userid,:coluni,:coladd,:colgpa,:colgraddate,:colmajor,:smcol)');
    }

    if($mode=='update'){
       $database->query(' UPDATE educationandtraining SET coluni = :coluni, coladd = :coladd, colgpa = :colgpa, colgraddate = :colgraddate, colmajor = :colmajor, colawards = :smcol WHERE userid = :userid'); 
    }
    $database->bind(':coluni', $coluni);  
    $database->bind(':coladd', $coladd);  
    $database->bind(':colgpa', $colgpa);  
    $database->bind(':colgraddate', $colgraddate);  
    $database->bind(':colmajor', $colmajor);  
    $database->bind(':smcol', $smcol);  
}


    $database->bind(':userid', $userid);
       
    $database->execute();
  
?> 
  