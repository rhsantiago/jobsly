<?php
include 'Database.php';
$database = new Database();
     date_default_timezone_set('Asia/Manila');
     $logtimestamp = date("Y-m-d H:i:s");
     $page='public';
     include "dashboard/serverlogconfig.php";
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
	<link rel="apple-touch-icon" sizes="76x76" href="../img/apple-icon.png">
	<link rel="icon" type="image/png" href="../img/favicon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Job Ads | Job Opening | jobsly</title>
 	<meta name="description" content="View job ad details including industry, salary and similar jobs." />
 	<meta name="keywords" content="Jobs, Hiring, Career, Work, Resume, Call Center Jobs, Recruitment" />

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />

	<!--     Fonts and icons     -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <link href="https://fonts.googleapis.com/css?family=Oleo+Script" rel="stylesheet">
 <!--
	<link href="../jobsly/dashboard/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../jobsly/dashboard/css/material-kit.css" rel="stylesheet"/>
    <link href="../jobsly/dashboard/css/custom.css" rel="stylesheet"/>
    <link href="../jobsly/dashboard/css/media.css" rel="stylesheet"/>
    <script src="../jobsly/dashboard/js/jquery.min.js" type="text/javascript"></script>
	<script src="../jobsly/dashboard/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="../jobsly/dashboard/js/material.min.js"></script>
	<script src="../jobsly/dashboard/js/material-kit.js" type="text/javascript"></script>
    <script src="../jobsly/dashboard/jobseeker-main.js" type="text/javascript"></script>
  --> 
    <link href="dashboard/css/bootstrap.min.css" rel="stylesheet" />
    <link href="dashboard/css/material-kit.css" rel="stylesheet"/>
    <link href="dashboard/css/custom.css" rel="stylesheet"/>
    <link href="dashboard/css/media.css" rel="stylesheet"/>
    <script src="dashboard/js/jquery.min.js" type="text/javascript"></script>
	<script src="dashboard/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="dashboard/js/material.min.js"></script>
	<script src="dashboard/js/material-kit.js" type="text/javascript"></script>
    <script src="dashboard/js/jobseeker-main.js" type="text/javascript"></script>

</head>

<body class="landing-page">
 <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MKMGLRW"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->   
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
           
        		<a href='index.php' class="navbar-brand logo" >jobsly</a>
        	</div>
            <div class="collapse navbar-collapse" id="navigation-example">
        		
    				<ul class="nav navbar-nav navbar-right">                      
                        <!--
		            <li>
		                <a href="https://twitter.com/CreativeTim" target="_blank" class="btn btn-simple btn-white btn-just-icon">
							<i class="fa fa-twitter"></i>
						</a>
		            </li>
		            <li>
		                <a href="https://www.facebook.com/CreativeTim" target="_blank" class="btn btn-simple btn-white btn-just-icon">
							<i class="fa fa-facebook-square"></i>
						</a>
		            </li>
					<li>
		                <a href="https://www.instagram.com/CreativeTimOfficial" target="_blank" class="btn btn-simple btn-white btn-just-icon">
							<i class="fa fa-instagram"></i>
						</a>
		            </li>
                    -->
        		</ul>
                <ul class="nav navbar-nav navbar-right">
                    
                    <li><a href="login.php" id="home"><i class="material-icons">done</i>Signin</a></li>
                    
                    <li class="dropdown active"><a href="main.php" class="dropdown-toggle" data-toggle="dropdown" id="pinfo"><i class="material-icons">create</i>&nbsp;Signup<b class="caret"></b></a>
                         <ul class="dropdown-menu">
                                    <li><a href="signup.php?target=jobseeker">Job seeker</a></li>
						            <li><a href="signup.php?target=employer">Employers</a></li>
                         </ul> 
                    </li>                
                </ul>
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
     
    <div id="main" class="wrapper ">
       

		<div class="main main-raised ">
         
			<div class="container-fluid"> <!-- with fluid for full width -->
                <div class="row-fluid">   <!-- with fluid for full width -->
                    
                    <div id="resume-main-body">                       
              
                        <?php

