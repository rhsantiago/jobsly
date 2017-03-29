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
                                                                    echo"<h3 id='activelabel' class='text-success h4weight'>This Employer is ACTIVE</h3>";  
                                                                }else{
                                                                    echo"<h3 id='activelabel' class='text-danger h4weight'>This Employer is INACTIVE</h3>";     
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
                                                        <h2 class="text-info jobad-title"><?=$companyname?></h2>
                                                  
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="companylogo pull-right"> 
                                                        <img src="<?=$logo?>" width="70" height="70" class="img-responsive">
                                                    </div>
                                                </div>
                                            </div>    
                                         
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
  $('#resume-main-body #successdivdeljob').hide();
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