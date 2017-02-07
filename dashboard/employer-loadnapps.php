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
                               
                               <section class="blog-post">
                                    <div class="panel panel-default">                                    
                                      <div class="panel-body jobad-bottomborder">
                                          <div><h4 class="text-info h4weight">New Applicants</h4></div>
                                    <div class="table-responsive">      
                                     <table class="table table-hover table-condensed">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Specialization</th>
                                                    <th>Job Position</th>                                                   
                                                    <th>Salary</th>
                                                    <th class="text-right">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                              
                                        <?php
                                            $database->query('SELECT distinct jobapplications.userid,fname,lname,jobapplications.esalary,jobapplications.isnew, additionalinformation.specialization, (select distinct position from workexperience,jobapplications where workexperience.userid=jobapplications.userid order by startdate desc limit 0,1) as position from workexperience, personalinformation, jobapplications,additionalinformation,jobads where 
                                            jobads.id=:jobid 
                                            and jobapplications.isreject=0
                                            and jobapplications.jobid=jobads.id  
                                            and jobapplications.userid=personalinformation.userid 
                                            and jobapplications.userid=additionalinformation.userid
                                            and jobapplications.userid=workexperience.userid 
                                            and jobapplications.isnew=1');
                                            $database->bind(':jobid', $jobid);                                             

                                            $rows2 = $database->resultset();
                                            foreach($rows2 as $row2){
                                                $applicantid = $row2['userid'];
                                                $fname = $row2['fname'];
                                                $lname = $row2['lname'];
                                                $esalary = $row2['esalary'];
                                                $position = $row2['position'];
                                                $specialization = $row2['specialization'];
                                                $isnew = $row2['isnew'];
                                       ?>
                                   
                                                <tr>
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
                                                     <!--   <form method="post" id="viewresume-form" name="viewresume-form">                    
                                                            <input type="hidden" id="mode" name="view" value="view">
                                                            <input type="hidden" id="applicantid" name="applicantid" value="<?=$applicantid?>">
                                                            <input type="hidden" id="userid" name="userid" value="<?=$userid?>">
                                                        </form>    
                                                    -->
                                                        <a href="#viewresumemodal" data-applicantid="<?=$applicantid?>" data-userid="<?=$userid?>" data-jobid="<?=$jobid?>" data-toggle="modal" data-target="#viewresume-modal" rel="tooltip" id="applicantview" title="View Profile" >
                                                            <i class="fa fa-user text-info"></i>
                                                        </a>                                                       
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
            
