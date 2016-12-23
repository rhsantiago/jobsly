<?php


    if (session_status() == PHP_SESSION_NONE) {
        session_start();
        include 'Database.php';
    }


$jobid = 0;
$template = '';
$templateid = '';
$mode = '';
$jobtitle='';
$specialization='';
$plevel='';
$jobtype='';
$msalary ='';
$maxsalary ='';
$startappdate='';
$endappdate='';
$nvacancies='';
$jobdesc ='';
$city ='';
$province ='';
$country='';
$yrsexp ='';
$mineduc ='';
$prefcourse ='';
$languages ='';
$licenses ='';
$wtravel ='';
$wrelocate ='';
$essay ='';
$dateadded ='';
            
if(isset($_POST['jobid'])){ $jobid = $_POST['jobid']; }
if(isset($_POST['template'])){ $template = $_POST['template']; }

if(isset($_SESSION['user'])){
   $user = $_SESSION['user'];
   $password = $_SESSION['password'];
   $userid = $_SESSION['userid'];
   
   $database = new Database();    
   if($jobid <= 0){
            $template = $_POST['template'];
            $mode = $_POST['mode'];
            if($mode==''){
                $mode = 'update';
            }
            if($template > 0){
                $database->query('SELECT * from jobtemplates where userid = :userid and id = :template');
                $database->bind(':template', $template);
                
                $templateid = $template;
                $database->bind(':userid', $userid);   
            
             $row = $database->single();

             $jobtitle = $row['jobtitle'];
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
             $wtravel = $row['wtravel'];
             if($wtravel=='on'){
                $wtravel = 'checked';
             }
             $wrelocate = $row['wrelocate'];
             if($wrelocate=='on'){
                $wrelocate = 'checked';
             }
             $essay = $row['essay'];  
             $dateadded = $row['dateadded'];
             $dadd = explode("-", $dateadded);
             $dateadded = $dadd[1] .'/'.$dadd[2].'/'.$dadd[0];
            }
   }else{      
             $database->query('SELECT * from jobads where userid = :userid and id = :jobid');
             $database->bind(':jobid', $jobid);
             $database->bind(':userid', $userid);   
            
             $row = $database->single();

             $jobtitle = $row['jobtitle'];
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
             $wtravel = $row['wtravel'];
             if($wtravel=='on'){
                $wtravel = 'checked';
             }
             $wrelocate = $row['wrelocate'];
             if($wrelocate=='on'){
                $wrelocate = 'checked';
             }
             $essay = $row['essay'];
             $dateadded = $row['dateadded'];
             $dadd = explode("-", $dateadded);
             $dateadded = $dadd[1] .'/'.$dadd[2].'/'.$dadd[0];
   }
    
             
}




if($mode==''){
    $mode = 'update';
}
?>


