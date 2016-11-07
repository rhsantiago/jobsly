<?php
if(isset($_POST['email'])){ 
    $email = $_POST['email']; 
}

if(isset($_POST['password'])){ $password = $_POST['password']; } 
if(isset($_POST['usertype'])){ $usertype = $_POST['usertype']; } 

include 'Database.php';
$database = new Database();

$database->query('SELECT email from useraccounts where email = :email');
$database->bind(':email', $email);
$row = $database->single();
$verify = $row['email'];

?>

 <div id="msgSubmit" class="h3 text-center">Thank you for registering! Please check your <?=$verify ?> inbox for the verification link
     in order to activate your account. </div>   