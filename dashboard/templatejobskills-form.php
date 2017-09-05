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
    date_default_timezone_set('Asia/Manila');
    $logtimestamp = date("Y-m-d H:i:s");
   include "serverlogconfig.php"; 
    if (isset($templateid)){
    }else{
        if(isset($_POST['templateid'])){ $templateid = $_POST['templateid']; }
    }
    $mode = 'insert';
}else{
    header("Location: logout.php");
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
                             <h2 class="title">Job Templates / Required Skills</h2>
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
                                            <a href="#step-1-template" id="step-1-template" type="button" class="btn btn-default btn-circle" disabled="disabled">1</a>
                                           <br>Select Template
                                          </div>
                                          <div class="stepwizard-step">
                                            <a href="#step-2-template" id="step-2-template" type="button" class="btn btn-default btn-circle" 
                                               <?php
                                                    if($templateid > 0){
                                                        echo " data-templateid='".$templateid."'";
                                                    }else{
                                                        echo" disabled='disabled'";
                                                    }
                                               ?>
                                                >2</a>
                                              
                                            <br>Job Details
                                          </div>
                                          <div class="stepwizard-step">
                                            <a href="#step-3-template" id="step-3-template" type="button" class="btn btn-primary btn-circle" 
                                               <?php
                                                    if($templateid > 0){
                                                        echo " data-templateid='".$templateid."'";
                                                    }else{
                                                        echo" disabled='disabled'";
                                                    }
                                               ?>
                                               >3</a>
                                            <br><b>Job Skills</b>
                                          </div>
                                            <div class="stepwizard-step">
                                            <a href="#step-4-template" id="step-4-template" type="button" class="btn btn-default btn-circle" 
                                               <?php
                                                    if($templateid > 0){
                                                        echo " data-templateid='".$templateid."'";
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
                              
                                    <div class="card card-nav-tabs cardtopmargin">
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
                                                            <form method="post" id="jobskillstemplate-form" name="jobskillstemplate-form" data-parsley-validate> 
                                                             <input type="hidden" id="userid" name="userid" value="<?=$userid?>">   
                                                             <input type="hidden" id="mode" name="mode" value="<?=$mode?>">
                                                                <input type="hidden" id="templateid" name="templateid" value="<?=$templateid?>">
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
                                                      
                                                                            $database->query('SELECT * FROM jobskillstemplate where templateid = :templateid');                                                   
                                                                            $database->bind(':templateid', $templateid);
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
                                                                     </div>
                                                                </div>
                                                        
                                                            </div>
                                                        </form>        
                                                        </div>
                                                        
                                                    </div>
                                                 
                                                   

                                                    </div>
                                             </div>
                            
                               
                                <button class="btn btn-primary " name="previewjobtemplate" id="previewjobtemplate" data-templateid="<?=$templateid?>" type="button">
                                                        Preview Job Template
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
                    <!--
                          <div class="card card-ads adsright">                                            
                               <div class="content">
                                 <div class="row">
                                     <div class="col-md-12">
                                          
                                     </div>
                                   </div>
                                </div>
                          </div>
                    -->
                        
		       </div> 
 
<script src="js/jquery.easy-autocomplete.min.js"></script> 
<link rel="stylesheet" href="css/easy-autocomplete.min.css"> 
<script>
jQuery(document).ready(function ($) {
   
    $('#jobskillstemplate-form #jobskill').parsley().on('field:error', function() {
           $('#jobskillstemplate-form #jobskilldiv').addClass('has-error');
           $('#jobskillstemplate-form #jobskilldiv').append("<span class='material-icons form-control-feedback'>clear</span>");   
    });    
    $('#jobskillstemplate-form #jobskill').parsley().on('field:success', function() {
            $('#jobskillstemplate-form #jobskilldiv').addClass('has-success');
            $('#jobskillstemplate-form #jobskilldiv').find('span').remove()
            $('#jobskillstemplate-form #jobskilldiv').append("<span class='material-icons form-control-feedback'>done</span>");   
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