<form method="post" id="postajob-form" name="postajob-form" data-parsley-trigger="keyup" data-parsley-validate>                    
                    <input type="hidden" id="mode" name="mode" value="<?=$mode?>">
                    <input type="hidden" id="userid" name="userid" value="<?=$userid?>">
                    <input type="hidden" id="jobid" name="jobid" value="<?=$jobid?>">
                    <input type="hidden" id="templateid" name="templateid" value="<?=$templateid?>">
    
    
    <div class="col-md-12 center">            
            <div class="adstop">
                <img  src="https://lh5.ggpht.com/NFYFP2H9CCP50vAQNLa7AtCj_mbbYmOzY978fZqd31oL5qOdvXgxU3KW8ek2VgvIOvTqWY0=w728" 
                                 alt="user">
            </div>    
                           
     </div>
    <div class="col-md-12">
                             <h2 class="title">Post a Job Ad / Job Details</h2>
       </div>
    
    <div class="col-md-offset-1 col-md-7">
                       
                <div class="section  section-landing">
	                 

					<div class="features">
						<div class="row">
                            
                <div class="col-md-12">
                      <div class="stepwizard ">
                            <div class="stepwizard-row setup-panel">
                              <div class="stepwizard-step">
                                <a href="#step-1" type="button" class="btn btn-default btn-circle" disabled="disabled">1</a>
                               <br>Select Template
                              </div>
                              <div class="stepwizard-step">
                                <a href="#step-2" type="button" class="btn btn-primary btn-circle"
                                   <?php
                                                    if($jobid > 0){
                                                        echo " data-jobid='".$jobid."'";
                                                    }else{
                                                        echo" disabled='disabled'";
                                                    }
                                               ?>
                                   >2</a>
                                <br><b>Job Details</b>
                              </div>
                              <div class="stepwizard-step">
                                <a href="#step-3" id="step-3" type="button" class="btn btn-default btn-circle"
                                   <?php
                                                    if($jobid > 0){
                                                        echo " data-jobid='".$jobid."'";
                                                    }else{
                                                        echo" disabled='disabled'";
                                                    }
                                               ?>
                                   >3</a>
                                <br>Job Skills
                              </div>
                                <div class="stepwizard-step">
                                <a href="#step-4" type="button" id="step-4" class="btn btn-default btn-circle"  
                                   <?php
                                                    if($jobid > 0){
                                                        echo " data-jobid='".$jobid."'";
                                                    }else{
                                                        echo" disabled='disabled'";
                                                    }
                                               ?>
                                   >4</a>
                                <br>Preview
                              </div>
                            </div>
                        </div>
                </div>
                            
                            
                            
                            
		                    <div class="col-md-12">
                                    <div class="card card-nav-tabs">
                                            <div id="tabtitle" class="header  header-success">
                                                <!-- colors: "header-primary", "header-info", "header-success", "header-warning", "header-danger" -->
                                                <div class="nav-tabs-navigation">
                                                    <div class="nav-tabs-wrapper">
                                                        <ul class="nav nav-tabs" data-tabs="tabs">
                                                            <li class="active">
                                                                <a href="#profile" data-toggle="tab">
                                                                    <i class="material-icons">assignment_turned_in</i>
                                                                   Job Details
                                                                </a>
                                                            </li>										
                                                        </ul>
                                                    </div>
                                                </div>
                                          </div>
                                             <div class="content">
                                                    <div class="tab-content">
                                                        <div class="tab-pane active" id="profile">
                                                          <div class="row">
                                                                <div class="col-md-6">
                                                            <div id="jobtitlediv" class="form-group label-floating">
                                                                <label class="control-label">Job Title</label>
                                                                <input type="text" id="jobtitle" class="form-control" value="<?=$jobtitle?>" data-parsley-required>  
                                                            </div>
                                                     
                                                            <div id="specializationdiv" class="form-group label-floating">
                                                                <label class="control-label">Specialization</label>
                                                                <input type="text" id="specialization" class="form-control" value="<?=$specialization?>" data-parsley-required>
                                                            </div>
                                                            <div id="msalarydiv" class="form-group label-floating">
                                                                <label class="control-label">Min Salary</label>
                                                                <input type="text" id="msalary" class="form-control" value="<?=$msalary?>" data-parsley-required data-parsley-type="number">
                                                            </div>        
                                                            
                                                           <div id="startappdatediv" class="form-group label-static">
                                                                <label class="control-label">Position Start Date (MM/DD/YYYY)</label>
                                                                <input type='text' id='startappdate' class='datepicker form-control'  value="<?=$startappdate?>" data-parsley-required data-trigger="blur" data-parsley-pattern="^((((0[13578])|(1[02]))[\/]?(([0-2][0-9])|(3[01])))|(((0[469])|(11))[\/]?(([0-2][0-9])|(30)))|(02[\/]?[0-2][0-9]))[\/]?\d{4}$">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6"> 
                                                            <div id="pleveldiv" class="form-group label-floating">
                                                                <label class="control-label">Position Level</label>
                                                                <select class="form-control" id="plevel" name="plevel"  placeholder="Position Level" data-parsley-required>       
                                                                           <option value='1' <?php if($plevel==1){echo' selected';}?>>Executive</option>
                                                                           <option value='2' <?php if($plevel==2){echo' selected';}?>>Manager</option>
                                                                           <option value='3' <?php if($plevel==3){echo' selected';}?>>Assistant Manager</option>
                                                                           <option value='4' <?php if($plevel==4){echo' selected';}?>>Supervisor</option>
                                                                           <option value='5' <?php if($plevel==5){echo' selected';}?>>5 Years+ Experienced Employee</option>
                                                                           <option value='6' <?php if($plevel==6){echo' selected';}?>>1-4 Years Experienced Employee</option>
                                                                           <option value='7' <?php if($plevel==7){echo' selected';}?>>1 Year Experienced Employee/Fresh Grad</option>
                                                                </select>
                                                            </div>
                                                            <div id="jobtypediv" class="form-group label-floating">
                                                                <label class="control-label">Employment Type</label>
                                                                <select class="form-control" id="jobtype" name="jobtype"  placeholder="Employment Type" data-parsley-required>     
                                                                           <option value='full' <?php if($jobtype=='full'){echo' selected';}?>>Full-time</option>
                                                                           <option value='part' <?php if($jobtype=='part'){echo' selected';}?>>Part-time</option>
                                                                           <option value=project <?php if($jobtype=='project'){echo' selected';}?>>Project</option>  
                                                                </select>
                                                            </div>
                                                            <div id="maxsalarydiv" class="form-group label-floating">
                                                                <label class="control-label">Max Salary</label>
                                                                <input type="text" id="maxsalary" class="form-control" value="<?=$maxsalary?>" data-parsley-required data-parsley-type="number">
                                                            </div>
                                                            <div id="endappdatediv" class="form-group label-static">
                                                                <label class="control-label">Application Deadline (MM/DD/YYYY)</label>
                                                                <input type='text' id='endappdate' class='datepicker form-control'  value="<?=$endappdate?>" data-parsley-required data-trigger="blur" data-parsley-pattern="^((((0[13578])|(1[02]))[\/]?(([0-2][0-9])|(3[01])))|(((0[469])|(11))[\/]?(([0-2][0-9])|(30)))|(02[\/]?[0-2][0-9]))[\/]?\d{4}$">
                                                            </div>
                                                          </div>
                                                    </div>
                                                        </div>

                                                    </div>
                                             </div>
                                    </div>
                                
                                    <div class="card card-nav-tabs">
                                            <div id="tabtitle" class="header  header-info">
                                                <!-- colors: "header-primary", "header-info", "header-success", "header-warning", "header-danger" -->
                                                <div class="nav-tabs-navigation">
                                                    <div class="nav-tabs-wrapper">
                                                        <ul class="nav nav-tabs" data-tabs="tabs">
                                                            <li class="active">
                                                                <a href="#profile" data-toggle="tab">
                                                                    <i class="material-icons">description</i>
                                                                    Job Description
                                                                </a>
                                                            </li>										
                                                        </ul>
                                                    </div>
                                                </div>
                                          </div>
                                             <div class="content">
                                                    <div class="tab-content">
                                                        <div class="tab-pane active" id="profile">
                                                            Describe applicant requirements, responsibilities and relevant information
                                                                    <div id="jobdesc"><?=$jobdesc?></div>
                                                                    
                                                                          <script>
                                                                            $(document).ready(function() {
                                                                               $('#jobdesc').summernote({
                                                                                      toolbar: [
                                                                                        // [groupName, [list of button]]
                                                                                        ['style', ['bold', 'italic', 'underline', 'clear']], 
                                                                                        ['fontsize', ['fontsize']],
                                                                                        ['color', ['color']],
                                                                                        ['para', ['ul', 'ol', 'paragraph']]
                                                                                      ],
                                                                                      callbacks: {
                                                                                        onPaste: function (e) {
                                                                                            var bufferText = ((e.originalEvent || e).clipboardData || window.clipboardData).getData('Text');

                                                                                            e.preventDefault();

                                                                                            // Firefox fix
                                                                                            setTimeout(function () {
                                                                                                document.execCommand('insertText', false, bufferText);
                                                                                            }, 10);
                                                                                        }
                                                                                    }  
                                                                                    });
                                                                            });
                                                                            </script>
                                                        </div>

                                                    </div>
                                             </div>
                                    </div>
                                
                                    <div class="card card-nav-tabs">
                                            <div id="tabtitle" class="header  header-warning">
                                                <!-- colors: "header-primary", "header-info", "header-success", "header-warning", "header-danger" -->
                                                <div class="nav-tabs-navigation">
                                                    <div class="nav-tabs-wrapper">
                                                        <ul class="nav nav-tabs" data-tabs="tabs">
                                                            <li class="active">
                                                                <a href="#profile" data-toggle="tab">
                                                                    <i class="material-icons">note_add</i>
                                                                    Optional Details
                                                                </a>
                                                            </li>										
                                                        </ul>
                                                    </div>
                                                </div>
                                          </div>
                                             <div class="content">
                                                    <div class="tab-content">
                                                        <div class="tab-pane active" id="profile">
                                                            <div class="col-md-6">
                                                                <div id="nvacanciesdiv" class="form-group label-floating">
                                                                    <label class="control-label">Number of Vancancies</label>
                                                                    <input type="text" id="nvacancies" class="form-control" value="<?=$nvacancies?>" data-parsley-type="number">
                                                                </div>
                                                                <div id="citydiv" class="form-group label-floating">
                                                                    <label class="control-label">City</label>
                                                                    <input type="text" id="city" value="<?=$city?>" class="form-control">
                                                                </div>
                                                                <div id="provincediv" class="form-group label-floating">
                                                                    <label class="control-label">Province</label>
                                                                    <input type="text" id="province" value="<?=$province?>" class="form-control">
                                                                </div>
                                                                <div id="countrydiv" class="form-group label-floating">
                                                                    <label class="control-label">Country</label>
                                                                    <input type="text" id="country" value="<?=$country?>" class="form-control">
                                                                </div>
                                                                <div id="yrsexpdiv" class="form-group label-floating">
                                                                    <label class="control-label">Years of Experience</label>
                                                                    <input type="text" id="yrsexp" class="form-control" value="<?=$yrsexp?>"  data-parsley-type="number">
                                                                </div>
                                                                <div id="mineducdiv" class="form-group label-floating">
                                                                    <label class="control-label">Educational Attainment</label>
                                                                    <input type="text" id="mineduc" value="<?=$mineduc?>" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                            <div id="prefcoursediv" class="form-group label-floating">
                                                                <label class="control-label">Preferred Course</label>
                                                                <input type="text" id="prefcourse" value="<?=$prefcourse?>" class="form-control">
                                                            </div>
                                                            <div id="languagesdiv" class="form-group label-floating">
                                                                <label class="control-label">Languages</label>
                                                                <input type="text" id="languages" value="<?=$languages?>" class="form-control">
                                                            </div>
                                                            <div id="licensesdiv" class="form-group label-floating">
                                                                <label class="control-label">Licenses</label>
                                                                <input type="text" id="licenses" value="<?=$licenses?>" class="form-control">
                                                            </div>
                                                            <div id="wtraveldiv" class="form-group">
                                                                         <div class="checkbox">
                                                                            <label>
                                                                                    <input type="checkbox" id="wtravel" name="optionsCheckboxes" <?=$wtravel?>>
                                                                                Show Willing to Travel?
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                            <div id="wrelocatediv" class="form-group">
                                                                         <div class="checkbox">
                                                                            <label>
                                                                                    <input type="checkbox" id="wrelocate" name="optionsCheckboxes" <?=$wrelocate?>>
                                                                                Show Willing to Relocate?
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                            </div> 
                                                            <div class="col-md-12">
                                                                 
                                                                <div id="essaydiv" class="form-group label-floating">
                                                                   
                                                                <label class="control-label">Select a pre-made essay question or create a new one below</label>
                                                                    <select class="form-control" id="essayselect" name="essayselect"  placeholder="Essay" data-parsley-required>
                                                                            <?php                     
                                                                                  $database->query('SELECT id,question FROM jobessays where userid = :userid');
                                                                                  $database->bind(':userid', $userid);  
                                                                                  $rows = $database->resultset();

                                                                                  foreach($rows as $row){
                                                                                       $id=$row['id'];
                                                                                       $question=$row['question'];
                                                                            ?>
                                                                               <option value='<?=$question?>'><?=$question?></option>
                                                                            <?php
                                                                                  }
                                                                            ?>
                                                                    </select>
                                                                </div>
                                                                    <div id="essaydiv" class="form-group label-floating">                                                                   
                                                                        <input type="text" id="essay" value="<?=$essay?>" class="form-control">
                                                                    </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                             </div>
                                    </div>
                                
		                    </div>
                         
                                    
                                
                                
		               
		                     <div class="col-md-12">
                                
                                            <div class="savebutton">
                                                <button class="btn btn-primary " name="savepinfo" id="savepinfo" type="submit">Save and Go to Next Step</button>
                                            </div>       
                                             <div id="successdivpinfo" class="alert alert-success">
                                               
                                                  <div class="alert-icon">
                                                    <i class="material-icons">check</i>
                                                  </div>
                                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true"><i class="material-icons">clear</i></span>
                                                  </button>
                                                  <b>Alert: </b> Your Job Details has been saved.
                                               
                                            </div>
                                   
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
            </form>

