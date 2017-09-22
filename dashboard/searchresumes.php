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
    if(isset($_GET['ajax'])){ $ajax = $_GET['ajax']; }
     if(empty($ajax)){
         $ajax = 'ajposts';
     }
    date_default_timezone_set('Asia/Manila');
    $logtimestamp = date("Y-m-d H:i:s");
    include "serverlogconfig.php";
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

	<title>Resume Search | Hire the best employees | jobsly</title>
 	<meta name="description" content="Search our resume bank for jobseekers matching your qualifications, invite them to apply and view their resumes for free." />
 	<meta name="keywords" content="Jobs, Hiring, Career, Work, Resume, Call Center Jobs, Recruitment"/>


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
               <i onclick="openNav()" class="leftofnavheader material-icons">menu</i>
        		<a class="navbar-brand logo" >jobsly</a>
        	</div>

        	<div class="collapse navbar-collapse" id="navigation-example">
        		<ul class="nav navbar-nav navbar-right">
                    <!--
                     <li>
                            <a onclick="openNav()"><i class="material-icons">dashboard</i></a>
                    </li>
                    -->
                    <li><a href="employer-home.php" id="home"><i class="material-icons">home</i>Home</a></li>
                    <li><a href="searchresumes.php" id="home"><i class="material-icons">find_in_page</i>Resume&nbsp;Search</a></li>
                    <li class="dropdown active"><a href="employer-main.php" class="dropdown-toggle" data-toggle="dropdown" id="pinfo"><i class="material-icons">people</i>Applicants<b class="caret"></b></a>
                         <ul class="dropdown-menu">
                                    <li><a href="#ajposts" id="ajposts"><i class="material-icons">flag</i>&nbsp;By Job Ad</a></li>
                                    <li><a href="#short" id="short"><i class="material-icons">sort</i>&nbsp;Shortlist</a></li>  
                                    <li><a href="#napp" id="napp"><i class="material-icons">new_releases</i>&nbsp;New Applicants</a></li>
                         </ul>
                    </li>
                    <li class="dropdown active"><a href="employer-jobads.php" class="dropdown-toggle" data-toggle="dropdown"><i class="material-icons">work</i>Job Ads<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="employer-jobads.php?ajax=ajads" id="ajads"><i class="material-icons">list</i>&nbsp;My Job Ads</a></li>
                            <li><a href="employer-jobads.php?ajax=pjobad" id="pjobad"><i class="material-icons">note_add</i>&nbsp;Post a Job Ad</a></li>
                            <li><a href="employer-jobads.php?ajax=jtemp" id="jtemp"><i class="material-icons">content_copy</i>&nbsp;Job Templates</a></li>
                            <li><a href="employer-jobads.php?ajax=essays" id="essays"><i class="material-icons">mode_edit</i>&nbsp;Essays</a></li>
                        </ul>    
                    </li>
                    <li><a href="employer-stats.php" id="home"><i class="material-icons">assessment</i>Statistics</a></li>
                    <li class="divider"></li>
		            <li><a href="logout.php" id="logout"><i class="material-icons">do_not_disturb</i>Sign Out</a></li>
		                				
                </ul>    				
        	</div>
    	</div>
    </nav>



     <div class="header header-filter purple-header">
            <div class="container">
                <div class="row-fluid">
					<div class="col-md-11 margin-top-title col-md-offset-1">
                        <div class="row-fluid">
                            
                            <div id="resumesb" class="">  
                               
                            </div>
                            
                          
	                 </div>
                </div>
            </div>
            </div>
        </div>
     <!--sidebar-->
   <?php
            $database->query('select companyname,cperson,logo from companyinfo where userid=:userid');
            $database->bind(':userid', $userid);   
            try{
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
                                    <li><a href="employer-main.php?ajax=ajposts" id="ajposts"><i class="material-icons">flag</i>&nbsp;By Job Ad</a></li>
                                    <li><a href="employer-main.php?ajax=short" id="short"><i class="material-icons">sort</i>&nbsp;Shortlist</a></li>  
                                    <li><a href="employer-main.php?ajax=napp" id="napp"><i class="material-icons">new_releases</i>&nbsp;New Applicants</a></li>
                         </ul>
    </div>
   <div class="sidebar-item dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="employer-jobads.php"><i class="material-icons">work</i>&nbsp;Job Ads<b class="caret"></b></a>
    <ul class="dropdown-menu">
                            <li><a href="employer-jobads.php?ajax=ajads" id="ajads"><i class="material-icons">list</i>&nbsp;My Job Ads</a></li>
                            <li><a href="employer-jobads.php?ajax=pjobad" id="pjobad"><i class="material-icons">note_add</i>&nbsp;Post a Job Ad</a></li>
                            <li><a href="employer-jobads.php?ajax=jtemp" id="jtemp"><i class="material-icons">content_copy</i>&nbsp;Job Templates</a></li>
                            <li><a href="employer-jobads.php?ajax=essays" id="essays"><i class="material-icons">mode_edit</i>&nbsp;Essays</a></li>
    </ul>
    </div>
    <div class="sidebar-item"><a href="employer-stats.php"><i class="material-icons">assessment</i>&nbsp;Statistics</a></div>   
 
</div>
  
     <!--sidebar-->
    <div id="main" class="wrapper ">
       

		<div class="main main-raised ">
         
			<div class="container-fluid"> <!-- with fluid for full width -->
                <div class="row-fluid">   <!-- with fluid for full width -->
                    
                    <div id="resume-main-body"> 
<?php

$isjobseeker = '';

$months = array('Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec');
$positionlevels = array('Executive','Manager','Assistant Manager','Supervisor','5 Years+ Experienced Employee','1-4 Years Experienced Employee','1 Year Experienced Employee/Fresh Grad');
include 'specialization.php';   

$specializationsearch="";
$search = "";
$esalarypost=0;
$esalarysearch='';    
if(isset($_POST['search'])){ $search = $_POST['search']; }
if(isset($_POST['esalary'])){ $esalarypost = $_POST['esalary']; }
if(isset($_POST['specialization'])){ $specializationsearch = $_POST['specialization']; }    

if($esalarypost > 0){
    $esalarysearch = ' and esalary >= :esalary ';
}    

?>
<div class="row">
    <div class="col-md-12 center">
        <!--
                    <div class="adstop">     <img  src="https://lh5.ggpht.com/NFYFP2H9CCP50vAQNLa7AtCj_mbbYmOzY978fZqd31oL5qOdvXgxU3KW8ek2VgvIOvTqWY0=w728" 
                                 alt="user">
                     </div>
        -->
     </div>
     </div>
     <div class="col-md-9">
                <section class="blog-post">
                  <div class="panel panel-default" >
                      <form method="POST"  action="searchresumes.php" id="resume-search-form" name="resume-search-form">
                          <input type="hidden" id="userid" name="userid" value="<?=$userid?>">      
                       <div class="panel-body" >
                           <div class="col-md-12">
                               
                             <div id="searchdiv" class="form-group label-floating" >
                                  <label class="control-label">Search</label>
                                 
                                  <input type="text" id="search" name="search" value="<?=$search?>" class="form-control searchform">  
                             </div>
                            </div>
                            
                             <div class="collapse-group 
                                         <?php
                                            if($esalarypost<1 && empty($_POST['specialization'])){
                                                echo " collapse";
                                            }
                                         ?>
                                         " id="options" >
                                 <div class="col-md-6">
                                      <div id="esalarydiv" class="form-group label-floating">
                                      <label class="control-label">Min. Salary</label>
                                      <input type="text" id="esalary" name="esalary" 
                                             <?php
                                                 if($esalarypost>0){
                                                    echo " value='$esalarypost' ";
                                                 }
                                             ?>
                                             class="form-control searchform" >
                                     </div>
                                 </div>
                                 <div class="col-md-6"> 
                                        <div id="specializationdiv" class="form-group label-floating">
                                         <label class="control-label">Specialization</label>
                                         <select class="form-control searchform" id="specialization" name="specialization"  placeholder="Specialization" data-parsley-required>
                                             <option value='' selected ></option>
                                               <?php
                                               $i=0;
                                                foreach($specarray as $spec){
                                                    echo "<option value='$i' ";
                                                    if($specializationsearch==$i && !empty($_POST['specialization'])){
                                                        echo'selected';
                                                    } echo">$specarray[$i]</option>";
                                                    $i++;
                                                }
                                                ?>
                                          </select>
                                          </div>
                                 </div>
                             </div>
                           
                                <p style="z-index: 1; position: relative;">
                                     <a class="btn btn-default btn-sm" data-toggle="collapse" data-target="#options">Search Options</a>
                                     <button class="btn btn-primary btn-sm" type="submit">Search</button>
                             </p>
                             </div>
                            </form>
                  </div>
                </section>
                <div class="section  section-landing">
					<div class="features">
						<div class="row">
                            
                            <div class="col-md-12">
                                    <section class="blog-post">
                                    <div class="panel panel-default">
                                      <div class="panel-body jobad-bottomborder">
                                          <div><h4 class="text-info h4weight">Resume Bank</h4></div>
                                    <div class="table-responsive">
                                     <table class="table table-hover table-condensed">
                                            <thead>
                                                <tr>
                                                    <th>Latest Position</th>
                                                    <th class="col-md-2">Years of Experience</th>
                                                    <th class="col-md-2">Expected Salary</th>                                           
                                                    <th>Educational Attainment</th>
                                                    <th class="text-left">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                              
                                        <?php
                                            $database->query('Select distinct useraccounts.id, additionalinformation.esalary,yexp,colmajor from  useraccounts,additionalinformation, educationandtraining where 
                                            additionalinformation.userid=useraccounts.id 
                                            and educationandtraining.userid=useraccounts.id 
                                            and usertype=2 '.
                                            $esalarysearch
                                            .' order by esalary desc limit 0,10');
                                            if($esalarypost > 0){
                                               $database->bind(':esalary', $esalarypost); 
                                            }
                                            try{
                                                $rows2 = $database->resultset();
                                            }catch (PDOException $e) {
                                                $msg = $e->getTraceAsString()." ".$e->getMessage();
                                                $log->error($logtimestamp." - ".$_SESSION['user'] . " " .$msg);
                                                die("");
                                            }    
                                            foreach($rows2 as $row2){
                                                $applicantid = $row2['id']; 
                                                $colmajor = $row2['colmajor'];
                                                $esalary = $row2['esalary'];
                                                $yexp = $row2['yexp'];
                                                
                                                
                                                 $database->query('Select distinct workexperience.position from workexperience where 
                                            workexperience.startdate = (select max(startdate) from workexperience where workexperience.userid=:userid)');
                                                $database->bind(':userid', $applicantid);
                                                try{
                                                    $row3 = $database->single();
                                                }catch (PDOException $e) {
                                                    $msg = $e->getTraceAsString()." ".$e->getMessage();
                                                    $log->error($logtimestamp." - ".$_SESSION['user'] . " " .$msg);
                                                    die("");
                                                }
                                                $position = $row3['position'];
                                                
                                                
                                                if($applicantid==$userid){
                                       ?>
                                   
                                                <tr class="text-info">
                                        <?php
                                                }else{
                                        ?>            
                                                <tr>
                                        <?php
                                                }
                                        ?>        
                                                    <td>
                                                        <ul class="list-inline">
                                                            <li>
                                                                <span class="h4weight"><?=$position?></span>
                                                            </li>           
                                                        </ul>
                                                    </td>
                                                    <td><?=$yexp?></td>
                                                    <td>Php <?=$esalary?></td>
                                                    <td><?=$colmajor?></td>
                                                    <td class="td-actions ">
                                                        <ul class="list-inline">
                                                            <li>
                                                                <!-- ajax enabled
                                                                <a href="#viewresumemodal" data-applicantid="<?=$applicantid?>" data-userid="<?=$userid?>" data-jobid="<?=$jobid?>" data-view="shortlist" data-toggle="modal" data-target="#viewresume-modal" rel="tooltip" id="applicantview" title="View Profile" >
                                                                    <i class="fa fa-user fa-2x text-info"></i>
                                                                </a>
                                                                -->
                                                                <form method="post" action="viewinviteresume-newpage.php" id="resumeinvite-form<?=$applicantid?>" name="resumeinvite-form<?=$applicantid?>" target="_blank">
                                                                    <input type="hidden" id="userid" name="userid" value="<?=$userid?>">
                                                                    <input type="hidden" id="applicantid" name="applicantid" value="<?=$applicantid?>">
                                                                </form>
                                                                 <a href="#applicantview" target="_blank" rel="tooltip" id="applicantview" data-applicantid="<?=$applicantid?>" title="View Profile" >
                                                                    <i class="fa fa-user fa-2x text-info"></i>
                                                                </a>
                                                            </li>
                                                        
                                                        <li id='invited<?=$applicantid?>'>
                                                         <a href="#invitemodal" data-applicantid="<?=$applicantid?>" data-mode="insert" data-userid="<?=$userid?>" data-jobid="<?=$jobid?>" data-view="matched" data-toggle="modal" data-target="#invite-modal" rel="tooltip" id="inviteview" title="Invite to Apply" >
                                                            <i class="fa fa-envelope fa-2x text-warning"></i>
                                                          </a>
                                                        </li>
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
                                  </section>
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
                                <a target="_blank" href='https://www.facebook.com/jobsly.net'><i class="fa fa-facebook-square" aria-hidden="true"></i> </a>
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