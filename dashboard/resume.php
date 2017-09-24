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
    $ajax = $_GET['ajax'];
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
})(window,document,'script','dataLayer','GTM-MKMGLRW');
</script>
<!-- End Google Tag Manager -->    
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="img/favicon.ico">
	<link rel="icon" href="img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Job Search | Online Resume | jobsly</title>
 	<meta name="description" content="   " />
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
   <!-- <script src="js/summernote-cleaner.js"></script> -->
    <script src="js/parsley.js"></script>
</head>

<body class="landing-page">
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MKMGLRW"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->    
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
    
    <div class="modal fullscreen-modal fade" id="skills-modal-del" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content modalcontent">
	      
	    </div>
	  </div>
	</div>
    
    <div class="modal fullscreen-modal fade" id="photo-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <form role="form"  action="uploadphoto-submit.php" method="post" enctype="multipart/form-data">         
            <input type="hidden" id="userid" name="userid" value="<?=$userid?>">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content modalcontent">
	        <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title text-primary h4weight" id="myModalLabel">Upload Picture</h4>
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
                        <li class="divider"></li>
		            <li><a href="logout.php" id="logout"><i class="material-icons">do_not_disturb</i>Sign Out</a></li>
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
                     <li>
                            <a onclick="openNav()"><i class="material-icons">dashboard</i></a>
                    </li>
                    <li><a href="jobseeker-home.php" id="home"><i class="material-icons">home</i>Home</a></li>
                    <li><a href="jobseeker-latestjobs.php"><i class="material-icons">whatshot</i>&nbsp;Latest Job Matches</a></li>
                    <li class="dropdown active"><a href="main.php" class="dropdown-toggle" data-toggle="dropdown" id="pinfo"><i class="material-icons">next_week</i>&nbsp;Applications<b class="caret"></b></a>
                         <ul class="dropdown-menu">
                                    <li><a href="main.php?ajax=aapp" id="aapp"><i class="material-icons">star</i>&nbsp;Active Applications</a></li>
                                    <li><a href="main.php?ajax=jinv" id="jinv"><i class="material-icons">drafts</i>&nbsp;Job Invitations</a></li> 
                                    <li><a href="main.php?ajax=sapp" id="sapp"><i class="material-icons">favorite</i>&nbsp;Saved Applications</a></li>                                    
                         </ul> 
                    </li>
                    <li class="dropdown active"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="material-icons">description</i>&nbsp;Resume<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="#pinfo" id="pinfo"><i class="material-icons">fingerprint</i>&nbsp;Personal Information</a></li>
                            <li><a href="#workexp" id="workexp"><i class="material-icons">work</i>&nbsp;Work Experience</a></li>
                            <li><a href="#etrain" id="etrain"><i class="material-icons">school</i>&nbsp;Education &amp; Training</a></li>
                            <li><a href="#skills" id="skills"><i class="material-icons">build</i>&nbsp;Skills</a></li>
                            <li><a href="#ainfo" id="ainfo"><i class="material-icons">add_box</i>&nbsp;Additional Information</a></li>
                            <li><a target="_blank" href="previewresume.php" id="pres"><i class="material-icons">pageview</i>&nbsp;Preview Resume</a></li>
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
    <?php
            $database->query('select fname,lname from  personalinformation where personalinformation.userid=:userid');
            $database->bind(':userid', $userid);   
            try{
            $row = $database->single();
            }catch (PDOException $e) {
                $msg = $e->getTraceAsString()." ".$e->getMessage();
                $log->error($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
                die("");
            }     
           
            $fname = $row['fname'];
            $lname = $row['lname'];
    
            $database->query('select position as maxposition from workexperience where startdate = (select max(startdate) from workexperience where workexperience.userid=:userid)');
            $database->bind(':userid', $userid);   
            try{
            $row2 = $database->single();
            }catch (PDOException $e) {
                $msg = $e->getTraceAsString()." ".$e->getMessage();
                $log->error($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
                die("");
            }     
             $maxposition = $row2['maxposition'];
            
    
            $database->query('SELECT photo from useraccounts where id = :userid');
            $database->bind(':userid', $userid);   
            try{
                $row = $database->single();
            }catch (PDOException $e) {
                $msg = $e->getTraceAsString()." ".$e->getMessage();
                $log->error($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
                die("");
            } 
            $photo = $row['photo'];
            if(empty($photo)){
                $photo='img/unknown.png';
            }
    
      
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
    <div class="sidebar-item"><a href="jobseeker-latestjobs.php"><i class="material-icons">whatshot</i>&nbsp;Latest Jobs</a></div>   
   <div class="sidebar-item dropdown active"><a href="main.php" class="dropdown-toggle" data-toggle="dropdown" id="pinfo"><i class="material-icons">next_week</i>&nbsp;Applications<b class="caret"></b></a>
            <ul class="dropdown-menu">
                                    <li><a href="main.php?ajax=aapp" id="aapp"><i class="material-icons">star</i>&nbsp;Active Applications</a></li>
                                    <li><a href="main.php?ajax=jinv" id="jinv"><i class="material-icons">drafts</i>&nbsp;Job Invitations</a></li> 
                                    <li><a href="main.php?ajax=sapp" id="sapp"><i class="material-icons">favorite</i>&nbsp;Saved Applications</a></li>
                         </ul> 
    </div>
   <div class="sidebar-item dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="resume.php"><i class="material-icons">description</i>&nbsp;Resume<b class="caret"></b></a>
    <ul class="dropdown-menu">
                            <li><a href="#pinfo" id="pinfo"><i class="material-icons">fingerprint</i>&nbsp;Personal Info</a></li>
                            <li><a href="#workexp" id="workexp"><i class="material-icons">work</i>&nbsp;Work Experience</a></li>
                            <li><a href="#etrain" id="etrain"><i class="material-icons">school</i>&nbsp;Education</a></li>
                            <li><a href="#skills" id="skills"><i class="material-icons">build</i>&nbsp;Skills</a></li>
                            <li><a href="#ainfo" id="ainfo"><i class="material-icons">add_box</i>&nbsp;Additional Info</a></li>
                            <li><a target="_blank" href="previewresume.php" id=""><i class="material-icons">pageview</i>&nbsp;Preview Resume</a></li>
                        </ul>
    </div>
  
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
function ChangeUrl(title, url) {
    if (typeof (history.pushState) != "undefined") {
        var obj = { Title: title, Url: url };
        history.pushState(obj, obj.Title, obj.Url);
    } else {
        alert("Browser does not support HTML5.");
    }
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