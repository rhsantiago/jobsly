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
    $msg = "logged in";
    $log->info($logtimestamp." - ".$_SESSION['user'] . " " .$msg);
    include 'specialization.php';
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
               <i onclick="openNav()" class="leftofnavheader material-icons">menu</i>
        		<a class="navbar-brand logo" >jobsly</a>
        	</div>

        	<div class="collapse navbar-collapse" id="navigation-example">
                
                <ul class="nav navbar-nav navbar-right">
                        <li class="divider"></li>
		            <li><a href="logout.php" id="logout"><i class="material-icons">do_not_disturb</i>Sign Out</a></li>
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
        		</ul>
        		<ul class="nav navbar-nav navbar-right">
                     <li>
                            <a onclick="openNav()"><i class="material-icons">dashboard</i></a>
                    </li>
                    <li><a href="jobseeker-home.php" id="home"><i class="material-icons">home</i>Home</a></li>
                    <li class="dropdown active"><a href="main.php" class="dropdown-toggle" data-toggle="dropdown" id="pinfo"><i class="material-icons">next_week</i>&nbsp;Applications<b class="caret"></b></a>
                         <ul class="dropdown-menu">
                                    <li><a href="#aapp" id="aapp"><i class="material-icons">star</i>&nbsp;Active Applications</a></li>
                                    <li><a href="#jinv" id="jinv"><i class="material-icons">drafts</i>&nbsp;Job Invitations</a></li> 
                                    <li><a href="#sapp" id="sapp"><i class="material-icons">favorite</i>&nbsp;Saved Applications</a></li>
                                    <li><a href="#ljob" id="ljob"><i class="material-icons">whatshot</i>&nbsp;Latest Job Matches</a></li>
                         </ul> 
                    </li>
                    <li class="dropdown active"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="material-icons">description</i> Resume<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                           <li><a href="resume.php?ajax=pinfo" id="pinfo"><i class="material-icons">fingerprint</i>&nbsp;Personal Information</a></li>
                            <li><a href="resume.php?ajax=workexp" id="workexp"><i class="material-icons">work</i>&nbsp;Work Experience</a></li>
                            <li><a href="resume.php?ajax=etrain" id="etrain"><i class="material-icons">school</i>&nbsp;Education &amp; Training</a></li>
                            <li><a href="resume.php?ajax=skills" id="skills"><i class="material-icons">build</i>&nbsp;Skills</a></li>
                            <li><a href="resume.php?ajax=ainfo" id="ainfo"><i class="material-icons">add_box</i>&nbsp;Additional Information</a></li>
                            <li><a href="resume.php?ajax=pres" id="pres"><i class="material-icons">pageview</i>&nbsp;Preview Resume</a></li>
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
    <!--sidebar-->
   <?php
            $database->query('select position as maxposition,fname,lname,mnumber,myemail,photo,esalary,specialization from workexperience, personalinformation,useraccounts,additionalinformation where personalinformation.userid=:userid and startdate = (select max(startdate) from workexperience where workexperience.userid=:userid) and useraccounts.id=:userid and additionalinformation.userid=:userid');
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
            $mnumber = $row['mnumber'];
            $myemail = $row['myemail'];
            $esalary = $row['esalary'];
            $specialization = $row['specialization'];
            $photo = $row['photo'];
      
    ?>
    <!--sidebar-->
   <div id="mySidenav" class="sidenav">
  <!--<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>-->
       <div class="center sidenavmargin">
                                <div class="avatar center">
                                        <img src="<?=$photo?>" alt="Circle Image" width="100" height="100" class="img-circle img-responsive img-raised center">
                                    </div>
                                    <div class="name">
                                        <h4 class="sidenavname"><?=$fname?>&nbsp;<?=$lname?></h4>
                                        <h5 class="sidenavposition"><?=$maxposition?></h5>
                                    </div>  
       </div>
    <div class="sidebar-item"><a href="jobseeker-home.php"><i class="material-icons">home</i>&nbsp;Home</a></div>   
   <div class="sidebar-item dropdown"><a href="main.php" class="dropdown-toggle" data-toggle="dropdown" id="pinfo"><i class="material-icons">next_week</i>&nbsp;Applications<b class="caret"></b></a>
            <ul class="dropdown-menu">
                                    <li><a href="#aapp" id="aapp"><i class="material-icons">star</i>&nbsp;Active Applications</a></li>
                                    <li><a href="#jinv" id="jinv"><i class="material-icons">drafts</i>&nbsp;Job Invitations</a></li> 
                                    <li><a href="#sapp" id="sapp"><i class="material-icons">favorite</i>&nbsp;Saved Applications</a></li>
                                    <li><a href="#ljob" id="ljob"><i class="material-icons">whatshot</i>&nbsp;Latest Job Matches</a></li>
                         </ul> 
    </div>
   <div class="sidebar-item dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="resume.php"><i class="material-icons">description</i> Resume<b class="caret"></b></a>
    <ul class="dropdown-menu">
                            <li><a href="resume.php?ajax=pinfo" id="pinfo"><i class="material-icons">fingerprint</i>&nbsp;Personal Info</a></li>
                            <li><a href="resume.php?ajax=workexp" id="workexp"><i class="material-icons">work</i>&nbsp;Work Experience</a></li>
                            <li><a href="resume.php?ajax=etrain" id="etrain"><i class="material-icons">school</i>&nbsp;Education</a></li>
                            <li><a href="resume.php?ajax=skills" id="skills"><i class="material-icons">build</i>&nbsp;Skills</a></li>
                            <li><a href="resume.php?ajax=ainfo" id="ainfo"><i class="material-icons">add_box</i>&nbsp;Additional Info</a></li>
                            <li><a href="resume.php?ajax=pres" id="pres"><i class="material-icons">pageview</i>&nbsp;Preview Resume</a></li>
                        </ul>
    </div>
   <div class="sidebar-item"><a href="#">Jobs</a></div>
   <div class="sidebar-item"><a href="#">Settings</a></div>
   
