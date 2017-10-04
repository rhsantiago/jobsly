<?php
if (session_status() == PHP_SESSION_NONE) {
        session_start();   
}
if(isset($_SESSION['user'])){
$cinfo = '';
$target_dir = "logo/";
//$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$myfile = pathinfo($_FILES["fileToUpload"]["name"]);
$target_file = $target_dir.date("YmdHms").'.'.$myfile['extension'];
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
    echo "Sorry, only JPG, JPEG, PNG files are allowed.";
    echo $target_file;
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {

    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        date_default_timezone_set('Asia/Manila');
        $logtimestamp = date("Y-m-d H:i:s");
        include "serverlogconfig.php";
        include 'Database.php';
        $database = new Database();
        if(isset($_POST['userid'])){ $userid = $_POST['userid']; }
        if(isset($_POST['cinfo'])){ $cinfo = $_POST['cinfo']; }
               // echo "The file ". basename( $_FILES["fileToUpload"][date("YmdHms")]). " has been uploaded.";
            $database->query(' update companyinfo set logo=:logo where userid=:userid');
          
            $database->bind(':logo', $target_file); 
            $database->bind(':userid', $userid);
            try{
                $database->execute();
                $msg = "upload logo ";
                $log->info($logtimestamp." - ".$_SESSION['user'] . " " .$msg);
            }catch (PDOException $e) {
                $msg = $e->getTraceAsString()." ".$e->getMessage();
                $log->error($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
                die("");
            } 
        if($cinfo != 'cinfo'){
            header('Location: employer-registrationfull.php');
        }else{
             header('Location: employer-home.php#cinfo');
        }
        
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
}else{
    header("Location: logout.php");
}
?>