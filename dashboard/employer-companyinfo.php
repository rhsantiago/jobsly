<?php
if (session_status() == PHP_SESSION_NONE) {
        session_start();
         if (!isset($database)){
            include 'Database.php';
         }
    }
if(isset($_SESSION['user'])){
   $user = $_SESSION['user'];
   $password = $_SESSION['password'];
   $userid = $_SESSION['userid'];
   $usertype = $_SESSION['usertype'];


}
    
 
    $companyname='';
    $telno='';
    $companyaddress='';
    $companytin='';
    $companywebsite='';
    $cperson='';
    $designation='';
    $cpersonemail='';
    $cpersontelno='';
    $industry='';
    $numemp='';
    $cdesc='';
    $logo='';
     $database = new Database();
     $database->query('SELECT * from companyinfo where userid = :userid');
     $database->bind(':userid', $userid);   
     $row = $database->single();
    
     $id = $row['id'];
    // $userid = $row['userid'];
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
     $cdesc = $row['cdesc'];
     $ctype = $row['ctype'];
     $logo = $row['logo'];

     if($id > 0){
         $mode = 'update';
     }

?>


    
    <div class="row">
    <div class="col-md-12 center">            
                    <div class="adstop">     <img  src="https://lh5.ggpht.com/NFYFP2H9CCP50vAQNLa7AtCj_mbbYmOzY978fZqd31oL5qOdvXgxU3KW8ek2VgvIOvTqWY0=w728" 
                                 alt="user">  
                     </div>    
                           
     </div>
   
    <div class="col-md-12">
                             <h2 class="title">Company Information</h2>
       </div>
     </div>
    <div class="col-md-9">
                       
                <div class="section  section-landing">
	                 

					<div class="features">
						<div class="row">
                                                     
                            <div class="col-md-12">
                           

