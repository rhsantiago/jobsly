<?php
if (session_status() == PHP_SESSION_NONE) {
        session_start();
       
    }    
if(isset($_SESSION['user'])){
if(isset($_POST['userid'])){ $userid = $_POST['userid']; }
if(isset($_POST['applicantid'])){ $applicantid= $_POST['applicantid']; }
if(isset($_POST['jobid'])){ $jobid = $_POST['jobid']; }
if(isset($_POST['mode'])){ $mode = $_POST['mode']; }

date_default_timezone_set('Asia/Manila');
$logtimestamp = date("Y-m-d H:i:s");
include "serverlogconfig.php";
include 'specialization.php';    
include 'Database.php';
$database = new Database();    
            $database->query('select position as maxposition,fname,lname,photo,esalary,specialization from workexperience, personalinformation,useraccounts,additionalinformation where personalinformation.userid=:userid and startdate = (select max(startdate) from workexperience where workexperience.userid=:userid) and useraccounts.id=:userid and additionalinformation.userid=:userid');
            $database->bind(':userid', $applicantid);   
            try{
            $row = $database->single();
            }catch (PDOException $e) {
                $msg = $e->getTraceAsString()." ".$e->getMessage();
                $log->error($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
                die("");
            }     
            $maxposition = $row['maxposition'];
            $fname = $row['fname'];
            $lname = $row['lname'];
           
            $esalary = $row['esalary'];
            $specialization = $row['specialization'];
            $photo = $row['photo'];
  
?>    
    
   <form method="post" id="invite-form" name="invite-form"> 
             <input type="hidden" id="userid" name="userid" value="<?=$userid?>">
             <input type="hidden" id="applicantid" name="applicantid" value="<?=$applicantid?>"> 
             <input type="hidden" id="jobid" name="jobid" value="<?=$jobid?>">
             <input type="hidden" id="mode" name="mode" value="<?=$mode?>">
<div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title text-primary h4weight" id="myModalLabel">Invite to Apply</h4>
	      </div>
	      <div id="modalinvite" class="modal-body modal-gray">
	                              
                                    <div class="card card-nav-tabs">
                                           
                                             <div class="content">
                                                    <div class="tab-content">
                                                        <div class="tab-pane active" id="profile">
                                                            <div class="row">
                                                                  <div class="col-md-12 col-xs-12 text-center">
                                                                
                                                                    <h3><label class="text-success">Invite this Applicant to Apply? <span class='text-info'></span></label></h3>
                                                                    
                                                                        
                                                                </div>
                                                               
                                                                
                                                                <div class="col-md-12 col-xs-12 text-center">
                                                                     <section class="blog-post">
                                    <div class="panel panel-default">
                                    
                                      <div class="panel-body">                                        
                                            
                                        <div class="blog-post-content">
                                            
                         <div class="row-fluid">
                           <div class="col-md-12">                                                    
                                <div align="left">
                                    <div class="avatar center">
                                        <img src="<?=$photo?>" alt="Circle Image" class="img-circle im-responsive img-raised center" style="width: 120px; height: 120px;">
                                    </div>
                                    <div class="name center">
                                        <h4 class="homename text-info"><?=$fname?>&nbsp;<?=$lname?></h4>
                                        <h5 class="homepos text-info"><?=$maxposition?></h5>
                                    </div>  
                                 </div>
                            </div>  
                                                
                          </div>    
                                       </div>
                                    </div>
                                    </div>
                                </section>
                                                                </div>    
                                                            </div>
                                                        </div>

                                                    </div>
                                             </div>
                                    </div>
                               
                           
	      </div>
	      <div class="modal-footer blog-post">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        <button type="submit" class="btn btn-primary">Invite</button>
	      </div>
</form>
 <?php
} else{
    include 'logout.php';
    
}
?>