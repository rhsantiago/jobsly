<?php
if(isset($_POST['jobid'])){ $jobid = $_POST['jobid']; }
if(isset($_POST['templateid'])){ $templateid = $_POST['templateid']; }
if(isset($_POST['mode'])){ $mode = $_POST['mode']; }
if(isset($_POST['userid'])){ $userid = $_POST['userid']; }
if(isset($_POST['jobtitle'])){ $jobtitle = $_POST['jobtitle']; }
if(isset($_POST['company'])){ $company = $_POST['company']; }
if(isset($_POST['specialization'])){ $specialization = $_POST['specialization']; }
if(isset($_POST['plevel'])){ $plevel = $_POST['plevel']; }
if(isset($_POST['jobtype'])){ $jobtype = $_POST['jobtype']; }
if(isset($_POST['msalary'])){ $msalary = $_POST['msalary']; }
if(isset($_POST['maxsalary'])){ $maxsalary = $_POST['maxsalary']; }
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
if(isset($_POST['essay'])){ $essay = $_POST['essay']; }

date_default_timezone_set('Asia/Manila');
$dateadded = date("Y-m-d");

include 'Database.php';
$database = new Database();
        
        if($mode=='insert'){
             $database->query(' INSERT INTO jobads (id, userid, jobtitle,company,specialization,plevel,jobtype,msalary,maxsalary,startappdate,endappdate,nvacancies,jobdesc,city,province,country,yrsexp,mineduc,prefcourse,languages,licenses,wtravel,wrelocate,essay,dateadded) VALUES (NULL, :userid, :jobtitle,:company, :specialization,:plevel,:jobtype,:msalary,:maxsalary,:startappdate,:endappdate,:nvacancies,:jobdesc,:city,:province,:country,:yrsexp,:mineduc,:prefcourse,:languages,:licenses,:wtravel,:wrelocate,:essay,:dateadded)');

        }

        if($mode=='update'){
           $database->query(' UPDATE jobads SET userid = :userid, jobtitle = :jobtitle, company = :company, specialization = :specialization, plevel = :plevel, jobtype = :jobtype, msalary = :msalary, maxsalary = :maxsalary, startappdate = :startappdate, endappdate = :endappdate, nvacancies = :nvacancies, jobdesc = :jobdesc, city = :city, province = :province, country = :country, yrsexp = :yrsexp, mineduc = :mineduc, prefcourse = :prefcourse, languages = :languages, licenses = :licenses, wtravel = :wtravel, wrelocate = :wrelocate,essay=:essay, dateadded = :dateadded WHERE jobads.id = :jobid and userid = :userid'); 
            $database->bind(':jobid', $jobid);

        }
        $database->bind(':userid', $userid);
        $database->bind(':jobtitle', $jobtitle);
        $database->bind(':company', $company);
        $database->bind(':specialization', $specialization);  
        $database->bind(':plevel', $plevel);
        $database->bind(':jobtype', $jobtype); 
        $database->bind(':msalary', $msalary); 
        $database->bind(':maxsalary', $maxsalary); 
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
        $database->bind(':essay', $essay);
        $database->bind(':dateadded', $dateadded);

        $database->execute();

        if($mode=='insert'){
            $database->query('SELECT id from jobads where userid = :userid and jobtitle = :jobtitle order by id desc');
            $database->bind(':userid', $userid);
            $database->bind(':jobtitle', $jobtitle);    
            $row = $database->single();
            $jobid = $row['id'];

            if($templateid > 0){
                $database->query('SELECT * FROM jobskillstemplate where templateid = :templateid');                                                   
                $database->bind(':templateid', $templateid);
                $rows = $database->resultset();
                date_default_timezone_set('Asia/Manila');
                $jobskilltagdate = date("Y-m-d");

                foreach($rows as $row){
                    $jobskill = $row['jobskill'];
                    $jobskilltag = $row['jobskilltag'];

                    $database->query(' INSERT INTO jobskills (id, userid,jobid, jobskill,jobskilltag,jobskilltagdate) VALUES (NULL, :userid,:jobid,:jobskill,:jobskilltag,:jobskilltagdate)');

                    $database->bind(':userid', $userid);
                    $database->bind(':jobid', $jobid); 
                    $database->bind(':jobskill', $jobskill);  
                    $database->bind(':jobskilltag', $jobskilltag);
                    $database->bind(':jobskilltagdate', $jobskilltagdate);
                    $database->execute();
                }
            }

        }
        include 'jobskills-form.php';
    

    
?> 
  