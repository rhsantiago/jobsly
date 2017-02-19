<?php

if(isset($_POST['id'])){ $id = $_POST['id']; }
if(isset($_POST['etrain'])){ $etrain = $_POST['etrain']; }
if(isset($_POST['mode'])){ $mode = $_POST['mode']; }
if(isset($_POST['userid'])){ $userid = $_POST['userid']; }
include "serverlogconfig.php";
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


if($etrain=='pgrad1'){
    $pgrad1sdate = "";
    if(isset($_POST['pgrad1uni'])){ $pgrad1uni = $_POST['pgrad1uni']; } 
    if(isset($_POST['pgrad1add'])){ $pgrad1add = $_POST['pgrad1add']; } 
    if(isset($_POST['pgrad1gpa'])){ $pgrad1gpa = $_POST['pgrad1gpa']; } 
    if(isset($_POST['pgrad1graddate'])){ $pgrad1graddate = $_POST['pgrad1graddate']; } 
    $pgrad1sdate = explode("/", $pgrad1graddate);
    $pgrad1graddate = $pgrad1sdate[2] .'-'.$pgrad1sdate[0].'-'.$pgrad1sdate[1];
    if(isset($_POST['pgrad1course'])){ $pgrad1course = $_POST['pgrad1course']; } 
    if(isset($_POST['smpgrad1'])){ $smpgrad1 = $_POST['smpgrad1']; } 
    
    if($mode=='insert'){
         $database->query(' INSERT INTO educationandtraining (id, userid, pgrad1uni,pgrad1add,pgrad1gpa,pgrad1graddate,pgrad1course,pgrad1awards) VALUES (NULL, :userid,:pgrad1uni,:pgrad1add,:pgrad1gpa,:pgrad1graddate,:pgrad1course,:smpgrad1)');
    }

    if($mode=='update'){
       $database->query(' UPDATE educationandtraining SET pgrad1uni = :pgrad1uni, pgrad1add = :pgrad1add, pgrad1gpa = :pgrad1gpa, pgrad1graddate = :pgrad1graddate, pgrad1course = :pgrad1course, pgrad1awards = :smpgrad1 WHERE userid = :userid'); 
    }
    $database->bind(':pgrad1uni', $pgrad1uni);  
    $database->bind(':pgrad1add', $pgrad1add);  
    $database->bind(':pgrad1gpa', $pgrad1gpa);  
    $database->bind(':pgrad1graddate', $pgrad1graddate);  
    $database->bind(':pgrad1course', $pgrad1course);  
    $database->bind(':smpgrad1', $smpgrad1);  
}


if($etrain=='others'){   
    if(isset($_POST['smothers'])){ $smothers = $_POST['smothers']; } 
    
    if($mode=='insert'){
         $database->query(' INSERT INTO educationandtraining (id, userid, smothers) VALUES (NULL, :userid,:smothers)');
    }

    if($mode=='update'){
       $database->query(' UPDATE educationandtraining SET othersawards = :smothers WHERE userid = :userid'); 
    }   
    $database->bind(':smothers', $smothers);  
}


    $database->bind(':userid', $userid);
    try{   
        $database->execute();
        $msg = $etrain." ".$mode;
        include "serverlog.php";
    }catch (PDOException $e) {
                                    $error = true;
                                    $msg = $e->getTraceAsString()." ".$e->getMessage();
                                    include "serverlog.php";
                                    die("");
    }     
  
?> 
  