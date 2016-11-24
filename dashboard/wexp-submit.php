<?php

if(isset($_POST['userid'])){ $userid = $_POST['userid']; }
if(isset($_POST['company'])){ $company = $_POST['company']; }
if(isset($_POST['position'])){ $position = $_POST['position']; }
if(isset($_POST['startdate'])){ $startdate = $_POST['startdate']; }
$sdate = explode("/", $startdate);
$startdate = $sdate[2] .'-'.$sdate[0].'-'.$sdate[1];
if(isset($_POST['msalary'])){ $msalary = $_POST['msalary']; }
if(isset($_POST['industry'])){ $industry = $_POST['industry']; }
if(isset($_POST['plevel'])){ $plevel = $_POST['plevel']; }
if(isset($_POST['enddate'])){ $enddate = $_POST['enddate']; }
$edate = explode("/", $enddate);
$enddate = $edate[2] .'-'.$edate[0].'-'.$edate[1];
if(isset($_POST['currentempcb'])){ $currentempcb = $_POST['currentempcb']; }



include 'Database.php';
$database = new Database();

    $database->query(' INSERT INTO workexperience (id, userid, company,position,startdate,msalary,industry,plevel,enddate,currentemployer) VALUES (NULL, :userid, :company, :position,:startdate,:msalary,:industry,:plevel,:enddate,:currentempcb)');
    $database->bind(':userid', $userid);
    $database->bind(':company', $company);
    $database->bind(':position', $position);  
    $database->bind(':startdate', $startdate);
    $database->bind(':msalary', $msalary); 
    $database->bind(':industry', $industry); 
    $database->bind(':plevel', $plevel); 
    $database->bind(':enddate', $enddate); 
    $database->bind(':currentempcb', $currentempcb);
       
    $database->execute();

echo $startdate;
?> 
  