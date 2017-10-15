<script>
window.onload = function() {
   if (!window.jQuery) {  
      window.location.href = 'https://jobsly.net/dashboard/employer-jobads.php?ajax=pjobad';
   } 
}
</script>
<?php
if (session_status() == PHP_SESSION_NONE) {
        session_start();
        if (!isset($database)){
            include 'Database.php';
            $database = new Database();
        }
}
include 'specialization.php';
if(isset($_POST['jobid'])){ $jobid = $_POST['jobid']; }
if(isset($_SESSION['user'])){
   $user = $_SESSION['user'];
   $password = $_SESSION['password'];
   $userid = $_SESSION['userid'];
    date_default_timezone_set('Asia/Manila');
    $logtimestamp = date("Y-m-d H:i:s");
    include "serverlogconfig.php";
    $database = new Database();
 
    $database->query('SELECT * from jobads,companyinfo where jobads.userid = :userid and jobads.id = :jobid and companyinfo.userid = :userid');
    $database->bind(':userid', $userid);
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
    $header = $row['header'];
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
    if($edate[1] >= 1 && $edate[2] >= 2 && $edate[0] >= 1){
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
        
    $mode = 'insert';
    $months = array('Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec');
    $positionlevels = array('Executive','Manager','Assistant Manager','Supervisor','5 Years+ Experienced Employee','1-4 Years Experienced Employee','1 Year Experienced Employee/Fresh Grad');
}else{
    header("Location: logout.php");
}
?>
    <div class="row">
        
         <div class="col-md-12 center">            
                             <!--
                    <div class="adstop">     <img  src="https://lh5.ggpht.com/NFYFP2H9CCP50vAQNLa7AtCj_mbbYmOzY978fZqd31oL5qOdvXgxU3KW8ek2VgvIOvTqWY0=w728" 
                                 alt="user">  
                     </div>    
        -->   
          </div>
       
               <div class="col-md-12">
                             <h2 class="title">Post a Job Ad / Preview</h2>
               </div>
     </div>     
                   

<div class="col-md-offset-1 col-md-7">
                       
                <div class="section  section-landing">
	         
					<div class="features">
						<div class="row">
                            
                            <div class="col-md-12">
                                  <div class="stepwizard ">
                                        <div class="stepwizard-row setup-panel">
                                          <div class="stepwizard-step">
                                            <a href="#step-1" id="step-1" type="button" class="btn btn-default btn-circle" disabled="disabled">1</a>
                                           <br>Select Template
                                          </div>
                                          <div class="stepwizard-step">
                                            <a href="#step-2" id="step-2" type="button" class="btn btn-default btn-circle" 
                                               <?php
                                                    if($jobid > 0){
                                                        echo " data-jobid='".$jobid."'";
                                                    }else{
                                                        echo" disabled='disabled'";
                                                    }
                                               ?>
                                                >2</a>
                                              
                                            <br>Job Details
                                          </div>
                                          <div class="stepwizard-step">
                                            <a href="#step-3" id="step-3" type="button" class="btn btn-default btn-circle" 
                                               <?php
                                                    if($jobid > 0){
                                                        echo " data-jobid='".$jobid."'";
                                                    }else{
                                                        echo" disabled='disabled'";
                                                    }
                                               ?>
                                               >3</a>
                                            <br>Job Skills
                                          </div>
                                            <div class="stepwizard-step">
                                            <a href="#step-4" id="step-4" type="button" class="btn btn-primary btn-circle" 
                                               <?php
                                                    if($jobid > 0){
                                                        echo " data-jobid='".$jobid."'";
                                                    }else{
                                                        echo" disabled='disabled'";
                                                    }
                                               ?>
                                               >4</a>
                                            <br><b>Preview</b>
                                          </div>
                                        </div>
                                    </div>
                            </div>
		                    <div class="col-md-12">
                              
                                  <section class="blog-post">
                                    <div class="panel panel-default">
                                     
                                     <?php
                                        if(!empty($header)){
                                     ?>    
                                       
                                     <div class="row">
                                                <div class="col-md-12">                                                  
                                                  <img id="jobadheader" src="<?=$header?>"  class="img-responsive fullwidth">                                         
                                                </div>
                                              </div>
                                     <?php
                                        }
                                     ?> 
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
                                                         <a class="nodecor" href="#"><h2 class="text-info jobad-title"><?=$jobtitle?></h2></a>
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
                                               
                                                    <div class="collapse-group" id="viewdetails">
                                                  <?=$jobdesc?>
                                                    <?php
                                                if(($yrsexp > 0) || (!empty($mineduc)) || (!empty($languages)) || (!empty($licenses)) || ($wtravel == 'on') || ($wrelocate == 'on')){
                                                    ?>
                                                    <div><b>Requirements</b></div>
                                                    <?php
                                                    }
                                                    ?>
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
                                                                    $skillscount = $database->rowCount();    
                                                            if($skillscount > 0){
                                                             ?>
                                                        
                                                        <p><b>Technical / Job-specific skills</b></p>       
                                                        <ul>
                                                       <?php
                                                                    foreach($rows as $row){
                                                                        echo '<li>';
                                                                        echo $row['jobskill'];
                                                                        echo '</li>';
                                                                    }
                                                        ?>
                                                        </ul>
                                                        <?php
                                                                 }
                                                            if(!empty($city) || !empty($province) || !empty($country)){
                                                        ?>
                                                        <p><b>Location: </b><?=$city?>, <?=$province?> <?=$country?></p>
                                                        <?php
                                                            }
                                                          if($sdate[1] >= 1 && $sdate[2] >= 1 && $sdate[0] >= 1){      
                                                        ?>
                                                        <p><b>Position start date: </b><?=$months[$sdate[1]-1]?>&nbsp;<?=$sdate[2]?>,&nbsp;<?=$sdate[0]?></p>
                                                        
                                                        <?php
                                                          }
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
                                                        <a class="btn btn-primary btn-sm" data-toggle="collapse" data-target="#viewdetails">Read more</a>
                                                </div>
                                                <div class="col-md-6 actionicon">
                                                        <a class="blog-post-share " href="#" data-toggle="tooltip" data-placement="top" title="Apply now"><i class="material-icons" >assignment_turned_in</i></a>
                                                        <a class="blog-post-share " href="#" data-toggle="tooltip" data-placement="top" title="Save and Apply later"><i class="material-icons">favorite</i></a>
                                                        <a class="blog-post-share " href="#" data-toggle="tooltip" data-placement="top" title="Share"><i class="material-icons">share</i></a>
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
                            
                            <div class="col-md-12">
                             <a class="blog-post-share btn btn-primary" href="#editjob" id="editjob" data-jobid="<?=$jobid?>" data-toggle="tooltip" data-placement="top" title="Edit"><i class="material-icons" >edit</i> Edit Job Ad</a>
                            
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
 
