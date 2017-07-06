<?php
include 'dashboard/Database.php';
$database = new Database();
     date_default_timezone_set('Asia/Manila');
     $logtimestamp = date("Y-m-d H:i:s");
    $page='public';
     include "dashboard/serverlogconfig.php";
?>
<!doctype html>
<html lang="en">
<head>
     
    <!-- Google Tag Manager -->
<script>
 window.dataLayer = window.dataLayer || [];   
(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-MKMGLRW');



</script>    
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="../img/apple-icon.png">
	<link rel="icon" type="image/png" href="../img/favicon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Latest Jobs | jobsly</title>
 	<meta name="description" content="Find your next adventure! Search for jobs matching your preference and qualifications." />
 	<meta name="keywords" content="Jobs, Hiring, Career, Work, Resume, Call Center Jobs, Recruitment" />

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />

	<!--     Fonts and icons     -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <link href="https://fonts.googleapis.com/css?family=Oleo+Script" rel="stylesheet">

	<!-- CSS Files -->
  <!--  <link href="../jobsly/dashboard/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../jobsly/dashboard/css/material-kit.css" rel="stylesheet"/>
    <link href="../jobsly/dashboard/css/custom.css" rel="stylesheet"/>
    <link href="../jobsly/dashboard/css/media.css" rel="stylesheet"/>
    <script src="../jobsly/dashboard/js/jquery.min.js" type="text/javascript"></script>
	<script src="../jobsly/dashboard/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="../jobsly/dashboard/js/material.min.js"></script>
	<script src="../jobsly/dashboard/js/material-kit.js" type="text/javascript"></script>
    <script src="../jobsly/dashboard/js/jobseeker-main.js" type="text/javascript"></script>
-->    
    <link href="dashboard/css/bootstrap.min.css" rel="stylesheet" />
    <link href="dashboard/css/material-kit.css" rel="stylesheet"/>
    <link href="dashboard/css/custom.css" rel="stylesheet"/>
    <link href="dashboard/css/media.css" rel="stylesheet"/>
    <script src="dashboard/js/jquery.min.js" type="text/javascript"></script>
	<script src="dashboard/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="dashboard/js/material.min.js"></script>
	<script src="dashboard/js/material-kit.js" type="text/javascript"></script>
   
    <!--
    <script src="../jobsly/dashboard/js/jobseeker-main.js" type="text/javascript"></script>
    -->

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
           
        		<a href='index.php' class="navbar-brand logo" >jobsly</a>
        	</div>
            <div class="collapse navbar-collapse" id="navigation-example">
        		
    				<ul class="nav navbar-nav navbar-right">                      
                        <!--
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
                    -->
        		</ul>
                <ul class="nav navbar-nav navbar-right">
                    
                    <li><a href="login.php" id="home"><i class="material-icons">done</i>Signin</a></li>
                    
                    <li class="dropdown active"><a href="main.php" class="dropdown-toggle" data-toggle="dropdown" id="pinfo"><i class="material-icons">create</i>&nbsp;Signup<b class="caret"></b></a>
                         <ul class="dropdown-menu">
                                    <li><a href="signup.php?target=jobseeker">Job seeker</a></li>
						            <li><a href="signup.php?target=employer">Employers</a></li>
                         </ul> 
                    </li>                
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
     
    <div id="main" class="wrapper ">
       

		<div class="main main-raised ">
         
			<div class="container-fluid"> <!-- with fluid for full width -->
                <div class="row-fluid">   <!-- with fluid for full width -->
                    
                    <div id="resume-main-body">                       
                        <?php

include 'dashboard/specialization.php';

  $database = new Database();
  include "dashboard/Jobad.php";
  $jobadsarray = array(); 
  $search="";
  $esalary=0;
  $specializationsearch="";
  $logo="";    
  if(isset($_POST['search'])){ $search = $_POST['search']; }
  if(isset($_POST['esalary'])){ $esalary = $_POST['esalary']; }
  if(isset($_POST['specialization'])){ $specializationsearch = $_POST['specialization']; }    
  $where = "";
  $wherekey ="";
   if(!empty($search)){
       $search='%'.$search.'%';
       $where=" (jobtitle like :search or jobdesc like :search) ";
        if($esalary > 0 || $specializationsearch > 0){
            $where = $where."and ";
        }
   }
   if($esalary > 0){ 
       $where= $where . " msalary <= :esalary and maxsalary >= :esalary ";
       if($specializationsearch > 0){
            $where = $where."and ";
        }
   }
   if(!empty($specializationsearch)){ 
       $where= $where . " specialization = :specialization ";
   }    
     
   $wherekey = " where ";  
   $isactiveclause = " isactive=1 ";        
   if(!empty($where)){
       $isactiveclause = " and ".$isactiveclause;
   }    
       
   $msg = $where;
   //$log->info($where);
   $database->query("SELECT * from jobads ".$wherekey.$where.$isactiveclause." order by dateadded desc limit 0,12"); 
   if(!empty($search)){ 
       $database->bind(':search', $search);  
   }
   if($esalary > 0){ 
       $database->bind(':esalary', $esalary);  
   }
   if($specializationsearch > 0){
       $database->bind(':specialization', $specializationsearch);
   }
    
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
$search = str_replace('%','',$search);
                        
?>
<style>
body {
  /*  padding-top: 50px; */
}
.dropdown.dropdown-lg .dropdown-menu {
    margin-top: -1px !important;
    padding: 6px 20px !important;
    background-color: #eeeeee !important;
}
.input-group-btn .btn-group {
    display: flex !important;
}
.btn-group .btn {
    border-radius: 0 !important;
    margin-left: -1px !important;
}
.btn-group .btn:last-child {
    border-top-right-radius: 4px !important;
    border-bottom-right-radius: 4px !important;
}
.btn-group .form-horizontal .btn[type="submit"] {
  border-top-left-radius: 4px !important;
  border-bottom-left-radius: 4px !important;
}
.form-horizontal .form-group {
    margin-left: 0 !important;
    margin-right: 0 !important;
}
.form-group .form-control:last-child {
    border-top-left-radius: 4px !important;
    border-bottom-left-radius: 4px !important;
}

@media screen and (min-width: 768px) {
    #adv-search {
        width: 700px !important;
        margin: 0 auto !important;
    }
    .dropdown.dropdown-lg {
        position: static !important;
    }
    .dropdown.dropdown-lg .dropdown-menu {
        min-width: 700px !important;
    }
}
</style>
    
    <div class="row">
    <div class="col-md-12 center">            
                    <div class="adstop">     <img  src="https://lh5.ggpht.com/NFYFP2H9CCP50vAQNLa7AtCj_mbbYmOzY978fZqd31oL5qOdvXgxU3KW8ek2VgvIOvTqWY0=w728" 
                                 alt="user">  
                     </div>    
                           
     </div>

    <div class="col-md-12">
                 <h2 class="title">Latest Jobs</h2>  
       </div>
   </div>     
