<?php

if(isset($_POST['email'])){ $email = $_POST['email']; } 
if(isset($_POST['password'])){ $password = $_POST['password']; }


include 'Database.php';
$database = new Database();

$database->query('SELECT id,email,isverified,password from useraccounts where email = :email and password = :password');
$database->bind(':email', $email);
$database->bind(':password', $password);
$row = $database->single();
$id = $row['id'];
$success = $row['email'];
$isverified = $row['isverified'];
$password = $row['password'];

if(is_null($success)){
    echo 'notfound';
}
if($success == $email && $isverified == 0){
    echo 'unverified';
}
if($success == $email && $isverified == 1){
    session_start();
    if(!isset($_SESSION['user']))
        $_SESSION['user'] = $success;
    if(!isset($_SESSION['password']))
        $_SESSION['password'] = $password;
    if(!isset($_SESSION['userid']))
        $_SESSION['userid'] = $id;
    echo 'success';   
}
?>