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
    $msg = "logged in";
    $log->info($logtimestamp." - ".$_SESSION['user'] . " " .$msg);
    include 'specialization.php';
    
    
    $database->query('select fname,lname,mnumber,myemail,photo,esalary,specialization from  personalinformation,useraccounts,additionalinformation where personalinformation.userid=:userid and useraccounts.id=:userid and additionalinformation.userid=:userid');
            $database->bind(':userid', $userid);   
            try{
            $row = $database->single();
            }catch (PDOException $e) {
                $msg = $e->getTraceAsString()." ".$e->getMessage();
                $log->error($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
                die("");
            }     
           
            $fname = $row['fname'];
            $lname = $row['lname'];
            $mnumber = $row['mnumber'];
            $myemail = $row['myemail'];
            $esalary = $row['esalary'];
            $specialization = $row['specialization'];
            $photo = $row['photo'];
    
            $database->query('select position as maxposition from workexperience where startdate = (select max(startdate) from workexperience where workexperience.userid=:userid)');
            $database->bind(':userid', $userid);   
            try{
            $row2 = $database->single();
            }catch (PDOException $e) {
                $msg = $e->getTraceAsString()." ".$e->getMessage();
                $log->error($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
                die("");
            }     
             $maxposition = $row2['maxposition'];
?>
<!doctype html>
<html lang="en">
<head>
 <!-- Google Tag Manager -->
<script>
 window.dataLayer = window.dataLayer || []; 
    </script>
    <script>
    var userId = <?=$userid?>;
    var specialization = "<?=$specarray[$specialization]?>";
    window.dataLayer.push({
        'userId': userId,
        'specialization': specialization
    });
    </script>    
<script>     
    (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-MKMGLRW');
</script>
<!-- End Google Tag Manager -->    
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="../img/apple-icon.png">
	<link rel="icon" type="image/png" href="../img/favicon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Jobseeker Home | Job Search | Post Resume | jobsly</title>
 	<meta name="description" content="Search for jobs or post job ads for free." />
 	<meta name="keywords" content="Jobs, Hiring, Career, Work, Resume, Call Center Jobs, Recruitment" />

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
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MKMGLRW"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->    
   <!-- Modal -->
	<div class="modal fullscreen-modal fade" id="showjob-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog modal-lg" role="document">
	    <div class="modal-content modalcontent">
	      
	    </div>
	  </div>
	</div>
    
    <div class="modal fullscreen-modal fade" id="savejob-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
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
                     <li>
                            <a onclick="openNav()"><i class="material-icons">dashboard</i></a>
                    </li>
                    <li><a href="jobseeker-home.php" id="home"><i class="material-icons">home</i>Home</a></li>
                    <li><a href="jobseeker-latestjobs.php"><i class="material-icons">whatshot</i>&nbsp;Latest Job Matches</a></li>
                    <li class="dropdown active"><a href="main.php" class="dropdown-toggle" data-toggle="dropdown" id="pinfo"><i class="material-icons">next_week</i>&nbsp;Applications<b class="caret"></b></a>
                         <ul class="dropdown-menu">
                                    <li><a href="main.php?ajax=aapp"><i class="material-icons">star</i>&nbsp;Active Applications</a></li>
                                    <li><a href="main.php?ajax=jinv"><i class="material-icons">drafts</i>&nbsp;Job Invitations</a></li> 
                                    <li><a href="main.php?ajax=sapp"><i class="material-icons">favorite</i>&nbsp;Saved Applications</a></li> 
                         </ul> 
                    </li>
                    <li class="dropdown active"><a href="resume.php" class="dropdown-toggle" data-toggle="dropdown"><i class="material-icons">description</i> Resume<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                           <li><a href="resume.php?ajax=pinfo" id="pinfo"><i class="material-icons">fingerprint</i>&nbsp;Personal Information</a></li>
                            <li><a href="resume.php?ajax=workexp" id="workexp"><i class="material-icons">work</i>&nbsp;Work Experience</a></li>
                            <li><a href="resume.php?ajax=etrain" id="etrain"><i class="material-icons">school</i>&nbsp;Education &amp; Training</a></li>
                            <li><a href="resume.php?ajax=skills" id="skills"><i class="material-icons">build</i>&nbsp;Skills</a></li>
                            <li><a href="resume.php?ajax=ainfo" id="ainfo"><i class="material-icons">add_box</i>&nbsp;Additional Information</a></li>
                            <li><a target="_blank" href="previewresume.php" id="pres"><i class="material-icons">pageview</i>&nbsp;Preview Resume</a></li>
                        </ul>    
                    </li>
                    <li><a href="logout.php" id="logout"><i class="material-icons">do_not_disturb</i>Sign Out</a></li>
    				
                </ul>
    				
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
    <!--sidebar-->
   <?php
      //  $database->query('select position as maxposition,fname,lname,mnumber,myemail,photo,esalary,specialization from workexperience, personalinformation,useraccounts,additionalinformation where personalinformation.userid=:userid and startdate = (select max(startdate) from workexperience where workexperience.userid=:userid) and useraccounts.id=:userid and additionalinformation.userid=:userid');
    
            
    ?>
    <!--sidebar-->
   <div id="mySidenav" class="sidenav">
  <!--<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>-->
       <div class="center sidenavmargin">
                                <div class="avatar center">
                                        <img src="<?=$photo?>" alt="Circle Image" width="100" height="100" class="img-circle img-responsive img-raised center">
                                    </div>
                                    <div class="name">
                                        <h4 class="sidenavname"><?=$fname?>&nbsp;<?=$lname?></h4>
                                        <h5 class="sidenavposition"><?=$maxposition?></h5>
                                    </div>  
       </div>
    <div class="sidebar-item"><a href="jobseeker-home.php"><i class="material-icons">home</i>&nbsp;Home</a></div>  
    <div class="sidebar-item"><a href="jobseeker-latestjobs.php"><i class="material-icons">whatshot</i>&nbsp;Latest Jobs</a></div>   
   <div class="sidebar-item dropdown"><a href="main.php" class="dropdown-toggle" data-toggle="dropdown" id="pinfo"><i class="material-icons">next_week</i>&nbsp;Applications<b class="caret"></b></a>
            <ul class="dropdown-menu">
                                    <li><a href="main.php?ajax=aapp"><i class="material-icons">star</i>&nbsp;Active Applications</a></li>
                                    <li><a href="main.php?ajax=jinv"><i class="material-icons">drafts</i>&nbsp;Job Invitations</a></li> 
                                    <li><a href="main.php?ajax=sapp"><i class="material-icons">favorite</i>&nbsp;Saved Applications</a></li>  
                         </ul> 
    </div>
   <div class="sidebar-item dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="resume.php"><i class="material-icons">description</i> Resume<b class="caret"></b></a>
    <ul class="dropdown-menu">
                            <li><a href="resume.php?ajax=pinfo" id="pinfo"><i class="material-icons">fingerprint</i>&nbsp;Personal Info</a></li>
                            <li><a href="resume.php?ajax=workexp" id="workexp"><i class="material-icons">work</i>&nbsp;Work Experience</a></li>
                            <li><a href="resume.php?ajax=etrain" id="etrain"><i class="material-icons">school</i>&nbsp;Education</a></li>
                            <li><a href="resume.php?ajax=skills" id="skills"><i class="material-icons">build</i>&nbsp;Skills</a></li>
                            <li><a href="resume.php?ajax=ainfo" id="ainfo"><i class="material-icons">add_box</i>&nbsp;Additional Info</a></li>
                            <li><a target="_blank" href="previewresume.php" id="pres"><i class="material-icons">pageview</i>&nbsp;Preview Resume</a></li>
                        </ul>
    </div>
  
</div>
    
     <!--sidebar-->
    <div id="main" class="wrapper ">
       

		<div class="main main-raised ">
         
			<div class="container-fluid"> <!-- with fluid for full width -->
                <div class="row-fluid">   <!-- with fluid for full width -->
                    
                    <div id="resume-main-body">                       
      <div class="row">
            <div class="col-md-12 center">            
               <div class="adstop"><img  src="https://lh5.ggpht.com/NFYFP2H9CCP50vAQNLa7AtCj_mbbYmOzY978fZqd31oL5qOdvXgxU3KW8ek2VgvIOvTqWY0=w728" 
                                         alt="user">  
                </div>    
             </div>
            <div class="col-md-12">
                  <h2 class="title">Home</h2>
            </div>
     </div>
                        
<div class="col-md-9">
                       
                <div class="section  section-landing">
	                 

					<div class="features">
						<div class="row">
                                                     
                            <div class="col-md-6">
                       
                                
                                <section class="blog-post">
                                    <div class="panel panel-default">
                                    
                                      <div class="panel-body">                                        
                                     
                                        <div class="blog-post-content">
                                            
                         <div class="row-fluid">
                           <div class="col-md-12">                                                    
                                <div align="left">
                                    <div class="avatar">
                                        <img src="<?=$photo?>" alt="Circle Image" width="120" height="120" class="img-circle img-responsive img-raised center">
                                    </div>
                                    <div class="name center">
                                        <h4 class="homename text-info"><?=$fname?>&nbsp;<?=$lname?></h4>
                                        <h5 class="homepos "><?=$maxposition?></h5>
                                    </div>  
                                 </div>
                            </div>  
                                                
                          </div>    <!--                              
                                         <div class="row-fluid">
                                               
                                                <div class="col-md-12 actionicon pull-right">
                                                        <a class="blog-post-share " href="#cinfo" id="cinfo" data-jobid="<?=$id?>" data-toggle="tooltip" data-placement="top" title="Edit"><i class="material-icons" >edit</i> Edit</a>
                                                       
                                                </div>
                                          </div> 
                                      
                                       -->   
                                       </div>
                                    </div>
                                    </div>
                                </section>
                            </div>  
                            <div class="col-md-6">
                       
                                
                                <section class="blog-post">
                                    <div class="panel panel-default">
                                    
                                      <div class="panel-body">                                        
                                     
                                        <div class="blog-post-content">
                                            
                                            <div class="row-fluid">
                                                <div class="col-md-12 jobad-titletopmargin">
                                                    <div class="hometopmargin40">
                                                            Expected Salary: <span class="text-info"><b><?=$esalary?></b></span><br>
                                                            Specialization: <span class="text-info"><b>
                                                         <?php
                                                         if(!empty($specialization)){
                                                            echo $specarray[$specialization];
                                                         }
                                                         ?>
                                                        </b></span><br>
                                                            Email: <span class="text-info"><b><?=$myemail?></b></span><br>  
                                                            Mobile Num: <span class="text-info"><b><?=$mnumber?></b></span><br>
                                                        
                                                     </div>   
                                                </div>  
                                            </div>
                                            <div class="row-fluid">
                                                <div class="col-md-12" >
                                                     
                                                        </div>
                                                <div class="col-md-12" align="left">
                                                    
                                                        </div>
                                          
                                          </div> 
                                        </div>   
                                          
                                         <div class="row-fluid">
                                               
                                                <div class="col-md-6 actionicon pull-right">
                                                        <a class="blog-post-share " href="resume.php?ajax=ainfo" id="ainfo"  title="Edit"><i class="material-icons" >edit</i> Edit</a>
                                                       
                                                </div>
                                          </div> 
                                      
                                      </div>
                                        
                                        
                                    </div>
                                  </section>
                                 
                            </div>  
                     <?php
                            $database->query('select count(id) as totaapps from jobapplications where userid=:userid and isreject = 0');
                            $database->bind(':userid', $userid);
                            try{
                                $row = $database->single();
                            }catch (PDOException $e) {
                                $msg = $e->getTraceAsString()." ".$e->getMessage();
                                $log->error($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
                                die("");
                            }    
                            $totaapps = $row['totaapps'];
    
                            $database->query('SELECT count(jobinvitations.id) as totinvites from jobinvitations where userid=:userid');
                            $database->bind(':userid', $userid);
                            try{    
                                $row = $database->single();
                            }catch (PDOException $e) {
                                $msg = $e->getTraceAsString()." ".$e->getMessage();
                                $log->error($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
                                die("");
                            }     
                            $totinvites = $row['totinvites'];
    
                            $database->query('SELECT count(savedapplications.id) as totsaved from savedapplications where userid=:userid');
                            $database->bind(':userid', $userid);
                            try{    
                                $row = $database->single();
                            }catch (PDOException $e) {
                                $msg = $e->getTraceAsString()." ".$e->getMessage();
                                $log->error($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
                                die("");
                            }     
                            $totsaved = $row['totsaved'];
    
                            $database->query('SELECT count(jobapplications.id) as shortlisted from jobapplications where jobapplications.jobid IN (select id from jobads where userid=:userid and jobads.isactive=1) and jobapplications.isshortlisted=1');
                            $database->bind(':userid', $userid);
                            try{    
                                $row = $database->single();
                            }catch (PDOException $e) {
                                $msg = $e->getTraceAsString()." ".$e->getMessage();
                                $log->error($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
                                die("");
                            }     
                            $shortlisted = $row['shortlisted'];
        
                     ?>
                                
                                
                                
                               <div class="row">
                                   <div class="col-lg-12"> 
                            <div class="col-lg-3 col-md-3"> 
                                    <div  class="card card-stats" >
                                        <div class="card-header cardmargin" data-background-color="purple">
                                            <h3 class="center marginjobdetaillink"><a href="main.php?ajax=aapp" class="text-primary h4weight pull-right"><span id="aappsdiv"><?=$totaapps?></span></a></h3>
                                        </div>
                                      <a href="main.php?ajax=aapp" class="text-primary h4weight pull-right  marginjobdetaillink">Total Active<br>Applications</a>
                                        
                                    </div>
						      </div>
                            <div class="col-lg-3 col-md-3"> 
                                    <div  class="card card-stats">
                                        <div class="card-header cardmargin" data-background-color="blue">
                                            <h3 class="center marginjobdetaillink"><a href="main.php?ajax=jinv"  class="text-primary h4weight pull-right"><span id="nappsdiv"><?=$totinvites?></span></a></h3>
                                        </div>                                        
                                            <a href="main.php?ajax=jinv" class="text-info h4weight pull-right marginjobdetaillink">Total Job<br>Invitations</a>
                                    </div>                                  
						    </div>
                                <div class="col-lg-3 col-md-3"> 
                                     <div  class="card card-stats">
                                        <div class="card-header cardmargin" data-background-color="green">
                                            <h3 class="center marginjobdetaillink"><a href="main.php?ajax=sapp"  class="text-success h4weight pull-right"><span id="shortlistdiv"><?=$totsaved?></span></a></h3>
                                        </div>
                                            <a href="main.php?ajax=sapp" class="text-success h4weight pull-right marginjobdetaillink">Total Saved<br>Applications</a>		
                                    </div>   
						      </div>
                               <div class="col-lg-3 col-md-3"> 
                                     <div  class="card card-stats">
                                        <div class="card-header cardmargin" data-background-color="orange">
                                            <h3 class="center marginjobdetaillink"><a href="main.php?ajax=ajposts"  class="text-success h4weight pull-right" ><span id="shortlistdiv">0</span></a></h3>
                                        </div>
                                            <a href="main.php?ajax=ajposts"  class="text-warning h4weight pull-right marginjobdetaillink">Total Active<br>Applicants</a>		
                                    </div>   
						      </div>
                            <?php
                                    $database->query('SELECT count(personalinformation.id) as pinfo, count(additionalinformation.id) as ainfo from personalinformation,additionalinformation where personalinformation.userid=:userid and additionalinformation.userid=:userid');
                                    $database->bind(':userid', $userid);
                                    try{    
                                        $row = $database->single();
                                    }catch (PDOException $e) {
                                        $msg = $e->getTraceAsString()." ".$e->getMessage();
                                        $log->error($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
                                        die("");
                                    }     
                                    $pinfo = $row['pinfo']; 
                                    $ainfo = $row['ainfo']; 
                                    if($pinfo<=0 && $ainfo<=0){
                            ?>
                                  
                                                        <div class="col-lg-12 col-md-12 leftmargin10">   
                                    
                                                            <div id="successadapproved" name="successadapproved" class="alert alert-warning">
                                               
                                                                  <div class="alert-icon">
                                                                    <i class="material-icons">check</i>
                                                                  </div>
                                                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                    <span aria-hidden="true"><i class="material-icons">clear</i></span>
                                                                  </button>
                                                                  <b>Alert: </b> Please complete your Personal Information and Additional Information to start applying for jobs.

                                                            </div>
                                                </div>
                                        
                            <?php            
                                    }
                            
                            ?>
                                   </div>
                            </div>
                            <div class="col-md-12">
                                  <h2 class="title">Latest Job Matches</h2>
                            </div> 
                            <?php
                                include "Jobad.php";
                                $jobadsarray = array();
                                $database->query("SELECT * from jobads where specialization=:specialization and jobads.id not in (select jobapplications.jobid from jobapplications, savedapplications where jobapplications.userid=:userid or savedapplications.userid=:userid) order by dateadded desc limit 0,2"); 
                                $database->bind(':specialization', $specialization);
                                $database->bind(':userid', $userid);
                                try{  
                                    $rows = $database->resultset();
                               }catch (PDOException $e) {
                                    $msg = $e->getTraceAsString()." ".$e->getMessage();
                                    $log->error($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
                                    die("");
                               }
                               foreach($rows as $row){
                                  $jobid = $row['id'];
                                  $employerid = $row['userid'];   
                                  $jobtitle = $row['jobtitle'];
                                  $company = $row['company'];   
                                  $specialization = $row['specialization'];
                                  $plevel = $row['plevel'];
                                  $jobtype = $row['jobtype'];
                                  $msalary = $row['msalary'];
                                  $maxsalary = $row['maxsalary'];
                                  $jobdesc = $row['jobdesc'];
                                  $teaser = strip_tags($jobdesc);
                                  $teaser = substr($teaser, 0, 100);
                                  $teaser = strip_tags($teaser);

                                  $dateadded = $row['dateadded'];
                                  $dadd = explode("-", $dateadded);
                                  $dateadded = $dadd[1] .'/'.$dadd[2].'/'.$dadd[0];

                                  $jobad = new Jobad();   
                                  $jobad->setjobid($jobid);
                                  $jobad->setuserid($employerid);   
                                  $jobad->setjobtitle($jobtitle);
                                  $jobad->setcompany($company);   
                                  $jobad->setspecialization($specialization);
                                  $jobad->setplevel($plevel);
                                  $jobad->setjobtype($jobtype);
                                  $jobad->setmsalary($msalary);
                                  $jobad->setmaxsalary($maxsalary);   
                                  $jobad->setteaser($teaser);
                                  $jobad->setdadd($dadd);       

                                  $jobadsarray[] = $jobad;

                                  $database->query('update jobads set impressions=impressions + 1 where id=:jobid');   
                                  $database->bind(':jobid', $jobid); 
                                  try{ 
                                      $database->execute();   
                                  }catch (PDOException $e) {
                                        $msg = $e->getTraceAsString()." ".$e->getMessage();
                                        $log->error($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
                                        die("");
                                  } 
                               }
                                $specialization=0;
                                unset($jobad);
                                $months = array('Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec');
                                $positionlevels = array('Executive','Manager','Assistant Manager','Supervisor','5 Years+ Experienced Employee','1-4 Years Experienced Employee','1 Year Experienced Employee / Fresh Grad'); 
                                $arrlength = count($jobadsarray);
                                 for($index = 0; $index < $arrlength;) {
                                     $jobad = $jobadsarray[$index];
                                     
                                     
                                     $database->query('SELECT logo, header from companyinfo where userid = :userid');    
                                     $database->bind(':userid', $jobad->getuserid());                                   
                                     try{     
                                        $logorow = $database->single();                                     
                                     }catch (PDOException $e) {
                                            $msg = $e->getTraceAsString()." ".$e->getMessage();
                                            $log->error($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
                                            die("");
                                     } 
                                     
                                     $logo = $logorow['logo'];
                                     $header = $logorow['header'];
                                     $jobad->setlogo($logo);
                                     $jobad->setheader($header);
                            ?>
                              
                            <div class="col-md-5">
                                    <section class="blog-post">
                                    <div class="panel panel-default">
                                      <?php
                                        if(!empty($header)){
                                     ?>  
                                     <img id="jobadheader" src="<?=$jobad->getheader()?>"  class="img-responsive">
                                      <?php
                                        }
                                     ?>    
                                      <div class="panel-body jobad-bottomborder">
                                          <div class="jobad-meta">
                                      
                                          <div class="row-fluid ">
                                                <div class="col-md-12">
                                                    <p class="blog-post-date pull-right text-muted"><?=$months[$dadd[1]-1]?>&nbsp;<?=$dadd[2]?>,&nbsp;<?=$dadd[0]?></p>
                                                </div>    
                                                <div class="col-md-9  jobad-titletopmargin">
                                                         <!--
                                                         <a class="nodecor" href='#showjobmodal' data-toggle="modal" data-target="#showjob-modal" data-jobid="<?=$jobad->getjobid()?>" data-mode="<?=$datamode?>" data-isjobseeker="jobseeker">
                                                    -->    
                                                    <a class="nodecor" target="_blank" href="viewjob-newpage.php?jobid=<?=$jobad->getjobid()?>&mode=<?=$datamode?>&isjobseeker=jobseeker" id="viewjobnewpage"><h2 class="text-info jobcardtitle"><?=$jobad->getjobtitle()?></h2></a>
                                                        <div class="companypos jobad-bottomborder">
                                                            <h6 class="text-muted jobcardcompany"><i><?=$jobad->getcompany()?></i></h6>
                                                        </div> 
                                                </div>
                                                <div class="col-md-3">
                                                    
                                                    <div class="companylogo "> 
                                                        <img src="<?=$jobad->getlogo()?>" width="70" height="70" class="img-responsive">
                                                    </div>
                                                </div>
                                            </div>   
                                          
                                        </div>
                                     
                                        <div class="blog-post-content">
                                             
                                         
                                          <div class="row-fluid">
                                                 <div class="col-md-12">
                                                     <ul  class="list-inline leftmargin10 jobad-bottomborder">
                                                                                           
                                                                                            <li>
                                                                                                <h6 id="vertical-align" class="text-muted jobadheader">
                                                                                                   <i class="material-icons text-info jobadheadericon">domain</i> &nbsp;<?=$specarray[$jobad->getspecialization()]?>
                                                                                                </h6>
                                                                                            </li>
                                                                                            <li>
                                                                                                <h6 id="vertical-align" class="text-muted jobadheader">
                                                                                                <i class="material-icons text-info jobadheadericon">date_range</i>&nbsp;<?=$positionlevels[$jobad->getplevel()-1]?>
                                                                                                </h6>
                                                                                            </li>
                                                                                            <li>
                                                                                                <h6 id="vertical-align" class="text-muted jobadheader">
                                                                                                   <i class="material-icons text-info jobadheadericon">local_atm</i> &nbsp;Php <?=$jobad->getmsalary()?> - <?=$jobad->getmaxsalary()?>
                                                                                                </h6>
                                                                                            </li>
                                                                                        </ul>
                                                     <span class="jobcarddesc"><?=$jobad->getteaser()?>...</span><br>
                                                 </div>
                                                
                                            </div>
                                          
                                        </div>
                                          <div class="row-fluid">
                                                <div class="col-md-6  ">
                                                   <!-- <span class="jobcardreadmorelink"><a class="btn btn-primary jobcardreadmore" >Read more</a></span>
                                                   -->
                                                </div>                                              
                                              
                                                <div class="col-md-6 actionicon pull-right">
                                                    <?php
                                                        if(empty($applyrow)){
                                                    ?>    
                                                    <span class="jobcardbuttons">
                                                    <a class="nodecor" target="_blank" href="viewjob-newpage.php?jobid=<?=$jobad->getjobid()?>&mode=<?=$datamode?>&isjobseeker=jobseeker" id="viewjobnewpage" data-toggle="tooltip" title="View Job Ad"><i class="material-icons" >assignment_turned_in</i></a>
                                                        <!--<a class="blog-post-share " href='#showjobmodal' data-toggle="modal" data-target="#showjob-modal" data-jobid="<?=$jobad->getjobid()?>" data-isjobseeker="jobseeker" title="Apply now">
                                                        -->
                                                    </span>
                                                    <?php
                                                    }else{
                                                    ?>
                                                    <span class="jobcardbuttons text-success"><a class="blog-post-share" data-toggle="tooltip" title="You already applied to this job"><i class="material-icons text-success" >assignment_turned_in</i></a></span>
                                                    <?php
                                                    }
                                                    
                                                    if(empty($savedrow)){
                                                    ?>
                                                    <span class="jobcardbuttons"><a class="blog-post-share" href="#savejob"  data-toggle="modal" data-target="#savejob-modal" data-placement="top" data-jobid="<?=$jobad->getjobid()?>" data-userid="<?=$userid?>" title="Save and Apply later"><i class="material-icons">favorite</i></a></span>
                                                    <?php
                                                    }else{
                                                    ?>
                                                    <span class="jobcardbuttons text-success"><a class="blog-post-share" data-toggle="tooltip" data-placement="top" title="You already saved this job ad"><i class="material-icons text-success">favorite</i></a></span>
                                                    <?php
                                                    }
                                                    ?>
                                                    
                                                    
                                                    <span class="jobcardbuttons"><a class="blog-post-share " href="#" data-toggle="tooltip" data-placement="top" title="Share"><i class="material-icons">share</i></a></span>
                                                </div>
                                          </div>      
                                          
                                              
                                         
                                      </div>
                                        
                                        <div class="skilltags jobcardothers">
                                            Skilltags: <span class="text-info jobcardothers">
                                            <?php
                                                      
                                                    $database->query('SELECT * FROM jobskills where jobid = :jobid');                                                   
                                                    $database->bind(':jobid', $jobad->getjobid());
                                                    try{
                                                        $rows = $database->resultset();
                                                    }catch (PDOException $e) {
                                                        $msg = $e->getTraceAsString()." ".$e->getMessage();
                                                        $log->error($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
                                                        die("");
                                                    } 
                                                    foreach($rows as $row){
                                                        echo $row['jobskilltag'];
                                                        echo ' ';
                                                    }
                                                       
                                             ?>   
                                            
                                            </span>
                                        </div>    
                                    </div>
                                  </section>
                             </div>
                              
                            <?php
                                     $index = $index+1;
                                 }
                            ?>
                            <div class="col-md-12">
                                    <form method="post" id="viewalljobs-form" name="viewalljobs-form"> 
                                            <a href='jobseeker-latestjobs.php' class="btn btn-primary " name="viewalljobs" id="viewalljobs" >
                                                            View All Job Matches
                                                           </a>
                                    </form>
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

	<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/
	<script src="js/nouislider.min.js" type="text/javascript"></script>  -->

	<!--  Plugin for the Datepicker, full documentation here: http://www.eyecon.ro/bootstrap-datepicker/ -->
	<script src="js/bootstrap-datepicker.js" type="text/javascript"></script>

	<!-- Control Center for Material Kit: activating the ripples, parallax effects, scripts from the example pages etc -->
	<script src="js/material-kit.js" type="text/javascript"></script>
    <script src="js/jobseeker-main.js" type="text/javascript"></script>
    <script src="js/parsley.js"></script>
     
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
$(document).ready(function() {
    // Optimalisation: Store the references outside the event handler:
    var $window = $(window);

    function checkWidth() {
        var windowsize = $window.width();
        if (windowsize >= 768) {
          openNav();
        }
        if(windowsize < 768){
            closeNav();
        }
    }
    // Execute on load
    checkWidth();
    // Bind event listener
    $(window).resize(checkWidth);
});        
</script>


</html>
<?php
} else{
    include 'logout.php';
    
}
?>