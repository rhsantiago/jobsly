<?php


    if (session_status() == PHP_SESSION_NONE) {
        session_start();
        include 'Database.php';
    }
include 'specialization.php';
if(isset($_SESSION['user'])){
   $user = $_SESSION['user'];
   $password = $_SESSION['password'];
   $userid = $_SESSION['userid'];
   if(isset($_POST['next'])){ $next = $_POST['next']; } 
  $database = new Database();
  include "Jobad.php";
  date_default_timezone_set('Asia/Manila');
    $logtimestamp = date("Y-m-d H:i:s");  
  include "serverlogconfig.php";  
  $jobadsarray = array();    
    
   $database->query("SELECT * from jobads order by dateadded desc limit ".$next.",12");
  // $database->bind(':next', $next);   
   try{ 
       $rows = $database->resultset();
   }catch (PDOException $e) {
        $msg = $e->getTraceAsString()." ".$e->getMessage();
        $log->error($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
        die("");
    }     
if(!empty($rows)){    
   foreach($rows as $row){
      $jobid = $row['id'];
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
   
   }
    unset($jobad);
    $months = array('Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec');
    $positionlevels = array('Executive','Manager','Assistant Manager','Supervisor','5 Years+ Experienced Employee','1-4 Years Experienced Employee','1 Year Experienced Employee/Fresh Grad');
}
}else{
    header("Location: logout.php");
}

?>

    
    <div class="row">
  
   
    
     </div>
    <div class="col-md-1">
    </div>
    <div class="col-md-3"> <!--left-->
                       
               <div class="section  section-landing notopmargin">
	                 

					<div class="features">
                        
                        <div class="row">                  
                         <div class="jobs">
		                     <div class="col-md-12 leftmargin10">
                                  <?php
                                 $arrlength = count($jobadsarray);
                                 for($index = 0; $index < $arrlength;) {
                                     $jobad = $jobadsarray[$index];
                               
                                     $database->query('SELECT * from jobapplications where jobid= :jobid and userid = :userid');
                                     $database->bind(':userid', $userid);
                                     $database->bind(':jobid', $jobad->getjobid());
                                     try{
                                         $applyrow = $database->single();      
                                     }catch (PDOException $e) {
                                        $msg = $e->getTraceAsString()." ".$e->getMessage();
                                        $log->error($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
                                        die("");
                                     } 
                                     if(!empty($applyrow)){
                                         $datamode = "view";
                                     }else{
                                         $datamode = "apply";
                                     }
                                     
                                     $database->query('SELECT * from savedapplications where jobid= :jobid and userid = :userid');
                                     $database->bind(':userid', $userid);
                                     $database->bind(':jobid', $jobad->getjobid());
                                     try{
                                         $savedrow = $database->single();   
                                     }catch (PDOException $e) {
                                        $msg = $e->getTraceAsString()." ".$e->getMessage();
                                        $log->error($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
                                        die("");
                                     } 
                                
                             ?>
                                
                                <section class="blog-post">
                                    <div class="panel panel-default">
                                     <img src="img/fjord.jpg" class="img-responsive">
                                      <div class="panel-body jobad-bottomborder">
                                          <div class="jobad-meta">
                                      
                                          <div class="row-fluid ">
                                                <div class="col-md-12">
                                                    <p class="blog-post-date pull-right text-muted"><?=$months[$dadd[1]-1]?>&nbsp;<?=$dadd[2]?>,&nbsp;<?=$dadd[0]?></p>
                                                </div>    
                                                <div class="col-md-9  jobad-titletopmargin">
                                                         <a class="nodecor" href='#showjobmodal' data-toggle="modal" data-target="#showjob-modal" data-jobid="<?=$jobad->getjobid()?>"  data-isjobseeker="jobseeker"><h2 class="text-info jobcardtitle"><?=$jobad->getjobtitle()?></h2></a>
                                                        <div class="companypos jobad-bottomborder">
                                                            <h6 class="text-muted jobcardcompany"><i><?=$jobad->getcompany()?></i></h6>
                                                        </div> 
                                                </div>
                                                <div class="col-md-3">
                                                    
                                                    <div class="companylogo "> 
                                                        <img src="img/champ.png" width="70" height="70" class="img-responsive">
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
                                                    <span class="jobcardbuttons"><a class="blog-post-share " href='#showjobmodal' data-toggle="modal" data-target="#showjob-modal" data-jobid="<?=$jobad->getjobid()?>" data-isjobseeker="jobseeker" title="Apply now"><i class="material-icons" >assignment_turned_in</i></a></span>
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
                                    ?>
                                   
                            </div>
		                </div>
                        </div>    
					</div>
	            </div>
                  
    </div><!--left-->
                     
    <div class="col-md-3"> <!--middle-->
        <div class="section  section-landing notopmargin">
	                 

					<div class="features">
                        
                        <div class="row">                  
                         <div class="jobs">
		                     <div class="col-md-12 leftmargin10">
                                  <?php
                                 $arrlength = count($jobadsarray);
                                 for($index = 1; $index < $arrlength;) {
                                     $jobad = $jobadsarray[$index];
                               
                                     $database->query('SELECT * from jobapplications where jobid= :jobid and userid = :userid');
                                     $database->bind(':userid', $userid);
                                     $database->bind(':jobid', $jobad->getjobid());
                                     try{
                                         $applyrow = $database->single();   
                                     }catch (PDOException $e) {
                                        $msg = $e->getTraceAsString()." ".$e->getMessage();
                                        $log->error($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
                                        die("");
                                    }     
                                     if(!empty($applyrow)){
                                         $datamode = "view";
                                     }else{
                                         $datamode = "apply";
                                     }
                                     
                                     $database->query('SELECT * from savedapplications where jobid= :jobid and userid = :userid');
                                     $database->bind(':userid', $userid);
                                     $database->bind(':jobid', $jobad->getjobid());
                                     try{
                                         $savedrow = $database->single();
                                     }catch (PDOException $e) {
                                        $msg = $e->getTraceAsString()." ".$e->getMessage();
                                        $log->error($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
                                        die("");
                                     } 
                             ?>
                                
                                <section class="blog-post">
                                    <div class="panel panel-default">
                                     <img src="img/fjord.jpg" class="img-responsive">
                                      <div class="panel-body jobad-bottomborder">
                                          <div class="jobad-meta">
                                      
                                          <div class="row-fluid ">
                                                <div class="col-md-12">
                                                    <p class="blog-post-date pull-right text-muted"><?=$months[$dadd[1]-1]?>&nbsp;<?=$dadd[2]?>,&nbsp;<?=$dadd[0]?></p>
                                                </div>    
                                                <div class="col-md-9  jobad-titletopmargin">
                                                         <a class="nodecor" href='#showjobmodal' data-toggle="modal" data-target="#showjob-modal" data-jobid="<?=$jobad->getjobid()?>" data-isjobseeker="jobseeker"><h2 class="text-info jobcardtitle"><?=$jobad->getjobtitle()?></h2></a>
                                                        <div class="companypos jobad-bottomborder">
                                                            <h6 class="text-muted jobcardcompany"><i><?=$jobad->getcompany()?></i></h6>
                                                        </div> 
                                                </div>
                                                <div class="col-md-3">
                                                    
                                                    <div class="companylogo "> 
                                                        <img src="img/champ.png" width="70" height="70" class="img-responsive">
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
                                                    <span class="jobcardbuttons"><a class="blog-post-share " href='#showjobmodal' data-toggle="modal" data-target="#showjob-modal" data-jobid="<?=$jobad->getjobid()?>" data-isjobseeker="jobseeker" title="Apply now"><i class="material-icons" >assignment_turned_in</i></a></span>
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
                                    ?>
                                   
                            </div>
		                </div>
                        </div>    
					</div>
	            </div>
    </div><!--middle-->                
          
    <div class="col-md-3"> <!--right-->
         <div class="section  section-landing notopmargin">
	                 

					<div class="features">
                        
                        <div class="row">                  
                         <div class="jobs">
		                     <div class="col-md-12 leftmargin10">
                                  <?php
                                 $arrlength = count($jobadsarray);
                                 for($index = 2; $index < $arrlength;) {
                                     $jobad = $jobadsarray[$index];
                               
                                     $database->query('SELECT * from jobapplications where jobid= :jobid and userid = :userid');
                                     $database->bind(':userid', $userid);
                                     $database->bind(':jobid', $jobad->getjobid());
                                     try{
                                         $applyrow = $database->single();   
                                     }catch (PDOException $e) {
                                        $msg = $e->getTraceAsString()." ".$e->getMessage();
                                        $log->error($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
                                        die("");
                                     } 
                                     if(!empty($applyrow)){
                                         $datamode = "view";
                                     }else{
                                         $datamode = "apply";
                                     }   
                                     
                                     $database->query('SELECT * from savedapplications where jobid= :jobid and userid = :userid');
                                     $database->bind(':userid', $userid);
                                     $database->bind(':jobid', $jobad->getjobid());
                                     try{
                                        $savedrow = $database->single();
                                     }catch (PDOException $e) {
                                        $msg = $e->getTraceAsString()." ".$e->getMessage();
                                        $log->error($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
                                        die("");
                                     }    
                             ?>
                                
                                <section class="blog-post">
                                    <div class="panel panel-default">
                                     <img src="img/fjord.jpg" class="img-responsive">
                                      <div class="panel-body jobad-bottomborder">
                                          <div class="jobad-meta">
                                      
                                          <div class="row-fluid ">
                                                <div class="col-md-12">
                                                    <p class="blog-post-date pull-right text-muted"><?=$months[$dadd[1]-1]?>&nbsp;<?=$dadd[2]?>,&nbsp;<?=$dadd[0]?></p>
                                                </div>    
                                                <div class="col-md-9  jobad-titletopmargin">
                                                         <a class="nodecor" href='#showjobmodal' data-toggle="modal" data-target="#showjob-modal" data-jobid="<?=$jobad->getjobid()?>" data-isjobseeker="jobseeker"><h2 class="text-info jobcardtitle"><?=$jobad->getjobtitle()?></h2></a>
                                                        <div class="companypos jobad-bottomborder">
                                                            <h6 class="text-muted jobcardcompany"><i><?=$jobad->getcompany()?></i></h6>
                                                        </div> 
                                                </div>
                                                <div class="col-md-3">
                                                    
                                                    <div class="companylogo "> 
                                                        <img src="img/champ.png" width="70" height="70" class="img-responsive">
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
                                                    <span class="jobcardbuttons"><a class="blog-post-share " href='#showjobmodal' data-toggle="modal" data-target="#showjob-modal" data-jobid="<?=$jobad->getjobid()?>" data-isjobseeker="jobseeker" title="Apply now"><i class="material-icons" >assignment_turned_in</i></a></span>
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
                                    $next = $next +12;
                                    ?>
                                   
                            </div>
		                </div>
                        </div>    
					</div>
	            </div>
               
                  
    </div><!--right-->
       <div class="col-md-2">
     </div>
    <div class="loadmoreform">
             <form method="post" id="loadmorejobs-form" name="loadmorejobs-form">                    
                    <input type="hidden" id="next" name="next" value="<?=$next?>">
                   
             </form>
        </div>
   