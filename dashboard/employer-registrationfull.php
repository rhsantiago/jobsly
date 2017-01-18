<?php
session_start();
if(isset($_SESSION['user'])){
   $user = $_SESSION['user'];
   $password = $_SESSION['password'];
   $userid = $_SESSION['userid'];
   $usertype = $_SESSION['usertype'];
    
   include 'authenticate.php';
}

if($ok == 1 ){
  
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
  

</head>

<body class="landing-page">
     <!-- Modal -->
	<div class="modal fullscreen-modal fade" id="viewresume-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
                    
<?php
    $companyname='';
    $telno='';
    $companyaddress='';
    $companytin='';
    $companywebsite='';
?>


<form method="post" id="companyregistration-form" name="companyregistration-form" data-parsley-trigger="keyup" data-parsley-validate>                    
                    <input type="hidden" id="mode" name="mode" value="<?=$mode?>">
                    <input type="hidden" id="userid" name="userid" value="<?=$userid?>">
                    <input type="hidden" id="templateid" name="templateid" value="<?=$templateid?>">
    
    
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
                                                     
                                                            <div id="telnodiv" class="form-group label-floating">
                                                                <label class="control-label">Tel No.</label>
                                                                <input type="text" id="telno" class="form-control" value="<?=$telno?>" data-parsley-required data-parsley-pattern="^[\d\+\-\.\(\)\/\s]*$">
                                                            </div>
                                                            <div id="companyaddressdiv" class="form-group label-floating">
                                                                <label class="control-label">Company Address</label>
                                                                <input type="text" id="companyaddress" class="form-control" value="<?=$companyaddress?>" data-parsley-required>
                                                            </div>
                                                            <div id="companytindiv" class="form-group label-floating">
                                                                <label class="control-label">Company TIN</label>
                                                                <input type="text" id="companytin" class="form-control" value="<?=$companytin?>" data-parsley-required>
                                                            </div>
                                                            <div id="companywebsitediv" class="form-group label-floating">
                                                                <label class="control-label">Company Website</label>
                                                                <input type="text" id="companywebsite" class="form-control" value="<?=$companywebsite?>">
                                                            </div> 
                                                            <div id="companywebsitediv" class="">
                                                                <label class="control-label">Company Website</label>
                                                                <input type="file" id="companywebsite" class="" value="<?=$companywebsite?>">
                                                            </div>         
                                                        
                                                            <div id="pleveldiv" class="form-group label-floating">
                                                                <label class="control-label">Position Level</label>
                                                                <select class="form-control" id="plevel" name="plevel"  placeholder="Position Level">       
                                                                           <option value='1' <?php if($plevel==1){echo' selected';}?>>Executive</option>
                                                                           <option value='2' <?php if($plevel==2){echo' selected';}?>>Manager</option> 
                                                                </select>
                                                            </div>        
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
                                                            Describe applicant requirements, responsibilities and relevant information
                                                                    <div id="jobdesc"><?=$jobdesc?></div>
                                                                    
                                                                          <script>
                                                                            $(document).ready(function() {
                                                                               $('#jobdesc').summernote({
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
                                                                            });
                                                                            </script>
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
                                                                    Optional Details
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
                                                                <div id="nvacanciesdiv" class="form-group label-floating">
                                                                    <label class="control-label">Number of Vancancies</label>
                                                                    <input type="text" id="nvacancies" class="form-control" value="<?=$nvacancies?>" data-parsley-type="number">
                                                                </div>
                                                                <div id="citydiv" class="form-group label-floating">
                                                                    <label class="control-label">City</label>
                                                                    <input type="text" id="city" value="<?=$city?>" class="form-control">
                                                                </div>
                                                                <div id="provincediv" class="form-group label-floating">
                                                                    <label class="control-label">Province</label>
                                                                    <input type="text" id="province" value="<?=$province?>" class="form-control">
                                                                </div>
                                                                <div id="countrydiv" class="form-group label-floating">
                                                                    <label class="control-label">Country</label>
                                                                    <input type="text" id="country" value="<?=$country?>" class="form-control">
                                                                </div>
                                                                <div id="yrsexpdiv" class="form-group label-floating">
                                                                    <label class="control-label">Years of Experience</label>
                                                                    <input type="text" id="yrsexp" class="form-control" value="<?=$yrsexp?>"  data-parsley-type="number">
                                                                </div>
                                                                <div id="mineducdiv" class="form-group label-floating">
                                                                    <label class="control-label">Educational Attainment</label>
                                                                    <input type="text" id="mineduc" value="<?=$mineduc?>" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                            <div id="prefcoursediv" class="form-group label-floating">
                                                                <label class="control-label">Preferred Course</label>
                                                                <input type="text" id="prefcourse" value="<?=$prefcourse?>" class="form-control">
                                                            </div>
                                                            <div id="languagesdiv" class="form-group label-floating">
                                                                <label class="control-label">Languages</label>
                                                                <input type="text" id="languages" value="<?=$languages?>" class="form-control">
                                                            </div>
                                                            <div id="licensesdiv" class="form-group label-floating">
                                                                <label class="control-label">Licenses</label>
                                                                <input type="text" id="licenses" value="<?=$licenses?>" class="form-control">
                                                            </div>
                                                            <div id="wtraveldiv" class="form-group">
                                                                         <div class="checkbox">
                                                                            <label>
                                                                                    <input type="checkbox" id="wtravel" name="optionsCheckboxes" <?=$wtravel?>>
                                                                                Show Willing to Travel?
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                            <div id="wrelocatediv" class="form-group">
                                                                         <div class="checkbox">
                                                                            <label>
                                                                                    <input type="checkbox" id="wrelocate" name="optionsCheckboxes" <?=$wrelocate?>>
                                                                                Show Willing to Relocate?
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                            </div> 
                                                            
                                                            <div class="col-md-12">
                                                                 
                                                                <div id="essaydiv" class="form-group label-floating">
                                                                   
                                                                <label class="control-label">Select a pre-made essay question or create a new one below</label>
                                                                    <select class="form-control" id="essayselect" name="essayselect"  placeholder="Essay" data-parsley-required>
                                                                            <?php                     
                                                                                  $database->query('SELECT id,question FROM jobessays where userid = :userid');
                                                                                  $database->bind(':userid', $userid);  
                                                                                  $rows = $database->resultset();

                                                                                  foreach($rows as $row){
                                                                                       $id=$row['id'];
                                                                                       $question=$row['question'];
                                                                            ?>
                                                                               <option value="<?=$question?>"><?=$question?></option>
                                                                            <?php
                                                                                  }
                                                                            ?>
                                                                    </select>
                                                                </div>
                                                                    <div id="essaydiv" class="form-group label-floating">                                                                   
                                                                        <input type="text" id="essay" value="<?=$essay?>" class="form-control">
                                                                    </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                             </div>
                                    </div>
                                
		                    </div>
                         
                                    
                                
                                
		               
		                     <div class="col-md-12">
                                
                                            <div class="savebutton">
                                                <button class="btn btn-primary " name="savepinfo" id="savepinfo" type="submit">Save and Go to Next Step</button>
                                            </div>       
                                             <div id="successdivpinfo" class="alert alert-success">
                                               
                                                  <div class="alert-icon">
                                                    <i class="material-icons">check</i>
                                                  </div>
                                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true"><i class="material-icons">clear</i></span>
                                                  </button>
                                                  <b>Alert: </b> Your Job Details has been saved.
                                               
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

<script>
jQuery(document).ready(function ($) {
    
    $('#templatejobdetail-form #essayselect').on('change', function() {
       $("#templatejobdetail-form #essay").val($('#templatejobdetail-form #essayselect').val());
    });
  
    
         
    
});       
</script>
                      
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

      if(window.screen.width > 768){    
        openNav();
      }
</script>

</html>
<?php
} else{
    include 'logout.php';
    
}
?>