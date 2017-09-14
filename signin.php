<?php

if(isset($_POST['email'])){ $email = $_POST['email']; } 
if(isset($_POST['password'])){ $password = $_POST['password']; }


include 'Database.php';
$database = new Database();

$database->query('SELECT id,email,isverified,usertype,password from useraccounts where email = :email and password = :password');
$database->bind(':email', $email);
$database->bind(':password', hash("sha256", $password));
$row = $database->single();
$id = $row['id'];
$success = $row['email'];
$isverified = $row['isverified'];
$password = $row['password'];

$usertype = $row['usertype'];

if(is_null($success)){
    echo 'notfound';
}
$complete = 0;
if($usertype==1){
    $database->query('SELECT companyname,companyaddress,telno,companytin,cperson,designation,cpersontelno from companyinfo where userid = :userid');
    $database->bind(':userid', $id);
    $row = $database->single();
    $complete = 0;
    $companyname = $row['companyname'];
    $companyaddress = $row['companyaddress'];
    $telno = $row['telno'];
    $companytin = $row['companytin'];
    $cperson = $row['cperson'];
    $designation = $row['designation'];
    $cpersontelno = $row['cpersontelno'];
    if(!empty($companyname) && !empty($companyaddress) && !empty($telno) && !empty($companytin) && !empty($cperson) && !empty($designation) && !empty($cpersontelno)){
        $complete = 1;
    }
}

if(strtolower($success) == strtolower($email)  && $usertype == 1 && ($isverified == 0 || $complete == 0)){
   /* $database->query('SELECT companyname,companyaddress from companyinfo where userid=:userid');
    $database->bind(':userid', $id);
    $row = $database->single();
    $companyname = $row['companyname'];
    $companyaddress = $row['companyaddress'];
    if((empty($companyname) || empty($companyaddress)) && $isverified == 0 && $usertype == 1){  */
        session_start();
        if(!isset($_SESSION['user']))
            $_SESSION['user'] = $success;
        if(!isset($_SESSION['password']))
            $_SESSION['password'] = $password;
        if(!isset($_SESSION['userid']))
            $_SESSION['userid'] = $id;
         if(!isset($_SESSION['usertype']))
            $_SESSION['usertype'] = $usertype;
        echo 'unverifiedemployer';
  //  }
}

if(strtolower($success) == strtolower($email) && $isverified == 1 && $usertype == 1 && $complete == 1){
     session_start();
        if(!isset($_SESSION['user']))
            $_SESSION['user'] = $success;
        if(!isset($_SESSION['password']))
            $_SESSION['password'] = $password;
        if(!isset($_SESSION['userid']))
            $_SESSION['userid'] = $id;
         if(!isset($_SESSION['usertype']))
            $_SESSION['usertype'] = $usertype;
    /*
        include('dashboard/log4php/Logger.php');
        Logger::configure('../jobsly/dashboard/log4php/config.xml');
        $log = Logger::getLogger('myLogger');
        $log->info($_SESSION['user'] . " logged in"); 
    */
        echo 'successemployer';
    
        
}

if(strtolower($success) == strtolower($email) && $isverified == 1 && $usertype == 2){
    session_start();
    if(!isset($_SESSION['user']))
        $_SESSION['user'] = $success;
    if(!isset($_SESSION['password']))
        $_SESSION['password'] = $password;
    if(!isset($_SESSION['userid']))
        $_SESSION['userid'] = $id;
     if(!isset($_SESSION['usertype']))
        $_SESSION['usertype'] = $usertype;
    echo 'success';   
}

if(strtolower($success) == strtolower($email) && $isverified == 0 && $usertype == 2){
    session_start();
    if(!isset($_SESSION['user']))
        $_SESSION['user'] = $success;
    if(!isset($_SESSION['password']))
        $_SESSION['password'] = $password;
    if(!isset($_SESSION['userid']))
        $_SESSION['userid'] = $id;
     if(!isset($_SESSION['usertype']))
        $_SESSION['usertype'] = $usertype;
    echo 'unverified';   
}
?>