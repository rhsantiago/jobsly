<?php
if(isset($_POST['id'])){ $id = $_POST['id']; }
if(isset($_POST['mode'])){ $mode = $_POST['mode']; }
if(isset($_POST['userid'])){ $userid = $_POST['userid']; }
if(isset($_POST['jobtitle'])){ $jobtitle = $_POST['jobtitle']; }
if(isset($_POST['specialization'])){ $specialization = $_POST['specialization']; }
if(isset($_POST['plevel'])){ $plevel = $_POST['plevel']; }
if(isset($_POST['jobtype'])){ $jobtype = $_POST['jobtype']; }
if(isset($_POST['msalary'])){ $msalary = $_POST['msalary']; }
if(isset($_POST['startappdate'])){ $startappdate = $_POST['startappdate']; }
$sdate = explode("/", $startappdate);
$startappdate = $sdate[2] .'-'.$sdate[0].'-'.$sdate[1];
if(isset($_POST['endappdate'])){ $endappdate = $_POST['endappdate']; }
$edate = explode("/", $endappdate);
$endappdate = $edate[2] .'-'.$edate[0].'-'.$edate[1];
if(isset($_POST['nvacancies'])){ $nvacancies = $_POST['nvacancies']; }
if(isset($_POST['jobdesc'])){ $jobdesc = $_POST['jobdesc']; }
if(isset($_POST['city'])){ $city = $_POST['city']; }
if(isset($_POST['province'])){ $province = $_POST['province']; }
if(isset($_POST['country'])){ $country = $_POST['country']; }
if(isset($_POST['yrsexp'])){ $yrsexp = $_POST['yrsexp']; }
if(isset($_POST['mineduc'])){ $mineduc = $_POST['mineduc']; }
if(isset($_POST['prefcourse'])){ $prefcourse = $_POST['prefcourse']; }
if(isset($_POST['languages'])){ $languages = $_POST['languages']; }
if(isset($_POST['licenses'])){ $licenses = $_POST['licenses']; }
if(isset($_POST['wtravel'])){ $wtravel = $_POST['wtravel']; }
if(isset($_POST['wrelocate'])){ $wrelocate = $_POST['wrelocate']; }

date_default_timezone_set('Asia/Manila');
$dateadded = date("Y-m-d");

include 'Database.php';
$database = new Database();
    
    if($mode=='insert'){
         $database->query(' INSERT INTO jobads (id, userid, jobtitle,specialization,plevel,jobtype,msalary,startappdate,endappdate,nvacancies,jobdesc,city,province,country,yrsexp,mineduc,prefcourse,languages,licenses,wtravel,wrelocate,dateadded) VALUES (NULL, :userid, :jobtitle, :specialization,:plevel,:jobtype,:msalary,:startappdate,:endappdate,:nvacancies,:jobdesc,:city,:province,:country,:yrsexp,:mineduc,:prefcourse,:languages,:licenses,:wtravel,:wrelocate,:dateadded)');
         
    }

    if($mode=='update'){
       $database->query(' UPDATE personalinformation SET userid = :userid, lname = :lname, fname = :fname, mname = :mname, street = :street, city = :city, province = :province, country = :country, mnumber = :mnumber, myemail = :myemail, landline = :landline, age = :age, birthday = :birthday, gender = :gender, nationality = :nationality WHERE personalinformation.id = :pid or userid = :userid'); 
        $database->bind(':pid', $id);
        
    }

   
    
    $database->bind(':userid', $userid);
    $database->bind(':jobtitle', $jobtitle);
    $database->bind(':specialization', $specialization);  
    $database->bind(':plevel', $plevel);
    $database->bind(':jobtype', $jobtype); 
    $database->bind(':msalary', $msalary); 
    $database->bind(':startappdate', $startappdate); 
    $database->bind(':endappdate', $endappdate); 
    $database->bind(':nvacancies', $nvacancies);
    $database->bind(':jobdesc', $jobdesc);
    $database->bind(':city', $city);
    $database->bind(':province', $province);
    $database->bind(':country', $country);
    $database->bind(':yrsexp', $yrsexp);
    $database->bind(':mineduc', $mineduc);
    $database->bind(':prefcourse', $prefcourse);
    $database->bind(':languages', $languages);
    $database->bind(':licenses', $licenses);
    $database->bind(':wtravel', $wtravel);
    $database->bind(':wrelocate', $wrelocate);
    $database->bind(':dateadded', $dateadded);

    $database->execute();
    
    if($mode=='insert'){
        $database->query('SELECT id from jobads where userid = :userid and jobtitle = :jobtitle order by id desc');
        $database->bind(':userid', $userid);
        $database->bind(':jobtitle', $jobtitle);    
        $row = $database->single();
        $jobid = $row['id'];
    
    }

    include 'jobskills-form.php';
?> 
  