<div class="col-md-offset-2 col-md-8 col-md-offset-2">
            
          
                <section class="blog-post">
                  <div class="panel panel-default" >
                      <form method="post" action="latestjobs.php"  id="search-form"> 
                       
                       <div class="panel-body" >
                           <div class="col-md-12">
                               
                             <div id="searchdiv" class="form-group label-floating" >
                                  <label class="control-label">Search</label>
                                 
                                  <input type="text" id="search" name="search" class="form-control searchform" value="<?=$search?>">  
                             </div>
                            </div>
                            
                             <div class="collapse-group collapse" id="options" >
                                 <div class="col-md-6">
                                      <div id="esalarydiv" class="form-group label-floating">
                                      <label class="control-label">Min. Salary</label>
                                      <input type="text" id="esalary" class="form-control searchform" >  
                                     </div>
                                 </div>
                                 <div class="col-md-6"> 
                                        <div id="specializationdiv" class="form-group label-floating">
                                         <label class="control-label">Specialization</label>
                                         <select class="form-control searchform" id="specialization" name="specialization"  placeholder="Specialization" data-parsley-required>
                                             <option></option>
                                               <?php
                                               $i=0;
                                                foreach($specarray as $spec){
                                                    echo "<option value='$i' "; if($specialization==$i){echo'selected';} echo">$specarray[$i]</option>";
                                                    $i++;
                                                }
                                                ?>
                                          </select>
                                          </div> 
                                 </div>
                                 
                                
                             </div>
                           
                                <p style="z-index: 1; position: relative;">
                                     <a class="btn btn-default btn-sm" data-toggle="collapse" data-target="#options">Search Options</a>
                                     <button class="btn btn-primary btn-sm" type="submit">Search</button>
                             </p>  
                             </div>
                            </form>
                  </div>
                </section>   
        
