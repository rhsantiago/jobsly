<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="author" content="">

    <title>jobsly – jobs for the modern world</title>
<style>
    

</style>
        <?php
            include 'inc/resources.php';
        ?>
      
    </head>
  
<div id="employerform">
            <form id="signup-form" name="signup-form" role="form" class="signin-form" action="register-submit.php" method="POST">
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
            <form id="signup-form" name="signup-form" role="form" class="signin-form"  method="POST">
                <input type="hidden" id="usertype" name="usertype" value="jobseeker">
				<div class="form-group" id="email-group">
					  <div> Jobseeker Registration</div>
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
                <div class="form-group">					 
					<div class="input-group" id="confirm-password-group">
                                <span class="glyphicon glyphicon glyphicon-ban-circle input-group-addon info-input-group-addon" id="basic-addon1"></span>
					<input type="password" class="form-control" name="confirmpassword" id="confirmpassword" placeholder="Confirm Password"/>
                    </div>
				</div>
				
				
				<button type="submit" class="btn btn-primary" name="submitbutton" id="submitbutton">
					Create Account
				</button>
			</form>
            <div><a href=""> I already have an account</a></div>
             
    </div>
    
    
<body class="signin-body">
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
            <p class="signin-paragraph">Are you looking for a job or are you an employer?</p>
            <button type="submit" id="jobseekerbutton" class="btn btn-primary">
					Job Seeker
				</button>
                <button type="submit" id="employerbutton" class="btn btn-primary">
					Employer
				</button>
            </div>
		</div>
		<div class="col-md-6 login-col">
            
        <div class="row-fluid">
		<div class="col-md-3 col-sm-6 col-xs-6">
           
		</div>
		<div id="signupform" class="col-md-3 col-sm-6 col-xs-6 signup-form">
                     
            <form id="signup-form" name="signup-form" role="form" class="signin-form"  method="POST">
                <input type="hidden" id="usertype" name="usertype" value="jobseeker">
				<div class="form-group" id="email-group">
					  <div> Jobseeker Registration</div>
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
                <div class="form-group">					 
					<div class="input-group" id="confirm-password-group">
                                <span class="glyphicon glyphicon glyphicon-ban-circle input-group-addon info-input-group-addon" id="basic-addon1"></span>
					<input type="password" class="form-control" name="confirmpassword" id="confirmpassword" placeholder="Confirm Password"/>
                    </div>
				</div>
				
				
				<button type="submit" class="btn btn-primary" name="submitbutton" id="submitbutton">
					Create Account
				</button>
			</form>
            <div><a href=""> I already have an account</a></div>
                       
		</div>
	</div>    
            
            
            
            
            
            
            
 <!--           
           <div class="signup-form">
    <div class="row">           
            <form>
                 <div class="col-md-10">
                      <div class="form-group">
                          <div class="input-group">
                                <span class="glyphicon glyphicon glyphicon-user input-group-addon info-input-group-addon" ></span>
                                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
                          </div>
                      </div>
                </div>
                <div class="col-md-10">
                      <div class="form-group">
                          <div class="input-group">
                                <span class="glyphicon glyphicon glyphicon-ban-circle input-group-addon info-input-group-addon" id="basic-addon1"></span>

                                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">

                          </div>
                      </div>  
               </div>
                <div class="col-md-4">
              <button id="createbutton" name="createbutton" class="btn btn-primary btn-block">Create Account</button>
                </div>
            </form>
      </div>    
                 
         </div>    
  -->          
          
		</div>
	</div>
</div>
    
   
    <script src="js/formsubmit.js"></script> 
     <script src="js/mycustom.js"></script> 
   <!-- local
<script src="js/bootstrap.js"></script>    -->
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>

