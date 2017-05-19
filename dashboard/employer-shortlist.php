<?php


    if (session_status() == PHP_SESSION_NONE) {
        session_start();
         if (!isset($database)){
            include 'Database.php';
         }
    }
 
include 'specialization.php';
if(isset($_SESSION['user'])){
   $user = $_SESSION['user'];
   $password = $_SESSION['password'];
   $userid = $_SESSION['userid'];
    date_default_timezone_set('Asia/Manila');
    $logtimestamp = date("Y-m-d H:i:s");
    include "serverlogconfig.php";
    $database = new Database();

    
        
    $mode = 'insert';
    $months = array('Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec');
 
   
    
}

?>



    
    <div class="row">
    <div class="col-md-12 center">            
                    <div class="adstop">     <img  src="https://lh5.ggpht.com/NFYFP2H9CCP50vAQNLa7AtCj_mbbYmOzY978fZqd31oL5qOdvXgxU3KW8ek2VgvIOvTqWY0=w728" 
                                 alt="user">  
                     </div>    
                           
     </div>
   
    <div class="col-md-12">
                             <h2 class="title">Shortlisted Applicants</h2>
       </div>
     </div>
    <div class="col-md-9">
                       
                <div class="section  section-landing">
	                 

					<div class="features">
						<div class="row">
                                                     
                            <div class="col-md-12">
                           <div class="alljobsdiv">
                          <?php
                                $database->query('SELECT id,jobtitle,company from jobads where userid = :userid and isactive=1 order by dateadded desc');
                                $database->bind(':userid', $userid);   
                                try{
                                    $rows = $database->resultset();
                                }catch (PDOException $e) {
                                    $msg = $e->getTraceAsString()." ".$e->getMessage();
                                    $log->error($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
                                    die("");
                                }     
                                foreach($rows as $row){
                                    $jobid = $row['id'];
                                    $jobtitle = $row['jobtitle'];
                                    $company = $row['company'];
                                  
                                
                         ?> 
                               
                               <section class="blog-post">
                                    <div class="panel panel-default">                                    
                                      <div class="panel-body jobad-bottomborder">
                               <div><span class="text-info jobad-title"><?=$jobtitle?></span><span class="text-muted"><i>&nbsp;<?=$company?></i></span></div>
                                    <div class="table-responsive">      
                                     <table class="table table-hover table-condensed">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Specialization</th>
                                                    <th>Job Position</th>                                                   
                                                    <th class="text-right">Salary</th>
                                                    <th class="text-center">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                              
                                        <?php
                                            $database->query('SELECT distinct jobapplications.userid,fname,lname,jobapplications.esalary,jobapplications.isshortlisted, additionalinformation.specialization from  personalinformation, jobapplications, additionalinformation,jobads where 
                                            jobads.id=:jobid 
                                            and jobapplications.isreject=0
                                            and jobapplications.jobid=jobads.id  
                                            and jobapplications.userid=personalinformation.userid 
                                            and jobapplications.userid=additionalinformation.userid                                      
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
                                               
                                                $specialization = $row2['specialization'];
                                                $isshortlisted = $row2['isshortlisted'];
                                                
                                                 $database->query('select distinct position from workexperience,jobapplications where workexperience.userid = :userid order by startdate desc limit 0,1');
                                                 $database->bind(':userid', $applicantid);
                                                 try{
                                                    $row3 = $database->single();
                                                 }catch (PDOException $e) {
                                                    $msg = $e->getTraceAsString()." ".$e->getMessage();
                                                    $log->error($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
                                                    die("");
                                                 } 
                                                  $position = $row3['position'];
                                       ?>
                                   
                                                <tr>
                                                    <td>
                                                        <ul class="list-inline"> 
                                                            <li>
                                                                <span class="h4weight"><?=$fname?> <?=$lname?></span>
                                                            </li>                                                          
                                                        </ul>
                                                    </td>
                                                    <td><?=$specarray[$specialization]?></td>       
                                                    <td><?=$position?></td>                                                   
                                                    <td class="text-right">Php <?=$esalary?></td>
                                                    <td class="td-actions text-right">
                                                        <form method="post" action="viewresume-newpage.php" id="viewresume-form<?=$applicantid?>" name="viewresume-form<?=$applicantid?>" target="_blank">                    
                                                                <input type="hidden" id="mode" name="mode" value="view">
                                                                <input type="hidden" id="jobid" name="jobid" value="<?=$jobid?>">
                                                                <input type="hidden" id="applicantid" name="applicantid" value="<?=$applicantid?>">   
                                                            </form>
                                                            <a target="_blank" href="#resumeview" data-applicantid="<?=$applicantid?>" id="resumeview" title="View Profile" ><i class="fa fa-user fa-2x text-info"></i></a>
                                                        <!--
                                                        <form method="post" id="viewresume-form" name="viewresume-form">                    
                                                                <input type="hidden" id="mode" name="view" value="view">
                                                                <input type="hidden" id="jobid" name="view" value="<?=$jobid?>">
                                                                <input type="hidden" id="applicantid" name="applicantid" value="<?=$applicantid?>">   
                                                            </form>
                                                            <a target="_blank" href="viewresume-newpage.php?applicantid=<?=$applicantid?>&jobid=<?=$jobid?>" rel="tooltip" id="applicantview" title="View Profile" ><i class="fa fa-user fa-2x text-info"></i></a>
                                                       
                                                        <a href="#viewresumemodal" data-applicantid="<?=$applicantid?>" data-userid="<?=$userid?>" data-jobid="<?=$jobid?>" data-toggle="modal" data-target="#viewresume-modal" rel="tooltip" id="applicantview" title="View Profile" >
                                                            <i class="fa fa-user text-info"></i>
                                                        </a>       
                                                        -->
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
                               
                               
                               
                         <?php
                                }
                          ?>
                                
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
            

<script>
    /*
jquery(document).ready(function ($) {
  $('#successdivdeljob').hide();
    
    $('#pinfo-form #fname').parsley().on('field:error', function() {
           $('#pinfo-form #fnamediv').addClass('has-error');
           $('#pinfo-form #fnamediv').append("<span class='material-icons form-control-feedback'>clear</span>");   
    });    
    $('#pinfo-form #fname').parsley().on('field:success', function() {
            $('#pinfo-form #fnamediv').addClass('has-success');
            $('#pinfo-form #fnamediv').find('span').remove()
            $('#pinfo-form #fnamediv').append("<span class='material-icons form-control-feedback'>done</span>");   
    });
    
   
    
  
    
});       */  
</script>