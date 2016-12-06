<?php
if (session_status() == PHP_SESSION_NONE) {
        session_start();
        include 'Database.php';
}


if(isset($_SESSION['user'])){
   $user = $_SESSION['user'];
   $password = $_SESSION['password'];
   $userid = $_SESSION['userid'];
    
    
    $database = new Database();

    $database->query('SELECT * from additionalinformation where userid = :userid');
    $database->bind(':userid', $userid);   

    $row = $database->single();
    $id = $row['id'];
        $mode = 'update';
        $dposition = $row['dposition'];
        $specialization = $row['specialization'];
        $plevel = $row['plevel'];
        $esalary = $row['esalary'];
        $pworkloc = $row['pworkloc'];
        $yexp = $row['yexp'];
        $wtravel = $row['wtravel'];
        $wrelocate = $row['wrelocate'];
        $pholder = $row['pholder'];
        $languages = $row['languages'];
    if(!empty($id)){
        $mode = 'update';               
    }else{
        $mode = 'insert';
    }
}
?>


     
                    <div class="col-md-9 ">
                        <div class="col-md-12">            
                       <!--     <img  src="https://lh5.ggpht.com/NFYFP2H9CCP50vAQNLa7AtCj_mbbYmOzY978fZqd31oL5qOdvXgxU3KW8ek2VgvIOvTqWY0=w728" 
                                 alt="user">         
                        -->
                             <h2 class="title">Additional Information</h2>
                        </div>
                       
                <div class="section  section-landing">
	         <form method="post" id="ainfo-form" name="ainfo-form" data-parsley-validate> 
                                                             <input type="hidden" id="userid" name="userid" value="<?=$userid?>">
                                                             <input type="hidden" id="etrain" name="mode" value="hs">
                                                             <input type="hidden" id="mode" name="mode" value="<?=$mode?>">
					<div class="features">
						<div class="row">
		                    <div class="col-md-12">
                                      
                                
                            
                                    <div class="card card-nav-tabs">
                                            <div id="tabtitle" class="header  header-success">
                                                <!-- colors: "header-primary", "header-info", "header-success", "header-warning", "header-danger" -->
                                                <div class="nav-tabs-navigation">
                                                    <div class="nav-tabs-wrapper">
                                                        <ul class="nav nav-tabs" data-tabs="tabs">
                                                            <li class="active">
                                                                <a href="#hs" data-toggle="tab">
                                                                    <i class="material-icons">sentiment_very_satisfied</i>Job Expectation
                                                                </a>
                                                            </li>                                                           
                                                            
                                                        </ul>
                                                    </div>
                                                </div>
                                          </div>
                                             <div class="content">
                                                    <div class="tab-content">
                                                        
                                                        <div class="tab-pane active" id="hs">
                                                            
                                                            <div class="row">
                                                                  <div class="col-md-6 col-xs-6">
                                                                    <div id="dpositiondiv" class="form-group label-floating">
                                                                        <label class="control-label">Desired Position</label>
                                                                        <input type="text" id="dposition" class="form-control" value="<?=$dposition?>" data-parsley-required>
                                                                    </div>
                                                                      <div id="esalarydiv" class="form-group label-floating">
                                                                        <label class="control-label">Expected Salary</label>
                                                                        <input type="text" id="esalary" class="form-control" value="<?=$esalary?>" data-parsley-required>
                                                                    </div>
                                                                      <div id="pworklocdiv" class="form-group label-floating">
                                                                        <label class="control-label">Work Location</label>
                                                                        <input type="text" id="pworkloc" class="form-control" value="<?=$pworkloc?>">
                                                                    </div>
                                                                                                                                     
                                                                </div>
                                                                <div class="col-md-6 col-xs-6">                                                                   <div id="pleveldiv" class="form-group label-floating">
                                                                        <label class="control-label">Position Level</label>
                                                                        <input type="text" id="plevel" class="form-control" value="<?=$plevel?>" data-parsley-required>
                                                                    </div>
                                                                    <div id="specializationdiv" class="form-group label-floating">
                                                                        <label class="control-label">Specialization</label>
                                                                        <input type="text" id="specialization" class="form-control" value="<?=$specialization?>" data-parsley-required>
                                                                    </div> 
                                                                                                                                  
                                                                </div>
                                                                <div class="col-md-12 col-xs-12">
                                                                   
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
                                                                <a href="#hs" data-toggle="tab">
                                                                    <i class="material-icons">info</i>Other Information
                                                                </a>
                                                            </li>                                                           
                                                            
                                                        </ul>
                                                    </div>
                                                </div>
                                          </div>
                                             <div class="content">
                                                    <div class="tab-content">
                                                        
                                                        <div class="tab-pane active" id="">
                                                            
                                                            <div class="row">
                                                                  <div class="col-md-6 col-xs-6">
                                                                    <div id="yexpdiv" class="form-group label-floating">
                                                                        <label class="control-label">Years of Experience</label>
                                                                        <input type="text" id="yexp" class="form-control" value="<?=$yexp?>" data-parsley-required>
                                                                    </div>
                                                                      <div id="wtraveldiv" class="form-group">
                                                                         <div class="checkbox">
                                                                            <label>
                                                                                    <input type="checkbox" id="wtravel" name="optionsCheckboxes">
                                                                                Willing to Travel?
                                                                            </label>
                                                                        </div>
                                                                      </div>
                                                                        <div id="pholderdiv" class="form-group">
                                                                         <div class="checkbox">
                                                                            <label>
                                                                                    <input type="checkbox" id="pholder" name="optionsCheckboxes">
                                                                                Do you have a valid passport?
                                                                            </label>
                                                                        </div>                                                                         
                                                                      </div>                                                             
                                                                </div>
                                                                <div class="col-md-6 col-xs-6">                                                                   <div id="languagesdiv" class="form-group label-floating">
                                                                        <label class="control-label">Languages</label>
                                                                        <input type="text" id="languages" class="form-control" value="<?=$languages?>" data-parsley-required>
                                                                    </div>
                                                                    <div id="wrelocatediv" class="form-group">
                                                                         <div class="checkbox">
                                                                            <label>
                                                                                    <input type="checkbox" id="wrelocate" name="optionsCheckboxes">
                                                                                Willing to Relocate?
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                                                                                  
                                                                </div>
                                                                <div class="col-md-12 col-xs-12">
                                                                   
                                                                </div>
                                                        
                                                            </div>
                                                             
                                                        </div>
                                                        
                                                    </div>
                                                 
                                                    </div>
                                             </div>
                              
                                <button class="btn btn-primary " name="addetrain" id="addetrain" type="submit">
                                                        Save Additional Information
                                                       </button>
                               
                                  <div id="successdivainfo" class="alert alert-success">
                                               
                                                  <div class="alert-icon">
                                                    <i class="material-icons">check</i>
                                                  </div>
                                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true"><i class="material-icons">clear</i></span>
                                                  </button>
                                                  <b>Alert: </b> Your additional information has been saved.
                                               
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
					</div> <!--features-->
                    </form>  
	            </div>
                        
                        
                    
                     
                        
                    </div>
                    
                    
                <div class="col-md-3">
                    
                                                    <div class="card adsright">                                            
                                                             <div class="content">
                                                                                                                                       
                                                                            <div class="row">
                                                                                <div class="col-md-12">
                                                                                    <img alt="Bootstrap Image Preview" src="img/ad1.jpg" width="300" height="250" class="img-responsive" style="padding-top: 5px"/><img alt="Bootstrap Image Preview" src="http://lorempixel.com/300/250/" class="img-responsive" style="padding-top: 5px"/>
                                                                                </div>
                                                                               
                                                                            
                                                                            </div>
                                                                      
                                                             </div>
                                                    </div>
                        
		       </div> 
   
<script>
jQuery(document).ready(function ($) {
   $('#resume-main-body #successdivainfo').hide();
    
       
});
</script>    