<?php
if (session_status() == PHP_SESSION_NONE) {
        session_start();
        include 'Database.php';
    }
if(isset($_SESSION['user'])){
   $user = $_SESSION['user'];
   $password = $_SESSION['password'];
   $userid = $_SESSION['userid'];
}

if(isset($_POST['jobid'])){ $jobid = $_POST['jobid']; }
if(isset($_POST['mode'])){ $mode = $_POST['mode']; }


 $database = new Database();
 
    $database->query('SELECT * from jobads where id = :jobid');
   
    $database->bind(':jobid', $jobid);
    
    $row = $database->single();
    $id = $row['id'];
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
    
    $teaser = strip_tags($jobdesc, '<p>');
    $teaser = substr($teaser, 0, 200);
    $teaser = strip_tags($teaser, '<p>');
        
    $mode = 'insert';
    $months = array('January','February','March','April','May','June','July','August','September','October','November','December');
    $positionlevels = array('Executive','Manager','Assistant Manager','Supervisor','5 Years+ Experienced Employee','1-4 Years Experienced Employee','1 Year Experienced Employee/Fresh Grad');





?>

    
<div class="modal-header infocolor">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="myModalLabel">Job Ad</h4>
	      </div>
              
	      <div id="modaldeljobad" class="modal-body modal-gray">
	                           
                 <section class="blog-post">
                                    <div class="panel panel-default">
                                      <img src="img/fjord.jpg" class="img-responsive">
                                       
                                      <div class="panel-body jobad-bottomborder">
                                          <div class="jobad-meta jobad-bottomborder">
                                      <p class="blog-post-date pull-right text-muted"><?=$months[$dadd[1]-1]?>&nbsp;<?=$dadd[2]?>,&nbsp;<?=$dadd[0]?></p>
                                          <ul  class="list-inline ">
                                                                                           
                                                                                            <li>
                                                                                                <h6 id="vertical-align" class="text-muted jobadheader">
                                                                                                   <i class="material-icons text-info jobadheadericon">domain</i> &nbsp;<?=$specialization?>
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
                                                        <img src="img/champ.png" width="70" height="70" class="img-responsive">
                                                    </div>
                                                </div>
                                            </div>    
                                         
                                          <div class="row-fluid">
                                                 <div class="col-md-12">  
                                                      <?=$teaser?>...<br>
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
                                                                    $rows = $database->resultset();
                                                                           // echo $row['name'];
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
                                                        
                                                        <a class="blog-post-share " href="#" data-toggle="tooltip" data-placement="top" title="Save and Apply later"><i class="material-icons">favorite</i></a>
                                                        <a class="blog-post-share " href="#" datah4-toggle="tooltip" data-placement="top" title="Share"><i class="material-icons">share</i></a>
                                                </div>
                                                <div class="col-md-12 jobad-bottomborder">
                                                   
                                                </div>
                                          </div>
                                          
                                          <div class="quickapplydiv">
                                              <form method="post" id="quickapply-form-modal" name="quickapply-form-modal" data-parsley-validate> 
                                                  <input type="hidden" id="userid" name="userid" value="<?=$userid?>">
                                                  <input type="hidden" id="jobid" name="jobid" value="<?=$jobid?>">
                                                  <div class="row-fluid">
                                                        <div class="col-md-12">
                                                            <div class="center">
                                                                <h6 class="text-primary quickapplytitle"> Quick Apply</h6>
                                                            </div>    
                                                        </div>
                                                        <div class="col-md-6">
                                                             <div id="esalarydiv" class="form-group label-floating">
                                                                        <label class="control-label">Expected Salary</label>
                                                                        <input type="text" id="esalary" class="form-control" value="" data-parsley-required data-parsley-type="number">
                                                             </div>
                                                        </div>
                                                        <div class="col-md-6 ">
                                                            
                                                        </div>
                                                       
                                                        <div class="col-md-12">
                                                            <?php
                                                                if(!empty($essay)){ 
                                                            ?>
                                                                <div id="essaydiv" class="form-group label-floating">
                                                                    <label class="control-label"><?=$essay?></label>
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
                                                        </div>
                                                          
                                                  </div>
                                              </form>  
                                          </div>      
                                          
                                              
                                         
                                      </div>
                                        
                                        <div class="skilltags">
                                            Skilltags: <span class="text-info">
                                            <?php
                                                      
                                                    $database->query('SELECT * FROM jobskills where jobid = :jobid');                                                   
                                                    $database->bind(':jobid', $jobid);
                                                    $rows = $database->resultset();
                                                           // echo $row['name'];
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
	      <div class="modal-footer blog-post modal-gray">
              
	           <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	      </div>
<script>
jQuery(document).ready(function ($) {

   
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
   
    
});       
</script>