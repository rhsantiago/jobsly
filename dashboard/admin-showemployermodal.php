<?php
if (session_status() == PHP_SESSION_NONE) {
        session_start();
        include 'Database.php';
    }
if(isset($_SESSION['user'])){
   $user = $_SESSION['user'];
   $password = $_SESSION['password'];
   $adminid = $_SESSION['adminid'];
}else{
    header("Location: logout.php");
}
include 'specialization.php';
$isjobseeker = '';
if(isset($_POST['employerid'])){ $employerid = $_POST['employerid']; }
if(isset($_POST['mode'])){ $mode = $_POST['mode']; }

 date_default_timezone_set('Asia/Manila');
 $logtimestamp = date("Y-m-d H:i:s"); 
 include "serverlogconfig.php";
 $database = new Database();
 
    $database->query('SELECT * from useraccounts, companyinfo where useraccounts.id=:employerid and useraccounts.id=companyinfo.id');
    $database->bind(':employerid', $employerid);
    try{
        $row = $database->single();
     }catch (PDOException $e) {
        $msg = $e->getTraceAsString()." ".$e->getMessage();
        $log->error($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
        die("");
    }      
    $email = $row['useraccounts.email'];    
    $signupdate = $row['useraccounts.signupdate'];
    $sdate = explode("-", $signupdate);
    $signupdate = $sdate[1] .'/'.$sdate[2].'/'.$sdate[0];
    $companyname = $row['companyinfo.companyname'];
    $companyaddress = $row['companyinfo.companyaddress'];
    $companywebsite = $row['companyinfo.companywebsite'];
    $telno = $row['companyinfo.telno'];
    $companytin = $row['companyinfo.companytin'];
    $cperson = $row['companyinfo.cperson'];
    $designation = $row['companyinfo.designation'];
    $cpersonemail = $row['companyinfo.cpersonemail'];
    $cpersontelno = $row['companyinfo.cpersontelno'];
    $industry = $row['companyinfo.industry'];
    $numemp = $row['companyinfo.numemp'];
    $ctype = $row['companyinfo.ctype'];
    $cdesc = $row['companyinfo.cdesc'];
    $logo = $row['companyinfo.logo'];
     
    $months = array('Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec');
?>

    
<div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title text-primary h4weight" id="myModalLabel">Job Ad</h4>
	      </div>
              
	      <div id="modaldeljobad" class="modal-body modal-gray">
	                           
                 <section class="blog-post">
                                    <div class="panel panel-default">
                                      <img src="img/fjord.jpg" class="img-responsive">
                                       
                                      <div class="panel-body jobad-bottomborder">
                                          <div class="jobad-meta jobad-bottomborder">
                                      <p class="blog-post-date pull-right text-muted"><?=$months[$sdate[1]-1]?>&nbsp;<?=$sdate[2]?>,&nbsp;<?=$sdate[0]?></p>
                                                                             
                                        </div>
                                     
                                        <div class="blog-post-content">
                                            <div class="row-fluid">
                                                <div class="col-md-6">
                                                        <h2 class="text-info jobad-title"><?=$jobtitle?></h2>
                                                        <div class="companypos">
                                                            <h6 class="text-muted"><i><?=$company?></i></h6>
                                                        </div> 
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="companylogo pull-right"> 
                                                        <img src="<?=$logo?>" width="120" height="120" class="img-responsive">
                                                    </div>
                                                </div>
                                            </div>    
                                         
                                          <div class="row-fluid">
                                                 <div class="col-md-12">  
                                                      <?=$teaser?>...<br><br>
                                                 </div>
                                                <div class="col-md-12">   
                                               
                                                    <div class="collapse-group collapse" id="viewdetails">
                                                  <?=$jobdesc?>
                                                        
                                                    <div><b>Requirements</b></div>
                                                        <ul>
                                                            <?php
                                                            if($yrsexp > 0){
                                                            ?>    
                                                                <li><?=$yrsexp?> years work experience</li>
                                                            <?php
                                                            }
                                          
                                                            if(!empty($mineduc)){
                                                            ?>                                                            
                                                                <li><?=$mineduc?></li>
                                                            <?php
                                                            }
                                          
                                                            if(!empty($languages)){
                                                            ?>
                                                                <li><?=$languages?></li>
                                                            <?php
                                                            }
                                          
                                                            if(!empty($licenses)){
                                                            ?>
                                                                <li><?=$licenses?></li>
                                                            <?php
                                                            }
                                          
                                                            if($wtravel == 'on'){
                                                            ?>
                                                                <li>Willing to travel</li>
                                                            <?php
                                                            }
                                          
                                                             if($wrelocate == 'on'){
                                                            ?>
                                                                <li>Willing to relocate</li>
                                                            <?php
                                                            }
                                                            ?>
                                                            
                                                        </ul>
                                                        <p><b>Technical / Job-specific skills</b></p>
                                                        <ul>
                                                            <?php
                                                      
                                                                    $database->query('SELECT * FROM jobskills where jobid = :jobid');                                                   
                                                                    $database->bind(':jobid', $jobid);
                                                                    try{
                                                                        $rows = $database->resultset();
                                                                    }catch (PDOException $e) {
                                                                        $error = true;
                                                                        $msg = $e->getTraceAsString()." ".$e->getMessage();
                                                                        include "serverlog.php";
                                                                        die("");
                                                                    } 
                                                                    foreach($rows as $row){
                                                                        echo '<li>';
                                                                        echo $row['jobskill'];
                                                                        echo '</li>';
                                                                    }

                                                             ?>                                                              
                                                        </ul>
                                                        <p><b>Location: </b><?=$city?>, <?=$province?> <?=$country?></p>
                                                        <p><b>Position start date: </b><?=$months[$sdate[1]-1]?>&nbsp;<?=$sdate[2]?>,&nbsp;<?=$sdate[0]?></p>
                                                        <p><b>Application deadline: </b><?=$months[$edate[1]-1]?>&nbsp;<?=$edate[2]?>,&nbsp;<?=$edate[0]?></p>     
                                                    </div>    
                                                </div>
                                            </div>
                                          
                                        </div>
                                        <div class="row-fluid">
                                                <div class="col-md-6">
                                                        <a class="btn btn-primary" data-toggle="collapse" data-target="#viewdetails">Read more</a>
                                                </div>
                                          </div>    
                                          <div id="adapproveddiv" class="adapproveddiv">
                                                <div class="row-fluid">
                                                        <div class="col-md-12">
                                                            <div id="successadapproved" name="successadapproved" class="alert alert-success">
                                               
                                                                  <div class="alert-icon">
                                                                    <i class="material-icons">check</i>
                                                                  </div>
                                                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                    <span aria-hidden="true"><i class="material-icons">clear</i></span>
                                                                  </button>
                                                                  <b>Alert: </b> Job Ad Approved!

                                                            </div>
                                                    </div>    
                                              </div>    
                                          </div>   
                                         
                                      </div>
                                    
                                    </div>
                                  </section>          
                           
	      </div>
	      <div class="modal-footer blog-post">
                <form method="post" id="approvejobad-form" name="approvejobad-form">
                    <input type="hidden" id="jobid" name="jobid" value="<?=$jobid?>">
                    <input type="hidden" id="mode" name="mode" value="approve">
               </form>    
	           <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
               <button type="button" id="approvejobad" name="approvejobad" class="btn btn-primary">Approve</button>
	      </div>
<script>
jQuery(document).ready(function ($) {
    jQuery('#adapproveddiv').hide();
    jQuery(function() {
       $.material.init();
    });
    
    jQuery('#approvejobad').on('click',function() {  
        $('#approvejobad-form').submit();
     });
    
});       
</script>