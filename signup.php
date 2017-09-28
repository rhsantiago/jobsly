<!DOCTYPE html>

<?php
   $target = isset($_GET['target']) ? $_GET['target'] : '';
?>
<html>
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
        
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="author" content="">
     <link rel="apple-touch-icon" sizes="76x76" href="img/favicon.ico">
	<link rel="icon" href="img/favicon.ico">   
    <title>jobsly – find your next adventure.</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>    
        <?php
            include 'inc/resources.php';
        ?>
      
    </head>
 

   <!--
        <div id="employerform">
            <form id="signup-form" name="signup-form" role="form" class="signin-form"  method="POST">
                <input type="hidden" id="usertype" name="usertype" value="employer">
				<div class="form-group" id="email-group">
					 <div> Employer Registration</div>
					 <div class="input-group">
                                <span class="glyphicon glyphicon glyphicon-user input-group-addon info-input-group-addon" ></span>
					<input type="email" class="form-control" name="email" id="email" placeholder="Email" />
                    </div>
				</div>
				<div class="form-group" id="password-group">
					 
					<div class="input-group">
                                <span class="glyphicon glyphicon glyphicon-ban-circle input-group-addon info-input-group-addon" id="basic-addon1"></span>
					<input type="password" class="form-control" name="password" id="password" placeholder="Password"/>
                    </div>
				</div>
                <div class="form-group" id="confirm-password-group">
					 
					<div class="input-group">
                                <span class="glyphicon glyphicon glyphicon-ban-circle input-group-addon info-input-group-addon" id="basic-addon1"></span>
					<input type="password" class="form-control" name="confirmpassword" id="confirmpassword" placeholder="Confirm Password"/>
                    </div>
				</div>
                <div class="form-group">
					 
					 <div class="input-group">
                                <span class="glyphicon glyphicon glyphicon-user input-group-addon info-input-group-addon" ></span>
					<input type="text" class="form-control" name="companyname" id="companyname" placeholder="Company Name" />
                    </div>
				</div>
				
				
				<button type="submit" class="btn btn-primary">
					Create Account
				</button>
			</form>
            <div><a href=""> I already have an account</a></div>
             <div><p>* For Employers, please use your work email address for faster verification.</p></div>
    </div>

    <div id="jobseekerform">
            
    </div>

