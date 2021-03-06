<?php
if (session_status() == PHP_SESSION_NONE) {
        session_start();
        include 'Database.php';
    }    
if(isset($_POST['userid'])){ $useridpost = $_POST['userid']; }
if(isset($_POST['templateid'])){ $templateid = $_POST['templateid']; }
//if(isset($_POST['mode'])){ $mode = $_POST['mode']; }

if(isset($_SESSION['user'])){
$userid = $_SESSION['userid'];
date_default_timezone_set('Asia/Manila');
$logtimestamp = date("Y-m-d H:i:s");
include "serverlogconfig.php";
$database = new Database();
    
$database->query('SELECT jobtitle from jobtemplates where userid = :userid and id = :templateid');
$database->bind(':userid', $userid);   
$database->bind(':templateid', $templateid); 
   try{
       $row = $database->single();
   }catch (PDOException $e) {
       $msg = $e->getTraceAsString()." ".$e->getMessage();
       $log->error($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
       die("");
   }        
   $jobtitle = $row['jobtitle'];
}else{
    header("Location: logout.php");
}


?>    
    
   <form method="post" id="template-form-modal" name="template-form-modal" data-parsley-validate>
             <input type="hidden" id="userid" name="userid" value="<?=$userid?>">
             <input type="hidden" id="templateid" name="templateid" value="<?=$templateid?>">
             <input type="hidden" id="mode" name="mode" value="del">
<div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title text-primary h4weight" id="myModalLabel">Delete Job Ad Template</h4>
	      </div>
	      <div id="modaldeltemplate" class="modal-body modal-gray">
	                              
                                    <div class="card card-nav-tabs">
                                           
                                             <div class="content">
                                                    <div class="tab-content">
                                                        <div class="tab-pane active" id="profile">
                                                            <div class="row">
                                                                  
                                                               
                                                                <div class="col-md-12 col-xs-12 text-center">
                                                                
                                                                   <h3 ><label class="text-danger">Are you sure you want to delete the Job Ad Template</label> <br><label class=""><?=$jobtitle?>?</label></h3>
                                                                    

                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                             </div>
                                    </div>
                               
                           
	      </div>
	      <div class="modal-footer blog-post">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        <button type="submit" class="btn btn-danger">I'm sure</button>
	      </div>
</form>
    
    