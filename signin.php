<?php

if(isset($_POST['email'])){ $email = $_POST['email']; } 
if(isset($_POST['password'])){ $password = $_POST['password']; }


include 'Database.php';
$database = new Database();

$database->query('SELECT email,isverified from useraccounts where email = :email and password = :password');
$database->bind(':email', $email);
$database->bind(':password', $password);
$row = $database->single();
$success = $row['email'];
$isverified = $row['isverified'];

if(is_null($success)){
    echo 'notfound';
}
if($success == $email && $isverified == 0){
    echo 'unverified';
}
if($success == $email && $isverified == 1){
    echo 'success';
}
?>