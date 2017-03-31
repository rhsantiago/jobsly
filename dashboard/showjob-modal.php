<?php
if (session_status() == PHP_SESSION_NONE) {
        session_start();
        include 'Database.php';
    }
if(isset($_SESSION['user'])){
   $user = $_SESSION['user'];
   $password = $_SESSION['password'];
   $userid = $_SESSION['userid'];
   $usertype = $_SESSION['usertype'];
}else{
    header("Location: logout.php");
}
include 'specialization.php';
$isjobseeker = '';
if(isset($_POST['jobid'])){ $jobid = $_POST['jobid']; }
if(isset($_POST['mode'])){ $mode = $_POST['mode']; }
if(isset($_POST['isjobseeker'])){ $isjobseeker = $_POST['isjobseeker']; }
 date_default_timezone_set('Asia/Manila');
 $logtimestamp = date("Y-m-d H:i:s"); 
 include "serverlogconfig.php";
 $database = new Database();
 
    $database->query('SELECT * from jobads,companyinfo where jobads.id = :jobid and jobads.userid=companyinfo.userid');
   
    $database->bind(':jobid', $jobid);
    try{
        $row = $database->single();
     }catch (PDOException $e) {
        $msg = $e->getTraceAsString()." ".$e->getMessage();
        $log->error($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
        die("");
    }    
    $id = $row['id'];
    $logo = $row['logo'];
    $header = $row['header'];
    $companyid = $row['userid'];
    $jobtitle = $row['jobtitle'];
    $company = $row['company'];
    $specialization = $row['specialization'];
    $plevel = $row['plevel'];
    $jobtype = $row['jobtype'];
    $msalary = $row['msalary'];
    $maxsalary = $row['maxsalary'];
    $startappdate = $row['startappdate'];
    $sdate = explode("-", $startappdate);
    $startappdate = $sdate[1] .'/'.$sdate[2].'/'.$sdate[0];
    $endappdate = $row['endappdate'];
    $edate = explode("-", $endappdate);
    $endappdate = $edate[1] .'/'.$edate[2].'/'.$edate[0];
    $nvacancies = $row['nvacancies'];
    $teaser = $row['teaser'];
    $jobdesc = $row['jobdesc'];
    $city = $row['city'];
    $province = $row['province'];
    $country = $row['country'];
    $yrsexp = $row['yrsexp'];
    $mineduc = $row['mineduc'];
    $prefcourse = $row['prefcourse'];
    $languages = $row['languages'];
    $licenses = $row['licenses'];
    $essay = $row['essay'];
    $wtravel = $row['wtravel'];
    if($wtravel=='on'){
       $wtravel = 'checked';
    }
    $wrelocate = $row['wrelocate'];
    if($wrelocate=='on'){
       $wrelocate = 'checked';
    }
    $dateadded = $row['dateadded'];
    $dadd = explode("-", $dateadded);
    $dateadded = $dadd[1] .'/'.$dadd[2].'/'.$dadd[0];   
    
    $esalary=0;
    if($usertype==2){
        $database->query('SELECT esalary from additionalinformation where userid = :userid');   
        $database->bind(':userid', $userid);
        $ainforow = $database->single();
        $esalary = $ainforow['esalary'];
    }
    $months = array('Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec');
    $positionlevels = array('Executive','Manager','Assistant Manager','Supervisor','5 Years+ Experienced Employee','1-4 Years Experienced Employee','1 Year Experienced Employee/Fresh Grad');

    if(strcmp($isjobseeker,'jobseeker')==0){
        $database->query('update jobads set views=views + 1 where id=:jobid');   
        $database->bind(':jobid', $jobid);    
        try{
            $database->execute();
        }catch (PDOException $e) {
            $msg = $e->getTraceAsString()." ".$e->getMessage();
            $log->error($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
            die("");
        } 
        
    }

?>

    
<div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title text-primary h4weight" id="myModalLabel">Job Ad</h4>
	      </div>
              
	      <div id="modaldeljobad" class="modal-body modal-gray">
	                           
                 <section class="blog-post">
                                    <div class="panel panel-default">
                                      <?php
                                        if(!empty($header)){
                                     ?>    
                                     <div class="row">
                                                <div class="col-md-12">                                                  
                                                  <img id="jobadheader" src="<?=$header?>"  class="img-responsive fullwidth">                                         
                                                </div>
                                              </div>
                                     <?php
                                        }
                                     ?>                                         
                                      <div class="panel-body jobad-bottomborder">
                                          <div class="jobad-meta jobad-bottomborder">
                                      <p class="blog-post-date pull-right text-muted"><?=$months[$dadd[1]-1]?>&nbsp;<?=$dadd[2]?>,&nbsp;<?=$dadd[0]?></p>
                                          <ul  class="list-inline ">
                                                                                           
                                                                                            <li>
                                                                                                <h6 id="vertical-align" class="text-muted jobadheader">
                                                                                                   <i class="material-icons text-info jobadheadericon">domain</i> &nbsp;<?=$specarray[$specialization]?>
                                                                                                </h6>
                                                                                            </li>
                                                                                            <li>
                                                                                                <h6 id="vertical-align" class="text-muted jobadheader">
                                                                                                <i class="material-icons text-info jobadheadericon">date_range</i>&nbsp;<?=$positionlevels[$plevel-1]?>
                                                                                                </h6>
                                                                                            </li>
                                                                                            <li>
                                                                                                <h6 id="vertical-align" class="text-muted jobadheader">
                                                                                                   <i class="material-icons text-info jobadheadericon">local_atm</i> &nbsp;Php <?=$msalary?> - <?=$maxsalary?>
                                                                                                </h6>
                                                                                            </li>
                                                                                        </ul>
                                          
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
                                             
                                                <div class="col-md-6 actionicon ">
                                                    <?php
                                                        if(strcmp($isjobseeker,'jobseeker')==0){
                                                     ?>     
                                                        <a class="blog-post-share " href="#" data-toggle="tooltip" data-placement="top" title="Save and Apply later"><i class="material-icons">favorite</i></a>
                                                        <a class="blog-post-share " href="#" datah4-toggle="tooltip" data-placement="top" title="Share"><i class="material-icons">share</i></a>
                                                    <?php
                                                        }
                                                    ?> 
                                                </div>
                                                       
                                                <div class="col-md-12 jobad-bottomborder">
                                                   
                                                </div>
                                          </div>
                                          <?php
                                            $database->query('SELECT * from jobapplications where jobid= :jobid and userid = :userid');
                                            $database->bind(':userid', $userid);
                                            $database->bind(':jobid', $jobid);
                                            try{
                                                $checkrow = $database->single();
                                            }catch (PDOException $e) {
                                                $msg = $e->getTraceAsString()." ".$e->getMessage();
                                                $log->error($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
                                                die("");
                                            }
                                          
                                            $database->query('SELECT count(personalinformation.id) as pinfo, count(additionalinformation.id) as ainfo from personalinformation,additionalinformation where personalinformation.userid=:userid and additionalinformation.userid=:userid');
                                            $database->bind(':userid', $userid);
                                            try{    
                                                $row = $database->single();
                                            }catch (PDOException $e) {
                                                $msg = $e->getTraceAsString()." ".$e->getMessage();
                                                $log->error($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
                                                die("");
                                            }     
                                            $pinfo = $row['pinfo']; 
                                            $ainfo = $row['ainfo']; 
                                         
                                            
                                          
                                           if(strcmp($isjobseeker,'jobseeker')==0){
                                                 
                                          if(empty($checkrow) && $pinfo>0 && $ainfo>0){
                                          ?>   
                                        
                                          <div class="quickapplydiv">
                                              <form method="post" id="quickapply-form-modal" name="quickapply-form-modal" data-parsley-validate> 
                                                  <input type="hidden" id="userid" name="userid" value="<?=$userid?>">
                                                  <input type="hidden" id="jobid" name="jobid" value="<?=$jobid?>">
                                                  <div class="row-fluid">
                                                        <div class="col-md-12">
                                                            <div class="center modal-gray">
                                                                <h6 class="text-primary quickapplytitle h4weight"> Quick Apply</h6>
                                                            </div>    
                                                        </div>
                                                        <div class="col-md-6">
                                                             <div id="esalarydiv" class="form-group label-floating">
                                                                        <label class="control-label">Expected Salary</label>
                                                                        <input type="text" id="esalary" class="form-control" value="<?=$esalary?>" data-parsley-required data-parsley-type="number">
                                                             </div>
                                                        </div>
                                                        <div class="col-md-6 ">
                                                            
                                                        </div>
                                                       
                                                        <div class="col-md-12">
                                                            <?php
                                                                if(!empty($essay)){ 
                                                            ?>
                                                                <p>The employer requires you to answer the following question: <b><?=$essay?></b></p>
                                                                <div id="essaydiv" class="form-group label-floating">   
                                                                    <label class="control-label">Essay Answer</label>
                                                                    <input class="form-control" id="essay" name="essay"  data-parsley-required>  
                                                                </div>
                                                             <?php
                                                             }
                                                             ?> 
                                                            <button type="submit" class="btn btn-primary" >Apply Now</button>
                                                            <div id="successdivquickapply" name="successdivquickapply" class="alert alert-success">
                                               
                                                                  <div class="alert-icon">
                                                                    <i class="material-icons">check</i>
                                                                  </div>
                                                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                    <span aria-hidden="true"><i class="material-icons">clear</i></span>
                                                                  </button>
                                                                  <b>Alert: </b> Congratulations! Your application was submitted.

                                                            </div>
                                                            <div id="warningdivquickapply" name="warningdivquickapply" class="alert alert-warning">
                                               
                                                                  <div class="alert-icon">
                                                                    <i class="material-icons">check</i>
                                                                  </div>
                                                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                    <span aria-hidden="true"><i class="material-icons">clear</i></span>
                                                                  </button>
                                                                  <b>Alert: </b> You already applied for this job.

                                                            </div>
                                                            
                                                            
                                                            
                                                        </div>
                                                          
                                                  </div>
                                              </form>  
                                          </div>  
                                         
                                          <?php                                          
                                           }                                        
                                        
                                           }
                                                                          
                                          if(!empty($checkrow)){
                                          ?>
                                          <div class="quickapplydiv2">
                                                <div class="row-fluid">
                                                        <div class="col-md-12">
                                                            <div id="warningdivquickapply2" name="warningdivquickapply" class="alert alert-warning">
                                               
                                                                  <div class="alert-icon">
                                                                    <i class="material-icons">check</i>
                                                                  </div>
                                                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                    <span aria-hidden="true"><i class="material-icons">clear</i></span>
                                                                  </button>
                                                                  <b>Alert: </b> You already applied for this job.

                                                            </div>
                                                    </div>    
                                              </div>    
                                          </div>   
                                         <?php
                                          }
                                         
                                          if(strcmp($isjobseeker,'jobseeker')==0){
                                                if($pinfo<=0 && $ainfo<=0){
                                          ?>
                                  
                                                        <div class="col-lg-12 col-md-12">   
                                    
                                                            <div id="successadapproved" name="successadapproved" class="alert alert-warning">
                                               
                                                                  <div class="alert-icon">
                                                                    <i class="material-icons">check</i>
                                                                  </div>
                                                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                    <span aria-hidden="true"><i class="material-icons">clear</i></span>
                                                                  </button>
                                                                  <b>Alert: </b> Please complete your Personal Information and Additional Information to start applying for jobs.

                                                            </div>
                                                </div>
                                        
                                           <?php            
                                                 }
                                          }
                                           ?>          
                                      </div>
                                        
                                        <div class="skilltags">
                                            Skilltags: <span class="text-info">
                                            <?php
                                                      
                                                    $database->query('SELECT * FROM jobskills where jobid = :jobid');                                                   
                                                    $database->bind(':jobid', $jobid);
                                                    try{
                                                        $rows = $database->resultset();
                                                    }catch (PDOException $e) {
                                                        $msg = $e->getTraceAsString()." ".$e->getMessage();
                                                        $log->error($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
                                                        die("");
                                                    } 
                                                    foreach($rows as $row){
                                                        echo $row['jobskilltag'];
                                                        echo ' ';
                                                    }
                                                       
                                             ?>   
                                            
                                            </span>
                                        </div>    
                                    </div>
                                  </section>          
                           
	      </div>
	      <div class="modal-footer blog-post">
              
	           <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	      </div>
<script>
jQuery(document).ready(function ($) {
    $(function() {
       $.material.init();
    });
<?php
if(strcmp($isjobseeker,'jobseeker')==0){
 ?>  
   
    $('#quickapply-form-modal #esalary').parsley().on('field:error', function() {
           $('#quickapply-form-modal #esalarydiv').addClass('has-error');
           $('#quickapply-form-modal #esalarydiv').append("<span class='material-icons form-control-feedback'>clear</span>");   
    });    
    $('#quickapply-form-modal #esalary').parsley().on('field:success', function() {
            $('#quickapply-form-modal #esalarydiv').addClass('has-success');
            $('#quickapply-form-modal #esalarydiv').find('span').remove()
            $('#quickapply-form-modal #esalarydiv').append("<span class='material-icons form-control-feedback'>done</span>");   
    });
    <?php
      if(!empty($essay)){ 
    ?>
         $('#quickapply-form-modal #essay').parsley().on('field:error', function() {
               $('#quickapply-form-modal #essaydiv').addClass('has-error');
               $('#quickapply-form-modal #essaydiv').append("<span class='material-icons form-control-feedback'>clear</span>");   
        });    
        $('#quickapply-form-modal #essay').parsley().on('field:success', function() {
                $('#quickapply-form-modal #essaydiv').addClass('has-success');
                $('#quickapply-form-modal #essaydiv').find('span').remove()
                $('#quickapply-form-modal #essaydiv').append("<span class='material-icons form-control-feedback'>done</span>");   
        });
   
    <?php
      }
    ?> 
<?php
}
?>    
    
});       
</script>