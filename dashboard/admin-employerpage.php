<?php


    if (session_status() == PHP_SESSION_NONE) {
        session_start();
         if (!isset($database)){
            include 'Database.php';
         }
    }
date_default_timezone_set('Asia/Manila');
$logtimestamp = date("Y-m-d H:i:s");
include 'specialization.php';
if(isset($_SESSION['user'])){
   $user = $_SESSION['user'];
   $password = $_SESSION['password'];
   $adminid = $_SESSION['adminid'];
    
   //include "serverlogconfig.php";
   $database = new Database();

   $months = array('Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec');
   
   if(isset($_GET['employerid'])){ $employerid = $_GET['employerid']; } 
      
    $database->query('SELECT * from useraccounts, companyinfo where useraccounts.id=companyinfo.userid and useraccounts.id=:employerid');   
    $database->bind(':employerid', $employerid);
    try{
        $row = $database->single();
     }catch (PDOException $e) {
        $msg = $e->getTraceAsString()." ".$e->getMessage();
        $log->error($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
        die("");
    }
    $logo = $row['logo'];
    $companyname = $row['companyname'];
    $companyaddress = $row['companyaddress'];
    $companywebsite = $row['companywebsite'];
    $email = $row['email'];
    $telno = $row['telno'];
    $companytin = $row['companytin'];
    $cperson = $row['cperson'];
    $designation = $row['designation'];
    $cpersonemail = $row['cpersonemail'];
    $cpersontelno = $row['cpersontelno'];
    $industry = $row['industry'];
    $numemp = $row['numemp'];
    $ctype = $row['ctype'];
    if($ctype==1){
        $ctype='Direct Employer';
    }else if($ctype==2){
        $ctype='Recruitment Agency';
    }
    $cdesc = $row['cdesc'];
    $signupdate = $row['signupdate'];
    $sdate = explode("-", $signupdate); 
    $isverified = $row['isverified'];
    $header = $row['header'];
    
    
    $database->query('SELECT count(id) as totjobs  from jobads where userid=:employerid');   
    $database->bind(':employerid', $employerid);
    try{
        $row = $database->single();
     }catch (PDOException $e) {
        $msg = $e->getTraceAsString()." ".$e->getMessage();
        $log->error($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
        die("");
    }
    $totjobs = $row['totjobs'];
    
    $database->query('SELECT count(id) as totactive from jobads where isactive=1 and userid=:employerid');   
    $database->bind(':employerid', $employerid);
    try{
        $row = $database->single();
     }catch (PDOException $e) {
        $msg = $e->getTraceAsString()." ".$e->getMessage();
        $log->error($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
        die("");
    }    
    $totactive = $row['totactive'];
    
    $database->query('SELECT count(id) as totinactive from jobads where isactive=0 and userid=:employerid');   
    $database->bind(':employerid', $employerid);
    try{
        $row = $database->single();
     }catch (PDOException $e) {
        $msg = $e->getTraceAsString()." ".$e->getMessage();
        $log->error($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
        die("");
    }    
    $totinactive = $row['totinactive'];
}

?>

    <div class="row">
    <div class="col-md-12 center">            
                    <div class="adstop">     <img  src="https://lh5.ggpht.com/NFYFP2H9CCP50vAQNLa7AtCj_mbbYmOzY978fZqd31oL5qOdvXgxU3KW8ek2VgvIOvTqWY0=w728" 
                                 alt="user">  
                     </div>    
                           
     </div>
   
    <div class="col-md-12">
                             <h2 class="title">Details for Employer Id: <?=$employerid?></h2>
       </div>
        
     </div>
    <div class="col-md-9">
                       
                <div class="section  section-landing">
					<div class="features">
						<div class="row">
                                                     
                            <div class="col-md-12">
                    
                           <div class="alljobsdiv">
                                <div class="card essaymargintop">                                           
                                             <div class="content">
                                                    <div class="tab-content">
                                                        <div class="tab-pane active" id="profile">                                                            
                                                            <div class="row">                                                                
                                                               <div class="col-md-12"> 
                                                                   <form method="post" id="employeractivation-form" name="employeractivation-form">
                                                                        <ul class="list-inline">
                                                                                          
                                                                                            <li class="editfloatright">
                                                                                                <?php
                                                                                                if($isverified==1){
                                                                                               echo"
                                                                                               <input type='hidden' id='action' name='action' value='deactivate'>
                                                                                               <input type='hidden' id='employerid' name='employerid' value='$employerid'>
                                                                                               <button class='btn btn-primary' name='activatebtn' id='activatebtn' type='submit'>Deactivate</button>";
                                                                                                }else if($isverified==0){   
                                                                                                echo"
                                                                                                <input type='hidden' id='action' name='action' value='activate'>
                                                                                               <input type='hidden' id='employerid' name='employerid' value='$employerid'>
                                                                                                <button class='btn btn-primary' name='activatebtn' id='activatebtn' type='submit'>Activate</button>";    
                                                                                                }
                                                                                                ?>
                                                                                            </li>
                                                                                        </ul>
                                                                     </form>  
                                                             <?php
                                                                if($isverified==1){
                                                                    echo"<h4 id='activelabel' class='text-success h4weight margin30'>This Employer is ACTIVE</h4>";  
                                                                }else{
                                                                    echo"<h4 id='activelabel' class='text-danger h4weight margin30'>This Employer is INACTIVE</h4>";     
                                                                }           
                                                            ?>        
                                                         
                                                      
                                                        </div>                                                       
                                                     </div>
                                              </div>
                                        </div>
                                  </div>
                               </div>
                               
                               
                               
                               <div class="col-md-12">
                                   <section class="blog-post leftmargin10">
                                    <div class="panel panel-default">
                                      
                                      <div class="panel-body jobad-bottomborder">
                                       
                                        <div class="blog-post-content">
                                            <div class="row-fluid">
                                                <div class="col-md-6">
                                                        <h2 class="text-info h4weight"><?=$companyname?></h2>
                                                  
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="companylogo pull-right"> 
                                                        <img src="<?=$logo?>" width="70" height="70" class="img-responsive">
                                                    </div>
                                                </div>
                                            </div>
                              
                                         <!--
                                          <div class="row-fluid">
                                             
                                                  <?=$cdesc?>
                                                        
                                                   <br>
                                                        <ul style="list-style: none;">
                                                              
                                                                <li>Username: <b><?=$email?></b></li>
                                                                <li>User Id: <b><?=$employerid?></b></li>
                                                                                                                     
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
                                                  
                                                       
                                                        <ul style="list-style: none;">
                                                                <li>Contact Person: <b><?=$cperson?></b></li>
                                                                <li>Designation: <b><?=$designation?></b></li>
                                                                <li>Contact Person Email: <b><?=$cpersonemail?></b></li>
                                                                <li>Contact Person Phone Num: <b><?=$cpersontelno?></b></li>  
                                                        </ul>                                                       
                                                
                                               
                                            </div>
                                          -->
                                        </div>
                                      
                                      </div>
                                    
                                    </div>
                                  </section>                   
                               
                                </div>
                                </div> 
                                
                            </div>  
                                     
		                     
		                </div>
                        <div class="row">                              
                            <div class="col-md-4"> 
                                    <div  class="card card-stats" >
                                        <div class="card-header cardmargin" data-background-color="purple">
                                            <h3 class="center marginjobdetaillink"><span id="jobadsapprdiv"><?=$totjobs?></span></h3>
                                        </div>
                                      <a href="#jobadsappr" id="jobadsappr" class="text-primary h4weight pull-right  marginjobdetaillink" data-jobid="<?=$id?>">Total<br>Job Ads</a>
                                        
                                    </div>
                             </div>
                              <div class="col-md-4">       
                                     <div  class="card card-stats">
                                        <div class="card-header cardmargin" data-background-color="green">
                                            <h3 class="center marginjobdetaillink"><span id="empapprdiv"><?=$totactive?></span></h3>
                                        </div>                                        
                                            <a href="#empappr" id="empappr" class="text-success h4weight pull-right marginjobdetaillink" data-jobid="<?=$id?>">Total Active<br>Job Ads</a>
                                    </div> 
                               </div>   
                              <div class="col-md-4">     
                                    <div  class="card card-stats" >
                                        <div class="card-header cardmargin" data-background-color="red">
                                            <h3 class="center marginjobdetaillink"><a href="#activeapps" id="activeapps" class="text-primary h4weight pull-right" data-jobid="<?=$id?>"><span id="aappsdiv"><?=$totinactive?></span></a></h3>
                                        </div>
                                      <a href="#activeapps" id="activeapps" class="text-danger h4weight pull-right  marginjobdetaillink" data-jobid="<?=$id?>">Total Inactive<br>Job Ads</a>                                        
                                   </div>     
                               </div>
                                		
                            </div>
                        <div class="row">
                                                     
                            <div class="col-md-12">
                           

<form method="post" id="companyregistration-form" name="companyregistration-form" data-parsley-trigger="keyup" data-parsley-validate>                    
                    <input type="hidden" id="mode" name="mode" value="update">
                    <input type="hidden" id="userid" name="userid" value="<?=$employerid?>">
                
                            
		                   
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
                                                                    if($employerid > 0){
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
                                                                  <div class="savebutton pull-right">
                                                <button class="btn btn-primary " name="savepinfo" id="savepinfo" type="submit">Save Company Information</button>
                                            </div>    
                                                             
                                                            </div>
                                                            
                                                        </div>

                                                    </div>
                                             </div>
                                    </div>
                                   
		                    </div>
		               
		                     <div class="col-md-12">                                      
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
                        
                            <div class="jobadheadercard card essaymargintop">                                           
                                             <div class="content">
                                                    <div class="tab-content">
                                                        <div class="tab-pane active" id="profile">                                                            
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <h4 class="text-info">Job Ad Header</h4>
                                                                </div>
                                                                <form method="post" id="uploadjobadheader-form" name="uploadjobadheader-form"  action="admin-uploadjobadheader-submit.php" method="post" enctype="multipart/form-data"> 
                                                               <div class="col-md-6"> 
                                                                  
                                                                         <input type='hidden' id='action' name='action' value='upload'>
                                                                         <input type='hidden' id='employerid' name='employerid' value='<?=$employerid?>'>
                                                                        <div id="fileuploaddiv" class="">                 
                                                                           <input type="file" id="fileToUpload" name="fileToUpload" class="">
                                                                         </div> 
                                                                   
                                                                </div>
                                                                <div class="col-md-6"> 
                                                                        <button class='btn btn-primary editfloatright' name='uploadheaderbtn' id='uploadheaderbtn' type='submit'>Upload</button>
                                                                    
                                                                </div>    
                                                                </form> 
                                                             <div class="col-md-12"> 
                                                                 <hr>
                                                                    <?php
                                                                        if(!empty($header)){
                                                                    ?>    
                                                                        <img id="jobadheader" src="<?=$header?>"  class="img-responsive fullwidth">
                                                                        <br>
                                                                        <form method="post" id="uploadjobadheader-form" name="deljobadheader-form"  action="admin-delheader-submit.php" method="post">    
                                                                            <input type='hidden' id='employerid' name='employerid' value='<?=$employerid?>'>
                                                                             <button class='btn btn-primary editfloatright' name='delheaderbtn' id='delheaderbtn' type='submit'>Remove</button>
                                                                        </form>    
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
jQuery(document).ready(function ($) {
  $('#resume-main-body #successdivcreg').hide();
    
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