</div>
<!--
    <div class="col-md-1">
    </div>
-->
    <div class="col-md-4"> <!--left-->
                       
                <div class="section  section-landing ">
	                 

					<div class="features">
                        
                        <div class="row">                  
                         <div class="jobs">
		                     <div class="col-md-12 leftmargin10">
                                  <?php
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
                                
                                <section class="blog-post">
                                    <div class="panel panel-default">
                                     <?php
                                        if(!empty($header)){
                                     ?>  
                                   <!--  <img id="jobadheader" src="../jobsly/dashboard/<?=$jobad->getheader()?>"  class="img-responsive" width="100%">  -->
                                        <div class="row">
                                                <div class="col-md-12">                                                  
                                                  <img id="jobadheader" src="dashboard/<?=$jobad->getheader()?>"  class="img-responsive fullwidth" width="100%">                                         
                                                </div>
                                              </div>
                                      <?php
                                        }
                                     ?>
                                      <div class="panel-body jobad-bottomborder">
                                          <div class="jobad-meta">
                                      
                                          <div class="row-fluid ">
                                                <div class="col-md-12">
                                                    <p class="blog-post-date pull-right text-muted"><?=$months[$jobad->getdadd()[1]-1]?>&nbsp;<?=$jobad->getdadd()[2]?>,&nbsp;<?=$jobad->getdadd()[0]?></p>
                                                </div>    
                                                <div class="col-md-9  jobad-titletopmargin">
                                                    <!--
                                                         <a class="nodecor" href='#showjobmodal' data-toggle="modal" data-target="#showjob-modal" data-jobid="<?=$jobad->getjobid()?>" data-mode="" data-isjobseeker="jobseeker">
                                                    -->    
                                                    <a class="nodecor" target="_blank" href="viewjob-newpage.php?jobid=<?=$jobad->getjobid()?>&mode=<?=$datamode?>&isjobseeker=jobseeker" id="viewjobnewpage"><h2 class="text-info jobcardtitle"><?=$jobad->getjobtitle()?></h2></a>
                                                        
                                                        <div class="companypos jobad-bottomborder">
                                                            <h6 class="text-muted jobcardcompany"><i><?=$jobad->getcompany()?></i></h6>
                                                        </div> 
                                                </div>
                                                <div class="col-md-3">
                                                    
                                                    <div class="companylogo "> 
                                                         <img src="dashboard/<?=$jobad->getlogo()?>" width="70" height="70" class="img-responsive">
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
                                                                                                    <i class="material-icons text-info jobadheadericon">local_atm</i> &nbsp;<span class="h4weight text-danger">Login to view salary</span>
                                                                                                </h6>
                                                                                            </li>
                                                                                        </ul>
                                                     <span class="jobcarddesc"><?=$jobad->getteaser()?>...</span><br>
                                                 </div>
                                                
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
                                    <?php
                                     $index = $index+3;
                                     $datamode='';
                                }
                                    ?>
                                   
                            </div>
		                </div>
                        </div>    
					</div>
	            </div>
                  
    </div><!--left-->
                     
    <div class="col-md-4"> <!--middle-->
        <div class="section  section-landing ">
	                 

					<div class="features">
                        
                        <div class="row">                  
                         <div class="jobs">
		                     <div class="col-md-12 leftmargin10">
                                  <?php
                                 $arrlength = count($jobadsarray);
                                 for($index = 1; $index < $arrlength;) {
                                     $jobad = $jobadsarray[$index];
                                                                    
                                     $database->query('SELECT logo,header from companyinfo where userid = :userid');    
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
                                
                                <section class="blog-post">
                                    <div class="panel panel-default">
                                     <?php
                                        if(!empty($header)){
                                     ?>  
                                      <div class="row">
                                                <div class="col-md-12">                                                  
                                                  <img id="jobadheader" src="dashboard/<?=$jobad->getheader()?>"  class="img-responsive fullwidth" width="100%">                                         
                                                </div>
                                              </div>
                                      <?php
                                        }
                                     ?>
                                      <div class="panel-body jobad-bottomborder">
                                          <div class="jobad-meta">
                                      
                                          <div class="row-fluid ">
                                                <div class="col-md-12">
                                                    <p class="blog-post-date pull-right text-muted"><?=$months[$jobad->getdadd()[1]-1]?>&nbsp;<?=$jobad->getdadd()[2]?>,&nbsp;<?=$jobad->getdadd()[0]?></p>
                                                </div>    
                                                <div class="col-md-9  jobad-titletopmargin">
                                                         <!--
                                                         <a class="nodecor" href='#showjobmodal' data-toggle="modal" data-target="#showjob-modal" data-jobid="<?=$jobad->getjobid()?>" data-mode="" data-isjobseeker="jobseeker">
                                                    -->    
                                                    <a class="nodecor" target="_blank" href="viewjob-newpage.php?jobid=<?=$jobad->getjobid()?>&mode=<?=$datamode?>&isjobseeker=jobseeker" id="viewjobnewpage"><h2 class="text-info jobcardtitle"><?=$jobad->getjobtitle()?></h2></a>
                                                        <div class="companypos jobad-bottomborder">
                                                            <h6 class="text-muted jobcardcompany"><i><?=$jobad->getcompany()?></i></h6>
                                                        </div> 
                                                </div>
                                                <div class="col-md-3">
                                                    
                                                    <div class="companylogo "> 
                                                         <img src="dashboard/<?=$jobad->getlogo()?>" width="70" height="70" class="img-responsive">
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
                                                                                                   <i class="material-icons text-info jobadheadericon">local_atm</i> &nbsp;<span class="h4weight text-danger">Login to view salary</span>
                                                                                                </h6>
                                                                                            </li>
                                                                                        </ul>
                                                     <span class="jobcarddesc"><?=$jobad->getteaser()?>...</span><br>
                                                 </div>
                                                
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
                                    <?php
                                     $index = $index+3;
                                     $datamode='';
                                }
                                    ?>
                                   
                            </div>
		                </div>
                        </div>    
					</div>
	            </div>
    </div><!--middle-->                
          
    <div class="col-md-4"> <!--right-->
         <div class="section  section-landing ">
	                 

					<div class="features">
                        
                        <div class="row">                  
                         <div class="jobs">
		                     <div class="col-md-12 leftmargin10">
                                  <?php
                                 $arrlength = count($jobadsarray);
                                 for($index = 2; $index < $arrlength;) {
                                     $jobad = $jobadsarray[$index];
                                                                    
                                     $database->query('SELECT logo,header from companyinfo where userid = :userid');    
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
                                
                                <section class="blog-post">
                                    <div class="panel panel-default">
                                     <?php
                                        if(!empty($header)){
                                     ?>  
                                      <div class="row">
                                                <div class="col-md-12">                                                  
                                                <!--  <img id="jobadheader" src="../jobsly/dashboard/<?=$jobad->getheader()?>"  class="img-responsive fullwidth" width="100%">   
                                                -->
                                                    <img id="jobadheader" src="dashboard/<?=$jobad->getheader()?>"  class="img-responsive fullwidth" width="100%">   
                        
                                                </div>
                                              </div>
                                      <?php
                                        }
                                     ?>
                                      <div class="panel-body jobad-bottomborder">
                                          <div class="jobad-meta">
                                      
                                          <div class="row-fluid ">
                                                <div class="col-md-12">
                                                    <p class="blog-post-date pull-right text-muted"><?=$months[$jobad->getdadd()[1]-1]?>&nbsp;<?=$jobad->getdadd()[2]?>,&nbsp;<?=$jobad->getdadd()[0]?></p>
                                                </div>    
                                                <div class="col-md-9  jobad-titletopmargin">
                                                         <!--
                                                         <a class="nodecor" href='#showjobmodal' data-toggle="modal" data-target="#showjob-modal" data-jobid="<?=$jobad->getjobid()?>" data-mode="" data-isjobseeker="jobseeker">
                                                    -->    
                                                    <a class="nodecor" target="_blank" href="viewjob-newpage.php?jobid=<?=$jobad->getjobid()?>&mode=<?=$datamode?>&isjobseeker=jobseeker" id="viewjobnewpage"><h2 class="text-info jobcardtitle"><?=$jobad->getjobtitle()?></h2></a>
                                                        <div class="companypos jobad-bottomborder">
                                                            <h6 class="text-muted jobcardcompany"><i><?=$jobad->getcompany()?></i></h6>
                                                        </div> 
                                                </div>
                                                <div class="col-md-3">
                                                    
                                                    <div class="companylogo "> 
                                                        <!--
                                                        <img src="../jobsly/dashboard/<?=$jobad->getlogo()?>" width="70" height="70" class="img-responsive">
                                                        -->
                                                        <img src="dashboard/<?=$jobad->getlogo()?>" width="70" height="70" class="img-responsive">
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
                                                                                                   <i class="material-icons text-info jobadheadericon">local_atm</i> &nbsp;<span class="h4weight text-danger">Login to view salary</span>
                                                                                                </h6>
                                                                                            </li>
                                                                                        </ul>
                                                     <span class="jobcarddesc"><?=$jobad->getteaser()?>...</span><br>
                                                 </div>
                                                
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
                                    <?php
                                     $index = $index+3;
                                }
                                    $next = $arrlength +1;
                                    $log->info("search=".$search.',ip='.$_SERVER['REMOTE_ADDR']);
                                    ?>
                                   
                            </div>
		                </div>
                        </div>    
					</div>
	            </div>
    </div><!--right-->
