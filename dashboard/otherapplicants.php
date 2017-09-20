<?php
if (session_status() == PHP_SESSION_NONE) {
        session_start();   
}
if(isset($_SESSION['user'])){
   $user = $_SESSION['user'];
   $password = $_SESSION['password'];
   $userid = $_SESSION['userid'];
   $usertype = $_SESSION['usertype'];
    
   include 'authenticate.php';
      
}else{
    header("Location: logout.php");
}

if($ok == 1 ){
   
     date_default_timezone_set('Asia/Manila');
     $logtimestamp = date("Y-m-d H:i:s");
     include "serverlogconfig.php";
     
include 'specialization.php';
$isjobseeker = '';
if(isset($_GET['jobid'])){ $jobid = $_GET['jobid']; }
if(isset($_GET['isjobseeker'])){ $isjobseeker = $_GET['isjobseeker']; }

 $database = new Database();
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="img/favicon.ico">
	<link rel="icon" href="img/favicon.ico">
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
<script src="js/jquery.min.js" type="text/javascript"></script>

</head>

<body class="landing-page">
      
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
               
                </div>
            </div>
            </div>
        </div>
   
   <?php
            $database->query('select distinct count(id) as totapp from jobapplications where jobid=:jobid');
            $database->bind(':jobid', $jobid);   
            try{
                $row = $database->single();
            }catch (PDOException $e) {
                $msg = $e->getTraceAsString()." ".$e->getMessage();
                $log->error($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
                die("");
            }     
            $totapp = $row['totapp'];    
    ?>
   
    <div id="main" class="wrapper ">       

		<div class="main main-raised ">
         
			<div class="container-fluid"> <!-- with fluid for full width -->
                <div class="row-fluid">   <!-- with fluid for full width -->
                    
                    <div id="resume-main-body">                       
              
                        <?php

     
    $months = array('Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec');
    $positionlevels = array('Executive','Manager','Assistant Manager','Supervisor','5 Years+ Experienced Employee','1-4 Years Experienced Employee','1 Year Experienced Employee/Fresh Grad');

?>
<div class="row">
    <div class="col-md-12 center">            
                    <div class="adstop">     <img  src="https://lh5.ggpht.com/NFYFP2H9CCP50vAQNLa7AtCj_mbbYmOzY978fZqd31oL5qOdvXgxU3KW8ek2VgvIOvTqWY0=w728" 
                                 alt="user">  
                     </div>    
                           
     </div>
   
   
     </div>
     <div class="col-md-offset-1 col-md-7">
                       
                <div class="section  section-landing">
					<div class="features">
						<div class="row">
                           <div class="col-md-12">
                                <?php
                                $database->query('SELECT distinct jobads.id,jobads.jobtitle,jobads.company,jobads.specialization,jobads.plevel, jobads.jobtype,jobads.msalary,jobads.maxsalary,jobads.startappdate,jobads.endappdate,jobads.dateadded,jobapplications.isnew,jobapplications.isshortlisted,companyinfo.logo from jobads,jobapplications,companyinfo where jobapplications.userid = :userid and jobads.id = jobapplications.jobid and jobads.userid=companyinfo.userid');
                                $database->bind(':userid', $userid);   
                                try{
                                    $row = $database->single();
                                }catch (PDOException $e) {
                                    $msg = $e->getTraceAsString()." ".$e->getMessage();
                                    $log->error($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
                                    die("");
                                }     
                             
                                    $id = $row['id'];
                                    $logo = $row['logo'];
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

                                    $dateadded = $row['dateadded'];
                                    $dadd = explode("-", $dateadded);
                                    $dateadded = $dadd[1] .'/'.$dadd[2].'/'.$dadd[0];
                                    $isnew = $row['isnew'];
                                    $isshortlisted = $row['isshortlisted'];
                                    

                               
                                
                         ?>
                                
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
                                                    
                                                <div class="col-md-6  jobad-titletopmargin">
                                                         <a class="nodecor" target="_blank" href="viewjob-newpage.php?jobid=<?=$id?>&mode=view&isjobseeker=<?=$isjobseeker?>" id="viewjobnewpage"><h2 class="text-info jobad-title"><?=$jobtitle?></h2></a>
                                                        <div class="companypos">
                                                            <h6 class="text-muted"><i><?=$company?></i></h6>
                                                        </div> 
                                                </div>
                                                <div class="col-md-6">
                                                    
                                                    <div class="companylogo" align="right"> 
                                                        <img src="<?=$logo?>" width="70" height="70" class="img-responsive">
                                                    </div>
                                                </div>
                                            </div>    
                                            <div class="row-fluid">
                                                  
                                                <div class="col-md-12">
                                                    <div>
                                                     <span class='text-success h4weight'><?=$totapp?>&nbsp;Total applicants</span>
                                                    </div>
                                                        
                                                </div>
                                          </div> 
                                          
                                          
                                        </div>                                  
                                         
                                      </div>
                                        
                                        
                                    </div>
                                  </section>
                          
                            </div>   
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            <div class="col-md-12">
                                    <section class="blog-post">
                                    <div class="panel panel-default">                                    
                                      <div class="panel-body jobad-bottomborder">
                                          <div><h4 class="text-info h4weight">Other Applicants</h4></div>
                                    <div class="table-responsive">      
                                     <table class="table table-hover table-condensed">
                                            <thead>
                                                <tr>
                                                    <th>Latest Position</th>
                                                    <th class="col-md-2">Years of Experience</th>
                                                    <th class="col-md-2">Expected Salary</th>                                                   
                                                    <th>Educational Attainment</th>
                                           
                                                </tr>
                                            </thead>
                                            <tbody>
                              
                                        <?php
                                            $database->query('Select distinct jobapplications.userid, workexperience.position,jobapplications.esalary,yexp, colmajor from workexperience, jobapplications,additionalinformation, educationandtraining where jobapplications.jobid=:jobid and workexperience.startdate = (select max(startdate) from workexperience where workexperience.userid=jobapplications.userid) and workexperience.userid=jobapplications.userid and additionalinformation.userid=jobapplications.userid and educationandtraining.userid=jobapplications.userid order by esalary desc limit 0,10');
                                            $database->bind(':jobid', $jobid);                                             
                                            try{    
                                                $rows2 = $database->resultset();
                                            }catch (PDOException $e) {
                                                $msg = $e->getTraceAsString()." ".$e->getMessage();
                                                $log->error($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
                                                die("");
                                            }    
                                            foreach($rows2 as $row2){
                                                $applicantid = $row2['userid']; 
                                                $position = $row2['position'];
                                                $esalary = $row2['esalary'];
                                                $yexp = $row2['yexp'];
                                                $colmajor = $row2['colmajor'];
                                                
                                                if($applicantid==$userid){
                                       ?>
                                   
                                                <tr class="text-info">
                                        <?php
                                                }else{
                                        ?>            
                                                <tr>        
                                        <?php
                                                }
                                        ?>        
                                                    <td>
                                                        <ul class="list-inline"> 
                                                            <li>
                                                                <span class="h4weight"><?=$position?></span>
                                                            </li>
                                                       
                                                        </ul>
                                                    </td>
                                                    <td><?=$yexp?></td>     
                                                    <td>Php <?=$esalary?></td>
                                                    <td><?=$colmajor?></td>         
                                                 
                                                </tr>
                                            <?php
                                            }
                                            ?>
                                                
                                            </tbody>
                                        </table>
                                      </div>    
                                        </div>  
                                    </div>
                                  </section>
                            </div>
                        </div>
                    </div>
                                </div>
                                
                           
	      </div>
	      <div class="col-md-3 pull-right">
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

                </div> 
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

	<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/
	<script src="js/nouislider.min.js" type="text/javascript"></script>  -->

	<!--  Plugin for the Datepicker, full documentation here: http://www.eyecon.ro/bootstrap-datepicker/ -->
	<script src="js/bootstrap-datepicker.js" type="text/javascript"></script>

	<!-- Control Center for Material Kit: activating the ripples, parallax effects, scripts from the example pages etc -->
	<script src="js/material-kit.js" type="text/javascript"></script>
    <script src="js/jobseeker-main.js" type="text/javascript"></script>
    <script src="js/parsley.js"></script>
     
    <script>

        
        
jQuery(document).ready(function ($) {
    $(function() {
       $.material.init();
    });
    
    
});             
</script>


</html>
<?php
} else{
    include 'logout.php';
    
}
?>