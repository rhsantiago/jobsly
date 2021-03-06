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
}

if($ok == 1 ){
        date_default_timezone_set('Asia/Manila');
        $logtimestamp = date("Y-m-d H:i:s"); 
        include "serverlogconfig.php";
        $msg = "logged in";
        $log->info($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
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
})(window,document,'script','dataLayer','GTM-MKMGLRW');</script>
<!-- End Google Tag Manager -->    
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="img/favicon.ico">
	<link rel="icon" href="img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Dashboard | jobsly</title>
    <meta name="description" content="Post job ads, view resumes, and get statistical data about your job ads as well as the industry all for free." />
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

	<!-- Control Center for Material Kit: activating the ripples, parallax effects, scripts from the example pages etc -->
	<script src="js/material-kit.js" type="text/javascript"></script>
    <script src="js/employer-main.js" type="text/javascript"></script>
    <script src="js/summernote.min.js" type="text/javascript"></script>
   <!-- <script src="js/summernote-cleaner.js"></script> -->
    <script src="js/parsley.js"></script>
</head>

<body class="landing-page">
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MKMGLRW"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->    
     <!-- Modal -->
	<div class="modal fullscreen-modal fade" id="viewresume-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog modal-lg" role="document">
	    <div class="modal-content modalcontent">
	      
	    </div>
	  </div>
	</div>
    <div class="modal fullscreen-modal fade" id="invite-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog modal-lg" role="document">
	    <div class="modal-content modalcontent">
	      
	    </div>
	  </div>
	</div>
    <div class="modal fullscreen-modal fade" id="showjob-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog modal-lg" role="document">
	    <div class="modal-content modalcontent">
	      
	    </div>
	  </div>
	</div>
    <div class="modal fullscreen-modal fade" id="rejectapp-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog modal-lg" role="document">
	    <div class="modal-content modalcontent">
	      
	    </div>
	  </div>
	</div>
    <div class="modal fullscreen-modal fade" id="logoupload-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <form role="form"  action="uploadlogo-submit.php" method="post" enctype="multipart/form-data">         
            <input type="hidden" id="userid" name="userid" value="<?=$userid?>">
            <input type="hidden" id="from" name="cinfo" value="cinfo">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content modalcontent">
	        <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title text-primary h4weight" id="myModalLabel">Upload Company Logo</h4>
	      </div>
            <div id="modalrejectapp" class="modal-body">
            
            <div id="fileuploaddiv" class="">                 
                   <input type="file" id="fileToUpload" name="fileToUpload" class="">
                 </div> 
           </div>
            <div class="modal-footer blog-post">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        <button type="submit" class="btn btn-primary">Upload</button>
	      </div>
	    </div>
           
	  </div>
        </form>    
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
               <i onclick="openNav()" class="leftofnavheader material-icons">menu</i>
        		<a class="navbar-brand logo" >jobsly</a>
        	</div>

        	<div class="collapse navbar-collapse" id="navigation-example">
        		<ul class="nav navbar-nav navbar-right">
                    <li class="visible-xs"><a href="employer-home.php" id="home"><i class="material-icons">home</i>Home</a></li>
                    <li class="visible-xs"><a href="searchresumes.php" id="home"><i class="material-icons">find_in_page</i>Resume&nbsp;Search</a></li>
                    <li class="dropdown active visible-xs"><a href="employer-main.php" class="dropdown-toggle" data-toggle="dropdown" id="pinfo"><i class="material-icons">people</i>Applicants<b class="caret"></b></a>
                         <ul class="dropdown-menu">
                                    <li><a href="employer-main.php?ajax=ajposts"><i class="material-icons">flag</i>&nbsp;By Job Ad</a></li>
                                    <li><a href="employer-main.php?ajax=short"><i class="material-icons">sort</i>&nbsp;Shortlist</a></li>  
                                    <li><a href="employer-main.php?ajax=napp"><i class="material-icons">new_releases</i>&nbsp;New Applicants</a></li>                                 
                         </ul> 
                    </li>
                    <li class="dropdown active visible-xs"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="material-icons">work</i>Job Ads<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="employer-jobads.php?ajax=ajads" id="ajads"><i class="material-icons">list</i>&nbsp;My Job Ads</a></li>
                            <li><a href="employer-jobads.php?ajax=pjobad" id="pjobad"><i class="material-icons">note_add</i>&nbsp;Post a Job Ad</a></li>
                            <li><a href="employer-jobads.php?ajax=jtemp" id="jtemp"><i class="material-icons">content_copy</i>&nbsp;Job Templates</a></li>
                            <li><a href="employer-jobads.php?ajax=essays" id="essays"><i class="material-icons">mode_edit</i>&nbsp;Essays</a></li>
                        </ul>    
                    </li>
                    <li class="visible-xs"><a href="employer-stats.php" id="home"><i class="material-icons">assessment</i>Statistics</a></li>
                    <li class="divider"></li>
		            <li><a href="logout.php" id="logout"><i class="material-icons">do_not_disturb</i>Sign Out</a></li>
		            
    				
                </ul>    				
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
    <!--sidebar-->
   <?php
            $database->query('select companyname,cperson,logo from companyinfo where userid=:userid');
            $database->bind(':userid', $userid);   
            try {
                $row = $database->single();      
            }catch (PDOException $e) {
                $msg = $e->getTraceAsString()." ".$e->getMessage();
                $log->error($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
                die("");
            }
            $companyname = $row['companyname'];
            $cperson = $row['cperson'];
            $logo = $row['logo'];
            if(empty($logo)){
                $logo='img/unknown.png';
            }
      
    ?>
    <!--sidebar-->
   <div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
   <div class="center sidenavmargin">
                                <div class="avatar center">
                                        <img src="<?=$logo?>" alt="Circle Image" width="100" height="100" class="img-circle img-responsive img-raised center">
                                    </div>
                                    <div class="name">
                                        <h4 class="sidenavname"><?=$companyname?></h4>
                                        <h5 class="sidenavposition"><?=$cperson?></h5>
                                    </div>  
       </div>    
   <div class="sidebar-item"><a href="employer-home.php"><i class="material-icons">home</i>&nbsp;Home</a></div>
   <div class="sidebar-item"><a href="searchresumes.php"><i class="material-icons">find_in_page</i>&nbsp;Resume&nbsp;Search</a></div>        
   <div class="sidebar-item dropdown active"><a href="employer-main.php" class="dropdown-toggle" data-toggle="dropdown" id="pinfo"><i class="material-icons">people</i>&nbsp;Applicants<b class="caret"></b></a>
            <ul class="dropdown-menu">
                                    <li><a href="employer-main.php?ajax=ajposts"><i class="material-icons">flag</i>&nbsp;By Job Ad</a></li>
                                    <li><a href="employer-main.php?ajax=short"><i class="material-icons">sort</i>&nbsp;Shortlist</a></li>  
                                    <li><a href="employer-main.php?ajax=napp"><i class="material-icons">new_releases</i>&nbsp;New Applicants</a></li>
            </ul> 
    </div>
   <div class="sidebar-item dropup"><a class="dropdown-toggle" data-toggle="dropdown" href="employer-jobads.php"><i class="material-icons">work</i>&nbsp;Job Ads<b class="caret"></b></a>
    <ul class="dropdown-menu">
                            <li><a href="employer-jobads.php?ajax=ajads" id="ajads"><i class="material-icons">list</i>&nbsp;My Job Ads</a></li>
                            <li><a href="employer-jobads.php?ajax=pjobad" id="pjobad"><i class="material-icons">note_add</i>&nbsp;Post a Job Ad</a></li>
                            <li><a href="employer-jobads.php?ajax=jtemp" id="jtemp"><i class="material-icons">content_copy</i>&nbsp;Job Templates</a></li>
                            <li><a href="employer-jobads.php?ajax=essays" id="essays"><i class="material-icons">mode_edit</i>&nbsp;Essays</a></li>
    </ul>
    </div>
    <div class="sidebar-item"><a href="employer-stats.php"><i class="material-icons">assessment</i>&nbsp;Statistics</a></div>
    <div id="loading" class="center" >
           <img id="loader"  class="loader " src="img/loader.gif">
    </div>
</div>
  
     <!--sidebar-->
    <div id="main" class="wrapper ">
       

		<div class="main main-raised ">
         
			<div class="container-fluid"> <!-- with fluid for full width -->
                <div class="row-fluid">   <!-- with fluid for full width -->
                    
                    <div id="resume-main-body">                       
                                <?php


    if (session_status() == PHP_SESSION_NONE) {
        session_start();
         if (!isset($database)){
            include 'Database.php';
         }
    }  
    $database = new Database();
    $database->query('SELECT id,companyname,companyaddress,cperson,logo,designation,cpersonemail,companywebsite,cpersontelno,industry from companyinfo where userid=:userid');
    $database->bind(':userid', $userid);
    try{
        $row = $database->single();
    }catch (PDOException $e) {
       $msg = $e->getTraceAsString()." ".$e->getMessage();
       $log->error($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
       die("");
    }
    $id = $row['id'];
    $companyname = $row['companyname'];
    $companyaddress = $row['companyaddress'];
    $cperson = $row['cperson'];
    $designation = $row['designation'];
    $cpersonemail = $row['cpersonemail'];
    $companywebsite = $row['companywebsite'];
    $cpersontelno = $row['cpersontelno'];
    $industry = $row['industry'];
    $logo = $row['logo'];

?>



    
    <div class="row">
    <div class="col-md-12 center">            
                  <!--  <div class="adstop">     <img  src="https://lh5.ggpht.com/NFYFP2H9CCP50vAQNLa7AtCj_mbbYmOzY978fZqd31oL5qOdvXgxU3KW8ek2VgvIOvTqWY0=w728" 
                                 alt="user">  
                     </div>    
                      -->     
     </div>
   
    <div class="col-md-12">
                             <h2 class="title">Home</h2>
       </div>
     </div>
    <div class="col-md-9">
                       
                <div class="section  section-landing">
	                 

					<div class="features">
						<div class="row">
                                                     
                            <div class="col-md-7">
                       
                                
                                <section class="blog-post">
                                    <div class="panel panel-default">
                                    
                                      <div class="panel-body">                                        
                                     
                                        <div class="blog-post-content">
                                            
                                            <div class="row-fluid">
                                                <div class="col-md-8 jobad-titletopmargin">                                                    
                                                    <h2 class="title jobad-title "><span class="text-info"><?=$companyname?></span></h2>
                                                        <div>
                                                            <h6 class="text-muted"><i><?=$companyaddress?></i></h6>
                                                        </div> 
                                                </div>                                                
                                                <div class="col-md-4 ">
                                                    <div class="companylogo pull-right"> 
                                                        <img src="<?=$logo?>" width="70" height="70" class="img-responsive">
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            <?php
                                            if(!empty($companywebsite)){
                                            ?>    
                                            <div class="row-fluid">
                                                <div class="col-md-12" >
                                                <br>
                                                    <h6 id="vertical-align" class="text-muted jobadheader">
                                                       <i class="material-icons text-info jobadheadericon">cloud_queue</i> &nbsp;<?=$companywebsite?>
                                                        </h6>                                                                                          
                                          </div> 
                                        </div>
                                            <?php
                                            }
                                            ?>
                                         <div class="row-fluid">
                                               
                                                <div class="col-md-6 actionicon pull-right">
                                                        <a class="blog-post-share " href="#cinfo" id="cinfo" data-jobid="<?=$id?>" title="Edit"><i class="material-icons" >edit</i> Edit</a>
                                                       
                                                </div>
                                          </div> 
                                      </div>
                                        
                                        
                                    </div>
                                    </div>
                                </section>
                            </div>  
                            <div class="col-md-5">
                       
                                
                                <section class="blog-post">
                                    <div class="panel panel-default">
                                    
                                      <div class="panel-body">                                        
                                     
                                        <div class="blog-post-content">
                                            
                                            <div class="row-fluid">
                                                <div class="col-md-12 jobad-titletopmargin">
                                                    <div class="hometopmargin40">
                                                            Contact Person: <span class="text-info"><b><?=$cperson?></b></span><br>
                                                            Designation: <span class="text-info"><b><?=$designation?></b></span><br>
                                                            Email: <span class="text-info"><b><?=$cpersonemail?></b></span><br>  
                                                            Tel Num: <span class="text-info"><b><?=$cpersontelno?></b></span><br>
                                                        
                                                     </div>   
                                                </div>  
                                            </div>
                                            <div class="row-fluid">
                                                <div class="col-md-12" >
                                                     
                                                        </div>
                                                <div class="col-md-12" align="left">
                                                    
                                                        </div>
                                          
                                          </div> 
                                        </div>                                  
                                         <div class="row-fluid">
                                               
                                                <div class="col-md-6 actionicon pull-right">
                                                        <a class="blog-post-share " href="#cinfo" id="cinfo" data-jobid="<?=$id?>" title="Edit"><i class="material-icons" >edit</i> Edit</a>
                                                       
                                                </div>
                                          </div> 
                                      </div>
                                        
                                        
                                    </div>
                                  </section>
                                 
                            </div>  
                     <?php
                            $database->query('select count(id) as ajads from jobads where userid=:userid and isactive=1');
                            $database->bind(':userid', $userid);
                            try{
                                $row = $database->single();
                            }catch (PDOException $e) {
                                 $msg = $e->getTraceAsString()." ".$e->getMessage();
                                 $log->error($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
                                 die("");
                             }
                            $ajads = $row['ajads'];
    
                            $database->query('SELECT count(jobapplications.id) as totapplicants from jobapplications where jobapplications.jobid IN (select id from jobads where userid=:userid and jobads.isactive=1) and jobapplications.isreject=0');
                            $database->bind(':userid', $userid);
                            try{
                                $row = $database->single();
                            }catch (PDOException $e) {
                                  $msg = $e->getTraceAsString()." ".$e->getMessage();
                                  $log->error($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
                                  die("");
                            }    
                            $totapplicants = $row['totapplicants'];
    
                            $database->query('SELECT count(jobapplications.id) as napps from jobapplications where jobapplications.jobid IN (select id from jobads where userid=:userid and jobads.isactive=1) and jobapplications.isnew=1');
                            $database->bind(':userid', $userid);
                            try{    
                                $row = $database->single();
                            }catch (PDOException $e) {
                                 $msg = $e->getTraceAsString()." ".$e->getMessage();
                                 $log->error($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
                                 die("");
                            }    
                            $napps = $row['napps'];
    
                            $database->query('SELECT count(jobapplications.id) as shortlisted from jobapplications where jobapplications.jobid IN (select id from jobads where userid=:userid and jobads.isactive=1) and jobapplications.isshortlisted=1');
                            $database->bind(':userid', $userid);
                            try{    
                                $row = $database->single();
                            }catch (PDOException $e) {
                                  $msg = $e->getTraceAsString()." ".$e->getMessage();
                                  $log->error($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
                                  die("");
                            }  
                            $shortlisted = $row['shortlisted'];
        
                     ?>
                                
                                
                                
                               <div class="row">
                                   <div class="col-lg-12"> 
                            <div class="col-lg-3 col-md-3"> 
                                    <div  class="card card-stats " ><!-- leftmargin10-->
                                        <div class="card-header cardmargin" data-background-color="purple">
                                            <h3 class="center marginjobdetaillink"><a href="#ajposts" id="ajposts" class="text-primary h4weight pull-right" data-jobid="<?=$id?>"><span id="aappsdiv"><?=$ajads?></span></a></h3>
                                        </div>
                                      <a href="#ajposts" id="ajposts" class="text-primary h4weight pull-right  marginjobdetaillink" data-jobid="<?=$id?>">Total Active<br>Job Ads</a>
                                        
                                    </div>
						      </div>
                            <div class="col-lg-3 col-md-3"> 
                                    <div  class="card card-stats">
                                        <div class="card-header cardmargin" data-background-color="blue">
                                            <h3 class="center marginjobdetaillink"><a href="#napp" id="napp" class="text-primary h4weight pull-right" data-jobid="<?=$id?>"><span id="nappsdiv"><?=$napps?></span></a></h3>
                                        </div>                                        
                                            <a href="#napp" id="napp" class="text-info h4weight pull-right marginjobdetaillink" data-jobid="<?=$id?>">Total New<br>Applicants</a>
                                    </div>                                  
						    </div>
                                <div class="col-lg-3 col-md-3"> 
                                     <div  class="card card-stats">
                                        <div class="card-header cardmargin" data-background-color="green">
                                            <h3 class="center marginjobdetaillink"><a href="#short" id="short" class="text-success h4weight pull-right" data-jobid="<?=$id?>"><span id="shortlistdiv"><?=$shortlisted?></span></a></h3>
                                        </div>
                                            <a href="#short" id="short" class="text-success h4weight pull-right marginjobdetaillink" data-jobid="<?=$id?>">Shortlisted<br>Applicants</a>		
                                    </div>   
						      </div>
                               <div class="col-lg-3 col-md-3"> 
                                     <div  class="card card-stats "><!-- rightmargin15-->
                                        <div class="card-header cardmargin" data-background-color="orange">
                                            <h3 class="center marginjobdetaillink"><a href="#ajposts" id="ajposts" class="text-success h4weight pull-right" data-jobid="<?=$id?>"><span id="shortlistdiv"><?=$totapplicants?></span></a></h3>
                                        </div>
                                            <a href="#ajposts" id="ajposts" class="text-warning h4weight pull-right marginjobdetaillink" data-jobid="<?=$id?>">Total Active<br>Applicants</a>		
                                    </div>   
						      </div> 
                                   </div>
                            </div>
                            <div class="col-md-12">
                                <div class="card card-nav-tabs cardtopmargin">
                                            <div id="tabtitle" class="header  header-info">
                                                <!-- colors: "header-primary", "header-info", "header-success", "header-warning", "header-danger" -->
                                                <div class="nav-tabs-navigation">
                                                    <div class="nav-tabs-wrapper">
                                                        <ul class="nav nav-tabs" data-tabs="tabs">
                                                            <li class="active">
                                                                <a href="#profile" data-toggle="tab">
                                                                    <i class="material-icons">fingerprint</i>
                                                                   Job Ad Performance
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
                                     <table class="table table-hover table-condensed">
                                            <thead>
                                                <tr align="left">
                                                    <th>Job Title</th>
                                                    <th>Impressions</th>
                                                    <th>Views</th>
                                                    <th>Click Through Rate</th>    
                                                    <th>Resume Submissions</th>
                                                    <th>Active</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                              
                                        <?php
                                            $database->query('SELECT id,jobtitle,views,impressions,isactive from jobads where userid=:userid order by dateadded desc limit 0,5');
                                            $database->bind(':userid', $userid);                                             
                                            try{
                                                $rows = $database->resultset();
                                            }catch (PDOException $e) {
                                                $msg = $e->getTraceAsString()." ".$e->getMessage();
                                                $log->error($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
                                                die("");
                                            }    
                                            foreach($rows as $row){
                                                $id = $row['id'];
                                                $jobtitle = $row['jobtitle'];
                                                $views = $row['views'];
                                                $impressions= $row['impressions'];
                                                $isactive= $row['isactive'];
                                                $ctr=0;
                                                if($views > 0 && $impressions > 0){
                                                    $ctr = ($views/$impressions) * 100;
                                                    $ctr = number_format((float)$ctr, 2, '.', '');
                                                }
                                                
                                                $database->query('SELECT count(jobapplications.id) as resumes from jobapplications where jobid=:jobid');
                                                $database->bind(':jobid', $id);
                                                try{
                                                    $row2= $database->single();
                                                }catch (PDOException $e) {
                                                   $msg = $e->getTraceAsString()." ".$e->getMessage();
                                                   $log->error($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
                                                   die("");
                                                }    
                                                $resumes = $row2['resumes'];
                                              
                                       ?>
                                   
                                                <tr>                                                    
                                                    <td><?=$jobtitle?></td>       
                                                    <td><?=$impressions?></td> 
                                                    <td><?=$views?></td>
                                                    <td><?=$ctr?>%</td>
                                                    <td><?=$resumes?></td>
                                                    <td>
                                                    <?php
                                                        if($isactive>0){
                                                           echo"<span class='text-success'><i class='fa fa-check'></i></span>";
                                                        }
                                                    ?>
                                                    </td>
                                                </tr>
                                            <?php
                                            }
                                            ?>
                                                
                                            </tbody>
                                        </table>
                                     <div class="pull-right">
                                            <span class="jobcardbuttons h4weight"><a class="blog-post-share " href='employer-stats.php' data-employer="employer"  title="View Job"><i class="material-icons" >visibility</i> View All</a></span>
                                     </div>
                                      </div> 
                                                        </div>

                                                    </div>
                                             </div>
                                    </div>
                                
                                </div>
                          
		                </div>
					</div>
	            </div>                         
                    </div>
                    
                    
                <div class="col-md-3 pull-right">
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
                    <div class="copyright">
                        &copy; jobsly 2016
                    </div>
                </div>
	        </div>
	    </footer>

	</div>
    
</body>

	
    <script>
    var isClosed = true;
function openNav() {
    if(isClosed){
        document.getElementById("mySidenav").style.width = "200px";
        document.getElementById("main").style.marginLeft = "200px";
        isClosed = false;
    } else{
        closeNav();
    }
}

function closeNav() {
  
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("main").style.marginLeft= "0";
    isClosed = true;
}

$(document).ready(function() {
    // Optimalisation: Store the references outside the event handler:
    $('#loader').hide();
    var $window = $(window);

    function checkWidth() {
        var windowsize = $window.width();
        if (windowsize >= 768) {
          openNav();
        }
        if(windowsize < 768){
            closeNav();
        }
    }
    // Execute on load
    checkWidth();
    // Bind event listener
    $(window).resize(checkWidth);
});        
</script>

</html>
<?php
} else{
    include 'logout.php';
    
}
?>