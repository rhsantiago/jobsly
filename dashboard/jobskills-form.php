<?php
if (session_status() == PHP_SESSION_NONE) {
        session_start();
        if (!isset($database)){
            include 'Database.php';
            $database = new Database();
        }
}


if(isset($_SESSION['user'])){
   $user = $_SESSION['user'];
   $password = $_SESSION['password'];
   $userid = $_SESSION['userid'];
    if (isset($jobid)){
   /*
    $database = new Database();
 
    $database->query('SELECT * from skilltags where userid = :userid');
    $database->bind(':userid', $userid);   

    $row = $database->single();
    $id = $row['id'];
  */
    
        
    }else{
        if(isset($_POST['jobid'])){ $jobid = $_POST['jobid']; }
    }
    $mode = 'insert';
}
?>
    <div class="row">
        
         <div class="col-md-12 center">            
                                <div class="adstop">
                                        <img  src="https://lh5.ggpht.com/NFYFP2H9CCP50vAQNLa7AtCj_mbbYmOzY978fZqd31oL5qOdvXgxU3KW8ek2VgvIOvTqWY0=w728" 
                                             alt="user">         
                                </div>
          </div>
       
               <div class="col-md-12">
                             <h2 class="title">Post a Job Ad / Required Skills</h2>
               </div>
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
                                            <a href="#step-2" id="step-2" type="button" class="btn btn-default btn-circle" 
                                               <?php
                                                    if($jobid > 0){
                                                        echo " data-jobid='".$jobid."'";
                                                    }else{
                                                        echo" disabled='disabled'";
                                                    }
                                               ?>
                                                >2</a>
                                              
                                            <br>Job Details
                                          </div>
                                          <div class="stepwizard-step">
                                            <a href="#step-3" id="step-3" type="button" class="btn btn-primary btn-circle" 
                                               <?php
                                                    if($jobid > 0){
                                                        echo " data-jobid='".$jobid."'";
                                                    }else{
                                                        echo" disabled='disabled'";
                                                    }
                                               ?>
                                               >3</a>
                                            <br><b>Job Skills</b>
                                          </div>
                                            <div class="stepwizard-step">
                                            <a href="#step-4" type="button" id="step-4" class="btn btn-default btn-circle" 
                                               <?php
                                                    if($jobid > 0){
                                                        echo " data-jobid='".$jobid."'";
                                                    }else{
                                                        echo" disabled='disabled'";
                                                    }
                                               ?>>4</a>
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
                                                                <a href="#hs" data-toggle="tab">
                                                                    <i class="material-icons">people</i>Required Job Skills
                                                                </a>
                                                            </li>                                                           
                                                            
                                                        </ul>
                                                    </div>
                                                </div>
                                          </div>
                                             <div class="content">
                                                    <div class="tab-content">
                                                        
                                                        <div class="tab-pane active" id="jobskills">
                                                            <form method="post" id="jobskills-form" name="jobskills-form" data-parsley-validate> 
                                                             <input type="hidden" id="userid" name="userid" value="<?=$userid?>">   
                                                             <input type="hidden" id="mode" name="mode" value="<?=$mode?>">
                                                                <input type="hidden" id="jobid" name="jobid" value="<?=$jobid?>">
                                                            <div class="row">
                                                                <div class="col-md-12 col-xs-12">
                                                                 The skill tags are used by jobseekers to narrow down their job search by skills. Make sure to enter all required technical/job-specific skills for this job. This section is not for minimum qualifications. The system auto creates the tag for you so type with spaces. (ex. Java, Web Development, Microsoft Excel)
                                                                </div>
                                                                  <div class="col-md-6 col-xs-6">
                                                                    <div id="jobskilldiv" class="form-group label-floating">
                                                                        <label class="control-label">Skill</label>
                                                                        <input type="text" id="jobskill" class="form-control" data-parsley-required>
                                                                    </div>
                                                                                                                                   
                                                                </div>
                                                                <div class="col-md-6 col-xs-6">                                                                   <div id="jobskilltagdiv" class="form-group label-floating">
                                                                      
                                                                        <input type="text" id="jobskilltag" class="form-control" value="" disabled >
                                                                    </div>                               
                                                                </div>
                                                                <div class="col-md-12 col-xs-12">
                                                                    
                                                                    <button class="btn btn-primary " name="addskill" id="addskill" type="submit">
                                                        Save Skill
                                                       </button>
                                                                    <hr>
                                                                    Skilltags:
                                                                    <div id="jobskilltagsdiv" class="text-info">
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
                                                                     </div>
                                                                </div>
                                                        
                                                            </div>
                                                        </form>        
                                                        </div>
                                                        
                                                    </div>
                                                 
                                                   

                                                    </div>
                                             </div>
                            
                               
                                <button class="btn btn-primary " name="previewjobad" id="previewjobad" data-jobid='<?=$jobid?>' type="button">
                                                        Preview Job Ad
                                                       </button>
                               
                                  <div id="successdivjobskillstag" class="alert alert-success">
                                               
                                                  <div class="alert-icon">
                                                    <i class="material-icons">check</i>
                                                  </div>
                                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true"><i class="material-icons">clear</i></span>
                                                  </button>
                                                  <b>Alert: </b> Your Job skill has been saved.
                                               
                                            </div>
                                 
                             
		                    </div>
                            
                            <div class="col-md-6">
                             <!--       
                                <button class="btn btn-primary " name="addwexp" id="addwexp" type="submit">
                                                        Add Work Experience
                                                       </button>
                            -->
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
 
<script src="js/jquery.easy-autocomplete.min.js"></script> 
<link rel="stylesheet" href="css/easy-autocomplete.min.css"> 
<script>
jQuery(document).ready(function ($) {
   
    $('#jobskills-form #jobskill').parsley().on('field:error', function() {
           $('#jobskills-form #jobskilldiv').addClass('has-error');
           $('#jobskills-form #jobskilldiv').append("<span class='material-icons form-control-feedback'>clear</span>");   
    });    
    $('#jobskills-form #jobskill').parsley().on('field:success', function() {
            $('#jobskills-form #jobskilldiv').addClass('has-success');
            $('#jobskills-form #jobskilldiv').find('span').remove()
            $('#jobskills-form #jobskilldiv').append("<span class='material-icons form-control-feedback'>done</span>");   
    });
   
   $('#resume-main-body #successdivjobskillstag').hide();
  
    var options = {
	url: "json/skilltags.json",
	getValue: "name",
	list: {
		match: {
			enabled: true
		       }
	       }
    }

$("#jobskill").easyAutocomplete(options);
    
});
</script>    