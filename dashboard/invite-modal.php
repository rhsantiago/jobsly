<?php
if (session_status() == PHP_SESSION_NONE) {
        session_start();
       
    }    
if(isset($_POST['userid'])){ $userid = $_POST['userid']; }
if(isset($_POST['applicantid'])){ $applicantid= $_POST['applicantid']; }
if(isset($_POST['jobid'])){ $jobid = $_POST['jobid']; }
if(isset($_POST['mode'])){ $mode = $_POST['mode']; }

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
 