<?php
if (session_status() == PHP_SESSION_NONE) {
        session_start();
        include 'Database.php';
    }
if(isset($_SESSION['user'])){
   $user = $_SESSION['user'];
   $password = $_SESSION['password'];
   $adminid = $_SESSION['adminid'];
}else{
    header("Location: logout.php");
}
include 'specialization.php';
$isjobseeker = '';
if(isset($_POST['jobid'])){ $jobid = $_POST['jobid']; }
if(isset($_POST['mode'])){ $mode = $_POST['mode']; }

 date_default_timezone_set('Asia/Manila');
 $logtimestamp = date("Y-m-d H:i:s"); 
 include "serverlogconfig.php";
 $database = new Database();
 
    $database->query('SELECT * from jobads,companyinfo where jobads.id = :jobid and jobads.userid=companyinfo.userid');
   
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
    if($edate[1] >= 1 && $edate[2] >= 1 && $edate[0] >= 1){
        $endappdate = '';
    }else{
        $endappdate = $edate[1] .'/'.$edate[2].'/'.$edate[0];
    }
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
    $isactive = $row['isactive'];
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
    
    $months = array('Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec');
    $positionlevels = array('Executive','Manager','Assistant Manager','Supervisor','5 Years+ Experienced Employee','1-4 Years Experienced Employee','1 Year Experienced Employee/Fresh Grad');


?>

    
<div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title text-primary h4weight" id="myModalLabel">Job Ad</h4>
	      </div>
              
	      <div id="modaldeljobad" class="modal-body modal-gray">
	                           
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
                                                   <?php
                                                    if(!empty($teaser)){
                                                  ?>      
                                                        <?=$teaser?>...<br><br>
                                                  <?php
                                                    }
                                            	  ?>
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
                                                                        $msg = $e->getTraceAsString()." ".$e->getMessage();
                                                                        $log->error($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
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
                                                        <?php
                                                          if($edate[1] >= 1 && $edate[2] >= 1 && $edate[0] >= 1){      
                                                        ?>         
                                                        <p><b>Application deadline: </b><?=$months[$edate[1]-1]?>&nbsp;<?=$edate[2]?>,&nbsp;<?=$edate[0]?></p>
                                                        <?php
                                                          }
                                                        ?>     
                                                    </div>    
                                                </div>
                                            </div>
                                          
                                        </div>
                                        <div class="row-fluid">
                                                <div class="col-md-6">
                                                        <a class="btn btn-primary" data-toggle="collapse" data-target="#viewdetails">Read more</a>
                                                </div>
                                          </div>    
                                          <div id="adapproveddiv" class="adapproveddiv">
                                                <div class="row-fluid">
                                                        <div class="col-md-12">
                                                            <div id="successadapproved" name="successadapproved" class="alert alert-success">
                                               
                                                                  <div class="alert-icon">
                                                                    <i class="material-icons">check</i>
                                                                  </div>
                                                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                    <span aria-hidden="true"><i class="material-icons">clear</i></span>
                                                                  </button>
                                                                  <b>Alert: </b> Job Ad Approved!

                                                            </div>
                                                    </div>    
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
	      <div class="modal-footer blog-post">
                <form method="post" id="approvejobad-form" name="approvejobad-form">
                    <input type="hidden" id="jobid" name="jobid" value="<?=$jobid?>">
                    <input type="hidden" id="mode" name="mode" value="<?=$mode?>">
               </form>    
	           <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
               <?php
                    if($mode=='approve' && $isactive==0){
               ?>    
                        <button type="button" id="approvejobad" name="approvejobad" class="btn btn-primary">Approve</button>
               <?php
                    }
               ?>           
              
	      </div>
<script>
jQuery(document).ready(function ($) {
    jQuery('#adapproveddiv').hide();
    jQuery(function() {
       $.material.init();
    });
    
    jQuery('#approvejobad').on('click',function() {  
        $('#approvejobad-form').submit();
     });
    
});       
</script>