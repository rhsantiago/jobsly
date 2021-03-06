<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="img/favicon.ico">
	<link rel="icon" href="img/favicon.ico">
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

</head>

<body class="signup-page">
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
        		<a class="navbar-brand logo" >jobsly</a>
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
							<form class="form" id="adminlogin-form" name="adminlogin-form">
								<div class="header header-primary text-center">
									<h4>Administration</h4>
									
								</div>
							
								<div class="content">

									<div class="input-group">
										<span class="input-group-addon">
											<i class="material-icons">email</i>
										</span>
										<input type="text" id="email" class="form-control" placeholder="Email...">
									</div>

									<div class="input-group">
										<span class="input-group-addon">
											<i class="material-icons">lock_outline</i>
										</span>
										<input type="password" id="password" placeholder="Password..." class="form-control" />
									</div>

								</div>
								<div class="footer text-center">
									<button class="btn btn-primary " name="adminsignin" id="adminsignin" type="submit">Login</button>
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
    <script src="js/adminsignin.js"></script>
<script>
$(document).ready(function() {
     $('#email').focus();
});      
    
</script>
</html>
