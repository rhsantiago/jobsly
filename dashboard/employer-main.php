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
})(window,document,'script','dataLayer','GTM-MKMGLRW');
</script>
<!-- End Google Tag Manager -->

	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="img/favicon.ico">
	<link rel="icon" href="img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Job Ads | Manage Applicants | jobsly</title>
 	<meta name="description" content="View applications and manage new and shortlisted applicants" />
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

	<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
	<script src="js/nouislider.min.js" type="text/javascript"></script>

	<!--  Plugin for the Datepicker, full documentation here: http://www.eyecon.ro/bootstrap-datepicker/ -->
	<script src="js/bootstrap-datepicker.js" type="text/javascript"></script>

	<!-- Control Center for Material Kit: activating the ripples, parallax effects, scripts from the example pages etc -->
	<script src="js/material-kit.js" type="text/javascript"></script>
    <script src="js/employer-main.js" type="text/javascript"></script>
    <script src="js/summernote.min.js" type="text/javascript"></script> 
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
                    <!--
                     <li>
                            <a onclick="openNav()"><i class="material-icons">dashboard</i></a>
                    </li>
                    -->
                    <li class="visible-xs"><a href="employer-home.php" id="home"><i class="material-icons">home</i>Home</a></li>
                    <li class="visible-xs"><a href="searchresumes.php" id="home"><i class="material-icons">find_in_page</i>Resume&nbsp;Search</a></li>
                    <li class="dropdown active visible-xs"><a href="employer-main.php" class="dropdown-toggle" data-toggle="dropdown" id="pinfo"><i class="material-icons">people</i>Applicants<b class="caret"></b></a>
                         <ul class="dropdown-menu">
                                    <li><a href="#ajposts" id="ajposts"><i class="material-icons">flag</i>&nbsp;By Job Ad</a></li>
                                    <li><a href="#short" id="short"><i class="material-icons">sort</i>&nbsp;Shortlist</a></li>  
                                    <li><a href="#napp" id="napp"><i class="material-icons">new_releases</i>&nbsp;New Applicants</a></li>  
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
                                    <li><a href="#ajposts" id="ajposts"><i class="material-icons">flag</i>&nbsp;By Job Ad</a></li>
                                    <li><a href="#short" id="short"><i class="material-icons">sort</i>&nbsp;Shortlist</a></li>  
                                    <li><a href="#napp" id="napp"><i class="material-icons">new_releases</i>&nbsp;New Applicants</a></li>     
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
        if($ajax=='ajposts'){
             include 'employer-activejobposts.php';
        }
         if($ajax=='short'){
             include 'employer-shortlist.php';
        }
        if($ajax=='napp'){
             include 'employer-newapps.php';
        }
        if($ajax=='cinfo'){
             include 'employer-companyinfo.php';
        }        
    ?>
                      
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
     $('#loader').hide();
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