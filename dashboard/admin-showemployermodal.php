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
 $sdate='';
 $signupdate='';
 $email='';
    $database->query('SELECT * from useraccounts, companyinfo where useraccounts.id=:employerid and useraccounts.id=companyinfo.userid');
    $database->bind(':employerid', $employerid);
    try{
        $row = $database->single();
     }catch (PDOException $e) {
        $msg = $e->getTraceAsString()." ".$e->getMessage();
        $log->error($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
        die("");
    }      
    $email = $row['email'];    
    $signupdate = $row['signupdate'];
    $sdate = explode("-", $signupdate);
 
    $companyname = $row['companyname'];
    $companyaddress = $row['companyaddress'];
    $companywebsite = $row['companywebsite'];
    $telno = $row['telno'];
    $companytin = $row['companytin'];
    $cperson = $row['cperson'];
    $designation = $row['designation'];
    $cpersonemail = $row['cpersonemail'];
    $cpersontelno = $row['cpersontelno'];
    $industry = $row['industry'];
    $numemp = $row['numemp'];
    $ctype = $row['ctype'];
    $cdesc = $row['cdesc'];
    $logo = $row['logo'];
     
    $months = array('Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec');
?>

    
<div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title text-primary h4weight" id="myModalLabel">Employer</h4>
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
                                                        <h2 class="text-info jobad-title"><?=$companyname?></h2>
                                                      
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="companylogo pull-right"> 
                                                        <img src="<?=$logo?>" width="120" height="120" class="img-responsive">
                                                    </div>
                                                </div>
                                            </div>    
                                         
                                          <div class="row-fluid">
                                             
                                                  <?=$cdesc?>
                                                        
                                                    <div class="col-md-6">
                                                        <ul style="list-style: none;">
                                                              
                                                                <li>Username: <b><?=$email?></b></li>
                                                                                                                     
                                                                <li>Signup Date: <b><?=$signupdate?></b></li>
                                                           
                                                                <li>Company Name: <b><?=$companyname?></b></li>
                                                            
                                                                <li>Company Address: <b><?=$companyaddress?></b></li>
                                                           
                                                                <li>Website: <b><?=$companywebsite?></b></li>
                                                                <li>Office Num: <b><?=$telno?></b></li>
                                                                <li>TIN: <b><?=$companytin?></b></li>                                                         
                                                                <li>Industry: <b><?=$industry?></b></li>
                                                                <li>Number of Employees: <b><?=$numemp?></b></li>
                                                                <li>Company Type: <b><?=$ctype?></b></li>
                                                        </ul>                                                       
                                                  </div>
                                                        <div class="col-md-6">
                                                        <ul style="list-style: none;">
                                                                <li>Contact Person: <b><?=$cperson?></b></li>
                                                                <li>Designation: <b><?=$designation?></b></li>
                                                                <li>Contact Person Email: <b><?=$cpersonemail?></b></li>
                                                                <li>Contact Person Phone Num: <b><?=$cpersontelno?></b></li>  
                                                        </ul>                                                       
                                                  </div>   
                                               
                                            </div>
                                          
                                        </div>
                                      
                                          <div id="employerapproveddiv" class="employerapproveddiv">
                                                <div class="row-fluid">
                                                        <div class="col-md-12">
                                                            <div id="successadapproved" name="successadapproved" class="alert alert-success">
                                               
                                                                  <div class="alert-icon">
                                                                    <i class="material-icons">check</i>
                                                                  </div>
                                                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                    <span aria-hidden="true"><i class="material-icons">clear</i></span>
                                                                  </button>
                                                                  <b>Alert: </b> Employer Approved!

                                                            </div>
                                                    </div>    
                                              </div>    
                                          </div>   
                                         
                                      </div>
                                    
                                    </div>
                                  </section>          
                           
	      </div>
	      <div class="modal-footer blog-post">
                <form method="post" id="approveemployer-form" name="approveemployer-form">
                    <input type="hidden" id="employerid" name="employerid" value="<?=$employerid?>">
                    <input type="hidden" id="mode" name="mode" value="<?=$mode?>">
               </form>    
	           <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <?php
                    if($mode=='approve'){
               ?>  
               <button type="button" id="approveemployer" name="approveemployer" class="btn btn-primary">Approve</button>
              <?php
                    }
               ?>
<script>
jQuery(document).ready(function ($) {
    jQuery('#adapproveddiv').hide();
    jQuery(function() {
       $.material.init();
    });
    
    jQuery('#approveemployer').on('click',function() {  
        $('#approveemployer-form').submit();
     });
    
});       
</script>