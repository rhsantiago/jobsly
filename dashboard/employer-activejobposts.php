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
   $userid = $_SESSION['userid'];
    
   include "serverlogconfig.php";
   $database = new Database();

   $today = date("Y-m-d"); 
        
    $mode = 'insert';
    $months = array('Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec');
    $positionlevels = array('Executive','Manager','Assistant Manager','Supervisor','5 Years+ Experienced Employee','1-4 Years Experienced Employee','1 Year Experienced Employee/Fresh Grad');
   
    
}else{
    header("Location: logout.php");
}

?>



    
    <div class="row">
    <div class="col-md-12 center">            
                    <div class="adstop">     <img  src="https://lh5.ggpht.com/NFYFP2H9CCP50vAQNLa7AtCj_mbbYmOzY978fZqd31oL5qOdvXgxU3KW8ek2VgvIOvTqWY0=w728" 
                                 alt="user">  
                     </div>    
                           
     </div>
   
    <div class="col-md-12">
                             <h2 class="title">Active Job Ads</h2>
       </div>
     </div>
    <div class="col-md-9">
                       
                <div class="section  section-landing">
	                 

					<div class="features">
						<div class="row">
                                                     
                            <div class="col-md-12">
                           <div class="alljobsdiv">
                          <?php
                                //$database->query('SELECT * from jobads where userid = :userid and isactive=1 order by dateadded desc');
                               $database->query('SELECT jobads.id,jobads.jobtitle,jobads.company,jobads.specialization, jobads.plevel,jobads.jobtype,jobads.msalary, jobads.maxsalary,jobads.startappdate,jobads.endappdate,jobads.dateadded, companyinfo.logo from jobads,companyinfo where jobads.userid = :userid and companyinfo.userid = :userid and isactive=1 order by jobads.dateadded desc');
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
                                    $logo = $row['logo'];

                              $database->query('select (select count(jobapplications.id) from jobapplications,useraccounts where jobapplications.userid = useraccounts.id and jobid=:jobid and isreject=0 and isverified=1) as aapps,(select count(jobapplications.id) from jobapplications,useraccounts where jobapplications.userid = useraccounts.id and jobid=:jobid and isverified=1 and (isnew=1 or dateapplied=:today)) as napps,(select count(jobapplications.id) from jobapplications, useraccounts where jobapplications.userid = useraccounts.id and jobid=:jobid and isshortlisted=1 and isreject=0 and isverified=1) as shortlisted from jobapplications limit 0,1');
                              $database->bind(':jobid', $id);   
                              $database->bind(':today', $today);        
                               try{             
                                    $row = $database->single();  
                               }catch (PDOException $e) {
                                     $msg = $e->getTraceAsString()." ".$e->getMessage();
                                     $log->error($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
                                     die("");
                               }    
                               $aapps = $row['aapps'];
                               $napps = $row['napps'];        
                               $shortlisted = $row['shortlisted']; 
                                    
                               $database->query('SELECT count(distinct personalinformation.userid) as matched from personalinformation,additionalinformation, jobapplications where personalinformation.userid = additionalinformation.userid and  additionalinformation.specialization=:specialization and personalinformation.userid not in (select jobapplications.userid from jobapplications where jobapplications.jobid=:jobid)');
                                            $database->bind(':specialization', $specialization);  
                                            $database->bind(':jobid', $id); 
                                            try{    
                                                $row2= $database->single();
                                            }catch (PDOException $e) {
                                                $msg = $e->getTraceAsString()." ".$e->getMessage();
                                                $log->error($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
                                                die("");
                                            }   
                                     $matched = $row2['matched'];       
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
                                            
                                            <div class="row">
                                                <div class="col-md-6 jobad-titletopmargin">
                                                        <!-- no ajax
                                                        <a target="_blank" href="employer-jobdetails.php?jobid=<?=$id?>" class="nodecor"><h2 class="text-info  jobad-title"><?=$jobtitle?></h2></a>
                                                        -->
                                                        
                                                         <a href="#jobdetails" id="jobdetails" class="nodecor" data-jobid="<?=$id?>"><h2 class="text-info  jobad-title"><?=$jobtitle?></h2></a>
                                                        
                                                        <div class="companypos">
                                                            <h6 class="text-muted"><i><?=$company?></i></h6>
                                                        </div> 
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="companylogo"  align='right'> 
                                                        <img src="<?=$logo?>" width="70" height="70" class="img-responsive">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12" align="center">
                                                    <ul class="list-inline">
                                                        <li>                                                            
                                                            <div class="card">
                                                                <div class="card-header cardmargin" data-background-color="purple">
                                                                    <h3 class="center">
                                                                        <!-- no ajax 
                                                                        <a target="_blank" href="employer-jobdetails.php?jobid=<?=$id?>&page=activeapps" class="text-primary h4weight"><?=$aapps?></a>
                                                                        -->
                                                                         
                                                                        <a href="#jobdetails" id="jobdetails" data-page="activeapps" class="text-primary h4weight" data-jobid="<?=$id?>"><?=$aapps?></a>
                                                                            
                                                                    </h3>
                                                                </div>
                                                                <!--no  ajax
                                                                <a target="_blank" href="employer-jobdetails.php?jobid=<?=$id?>&page=activeapps" class="text-primary h4weight">Active<br>Applications</a> 
                                                                 -->
                                                                <a href="#jobdetails" id="jobdetails" data-page="activeapps" class="text-primary h4weight" data-jobid="<?=$id?>">Active<br>Applications</a>   
                                                               
                                                            </div>
                                                        </li>
                                                        <li class="activejobstotals-left">                                                            
                                                            <div class="card">
                                                                <div class="card-header cardmargin" data-background-color="blue">
                                                                    <h3 class="center">
                                                                        <!-- no ajax
                                                                        <a target="_blank" href="employer-jobdetails.php?jobid=<?=$id?>&page=newapps" class="text-info h4weight"><?=$napps?></a>
                                                                         -->
                                                                        <a href="#jobdetails" id="jobdetails" class="text-info h4weight" data-jobid="<?=$id?>" data-page="newapps"><?=$napps?></a>
                                                                       
                                                                    </h3>
                                                                </div>
                                                                <!-- no ajax
                                                                <a target="_blank" href="employer-jobdetails.php?jobid=<?=$id?>&page=newapps" class="text-info h4weight">New<br>Applications</a> 
                                                                 -->  
                                                                 <a href="#jobdetails" id="jobdetails" class="text-info h4weight" data-jobid="<?=$id?>" data-page="newapps">New<br>Applications</a> 
                                                                     
                                                            </div>
                                                        </li>
                                                        <li class="activejobstotals-left">
                                                             <div class="card ">
                                                                <div class="card-header cardmargin" data-background-color="green">
                                                                    <h3 class="center">
                                                                        <!--no ajax
                                                                        <a target="_blank" href="employer-jobdetails.php?jobid=<?=$id?>&page=shortlisted" class="text-success h4weight"><?=$shortlisted?></a>
                                                                        -->
                                                                        <a href="#jobdetails" id="jobdetails" class="text-success h4weight" data-jobid="<?=$id?>" data-page="shortlisted"><?=$shortlisted?></a>
                                                                        
                                                                    </h3>
                                                                </div>
                                                                 <!--no ajax
                                                                 <a target="_blank" href="employer-jobdetails.php?jobid=<?=$id?>&page=shortlisted" class="text-success h4weight" >Shortlisted<br>Applicants</a>   
                                                                  -->
                                                                 <a href="#jobdetails" id="jobdetails" class="text-success h4weight" data-jobid="<?=$id?>" data-page="shortlisted">Shortlisted<br>Applicants</a>   
                                                               
                                                            </div>
                                                        </li>
                                                        <li class="activejobstotals-left">
                                                             <div class="card ">
                                                                <div class="card-header cardmargin" data-background-color="orange">
                                                                    <h3 class="center">
                                                                        <!-- no ajax
                                                                        <a target="_blank" href="employer-jobdetails.php?jobid=<?=$id?>&page=matched" class="text-success h4weight"><?=$matched?></a>
                                                                        -->
                                                                        <a href="#jobdetails" id="jobdetails" class="text-success h4weight" data-jobid="<?=$id?>" data-page="matched"><?=$matched?></a>
                                                                        
                                                                    </h3>
                                                                </div>
                                                                 <!-- no ajax
                                                                 <a target="_blank" href="employer-jobdetails.php?jobid=<?=$id?>&page=matched" class="text-warning h4weight">Matched<br>Resumes</a>
                                                                  -->
                                                                 <a href="#jobdetails" id="jobdetails" class="text-warning h4weight" data-jobid="<?=$id?>" data-page="matched">Matched<br>Resumes</a>
                                                               
                                                            </div>
                                                        </li>
                                                    </ul>  
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
            