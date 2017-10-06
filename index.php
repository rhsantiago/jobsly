 <!-- FlatFy Theme - Andrea Galanti /-->
<!doctype html>
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if IE 9]>    <html class="no-js ie9" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html> <!--<![endif]-->
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
    <meta name="description" content="Search for jobs or post job ads for free" />
 	<meta name="keywords" content="Jobs, Hiring, Career, Work, Resume, Call Center Jobs, Recruitment" />

    <title>jobsly – find your next adventure | Job Search | Resume Search</title>
    <link rel="apple-touch-icon" sizes="76x76" href="img/favicon.ico">
	<link rel="icon" href="img/favicon.ico">
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
 
    <!-- Custom Google Web Font -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Oleo+Script" rel="stylesheet">
	<link href='https://fonts.googleapis.com/css?family=Arvo:400,700' rel='stylesheet' type='text/css'>
	
    <!-- Custom CSS-->
    <link href="css/general.css" rel="stylesheet">
	
	 <!-- Owl-Carousel -->
    <link href="css/custom.css" rel="stylesheet">
	<link href="css/owl.carousel.css" rel="stylesheet">
    <link href="css/owl.theme.css" rel="stylesheet">
	 <link href="css/style.css" rel="stylesheet">
	<link href="css/animate.css" rel="stylesheet">
  
	 
	<!-- Magnific Popup core CSS file -->
	<link rel="stylesheet" href="css/magnific-popup.css"> 
	
	<script src="js/modernizr-2.8.3.min.js"></script>  <!-- Modernizr /-->
	<!--[if IE 9]>
		<script src="js/PIE_IE9.js"></script>
	<![endif]-->
	<!--[if lt IE 9]>
		<script src="js/PIE_IE678.js"></script>
	<![endif]-->

	<!--[if lt IE 9]>
		<script src="js/html5shiv.js"></script>
	<![endif]-->

</head>

<body id="home">
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MKMGLRW"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

	<!-- Preloader -->
	<div id="preloader">
		<div id="status"></div>
	</div>
	
    <div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

        <form method="POST" id="login-form" action="signin.php" name="login-form">
        <div class="modal-content ">
          <div class="modal-header mymodalheader">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Signin to jobsly</h4>
          </div>
          <div class="modal-body">
              
            <div class="input-group ">
                <div class="input-group-addon info-input-group-addon">
                  <div class="glyphicon glyphicon-user"></div>                  
                </div>
                <input type="text" class="form-control inputgroupaddon" id="email" placeholder="Email" aria-describedby="basic-addon1">
              </div><br>
            <div class="input-group">
                <div class="input-group-addon info-input-group-addon">
                  <span class="glyphicon glyphicon-ban-circle" id="basic-addon1"></span>
                </div>
                  <input type="password" class="form-control" placeholder="Password" id="password" aria-describedby="basic-addon1">
            </div>
              <div class="errormsg">
                  <div id="unverified" class="loginerror hidden">Unverified account. Please check you email for the verification link</div>
                  <div id="notfound" class="loginerror hidden">Email not found or password does not match</div>
              </div>
             
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
              <button class="btn btn-info " name="signin" id="signin" type="submit">Signin</button>
          </div>
        </div>
      </form>      
      </div>
