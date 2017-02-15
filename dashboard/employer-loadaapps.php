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

                                $row = $database->single(); 
                               
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
                                          <div><h4 class="text-primary h4weight">Active Applications</h4></div>
                                    <div class="table-responsive">      
                                     <table id="activeappstable" class="table table-hover table-condensed">
                                            <thead>
                                                <tr>
                                                   
                                                    <th>Name</th>
                                                    <th>Specialization</th>
                                                    <th>Job Position</th>                                                   
                                                    <th>Salary</th>
                                                    <th class="text-center">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                              
                                        <?php
                                            $database->query('SELECT distinct jobapplications.userid,fname,lname,jobapplications.esalary,jobapplications.isshortlisted,jobapplications.isnew, additionalinformation.specialization, (select distinct position from workexperience,jobapplications where workexperience.userid=jobapplications.userid order by startdate desc limit 0,1) as position from workexperience, personalinformation, jobapplications,additionalinformation,jobads where 
                                            jobads.id=:jobid 
                                            and jobapplications.isreject=0
                                            and jobapplications.jobid=jobads.id  
                                            and jobapplications.userid=personalinformation.userid 
                                            and jobapplications.userid=additionalinformation.userid
                                            and jobapplications.userid=workexperience.userid order by jobapplications.id desc');
                                            $database->bind(':jobid', $jobid);                                             

                                            $rows2 = $database->resultset();
                                             
                                            foreach($rows2 as $row2){
                                                $applicantid = $row2['userid'];
                                                $fname = $row2['fname'];
                                                $lname = $row2['lname'];
                                                $esalary = $row2['esalary'];
                                                $position = $row2['position'];
                                                $specialization = $row2['specialization'];
                                                $isshortlisted = $row2['isshortlisted'];
                                                $isnew = $row2['isnew'];
                                       ?>
                                   
                                                <tr id="line<?=$applicantid?>">                                                   
                                                    <td>
                                                    <ul class="list-inline"> 
                                                        <li>
                                                            <span class="h4weight"><?=$fname?> <?=$lname?></span>
                                                        </li>
                                                        <li id="newbadgediv<?=$applicantid?>">                                                   
                                                            <?php
                                                                if($isnew==1){
                                                                    echo "<span class='badge'>New</span>";
                                                                }
                                                            ?>
                                                        </li>
                                                    </ul>    
                                                    </td>
                                                    <td><?=$specarray[$specialization]?></td>       
                                                    <td><?=$position?></td>                                                   
                                                    <td>Php <?=$esalary?></td>
                                                    <td class="td-actions text-right">
                                                  <ul class="list-inline">
                                                        <li class="marginright-10">
                                                            <a href="#viewresumemodal" data-applicantid="<?=$applicantid?>" data-userid="<?=$userid?>" data-jobid="<?=$jobid?>" data-toggle="modal" data-target="#viewresume-modal" rel="tooltip" id="applicantview" title="View Profile" ><i class="fa fa-user text-info"></i></a>
                                                        </li>
                                                      <li id="slline<?=$applicantid?>" class="marginright-10">   
                                                            <?php
                                                                if($isshortlisted==0){
                                                            ?>      
                                                            <button id="shortlistbutton" type="button" data-applicantid="<?=$applicantid?>" data-jobid="<?=$jobid?>" data-mode="add" rel="tooltip" title="Add to shortlist" class="btn btn-success btn-simple"><i class="fa fa-plus"></i></button>                                                          
                                                            <?php
                                                                }else{
                                                            ?>        
                                                                 <button type='button' rel='tooltip' title='Already in shortlist' class='btn btn-success btn-simple'><i class='fa fa-check'></i></button>
                                                            <?php
                                                                }
                                                            ?>
                                                        </li>
                                                       <li>
                                                            <a href="#rejectappmodal" id="rejectbutton" type="button" data-applicantid="<?=$applicantid?>" data-jobid="<?=$jobid?>" data-toggle="modal" data-mode="reject" data-target="#rejectapp-modal" rel="tooltip" title="Reject" class="btn btn-danger btn-simple"><i class="fa fa-times"></i></a>
                                                       
                                                        </li>
                                                  </ul>
                                                    </td>
                                                </tr>
                                            <?php                                               
                                            }
                                            ?>
                                                
                                            </tbody>
                                        </table>
                                        <div class="col-md-12 center">
                                                        <a id="aappsloadmore" class="btn btn-primary" data-target="">Load More</a>
                                                </div>
                                        
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
            
