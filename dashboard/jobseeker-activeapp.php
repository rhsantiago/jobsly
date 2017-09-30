<script>
window.onload = function() {
   if (!window.jQuery) {  
      window.location.href = 'https://jobsly.net/dashboard/main.php?ajax=aapp';
   } 
}    
</script> 
<?php


    if (session_status() == PHP_SESSION_NONE) {
        session_start();
        include 'Database.php';
    }
include 'specialization.php';
if(isset($_SESSION['user'])){
   $user = $_SESSION['user'];
   $password = $_SESSION['password'];
   $userid = $_SESSION['userid'];
    date_default_timezone_set('Asia/Manila');
    $logtimestamp = date("Y-m-d H:i:s");
    include "serverlogconfig.php";
    $database = new Database();
    $months = array('Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec');
    $positionlevels = array('Executive','Manager','Assistant Manager','Supervisor','5 Years+ Experienced Employee','1-4 Years Experienced Employee','1 Year Experienced Employee/Fresh Grad');
}else{
    header("Location: logout.php");
}

?>

    
    <div class="row">
    <div class="col-md-12 center">            
        <!--
                    <div class="adstop">     <img  src="https://lh5.ggpht.com/NFYFP2H9CCP50vAQNLa7AtCj_mbbYmOzY978fZqd31oL5qOdvXgxU3KW8ek2VgvIOvTqWY0=w728" 
                                 alt="user">  
                     </div>    
        -->   
     </div>
   
    <div class="col-md-12">
                             <h2 class="title">Active Applications</h2>
       </div>
        
     </div>
<div class="row">
    <div class="col-md-offset-1 col-md-7">
                       
              <div class="section  section-landing">
	                 

					<div class="features"> 
						<div class="row">
                                                     
                            <div class="col-md-12">
                           <div class="alljobsdiv">
                          <?php
                                $database->query('SELECT distinct jobads.id,jobads.jobtitle,jobads.company,jobads.specialization,jobads.plevel, jobads.jobtype,jobads.msalary,jobads.maxsalary,jobads.startappdate,jobads.endappdate,jobads.dateadded,jobapplications.isnew,jobapplications.isshortlisted,companyinfo.logo from jobads,jobapplications,companyinfo where jobapplications.userid = :userid and jobads.id = jobapplications.jobid and jobads.userid=companyinfo.userid order by dateadded desc');
                                $database->bind(':userid', $userid);   
                                try{
                                    $rows = $database->resultset();
                                }catch (PDOException $e) {
                                    $msg = $e->getTraceAsString()." ".$e->getMessage();
                                    $log->error($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
                                    die("");
                                }     
                                foreach($rows as $row){
                                    $id = $row['id'];
                                    $logo = $row['logo'];
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

                                    $dateadded = $row['dateadded'];
                                    $dadd = explode("-", $dateadded);
                                    $dateadded = $dadd[1] .'/'.$dadd[2].'/'.$dadd[0];
                                    $isnew = $row['isnew'];
                                    $isshortlisted = $row['isshortlisted'];
                                    

                               
                                
                         ?>
                                
                                <section class="blog-post">
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
                                                    
                                                <div class="col-md-6  jobad-titletopmargin">
                                                         <a class="nodecor" target="_blank" href="viewjob-newpage.php?jobid=<?=$id?>&mode=view&isjobseeker=<?=$isjobseeker?>" id="viewjobnewpage"><h2 class="text-info jobad-title"><?=$jobtitle?></h2></a>
                                                        <div class="companypos">
                                                            <h6 class="text-muted"><i><?=$company?></i></h6>
                                                        </div> 
                                                </div>
                                                <div class="col-md-6">
                                                    
                                                    <div class="companylogo" align="right"> 
                                                        <img src="<?=$logo?>" width="70" height="70" class="img-responsive">
                                                    </div>
                                                </div>
                                            </div>    
                                            <div class="row-fluid">
                                                  
                                                <div class="col-md-12">
                                                    <div>
                                                        Status:
                                                   <?php
                                                        if($isnew==1 && $isshortlisted==0){
                                                            echo "<span class='text-warning h4weight'>Submitted, waiting for evaluation</span>";
                                                        }
                                                        if($isnew==0 && $isshortlisted==0){
                                                            echo "<span class='text-primary h4weight'>Viewed by employer, evaluating</span>";
                                                        }
                                                        if($isshortlisted==1){
                                                            echo "<span class='text-success h4weight'>Shortlisted</span>";
                                                        }
                                                    ?>
                                                        <ul class="list-inline pull-right">
                                                            <li><span class="jobcardbuttons actionicon "><a target="_blank" href="otherapplicants.php?jobid=<?=$id?>&mode=view&isjobseeker=jobseeker" id="viewjobnewpage" class="blog-post-share " title="View Job"><i class="material-icons" >compare_arrows</i>&nbsp;Other Applicants</a></span></li>
                                                            <li><span class="jobcardbuttons actionicon"><a target="_blank" href="viewjob-newpage.php?jobid=<?=$id?>&mode=view&isjobseeker=jobseeker" id="viewjobnewpage" class="blog-post-share " title="View Job"><i class="material-icons" >visibility</i>&nbsp;View Job Ad</a></span>
                                                        <!-- modal
                                                            <a class="blog-post-share " href='#showjobmodal' data-toggle="modal" data-target="#showjob-modal" data-jobid="<?=$id?>" data-isjobseeker="jobseeker" data-mode="view" title="View Job">
                                                    --></li>
                                                        </ul>    
                                                        
                                                    
                                                        
                                                    </div>
                                                        
                                                </div>
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
                                
                                                  
                                             <div id="successdivdeljob">
                                               
                                                  
                                               
                                            </div>
                                   
                            </div>
		                     
		                </div>
					</div>        <!--   features -->
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

</div>
<script>
jQuery(document).ready(function ($) {

    
});       
</script>