include 'dashboard/specialization.php';
//$isjobseeker = '';
if(isset($_GET['jobid'])){ $jobid = $_GET['jobid']; }
if(isset($_GET['mode'])){ $mode = $_GET['mode']; }
//if(isset($_GET['isjobseeker'])){ $isjobseeker = $_GET['isjobseeker']; }

 
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
    if($sdate[1] >= 1 && $sdate[2] >= 2 && $sdate[0] >= 1){                    
        $startappdate ="";
    }else{
        $startappdate = $sdate[1] .'/'.$sdate[2].'/'.$sdate[0];
    }
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
        
    $months = array('Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec');
    $positionlevels = array('Executive','Manager','Assistant Manager','Supervisor','5 Years+ Experienced Employee','1-4 Years Experienced Employee','1 Year Experienced Employee/Fresh Grad');


        $database->query('update jobads set views=views + 1 where id=:jobid');   
        $database->bind(':jobid', $jobid);    
        try{
            $database->execute();
        }catch (PDOException $e) {
            $msg = $e->getTraceAsString()." ".$e->getMessage();
            $log->error($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
            die("");
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
                                                  <img id="jobadheader" src="dashboard/<?=$header?>"  class="img-responsive fullwidth">                                         
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
                                                                                                   <i class="material-icons text-info jobadheadericon">local_atm</i> &nbsp;<span class="h4weight text-danger">Login to view salary</span>
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
                                                        <img src="dashboard/<?=$logo?>" width="120" height="120" class="img-responsive">
                                                    </div>
                                                </div>
                                            </div>    
                                         
                                          <div class="row-fluid">
                                                 <div class="col-md-12">  
                                                   <?php
                                                    if(!empty($teaser)){
                                                  ?>      
                                                        <?=$teaser?>...<br><br>
                                                  <?php
                                                    }
                                            	  ?>
                                                 </div>
                                                <div class="col-md-12">   
                                               
                                                    <div id="viewdetails" class="collapse-group collapse" >
                                                  <?=$jobdesc?>
                                                   <?php
                                                if(($yrsexp > 0) || (!empty($mineduc)) || (!empty($languages)) || (!empty($licenses)) || ($wtravel == 'on') || ($wrelocate == 'on')){
                                                    ?>      
                                                    <div><b>Requirements</b></div>
                                                     <?php
                                                    }
                                                    ?>    
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
                                                         <?php
                                                      
                                                                    $database->query('SELECT * FROM jobskills where jobid = :jobid');                                                   
                                                                    $database->bind(':jobid', $jobid);
                                                                    try{
                                                                        $rows = $database->resultset();
                                                                        $skillscount = $database->rowCount();
                                                                    }catch (PDOException $e) {
                                                                        $error = true;
                                                                        $msg = $e->getTraceAsString()." ".$e->getMessage();
                                                                        die("");
                                                                    } 
                                                                 if($skillscount > 0){   
                                                             ?>
                                                         <script>
                                                            var skills =[];
                                                            </script>
                                                        <p><b>Technical / Job-specific skills</b></p>
                                                        <ul>
                                                               <?php        
                                                                    foreach($rows as $row){
                                                                        echo '<li>';
                                                                        echo $row['jobskill'];
                                                                        echo '</li>';
                                                                        echo "<script>skills.push('".$row['jobskill']."')</script>";
                                                                    }

                                                             ?>                                                           
                                                        </ul>
                                                         <script>                                                            
                                                          for (var i=0; i<skills.length; i++) {
                                                            window.dataLayer.push({                                                       
                                                              'event': 'jobAdSkills',  
                                                              'skill': skills[i]
                                                            });
                                                          }                                                      
                                                            </script>
                                                        <?php
                                                                 }
                                                            if(!empty($city) || !empty($province) || !empty($country)){
                                                        ?>
                                                        <p><b>Location: </b><?=$city?>, <?=$province?> <?=$country?></p>
                                                        <?php
                                                            }
                                                            if($sdate[1] >= 1 && $sdate[2] >= 2 && $sdate[0] >= 1){
                                                        ?> 
                                                        <p><b>Position start date: </b><?=$months[$sdate[1]-1]?>&nbsp;<?=$sdate[2]?>,&nbsp;<?=$sdate[0]?></p>
                                                        <?php
                                                            }
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
                                                        <a class="btn btn-primary btn-sm" data-toggle="collapse" data-target="#viewdetails">Read more</a>
                                                </div>                                             
                                               
                                          </div>
                                        
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
                                                        <img src="dashboard/<?=$logo?>" width="120" height="120" class="img-responsive">
                                                    </div>
                                                </div>
                                            </div>    
                                         
                                          <div class="row-fluid">
                                               
                                                <div class="col-md-12">   
                                               
                                                    <div class="collapse-group">
                                                  <?=$cdesc?>
                                                        
                                                   
                                                    </div>    
                                                </div>
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

    <script>
function ChangeUrl(title, url) {
    if (typeof (history.pushState) != "undefined") {
        var obj = { Title: title, Url: url };
        history.pushState(obj, obj.Title, obj.Url);
    } else {
        alert("Browser does not support HTML5.");
    }
}
    var str =  '<?=$jobtitle?>';   
   var newString = str.replace(/[^A-Z0-9]/ig, "-");     
        
jQuery(document).ready(function ($) {
    ChangeUrl("", "viewjob-newpage.php?jobid="+<?=$jobid?>+"&job="+newString); 
    $("title").html("<?=$jobtitle?> | Job Opening | jobsly");
    $(function() {
       $.material.init();
    });
  
    
});             
</script>


</html>
