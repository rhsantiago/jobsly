<?php
if(isset($_POST['id'])){ $id = $_POST['id']; }
if(isset($_POST['mode'])){ $mode = $_POST['mode']; }
if(isset($_POST['userid'])){ $userid = $_POST['userid']; }
if(isset($_POST['hsschool'])){ $hsschool = $_POST['hsschool']; } 
if(isset($_POST['hsadd'])){ $hsadd = $_POST['hsadd']; }
if(isset($_POST['hsgraddate'])){ $hsgraddate = $_POST['hsgraddate']; }
$hssdate = explode("/", $hsgraddate);
$hsgraddate = $hssdate[2] .'-'.$hssdate[0].'-'.$hssdate[1];
if(isset($_POST['smhs'])){ $smhs = $_POST['smhs']; }

if(isset($_POST['coluni'])){ $coluni = $_POST['coluni']; } 
if(isset($_POST['coladd'])){ $coladd = $_POST['coladd']; } 
if(isset($_POST['colgpa'])){ $colgpa = $_POST['colgpa']; } 
if(isset($_POST['colgraddate'])){ $colgraddate = $_POST['colgraddate']; } 
$colsdate = explode("/", $colgraddate);
$colgraddate = $colsdate[2] .'-'.$colsdate[0].'-'.$colsdate[1];
if(isset($_POST['colmajor'])){ $colmajor = $_POST['colmajor']; } 
if(isset($_POST['smcol'])){ $smcol = $_POST['smcol']; } 



include 'Database.php';
$database = new Database();
    
    if($mode=='insert'){
         $database->query(' INSERT INTO educationandtraining (id, userid, hsschool,hsadd,hsgraddate,hsawards,coluni,coladd,colgpa,colgraddate,colmajor,smcol) VALUES (NULL, :userid, :hsschool, :hsadd,:hsgraddate,:smhs,:coluni,:coladd,:colgpa,:colgraddate,:colmajor,:smcol)');
         
    }

    if($mode=='update'){
       $database->query(' UPDATE personalinformation SET userid = :userid, lname = :lname, fname = :fname, mname = :mname, street = :street, city = :city, province = :province, country = :country, mnumber = :mnumber, myemail = :myemail, landline = :landline, age = :age, birthday = :birthday, gender = :gender, nationality = :nationality WHERE personalinformation.id = :pid or userid = :userid'); 
        $database->bind(':pid', $id);
        
    }

   
    
    $database->bind(':userid', $userid);
    $database->bind(':hsschool', $hsschool);
    $database->bind(':hsadd', $hsadd);  
    $database->bind(':hsgraddate', $hsgraddate);
    $database->bind(':smhs', $smhs);   

    $database->bind(':coluni', $coluni);  
    $database->bind(':coladd', $coladd);  
    $database->bind(':colgpa', $colgpa);  
    $database->bind(':colgraddate', $colgraddate);  
    $database->bind(':colmajor', $colmajor);  
    $database->bind(':smcol', $smcol);  
    

    $database->execute();
  
?> 
  