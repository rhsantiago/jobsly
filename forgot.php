<!doctype html>
<?php
if(isset($_GET['mode'])){ $mode = $_GET['mode']; }
if(isset($_GET['email'])){ $email = $_GET['email']; }
if(isset($_GET['verify'])){ $verify = $_GET['verify']; }

if(!empty($email) && !empty($verify)){
include 'Database.php';
$database = new Database();

$database->query('SELECT email from useraccounts where email = :email and verifyhash = :verify');
$database->bind(':email', $email);
$database->bind(':verify', $verify);
$row = $database->single();
$emailok = $row['email'];

    
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
	<link rel="apple-touch-icon" sizes="76x76" href="img/favicon.ico">
	<link rel="icon" href="img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>jobsly - find your next adventure.</title>

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
                <!--
        		<ul class="nav navbar-nav navbar-right">					
		            <li>
		                <a href="" target="_blank" class="btn btn-simple btn-white btn-just-icon">
							<i class="fa fa-facebook-square"></i>
						</a>
		            </li>
					<li>
		                <a href="" target="_blank" class="btn btn-simple btn-white btn-just-icon">
							<i class="fa fa-instagram"></i>
						</a>
		            </li>
        		</ul>
                -->
        	</div>
    	</div>
    </nav>
<?php
if($mode=='forgot') {  
?>    
    <div class="wrapper">
		<div class="header header-filter" style="background-image: url('img/city.jpg'); background-size: cover; background-position: top center;">
			<div class="container">
				<div class="row">
					<div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
						<div class="card card-signup">
							<form method="POST" id="sendresetlink-form" action="sendresetlink.php" name="sendresetlink-form">
								<div class="header header-primary text-center">
									<h4>Reset Password Link</h4>
									
								</div>
							
								<div class="content">

									<div class="input-group">
										<span class="input-group-addon">
											<i class="material-icons">email</i>
										</span>
										<input type="text" id="email" class="form-control" placeholder="Email...">
									</div>

                                    <div class="errormsg">                 
                  <div id="notfound" class="loginerror hidden">Email not found!</div>
                  <div id="success" class="loginerror hidden">Password Reset link sent to your email!</div>   
                                    <div id="loading" class="center" >
                                        <img id="loader"  class="loader " src="img/loader.gif">
                                    </div>                    
              </div>

								</div>
								<div class="footer text-center">
                                    <ul class="list-inline">
                                        <li>    
                                            <button class="btn btn-info " name="signin" id="signin" type="submit">Send Password Reset Link</button>
                                        </li>                                         
                                    </ul>
                                    
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>

		</div>

    </div>
<?php
}else if(($mode=='reset') && (!empty($emailok))){
?>
  <div class="wrapper">
		<div class="header header-filter" style="background-image: url('img/city.jpg'); background-size: cover; background-position: top center;">
			<div class="container">
				<div class="row">
					<div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
						<div class="card card-signup">
							<form method="POST" id="resetpw-form" action="resetpw.php" name="resetpw-form">
                                <input type="hidden" id="verifyhash" value="<?=$verify?>">
								<div class="header header-primary text-center">
									<h4>Reset Password</h4>
									
								</div>
							
								<div class="content">

									<div class="input-group">
										<span class="input-group-addon">
											<i class="material-icons">email</i>
										</span>
										<input type="text" value="<?=$email?>" id="email" class="form-control" placeholder="Email...">
									</div>
                                    <div class="input-group">
										<span class="input-group-addon">
											<i class="material-icons">lock_outline</i>
										</span>
										<input type="password" id="password" placeholder="New Password..." class="form-control" />
									</div>
                                    <div class="input-group">
										<span class="input-group-addon">
											<i class="material-icons">lock_outline</i>
										</span>
										<input type="password" id="password2" placeholder="Confirm New Password..." class="form-control" />
									</div>
                                    <div class="errormsg">                 
                  <div id="pwnotmatch" class="loginerror hidden">Passwords do not match!</div>
                  <div id="pwsuccess" class="loginerror hidden text-success">Password Reset Successful!</div>
                                    <div id="loading" class="center" >
                                        <img id="loader"  class="loader " src="img/loader.gif">
                                    </div>    
              </div>

								</div>
								<div class="footer text-center">
                                    <ul class="list-inline">
                                        <li id="resetbuttondiv">    
                                            <button class="btn btn-info " name="signin" id="signin" type="submit">Reset Password</button>
                                        </li>                                         
                                    </ul>    
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>

		</div>

    </div>   

    
<?php
}
?>    


</body>
	<!--   Core JS Files   -->
	<script src="dashboard/js/jquery.min.js" type="text/javascript"></script>
	<script src="dashboard/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="dashboard/js/material.min.js"></script>
    <script src="js/signin.js"></script>
<script>
$(document).ready(function() {
     $('#email').focus();
     $('#loader').hide();
});      
    
</script>    
    

</html>
