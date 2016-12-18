<?php
session_start();
if(isset($_SESSION['user'])){
   $user = $_SESSION['user'];
   $password = $_SESSION['password'];
   $userid = $_SESSION['userid'];
   $usertype = $_SESSION['usertype'];
    
   include 'authenticate.php';
}

if($ok == 1 ){
    $ajax = $_GET['ajax'];
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
    <link href="css/summernote.css" rel="stylesheet"/>

    
    <script src="js/jquery.min.js" type="text/javascript"></script>
	<script src="js/bootstrap.min.js" type="text/javascript"></script>
	<script src="js/material.min.js"></script>

	<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
	<script src="js/nouislider.min.js" type="text/javascript"></script>

	<!--  Plugin for the Datepicker, full documentation here: http://www.eyecon.ro/bootstrap-datepicker/ -->
	<script src="js/bootstrap-datepicker.js" type="text/javascript"></script> 

	<!-- Control Center for Material Kit: activating the ripples, parallax effects, scripts from the example pages etc -->
	<script src="js/material-kit.js" type="text/javascript"></script>
    <script src="js/employer-jobads.js" type="text/javascript"></script>
    <script src="js/summernote.min.js" type="text/javascript"></script> 
    <script src="js/parsley.js"></script>
</head>

<body class="landing-page">
    <!-- Modal -->
	<div class="modal fullscreen-modal fade" id="workexp-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content modalcontent">
	      
	    </div>
	  </div>
	</div>
    
    <div class="modal fullscreen-modal fade" id="workexp-modal-del" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
        		<ul class="nav navbar-nav navbar-left">
                     <li>
                            <a onclick="openNav()"><i class="material-icons">dashboard</i></a>
                    </li>
                    <li class="dropdown active"><a href="main.php" class="dropdown-toggle" data-toggle="dropdown" id="pinfo"><i class="material-icons">details</i>Start<b class="caret"></b></a>
                         <ul class="dropdown-menu">
                                    <li><a href="main.php" id="aapp"><i class="material-icons">visibility</i>Active Applications</a></li>
                                    <li><a href="#" id="jinv"><i class="material-icons">drafts</i>Job Invitations</a></li> 
                                    <li><a href="#" id="sapp"><i class="material-icons">favorite</i>Saved Applications</a></li>
                                    <li><a href="#" id="ljob"><i class="material-icons">whatshot</i>Latest Job Matches</a></li>
                         </ul> 
                    </li>
                    <li class="dropdown active"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="material-icons">assessment</i>Resume<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="#pinfo" id="pinfo"><i class="material-icons">fingerprint</i>Personal Information</a></li>
                            <li><a href="#workexp" id="workexp"><i class="material-icons">work</i>Work Experience</a></li>
                            <li><a href="#etrain" id="etrain"><i class="material-icons">school</i>Education &amp; Training</a></li>
                            <li><a href="#skills" id="skills"><i class="material-icons">build</i>Skills</a></li>
                            <li><a href="#ainfo" id="ainfo"><i class="material-icons">add_box</i>Additional Information</a></li>
                            <li><a href="#pres" id="pres"><i class="material-icons">pageview</i>Preview Resume</a></li>
                        </ul>    
                    </li>
    				
                </ul>
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
        	</div>
    	</div>
    </nav>


     <div class="header header-filter purple-header">
            <div class="container">
                <div class="row-fluid">
					<div class="col-md-11 margin-top-title col-md-offset-1">
                        <div class="row-fluid">
                            
                            <div id="resumesb" class="">                               
                                <ul class="nav nav-pills nav-pills-info" id="mynav" data-tabs="tabs" role="tablist">
                                    <li id="p1" class="active">
                                      
                                        <a href="#pinfo"  role="tab"  data-toggle="tab" data-container="body">
                                            <i class="material-icons">fingerprint</i>
                                            <span class="submenufont">My Job Ads</span>
                                        </a>
                                        
                                    </li>
                                    <li id="p2">                                                                     
                                        <a href="#pjobad" role="tab" data-toggle="tab" data-container="body">
                                            <i class="material-icons">work</i>
                                            <span class="submenufont">Post a Job Ad</span>
                                        </a>
                                    </li>
                                    <li id="e3">
                                        <a href="#etrain"  role="tab" data-toggle="tab" data-container="body">
                                            <i class="material-icons">content_copy</i>
                                            <span class="submenufont">Job Templates</span>
                                        </a>
                                    </li>
                                    <li id="s4">
                                        <a href="#skills" role="tab" data-toggle="tab" data-container="body">
                                            <i class="material-icons">mode_edit</i>
                                            <span class="submenufont">Essays</span>
                                        </a>                                        
                                    </li>                                   
                                </ul>
                            </div>
                                                
	                 </div>
                </div>
            </div>
            </div>
        </div>
    
    <!--sidebar-->
 <div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
   <div class="sidebar-item dropdown active"><a href="employer-main.php" class="dropdown-toggle" data-toggle="dropdown" id="pinfo"><i class="material-icons">details</i>&nbsp;Home<b class="caret"></b></a>
            <ul class="dropdown-menu">
                                    <li><a href="#" id="short"><i class="material-icons">people</i>&nbsp;Shortlist</a></li>
                                    <li><a href="#" id="ajposts"><i class="material-icons">flag</i>&nbsp;Active Job Posts</a></li> 
                                    <li><a href="#" id="napp"><i class="material-icons">new_releases</i>&nbsp;New Applicants</a></li>
                                    <li><a href="#" id="search"><i class="material-icons">find_in_page</i>&nbsp;Search</a></li>
                                    <li><a href="#" id="cinfo"><i class="material-icons">info</i>&nbsp;Company Info</a></li>
                         </ul> 
    </div>
   <div class="sidebar-item dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="employer-jobads.php"><i class="material-icons">assessment</i>&nbsp;Job Ads<b class="caret"></b></a>
    <ul class="dropdown-menu">
                            <li><a href="#ajads" id="ajads"><i class="material-icons">list</i>&nbsp;My Job Ads</a></li>
                            <li><a href="#pjobad" id="pjobad"><i class="material-icons">work</i>&nbsp;Post a Job Ad</a></li>
                            <li><a href="#jtemp" id="jtemp"><i class="material-icons">content_copy</i>&nbsp;Job Templates</a></li>
                            <li><a href="#essays" id="essays"><i class="material-icons">mode_edit</i>&nbsp;Essays</a></li>
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
                        
                        
    <?php
    if($ajax=='ajads'){
         include 'postajob-form.php';
    ?>
    <script>jQuery(document).ready(function ($) {$('#resumesb li').removeClass('active');$('#resumesb #p1').addClass('active');});</script>
    <?php
    }
    if($ajax=='pjobad'){
         include 'selecttemplate-form.php';
    ?>    
        <script>jQuery(document).ready(function ($) {$('#resumesb li').removeClass('active');$('#resumesb #p2').addClass('active');});</script>
    <?php        
    }
    if($ajax=='jtemp'){
         include 'etrain-form.php'; 
    ?>    
        <script>jQuery(document).ready(function ($) {$('#resumesb li').removeClass('active');$('#resumesb #e3').addClass('active');});</script>
    <?php                    
    }
    if($ajax=='essays'){
         include 'skills-form.php';
    ?>
          <script>jQuery(document).ready(function ($) {$('#resumesb li').removeClass('active');$('#resumesb #s4').addClass('active');});</script>   
    <?php
    }   
    ?>
   
                        
                        
                      
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
        
      
</script>

</html>
<?php
} else{
    include 'logout.php';
    
}
?>