<?php
if (session_status() == PHP_SESSION_NONE) {
        session_start();
         if (!isset($database)){
           // include 'Database.php';
         }
    }
if(isset($_SESSION['user'])){
   $user = $_SESSION['user'];
   $password = $_SESSION['password'];
   $userid = $_SESSION['userid'];
   $usertype = $_SESSION['usertype'];
    
   include 'authenticate.php';
   
}

if($ok == 1 ){
    if(isset($_GET['jobid'])){ $jobid = $_GET['jobid']; } 
    if(isset($_GET['page'])){ $page = $_GET['page']; } 
    date_default_timezone_set('Asia/Manila');
    $today = date("Y-m-d"); 
    $logtimestamp = date("Y-m-d H:i:s");
    include "serverlogconfig.php";    
    include 'specialization.php';  
    $database = new Database();

    $months = array('Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec');
    $positionlevels = array('Executive','Manager','Assistant Manager','Supervisor','5 Years+ Experienced Employee','1-4 Years Experienced Employee','1 Year Experienced Employee/Fresh Grad');
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
               
        		<a class="navbar-brand logo" >jobsly</a>
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
    
    <div class="row">
    <div class="col-md-12 center">            
                    <div class="adstop">     <img  src="https://lh5.ggpht.com/NFYFP2H9CCP50vAQNLa7AtCj_mbbYmOzY978fZqd31oL5qOdvXgxU3KW8ek2VgvIOvTqWY0=w728" 
                                 alt="user">  
                     </div>    
                           
     </div>
   
    <div class="col-md-12">        
            <h2 class="title">Job Details</h2>
          
       </div>
     </div>
    <div class="col-md-9">
                       
                <div class="section  section-landing">
	                 

					<div class="features">
						<div class="row">
                                                     
                            <div class="col-md-12">
                           <div class="alljobsdiv">
                          <?php
                                //$database->query('SELECT * from jobads where id = :jobid and isactive=1 order by dateadded desc');
                               $database->query('SELECT jobads.id,jobads.jobtitle,jobads.company,jobads.specialization, jobads.plevel,jobads.jobtype,jobads.msalary, jobads.maxsalary,jobads.startappdate,jobads.endappdate,jobads.teaser,jobads.dateadded, companyinfo.logo from jobads,companyinfo where jobads.id = :jobid and jobads.userid = :userid and companyinfo.userid = :userid and isactive=1 order by jobads.dateadded desc');
                                $database->bind(':jobid', $jobid);
                                $database->bind(':userid', $userid);
                                try{
                                    $row = $database->single();
                                }catch (PDOException $e) {
                                    $msg = $e->getTraceAsString()." ".$e->getMessage();
                                    $log->error($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
                                    die("");
                                }    
                                    $id = $row['id'];
                                    $jobtitle = $row['jobtitle'];
                                    $company = $row['company'];
                                    $specialization = $row['specialization'];
                                    $plevel = $row['plevel'];
                                    $jobtype = $row['jobtype'];
                                    $msalary = $row['msalary'];
                                    $maxsalary = $row['maxsalary'];
                                    $startappdate = $row['startappdate'];
                                    $sdate = explode("-", $startappdate);
                                    $startappdate = $sdate[1] .'/'.$sdate[2].'/'.$sdate[0];
                                    $endappdate = $row['endappdate'];
                                    $edate = explode("-", $endappdate);
                                    $endappdate = $edate[1] .'/'.$edate[2].'/'.$edate[0];   
                                    $teaser = $row['teaser'];
                                    $dateadded = $row['dateadded'];
                                    $dadd = explode("-", $dateadded);
                                    $dateadded = $dadd[1] .'/'.$dadd[2].'/'.$dadd[0]; 
                                    $logo = $row['logo'];
                               
                                     $database->query('select (select count(id) from jobapplications where jobid=:jobid and isreject=0) as aapps,(select count(id) from jobapplications where jobid=:jobid and isreject=0 and (isnew=1 or dateapplied=:today)) as napps,(select count(id) from jobapplications where jobid=:jobid and isshortlisted=1 and isreject=0) as shortlisted from jobapplications');
                                     $database->bind(':jobid', $id);
                                     $database->bind(':today', $today);
                                     try{
                                         $row = $database->single();  
                                     }catch (PDOException $e) {
                                        $msg = $e->getTraceAsString()." ".$e->getMessage();
                                        $log->error($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
                                        die("");
                                     }   
                                     $aapps = $row['aapps'];
                                     $napps = $row['napps'];
                                     $shortlisted = $row['shortlisted'];
                               
                                     $database->query('SELECT count( distinct personalinformation.userid) as matched from personalinformation,additionalinformation, jobapplications where personalinformation.userid = additionalinformation.userid and  additionalinformation.specialization=:specialization and personalinformation.userid not in (select  jobapplications.userid from jobapplications where jobapplications.jobid=:jobid)');
                                            $database->bind(':specialization', $specialization); 
                                            $database->bind(':jobid', $id); 
                                            try{    
                                                $row2= $database->single();
                                            }catch (PDOException $e) {
                                                $msg = $e->getTraceAsString()." ".$e->getMessage();
                                                $log->error($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
                                                die("");
                                            }   
                                     $matched = $row2['matched'];  
                               
                                    
                         ?>
                                <form method="post" id="jobdetails" name="jobdetails">                    
                                    <input type="hidden" id="jobid" name="jobid" value="<?=$id?>">
                                </form>
                                <section class="blog-post">
                                    <div class="panel panel-default">
                                    
                                      <div class="panel-body jobad-bottomborder">
                                          <div class="jobad-meta jobad-bottomborder">
                                      <p class="blog-post-date pull-right text-muted"><?=$months[$dadd[1]-1]?>&nbsp;<?=$dadd[2]?>,&nbsp;<?=$dadd[0]?></p>
                                               <ul  class="list-inline ">
                                                                                           
                                                                                            <li>
                                                                                                <h6 id="vertical-align" class="text-muted jobadheader">
                                                                                                   <i class="material-icons text-info jobadheadericon">domain</i> &nbsp;<?=$specarray[$specialization]?>
                                                                                                </h6>
                                                                                            </li>
                                                                                            <li>
                                                                                                <h6 id="vertical-align" class="text-muted jobadheader">
                                                                                                <i class="material-icons text-info jobadheadericon">date_range</i>&nbsp;<?=$positionlevels[$plevel-1]?>
                                                                                                </h6>
                                                                                            </li>
                                                                                            <li>
                                                                                                <h6 id="vertical-align" class="text-muted jobadheader">
                                                                                                   <i class="material-icons text-info jobadheadericon">local_atm</i> &nbsp;Php <?=$msalary?> - <?=$maxsalary?>
                                                                                                </h6>
                                                                                            </li>
                                                                                        </ul>
                                          
                                        </div>
                                     
                                        <div class="blog-post-content">
                                            
                                            <div class="row-fluid">
                                                <div class="col-md-6 jobad-titletopmargin">
                                                    
                                                         <a class="nodecor" href='#showjobmodal' data-toggle="modal" data-target="#showjob-modal" data-jobid="<?=$id?>" data-mode="view" data-employer="employer"><h2 class="text-info jobad-title"><?=$jobtitle?></h2></a>
                                                        <div class="companypos">
                                                            <h6 class="text-muted"><i><?=$company?></i></h6>
                                                        </div> 
                                                    
                                                    
                                                </div>
                                                
                                                <div class="col-md-6">
                                                    <div class="companylogo"  align='right'> 
                                                        <img src="<?=$logo?>" width="70" height="70" class="img-responsive">
                                                    </div>
                                                    
                                                </div>
                                                <div class="col-md-12" align="left">
                                              <?=$teaser?>
                                                        </div>
                                            </div>
                                              
                                            </div>                                  
                                            <div class="row-fluid">
                                               
                                                <div class="col-md-6 actionicon pull-right">                                                   
                                                        <span class="jobcardbuttons h4weight"><a class="blog-post-share " href='#showjobmodal' data-toggle="modal" data-target="#showjob-modal" data-jobid="<?=$id?>" data-mode="view" data-employer="employer"  title="View Job"><i class="material-icons" >visibility</i> View Job</a></span>   
                                                </div>
                                          </div> 
                                      </div>
                                        
                                        
                                    </div>
                                  </section>
                             
                                </div> 
                                
                                
                                
                            </div>  
                        
                          <!--    <div class="col-lg-3 col-md-6 col-sm-6"> -->
                            <div class="row-fluid">
                            <div class="col-lg-3 col-md-3"> 
                                    <div  class="card card-stats" >
                                        <div class="card-header cardmargin" data-background-color="purple">
                                            <h3 class="center marginjobdetaillink"><a href="#activeapps" id="activeapps" class="text-primary h4weight pull-right" data-jobid="<?=$id?>"><span id="aappsdiv"><?=$aapps?></span></a></h3>
                                        </div>
                                      <a href="#activeapps" id="activeapps" class="text-primary h4weight pull-right  marginjobdetaillink" data-jobid="<?=$id?>">Active<br>Applications</a>
                                        
                                    </div>
						      </div>
                            <div class="col-lg-3 col-md-3"> 
                                    <div  class="card card-stats ">
                                        <div class="card-header cardmargin" data-background-color="blue">
                                            <h3 class="center marginjobdetaillink"><a href="#newapps" id="newapps" class="text-primary h4weight pull-right" data-jobid="<?=$id?>"><span id="nappsdiv"><?=$napps?></span></a></h3>
                                        </div>                                        
                                            <a href="#newapps" id="newapps" class="text-info h4weight pull-right marginjobdetaillink" data-jobid="<?=$id?>">New<br>Applications</a>
                                    </div>                                  
						    </div>
                                <div class="col-lg-3 col-md-3"> 
                                     <div  class="card card-stats ">
                                        <div class="card-header cardmargin" data-background-color="green">
                                            <h3 class="center marginjobdetaillink"><a href="#shortlisted" id="shortlisted" class="text-success h4weight pull-right" data-jobid="<?=$id?>"><span id="shortlistdiv"><?=$shortlisted?></span></a></h3>
                                        </div>
                                            <a href="#shortlisted" id="shortlisted" class="text-success h4weight pull-right marginjobdetaillink" data-jobid="<?=$id?>">Shortlisted<br>Applicants</a>		
                                    </div>   
						      </div>
                               <div class="col-lg-3 col-md-3"> 
                                     <div  class="card card-stats ">
                                        <div class="card-header cardmargin" data-background-color="orange">
                                            <h3 class="center marginjobdetaillink"><a href="#matched" id="matched" class="text-success h4weight pull-right" data-jobid="<?=$id?>"><span id="shortlistdiv"><?=$matched?></span></a></h3>
                                        </div>
                                            <a href="#matched" id="matched" class="text-warning h4weight pull-right marginjobdetaillink" data-jobid="<?=$id?>">Matched<br>Resumes</a>		
                                    </div>   
						      </div>
                                
                            </div>
                            </div>
		                </div>
					</div>
	            </div>
                        
                        
                    
                        
                     
                    
                <div id="jobdetailads" class="col-md-3 pull-right">
                        <!--
                          <div class="card card-ads adsright">                                            
                               <div class="content">
                                 <div class="row">
                                     <div class="col-md-12">
                                          
                                     </div>
                                   </div>
                                </div>
                          </div>
                    -->
		       </div> 
            <div id="showjobdetail">
                            
                            
                            
                            </div>

<script>
   
$(document).ready(function ($) {
   <?php
    echo "$('#$page').click();";
    ?>
  
    
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

	

</html>
<?php
} else{
    include 'logout.php';
    
}
?>