<form method="post" id="companyregistration-form" name="companyregistration-form" data-parsley-trigger="keyup" data-parsley-validate>                    
                    <input type="hidden" id="mode" name="mode" value="<?=$mode?>">
                    <input type="hidden" id="userid" name="userid" value="<?=$userid?>">
                
                            
		                   
                                <div class="col-md-6">
                                    <div class="card card-nav-tabs cardtopmargin">
                                            <div id="tabtitle" class="header  header-success">
                                                <!-- colors: "header-primary", "header-info", "header-success", "header-warning", "header-danger" -->
                                                <div class="nav-tabs-navigation">
                                                    <div class="nav-tabs-wrapper">
                                                        <ul class="nav nav-tabs" data-tabs="tabs">
                                                            <li class="active">
                                                                <a href="#profile" data-toggle="tab">
                                                                    <i class="material-icons">assignment_turned_in</i>
                                                                   Company Information
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
                                                                <div class="col-md-12">
                                                            <div id="companynameediv" class="form-group label-floating">
                                                                <label class="control-label">Name of Company</label>
                                                                <input type="text" id="companyname" class="form-control" value="<?=$companyname?>" data-parsley-required>  
                                                            </div>
                                                            <div id="companyaddressdiv" class="form-group label-floating">
                                                                <label class="control-label">Company Address</label>
                                                                <input type="text" id="companyaddress" class="form-control" value="<?=$companyaddress?>" data-parsley-required>
                                                            </div>
                                                             <div id="companywebsitediv" class="form-group label-floating">
                                                                <label class="control-label">Company Website</label>
                                                                <input type="text" id="companywebsite" class="form-control" value="<?=$companywebsite?>">
                                                            </div>       
                                                            
                                                            
                                                        </div>
                                                         <div class="col-md-6">
                                                                <div id="telnodiv" class="form-group label-floating">
                                                                <label class="control-label">Tel No.</label>
                                                                <input type="text" id="telno" class="form-control" value="<?=$telno?>" data-parsley-required data-parsley-pattern="^[\d\+\-\.\(\)\/\s]*$">
                                                             </div>
                                                             <?php
                                                                    if($id > 0){
                                                             ?>
                                                             <div >
                                                                 <a href="#logoupload-modal" data-userid="<?=$userid?>" data-toggle="modal">Upload Company Logo</a>
                                                              </div>
                                                             <?php
                                                                    }
                                                             ?>
                                                         </div>
                                                         <div class="col-md-6">
                                                             <div id="companytindiv" class="form-group label-floating">
                                                                <label class="control-label">Company TIN</label>
                                                                <input type="text" id="companytin" class="form-control" value="<?=$companytin?>" data-parsley-required>
                                                            </div>
                                                             <?php
                                                                    if(!empty($logo)){
                                                             ?>
                                                             <div class="container"><div class="col-md-1" style="padding-left: 0px;  padding-right: 0px;">
                                                                    <img src="<?=$logo?>" class="img-responsive">
                                                                </div>
                                                            </div>
                                                           
                                                             <?php
                                                                    }
                                                             ?>
                                                         </div>      
                                                              
                                                                
                                                       
                                                    </div>
                                                        </div>

                                                    </div>
                                             </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                            <div class="card card-nav-tabs cardtopmargin">
                                            <div id="tabtitle" class="header  header-info">
                                                <!-- colors: "header-primary", "header-info", "header-success", "header-warning", "header-danger" -->
                                                <div class="nav-tabs-navigation">
                                                    <div class="nav-tabs-wrapper">
                                                        <ul class="nav nav-tabs" data-tabs="tabs">
                                                            <li class="active">
                                                                <a href="#profile" data-toggle="tab">
                                                                    <i class="material-icons">description</i>
                                                                    Contact Person
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
                                                            <div class="col-md-12">    
                                                                <div id="cpersondiv" class="form-group label-floating">
                                                                    <label class="control-label">Contact Person</label>
                                                                    <input type="text" id="cperson" class="form-control" value="<?=$cperson?>" data-parsley-required>
                                                                </div>
                                                                <div id="designationdiv" class="form-group label-floating">
                                                                    <label class="control-label">Designation</label>
                                                                    <input type="text" id="designation" class="form-control" value="<?=$designation?>" data-parsley-required>
                                                                </div>
                                                             </div>   
                                                                <div class="col-md-6">
                                                                    <div id="cpersonemaildiv" class="form-group label-floating">
                                                                        <label class="control-label">Email</label>
                                                                        <input type="text" id="cpersonemail" value="<?=$cpersonemail?>" class="form-control" data-parsley-type="email">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div id="cpersontelnodiv" class="form-group label-floating">
                                                                        <label class="control-label">Tel No</label>
                                                                        <input type="text" id="cpersontelno" value="<?=$cpersontelno?>" class="form-control" data-parsley-required data-parsley-pattern="^[\d\+\-\.\(\)\/\s]*$">
                                                                    </div>
                                                                </div>    
                                                               
                                                        </div>
                                                        </div>       
                                                    </div>
                                             </div>
                                    </div>
                                    </div>    
                                    
                                
                                     <div class="col-md-12">
                                
                                    <div class="card card-nav-tabs cardtopmargin">
                                            <div id="tabtitle" class="header  header-warning">
                                                <!-- colors: "header-primary", "header-info", "header-success", "header-warning", "header-danger" -->
                                                <div class="nav-tabs-navigation">
                                                    <div class="nav-tabs-wrapper">
                                                        <ul class="nav nav-tabs" data-tabs="tabs">
                                                            <li class="active">
                                                                <a href="#profile" data-toggle="tab">
                                                                    <i class="material-icons">note_add</i>
                                                                    Other Information
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
                                                               
                                                                <div id="industrydiv" class="form-group label-floating">
                                                                    <label class="control-label">Industry</label>
                                                                    <input type="text" id="industry" value="<?=$industry?>" class="form-control">
                                                                </div>
                                                                <div id="numempdiv" class="form-group label-floating">
                                                                    <label class="control-label">Number of Employees</label>
                                                                    <input type="text" id="numemp" class="form-control" value="<?=$numemp?>"  data-parsley-type="number">
                                                                </div>
                                                               
                                                            </div>
                                                            <div class="col-md-6">
                                                             <div id="typediv" class="form-group label-floating">
                                                                <label class="control-label">Type of Company</label>
                                                                <select class="form-control" id="ctype" name="ctype"  placeholder="Position Level">       
                                                                           <option value='1' <?php if($ctype==1){echo' selected';}?>>Direct Employer</option>
                                                                           <option value='2' <?php if($ctype==2){echo' selected';}?>>Recruitment Agency</option> 
                                                                </select>
                                                            </div> 
                                                            </div>    
                                                            <div class="col-md-12">
                                                                Company Description
                                                            <div id="cdesc"><?=$cdesc?></div>
                                                                    
                                                             
                                                            </div>
                                                            
                                                        </div>

                                                    </div>
                                             </div>
                                    </div>
                                   
		                    </div>
		               
		                     <div class="col-md-12">
                                
                                            <div class="savebutton">
                                                <button class="btn btn-primary " name="savepinfo" id="savepinfo" type="submit">Save Company Information</button>
                                            </div>       
                                             <div id="successdivcreg" name="successdivcreg" class="alert alert-success">
                                               
                                                  <div class="alert-icon">
                                                    <i class="material-icons">check</i>
                                                  </div>
                                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true"><i class="material-icons">clear</i></span>
                                                  </button>
                                                  <b>Alert: </b> Your Company Information has been saved.
                                               
                                            </div>
                                   
                            </div>
		             
				
            </form>


                                
                                
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
 <script>
$(document).ready(function() {
    $('#resume-main-body #successdivcreg').hide();
   
    $('#companyregistration-form').parsley({
                            successClass: "has-success",
                            errorClass: "has-error"
    });
    
    $('#cdesc').summernote({
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
  
    $('#companyregistration-form #companyname').parsley().on('field:error', function() {
           $('#companyregistration-form #companynameediv').addClass('has-error');
           $('#companyregistration-form #companynameediv').append("<span class='material-icons form-control-feedback'>clear</span>");   
    });    
    $('#companyregistration-form #companyname').parsley().on('field:success', function() {
            $('#companyregistration-form #companynameediv').addClass('has-success');
            $('#companyregistration-form #companynameediv').find('span').remove()
            $('#companyregistration-form #companynameediv').append("<span class='material-icons form-control-feedback'>done</span>");   
    });
    $('#companyregistration-form #companyaddress').parsley().on('field:error', function() {
           $('#companyregistration-form #companyaddressdiv').addClass('has-error');
           $('#companyregistration-form #companyaddressdiv').append("<span class='material-icons form-control-feedback'>clear</span>");   
    });    
    $('#companyregistration-form #companyaddress').parsley().on('field:success', function() {
            $('#companyregistration-form #companyaddressdiv').addClass('has-success');
            $('#companyregistration-form #companyaddressdiv').find('span').remove()
            $('#companyregistration-form #companynamediv').append("<span class='material-icons form-control-feedback'>done</span>");   
    });
  
    
         
    
});       
</script>           