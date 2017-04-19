<?php
if (session_status() == PHP_SESSION_NONE) {
        session_start();   
}
if(isset($_SESSION['user'])){
   $user = $_SESSION['user'];
   $password = $_SESSION['password'];
   $userid = $_SESSION['userid'];
   $usertype = $_SESSION['usertype'];
    
   include 'authenticate.php';
}else{
    header("Location: logout.php");
}

if($ok == 1 ){
   
     date_default_timezone_set('Asia/Manila');
     $logtimestamp = date("Y-m-d H:i:s");
     include "serverlogconfig.php";
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="../img/apple-icon.png">
	<link rel="icon" type="image/png" href="../img/favicon.png">
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
<script src="js/jquery.min.js" type="text/javascript"></script>

</head>

<body class="landing-page">
   <!-- Modal -->
	<div class="modal fullscreen-modal fade" id="showjob-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog modal-lg" role="document">
	    <div class="modal-content modalcontent">
	      
	    </div>
	  </div>
	</div>
    
    <div class="modal fullscreen-modal fade" id="savejob-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
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
					<div class="col-md-11 margin-top-title col-md-offset-1">
               
                </div>
            </div>
            </div>
        </div>
    <!--sidebar-->
   <?php
            $database->query('select position as maxposition,fname,lname,photo from workexperience, personalinformation,useraccounts where personalinformation.userid=:userid and startdate = (select max(startdate) from workexperience where workexperience.userid=:userid) and useraccounts.id=:userid');
            $database->bind(':userid', $userid);   
            try{
                $row = $database->single();
            }catch (PDOException $e) {
                $msg = $e->getTraceAsString()." ".$e->getMessage();
                $log->error($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
                die("");
            }     
            $maxposition = $row['maxposition'];
            $fname = $row['fname'];
            $lname = $row['lname'];
            $photo = $row['photo'];
            if(empty($photo)){
                $photo='img/unknown.png';
            }
    ?>
   
    <div id="main" class="wrapper ">
       

		<div class="main main-raised ">
         
			<div class="container-fluid"> <!-- with fluid for full width -->
                <div class="row-fluid">   <!-- with fluid for full width -->
                    
                    <div id="resume-main-body">                       
              
                        <?php

include 'specialization.php';
$isjobseeker = '';
if(isset($_GET['jobid'])){ $jobid = $_GET['jobid']; }
if(isset($_GET['mode'])){ $mode = $_GET['mode']; }
if(isset($_GET['isjobseeker'])){ $isjobseeker = $_GET['isjobseeker']; }

 $database = new Database();
 
    $database->query('SELECT * from jobads,companyinfo where jobads.id = :jobid and jobads.userid=companyinfo.userid');
   
    $database->bind(':jobid', $jobid);
    try{
        $row = $database->single();
     }catch (PDOException $e) {
        $msg = $e->getTraceAsString()." ".$e->getMessage();
        $log->error($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
        die("");
    }    
    $id = $row['id'];
    $logo = $row['logo'];
    $header = $row['header'];
    $companyid = $row['userid'];
    $cdesc = $row['cdesc'];
    $companyname = $row['companyname'];
    $jobtitle = $row['jobtitle'];
    $company = $row['company'];
    $specialization = $row['specialization'];
    $plevel = $row['plevel'];
    $jobtype = $row['jobtype'];
    $msalary = $row['msalary'];
    $maxsalary = $row['maxsalary'];
    $startappdate = $row['startappdate'];
    $sdate = explode("-", $startappdate);
    $startappdate = $sdate[1] .'/'.$sdate[2].'/'.$sdate[0];
    $endappdate = $row['endappdate'];
    $edate = explode("-", $endappdate);
    if($edate[1] >= 1 && $edate[2] >= 2 && $edate[0] >= 1){
        $endappdate = '';
    }else{
        $endappdate = $edate[1] .'/'.$edate[2].'/'.$edate[0];
    }
    
    $nvacancies = $row['nvacancies'];
    $teaser = $row['teaser'];
    $jobdesc = $row['jobdesc'];
    $city = $row['city'];
    $province = $row['province'];
    $country = $row['country'];
    $yrsexp = $row['yrsexp'];
    $mineduc = $row['mineduc'];
    $prefcourse = $row['prefcourse'];
    $languages = $row['languages'];
    $licenses = $row['licenses'];
    $essay = $row['essay'];
    $wtravel = $row['wtravel'];
    if($wtravel=='on'){
       $wtravel = 'checked';
    }
    $wrelocate = $row['wrelocate'];
    if($wrelocate=='on'){
       $wrelocate = 'checked';
    }
    $dateadded = $row['dateadded'];
    $dadd = explode("-", $dateadded);
    $dateadded = $dadd[1] .'/'.$dadd[2].'/'.$dadd[0];   
    
    $esalary=0;
    if($usertype==2){
        $database->query('SELECT esalary from additionalinformation where userid = :userid');   
        $database->bind(':userid', $userid);
        $ainforow = $database->single();
        $esalary = $ainforow['esalary'];
    }
    $months = array('Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec');
    $positionlevels = array('Executive','Manager','Assistant Manager','Supervisor','5 Years+ Experienced Employee','1-4 Years Experienced Employee','1 Year Experienced Employee/Fresh Grad');

    if(strcmp($isjobseeker,'jobseeker')==0){
        $database->query('update jobads set views=views + 1 where id=:jobid');   
        $database->bind(':jobid', $jobid);    
        try{
            $database->execute();
        }catch (PDOException $e) {
            $msg = $e->getTraceAsString()." ".$e->getMessage();
            $log->error($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
            die("");
        } 
        
    }

?>
<div class="row">
    <div class="col-md-12 center">            
                    <div class="adstop">     <img  src="https://lh5.ggpht.com/NFYFP2H9CCP50vAQNLa7AtCj_mbbYmOzY978fZqd31oL5qOdvXgxU3KW8ek2VgvIOvTqWY0=w728" 
                                 alt="user">  
                     </div>    
                           
     </div>
   
   
     </div>
     <div class="col-md-offset-1 col-md-7">
                       
                <div class="section  section-landing">
					<div class="features">
						<div class="row">
                                                     
                            <div class="col-md-12">
                    
                           <div class="alljobsdiv">
                 <section class="blog-post">
                                    <div class="panel panel-default">
                                       <?php
                                        if(!empty($header)){
                                     ?>    
                                     <div class="row">
                                                <div class="col-md-12">                                                  
                                                  <img id="jobadheader" src="<?=$header?>"  class="img-responsive fullwidth">                                         
                                                </div>
                                      </div>
                                     <?php
                                        }
                                     ?>
                                      <div class="panel-body jobad-bottomborder">
                                          
                                          <div class="jobad-meta jobad-bottomborder">
                                      <p class="blog-post-date pull-right text-muted"><?=$months[$dadd[1]-1]?>&nbsp;<?=$dadd[2]?>,&nbsp;<?=$dadd[0]?></p>
                                          <ul  class="list-inline ">
                                                                                           
                                                                                            <li>
                                                                                                <h6 id="vertical-align" class="text-muted jobadheader">
                                                                                                   <i class="material-icons text-info jobadheadericon">domain</i> &nbsp;<?=$specarray[$specialization]?>
                                                                                                </h6>
                                                                                            </li>
                                                                                            <li>
                                                                                                <h6 id="vertical-align" class="text-muted jobadheader">
                                                                                                <i class="material-icons text-info jobadheadericon">date_range</i>&nbsp;<?=$positionlevels[$plevel-1]?>
                                                                                                </h6>
                                                                                            </li>
                                                                                            <li>
                                                                                                <h6 id="vertical-align" class="text-muted jobadheader">
                                                                                                   <i class="material-icons text-info jobadheadericon">local_atm</i> &nbsp;Php <?=$msalary?> - <?=$maxsalary?>
                                                                                                </h6>
                                                                                            </li>
                                                                                        </ul>
                                          
                                        </div>
                                     
                                        <div class="blog-post-content">
                                            <div class="row-fluid">
                                                <div class="col-md-6">
                                                        <h2 class="text-info jobad-title"><?=$jobtitle?></h2>
                                                        <div class="companypos">
                                                            <h6 class="text-muted"><i><?=$company?></i></h6>
                                                        </div> 
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="companylogo pull-right"> 
                                                        <img src="<?=$logo?>" width="120" height="120" class="img-responsive">
                                                    </div>
                                                </div>
                                            </div>    
                                         
                                          <div class="row-fluid">
                                                 <div class="col-md-12">  
                                                      <?=$teaser?>...<br><br>
                                                 </div>
                                                <div class="col-md-12">   
                                               
                                                    <div class="collapse-group collapse" id="viewdetails">
                                                  <?=$jobdesc?>
                                                        
                                                    <div><b>Requirements</b></div>
                                                        <ul>
                                                            <?php
                                                            if($yrsexp > 0){
                                                            ?>    
                                                                <li><?=$yrsexp?> years work experience</li>
                                                            <?php
                                                            }
                                          
                                                            if(!empty($mineduc)){
                                                            ?>                                                            
                                                                <li><?=$mineduc?></li>
                                                            <?php
                                                            }
                                          
                                                            if(!empty($languages)){
                                                            ?>
                                                                <li><?=$languages?></li>
                                                            <?php
                                                            }
                                          
                                                            if(!empty($licenses)){
                                                            ?>
                                                                <li><?=$licenses?></li>
                                                            <?php
                                                            }
                                          
                                                            if($wtravel == 'on'){
                                                            ?>
                                                                <li>Willing to travel</li>
                                                            <?php
                                                            }
                                          
                                                             if($wrelocate == 'on'){
                                                            ?>
                                                                <li>Willing to relocate</li>
                                                            <?php
                                                            }
                                                            ?>
                                                            
                                                        </ul>
                                                        <p><b>Technical / Job-specific skills</b></p>
                                                        <ul>
                                                            <?php
                                                      
                                                                    $database->query('SELECT * FROM jobskills where jobid = :jobid');                                                   
                                                                    $database->bind(':jobid', $jobid);
                                                                    try{
                                                                        $rows = $database->resultset();
                                                                    }catch (PDOException $e) {
                                                                        $error = true;
                                                                        $msg = $e->getTraceAsString()." ".$e->getMessage();
                                                                        include "serverlog.php";
                                                                        die("");
                                                                    } 
                                                                    foreach($rows as $row){
                                                                        echo '<li>';
                                                                        echo $row['jobskill'];
                                                                        echo '</li>';
                                                                    }

                                                             ?>                                                              
                                                        </ul>
                                                        <p><b>Location: </b><?=$city?>, <?=$province?> <?=$country?></p>
                                                        <p><b>Position start date: </b><?=$months[$sdate[1]-1]?>&nbsp;<?=$sdate[2]?>,&nbsp;<?=$sdate[0]?></p>
                                                        <?php
                                                          if($edate[1] >= 1 && $edate[2] >= 2 && $edate[0] >= 1){      
                                                        ?>         
                                                        <p><b>Application deadline: </b><?=$months[$edate[1]-1]?>&nbsp;<?=$edate[2]?>,&nbsp;<?=$edate[0]?></p>
                                                        <?php
                                                          }
                                                        ?>
                                                    </div>    
                                                </div>
                                            </div>
                                          
                                        </div>
                                          <div class="row-fluid">
                                                <div class="col-md-6">
                                                        <a class="btn btn-primary" data-toggle="collapse" data-target="#viewdetails">Read more</a>
                                                </div>
                                             
                                                <div class="col-md-6 actionicon ">
                                                    <?php
                                                        if(strcmp($isjobseeker,'jobseeker')==0){
                                                     ?>     
                                                        <a class="blog-post-share " href="#" data-toggle="tooltip" data-placement="top" title="Save and Apply later"><i class="material-icons">favorite</i></a>
                                                        <a class="blog-post-share " href="#" datah4-toggle="tooltip" data-placement="top" title="Share"><i class="material-icons">share</i></a>
                                                    <?php
                                                        }
                                                    ?> 
                                                </div>
                                                       
                                                <div class="col-md-12 jobad-bottomborder">
                                                   
                                                </div>
                                          </div>
                                          <?php
                                            $database->query('SELECT * from jobapplications where jobid= :jobid and userid = :userid');
                                            $database->bind(':userid', $userid);
                                            $database->bind(':jobid', $jobid);
                                            try{
                                                $checkrow = $database->single();
                                            }catch (PDOException $e) {
                                                $msg = $e->getTraceAsString()." ".$e->getMessage();
                                                $log->error($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
                                                die("");
                                            }
                                          
                                            $database->query('SELECT count(personalinformation.id) as pinfo, count(additionalinformation.id) as ainfo from personalinformation,additionalinformation where personalinformation.userid=:userid and additionalinformation.userid=:userid');
                                            $database->bind(':userid', $userid);
                                            try{    
                                                $row = $database->single();
                                            }catch (PDOException $e) {
                                                $msg = $e->getTraceAsString()." ".$e->getMessage();
                                                $log->error($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
                                                die("");
                                            }     
                                            $pinfo = $row['pinfo']; 
                                            $ainfo = $row['ainfo']; 
                                         
                                            
                                          
                                           if(strcmp($isjobseeker,'jobseeker')==0){
                                                 
                                          if(empty($checkrow) && $pinfo>0 && $ainfo>0){
                                          ?>   
                                        
                                          <div class="quickapplydiv">
                                              <form method="post" id="quickapply-form-modal" name="quickapply-form-modal" data-parsley-validate> 
                                                  <input type="hidden" id="userid" name="userid" value="<?=$userid?>">
                                                  <input type="hidden" id="jobid" name="jobid" value="<?=$jobid?>">
                                                  <div class="row-fluid">
                                                        <div class="col-md-12">
                                                            <div class="center modal-gray">
                                                                <h6 class="text-primary quickapplytitle h4weight"> Quick Apply</h6>
                                                            </div>    
                                                        </div>
                                                        <div class="col-md-6">
                                                             <div id="esalarydiv" class="form-group label-floating">
                                                                        <label class="control-label">Expected Salary</label>
                                                                        <input type="text" id="esalary" class="form-control" value="<?=$esalary?>" data-parsley-required data-parsley-type="number">
                                                             </div>
                                                        </div>
                                                        <div class="col-md-6 ">
                                                            
                                                        </div>
                                                       
                                                        <div class="col-md-12">
                                                            <?php
                                                                if(!empty($essay)){ 
                                                            ?>
                                                                <p>The employer requires you to answer the following question: <b><?=$essay?></b></p>
                                                                <div id="essaydiv" class="form-group label-floating">   
                                                                    <label class="control-label">Essay Answer</label>
                                                                    <input class="form-control" id="essay" name="essay"  data-parsley-required>  
                                                                </div>
                                                             <?php
                                                             }
                                                             ?> 
                                                            <button type="submit" class="btn btn-primary" >Apply Now</button>
                                                            <div id="successdivquickapply" name="successdivquickapply" class="alert alert-success">
                                               
                                                                  <div class="alert-icon">
                                                                    <i class="material-icons">check</i>
                                                                  </div>
                                                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                    <span aria-hidden="true"><i class="material-icons">clear</i></span>
                                                                  </button>
                                                                  <b>Alert: </b> Congratulations! Your application was submitted.

                                                            </div>
                                                            <div id="warningdivquickapply" name="warningdivquickapply" class="alert alert-warning">
                                               
                                                                  <div class="alert-icon">
                                                                    <i class="material-icons">check</i>
                                                                  </div>
                                                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                    <span aria-hidden="true"><i class="material-icons">clear</i></span>
                                                                  </button>
                                                                  <b>Alert: </b> You already applied for this job.

                                                            </div>
                                                            
                                                            
                                                            
                                                        </div>
                                                          
                                                  </div>
                                              </form>  
                                          </div>  
                                         
                                          <?php                                          
                                           }                                        
                                        
                                           }
                                                                          
                                          if(!empty($checkrow)){
                                          ?>
                                          <div class="quickapplydiv2">
                                                <div class="row-fluid">
                                                        <div class="col-md-12">
                                                            <div id="warningdivquickapply2" name="warningdivquickapply" class="alert alert-warning">
                                               
                                                                  <div class="alert-icon">
                                                                    <i class="material-icons">check</i>
                                                                  </div>
                                                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                    <span aria-hidden="true"><i class="material-icons">clear</i></span>
                                                                  </button>
                                                                  <b>Alert: </b> You already applied for this job.

                                                            </div>
                                                    </div>    
                                              </div>    
                                          </div>   
                                         <?php
                                          }
                                         
                                          if(strcmp($isjobseeker,'jobseeker')==0){
                                              if($pinfo<=0 && $ainfo<=0){
                                          ?>
                                  
                                                        <div class="col-lg-12 col-md-12">   
                                    
                                                            <div id="successadapproved" name="successadapproved" class="alert alert-warning">
                                               
                                                                  <div class="alert-icon">
                                                                    <i class="material-icons">check</i>
                                                                  </div>
                                                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                    <span aria-hidden="true"><i class="material-icons">clear</i></span>
                                                                  </button>
                                                                  <b>Alert: </b> Please complete the personal information and additional information portions of your resume to start applying for jobs.

                                                            </div>
                                                </div>
                                        
                                           <?php            
                                                }
                                          }
                                           ?>          
                                      </div>
                                        
                                        <div class="skilltags">
                                            Skilltags: <span class="text-info">
                                            <?php
                                                      
                                                    $database->query('SELECT * FROM jobskills where jobid = :jobid');                                                   
                                                    $database->bind(':jobid', $jobid);
                                                    try{
                                                        $rows = $database->resultset();
                                                    }catch (PDOException $e) {
                                                        $msg = $e->getTraceAsString()." ".$e->getMessage();
                                                        $log->error($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
                                                        die("");
                                                    } 
                                                    foreach($rows as $row){
                                                        echo $row['jobskilltag'];
                                                        echo ' ';
                                                    }
                                                       
                                             ?>   
                                            
                                            </span>
                                        </div>    
                                    </div>
                                  </section>  
                               
                                <section class="blog-post">
                                    <div class="panel panel-default">
                                    
                                     <div class="row">
                                                <div class="col-md-12 ">                                                  
                                                        <div class="quickapplydiv">&nbsp;</div>                                 
                                                </div>
                                      </div>
                                  
                                      <div class="panel-body">
                                          
                                          <div class="jobad-meta">
                                      
                                        </div>
                                     
                                        <div class="blog-post-content">
                                            <div class="row-fluid">
                                                <div class="col-md-6">
                                                        <h2 class="text-info jobad-title">About <?=$companyname?></h2>
                                                      
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="companylogo pull-right"> 
                                                        <img src="<?=$logo?>" width="120" height="120" class="img-responsive">
                                                    </div>
                                                </div>
                                            </div>    
                                         
                                          <div class="row-fluid">
                                               
                                                <div class="col-md-12">   
                                               
                                                    <div class="collapse-group" id="viewdetails">
                                                  <?=$cdesc?>
                                                        
                                                   
                                                    </div>    
                                                </div>
                                            </div>
                                          
                                        </div>
                                          <div class="row-fluid">
                                               
                                                       
                                                <div class="col-md-12 jobad-bottomborder">
                                                   
                                                </div>
                                          </div>
                                          
                                         
                                        </div>
                                    </div>
                                  </section>  
                               
                               
                               
                                </div>
                            </div>
                        </div>
                    </div>
                                </div>
                                
                           
	      </div>
	      <div class="col-md-3 pull-right">
                          <div class="card card-ads adsright">                                            
                                                             <div class="content">
                                                                                                                                       
                                                                            <div class="row">
                                                                                <div class="col-md-12">
                                                                                    <img alt="Bootstrap Image Preview" src="img/ad1.jpg" width="300" height="250" class="img-responsive" style="padding-top: 5px"/><img alt="Bootstrap Image Preview" src="http://lorempixel.com/300/250/" class="img-responsive" style="padding-top: 5px"/>
                                                                                </div>
                                                                               
                                                                            
                                                                            </div>
                                                                      
                                                             </div>
                                                    </div>
		       </div> 

                </div> 
	        </div>

		</div>
</div>
      
	    <footer class="footer">
	        <div class="container">
	            <nav class="pull-left">
	                <ul>
	                    <li>
	                        <a href="http://www.creative-tim.com">
	                            Creative Tim
	                        </a>
	                    </li>
						<li>
	                        <a href="http://presentation.creative-tim.com">
	                           About Us
	                        </a>
	                    </li>
	                    <li>
	                        <a href="http://blog.creative-tim.com">
	                           Blog
	                        </a>
	                    </li>
	                    <li>
	                        <a href="http://www.creative-tim.com/license">
	                            Licenses
	                        </a>
	                    </li>
	                </ul>
	            </nav>
	            <div class="copyright pull-right">
	                &copy; 2016, made with <i class="fa fa-heart heart"></i> by Creative Tim
	            </div>
	        </div>
	    </footer>

	</div>
    
</body>

	<!--   Core JS Files   -->
	<script src="js/jquery.min.js" type="text/javascript"></script>
	<script src="js/bootstrap.min.js" type="text/javascript"></script>
	<script src="js/material.min.js"></script>

	<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/
	<script src="js/nouislider.min.js" type="text/javascript"></script>  -->

	<!--  Plugin for the Datepicker, full documentation here: http://www.eyecon.ro/bootstrap-datepicker/ -->
	<script src="js/bootstrap-datepicker.js" type="text/javascript"></script>

	<!-- Control Center for Material Kit: activating the ripples, parallax effects, scripts from the example pages etc -->
	<script src="js/material-kit.js" type="text/javascript"></script>
    <script src="js/jobseeker-main.js" type="text/javascript"></script>
    <script src="js/parsley.js"></script>
     
    <script>

        
        
jQuery(document).ready(function ($) {
    $(function() {
       $.material.init();
    });
    $('#quickapply-form-modal').parsley({
                       successClass: "has-success",
                       errorClass: "has-error"
                });
         $('#successdivquickapply').hide();
         $('#warningdivquickapply').hide();
<?php
if(strcmp($isjobseeker,'jobseeker')==0){
 ?>  
   
    $('#quickapply-form-modal #esalary').parsley().on('field:error', function() {
           $('#quickapply-form-modal #esalarydiv').addClass('has-error');
           $('#quickapply-form-modal #esalarydiv').append("<span class='material-icons form-control-feedback'>clear</span>");   
    });    
    $('#quickapply-form-modal #esalary').parsley().on('field:success', function() {
            $('#quickapply-form-modal #esalarydiv').addClass('has-success');
            $('#quickapply-form-modal #esalarydiv').find('span').remove()
            $('#quickapply-form-modal #esalarydiv').append("<span class='material-icons form-control-feedback'>done</span>");   
    });
    <?php
      if(!empty($essay)){ 
    ?>
         $('#quickapply-form-modal #essay').parsley().on('field:error', function() {
               $('#quickapply-form-modal #essaydiv').addClass('has-error');
               $('#quickapply-form-modal #essaydiv').append("<span class='material-icons form-control-feedback'>clear</span>");   
        });    
        $('#quickapply-form-modal #essay').parsley().on('field:success', function() {
                $('#quickapply-form-modal #essaydiv').addClass('has-success');
                $('#quickapply-form-modal #essaydiv').find('span').remove()
                $('#quickapply-form-modal #essaydiv').append("<span class='material-icons form-control-feedback'>done</span>");   
        });
   
    <?php
      }
    ?> 
<?php
}
?>    
    
});             
</script>


</html>
<?php
} else{
    include 'logout.php';
    
}
?>