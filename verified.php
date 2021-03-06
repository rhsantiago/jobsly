<!doctype html>

<?php
if(isset($_GET['email'])){ $email = $_GET['email']; }
if(isset($_GET['verify'])){ $verifyhash = $_GET['verify']; }
include 'Database.php';
$database = new Database();
     date_default_timezone_set('Asia/Manila');
     $logtimestamp = date("Y-m-d H:i:s");
     include "dashboard/serverlogconfig.php";
 $database->query('SELECT count(id) as ok from useraccounts where email=:email and verifyhash=:verifyhash');
   
 $database->bind(':email', $email);
 $database->bind(':verifyhash', $verifyhash);
    try{
        $row = $database->single();
     }catch (PDOException $e) {
        $msg = $e->getTraceAsString()." ".$e->getMessage();
        $log->error($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
        die("");
    }    
    $ok = $row['ok'];
 $database->query('SELECT usertype from useraccounts where email=:email and verifyhash=:verifyhash');
   
 $database->bind(':email', $email);
 $database->bind(':verifyhash', $verifyhash);
    try{
        $row = $database->single();
     }catch (PDOException $e) {
        $msg = $e->getTraceAsString()." ".$e->getMessage();
        $log->error($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
        die("");
    }
    $usertype = $row['usertype'];

if($ok > 0){
 if($usertype==1){
      $database->query('update useraccounts set isverified=0 where email=:email and verifyhash=:verifyhash');
 }else{
      $database->query('update useraccounts set isverified=1 where email=:email and verifyhash=:verifyhash');
 }   
   
 $database->bind(':email', $email);
 $database->bind(':verifyhash', $verifyhash);
    try{
         $database->execute();
     }catch (PDOException $e) {
        $msg = $e->getTraceAsString()." ".$e->getMessage();
        $log->error($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
        die("");
    }    
    
?>

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
	<link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
	<link rel="icon" type="image/png" href="../assets/img/favicon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>jobsly - find your net adventure.</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />

	<!--     Fonts and icons     -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <link href="https://fonts.googleapis.com/css?family=Oleo+Script" rel="stylesheet">
	<!-- CSS Files -->
    <link href="dashboard/css/bootstrap.min.css" rel="stylesheet" />
    <link href="dashboard/css/material-kit.css" rel="stylesheet"/>
     <link href="dashboard/css/custom.css" rel="stylesheet"/>
<style>
a:hover { 
    color: white !important;
}
    .loginerror{
        color: red;
    }    
</style>
</head>

<body class="signup-page">
    <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MKMGLRW"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
    
	<nav class="navbar navbar-transparent navbar-absolute">
    	<div class="container">
        	<!-- Brand and toggle get grouped for better mobile display -->
        	<div class="navbar-header">
        		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example">
            		<span class="sr-only">Toggle navigation</span>
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
        		</button>
        		<a href="index.php" class="navbar-brand logo" >jobsly</a>
        	</div>

        	<div class="collapse navbar-collapse" id="navigation-example">
        		<ul class="nav navbar-nav navbar-right">
					
    				
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

    <div class="wrapper">
		<div class="header header-filter" style="background-image: url('img/city.jpg'); background-size: cover; background-position: top center;">
			<div class="container">
				<div class="row">
					<div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
						<div class="card card-signup">
							<form method="POST" id="login-form" action="signin.php" name="login-form">
								<div class="header header-primary text-center">
									<h4>Login</h4>
									
								</div>
							
								<div class="content">

									<div class="input-group">
										<span class="input-group-addon">
											<i class="material-icons">email</i>
										</span>
										<input type="text" id="email" class="form-control" value="<?=$email?>" placeholder="Email...">
									</div>

									<div class="input-group">
										<span class="input-group-addon">
											<i class="material-icons">lock_outline</i>
										</span>
										<input type="password" id="password" placeholder="Password..." class="form-control" />
									</div>
                                    <div class="errormsg">
                  <div id="unverified" class="loginerror hidden">Unverified account. Please check your email for the verification link</div>
                  <div id="notfound" class="loginerror hidden">Email not found or password does not match</div>
              </div>

								</div>
                               
								<div class="footer text-center">
                                    <ul class="list-inline">
                                        <li>    
                                            <button class="btn btn-info " name="signin" id="signin" type="submit">Sign in</button>
                                        </li> 
                                        <li>
                                            <div class="dropdown">
                                              <button class="btn btn-info dropdown-toggle getstarted" type="button" data-toggle="dropdown">Signup
                                              <span class="caret"></span></button>
                                              <ul class="dropdown-menu">
                                                <li><a class="blackcolor" href="signup.php?target=jobseeker">Job seeker</a></li>
                                                <li><a class="blackcolor" href="signup.php?target=employer">Employers</a></li>
                                              </ul>        
                                            </div>
                                         </li> 
                                         <li>    
                                            <b>Congratulations! </b> Your account is now verified!
                                        </li>
                                    </ul> 
                                           
                                                 
                                                                    
                         
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
<!--
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
		                &copy; 2016, made with <i class="fa fa-heart heart"></i> by <a href="http://www.creative-tim.com" target="_blank">Creative Tim</a>
		            </div>
		        </div>
		    </footer>
-->
		</div>

    </div>


</body>
	<!--   Core JS Files   -->
	<script src="dashboard/js/jquery.min.js" type="text/javascript"></script>
	<script src="dashboard/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="dashboard/js/material.min.js"></script>
    <script src="js/signin.js"></script>
<script>
$(document).ready(function() {
     $('#email').focus();
});      
    
</script>    
    

</html>
<?php
}else{
    echo "verification error";
}    
    
?>    
