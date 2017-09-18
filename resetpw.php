<?php
if(isset($_POST['email'])){ $email = $_POST['email']; }
if(isset($_POST['password'])){ $password = $_POST['password']; }
if(isset($_POST['password2'])){ $password2 = $_POST['password2']; }
if(isset($_POST['verifyhash'])){ $verify = $_POST['verifyhash']; }


if(!empty($email) && !empty($verify)){
include 'Database.php';
include "dashboard/serverlogconfig.php";    
$database = new Database();

$database->query('SELECT id, email, verifyhash from useraccounts where email = :email and verifyhash = :verify');
$database->bind(':email', $email);
$database->bind(':verify', $verify);
try{    
    $row = $database->single();
}catch (PDOException $e) {
        $msg = $e->getTraceAsString()." ".$e->getMessage();
        $log->error($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
        die("");
    }    
$id = $row['id'];
$emailok = $row['email'];
$verifyhashok = $row['verifyhash'];    

    if(!empty($emailok) && !empty($verifyhashok)){
        $newverifyhash = hash("sha256",$password.date("YmdHis"));
        $newpassword = hash("sha256", $password);    

        $database->query(' UPDATE useraccounts set password=:password, verifyhash=:verifyhash where id=:id');
        $database->bind(':id', $id);
        $database->bind(':password',  $newpassword); 
        $database->bind(':verifyhash', $newverifyhash);
        try{
            $database->execute();
        }catch (PDOException $e) {
            $msg = $e->getTraceAsString()." ".$e->getMessage();
            $log->error($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
            die("");
        }    
        echo "pwsuccess";
    }else{
        echo "pwfail";

    }



}else{
    echo "notfound";
    
}







?>