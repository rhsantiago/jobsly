<?php
if (session_status() == PHP_SESSION_NONE) {
        session_start();
        include 'Database.php';
    }    
if(isset($_POST['applicantid'])){ $applicantid = $_POST['applicantid']; }
if(isset($_POST['jobid'])){ $jobid = $_POST['jobid']; }
if(isset($_POST['mode'])){ $mode = $_POST['mode']; }
if(isset($_POST['page'])){ $page = $_POST['page']; }

if($mode=='reject'){
?>    
    
   <form method="post" id="rejectapp-form" name="rejectapp-form"> 
             <input type="hidden" id="applicantid" name="applicantid" value="<?=$applicantid?>">
             <input type="hidden" id="jobid" name="jobid" value="<?=$jobid?>">
             <input type="hidden" id="mode" name="mode" value="reject">
             <input type="hidden" id="page" name="page" value="<?=$page?>">
<div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title text-primary h4weight" id="myModalLabel">Reject Application</h4>
	      </div>
	      <div id="modalrejectapp" class="modal-body modal-gray">
	                              
                                    <div class="card card-nav-tabs">
                                           
                                             <div class="content">
                                                    <div class="tab-content">
                                                        <div class="tab-pane active" id="profile">
                                                            <div class="row">
                                                                  
                                                               
                                                                <div class="col-md-12 col-xs-12 text-center">
                                                                
                                                                   <h3><label class="text-danger">Are you sure you want to Reject this Applicant? This cannot be recovered.</label></h3>
                                                                    

                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                             </div>
                                    </div>
                               
                           
	      </div>
	      <div class="modal-footer blog-post">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        <button type="submit" class="btn btn-primary">I'm sure</button>
	      </div>
</form>
    
    
    
    
<?php    
    
    
}

?>