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
  
    include 'specialization.php';  
 
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="img/favicon.ico">
	<link rel="icon" href="img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>jobsly - find your next adventure</title>

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

</head>

<body class="landing-page">
     <div class="modal fullscreen-modal fade" id="invite-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog modal-lg" role="document">
	    <div class="modal-content modalcontent">
	      
	    </div>
	  </div>
	</div>
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

$isshortlisted = 0;
 //   if(isset($_GET['applicantid'])){ $applicantid = $_GET['applicantid']; }
 //   if(isset($_GET['userid'])){ $useridget = $_GET['userid']; }
    if(isset($_POST['applicantid'])){ $applicantid = $_POST['applicantid']; }
    if(isset($_POST['userid'])){ $useridget = $_POST['userid']; }
    date_default_timezone_set('Asia/Manila');
    $logtimestamp = date("Y-m-d H:i:s");
    include "serverlogconfig.php";
    if($useridget != $userid){
          $log->error("userid ".$userid." wrong link on viewinviteresume");
         include 'logout.php';
    }
    
    $database = new Database();
            
    $database->query('select position as maxposition,fname,lname,mname, photo from workexperience, personalinformation,useraccounts where personalinformation.userid=:userid and useraccounts.id=:userid and startdate = (select max(startdate) from workexperience where workexperience.userid=:userid)');
    $database->bind(':userid', $applicantid);   
    try{
        $row = $database->single();
    }catch (PDOException $e) {
        $msg = $e->getTraceAsString()." ".$e->getMessage();
        $log->error($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
        die("");
    }     
    $maxposition = $row['maxposition'];
    $photo = $row['photo'];
    $fname = $row['fname'];
    $lname = $row['lname'];
    $mname = $row['mname'];
    if(empty($photo)){
         $photo='img/unknown.png';
    }
        
    $months = array('Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec');
    $positionlevels = array('Executive','Manager','Assistant Manager','Supervisor','5 Years+ Experienced Employee','1-4 Years Experienced Employee','1 Year Experienced Employee/Fresh Grad');
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
                                        <h3 class="title">*****&nbsp;*****</h3>
                                        <h5><?=$maxposition?></h5>
                                    </div>
                                    <div class="jumbotron">
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
                      $wtravel = $row['wtravel'];
                      $wrelocate = $row['wrelocate'];
                      $pholder = $row['pholder'];                        
                      $specialization = $row['specialization'];
                      $otherspec = $row['otherspec'];
                                            
              ?>
                                        
                                 <div class="row">        
                          
                                                                <div class="col-md-offset-1 col-md-5 resumetextalign">
                                                                    <ul style="list-style: none;" class="">
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
                                     
                                                                 <div class="col-md-offset-1 col-md-5 resumetextalign">
                                                                    <ul style="list-style: none;" class="">
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
                                    </div>
                               
                                    
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
	                </div>
                    
                   
                       <div class="alljobsdiv">
                          
                               
                           
                            <div class="card card-nav-tabs cardtopmargin">
                                            <div id="tabtitle" class="header  header-info">
                                                <!-- colors: "header-primary", "header-info", "header-success", "header-warning", "header-danger" -->
                                                <div class="nav-tabs-navigation">
                                                    <div class="nav-tabs-wrapper">
                                                        <ul class="nav nav-tabs" data-tabs="tabs">
                                                            <li class="active">
                                                                <a href="#profile" data-toggle="tab">
                                                                    <i class="material-icons">mail</i>
                                                                   Send Application Invite
                                                                </a>
                                                            </li>										
                                                        </ul>
                                                    </div>
                                                </div>
                                          </div>
                                             <div class="content">
                                                    <div class="tab-content">
                                                        <div class="tab-pane active" id="profile">
                                                        <div class="table-responsive">      
                                     <table id="matchedtable" class="table table-hover table-condensed">
                                            <thead>
                                                <tr>
                                                    <th class="col-md-2">Position</th>
                                                    <th class="col-md-2 text-right">Company</th>
                                                    <th class="col-md-2 text-right">Max Salary</th>
                                                    <th class="col-md-2 text-right">Date Added</th>
                                                    <th class="text-right">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody id="activejobadstablebody">
                              
                                        <?php
                                            if(!empty($search)){
                                                $search='%'.$search.'%';
                                                $database->query('SELECT distinct jobads.id,jobads.userid,jobads.jobtitle,jobads.company, jobads.maxsalary, jobads.dateadded, companyinfo.companyname from jobads,companyinfo where jobads.jobtitle like :search and jobads.userid=companyinfo.userid and jobads.isactive=1 order by jobads.dateadded desc limit 0,10');
                                                $database->bind(':search', $search);
                                            }else{
                                                $database->query('SELECT distinct jobads.id,jobads.userid,jobads.jobtitle,jobads.company, jobads.maxsalary, jobads.dateadded,jobads.isactive, companyinfo.companyname from jobads,companyinfo where  jobads.userid=:userid and jobads.userid=companyinfo.userid and jobads.isactive=1 order by jobads.dateadded desc');
                                                 $database->bind(':userid', $userid);
                                            }
                                            try{
                                                $rows = $database->resultset();
                                            }catch (PDOException $e) {
                                                $msg = $e->getTraceAsString()." ".$e->getMessage();
                                                $log->error($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
                                                die("");
                                            }
                                            $userid='';
                                            foreach($rows as $row){
                                                $id = $row['id'];
                                                //$userid = $row['userid'];
                                                $jobtitle = $row['jobtitle'];
                                                $company= $row['company'];
                                                $maxsalary= $row['maxsalary'];
                                                $dateadded= $row['dateadded'];
                                                $dadd = explode("-", $dateadded);
                                                $dateadded = $dadd[1] .'/'.$dadd[2].'/'.$dadd[0];
                                                
                                                $database->query('Select count(id) as invitecheck from jobinvitations where jobid=:jobid and userid=:applicantid');
                                                $database->bind(':applicantid', $applicantid);
                                                $database->bind(':jobid', $id);
                                                try{    
                                                    $row3 = $database->resultset();
                                                }catch (PDOException $e) {
                                                    $msg = $e->getTraceAsString()." ".$e->getMessage();
                                                    $log->error($logtimestamp." - ".$_SESSION['user'] . " " .$msg);
                                                    die("");
                                                }          
                                                $row3 = $database->single();
                                                $invitecheck = $row3['invitecheck'];
                                       ?>
                                                <tr id="line<?=$id?>">                                                   
                                                    <td><span class="h4weight"><?=$jobtitle?></span></td>
                                                    <td class="text-right"><?=$company?></td>
                                                    <td class="text-right"><?=$maxsalary?></td>
                                                    <td class="text-right"><?=$months[$dadd[1]-1]?>&nbsp;<?=$dadd[2]?>,&nbsp;<?=$dadd[0]?></td>
                                                    
                                                    <td class="td-actions text-right">
                                                <ul class="list-inline">
                                                        <?php
                                                            if($invitecheck == 0){
                                                        ?>
                                                        <li id='invited<?=$id?>'>
                                                         <a href="#invitemodal" data-applicantid="<?=$applicantid?>" data-mode="insert" data-userid="<?=$userid?>" data-jobid="<?=$id?>" data-view="search" data-toggle="modal" data-target="#invite-modal" rel="tooltip" id="inviteview" title="Invite to Apply" >
                                                            <i class="fa fa-envelope fa-2x text-warning"></i>
                                                          </a>
                                                        </li>
                                                        <?php
                                                            }else{
                                                        ?>
                                                        <li id='invited<?=$id?>'>                                    
                                                            <i class="fa fa-check text-success"> Already Applied or Invited</i>
                                                        </li>
                                                        <?php
                                                            }
                                                        ?>
                                                   </ul>
                                                    </td>
                                                </tr>
                                            <?php
                                            }
                                            ?>
                                                
                                            </tbody>
                                        </table>
                                    
                                      </div>
                                                        </div>

                                                    </div>
                                             </div>
                                    </div>
                           
                            
                                </div> <!--alljobsdiv-->
                  
                    
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


