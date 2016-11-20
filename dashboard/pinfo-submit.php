<?php

if(isset($_POST['fname'])){ $fname = $_POST['fname']; } 
if(isset($_POST['lname'])){ $lname = $_POST['lname']; }
if(isset($_POST['userid'])){ $userid = $_POST['userid']; }
if(isset($_POST['mname'])){ $mname = $_POST['mname']; }
if(isset($_POST['street'])){ $street = $_POST['street']; }
if(isset($_POST['city'])){ $city = $_POST['city']; }
if(isset($_POST['province'])){ $province = $_POST['province']; }
if(isset($_POST['country'])){ $country = $_POST['country']; }
if(isset($_POST['mnumber'])){ $mnumber = $_POST['mnumber']; }
if(isset($_POST['myemail'])){ $myemail = $_POST['myemail']; }
if(isset($_POST['landline'])){ $landline = $_POST['landline']; }
if(isset($_POST['age'])){ $age = $_POST['age']; }
if(isset($_POST['birthday'])){ $birthday = $_POST['birthday']; }
$bday = explode("/", $birthday);
$birthday = $bday[2] .'-'.$bday[0].'-'.$bday[1];
if(isset($_POST['gender'])){ $gender = $_POST['gender']; }
if(isset($_POST['nationality'])){ $nationality = $_POST['nationality']; }


include 'Database.php';
$database = new Database();

    $database->query(' INSERT INTO personalinformation (id, userid, lname,fname,mname,street,city,province,country,mnumber,myemail,landline,age,birthday,gender,nationality) VALUES (NULL, :userid, :lname, :fname,:mname,:street,:city,:province,:country,:mnumber,:myemail,:landline,:age,:birthday,:gender,:nationality)');
    $database->bind(':userid', $userid);
    $database->bind(':fname', $fname);
    $database->bind(':lname', $lname);  
    $database->bind(':mname', $mname);
    $database->bind(':street', $street); 
    $database->bind(':city', $city); 
    $database->bind(':province', $province); 
    $database->bind(':country', $country); 
    $database->bind(':mnumber', $mnumber);
    $database->bind(':myemail', $myemail);
    $database->bind(':landline', $landline);
$database->bind(':age', $age);
$database->bind(':birthday', $birthday);
$database->bind(':gender', $gender);
$database->bind(':nationality', $nationality);
    $database->execute();

echo $birthday;
?> 
  