-->
<body class="signin-body">
    <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MKMGLRW"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
    
    <!-- Preloader -->
	<div id="preloader">
		<div id="status"></div>
	</div>
        <?php
            $_GET['page'] = 'none';
            include 'inc/navbar.php';
         ?>
    <div class="container">        
        
	<div class="row-fluid col-centered-login">
		<div class="col-md-6 login-col">
            <div class="signup-welcome"><span class="signin-welcome-text vcenter">Welcome to <span class="signin-logo">jobsly</span></span>
                <p></p>
            <p class="signin-paragraph">Let's create your
                <?php
                    if($target=='jobseeker'){
                        echo 'job seeker ';
                    }else{
                        echo 'employer';
                    }
                ?>
                account!</p>
                <!--
            <button type="submit" id="jobseekerbutton" class="btn btn-primary">
					Job Seeker
				</button>
                <button type="submit" id="employerbutton" class="btn btn-primary">
					Employer
				</button>
                -->
            </div>
		</div>
		<div class="col-md-6 login-col">
            
        <div class="row-fluid">
		<div class="col-md-3 col-sm-6 col-xs-6">
           
		</div>
		<div id="signupform" class="col-md-3 col-sm-6 col-xs-6 signup-form">
            <?php
                if($target=='jobseeker'){
            ?>
            <form id="signup-form" name="signup-form" role="form" class="signin-form"  method="POST" >
                <input type="hidden" id="usertype" name="usertype" value="<?=$target?>">
				<div class="form-group" id="email-group" data-parsley-errors-container="#emailerrorcontainer">
					  <div class="signup-form-title">Jobseeker Registration</div>
					 <div class="input-group">
                         <div class="input-group-addon info-input-group-addon">
                                <span class="glyphicon glyphicon glyphicon-user" ></span>
                         </div>     
					   	        <input type="email" class="form-control" name="email" id="email" placeholder="Email" required data-parsley-type="email" data-parsley-trigger="keyup" data-parsley-required-message="Email is required."/>
                    </div>
                    <div id="emailerrorcontainer"></div>
				</div>
                
				<div class="form-group" id="password-group">					 
					<div class="input-group">
                        <div class="input-group-addon info-input-group-addon">
                                <span class="glyphicon glyphicon glyphicon-ban-circle" id="basic-addon1"></span>
                        </div>    
					<input type="password" class="form-control" name="password" id="password" placeholder="Password" required />
                    </div>
				</div>
                <div class="form-group">					 
					<div class="input-group" id="confirm-password-group">
                        <div class="input-group-addon info-input-group-addon">
                                <span class="glyphicon glyphicon glyphicon-ban-circle" id="basic-addon1"></span>
                        </div>    
					<input type="password" class="form-control" name="confirmpassword" id="confirmpassword" placeholder="Confirm Password" data-parsley-equalto="#password" required data-parsley-equalto-message="Passwords do not match."/>
                    </div>
				</div>
                <div id="emailtaken" class="loginerror hidden">Email already registered!</div>
				<div id="loading" class="center" >
                                        <img id="loader"  class="loader " src="img/loader.gif">
                                    </div>
				<button type="submit" class="btn btn-primary" name="submitbutton" id="submitbutton">
					Create Account
				</button>
			</form>
            <div class="sign-up-form-already"><a href="login.php"> I already have an account</a></div>
                <?php
                }else{
                ?>
                <form id="signup-form" name="signup-form" role="form" class="signin-form"  method="POST">
                <input type="hidden" id="usertype" name="usertype" value="<?=$target?>">
				<div class="form-group" id="email-group" data-parsley-errors-container="#emailerrorcontainer" class="form-group-margin">
					 <div class="signup-form-title"> Employer Registration</div>
					 <div class="input-group">
                         <div class="input-group-addon info-input-group-addon">
                                <span class="glyphicon glyphicon glyphicon-user" ></span>
                         </div>
					<input type="email" class="form-control" name="email" id="email" placeholder="Email" required data-parsley-type="email" data-parsley-trigger="keyup" data-parsley-required-message="Email is required."/>
                    </div>
                    <div id="emailerrorcontainer"></div>
				</div>
				<div class="form-group" id="password-group">
					 
					<div class="input-group">
                        <div class="input-group-addon info-input-group-addon">
                                <span class="glyphicon glyphicon glyphicon-ban-circle" id="basic-addon1"></span>
                        </div>    
					<input type="password" class="form-control" name="password" id="password" placeholder="Password" required/>
                    </div>
				</div>
                <div class="form-group" id="confirm-password-group">
					 
					<div class="input-group">
                        <div class="input-group-addon info-input-group-addon">
                                <span class="glyphicon glyphicon glyphicon-ban-circle" id="basic-addon1"></span>
                        </div>    
					<input type="password" class="form-control" name="confirmpassword" id="confirmpassword" placeholder="Confirm Password" data-parsley-equalto="#password" required data-parsley-equalto-message="Passwords do not match."/>
                    </div>
				</div>
                <div class="form-group">
					 
					 <div class="input-group">
                         <div class="input-group-addon info-input-group-addon">
                                <span class="glyphicon glyphicon glyphicon-inbox" ></span>
                         </div>     
					       <input type="text" class="form-control" name="companyname" id="companyname" placeholder="Company Name" required/>
                    </div>
				</div>
                <div id="emailtaken" class="loginerror hidden">Email already registered!</div>    
				<div id="loading" class="center" >
                                        <img id="loader"  class="loader " src="img/loader.gif">
                                    </div>
				
				<button type="submit" class="btn btn-primary" name="submitbutton" id="submitbutton">
					Create Account
				</button>
			</form>
            <div><a href="login.php"> I already have an account</a></div>
             <div><p>* Please use your work email address for faster verification.</p></div>
                <?php
                }
                ?>    
        </div>      
                   
		</div>
	</div>    
            
           
          
		</div>
	</div>

    
  
     
   <!-- local
<script src="js/bootstrap.js"></script>    -->
<!-- Latest compiled and minified JavaScript -->

</body>
</html>

