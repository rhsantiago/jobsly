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
    <script src="js/resume.js" type="text/javascript"></script>
    <script src="js/summernote.min.js" type="text/javascript"></script> 
    <script src="js/parsley.js"></script>
</head>

<body class="landing-page">
    <!-- Modal -->
	<div class="modal fullscreen-modal fade" id="workexp-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog modal-lg" role="document">
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
                    <li class="dropdown active"><a href="main.php" class="dropdown-toggle" data-toggle="dropdown" id="pinfo"><i class="material-icons">next_week</i>&nbsp;Applications<b class="caret"></b></a>
                         <ul class="dropdown-menu">
                                    <li><a href="main.php?ajax=aapp" id="aapp"><i class="material-icons">star</i>&nbsp;Active Applications</a></li>
                                    <li><a href="main.php?ajax=jinv" id="jinv"><i class="material-icons">drafts</i>&nbsp;Job Invitations</a></li> 
                                    <li><a href="main.php?ajax=sapp" id="sapp"><i class="material-icons">favorite</i>&nbsp;Saved Applications</a></li>
                                    <li><a href="main.php?ajax=ljob" id="ljob"><i class="material-icons">whatshot</i>&nbsp;Latest Job Matches</a></li> 
                         </ul> 
                    </li>
                    <li class="dropdown active"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="material-icons">description</i>&nbsp;Resume<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="#pinfo" id="pinfo"><i class="material-icons">fingerprint</i>&nbsp;Personal Information</a></li>
                            <li><a href="#workexp" id="workexp"><i class="material-icons">work</i>&nbsp;Work Experience</a></li>
                            <li><a href="#etrain" id="etrain"><i class="material-icons">school</i>&nbsp;Education &amp; Training</a></li>
                            <li><a href="#skills" id="skills"><i class="material-icons">build</i>&nbsp;Skills</a></li>
                            <li><a href="#ainfo" id="ainfo"><i class="material-icons">add_box</i>&nbsp;Additional Information</a></li>
                            <li><a href="#pres" id="pres"><i class="material-icons">pageview</i>&nbsp;Preview Resume</a></li>
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
                        <div class="row-fluid">
                    
                          
                        </div>
                        
                </div>
            </div>
            </div>
        </div>

    <!--sidebar-->
   <div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
   <div class="sidebar-item dropdown active"><a href="main.php" class="dropdown-toggle" data-toggle="dropdown" id="pinfo"><i class="material-icons">next_week</i>&nbsp;Applications<b class="caret"></b></a>
            <ul class="dropdown-menu">
                                    <li><a href="main.php?ajax=aapp" id="aapp"><i class="material-icons">star</i>&nbsp;Active Applications</a></li>
                                    <li><a href="main.php?ajax=jinv" id="jinv"><i class="material-icons">drafts</i>&nbsp;Job Invitations</a></li> 
                                    <li><a href="main.php?ajax=sapp" id="sapp"><i class="material-icons">favorite</i>&nbsp;Saved Applications</a></li>
                                    <li><a href="main.php?ajax=ljob" id="ljob"><i class="material-icons">whatshot</i>&nbsp;Latest Job Matches</a></li>  
                         </ul> 
    </div>
   <div class="sidebar-item dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="resume.php"><i class="material-icons">description</i>&nbsp;Resume<b class="caret"></b></a>
    <ul class="dropdown-menu">
                            <li><a href="#pinfo" id="pinfo"><i class="material-icons">fingerprint</i>&nbsp;Personal Information</a></li>
                            <li><a href="#workexp" id="workexp"><i class="material-icons">work</i>&nbsp;Work Experience</a></li>
                            <li><a href="#etrain" id="etrain"><i class="material-icons">school</i>&nbsp;Education &amp; Training</a></li>
                            <li><a href="#skills" id="skills"><i class="material-icons">build</i>&nbsp;Skills</a></li>
                            <li><a href="#ainfo" id="ainfo"><i class="material-icons">add_box</i>&nbsp;Additional Information</a></li>
                            <li><a href="#pres" id="pres"><i class="material-icons">pageview</i>&nbsp;Preview Resume</a></li>
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
    if($ajax=='pinfo'){
         include 'pinfo-form.php';
    ?>
    <script>jQuery(document).ready(function ($) {$('#resumesb li').removeClass('active');$('#resumesb #p1').addClass('active');});</script>
    <?php
    }
    if($ajax=='workexp'){
         include 'wexp-form.php';
    ?>    
        <script>jQuery(document).ready(function ($) {$('#resumesb li').removeClass('active');$('#resumesb #w2').addClass('active');});</script>
    <?php        
    }
    if($ajax=='etrain'){
         include 'etrain-form.php'; 
    ?>    
        <script>jQuery(document).ready(function ($) {$('#resumesb li').removeClass('active');$('#resumesb #e3').addClass('active');});</script>
    <?php                    
    }
    if($ajax=='skills'){
         include 'skills-form.php';
    ?>
          <script>jQuery(document).ready(function ($) {$('#resumesb li').removeClass('active');$('#resumesb #s4').addClass('active');});</script>   
    <?php
    }
    if($ajax=='ainfo'){
         include 'ainfo-form.php';
    ?>
          <script>jQuery(document).ready(function ($) {$('#resumesb li').removeClass('active');$('#resumesb #a5').addClass('active');});</script>   
    <?php
    }
    if($ajax=='pres'){
         include 'previewresume.php';
    ?>
          <script>jQuery(document).ready(function ($) {$('#resumesb li').removeClass('active');$('#resumesb #p6').addClass('active');});</script>   
    <?php
    }
    ?>
   
                        
                        
                      
                </div> <!--resume main body-->        
                <!--
		    	<div class="section text-center section-landing">
	                <div class="row">
	                    <div class="col-md-8 col-md-offset-2">
	                        <h2 class="title">Let's talk product</h2> <span onclick="openNav()">open</span>
	                        <h5 class="description">This is the paragraph where you can write more details about your product. Keep you user engaged by providing meaningful information. Remember that by this time, the user is curious, otherwise he wouldn't scroll to get here. Add a button if you want the user to see more.</h5>
	                    </div>
	                </div>

					<div class="features">
						<div class="row">
		                    <div class="col-md-4 col-xs-4">
								<div class="info">
									<div class="icon icon-primary">
										<i class="material-icons">chat</i>
									</div>
									<h4 class="info-title">First Feature</h4>
									<p>Divide details about your product or agency work into parts. Write a few lines about each one. A paragraph describing a feature will be enough.</p>
								</div>
		                    </div>
		                    <div class="col-md-4 col-xs-4">
								<div class="info">
									<div class="icon icon-success">
										<i class="material-icons">verified_user</i>
									</div>
									<h4 class="info-title">Second Feature</h4>
									<p>Divide details about your product or agency work into parts. Write a few lines about each one. A paragraph describing a feature will be enough.</p>
								</div>
		                    </div>
		                    <div class="col-md-4 col-xs-4">
								<div class="info nofloat">
									<div class="icon icon-danger">
										<i class="material-icons">fingerprint</i>
									</div>
									<h4 class="info-title">Third Feature</h4>
									<p>Divide details about your product or agency work into parts. Write a few lines about each one. A paragraph describing a feature will be enough.</p>
								</div>
		                    </div>
		                </div>
					</div>
	            </div>
                
	        	<div class="section text-center">
	                <h2 class="title">Here is our team</h2>

					<div class="team">
						<div class="row-fluid">
							<div class="col-md-4">
			                    <div class="team-player">
			                        <img src="../assets/img/avatar.jpg" alt="Thumbnail Image" class="img-raised img-circle">
			                        <h4 class="title">Gigi Hadid <br />
										<small class="text-muted">Model</small>
									</h4>
			                        <p class="description">You can write here details about one of your team members. You can give more details about what they do. Feel free to add some <a href="#">links</a> for people to be able to follow them outside the site.</p>
									<a href="#pablo" class="btn btn-simple btn-just-icon"><i class="fa fa-twitter"></i></a>
									<a href="#pablo" class="btn btn-simple btn-just-icon"><i class="fa fa-instagram"></i></a>
									<a href="#pablo" class="btn btn-simple btn-just-icon btn-default"><i class="fa fa-facebook-square"></i></a>
			                    </div>
			                </div>
			                <div class="col-md-4">
			                    <div class="team-player">
			                        <img src="../assets/img/christian.jpg" alt="Thumbnail Image" class="img-raised img-circle">
			                        <h4 class="title">Christian Louboutin<br />
										<small class="text-muted">Designer</small>
									</h4>
			                        <p class="description">You can write here details about one of your team members. You can give more details about what they do. Feel free to add some <a href="#">links</a> for people to be able to follow them outside the site.</p>
									<a href="#pablo" class="btn btn-simple btn-just-icon"><i class="fa fa-twitter"></i></a>
									<a href="#pablo" class="btn btn-simple btn-just-icon"><i class="fa fa-linkedin"></i></a>
			                    </div>
			                </div>
			                <div class="col-md-4">
			                    <div class="team-player">
			                        <img src="../assets/img/kendall.jpg" alt="Thumbnail Image" class="img-raised img-circle">
			                        <h4 class="title">Kendall Jenner<br />
										<small class="text-muted">Model</small>
									</h4>
			                        <p>You can write here details about one of your team members. You can give more details about what they do. Feel free to add some <a href="#">links</a> for people to be able to follow them outside the site.</p>
									<a href="#pablo" class="btn btn-simple btn-just-icon"><i class="fa fa-google-plus"></i></a>
									<a href="#pablo" class="btn btn-simple btn-just-icon"><i class="fa fa-youtube-play"></i></a>
									<a href="#pablo" class="btn btn-simple btn-just-icon btn-default"><i class="fa fa-twitter"></i></a>
			                    </div>
			                </div>
						</div>
					</div>

	            </div> -->
                
                <!--
	        	<div class="section landing-section">
	                <div class="row">
	                    <div class="col-md-8 col-md-offset-2">
	                        <h2 class="text-center title">Work with us</h2>
							<h4 class="text-center description">Divide details about your product or agency work into parts. Write a few lines about each one and contact us about any further collaboration. We will responde get back to you in a couple of hours.</h4>
	                        <form class="contact-form">
	                            <div class="row">
	                                <div class="col-md-6">
										<div class="form-group label-floating">
											<label class="control-label">Your Name</label>
											<input type="text" class="form-control">
										</div>
	                                </div>
	                                <div class="col-md-6">
										<div class="form-group label-floating">
											<label class="control-label">Your Email</label>
											<input type="email" class="form-control">
										</div>
	                                </div>
	                            </div>

								<div class="form-group label-floating">
									<label class="control-label">Your Messge</label>
									<textarea class="form-control" rows="4"></textarea>
								</div>

	                            <div class="row">
	                                <div class="col-md-4 col-md-offset-4 text-center">
	                                    <button class="btn btn-primary btn-raised">
											Send Message
										</button>
	                                </div>
	                            </div>
	                        </form>
	                    </div>
	                </div>

	            </div> -->
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
        
      openNav();
</script>

</html>
<?php
} else{
    include 'logout.php';
    
}
?>