<?php


    if (session_status() == PHP_SESSION_NONE) {
        session_start();
         if (!isset($database)){
            include 'Database.php';
         }
    }
date_default_timezone_set('Asia/Manila');
$logtimestamp = date("Y-m-d H:i:s");
include 'specialization.php';
if(isset($_SESSION['user'])){
   $user = $_SESSION['user'];
   $password = $_SESSION['password'];
   $adminid = $_SESSION['adminid'];
    
   //include "serverlogconfig.php";
   $database = new Database();

   $months = array('Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec');
   $positionlevels = array('Executive','Manager','Assistant Manager','Supervisor','5 Years+ Experienced Employee','1-4 Years Experienced Employee','1 Year Experienced Employee/Fresh Grad');    
   if(isset($_GET['employerid'])){ $employerid = $_GET['employerid']; } 
   if(isset($_GET['jobid'])){ $jobid = $_GET['jobid']; }  
    
    
    
    $database->query('SELECT * from jobads,companyinfo,useraccounts where jobads.id = :jobid and jobads.userid=companyinfo.userid and jobads.userid=useraccounts.id');   
    $database->bind(':jobid', $jobid);
    try{
        $row = $database->single();
     }catch (PDOException $e) {
        $msg = $e->getTraceAsString()." ".$e->getMessage();
        $log->error($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
        die("");
    }    
    $id = $row['id'];
    $logo = $row['logo'];
    $companyid = $row['userid'];
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
    $nvacancies = $row['nvacancies'];
    $teaser = $row['teaser'];
    $jobdesc = $row['jobdesc'];
    $city = $row['city'];
    $province = $row['province'];
    $country = $row['country'];
    $yrsexp = $row['yrsexp'];
    $mineduc = $row['mineduc'];
    $prefcourse = $row['prefcourse'];
    $languages = $row['languages'];
    $licenses = $row['licenses'];
    $essay = $row['essay'];
    $wtravel = $row['wtravel'];
    if($wtravel=='on'){
       $wtravel = 'checked';
    }
    $wrelocate = $row['wrelocate'];
    if($wrelocate=='on'){
       $wrelocate = 'checked';
    }
    $dateadded = $row['dateadded'];
    $dadd = explode("-", $dateadded);
    $dateadded = $dadd[1] .'/'.$dadd[2].'/'.$dadd[0];
    $views = $row['views'];
    $impressions = $row['impressions'];
    
    $companyname = $row['companyname'];
    $companyaddress = $row['companyaddress'];
    $companywebsite = $row['companywebsite'];
    $email = $row['email'];
    $telno = $row['telno'];
    $companytin = $row['companytin'];
    $cperson = $row['cperson'];
    $designation = $row['designation'];
    $cpersonemail = $row['cpersonemail'];
    $cpersontelno = $row['cpersontelno'];
    $industry = $row['industry'];
    $numemp = $row['numemp'];
    $ctype = $row['ctype'];
    if($ctype==1){
        $ctype='Direct Employer';
    }else if($ctype==2){
        $ctype='Recruitment Agency';
    }
    $cdesc = $row['cdesc'];
    $signupdate = $row['signupdate'];
    $sdate = explode("-", $signupdate);
    
     $database->query('select (select count(id) from jobapplications where jobid=:jobid and isreject=0) as aapps,(select count(id) from jobapplications where jobid=:jobid and isnew=1 and isreject=0) as napps,(select count(id) from jobapplications where jobid=:jobid and isshortlisted=1 and isreject=0) as shortlisted from jobapplications');
                                     $database->bind(':jobid', $jobid);   
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

}

?>

    <div class="row">
    <div class="col-md-12 center">            
                    <div class="adstop">     <img  src="https://lh5.ggpht.com/NFYFP2H9CCP50vAQNLa7AtCj_mbbYmOzY978fZqd31oL5qOdvXgxU3KW8ek2VgvIOvTqWY0=w728" 
                                 alt="user">  
                     </div>    
                           
     </div>
   
    <div class="col-md-12">
                             <h2 class="title">Job Ad Details</h2>
       </div>
     </div>
    <div class="col-md-9">
                       
                <div class="section  section-landing">
					<div class="features">
						<div class="row">
                                                     
                            <div class="col-md-12">
                    
                           <div class="alljobsdiv">
                          
                               <section class="blog-post">
                                    <div class="panel panel-default">
                                      <img src="img/fjord.jpg" class="img-responsive">
                                       
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
                                                <div class="col-md-6">
                                                        <h2 class="text-info jobad-title"><?=$jobtitle?></h2>
                                                        <div class="companypos">
                                                            <h6 class="text-muted"><i><?=$company?></i></h6>
                                                        </div> 
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="companylogo pull-right"> 
                                                        <img src="<?=$logo?>" width="120" height="120" class="img-responsive">
                                                    </div>
                                                </div>
                                            </div>    
                                         
                                          <div class="row-fluid">
                                                 <div class="col-md-12">  
                                                      <?=$teaser?>...<br><br>
                                                 </div>
                                                <div class="col-md-12">   
                                               
                                                    <div class="collapse-group collapse" id="viewdetails">
                                                  <?=$jobdesc?>
                                                        
                                                    <div><b>Requirements</b></div>
                                                        <ul>
                                                            <?php
                                                            if($yrsexp > 0){
                                                            ?>    
                                                                <li><?=$yrsexp?> years work experience</li>
                                                            <?php
                                                            }
                                          
                                                            if(!empty($mineduc)){
                                                            ?>                                                            
                                                                <li><?=$mineduc?></li>
                                                            <?php
                                                            }
                                          
                                                            if(!empty($languages)){
                                                            ?>
                                                                <li><?=$languages?></li>
                                                            <?php
                                                            }
                                          
                                                            if(!empty($licenses)){
                                                            ?>
                                                                <li><?=$licenses?></li>
                                                            <?php
                                                            }
                                          
                                                            if($wtravel == 'on'){
                                                            ?>
                                                                <li>Willing to travel</li>
                                                            <?php
                                                            }
                                          
                                                             if($wrelocate == 'on'){
                                                            ?>
                                                                <li>Willing to relocate</li>
                                                            <?php
                                                            }
                                                            ?>
                                                            
                                                        </ul>
                                                        <p><b>Technical / Job-specific skills</b></p>
                                                        <ul>
                                                            <?php
                                                      
                                                                    $database->query('SELECT * FROM jobskills where jobid = :jobid');                                                   
                                                                    $database->bind(':jobid', $jobid);
                                                                    try{
                                                                        $rows = $database->resultset();
                                                                    }catch (PDOException $e) {
                                                                        $error = true;
                                                                        $msg = $e->getTraceAsString()." ".$e->getMessage();
                                                                        include "serverlog.php";
                                                                        die("");
                                                                    } 
                                                                    foreach($rows as $row){
                                                                        echo '<li>';
                                                                        echo $row['jobskill'];
                                                                        echo '</li>';
                                                                    }

                                                             ?>                                                              
                                                        </ul>
                                                        <p><b>Location: </b><?=$city?>, <?=$province?> <?=$country?></p>
                                                        <p><b>Position start date: </b><?=$months[$sdate[1]-1]?>&nbsp;<?=$sdate[2]?>,&nbsp;<?=$sdate[0]?></p>
                                                        <p><b>Application deadline: </b><?=$months[$edate[1]-1]?>&nbsp;<?=$edate[2]?>,&nbsp;<?=$edate[0]?></p>     
                                                    </div>    
                                                </div>
                                            </div>
                                          
                                        </div>
                                        <div class="row-fluid">
                                                <div class="col-md-6">
                                                        <a class="btn btn-primary" data-toggle="collapse" data-target="#viewdetails">Read more</a>
                                                </div>
                                          </div>    
                                                                                
                                      </div>
                                        
                                        <div class="skilltags">
                                            Skilltags: <span class="text-info">
                                            <?php
                                                      
                                                    $database->query('SELECT * FROM jobskills where jobid = :jobid');                                                   
                                                    $database->bind(':jobid', $jobid);
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
                                
                            </div>  
                                     
		                     
		                </div>
                                <div class="row-fluid">
                             <div class="col-lg-6 col-md-6"> 
                                     <section class="blog-post leftmargin10">
                                    <div class="panel panel-default">
                                      
                                      <div class="panel-body jobad-bottomborder">
                                       
                                        <div class="blog-post-content">
                                            <div class="row-fluid">
                                                <div class="col-md-6">
                                                        <h2 class="text-info jobad-title"><?=$companyname?></h2>
                                                      
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="companylogo pull-right"> 
                                                        <img src="<?=$logo?>" width="70" height="70" class="img-responsive">
                                                    </div>
                                                </div>
                                            </div>    
                                         
                                          <div class="row-fluid">
                                             
                                                  <?=$cdesc?>
                                                        
                                                   
                                                        <ul style="list-style: none;">
                                                              
                                                                <li>Username: <b><?=$email?></b></li>
                                                                                                                     
                                                                <li>Signup Date: <b><?=$signupdate?></b></li>
                                                           
                                                                <li>Company Name: <b><?=$companyname?></b></li>
                                                            
                                                                <li>Company Address: <b><?=$companyaddress?></b></li>
                                                           
                                                                <li>Website: <b><?=$companywebsite?></b></li>
                                                                <li>Office Num: <b><?=$telno?></b></li>
                                                                <li>TIN: <b><?=$companytin?></b></li>                                                         
                                                                <li>Industry: <b><?=$industry?></b></li>
                                                                <li>Number of Employees: <b><?=$numemp?></b></li>
                                                                <li>Company Type: <b><?=$ctype?></b></li>
                                                        </ul>                                                       
                                                  
                                                       
                                                        <ul style="list-style: none;">
                                                                <li>Contact Person: <b><?=$cperson?></b></li>
                                                                <li>Designation: <b><?=$designation?></b></li>
                                                                <li>Contact Person Email: <b><?=$cpersonemail?></b></li>
                                                                <li>Contact Person Phone Num: <b><?=$cpersontelno?></b></li>  
                                                        </ul>                                                       
                                                
                                               
                                            </div>
                                          
                                        </div>
                                      
                                      </div>
                                    
                                    </div>
                                  </section>                                
						    </div>     
                            <div class="col-lg-6 col-md-6"> 
                                    <div  class="card card-stats" >
                                        <div class="card-header cardmargin" data-background-color="red">
                                            <h3 class="center marginjobdetaillink"><span id="jobadsapprdiv"><?=$views?></span></h3>
                                        </div>
                                      <a href="#jobadsappr" id="jobadsappr" class="text-danger h4weight pull-right  marginjobdetaillink" data-jobid="<?=$id?>">Views</a>
                                        
                                    </div>
                                     <div  class="card card-stats">
                                        <div class="card-header cardmargin" data-background-color="orange">
                                            <h3 class="center marginjobdetaillink"><span id="empapprdiv"><?=$impressions?></span></h3>
                                        </div>                                        
                                            <a href="#empappr" id="empappr" class="text-warning h4weight pull-right marginjobdetaillink" data-jobid="<?=$id?>">Impressions</a>
                                    </div> 
                                    <div  class="card card-stats" >
                                        <div class="card-header cardmargin" data-background-color="purple">
                                            <h3 class="center marginjobdetaillink"><a href="#activeapps" id="activeapps" class="text-primary h4weight pull-right" data-jobid="<?=$id?>"><span id="aappsdiv"><?=$aapps?></span></a></h3>
                                        </div>
                                      <a href="#activeapps" id="activeapps" class="text-primary h4weight pull-right  marginjobdetaillink" data-jobid="<?=$id?>">Active<br>Applications</a>                                        
                                    </div>
                                    <div  class="card card-stats ">
                                        <div class="card-header cardmargin" data-background-color="blue">
                                            <h3 class="center marginjobdetaillink"><a href="#newapps" id="newapps" class="text-primary h4weight pull-right" data-jobid="<?=$id?>"><span id="nappsdiv"><?=$napps?></span></a></h3>
                                        </div>                                        
                                            <a href="#newapps" id="newapps" class="text-info h4weight pull-right marginjobdetaillink" data-jobid="<?=$id?>">New<br>Applications</a>
                                    </div>
                                    
                                     <div  class="card card-stats ">
                                        <div class="card-header cardmargin" data-background-color="green">
                                            <h3 class="center marginjobdetaillink"><a href="#shortlisted" id="shortlisted" class="text-success h4weight pull-right" data-jobid="<?=$id?>"><span id="shortlistdiv"><?=$shortlisted?></span></a></h3>
                                        </div>
                                            <a href="#shortlisted" id="shortlisted" class="text-success h4weight pull-right marginjobdetaillink" data-jobid="<?=$id?>">Shortlisted<br>Applicants</a>		
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
          

<script>
jQuery(document).ready(function ($) {
  $('#resume-main-body #successdivdeljob').hide();
    /*
    $('#pinfo-form #fname').parsley().on('field:error', function() {
           $('#pinfo-form #fnamediv').addClass('has-error');
           $('#pinfo-form #fnamediv').append("<span class='material-icons form-control-feedback'>clear</span>");   
    });    
    $('#pinfo-form #fname').parsley().on('field:success', function() {
            $('#pinfo-form #fnamediv').addClass('has-success');
            $('#pinfo-form #fnamediv').find('span').remove()
            $('#pinfo-form #fnamediv').append("<span class='material-icons form-control-feedback'>done</span>");   
    });
    
   
    
    */
    
});       
</script>