<!--
       <div class="col-md-2">
     </div> 

-->
       
    <div class="loadmore">  
         <div class="loadmoreform">
             <form method="post" id="loadmorejobs-form" name="loadmorejobs-form">                    
                    <input type="hidden" id="next" name="next" value="<?=$next?>">
                    <input type="hidden" id="search" name="search" value="<?=$search?>">
                    <input type="hidden" id="esalary" name="esalary" value="<?=$esalary?>">
                    <input type="hidden" id="specialization" name="specialization" value="<?=$specializationsearch?>">
                   
             </form>
        </div>
    </div>
    
    <div class="col-md-12 center">                    
        <div id="loading" >
             <img id="loader" src="img/loader.gif">
         </div>
    </div>                     
<script>
function ChangeUrl(title, url) {
    if (typeof (history.pushState) != "undefined") {
        var obj = { Title: title, Url: url };
        history.pushState(obj, obj.Title, obj.Url);
    } else {
        alert("Browser does not support HTML5.");
    }
}      
    
jQuery(document).ready(function ($) {
 
     $(window).scroll(function() {
      if ($(window).scrollTop() == $(document).height() - $(window).height()) {
            $('#loadmorejobs-form').submit();

      }
    });
    $('#loader').hide();
     $(document).on('submit','#loadmorejobs-form',function(event){
             
            event.preventDefault();                  
            var next = $("#loadmorejobs-form #next").val();
            var search = $("#loadmorejobs-form #search").val();
            var esalary = $("#loadmorejobs-form #esalary").val();
            var specialization = $("#loadmorejobs-form #specialization").val();
            $.ajax({
                    type: "POST",
                    url: 'loadmorejobs.php',
                    data: "next=" +next+ "&search=" +search+ "&esalary=" +esalary+ "&specialization=" +specialization,
                    dataType: 'html',
                    beforeSend: function() {
                         $('#loader').show();
                      },
                    complete: function(){
                         $('#loader').hide();
                      },
                    success: function (html) {
                       
                        $(".loadmoreform").remove();
                        $('.loadmore').append(html);
                        ChangeUrl('Latest Jobs | jobsly', "latestjobs.php?next="+next+""); 
                    }
           });
    });  
  
});       
</script>

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

	
     
    <script>

        
        
jQuery(document).ready(function ($) {
    $(function() {
       $.material.init();
    });
  
    
});             
</script>


</html>
