<?php


    if (session_status() == PHP_SESSION_NONE) {
        session_start();
        include 'Database.php';
    }
/*


if(isset($_SESSION['user'])){
   $user = $_SESSION['user'];
   $password = $_SESSION['password'];
   $userid = $_SESSION['userid'];
    
  
    $database = new Database();

    $database->query('SELECT * from jobads where userid = :userid');
    $database->bind(':userid', $userid);   

    $row = $database->single();
 

        $mode = 'insert';
   
    
}
*/
?>


<form method="post" id="selecttemplate-form" name="selecttemplate-form" data-parsley-validate>
                    <input type="hidden" id="id" name="id" value="<?=$id?>">
                    <input type="hidden" id="mode" name="mode" value="insert">
                    <input type="hidden" id="userid" name="userid" value="<?=$userid?>"> 
    
    <div class="row">
    <div class="col-md-12 center">            
                    <div class="adstop">     <img  src="https://lh5.ggpht.com/NFYFP2H9CCP50vAQNLa7AtCj_mbbYmOzY978fZqd31oL5qOdvXgxU3KW8ek2VgvIOvTqWY0=w728" 
                                 alt="user">  
                     </div>    
                           
     </div>
   
    <div class="col-md-12">
                             <h2 class="title">Post a Job Ad</h2>
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
                                <a href="#step-1" type="button" class="btn btn-primary btn-circle" >1</a>
                               <br><b>Select Template</b>
                              </div>
                              <div class="stepwizard-step">
                                <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
                                <br>Job Details
                              </div>
                              <div class="stepwizard-step">
                                <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
                                <br>Job Skills
                              </div>
                                <div class="stepwizard-step">
                                <a href="#step-4" type="button" class="btn btn-default btn-circle" disabled="disabled">4</a>
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
                                                                   Template
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
                                                            <div id="templatediv" class="form-group label-floating">
                                                                <label class="control-label">Select Template</label>
                                                                <select class="form-control" id="template" name="template"  placeholder="Select Template" data-parsley-required>     
                                                                           <option value='blank'>Blank</option>
                                                                           <option value='part'>Part-time</option>
                                                                           <option value=project>Project</option>  
                                                                </select>
                                                            </div>
                                                        
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
    /*
    $('#pinfo-form #fname').parsley().on('field:error', function() {
           $('#pinfo-form #fnamediv').addClass('has-error');
           $('#pinfo-form #fnamediv').append("<span class='material-icons form-control-feedback'>clear</span>");   
    });    
    $('#pinfo-form #fname').parsley().on('field:success', function() {
            $('#pinfo-form #fnamediv').addClass('has-success');
            $('#pinfo-form #fnamediv').find('span').remove()
            $('#pinfo-form #fnamediv').append("<span class='material-icons form-control-feedback'>done</span>");   
    });
    
   
    
    */
    
});       
</script>