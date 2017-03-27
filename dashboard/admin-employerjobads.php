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
   $employerid='';    
   if(isset($_GET['employerid'])){ $employerid = $_GET['employerid']; }    
   $user = $_SESSION['user'];
   $password = $_SESSION['password'];
   $adminid = $_SESSION['adminid'];
    
   include "serverlogconfig.php";
   $database = new Database();

    
        
    $mode = 'insert';
    $months = array('Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec');
    $positionlevels = array('Executive','Manager','Assistant Manager','Supervisor','5 Years+ Experienced Employee','1-4 Years Experienced Employee','1 Year Experienced Employee/Fresh Grad');
   
    
}

?>

    <div class="row">
    <div class="col-md-12 center">            
                    <div class="adstop">     <img  src="https://lh5.ggpht.com/NFYFP2H9CCP50vAQNLa7AtCj_mbbYmOzY978fZqd31oL5qOdvXgxU3KW8ek2VgvIOvTqWY0=w728" 
                                 alt="user">  
                     </div>    
                           
     </div>
   
    <div class="col-md-12">
                        <?php
                            if(!empty($employerid)){
                                $database->query('SELECT companyname from companyinfo where userid=:employerid'); 
                                $database->bind(':employerid', $employerid);
                                try{
                                    $row = $database->single();
                                }catch (PDOException $e) {
                                    $msg = $e->getTraceAsString()." ".$e->getMessage();
                                    $log->error($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
                                    die("");
                                }                               
                                $companyname = $row['companyname'];
                        ?>
                                <h2 class="title">Job Ads by <?=$companyname?></h2>
                        <?php
                            }else{
                        ?>
                                <h2 class="title">Job Ads for Approval</h2>
                        <?php
                            }
                        ?>
       </div>
     </div>
    <div class="col-md-offset-1 col-md-7">
                       
                <div class="section  section-landing">
	                 

					<div class="features">
						<div class="row">
                                                     
                            <div class="col-md-12">
                           <div class="alljobsdiv">
                          <?php
                                //$database->query('SELECT * from jobads where userid = :userid order by dateadded desc');
                               $empcondition='';
                               if(!empty($employerid)){
                                    $empcondition = " jobads.userid=:employerid and ";
                               }
                            
                               $database->query('SELECT distinct jobads.id,jobads.jobtitle,jobads.company,jobads.specialization,jobads.plevel,jobads.jobtype,jobads.msalary, jobads.maxsalary,jobads.startappdate,jobads.endappdate,jobads.teaser, jobads.dateadded,jobads.isactive, companyinfo.logo from jobads,companyinfo where'.$empcondition.' jobads.userid=companyinfo.userid order by jobads.isactive desc, jobads.dateadded desc');
                               if(!empty($employerid)){
                                    $database->bind(':employerid', $employerid);
                               }
                                try{
                                    $rows = $database->resultset();
                                }catch (PDOException $e) {
                                    $msg = $e->getTraceAsString()." ".$e->getMessage();
                                    $log->error($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
                                    die("");
                                }
                                foreach($rows as $row){
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
                                    $teaser=$row['teaser'];
                                    $dateadded = $row['dateadded'];
                                    $dadd = explode("-", $dateadded);
                                    $dateadded = $dadd[1] .'/'.$dadd[2].'/'.$dadd[0]; 
                                    $logo = $row['logo'];
                                    $isactive = $row['isactive'];
                                    $inactive='';
                                    if($isactive < 1){
                                        $inactive=' inactive';
                                    }

                               
                                
                         ?>
                                
                                <section id="section<?=$id?>" class="blog-post <?=$inactive?>">
                                    <div class="panel panel-default">
                                    
                                      <div class="panel-body jobad-bottomborder">
                                          <div class="jobad-meta jobad-bottomborder">
                                      <p class="blog-post-date pull-right text-muted"><?=$months[$dadd[1]-1]?>&nbsp;<?=$dadd[2]?>,&nbsp;<?=$dadd[0]?></p>
                                         <ul  class="list-inline ">
                                                                                           
                                                                                            <li>
                                                                                                <h6 id="vertical-align" class="text-muted jobadheader">
                                                                                                   <i class="material-icons text-info jobadheadericon">domain</i> &nbsp;<?=$specarray[$specialization]?>
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
                                                <div class="col-md-6 jobad-titletopmargin">
                                                    
                                                         <a class="nodecor" href='#adminshowjobmodal' data-toggle="modal" data-target="#admin-showjob-modal" data-jobid="<?=$id?>" data-mode="approve" title="View Job"><h2 class="text-info jobad-title"><?=$jobtitle?></h2></a>
                                                        <div class="companypos">
                                                            <h6 class="text-muted"><i><?=$company?></i></h6>
                                                        </div> 
                                                        
                                                </div>
                                                
                                                <div class="col-md-6 ">
                                                    <div class="companylogo pull-right"> 
                                                        <img src="<?=$logo?>" width="70" height="70" class="img-responsive">
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            <div class="row-fluid">
                                                <div class="col-md-12" >
                                                            <?=$teaser?>
                                                        </div>
                                                <div class="col-md-12" align="left">
                                                    
                                                        </div>
                                          
                                          </div> 
                                        </div>                                  
                                         <div class="row-fluid">
                                               
                                                <div class="col-md-6 actionicon pull-right">
                                                          <span class="jobcardbuttons h4weight"><a class="blog-post-share" target="_blank" href='admin-jobads.php?ajax=jdtls&jobid=<?=$id?>&employerid=<?=$employerid?>' title="View Job"><i class="material-icons" >visibility</i></a></span>
                                                          <!-- ajax enabled                                                      
                                                         <span class="jobcardbuttons h4weight"><a class="blog-post-share " href='#adminshowjobmodal' data-toggle="modal" data-target="#admin-showjob-modal" data-jobid="<?=$id?>" data-mode="approve"  title="View Job"><i class="material-icons" >visibility</i></a></span>
                                                        -->
                                                        <a class="blog-post-share " href="#editjob" id="editjob" data-jobid="<?=$id?>" data-toggle="tooltip" data-placement="top" title="Edit"><i class="material-icons" >edit</i></a>
                                                        <a class="blog-post-share " href="#deljob" id="deljob" data-toggle="modal" data-placement="top" data-jobid="<?=$id?>" data-mode="del" data-target="#jobpost-modal" title="Delete"><i class="material-icons">delete</i></a>   
                                                </div>
                                          </div> 
                                      </div>
                                        
                                        
                                    </div>
                                  </section>
                                    <?php
                                }
                                    ?>
                                
                                </div> 
                                
                                
                                
                            </div>  
                                        <div class="col-md-12">
                                
                                                  
                                             <div id="successdivdeljob" class="alert alert-success">
                                               
                                                  <div class="alert-icon">
                                                    <i class="material-icons">check</i>
                                                  </div>
                                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true"><i class="material-icons">clear</i></span>
                                                  </button>
                                                 <b>Alert: </b>Your Job ad has been deleted.
                                               
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