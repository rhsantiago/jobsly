<?php
if (session_status() == PHP_SESSION_NONE) {
        session_start();   
}
if(isset($_SESSION['user'])){

if(isset($_POST['jobid'])){ $jobid = $_POST['jobid']; }
if(isset($_POST['userid'])){ $userid = $_POST['userid']; }
date_default_timezone_set('Asia/Manila');
$logtimestamp = date("Y-m-d H:i:s"); 
include "serverlogconfig.php";
include 'Database.php';
$database = new Database();

    $database->query('SELECT * from savedapplications where jobid= :jobid and userid = :userid');
    $database->bind(':userid', $userid);
    $database->bind(':jobid', $jobid);
    try{
        $checkrow = $database->single();
    }catch (PDOException $e) {
        $msg = $e->getTraceAsString()." ".$e->getMessage();
        $log->error($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
        die("");
    }     
    if(empty($checkrow)){
        $database->query('INSERT INTO savedapplications (id, jobid, userid) VALUES (NULL, :jobid,:userid)');
        $database->bind(':jobid', $jobid);  
        $database->bind(':userid', $userid);
        try{
            $database->execute();
            $msg = "savedapplications insert";
            $log->info($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
        }catch (PDOException $e) {
            $msg = $e->getTraceAsString()." ".$e->getMessage();
            $log->error($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
            die("");
        }     
        $msg = 'This job ad has been saved. View it under Saved Applications.';
    }else{
        $msg ='You already saved this job ad.';
    }
}else{
    header("Location: logout.php");
}
    
  
?> 
     
<div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="myModalLabel">Save Job Ad</h4>
	      </div>
	      <div id="modaldeljobad" class="modal-body modal-gray">
	                              
                                    <div class="card card-nav-tabs">
                                           
                                             <div class="content">
                                                    <div class="tab-content">
                                                        <div class="tab-pane active" id="profile">
                                                            <div class="row">
                                                                  
                                                               
                                                                <div class="col-md-12 col-xs-12 text-center">
                                                                
                                                                   <h3 ><label class="text-primary"><?=$msg?></label></h3>
                                                                    

                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                             </div>
                                    </div>
                               
                           
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Ok</button>	       
	      </div>

