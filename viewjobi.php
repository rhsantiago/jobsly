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
	<link rel="apple-touch-icon" sizes="76x76" href="img/favicon.ico">
	<link rel="icon" href="img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Job Ads | Jobs | jobsly</title>
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
           
        		<a class="navbar-brand logo" >jobsly</a>
        	</div>
           <div class="collapse navbar-collapse" id="navigation-example">
        		
    				
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
$isjobseeker = '';
if(isset($_GET['jobid'])){ $jobid = $_GET['jobid']; }
if(isset($_GET['mode'])){ $mode = $_GET['mode']; }
if(isset($_GET['isjobseeker'])){ $isjobseeker = $_GET['isjobseeker']; }

 
    $database->query('SELECT * from indeedjobs where id = :jobid');
   
    $database->bind(':jobid', $jobid);
    try{
        $row = $database->single();
     }catch (PDOException $e) {
        $msg = $e->getTraceAsString()." ".$e->getMessage();
        $log->error($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
        die("");
    }    
          $jobid = $row['id'];
          $jobtitle = $row['jobtitle'];
          $company = $row['company'];
          $teaser = $row['snippet'];
          $jobdesc = $row['jobdesc'];
          $link = $row['link'];      
          $jobdate = $row['jobdate'];
          $dadd = explode("-", $jobdate);
          $jobdate = $dadd[1] .'/'.$dadd[2].'/'.$dadd[0];
        
    $months = array('Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec');
    $positionlevels = array('Executive','Manager','Assistant Manager','Supervisor','5 Years+ Experienced Employee','1-4 Years Experienced Employee','1 Year Experienced Employee/Fresh Grad');



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
                                    
                                      <div class="panel-body">
                                          
                                          <div class="jobad-meta ">
                                      <p class="blog-post-date pull-right text-muted"><?=$months[$dadd[1]-1]?>&nbsp;<?=$dadd[2]?>,&nbsp;<?=$dadd[0]?></p>
                                         
                                          
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
                                                        <img src="dashboard/img/indeed.png" width="120" height="120" class="img-responsive">
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
                                               
                                                    <div class="collapse-group" id="viewdetails">
                                                  <?=$jobdesc?>
                                                        <br>
                                                        <a href='<?=$link?>'>View on Indeed</a>
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
                                         
                                    </div>
                                  </section>  
                      
                               
                               
                               
                                </div>
                            </div>
                        </div>
                    </div>
                                </div>
                                
                           
	      </div>
	      <div class="col-md-3 pull-right">
                         
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
    ChangeUrl("", "viewjobi.php?jobid="+<?=$jobid?>+"&job="+newString); 
    $("title").html("<?=$jobtitle?> | Job Opening | jobsly");
    $(function() {
       $.material.init();
    });
  
    
});             
</script>


</html>