</div>

    
	<!-- FullScreen -->
    <div class="intro-header">
		<div class="col-xs-12 text-center abcen1">
			<h1 class="h1_home wow fadeIn logo" data-wow-delay="0.4s">jobsly</h1>
			<h3 class="h3_home wow fadeIn" data-wow-delay="0.6s">find your next adventure.</h3>
			<ul class="list-inline intro-social-buttons">
                <li><img src="img/fb.png" class="img-rounded" alt="find us on facebook" width="50" height="50">
				</li>
				<li id="download" >
                    <button type="button" id="loginbtn" onclick="location.href='login.php';" href="login.php" class="btn btn-info btn-lg getstarted">Login</button>
                    <!--
                        <button type="button" class="btn btn-info btn-lg getstarted" data-toggle="modal" data-target="#myModal">Login</button>
                    -->
                </li>
                <li id="download" >
                    <div class="dropdown">
                      <button class="btn btn-info dropdown-toggle getstarted" type="button" data-toggle="dropdown">Signup
                      <span class="caret"></span></button>
                      <ul class="dropdown-menu">
                        <li><a href="signup.php?target=jobseeker">Job seeker</a></li>
						<li><a href="signup.php?target=employer">Employers</a></li>
                      </ul>
                    </div>
                </li>
			</ul>
		</div>    
        <!-- /.container -->
		<div class="col-xs-12 text-center abcen wow fadeIn">
			<div class="button_down "> 
				<a class="imgcircle wow bounceInUp" data-wow-duration="1.5s"  href="#latest"> <img class="img_scroll" src="img/icon/circle.png" alt=""> </a> 
			</div>
		</div>
    </div>
	
    
    
	<!-- NavBar-->
	<nav class="navbar-default navbar-color" role="navigation">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand logo" href="#home">jobsly</a>
			</div>

			<div class="collapse navbar-collapse navbar-right navbar-ex1-collapse">
				<ul class="nav navbar-nav">
					
					<li class="menuItem menus"><a href="#whatis">What is jobsly?</a></li>
					<li class="menuItem"><a href="#useit">Features</a></li>
					
					<li class="menuItem"><a href="login.php" data-toggle="" data-target="">Login</a></li>
                    <li class="dropdown">
							 <a href="#" class="dropdown-toggle" data-toggle="dropdown">Signup<strong class="caret"></strong></a>
							<ul class="dropdown-menu dropdown-menu-right">
								<li>
									<a href="signup.php?target=jobseeker">Job seeker</a>
								</li>
								<li>
									<a href="signup.php?target=employer">Employers</a>
								</li>
								
							</ul>
						</li>
					<li class="menuItem"><a href="#contact">Contact</a></li>
				</ul>
			</div>
		   
		</div>
	</nav> 
    
    <!-- Latest -->
    <div id ="latest" class="content-section-b latest"> 
		
		<div class="container latestjobs">
            <div class="row ">
                <div class="col-sm-6 wow fadeInLeftBig "  data-animation-delay="200">   
                    <h3 class="section-heading">Latest Jobs</h3>
					<div class="sub-title lead3">Senior Web Developer, Bootstrap - PHP</div>
                    <div class="sub-title lead3">Technical Support Specialists - Level 3</div>
                    <div class="sub-title lead3">Marketing Manager, Six Sigma Certified</div>
                    <div class="sub-title lead3">Junior Finance Analyst 1 yr. experience</div>
                    <div class="sub-title lead3">Sales Specialists BPO, Australian account</div>
                    <div class="sub-title lead3">Java Technical Lead, J2EE Spring hibernate</div>
                    <div class="sub-title lead3"></div>
                    <div class="sub-title lead3"><button type="button" id="loginbtn" onclick="location.href='latestjobs.php';" href="latestjobs.php" class="btn btn-info btn-lg getstarted">View All</button></div>
				</div>  
				
                <div class="col-sm-6 wow fadeInRightBig featured"  data-animation-delay="200">   
                    <h3 class="section-heading featuredtitle">Featured Companies</h3>
					<div class="sub-title lead3"></div>
                    <p class="lead featuredtitle">
						
                        
					</p>
					 
				</div>  			
			</div>
        </div>
    </div>
    
    
    
    
    
	
	<!-- What is -->
	<div id="whatis" class="content-section-b whatisjobsly" style="border-top: 0">
		<div class="container">

			<div class="col-md-6 col-md-offset-3 text-center wrap_title">
				<h2>What is jobsly?</h2>
				<p class="lead" style="margin-top:0">jobsly wants to change how you search for jobs, and as employers, how you connect to job seekers</p>
				
			</div>
			
			<div class="row">
							
				
				<div class="col-sm-4 wow fadeInDown text-center">
				  <img  class="rotate" src="img/icon/gift-box.svg" alt="Generic placeholder image">
				   <h3>Always Free</h3>
				   <p class="lead">Never pay to post jobs again. Take advantage of our free tools and features not even fee-based job sites have. No resume limits. Did we mention it's free?</p>
				   <!-- <p><a class="btn btn-embossed btn-primary view" role="button">View Details</a></p> -->
				</div><!-- /.col-lg-4 -->
                
                <div class="col-sm-4  wow fadeInDown text-center">
				  <img class="rotate" src="img/icon/laptop.svg" alt="Generic placeholder image">
				  <h3>Premium Tools</h3>
				  <p class="lead">Your Dashboard is an all-in-one place to create your resume, search for jobs, track applications and many more. Compare salaries, shortlist applicants and be alerted for updates on your applications. On the go? View the site on your mobile browser and get the same beautiful interface with all the features available. It's job matching for the modern world!</p>
				 <!-- <p><a class="btn btn-embossed btn-primary view" role="button">View Details</a></p> -->
				</div><!-- /.col-lg-4 -->
				
				<div class="col-sm-4 wow fadeInDown text-center">
				  <img  class="rotate" src="img/icon/clipboard.svg" alt="Generic placeholder image">
				   <h3>Be Informed</h3>
					<p class="lead">Compare your resume to other jobseekers anonymously both ways. Use graphs to compare your salary to the current industry standard and much more. Is your salary below the standard? Time to find your next adventure!
                    </p>
				  <!-- <p><a class="btn btn-embossed btn-primary view" role="button">View Details</a></p> -->
				</div><!-- /.col-lg-4 -->
				
			</div><!-- /.row -->
				
			<div class="row tworow">
				
				<div class="col-sm-4 wow fadeInDown text-center">
				  <img  class="rotate" src="img/icon/pencil.svg" alt="Generic placeholder image">
				   <h3>Analytics and Reporting</h3>
				   <p class="lead">Use our data analytics tools to engage more jobseekers. Compare your offers to industry standards and job post statistics. Finished with the data? Our built-in reporting tools lets you customize and print great looking reports.  </p>
				   <!-- <p><a class="btn btn-embossed btn-primary view" role="button">View Details</a></p> -->
				</div><!-- /.col-lg-4 -->
				
				<div class="col-sm-4 wow fadeInDown text-center">
				  <img  class="rotate" src="img/icon/retina.svg" alt="Generic placeholder image">
				   <h3>Curated Content</h3>
				 <p class="lead">We verify each company and each job posting. Applicants are also pre-screened for validity. Quality jobs for qualified applicants.  </p>                    
                    
				  <!-- <p><a class="btn btn-embossed btn-primary view" role="button">View Details</a></p> -->
				</div><!-- /.col-lg-4 -->
                <div class="col-sm-4 wow fadeInDown text-center">
				  <img class="rotate" src="img/icon/like.svg" alt="Generic placeholder image">
				  <h3>Social Media</h3>
				  <p class="lead">Coming soon! Leverage the power of social media and engage more jobseekers. Post and share your job listing on your company's fb page. Be alerted by facebook chatbot messages on new applicants, job post statistics and more. </p>

				  <!-- <p><a class="btn btn-embossed btn-primary view" role="button">View Details</a></p> -->
				</div><!-- /.col-lg-4 -->
				
			</div><!-- /.row -->
        
		</div>
	</div>
		
