<?php


    if (session_status() == PHP_SESSION_NONE) {
        session_start();
         if (!isset($database)){
            include 'Database.php';
         }
    }
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
                                $database->query('SELECT id,jobtitle,company from jobads where id =:jobid and userid = :userid and isactive=1 order by dateadded desc');
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
                                  
                                
                         ?> 
                               <form method="post" id="shortlist-form" name="shortlist-form"> 
                                                             <input type="hidden" id="applicantid" name="applicantid" value="">
                                                             <input type="hidden" id="jobid" name="jobid" value="">
                                                             <input type="hidden" id="mode" name="mode" value="remove">   
                                                       </form> 
                               <section class="blog-post">
                                    <div class="panel panel-default">                                    
                                      <div class="panel-body jobad-bottomborder">
                                          <div><h4 class="text-success h4weight">Shortlisted Applicants</h4></div>
                                    <div class="table-responsive">      
                                     <table id="shortlisttable" class="table table-hover table-condensed">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th class="col-md-2">Specialization</th>
                                                    <th class="col-md-2">Job Position</th>                                                   
                                                    <th>Salary</th>
                                                    <th class="text-right">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                              
                                        <?php
                                            $database->query('SELECT distinct jobapplications.userid,fname,lname,jobapplications.esalary,jobapplications.isshortlisted, additionalinformation.specialization, (select distinct position from workexperience,jobapplications where workexperience.userid=jobapplications.userid order by startdate desc limit 0,1) as position from workexperience, personalinformation, jobapplications,additionalinformation,jobads where 
                                            jobads.id=:jobid 
                                            and jobapplications.isreject=0
                                            and jobapplications.jobid=jobads.id  
                                            and jobapplications.userid=personalinformation.userid 
                                            and jobapplications.userid=additionalinformation.userid
                                            and jobapplications.userid=workexperience.userid 
                                            and jobapplications.isshortlisted=1');
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
                                                $specialization = $row2['specialization'];
                                                $isshortlisted = $row2['isshortlisted'];
                                                
                                       ?>
                                   
                                                <tr id="line<?=$applicantid?>">
                                                    <td><?=$fname?> <?=$lname?></td>
                                                    <td><?=$specarray[$specialization]?></td>       
                                                    <td><?=$position?></td>                                                   
                                                    <td>Php <?=$esalary?></td>
                                                    <td class="td-actions text-right">                                               
                                                        <ul class="list-inline">
                                                            <li>
                                                        <a href="#viewresumemodal" data-applicantid="<?=$applicantid?>" data-userid="<?=$userid?>" data-jobid="<?=$jobid?>" data-view="shortlist" data-toggle="modal" data-target="#viewresume-modal" rel="tooltip" id="applicantview" title="View Profile" >
                                                            <i class="fa fa-user text-info"></i>
                                                        </a>
                                                        </li>
                                                        <li>                                                        
                                                         <button type="button" id="shortlistbutton" data-applicantid="<?=$applicantid?>" data-jobid="<?=$jobid?>" data-mode="remove" rel="tooltip" title="Remove from shortlist" class=" btn btn-danger btn-simple"><i class="fa fa-times"></i></button>   
                                                        </li>
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
            
