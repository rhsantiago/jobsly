<?php
include 'dashboard/Database.php';
include 'dashboard/specialization.php';
   if(isset($_POST['next'])){ $next = $_POST['next']; } 
  $database = new Database();
  include "dashboard/Jobad.php";
  date_default_timezone_set('Asia/Manila');
  $logtimestamp = date("Y-m-d H:i:s");  
  $page='public';
  include "dashboard/serverlogconfig.php";  
  $jobadsarray = array();
    
    $logo="";
    
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
   
   }
    unset($jobad);
    $months = array('Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec');
    $positionlevels = array('Executive','Manager','Assistant Manager','Supervisor','5 Years+ Experienced Employee','1-4 Years Experienced Employee','1 Year Experienced Employee/Fresh Grad');
}
?>
    <div class="row"> 
     </div>
  
    <div class="col-md-4"> <!--left-->
                       
               <div class="section  section-landing notopmargin">
	                 

					<div class="features">
                        
                        <div class="row">                  
                         <div class="jobs">
		                     <div class="col-md-12 leftmargin10">
                                  <?php
                                 $arrlength = count($jobadsarray);
                                 for($index = 0; $index < $arrlength;) {
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
                                                  <img id="jobadheader" src="../jobsly/dashboard/<?=$jobad->getheader()?>"  class="img-responsive fullwidth" width="100%">                                         
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
                                                         <a class="nodecor" href='#showjobmodal' data-toggle="modal" data-target="#showjob-modal" data-jobid="<?=$jobad->getjobid()?>" data-mode="<?=$datamode?>" data-isjobseeker="jobseeker">
                                                    -->    
                                                    <a class="nodecor" target="_blank" href="viewjob-newpage.php?jobid=<?=$jobad->getjobid()?>&mode=<?=$datamode?>&isjobseeker=jobseeker" id="viewjobnewpage"><h2 class="text-info jobcardtitle"><?=$jobad->getjobtitle()?></h2></a>
                                                        <div class="companypos jobad-bottomborder">
                                                            <h6 class="text-muted jobcardcompany"><i><?=$jobad->getcompany()?></i></h6>
                                                        </div> 
                                                </div>
                                                <div class="col-md-3">
                                                    
                                                    <div class="companylogo "> 
                                                        <img src="../jobsly/dashboard/<?=$jobad->getlogo()?>" width="70" height="70" class="img-responsive">
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
                                    ?>
                                   
                            </div>
		                </div>
                        </div>    
					</div>
	            </div>
                  
    </div><!--left-->
                     
    <div class="col-md-4"> <!--middle-->
        <div class="section  section-landing notopmargin">
	                 

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
                                                  <img id="jobadheader" src="../jobsly/dashboard/<?=$jobad->getheader()?>"  class="img-responsive fullwidth" width="100%">                                         
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
                                                         <a class="nodecor" href='#showjobmodal' data-toggle="modal" data-target="#showjob-modal" data-jobid="<?=$jobad->getjobid()?>" data-mode="<?=$datamode?>" data-isjobseeker="jobseeker">
                                                    -->    
                                                    <a class="nodecor" target="_blank" href="viewjob-newpage.php?jobid=<?=$jobad->getjobid()?>&mode=<?=$datamode?>&isjobseeker=jobseeker" id="viewjobnewpage"><h2 class="text-info jobcardtitle"><?=$jobad->getjobtitle()?></h2></a>
                                                        <div class="companypos jobad-bottomborder">
                                                            <h6 class="text-muted jobcardcompany"><i><?=$jobad->getcompany()?></i></h6>
                                                        </div> 
                                                </div>
                                                <div class="col-md-3">
                                                    
                                                    <div class="companylogo "> 
                                                        <img src="../jobsly/dashboard/<?=$jobad->getlogo()?>" width="70" height="70" class="img-responsive">
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
                                    ?>
                                   
                            </div>
		                </div>
                        </div>    
					</div>
	            </div>
    </div><!--middle-->                
          
    <div class="col-md-4"> <!--right-->
         <div class="section  section-landing notopmargin">
	                 

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
                                                  <img id="jobadheader" src="../jobsly/dashboard/<?=$jobad->getheader()?>"  class="img-responsive fullwidth" width="100%">                                         
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
                                                         <a class="nodecor" href='#showjobmodal' data-toggle="modal" data-target="#showjob-modal" data-jobid="<?=$jobad->getjobid()?>" data-mode="<?=$datamode?>" data-isjobseeker="jobseeker">
                                                    -->    
                                                    <a class="nodecor" target="_blank" href="viewjob-newpage.php?jobid=<?=$jobad->getjobid()?>&mode=<?=$datamode?>&isjobseeker=jobseeker" id="viewjobnewpage"><h2 class="text-info jobcardtitle"><?=$jobad->getjobtitle()?></h2></a>
                                                        <div class="companypos jobad-bottomborder">
                                                            <h6 class="text-muted jobcardcompany"><i><?=$jobad->getcompany()?></i></h6>
                                                        </div> 
                                                </div>
                                                <div class="col-md-3">
                                                    
                                                    <div class="companylogo "> 
                                                        <img src="../jobsly/dashboard/<?=$jobad->getlogo()?>" width="70" height="70" class="img-responsive">
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
                                                                                                   <i class="material-icons text-info jobadheadericon">local_atm</i>&nbsp;<span class="h4weight text-danger">Login to view salary</span>
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
   