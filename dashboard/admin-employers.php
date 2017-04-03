<?php
if (session_status() == PHP_SESSION_NONE) {
        session_start();   
}

if(isset($_SESSION['user'])){
   $user = $_SESSION['user'];
   $password = $_SESSION['password'];
   $adminid = $_SESSION['adminid'];
    
  include 'admin-authenticate.php';
}else{
    header("Location: logout.php");
}
//$employerid='';
if($ok == 1 ){
    $ajax = $_GET['ajax'];
   // $employerid = $_GET['employerid'];
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
    <script src="js/admin-employers.js" type="text/javascript"></script>
    <script src="js/summernote.min.js" type="text/javascript"></script> 
    <script src="js/parsley.js"></script>
</head>

<body class="landing-page">
    <!-- Modal -->
	<div class="modal fullscreen-modal fade" id="admin-showjob-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog modal-lg" role="document">
	    <div class="modal-content modalcontent">
	      
	    </div>
	  </div>
	</div>
    
    <div class="modal fullscreen-modal fade" id="admin-showemployer-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog modal-lg" role="document">
	    <div class="modal-content modalcontent">
	      
	    </div>
	  </div>
	</div>
    <div class="modal fullscreen-modal fade" id="logoupload-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <form role="form"  id="logoupload-form" name="logoupload-form" action="uploadlogo-submit.php" method="post" enctype="multipart/form-data">         
            <input type="hidden" id="userid" name="userid" value="">
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
                    <li><a href="admin-home.php" id="home"><i class="material-icons">home</i>Home</a></li>
                   <li class="dropdown active"><a href="admin-approvals.php" class="dropdown-toggle" data-toggle="dropdown" id="pinfo"><i class="material-icons">assignment_turned_in</i>Approvals<b class="caret"></b></a>
                         <ul class="dropdown-menu">
                                    <li><a href="admin-approvals.php?ajax=jobadsappr" id="jobadsappr"><i class="material-icons">flag</i>&nbsp;Job Ads</a></li>
                                    <li><a href="admin-approvals.php?ajax=empappr" id="empappr"><i class="material-icons">business</i>&nbsp;Employers</a></li>  
                                    <li><a href="admin-approvals.php?ajax=jseekerappr" id="jseekerappr"><i class="material-icons">people</i>&nbsp;Job Seekers</a></li>  
                         </ul> 
                    </li>
                    <li class="dropdown active"><a href="admin-jobads.php" class="dropdown-toggle" data-toggle="dropdown" id="pinfo"><i class="material-icons">work</i>Job Ads<b class="caret"></b></a>
                         <ul class="dropdown-menu">
                                    <li><a href="admin-jobads.php?ajax=alist" id="alist"><i class="material-icons">list</i>&nbsp;Active List</a></li>
                                    <li><a href="admin-jobads.php?ajax=ilist" id="ilist"><i class="material-icons">highlight_off</i>&nbsp;Inactive List</a></li>
                         </ul> 
                    </li>
                    <li class="dropdown active"><a href="admin-employers.php" class="dropdown-toggle" data-toggle="dropdown"><i class="material-icons">business</i>&nbsp;Employers<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="#emplist" id="emplist"><i class="material-icons">list</i>&nbsp;List</a></li>
                            <li><a href="#empjobads" id="empjobads"><i class="material-icons">work</i>&nbsp;Job Ads</a></li>
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
           
            $database->query('select adminphoto,fname from adminaccounts where id=:userid');
            $database->bind(':userid', $adminid);   
            try {
                $row = $database->single();      
            }catch (PDOException $e) {
                $msg = $e->getTraceAsString()." ".$e->getMessage();
                $log->error($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
                die("");
            }
            $adminphoto = $row['adminphoto'];
            $fname = $row['fname'];            
            if(empty($adminphoto)){
                $adminphoto='img/unknown.png';
            }
  
    ?>
    <!--sidebar-->
   <div id="mySidenav" class="sidenav">
  <!--<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>-->
       <div class="center sidenavmargin">
                                <div class="avatar center">
                                        <img src="<?=$adminphoto?>" alt="Circle Image" width="100" height="100" class="img-circle img-responsive img-raised center">
                                    </div>
                                    <div class="name">
                                        <h4 class="sidenavname"><?=$fname?></h4>                                     
                                    </div>  
       </div>
    <div class="sidebar-item"><a href="admin-home.php"><i class="material-icons">home</i>&nbsp;Home</a></div>   
   <div class="sidebar-item dropdown active"><a href="admin-approvals.php" class="dropdown-toggle" data-toggle="dropdown" id="pinfo"><i class="material-icons">assignment_turned_in</i>&nbsp;Approvals<b class="caret"></b></a>
            <ul class="dropdown-menu">
                                    <li><a href="admin-approvals.php?ajax=jobadsappr" id="jobadsappr"><i class="material-icons">flag</i>&nbsp;Job Ads</a></li>
                                    <li><a href="admin-approvals.php?ajax=empappr" id="empappr"><i class="material-icons">business</i>&nbsp;Employers</a></li>  
                                    <li><a href="admin-approvals.php?ajax=jseekerappr" id="jseekerappr"><i class="material-icons">people</i>&nbsp;Job Seekers</a></li>  
                         </ul>
    </div>
    <div class="sidebar-item dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="admin-jobads.php"><i class="material-icons">work</i>&nbsp;Job Ads<b class="caret"></b></a>
    <ul class="dropdown-menu">
                            <li><a href="admin-jobads.php?ajax=alist" id="alist"><i class="material-icons">list</i>&nbsp;Active List</a></li>
                            <li><a href="admin-jobads.php?ajax=ilist" id="ilist"><i class="material-icons">highlight_off</i>&nbsp;Inactive List</a></li>    
    </ul>
    </div>   
   <div class="sidebar-item dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="admin-employers.php"><i class="material-icons">business</i>&nbsp;Employers<b class="caret"></b></a>
    <ul class="dropdown-menu">
                            <li><a href="#emplist" id="emplist"><i class="material-icons">list</i>&nbsp;List</a></li>
                            <li><a href="#empjobads" id="empjobads"><i class="material-icons">work</i>&nbsp;Job Ads</a></li>
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
    if($ajax=='emplist'){
         include 'admin-employerslist.php';    
    }
    if($ajax=='empjobads'){
        
         include 'admin-employerjobads.php';
    } 
    if($ajax=='emppage'){
        
         include 'admin-employerpage.php';
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
        
      openNav();
</script>

</html>
<?php
} else{
    include 'logout.php';
    
}
?>