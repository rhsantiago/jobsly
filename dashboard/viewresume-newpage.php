<?php
if (session_status() == PHP_SESSION_NONE) {
        session_start();
         if (!isset($database)){
           // include 'Database.php';
         }
    }
if(isset($_SESSION['user'])){
   $user = $_SESSION['user'];
   $password = $_SESSION['password'];
   $userid = $_SESSION['userid'];
   $usertype = $_SESSION['usertype'];
    
   include 'authenticate.php';
}

if($ok == 1 ){
    if(isset($_POST['jobid'])){ $jobid = $_POST['jobid']; } 
    if(isset($_POST['page'])){ $page = $_POST['page']; } 
    date_default_timezone_set('Asia/Manila');
    $logtimestamp = date("Y-m-d H:i:s");
    include "serverlogconfig.php";    
    include 'specialization.php';  
    $database = new Database();

    $months = array('Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec');
    $positionlevels = array('Executive','Manager','Assistant Manager','Supervisor','5 Years+ Experienced Employee','1-4 Years Experienced Employee','1 Year Experienced Employee/Fresh Grad');
?>
<!doctype html>
<html lang="en">
<head>
   <!-- Google Tag Manager -->
<script>
 window.dataLayer = window.dataLayer || [];       
    (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-MKMGLRW');
</script>
<!-- End Google Tag Manager -->    
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="img/favicon.ico">
	<link rel="icon" href="img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Resume | Job Applicants | jobsly</title>
 	<meta name="description" content="View resumes and invite potential hires to apply" />
 	<meta name="keywords" content="Jobs, Hiring, Career, Work, Resume, Call Center Jobs, Recruitment" />

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />

	<!--     Fonts and icons     -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <link href="https://fonts.googleapis.com/css?family=Oleo+Script" rel="stylesheet">

	<!-- CSS Files -->
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link href="css/material-kit.css" rel="stylesheet"/>
    <link href="css/custom.css" rel="stylesheet"/>
    <link href="css/media.css" rel="stylesheet"/>
    <link href="css/summernote.css" rel="stylesheet"/>
    
    <!--   Core JS Files   -->
	<script src="js/jquery.min.js" type="text/javascript"></script>
	<script src="js/bootstrap.min.js" type="text/javascript"></script>
	<script src="js/material.min.js"></script>

	<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
	<script src="js/nouislider.min.js" type="text/javascript"></script>
	<!-- Control Center for Material Kit: activating the ripples, parallax effects, scripts from the example pages etc -->
	<script src="js/material-kit.js" type="text/javascript"></script>
    <script src="js/employer-main.js" type="text/javascript"></script>
 
    <style>
            #resumeinfo ul, #resumeinfo li {
            margin: 0; padding: 0;
        }
    </style>
</head>

<body class="landing-page">
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MKMGLRW"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->    
   <nav class="navbar navbar-fixed-top ">
    	<div class="container">
        	<!-- Brand and toggle get grouped for better mobile display -->
                
        	<div class="navbar-header">                
        		<button type="button" class="navbar-toggle " data-toggle="collapse" data-target="#navigation-example">
            		<span class="sr-only">Toggle navigation</span>
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
        		</button>
               
        		<a class="navbar-brand logo" >jobsly</a>
        	</div>
        	
    	</div>
    </nav>



     <div class="header header-filter purple-header">
            <div class="container">
                <div class="row-fluid">
                    <!--
					<div class="col-md-11 margin-top-title col-md-offset-1">
                        <div class="row-fluid">                            
                            <div id="resumesb" class="">                                 
                            </div>
	                 </div>
                </div>
                    -->
            </div>
            </div>
        </div>
    
   
    <div id="main" class="wrapper ">
       

		<div class="main main-raised ">
         
			<div class="container-fluid"> <!-- with fluid for full width -->
                <div class="row-fluid">   <!-- with fluid for full width -->
                    
                    <div id="resume-main-body">                       
    <?php
if (session_status() == PHP_SESSION_NONE) {
        session_start();
        include 'Database.php';
}

$isshortlisted = 0;
if(isset($_SESSION['user'])){
   $user = $_SESSION['user'];
   $password = $_SESSION['password'];
   $userid = $_SESSION['userid'];
  
   if(isset($_POST['applicantid'])){ $applicantid = $_POST['applicantid']; }
   if(isset($_POST['mode'])){ $mode = $_POST['mode']; } 
   if(isset($_POST['jobid'])){ $jobid = $_POST['jobid']; }
   if(isset($_POST['view'])){ $view = $_POST['view']; }  
    date_default_timezone_set('Asia/Manila');
    $logtimestamp = date("Y-m-d H:i:s");
    include "serverlogconfig.php";
    $database = new Database();
    
    //$database->query('select position as maxposition,fname,lname,mname, photo from workexperience, personalinformation,useraccounts where personalinformation.userid=:userid and useraccounts.id=:userid and startdate = (select max(startdate) from workexperience where workexperience.userid=:userid)');
    $database->query('select fname,lname,mname, photo from personalinformation,useraccounts where personalinformation.userid=:userid and useraccounts.id=:userid');
    $database->bind(':userid', $applicantid);   
    try{
        $row = $database->single();
    }catch (PDOException $e) {
        $msg = $e->getTraceAsString()." ".$e->getMessage();
        $log->error($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
        die("");
    }     
  
    $photo = $row['photo'];
    $fname = $row['fname'];
    $lname = $row['lname'];
    $mname = $row['mname'];
    if(empty($photo)){
         $photo='img/unknown.png';
    }
    
    $database->query('select position as maxposition from workexperience where startdate = (select max(startdate) from workexperience where workexperience.userid=:userid)');
    $database->bind(':userid', $applicantid);   
    try{
        $row = $database->single();
    }catch (PDOException $e) {
        $msg = $e->getTraceAsString()." ".$e->getMessage();
        $log->error($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
        die("");
    }     
    $maxposition = $row['maxposition'];
        
    $months = array('Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec');
    $positionlevels = array('Executive','Manager','Assistant Manager','Supervisor','5 Years+ Experienced Employee','1-4 Years Experienced Employee','1 Year Experienced Employee/Fresh Grad');
     $database->query(' UPDATE jobapplications SET isnew = 0 where jobid= :jobid and userid = :userid');
     $database->bind(':jobid', $jobid);  
     $database->bind(':userid', $applicantid);
     try{
        $database->execute();
     }catch (PDOException $e) {
        $msg = $e->getTraceAsString()." ".$e->getMessage();
        $log->error($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
        die("");
     }
    
    $database->query('select count(jobapplications.userid) as appcount from jobapplications where jobapplications.jobid=:jobid and jobapplications.userid=:userid');
    $database->bind(':userid', $applicantid); 
    $database->bind(':jobid', $jobid);
    try{
        $checkappcountrow = $database->single();
    }catch (PDOException $e) {
        $msg = $e->getTraceAsString()." ".$e->getMessage();
        $log->error($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
        die("");
    }
    $appcount = $checkappcountrow['appcount'];
    
    $database->query('select count(jobinvitations.userid) as invitecount from jobinvitations where jobinvitations.jobid=:jobid and jobinvitations.userid=:userid');
    $database->bind(':userid', $applicantid); 
    $database->bind(':jobid', $jobid);
    try{
        $checkinvitecountrow = $database->single();
    }catch (PDOException $e) {
        $msg = $e->getTraceAsString()." ".$e->getMessage();
        $log->error($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
        die("");
    } 
    $invitecount = $checkinvitecountrow['invitecount'];
    
}else{
    header("Location: logout.php");
}
?>
<script>
jQuery(document).ready(function ($) {
   
            $('body').addClass('profile-page');
    
});
</script>   

<div class="col-md-9"> 
        <div class="profile-content">
	            <div class="container-fluid">
                        <div class="row-fluid">
                            
                                <div class="profile">                               
                                    <div class="avatar">
                                        <img src="<?=$photo?>" alt="Circle Image" class="img-circle img-responsive img-raised">
                                    </div>
                                    <div class="name">
                                        <h3 class="title">
                                        <?php
                                        if($appcount==0 && $invitecount>=0){
                                        ?>    
                                            *****&nbsp;*****
                                        <?php
                                        }else{
                                        ?>
                                            <?=$fname?>&nbsp;<?=$mname?>&nbsp;<?=$lname?>
                                        <?php    
                                        }
                                        ?>
                                        </h3>
                                        <h5><?=$maxposition?></h5>
                                        <br>
                                         <form method="post" action="printableresume.php" id="printable-form" name="printable-form" target="_blank">
                                            <input type="hidden" id="userid" name="userid" value="<?=$applicantid?>">
                                            <input type="hidden" id="employerid" name="employerid" value="<?=$userid?>">
                                        </form>     
                                        <a href='#printable' id='printable' name="printable">Printable Resume</a>
                                    </div>
                                  
              <?php
              $database->query('select * from personalinformation,additionalinformation where personalinformation.userid=:userid and additionalinformation.userid=:userid');
              $database->bind(':userid', $applicantid);   
                      try{                       
                          $row = $database->single();  
                      }catch (PDOException $e) {
                            $msg = $e->getTraceAsString()." ".$e->getMessage();
                            $log->error($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
                            die("");
                      }     
                      $mnumber = $row['mnumber'];
                      $myemail = $row['myemail'];
                      $landline = $row['landline'];                                
                      $street = $row['street'];
                      $city = $row['city'];
                      $province = $row['province'];                                
                      $nationality = $row['nationality'];
                      $gender = $row['gender'];
                      $age = $row['age'];
                      $birthday = $row['birthday'];                              
                      if(!empty($birthday)){                        
                        $bday = explode("-", $birthday);
                      }
                      $birthday = $bday[1] .'/'.$bday[2].'/'.$bday[0];
                      
                      $dposition = $row['dposition'];
                      $plevel = $row['plevel'];                      
                      $esalary = $row['esalary'];                      
                      $languages = $row['languages'];
                      $profsum = $row['profsum'];
                      $wtravel = $row['wtravel'];
                      $wrelocate = $row['wrelocate'];
                      $pholder = $row['pholder']; 
                      $specialization = $row['specialization'];
                      $otherspec = $row['otherspec'];
                                            
                     if(!empty($profsum) && strlen($profsum)>50){              
              ?>
                <section class="blog-post">
                                    <div class="panel panel-default">
                                    
                                      <div class="panel-body">                                        
                                     
                                        <div class="blog-post-content">
                                            
                         <div class="row-fluid">
                           <div class="col-md-12">
                               <div align="left">
                               <?=$profsum?>
                               </div>
                                
                                 </div>
                            </div>  
                                                
                          </div>
                                       </div>
                                    </div>
                                 
                </section>     
                <?php
                     }
                ?>
                <section class="blog-post">
                                    <div class="panel panel-default">
                                    
                                      <div class="panel-body">                                        
                                     
                                        <div class="blog-post-content">
                                            
                         <div class="row">
                          <!--   <div class="col-md-12">       -->                                             
                             <!--     <div align="left">    -->
                                    
                                    <div class="name center">
                                        <?php
                                        if($appcount==0 && $invitecount>=0){
                                      ?>
                                                                <div class="col-md-offset-1 col-md-5 resumetextalign">
                                                                    <ul align="left" style="list-style: none;" class="">
                                                                        <li> Mobile Number: <b>*****</b></li>
                                                                        <li> Email: <b>*****</b></li>
                                                                        <li> Landline: <b>*****</b></li>
                                                                        <li> Street Address: <b>*****</b></li>
                                                                        <li> City: <b>*****</b></li>
                                                                        <li> Nationality: <b>*****</b></li>
                                                                        <li> Age: <b>*****</b></li>
                                                                        <li> Birthdate: <b>*****</b></li>
                                                                    </ul>
                                                                </div>
                                     
                                     <?php
                                        }else if($appcount==1){
                                            
                                     ?>  
                                                                <div class="col-md-offset-1 col-md-5 resumetextalign">
                                                                    <ul align="left" style="list-style: none;" class="">
                                                                        <li> Mobile Number: <b><?=$mnumber?></b></li>
                                                                        <li> Email: <b><?=$myemail?></b></li>
                                                                        <li> Landline: <b><?=$landline?></b></li>
                                                                        <li> Street Address: <b><?=$street?></b></li>
                                                                        <li> City: <b><?=$city?>, <?=$province?></b></li>
                                                                        <li> Nationality: <b><?=$nationality?></b></li>
                                                                        <li> Age: <b><?=$age?></b></li>
                                                                        <li> Birthdate: <b><?=$months[$bday[1]-1]?> &nbsp;<?=$bday[2]?>,&nbsp;<?=$bday[0]?></b></li>
                                                                        <li> Gender: <b><?=$gender?></b></li>
                                                                    </ul>
                                                                </div>   
                                       <?php     
                                        }
                                        
                                     ?>
                                    
                                     
                                                                 <div class="col-md-offset-1 col-md-5 resumetextalign">
                                                                    <ul align="left" style="list-style: none;" class="">
                                                                        <li> Desired Position: <b><?=$dposition?></b></li>     
                                                                        <li> Position Level: <b><?=$positionlevels[$plevel-1]?></b></li>
                                                                        <li> Specialization: <b>
                                                                            <?php
                                                                                 if(!empty($specialization)){
                                                                                    echo $specarray[$specialization];
                                                                                 }
                                                                            ?>
                                                                            </b></li>
                                                                        <li> Other Specialization: <b><?=$otherspec?></b></li>
                                                                        <li> Expected Salary: <b><?=$esalary?></b></li> 
                                                                        <li> Languages: <b><?=$languages?></b></li> 
                                                                        <?php
                                                                            if($wtravel=='on'){
                                                                                echo '<li> Willing to Travel</li>';
                                                                            }
                                                                            if($wrelocate=='on'){
                                                                                echo '<li> Willing to Relocate</li>';
                                                                            }
                                                                            if($pholder=='on'){
                                                                                echo '<li> Valid Passport Holder</li';
                                                                            }
                                                                        ?>                                                                     
                                                                     </ul>
                                                                </div>
                                                        
                                                        
                                                            </div>
                                <!--      </div>  -->
                            <!--     </div> -->
                            </div>  
                                                
                          </div>
                                       </div>
                                    </div>
                                 
              </section>                    
                                </div>
                            
                             <link href="css/timeline.css" rel="stylesheet"/>

   
    <ul class="timeline">
        <?php
             $database->query('SELECT * FROM workexperience where userid = :userid order by startdate desc');
             $database->bind(':userid', $applicantid);  
             try{
                 $rows = $database->resultset();
             }catch (PDOException $e) {
                    $msg = $e->getTraceAsString()." ".$e->getMessage();
                    $log->error($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
                    die("");
             } 
             $isleft = true;
             $datefloat ='';
           
             foreach($rows as $row){
                $sdate = explode("-", $row['startdate']);
                $startdate = $sdate[1] .'/'.$sdate[2].'/'.$sdate[0];
                $cecb = $row['currentemployer'];
                if($cecb=='off'){
                    $edate = explode("-", $row['enddate']);
                    $enddate = $edate[1] .'/'.$edate[2].'/'.$edate[0];
                 }else{
                    $enddate='present';
                 }
                
                 if($isleft){
                    echo '<li>';
                    $isleft = false;
                    $datefloat ='editfloatright';
                 }else{                     
                     echo "<li class='timeline-inverted'>";
                     $isleft = true;
                     $datefloat ='editfloatleft';
                 }
        ?>
           
          <div class="timeline-badge infocolor"><i class="material-icons">work</i></div>
          <div class="timeline-panel timelinerounded">
            <div class="timeline-heading  timelinebodybottomborder">
                <ul class="list-inline <?php if($datefloat=='editfloatleft'){ echo ' tltextright';}?>">      
                    <li class=""><h4 class="timelinepos text-info resumecard margin10 "><?=$row['position']?></h4></li>
                   
                    <li class="<?=$datefloat?> margin10"><?=$months[$sdate[1]-1]?>&nbsp;<?=$sdate[0]?></li>
                 </ul>
                <div class="margin-10 text-muted">
              <ul class="list-inline tlcompanydiv <?php if($datefloat=='editfloatleft'){ echo ' tltextright';}?>">
                    <li><h7 class=""><i><?=$row['company']?></i></h7></li>
                    <li></li>
                    
                 </ul>
              </div>         
            </div>
            
            <div class="timeline-body collapse-group collapse jobdescdiv" id="viewdetails<?=$row['id']?>"> 
                
             <ul class="list-inline">
                 <li>
                     <h6 id="vertical-align" class="text-muted jobadheader">
                        <i class="material-icons text-info material-icons.md-24 jobadheadericon" >business</i><i id='industryli'> <?=$row['industry']?></i>
                     </h6>
                 </li>
                  <li>
                      <h6 id="vertical-align" class="text-muted jobadheader">
                         <i class="material-icons text-info jobadheadericon">date_range</i>
                          <?=$months[$sdate[1]-1]?>&nbsp;<?=$sdate[0]?> -
                          <?php
                              if($enddate != 'present'){
                                 echo $months[$edate[1]-1].'&nbsp;'.$edate[0];
                              }else{
                                  echo "present";
                              }
                           ?>
                      </h6>
                  </li>
                  
               </ul>
              <?=$row['jobdescription']?>
            </div>
             <p class="center"><a class="btn expandmore" data-toggle="collapse" data-target="#viewdetails<?=$row['id']?>"><i class="material-icons blackicon md-36">expand_more</i></a></p>
              
          </div>           
        </li>
         <li>&nbsp;</li>                   
        <?php
             }
            
             $database->query('SELECT * FROM educationandtraining where userid = :userid order by pgrad1graddate desc');
             $database->bind(':userid', $applicantid); 
             try{
                 $rows = $database->resultset();
             }catch (PDOException $e) {
                $msg = $e->getTraceAsString()." ".$e->getMessage();
                $log->error($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
                die("");
             }      
             $datefloat ='';                               
             foreach($rows as $row){
             $pgrad1uni = $row['pgrad1uni'];
             $pgrad1course = $row['pgrad1course'];
             if(!empty($pgrad1uni) || !empty($pgrad1course)){        
                $pgrad1date = explode("-", $row['pgrad1graddate']);
                $pgrad1graddate = $pgrad1date[1] .'/'.$pgrad1date[2].'/'.$pgrad1date[0];  
                
                 if($isleft){
                    echo '<li>';
                    $isleft = false;
                    $datefloat ='editfloatright';
                 }else{                     
                     echo "<li class='timeline-inverted'>";
                     $isleft = true;
                     $datefloat ='editfloatleft';
                 }
        ?>    
                <div class="timeline-badge success"><i class="material-icons">school</i></div>
          <div class="timeline-panel timelinerounded">
            <div class="timeline-heading timelinebodybottomborder">
                <ul class="list-inline <?php if($datefloat=='editfloatleft'){ echo ' tltextright';}?>">
                    <li><h4 class="timelinepos text-success resumecard margin10"><?=$row['pgrad1course']?></h4></li>
                    <li class="<?=$datefloat?> margin10"><?=$months[$pgrad1date[1]-1]?>&nbsp;<?=$pgrad1date[0]?></li>
                   
                 </ul> 
                <div class="margin-10 text-muted">
              <ul class="list-inline tlcompanydiv <?php if($datefloat=='editfloatleft'){ echo ' tltextright';}?>">
                    <li><h7><i><?=$row['pgrad1uni']?></i></h7></li>                  
                 </ul>
              </div>
            </div>
              
            <div class="timeline-body collapse-group collapse jobdescdiv" id="pgrad1viewdetails<?=$row['id']?>"> 
                 <ul class="list-inline">
                 <li>
                     <h6 id="vertical-align" class="text-muted jobadheader">
                        <i class="material-icons text-info md-8 jobadheadericon" >business</i><i id='industryli'> <?=$row['pgrad1add']?></i>
                     </h6>
                 </li>
                 <li>
                     <h6 id="vertical-align" class="text-muted jobadheader">
                        <i class="material-icons text-info md-8 jobadheadericon" >grade</i><i id='industryli'> <?=$row['pgrad1gpa']?></i>
                     </h6>
                 </li>
                  <li>
                      <h6 id="vertical-align" class="text-muted jobadheader">
                         <i class="material-icons text-info jobadheadericon">date_range</i> <?=$months[$pgrad1date[1]-1]?>&nbsp;<?=$pgrad1date[0]?>
                      </h6>
                  </li>
                
               </ul>
              <?=$row['pgrad1awards']?>
            </div>
               <p class="center"><a class="btn expandmore" data-toggle="collapse" data-target="#pgrad1viewdetails<?=$row['id']?>"><i class="material-icons blackicon md-36">expand_more</i></a></p>
          </div>           
        </li>       
        <li>&nbsp;</li>            
        <?php             
             }
             }
                                            
             $database->query('SELECT * FROM educationandtraining where userid = :userid order by colgraddate desc');
             $database->bind(':userid', $applicantid); 
             try{
                $rows = $database->resultset();
             }catch (PDOException $e) {
                $msg = $e->getTraceAsString()." ".$e->getMessage();
                $log->error($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
                die("");
            } 
                         
             $datefloat ='';                               
             foreach($rows as $row){
                $coldate = explode("-", $row['colgraddate']);
                $colgraddate = $coldate[1] .'/'.$coldate[2].'/'.$coldate[0]; 
                  $coluni = $row['coluni'];
                if(!empty($coluni) && $coldate[0] > 0){
                 if($isleft){
                    echo '<li>';
                    $isleft = false;
                    $datefloat ='editfloatright';
                 }else{                     
                     echo "<li class='timeline-inverted'>";
                     $isleft = true;
                     $datefloat ='editfloatleft';
                 }
                                            
        ?>
               <div class="timeline-badge success"><i class="material-icons">school</i></div>
          <div class="timeline-panel timelinerounded">
            <div class="timeline-heading timelinebodybottomborder">
                <ul class="list-inline <?php if($datefloat=='editfloatleft'){ echo ' tltextright';}?>">
                    <li><h4 class="timelinepos text-success resumecard margin10"><?=$row['colmajor']?></h4></li>
                    <li class="<?=$datefloat?> margin10"><?=$months[$coldate[1]-1]?>&nbsp;<?=$coldate[0]?></li>
                </ul>
                 <div class="margin-10 text-muted">
              <ul class="list-inline tlcompanydiv <?php if($datefloat=='editfloatleft'){ echo ' tltextright';}?>">
                    <li><h7><i><?=$row['coluni']?></i></h7> </li>             
                 </ul>
              </div>       
            </div>
              
            <div class="timeline-body collapse-group collapse jobdescdiv" id="colviewdetails<?=$row['id']?>"> 
                <ul class="list-inline">
                 <li>
                     <h6 id="vertical-align" class="text-muted jobadheader">
                        <i class="material-icons text-info md-8 jobadheadericon" >business</i><i id='industryli'> <?=$row['coladd']?></i>
                     </h6>
                 </li>
                 <li>
                     <h6 id="vertical-align" class="text-muted jobadheader">
                        <i class="material-icons text-info md-8 jobadheadericon" >grade</i><i id='industryli'> <?=$row['colgpa']?></i>
                     </h6>
                 </li>
                  <li>
                      <h6 id="vertical-align" class="text-muted jobadheader">
                         <i class="material-icons text-info jobadheadericon">date_range</i> <?=$months[$coldate[1]-1]?>&nbsp;<?=$coldate[0]?>
                      </h6>
                  </li>
                
               </ul>
              <?=$row['colawards']?>
            </div>
              <p class="center"><a class="btn expandmore" data-toggle="collapse" data-target="#colviewdetails<?=$row['id']?>"><i class="material-icons blackicon md-36">expand_more</i></a></p>              
          </div>           
        </li>   
        <li>&nbsp;</li>    
        <?php
             }
             }
             $database->query('SELECT * FROM educationandtraining where userid = :userid order by hsgraddate desc');
             $database->bind(':userid', $applicantid); 
             try{
                 $rows = $database->resultset();
             }catch (PDOException $e) {
                $msg = $e->getTraceAsString()." ".$e->getMessage();
                $log->error($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
                die("");
             }             
             $datefloat ='';                               
             foreach($rows as $row){
                 $hsdate = explode("-", $row['hsgraddate']);
                $hsgraddate = $hsdate[1] .'/'.$hsdate[2].'/'.$hsdate[0];    
                $hsscchool = $row['hsschool'];                   
                if(!empty($hsscchool) && $hsdate[0] > 0){   
                
                 if($isleft){
                    echo '<li>';
                    $isleft = false;
                    $datefloat ='editfloatright';
                 }else{                     
                     echo "<li class='timeline-inverted'>";
                     $isleft = true;
                     $datefloat ='editfloatleft';
                 }                       
        ?>
                            
             <div class="timeline-badge success"><i class="material-icons">school</i></div>
          <div class="timeline-panel timelinerounded">
            <div class="timeline-heading timelinebodybottomborder">
                <ul class="list-inline <?php if($datefloat=='editfloatleft'){ echo ' tltextright';}?>">
                    <li><h4 class="timelinepos text-success resumecard margin10">High School</h4></li>
                    <li class="<?=$datefloat?> margin10"><?=$months[$hsdate[1]-1]?>&nbsp;<?=$hsdate[0]?></li>
                    <li></li>
                 </ul> 
                <div class="margin-10 text-muted">
                  <ul class="list-inline tlcompanydiv <?php if($datefloat=='editfloatleft'){ echo ' tltextright';}?>">
                        <li><h7><i><?=$row['hsschool']?></i></h7> </li>             
                     </ul>
                  </div>
            </div>
               
            <div class="timeline-body collapse-group collapse jobdescdiv" id="hsviewdetails<?=$row['id']?>"> 
               <ul class="list-inline">
                 <li>
                     <h6 id="vertical-align" class="text-muted jobadheader">
                        <i class="material-icons text-info md-8 jobadheadericon" >business</i><i id='industryli'> <?=$row['hsadd']?></i>
                     </h6>
                 </li>
                  <li>
                      <h6 id="vertical-align" class="text-muted jobadheader">
                         <i class="material-icons text-info jobadheadericon">date_range</i> <?=$months[$hsdate[1]-1]?>&nbsp;<?=$hsdate[0]?>
                      </h6>
                  </li>
                
               </ul>   
              <?=$row['hsawards']?>
            </div>
               <p class="center"><a class="btn expandmore" data-toggle="collapse" data-target="#hsviewdetails<?=$row['id']?>"><i class="material-icons blackicon md-36">expand_more</i></a></p>
           </div>           
        </li>                  
        <li>&nbsp;</li>          
        <?php
             }
             }
        ?>                                    
    
            
    </ul>
                        <?php
                             $database->query('SELECT othersawards FROM educationandtraining where userid = :userid');
                             $database->bind(':userid', $userid);  
                             try{ 
                                 $row = $database->single();
                             }catch (PDOException $e) {
                                $msg = $e->getTraceAsString()." ".$e->getMessage();
                                $log->error($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
                                die("");
                             } 
                             $othersawards= $row['othersawards'];
                             if(!empty($othersawards)){    
                        ?>
                        <section class="blog-post">
                                    <div class="panel panel-default">
                                    
                                      <div class="panel-body">                                        
                                     
                                        <div class="blog-post-content">
                                            
                         <div class="row-fluid">
                           <div class="col-md-12">
                               <div align="left">
                                   <h4 class="text-warning">Professional Trainings</h4>
                               <?=$othersawards?>
                               </div>
                                
                                 </div>
                            </div>  
                                                
                          </div>
                                       </div>
                                    </div>
                                 
                            </section>  
                           <?php
                             }
                            ?>
                            
                            
                            
	                    </div>
                
               </div>
        </div>
        </div> 
         <div class="col-md-3 ">
                   <!--
                          <div class="card card-ads adsright">                                            
                               <div class="content">
                                 <div class="row">
                                     <div class="col-md-12">
                                          
                                     </div>
                                   </div>
                                </div>
                          </div>
                    -->
		       </div>               
 </div>





                      
                </div> <!--resume main body-->        
                
	        </div>

		</div>
</div>
      
	    <footer class="footer">
	        <div class="container">
                <div class="col-md-6">
                    <nav class="pull-left">
                        <ul>
                            <li>
                                jobsly on 	                           

                            </li>
                            <li>
                                <a target="_blank" href='https://www.facebook.com/jobsly.net'><i class="fa fa-facebook-square fa-2x" aria-hidden="true"></i> </a>
                            </li>	                   
                        </ul>
                    </nav>
                </div>
                <div class="col-md-6">
                    <div class="copyright pull-right">
                        &copy; jobsly 2016
                    </div>
                </div>
	        </div>
        </footer>
	</div>
    
</body>

	

</html>
<?php
} else{
    include 'logout.php';
    
}
?>


