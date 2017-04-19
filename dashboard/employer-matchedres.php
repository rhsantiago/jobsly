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
if(isset($_POST['jobid'])){ $jobid = $_POST['jobid']; } 
if(isset($_SESSION['user'])){
   $user = $_SESSION['user'];
   $password = $_SESSION['password'];
   $userid = $_SESSION['userid'];
    
    include "serverlogconfig.php";
    $database = new Database();

    
        
    $mode = 'insert';
    $months = array('Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec');
    $positionlevels = array('Executive','Manager','Assistant Manager','Supervisor','5 Years+ Experienced Employee','1-4 Years Experienced Employee','1 Year Experienced Employee/Fresh Grad');
   
    
}else{
    header("Location: logout.php");
}

?>



    
    <div class="row">
 
     </div>
    <div class="col-md-9">
                       
                <div class="section  section-landing">
	                 

					<div class="features">
						<div class="row">
                                                     
                            <div class="col-md-12">
                           <div class="alljobsdiv">
                          <?php
                                $database->query('SELECT id,jobtitle,company,specialization from jobads where id =:jobid and userid = :userid and isactive=1 order by dateadded desc');
                                $database->bind(':userid', $userid);
                                $database->bind(':jobid', $jobid);
                                try{
                                    $row = $database->single(); 
                                }catch (PDOException $e) {
                                     $msg = $e->getTraceAsString()." ".$e->getMessage();
                                     $log->error($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
                                     die("");
                                }
                                    $jobid = $row['id'];
                                    $jobtitle = $row['jobtitle'];
                                    $company = $row['company'];
                                    $specialization = $row['specialization'];
                                  
                                
                         ?> 
                               <form method="post" id="invite-form" name="invite-form"> 
                                                             <input type="hidden" id="applicantid" name="applicantid" value="">
                                                             <input type="hidden" id="jobid" name="jobid" value="">
                                                             <input type="hidden" id="mode" name="mode" value="remove">   
                                                       </form> 
                               <section class="blog-post">
                                    <div class="panel panel-default">                                    
                                      <div class="panel-body jobad-bottomborder">
                                          <div><h4 class="text-warning h4weight">Matched Resumes</h4></div>
                                    <div class="table-responsive">      
                                     <table id="matchedtable" class="table table-hover table-condensed">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th class="col-md-2">Specialization</th>
                                                    <th class="col-md-2">Job Position</th>                                                   
                                                    <th>Salary</th>
                                                    <th class="text-left">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                              
                                        <?php
                                            $database->query('SELECT distinct personalinformation.userid, personalinformation.fname, personalinformation.lname, additionalinformation.specialization, additionalinformation.esalary, (select  position from workexperience where workexperience.userid=personalinformation.userid order by startdate desc limit 0,1) as position from personalinformation,additionalinformation where personalinformation.userid = additionalinformation.userid and  additionalinformation.specialization=:specialization and personalinformation.userid not in (select jobapplications.userid from jobapplications where jobapplications.jobid=:jobid)');
                                            $database->bind(':specialization', $specialization); 
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
                                                $fname = $row2['fname'];
                                                $lname = $row2['lname'];
                                                $esalary = $row2['esalary'];
                                                $position = $row2['position'];
                                                $specialization2 = $row2['specialization'];
                                                
                                                $database->query('Select count(id) as invitecheck from jobinvitations where jobid=:jobid and userid=:applicantid');
                                                $database->bind(':applicantid', $applicantid); 
                                                $database->bind(':jobid', $jobid);
                                                try{    
                                                    $row3 = $database->resultset();
                                                }catch (PDOException $e) {
                                                    $msg = $e->getTraceAsString()." ".$e->getMessage();
                                                    $log->error($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
                                                    die("");
                                                }                                                
                                                $row3 = $database->single(); 
                                                $invitecheck = $row3['invitecheck'];
                                       ?>
                                   
                                                <tr id="line<?=$applicantid?>">
                                                    <td><?=$fname?> <?=$lname?></td>
                                                    <td><?=$specarray[$specialization2]?></td>       
                                                    <td><?=$position?></td>                                                   
                                                    <td>Php <?=$esalary?></td>
                                                    <td class="td-actions ">                                               
                                                        <ul class="list-inline">
                                                            <li>
                                                        <a href="#viewresumemodal" data-applicantid="<?=$applicantid?>" data-userid="<?=$userid?>" data-jobid="<?=$jobid?>" data-view="shortlist" data-toggle="modal" data-target="#viewresume-modal" rel="tooltip" id="applicantview" title="View Profile" >
                                                            <i class="fa fa-user fa-2x text-info"></i>
                                                        </a>
                                                        </li>
                                                        <?php
                                                            if($invitecheck == 0){
                                                        ?>
                                                        <li id='invited<?=$applicantid?>'>
                                                         <a href="#invitemodal" data-applicantid="<?=$applicantid?>" data-mode="insert" data-userid="<?=$userid?>" data-jobid="<?=$jobid?>" data-view="matched" data-toggle="modal" data-target="#invite-modal" rel="tooltip" id="inviteview" title="Invite to Apply" >
                                                            <i class="fa fa-envelope fa-2x text-warning"></i>    
                                                          </a> 
                                                        </li>
                                                        <?php
                                                            }else{
                                                        ?>
                                                        <li id='invited<?=$applicantid?>'>                                                         
                                                            <i class="fa fa-check text-success"> Invite sent</i>         
                                                        </li>       
                                                                
                                                        <?php        
                                                            }
                                                            
                                                        ?>    
                                                            
                                                        </ul>        
                                                    </td>
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
                                        <div class="col-md-12">
                                
                                                  
                                           
                                   
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
            
