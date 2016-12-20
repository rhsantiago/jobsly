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
                             <h2 class="title">Post a Job Ad<?=$userid?></h2>
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
                                            <a href="#step-3" type="button" class="btn btn-default btn-circle" 
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
                                            <a href="#step-4" type="button" class="btn btn-primary btn-circle" disabled="disabled">4</a>
                                            <br><b>Preview</b>
                                          </div>
                                        </div>
                                    </div>
                            </div>
		                    <div class="col-md-12">
                              
                                  <section class="blog-post">
                                    <div class="panel panel-default">
                                     <img src="img/fjord.jpg" class="img-responsive">
                                      <div class="panel-body jobad-bottomborder">
                                          <div class="jobad-meta jobad-bottomborder">
                                      <p class="blog-post-date pull-right text-muted">February 16, 2016</p>
                                          <ul  class="list-inline ">
                                                                                           
                                                                                            <li>
                                                                                                <h6 id="vertical-align" class="text-muted jobadheader">
                                                                                                   <i class="material-icons text-info jobadheadericon">date_range</i> Specialization
                                                                                                </h6>
                                                                                            </li>
                                                                                            <li>
                                                                                                <h6 id="vertical-align" class="text-muted jobadheader">
                                                                                                <i class="material-icons text-info jobadheadericon">people</i>Managerial
                                                                                                </h6>
                                                                                            </li>
                                                                                            <li>
                                                                                                <h6 id="vertical-align" class="text-muted jobadheader">
                                                                                                   <i class="material-icons text-info jobadheadericon">local_atm</i> Php 100000
                                                                                                </h6>
                                                                                            </li>
                                                                                        </ul>
                                          
                                        </div>
                                     
                                        <div class="blog-post-content">
                                            <div class="row-fluid">
                                                <div class="col-md-6">
                                                         <a class="nodecor" href="#"><h2 class="text-info jobad-title">Senior Software Engineer</h2></a>
                                                        <div class="companypos">
                                                            <h6 class="text-muted"><i>CHAMP Cargosystems Phils</i></h6>
                                                        </div> 
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="companylogo"> 
                                                        <img src="img/champ.png" width="70" height="70" class="img-responsive">
                                                    </div>
                                                </div>
                                            </div>    
                                         
                                          <div class="row-fluid">
                                                <div class="col-md-12">   
                                               
                                                    <div class="collapse-group collapse" id="viewdetails">
                                                  <p>Donec ut libero sed arcu vehicula ultricies a non tortor. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean ut gravida lorem.</p>
                                                    <p>Donec ut libero sed arcu vehicula ultricies a non tortor. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean ut gravida lorem.</p>
                                                        <p>Donec ut libero sed arcu vehicula ultricies a non tortor. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean ut gravida lorem.</p>
                                                    </div>    
                                                </div>
                                            </div>
                                          
                                        </div>
                                          <div class="row-fluid">
                                                <div class="col-md-6">
                                                        <a class="btn btn-primary" data-toggle="collapse" data-target="#viewdetails">Read more</a>
                                                </div>
                                                <div class="col-md-6 actionicon">
                                                        <a class="blog-post-share " href="#"><i class="material-icons"></i></a>
                                                </div>
                                          </div>      
                                          
                                              
                                         
                                      </div>
                                        
                                        <div class="skilltags">
                                            Skilltags: <span class="text-info">#java #j2ee #sping #InversionofControl #ObjectOriented</span>
                                        </div>    
                                    </div>
                                  </section>
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