<!-- Use it -->
    <div id ="useit" class="content-section-b"> 
		
		<div class="container">
            <div class="row">
                <div class="col-sm-6 wow fadeInLeftBig">
                     <div id="owl-demo-1" class="owl-carousel">
						<a href="dashboard/email/img/beautiful2.png" class="image-link">
							<div class="item">
								<img  class="img-responsive img-rounded" src="dashboard/email/img/beautiful2.png" alt="">
							</div>
						</a>
						<a href="dashboard/email/img/latest.png" class="image-link">
							<div class="item">
								<img  class="img-responsive img-rounded" src="dashboard/email/img/latest.png" alt="">
							</div>
						</a>
						<a href="dashboard/email/img/beautiful3.png" class="image-link">
							<div class="item">
								<img  class="img-responsive img-rounded" src="dashboard/email/img/beautiful3.png" alt="">
							</div>
						</a>
					</div>       
                </div>
				
                <div class="col-sm-6 wow fadeInRightBig"  data-animation-delay="200">   
                    <h3 class="section-heading">Work is Beautiful.</h3>
					<div class="sub-title lead3">Fully responsive, mobile-ready and made for the modern world.</div>
                    <p class="lead">
						Still using that jobsite from 1999? jobsly is made "mobile-first" for the best possible UX.
                        Whether on your laptop, desktop or smartphone, users will have the same beautiful interface.
                        No clunky apps to download.
                        
					</p>

					 <p> <div class="dropdown">
                      <button class="btn btn-info dropdown-toggle getstarted" type="button" data-toggle="dropdown">Signup
                      <span class="caret"></span></button>
                      <ul class="dropdown-menu">
                        <li><a href="signup.php?target=jobseeker">Job seeker</a></li>
						<li><a href="signup.php?target=employer">Employers</a></li>
                      </ul>
                    </div>
					</p>
				</div>  			
			</div>
        </div>
    </div>

	
	<div  class="content-section-c ">
		<div class="container">
			<div class="row">
			<div class="col-md-6 col-md-offset-3 text-center white">
				<h2>Get Live Updates</h2>
				<p class="lead" style="margin-top:0"></p>
			 </div>
			<div class="col-md-6 col-md-offset-3 text-center">
				<div class="mockup-content">
						<div class="morph-button wow pulse morph-button-inflow morph-button-inflow-1">
							<button type="button "><span>Subscribe to our Newsletter</span></button>
							<div class="morph-content">
								<div>
									<div class="content-style-form content-style-form-4 ">
										<h2 class="morph-clone">Subscribe to our Newsletter</h2>
										<form>
											<p><label>Your Email Address</label><input type="text"/></p>
											<p><button>Subscribe me</button></p>
										</form>
									</div>
								</div>
							</div>
						</div>
				</div>
			</div>	
			</div>>
		</div>
	</div>	
	

	<!-- Contact -->
	<div id="contact" class="content-section-a">
		<div class="container">
			<div class="row">
			
			<div class="col-md-6 col-md-offset-3 text-center wrap_title">
				<h2>Contact Us</h2>
				<p class="lead" style="margin-top:0"></p>
			</div>
			
			<form role="form" action="" method="post" >
				<div class="col-md-6">
					<div class="form-group">
						<label for="InputName">Your Name</label>
						<div class="input-group">
							<input type="text" class="form-control" name="InputName" id="InputName" placeholder="Enter Name" required>
							<span class="input-group-addon"><i class="glyphicon glyphicon-ok form-control-feedback"></i></span>
						</div>
					</div>
					
					<div class="form-group">
						<label for="InputEmail">Your Email</label>
						<div class="input-group">
							<input type="email" class="form-control" id="InputEmail" name="InputEmail" placeholder="Enter Email" required  >
							<span class="input-group-addon"><i class="glyphicon glyphicon-ok form-control-feedback"></i></span>
						</div>
					</div>
					
					<div class="form-group">
						<label for="InputMessage">Message</label>
						<div class="input-group">
							<textarea name="InputMessage" id="InputMessage" class="form-control" rows="5" required></textarea>
							<span class="input-group-addon"><i class="glyphicon glyphicon-ok form-control-feedback"></i></span>
						</div>
					</div>

					<input type="submit" name="submit" id="submit" value="Submit" class="btn wow tada btn-embossed btn-primary pull-right">
				</div>
			</form>
			
			<hr class="featurette-divider hidden-lg">
				<div class="col-md-5 col-md-push-1 address">
					<address>
					<h3>Office Location</h3>
                        <!--
					<p class="lead"><a href="https://www.google.com/maps/preview?ie=UTF-8&q=The+Pentagon&fb=1&gl=us&hq=1400+Defense+Pentagon+Washington,+DC+20301-1400&cid=12647181945379443503&ei=qmYfU4H8LoL2oATa0IHIBg&ved=0CKwBEPwSMAo&safe=on">The Pentagon<br>
					Washington, DC 20301</a><br>
					Phone: XXX-XXX-XXXX<br>
					Fax: XXX-XXX-YYYY</p>
					</address>
                        -->
					<h3>Social</h3>
					<li class="social"> 
					<a href="#"><i class="fa fa-facebook-square fa-size"> </i></a>
					<a href="#"><i class="fa  fa-twitter-square fa-size"> </i> </a> 
					<a href="#"><i class="fa fa-google-plus-square fa-size"> </i></a>
					<a href="#"><i class="fa fa-flickr fa-size"> </i> </a>
					</li>
				</div>
			</div>
		</div>
	</div>
	
	
	
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-7">
              <!--
            <h3 class="footer-title">Follow Me!</h3>
            <p>Vuoi ricevere news su altri template?<br/>
              Visita Andrea Galanti.it e vedrai tutte le news riguardanti nuovi Theme!<br/>
              Go to: <a  href="http://andreagalanti.it" target="_blank">andreagalanti.it</a>
            </p>
			
		
			<a rel="cc:attributionURL" href="http://www.andreagalanti.it/flatfy"
		   property="dc:title">Flatfy Theme </a> by
		   <a rel="dc:creator" href="http://www.andreagalanti.it"
		   property="cc:attributionName">Andrea Galanti</a>
		   is licensed to the public under 
		   <BR>the <a rel="license"
		   href="http://creativecommons.org/licenses/by-nc/3.0/it/deed.it">Creative
		   Commons Attribution 3.0 License - NOT COMMERCIAL</a>.
		   
              </BR>
              -->
          </div> <!-- /col-xs-7 -->

          <div class="col-md-5">
            <div class="footer-banner">
              <h3 class="footer-title">jobsly</h3>
            
            </div>
          </div>
        </div>
      </div>
    </footer>

    <!-- JavaScript -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.js"></script>
	<script src="js/owl.carousel.js"></script>
	<script src="js/script.js"></script>
    <script src="js/signin.js"></script>
	<!-- StikyMenu -->
	<script src="js/stickUp.min.js"></script>
	<script type="text/javascript">
       
	  jQuery(function($) {
		$(document).ready( function() {
		  $('.navbar-default').stickUp();
		  
           
		});
	  });
        
        
        
	
	</script>
	<!-- Smoothscroll -->
	<script type="text/javascript" src="js/jquery.corner.js"></script> 
	<script src="js/wow.min.js"></script>
	<script>
	 new WOW().init();
	</script>
	<script src="js/classie.js"></script>
	<script src="js/uiMorphingButton_inflow.js"></script>
	<!-- Magnific Popup core JS file -->
	<script src="js/jquery.magnific-popup.js"></script> 
</body>

</html>