<script>
jQuery(document).ready(function ($) {
    
    $('#postajob-form #essayselect').on('change', function() {
       $("#postajob-form #essay").val($('#postajob-form #essayselect').val());
    });
   
    $('#postajob-form #jobtitle').parsley().on('field:error', function() {
           $('#postajob-form #jobtitlediv').addClass('has-error');
           $('#postajob-form #jobtitlediv').append("<span class='material-icons form-control-feedback'>clear</span>");   
    });    
    $('#postajob-form #jobtitle').parsley().on('field:success', function() {
            $('#postajob-form #jobtitlediv').addClass('has-success');
            $('#postajob-form #jobtitlediv').find('span').remove()
            $('#postajob-form #jobtitlediv').append("<span class='material-icons form-control-feedback'>done</span>");   
    });
   
    $('#postajob-form #specialization').parsley().on('field:error', function() {
           $('#postajob-form #specializationdiv').addClass('has-error');
           $('#postajob-form #specializationdiv').append("<span class='material-icons form-control-feedback'>clear</span>");   
    });    
    $('#postajob-form #specialization').parsley().on('field:success', function() {
            $('#postajob-form #specializationdiv').addClass('has-success');
            $('#postajob-form #specializationdiv').find('span').remove()
            $('#postajob-form #specializationdiv').append("<span class='material-icons form-control-feedback'>done</span>");   
    });
    
    $('#postajob-form #plevel').parsley().on('field:error', function() {
           $('#postajob-form #pleveldiv').addClass('has-error');
           $('#postajob-form #pleveldiv').append("<span class='material-icons form-control-feedback'>clear</span>");   
    });    
    $('#postajob-form #plevel').parsley().on('field:success', function() {
            $('#postajob-form #pleveldiv').addClass('has-success');
            $('#postajob-form #pleveldiv').find('span').remove()
            $('#postajob-form #pleveldiv').append("<span class='material-icons form-control-feedback'>done</span>");   
    });
    
    $('#postajob-form #jobtype').parsley().on('field:error', function() {
           $('#postajob-form #jobtypediv').addClass('has-error');
           $('#postajob-form #jobtypediv').append("<span class='material-icons form-control-feedback'>clear</span>");   
    });    
    $('#postajob-form #jobtype').parsley().on('field:success', function() {
            $('#postajob-form #jobtypediv').addClass('has-success');
            $('#postajob-form #jobtypediv').find('span').remove()
            $('#postajob-form #jobtypediv').append("<span class='material-icons form-control-feedback'>done</span>");   
    });
    
    $('#postajob-form #msalary').parsley().on('field:error', function() {
           $('#postajob-form #msalarydiv').addClass('has-error');
           $('#postajob-form #msalarydiv').append("<span class='material-icons form-control-feedback'>clear</span>");   
    });    
    $('#postajob-form #msalary').parsley().on('field:success', function() {
            $('#postajob-form #msalarydiv').addClass('has-success');
            $('#postajob-form #msalarydiv').find('span').remove()
            $('#postajob-form #msalarydiv').append("<span class='material-icons form-control-feedback'>done</span>");   
    });
    
    $('#postajob-form #maxsalary').parsley().on('field:error', function() {
           $('#postajob-form #maxsalarydiv').addClass('has-error');
           $('#postajob-form #maxsalarydiv').append("<span class='material-icons form-control-feedback'>clear</span>");   
    });    
    $('#postajob-form #maxsalary').parsley().on('field:success', function() {
            $('#postajob-form #maxsalarydiv').addClass('has-success');
            $('#postajob-form #maxsalarydiv').find('span').remove()
            $('#postajob-form #maxsalarydiv').append("<span class='material-icons form-control-feedback'>done</span>");   
    });
    
    $('#postajob-form #startappdate').parsley().on('field:error', function() {
           $('#postajob-form #startappdatediv').addClass('has-error');
           $('#postajob-form #startappdatediv').append("<span class='material-icons form-control-feedback'>clear</span>");   
    });    
    $('#postajob-form #startappdate').parsley().on('field:success', function() {
            $('#postajob-form #startappdatediv').addClass('has-success');
            $('#postajob-form #startappdatediv').find('span').remove()
            $('#postajob-form #startappdatediv').append("<span class='material-icons form-control-feedback'>done</span>");   
    });
    
    $('#postajob-form #endappdate').parsley().on('field:error', function() {
           $('#postajob-form #endappdatediv').addClass('has-error');
           $('#postajob-form #endappdatediv').append("<span class='material-icons form-control-feedback'>clear</span>");   
    });    
    $('#postajob-form #endappdate').parsley().on('field:success', function() {
            $('#postajob-form #endappdatediv').addClass('has-success');
            $('#postajob-form #endappdatediv').find('span').remove()
            $('#postajob-form #endappdatediv').append("<span class='material-icons form-control-feedback'>done</span>");   
    });
    
     $('#postajob-form #nvacancies').parsley().on('field:error', function() {
           $('#postajob-form #nvacanciesdiv').addClass('has-error');
           $('#postajob-form #nvacanciesdiv').append("<span class='material-icons form-control-feedback'>clear</span>");   
    });    
    $('#postajob-form #nvacancies').parsley().on('field:success', function() {
            $('#postajob-form #nvacanciesdiv').addClass('has-success');
            $('#postajob-form #nvacanciesdiv').find('span').remove()
            $('#postajob-form #nvacanciesdiv').append("<span class='material-icons form-control-feedback'>done</span>");   
    });
    
         
    
});       
</script>