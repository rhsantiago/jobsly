<?php
session_start();
if(isset($_SESSION['user'])){
   $user = $_SESSION['user'];
   $password = $_SESSION['password'];
   $userid = $_SESSION['userid'];
   $usertype = $_SESSION['usertype'];
    include "serverlogconfig.php";
    include 'Database.php';
    $database = new Database();

    $database->query('SELECT count(id) as ok from useraccounts where email = :email and password = :password and usertype = :usertype and isverified = 0');
    $database->bind(':email', $user);
    $database->bind(':password', $password);
    $database->bind(':usertype', $usertype);
    try{
        $row = $database->single();
    }catch (PDOException $e) {
     $error = true;
     $msg = $e->getTraceAsString()." ".$e->getMessage();
     include "serverlog.php";
     die("");
    }     
    $ok = $row['ok'];
}

if($ok == 1 ){
 
    $companyname='';
    $telno='';
    $companyaddress='';
    $companytin='';
    $companywebsite='';
    $cperson='';
    $designation='';
    $cpersonemail='';
    $cpersontelno='';
    $industry='';
    $numemp='';
    $cdesc='';
    $logo='';
    
     $database->query('SELECT * from companyinfo where userid = :userid');
     $database->bind(':userid', $userid);
     try{
         $row = $database->single();
     }catch (PDOException $e) {
         $error = true;
         $msg = $e->getTraceAsString()." ".$e->getMessage();
         include "serverlog.php";
         die("");
     }   
     $id = $row['id'];
    // $userid = $row['userid'];
     $companyname = $row['companyname'];
     $companyaddress = $row['companyaddress'];
     $companywebsite = $row['companywebsite'];
     $telno = $row['telno'];
     $companytin = $row['companytin'];
     $cperson = $row['cperson'];
     $designation = $row['designation'];
     $cpersonemail = $row['cpersonemail'];
     $cpersontelno = $row['cpersontelno'];
     $industry = $row['industry'];
     $numemp = $row['numemp'];
     $cdesc = $row['cdesc'];
     $ctype = $row['ctype'];
     $logo = $row['logo'];

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

</head>

<body class="landing-page">
     <!-- Modal -->

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
        	</div>
    	</div>
    </nav>



     <div class="header header-filter purple-header">
            <div class="container">
                <div class="row-fluid">
					<div class="col-md-11 margin-top-title col-md-offset-1">
                        <div class="row-fluid">
                            
                            <div id="resumesb" class="">  
                                
                            </div>
                            
                          
	                 </div>
                </div>
            </div>
            </div>
        </div>

    <div id="main" class="wrapper ">
       

		<div class="main main-raised ">
         
			<div class="container-fluid"> <!-- with fluid for full width -->
                <div class="row-fluid">   <!-- with fluid for full width -->
                    <div id="resume-main-body">



<form method="post" id="companyregistration-form" name="companyregistration-form" data-parsley-trigger="keyup" data-parsley-validate>                    
                    <input type="hidden" id="mode" name="mode" value="insert">
                    <input type="hidden" id="userid" name="userid" value="<?=$userid?>">
                 
    
    
    <div class="col-md-12 center">            
            <div class="adstop">
                <img  src="https://lh5.ggpht.com/NFYFP2H9CCP50vAQNLa7AtCj_mbbYmOzY978fZqd31oL5qOdvXgxU3KW8ek2VgvIOvTqWY0=w728" 
                                 alt="user">
            </div>    
                           
     </div>
    <div class="col-md-12">
                             <h2 class="title">Company Registration</h2>
       </div>
    
    <div class="col-md-offset-1 col-md-7">
                       
                <div class="section  section-landing">
	                 

					<div class="features">
						<div class="row">
                            
                
                            
		                    <div class="col-md-12">
                                    <div class="card card-nav-tabs cardtopmargin">
                                            <div id="tabtitle" class="header  header-success">
                                                <!-- colors: "header-primary", "header-info", "header-success", "header-warning", "header-danger" -->
                                                <div class="nav-tabs-navigation">
                                                    <div class="nav-tabs-wrapper">
                                                        <ul class="nav nav-tabs" data-tabs="tabs">
                                                            <li class="active">
                                                                <a href="#profile" data-toggle="tab">
                                                                    <i class="material-icons">assignment_turned_in</i>
                                                                   Company Information
                                                                </a>
                                                            </li>										
                                                        </ul>
                                                    </div>
                                                </div>
                                          </div>
                                             <div class="content">
                                                    <div class="tab-content">
                                                        <div class="tab-pane active" id="profile">
                                                          <div class="row">
                                                                <div class="col-md-12">
                                                            <div id="companynameediv" class="form-group label-floating">
                                                                <label class="control-label">Name of Company</label>
                                                                <input type="text" id="companyname" class="form-control" value="<?=$companyname?>" data-parsley-required>  
                                                            </div>
                                                            <div id="companyaddressdiv" class="form-group label-floating">
                                                                <label class="control-label">Company Address</label>
                                                                <input type="text" id="companyaddress" class="form-control" value="<?=$companyaddress?>" data-parsley-required>
                                                            </div>
                                                             <div id="companywebsitediv" class="form-group label-floating">
                                                                <label class="control-label">Company Website</label>
                                                                <input type="text" id="companywebsite" class="form-control" value="<?=$companywebsite?>">
                                                            </div>       
                                                            
                                                            
                                                        </div>
                                                         <div class="col-md-6">
                                                                <div id="telnodiv" class="form-group label-floating">
                                                                <label class="control-label">Tel No.</label>
                                                                <input type="text" id="telno" class="form-control" value="<?=$telno?>" data-parsley-required data-parsley-pattern="^[\d\+\-\.\(\)\/\s]*$">
                                                             </div>
                                                             <?php
                                                                    if($id > 0){
                                                             ?>
                                                             <div >
                                                                 <a href="#logoupload-modal" data-userid="<?=$userid?>" data-toggle="modal">Upload Company Logo</a>
                                                              </div>
                                                             <?php
                                                                    }
                                                             ?>
                                                         </div>
                                                         <div class="col-md-6">
                                                             <div id="companytindiv" class="form-group label-floating">
                                                                <label class="control-label">Company TIN</label>
                                                                <input type="text" id="companytin" class="form-control" value="<?=$companytin?>" data-parsley-required>
                                                            </div>
                                                             <?php
                                                                    if(!empty($logo)){
                                                             ?>
                                                             <div class="container"><div class="col-md-1" style="padding-left: 0px;  padding-right: 0px;">
                                                                    <img src="<?=$logo?>" class="img-responsive">
                                                                </div>
                                                            </div>
                                                           
                                                             <?php
                                                                    }
                                                             ?>
                                                         </div>      
                                                              
                                                                
                                                       
                                                    </div>
                                                        </div>

                                                    </div>
                                             </div>
                                    </div>
                                
                                    <div class="card card-nav-tabs cardtopmargin">
                                            <div id="tabtitle" class="header  header-info">
                                                <!-- colors: "header-primary", "header-info", "header-success", "header-warning", "header-danger" -->
                                                <div class="nav-tabs-navigation">
                                                    <div class="nav-tabs-wrapper">
                                                        <ul class="nav nav-tabs" data-tabs="tabs">
                                                            <li class="active">
                                                                <a href="#profile" data-toggle="tab">
                                                                    <i class="material-icons">description</i>
                                                                    Contact Person
                                                                </a>
                                                            </li>										
                                                        </ul>
                                                    </div>
                                                </div>
                                          </div>
                                             <div class="content">
                                                    <div class="tab-content">
                                                        <div class="tab-pane active" id="profile">
                                                            <div class="row">
                                                            <div class="col-md-12">    
                                                                <div id="cpersondiv" class="form-group label-floating">
                                                                    <label class="control-label">Contact Person</label>
                                                                    <input type="text" id="cperson" class="form-control" value="<?=$cperson?>" data-parsley-required>
                                                                </div>
                                                                <div id="designationdiv" class="form-group label-floating">
                                                                    <label class="control-label">Designation</label>
                                                                    <input type="text" id="designation" class="form-control" value="<?=$designation?>" data-parsley-required>
                                                                </div>
                                                             </div>   
                                                                <div class="col-md-6">
                                                                    <div id="cpersonemaildiv" class="form-group label-floating">
                                                                        <label class="control-label">Email</label>
                                                                        <input type="text" id="cpersonemail" value="<?=$cpersonemail?>" class="form-control" data-parsley-type="email">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div id="cpersontelnodiv" class="form-group label-floating">
                                                                        <label class="control-label">Tel No</label>
                                                                        <input type="text" id="cpersontelno" value="<?=$cpersontelno?>" class="form-control" data-parsley-required data-parsley-pattern="^[\d\+\-\.\(\)\/\s]*$">
                                                                    </div>
                                                                </div>    
                                                               
                                                        </div>
                                                        </div>       
                                                    </div>
                                             </div>
                                    </div>
                                
                                    <div class="card card-nav-tabs cardtopmargin">
                                            <div id="tabtitle" class="header  header-warning">
                                                <!-- colors: "header-primary", "header-info", "header-success", "header-warning", "header-danger" -->
                                                <div class="nav-tabs-navigation">
                                                    <div class="nav-tabs-wrapper">
                                                        <ul class="nav nav-tabs" data-tabs="tabs">
                                                            <li class="active">
                                                                <a href="#profile" data-toggle="tab">
                                                                    <i class="material-icons">note_add</i>
                                                                    Other Information
                                                                </a>
                                                            </li>										
                                                        </ul>
                                                    </div>
                                                </div>
                                          </div>
                                             <div class="content">
                                                    <div class="tab-content">
                                                        <div class="tab-pane active" id="profile">
                                                            
                                                            <div class="col-md-6">
                                                               
                                                                <div id="industrydiv" class="form-group label-floating">
                                                                    <label class="control-label">Industry</label>
                                                                    <input type="text" id="industry" value="<?=$industry?>" class="form-control">
                                                                </div>
                                                                <div id="numempdiv" class="form-group label-floating">
                                                                    <label class="control-label">Number of Employees</label>
                                                                    <input type="text" id="numemp" class="form-control" value="<?=$numemp?>"  data-parsley-type="number">
                                                                </div>
                                                               
                                                            </div>
                                                            <div class="col-md-6">
                                                             <div id="typediv" class="form-group label-floating">
                                                                <label class="control-label">Type of Company</label>
                                                                <select class="form-control" id="ctype" name="ctype"  placeholder="Position Level">       
                                                                           <option value='1' <?php if($ctype==1){echo' selected';}?>>Direct Employer</option>
                                                                           <option value='2' <?php if($ctype==2){echo' selected';}?>>Recruitment Agency</option> 
                                                                </select>
                                                            </div> 
                                                            </div>    
                                                            <div class="col-md-12">
                                                                Company Description
                                                            <div id="cdesc"><?=$cdesc?></div>
                                                                    
                                                             
                                                            </div>
                                                            
                                                        </div>

                                                    </div>
                                             </div>
                                    </div>
                                    <div class="card card-nav-tabs cardtopmargin">
                                            <div id="tabtitle" class="header  header-primary">
                                                <!-- colors: "header-primary", "header-info", "header-success", "header-warning", "header-danger" -->
                                                <div class="nav-tabs-navigation">
                                                    <div class="nav-tabs-wrapper">
                                                        <ul class="nav nav-tabs" data-tabs="tabs">
                                                            <li class="active">
                                                                <a href="#profile" data-toggle="tab">
                                                                    <i class="material-icons">description</i>
                                                                    Terms &amp; Conditions
                                                                </a>
                                                            </li>										
                                                        </ul>
                                                    </div>
                                                </div>
                                          </div>
                                             <div class="content">
                                                    <div class="tab-content">
                                                        <div class="tab-pane active" id="profile">
                                                            <div class="row">
                                                            <div class="col-md-12">    
                                                                <div id="cpersondiv" class="form-group label-floating">
                                                                   <p> This Service Agreement is binding between Jobsly.net and the Company, hereafter referred to as “Advertiser”.</p>  

 <p>Each job post is provided 90 days exposure.<br>

 <p>All job advertisements ordered by the Advertiser will be posted through the Advertiser’s account and
will be stored for 6 months from posting date.</p>

 <p>Posting another job advertisement with the same ad creation parameters is allowed only after 14 days to avoid spamming. </p>

 <p>Jobsly.net reserves the right to delete job posts and suspend access to any and all aspects of its service at any time should the Advertiser violate the Terms of Use. </p>

 <p>All job advertisements are not to be used for applicant solicitation for purchase of products / services, compilation of database information for any unauthorized use or sale, disclosure to any third party, contact with the user for any purpose other than potential employment, or for any other purpose which is not consistent with Jobsly.net's Privacy Policy and these Terms of Use.</p>

 <p>All the resumes will be stored in the advertiser’s account for 6 months from the posting date of the advertisement or the retrieval / request date from the Resume Search database, whichever date is earlier.</p>

 <p>Advertiser agrees that Jobsly.net can use its name in all of Jobsly.net's advertisements and campaigns.</p>

I / We understand and agree to the terms and conditions of this agreement.

                                                                </div>
                                                              
                                                             </div>  
                                                        </div>
                                                        </div>       
                                                    </div>
                                             </div>
                                    </div>  
		                    </div>
                         
                                  
                                
                                
		               
		                     <div class="col-md-12">
                                
                                            <div class="savebutton">
                                                <button class="btn btn-primary " name="savepinfo" id="savepinfo" type="submit">Save Company Information</button>
                                            </div>       
                                             <div id="successdivcreg" name="successdivcreg" class="alert alert-success">
                                               
                                                  <div class="alert-icon">
                                                    <i class="material-icons">check</i>
                                                  </div>
                                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true"><i class="material-icons">clear</i></span>
                                                  </button>
                                                  <b>Alert: </b> Your Company Information has been saved.
                                               
                                            </div>
                                   
                            </div>
		                </div>
					</div>
	            </div>
                        
                        
                    
                        
                        
                    </div>
                    
                    
                <div class="col-md-3 pull-right">
                          <div class="card card-ads adsright">                                            
                                                             <div class="content">
                                                                                                                                       
                                                                            <div class="row">
                                                                                <div class="col-md-12">
                                                                                    <img alt="Bootstrap Image Preview" src="img/ad1.jpg" width="300" height="250" class="img-responsive" style="padding-top: 5px"/><img alt="Bootstrap Image Preview" src="http://lorempixel.com/300/250/" class="img-responsive" style="padding-top: 5px"/>
                                                                                </div>
                                                                               
                                                                            
                                                                            </div>
                                                                      
                                                             </div>
                                                    </div>
		       </div> 
            </form>


                </div>  
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

	
    
</body>

	<!--   Core JS Files   -->
	<script src="js/jquery.min.js" type="text/javascript"></script>
	<script src="js/bootstrap.min.js" type="text/javascript"></script>
	<script src="js/material.min.js"></script>
    <script src="js/parsley.js"></script>
    <script src="js/summernote.min.js" type="text/javascript"></script> 
    
	<!-- Control Center for Material Kit: activating the ripples, parallax effects, scripts from the example pages etc -->
	<script src="js/material-kit.js" type="text/javascript"></script>
    <script src="js/employer-main.js" type="text/javascript"></script>
<script>
$(document).ready(function() {
    $('#companyregistration-form').parsley({
                            successClass: "has-success",
                            errorClass: "has-error"
    });
    
    $('#cdesc').summernote({
                                                                                      toolbar: [
                                                                                        // [groupName, [list of button]]
                                                                                        ['style', ['bold', 'italic', 'underline', 'clear']], 
                                                                                        ['fontsize', ['fontsize']],
                                                                                        ['color', ['color']],
                                                                                        ['para', ['ul', 'ol', 'paragraph']]
                                                                                      ],
                                                                                      callbacks: {
                                                                                        onPaste: function (e) {
                                                                                            var bufferText = ((e.originalEvent || e).clipboardData || window.clipboardData).getData('Text');

                                                                                            e.preventDefault();

                                                                                            // Firefox fix
                                                                                            setTimeout(function () {
                                                                                                document.execCommand('insertText', false, bufferText);
                                                                                            }, 10);
                                                                                        }
                                                                                    }    
                                                                                    });
   
    $('#companyregistration-form #companyname').parsley().on('field:error', function() {
           $('#companyregistration-form #companynameediv').addClass('has-error');
           $('#companyregistration-form #companynameediv').append("<span class='material-icons form-control-feedback'>clear</span>");   
    });    
    $('#companyregistration-form #companyname').parsley().on('field:success', function() {
            $('#companyregistration-form #companynameediv').addClass('has-success');
            $('#companyregistration-form #companynameediv').find('span').remove()
            $('#companyregistration-form #companynameediv').append("<span class='material-icons form-control-feedback'>done</span>");   
    });
    $('#companyregistration-form #companyaddress').parsley().on('field:error', function() {
           $('#companyregistration-form #companyaddressdiv').addClass('has-error');
           $('#companyregistration-form #companyaddressdiv').append("<span class='material-icons form-control-feedback'>clear</span>");   
    });    
    $('#companyregistration-form #companyaddress').parsley().on('field:success', function() {
            $('#companyregistration-form #companyaddressdiv').addClass('has-success');
            $('#companyregistration-form #companyaddressdiv').find('span').remove()
            $('#companyregistration-form #companynamediv').append("<span class='material-icons form-control-feedback'>done</span>");   
    });
  
    
         
    
});       
</script>
     
 

</html>
<?php
} else{
    include 'logout.php';
    
}
?>