</div>
    
     <!--sidebar-->
    <div id="main" class="wrapper ">
       

		<div class="main main-raised ">
         
			<div class="container-fluid"> <!-- with fluid for full width -->
                <div class="row-fluid">   <!-- with fluid for full width -->
                    
                    <div id="resume-main-body">                       
      <div class="row">
            <div class="col-md-12 center">            
               <div class="adstop"><img  src="https://lh5.ggpht.com/NFYFP2H9CCP50vAQNLa7AtCj_mbbYmOzY978fZqd31oL5qOdvXgxU3KW8ek2VgvIOvTqWY0=w728" 
                                         alt="user">  
                </div>    
             </div>
            <div class="col-md-12">
                  <h2 class="title">Home</h2>
            </div>
     </div>
                        
<div class="col-md-9">
                       
                <div class="section  section-landing">
	                 

					<div class="features">
						<div class="row">
                                                     
                            <div class="col-md-6">
                       
                                
                                <section class="blog-post">
                                    <div class="panel panel-default">
                                    
                                      <div class="panel-body">                                        
                                     
                                        <div class="blog-post-content">
                                            
                         <div class="row-fluid">
                           <div class="col-md-12">                                                    
                                <div align="left">
                                    <div class="avatar">
                                        <img src="<?=$photo?>" alt="Circle Image" width="120" height="120" class="img-circle img-responsive img-raised center">
                                    </div>
                                    <div class="name center">
                                        <h4 class="homename text-info"><?=$fname?>&nbsp;<?=$lname?></h4>
                                        <h5 class="homepos text-info"><?=$maxposition?></h5>
                                    </div>  
                                 </div>
                            </div>  
                                                
                          </div>    <!--                              
                                         <div class="row-fluid">
                                               
                                                <div class="col-md-12 actionicon pull-right">
                                                        <a class="blog-post-share " href="#cinfo" id="cinfo" data-jobid="<?=$id?>" data-toggle="tooltip" data-placement="top" title="Edit"><i class="material-icons" >edit</i> Edit</a>
                                                       
                                                </div>
                                          </div> 
                                      
                                       -->   
                                       </div>
                                    </div>
                                    </div>
                                </section>
                            </div>  
                            <div class="col-md-6">
                       
                                
                                <section class="blog-post">
                                    <div class="panel panel-default">
                                    
                                      <div class="panel-body">                                        
                                     
                                        <div class="blog-post-content">
                                            
                                            <div class="row-fluid">
                                                <div class="col-md-12 jobad-titletopmargin">
                                                    <div class="hometopmargin40">
                                                            Expected Salary: <span class="text-info"><b><?=$esalary?></b></span><br>
                                                            Specialization: <span class="text-info"><b><?=$specarray[$specialization]?></b></span><br>
                                                            Email: <span class="text-info"><b><?=$myemail?></b></span><br>  
                                                            Mobile Num: <span class="text-info"><b><?=$mnumber?></b></span><br>
                                                        
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
                                                        <a class="blog-post-share " href="resume.php?ajax=ainfo" id="ainfo"  title="Edit"><i class="material-icons" >edit</i> Edit</a>
                                                       
                                                </div>
                                          </div> 
                                      
                                      </div>
                                        
                                        
                                    </div>
                                  </section>
                                 
                            </div>  
                     <?php
                            $database->query('select count(id) as totaapps from jobapplications where userid=:userid and isreject = 0');
                            $database->bind(':userid', $userid);
                            try{
                                $row = $database->single();
                            }catch (PDOException $e) {
                                $msg = $e->getTraceAsString()." ".$e->getMessage();
                                $log->error($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
                                die("");
                            }    
                            $totaapps = $row['totaapps'];
    
                            $database->query('SELECT count(jobinvitations.id) as totinvites from jobinvitations where userid=:userid');
                            $database->bind(':userid', $userid);
                            try{    
                                $row = $database->single();
                            }catch (PDOException $e) {
                                $msg = $e->getTraceAsString()." ".$e->getMessage();
                                $log->error($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
                                die("");
                            }     
                            $totinvites = $row['totinvites'];
    
                            $database->query('SELECT count(savedapplications.id) as totsaved from savedapplications where userid=:userid');
                            $database->bind(':userid', $userid);
                            try{    
                                $row = $database->single();
                            }catch (PDOException $e) {
                                $msg = $e->getTraceAsString()." ".$e->getMessage();
                                $log->error($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
                                die("");
                            }     
                            $totsaved = $row['totsaved'];
    
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
                                
                                
                                
                               <div class="row-fluid">
                                   <div class="col-lg-12"> 
                            <div class="col-lg-3 col-md-3"> 
                                    <div  class="card card-stats leftmargin10" >
                                        <div class="card-header cardmargin" data-background-color="purple">
                                            <h3 class="center marginjobdetaillink"><a href="#aapp" id="aapp" class="text-primary h4weight pull-right"><span id="aappsdiv"><?=$totaapps?></span></a></h3>
                                        </div>
                                      <a href="#aapp" id="aapp" class="text-primary h4weight pull-left  marginjobdetaillink">Total Active<br>Applications</a>
                                        
                                    </div>
						      </div>
                            <div class="col-lg-3 col-md-3"> 
                                    <div  class="card card-stats">
                                        <div class="card-header cardmargin" data-background-color="blue">
                                            <h3 class="center marginjobdetaillink"><a href="#jinv" id="jinv" class="text-primary h4weight pull-right"><span id="nappsdiv"><?=$totinvites?></span></a></h3>
                                        </div>                                        
                                            <a href="#jinv" id="jinv" class="text-info h4weight pull-right marginjobdetaillink">Total Job<br>Invitations</a>
                                    </div>                                  
						    </div>
                                <div class="col-lg-3 col-md-3"> 
                                     <div  class="card card-stats">
                                        <div class="card-header cardmargin" data-background-color="green">
                                            <h3 class="center marginjobdetaillink"><a href="#sapp" id="sapp" class="text-success h4weight pull-right"><span id="shortlistdiv"><?=$totsaved?></span></a></h3>
                                        </div>
                                            <a href="#sapp" id="sapp" class="text-success h4weight pull-right marginjobdetaillink">Total Saved<br>Applications</a>		
                                    </div>   
						      </div>
                               <div class="col-lg-3 col-md-3"> 
                                     <div  class="card card-stats rightmargin15">
                                        <div class="card-header cardmargin" data-background-color="orange">
                                            <h3 class="center marginjobdetaillink"><a href="#ajposts" id="ajposts" class="text-success h4weight pull-right" ><span id="shortlistdiv">0</span></a></h3>
                                        </div>
                                            <a href="#ajposts" id="ajposts" class="text-warning h4weight pull-right marginjobdetaillink">Total Active<br>Applicants</a>		
                                    </div>   
						      </div>
                                   </div>
                            </div>
                            <div class="col-md-12">
                                <section class="blog-post">
                                    <div class="panel panel-default">                                    
                                      <div class="panel-body jobad-bottomborder">
                                          <div><h4 class="text-info h4weight">Job Ad Performance</h4></div>
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
                                                    $ctr = $views/$impressions;
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
                                                    <td><?=$ctr?></td>
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
                                            <span class="jobcardbuttons h4weight"><a class="blog-post-share " href='#' data-employer="employer"  title="View Job"><i class="material-icons" >visibility</i> View All</a></span>
                                     </div>
                                      </div>  
                                </div>
                                    </div>
                                  </section>
                                
                                </div>
                                <div class="col-md-6">
                                    <?php
                                        include "employer-home-ctrchart.php";
                                    ?>
                                </div>
                                <div class="col-md-6">
                                    
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
                                    
                        
                </div> <!--resume main body-->        
               
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
  
    if(window.screen.width > 768){    
        openNav();
    }
</script>


</html>
<?php
} else{
    include 'logout.php';
    
}
?>