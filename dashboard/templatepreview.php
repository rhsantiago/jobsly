<?php
if (session_status() == PHP_SESSION_NONE) {
        session_start();
        if (!isset($database)){
            include 'Database.php';
            $database = new Database();
        }
}
include 'specialization.php';
if(isset($_POST['templateid'])){ $templateid= $_POST['templateid']; }
if(isset($_SESSION['user'])){
   $user = $_SESSION['user'];
   $password = $_SESSION['password'];
   $userid = $_SESSION['userid'];
    include "serverlogconfig.php";
    $database = new Database();
 
    $database->query('SELECT * from jobtemplates where userid = :userid and id = :templateid');
    $database->bind(':userid', $userid);
    $database->bind(':templateid', $templateid);
    try{
        $row = $database->single();
    }catch (PDOException $e) {
        $error = true;
        $msg = $e->getTraceAsString()." ".$e->getMessage();
        include "serverlog.php";
        die("");
    }     
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
    if($edate[1] >= 1 && $edate[2] >= 1 && $edate[0] >= 1){
        $endappdate = '';
    }else{
        $endappdate = $edate[1] .'/'.$edate[2].'/'.$edate[0];
    }
    $nvacancies = $row['nvacancies'];
    $teaser = $row['teaser'];
    $jobdesc = $row['jobdesc'];
    $city = $row['city'];
    $province = $row['province'];
    $country = $row['country'];
    $yrsexp = $row['yrsexp'];
    $mineduc = $row['mineduc'];
    $prefcourse = $row['prefcourse'];
    $languages = $row['languages'];
    $licenses = $row['licenses'];
    $wtravel = $row['wtravel'];    
    $wrelocate = $row['wrelocate'];   
    $dateadded = $row['dateadded'];
    $dadd = explode("-", $dateadded);
    $dateadded = $dadd[1] .'/'.$dadd[2].'/'.$dadd[0];  
           
    $mode = 'insert';
    $months = array('Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec');
    $positionlevels = array('Executive','Manager','Assistant Manager','Supervisor','5 Years+ Experienced Employee','1-4 Years Experienced Employee','1 Year Experienced Employee/Fresh Grad');
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
                             <h2 class="title">Job Templates / Preview</h2>
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
                                            <a href="#step-3-template" id="step-3-template" type="button" class="btn btn-default btn-circle" 
                                               <?php
                                                    if($templateid > 0){
                                                        echo " data-templateid='".$templateid."'";
                                                    }else{
                                                        echo" disabled='disabled'";
                                                    }
                                               ?>
                                               >3</a>
                                            <br>Job Skills
                                          </div>
                                            <div class="stepwizard-step">
                                            <a href="#step-4-template" id="step-4-template" type="button" class="btn btn-primary btn-circle" 
                                               <?php
                                                    if($templateid > 0){
                                                        echo " data-templateid='".$templateid."'";
                                                    }else{
                                                        echo" disabled='disabled'";
                                                    }
                                               ?>
                                               >4</a>
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
                                                <div class="col-md-6">
                                                         <a class="nodecor" href="#"><h2 class="text-info jobad-title"><?=$jobtitle?></h2></a>
                                                        <div class="companypos">
                                                            <h6 class="text-muted"><i><?=$company?></i></h6>
                                                        </div> 
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="companylogo pull-right"> 
                                                        <img src="img/champ.png" width="70" height="70" class="img-responsive">
                                                    </div>
                                                </div>
                                            </div>    
                                         
                                          <div class="row-fluid">
                                              <div class="col-md-12">
                                                  <?php
                                                    if(!empty($teaser)){
                                                  ?>      
                                                        <?=$teaser?>...<br><br>
                                                  <?php
                                                    }
                                            	  ?>
                                              </div>
                                                <div class="col-md-12">   
                                                    
                                                    <div class="collapse-group collapse" id="viewdetails">
                                                  <?=$jobdesc?>
                                                        
                                                    <div><b>Requirements</b></div>
                                                        <ul>
                                                            <?php
                                                            if($yrsexp > 0){
                                                            ?>    
                                                                <li><?=$yrsexp?> years work experience</li>
                                                            <?php
                                                            }
                                          
                                                            if(!empty($mineduc)){
                                                            ?>                                                            
                                                                <li><?=$mineduc?></li>
                                                            <?php
                                                            }
                                          
                                                            if(!empty($languages)){
                                                            ?>
                                                                <li><?=$languages?></li>
                                                            <?php
                                                            }
                                          
                                                            if(!empty($licenses)){
                                                            ?>
                                                                <li><?=$licenses?></li>
                                                            <?php
                                                            }
                                          
                                                            if($wtravel == 'on'){
                                                            ?>
                                                                <li>Willing to travel</li>
                                                            <?php
                                                            }
                                          
                                                             if($wrelocate == 'on'){
                                                            ?>
                                                                <li>Willing to relocate</li>
                                                            <?php
                                                            }
                                                            ?>
                                                            
                                                        </ul>
                                                        <p><b>Technical / Job-specific skills</b></p>
                                                        <ul>
                                                            <?php
                                                      
                                                                    $database->query('SELECT * FROM jobskillstemplate where templateid = :templateid');                                                   
                                                                    $database->bind(':templateid', $templateid);
                                                                    try{
                                                                        $rows = $database->resultset();
                                                                    }catch (PDOException $e) {
                                                                        $error = true;
                                                                        $msg = $e->getTraceAsString()." ".$e->getMessage();
                                                                        include "serverlog.php";
                                                                        die("");
                                                                    } 
                                                                    foreach($rows as $row){
                                                                        echo '<li>';
                                                                        echo $row['jobskill'];
                                                                        echo '</li>';
                                                                    }

                                                             ?>                                                              
                                                        </ul>
                                                        <p><b>Location: </b><?=$city?>, <?=$province?> <?=$country?></p>
                                                        <?php
                                                          if($sdate[1] >= 1 && $sdate[2] >= 1 && $sdate[0] >= 1){
                                                        ?> 
                                                        <p><b>Position start date: </b><?=$months[$sdate[1]-1]?>&nbsp;<?=$sdate[2]?>,&nbsp;<?=$sdate[0]?></p>
                                                        <?php
                                                          }
                                                          if($edate[1] >= 1 && $edate[2] >= 1 && $edate[0] >= 1){
                                                        ?>         
                                                        <p><b>Application deadline: </b><?=$months[$edate[1]-1]?>&nbsp;<?=$edate[2]?>,&nbsp;<?=$edate[0]?></p>
                                                        <?php
                                                          }
                                                        ?>    
                                                    </div>    
                                                </div>
                                            </div>
                                          
                                        </div>
                                          <div class="row-fluid">
                                                <div class="col-md-6">
                                                        <a class="btn btn-primary" data-toggle="collapse" data-target="#viewdetails">Read more</a>
                                                </div>
                                                <div class="col-md-6 actionicon">
                                                        <a class="blog-post-share " href="#" data-toggle="tooltip" data-placement="top" title="Apply now"><i class="material-icons" >assignment_turned_in</i></a>
                                                        <a class="blog-post-share " href="#" data-toggle="tooltip" data-placement="top" title="Save and Apply later"><i class="material-icons">favorite</i></a>
                                                        <a class="blog-post-share " href="#" data-toggle="tooltip" data-placement="top" title="Share"><i class="material-icons">share</i></a>
                                                </div>
                                          </div>      
                                          
                                              
                                         
                                      </div>
                                        
                                        <div class="skilltags">
                                            Skilltags: <span class="text-info">
                                            <?php
                                                      
                                                    $database->query('SELECT * FROM jobskillstemplate where templateid = :templateid');                                                   
                                                    $database->bind(':templateid', $templateid);
                                                    try{        
                                                        $rows = $database->resultset();
                                                    }catch (PDOException $e) {
                                                        $error = true;
                                                        $msg = $e->getTraceAsString()." ".$e->getMessage();
                                                        include "serverlog.php";
                                                        die("");
                                                    } 
                                                    foreach($rows as $row){
                                                        echo $row['jobskilltag'];
                                                        echo ' ';
                                                    }
                                                       
                                             ?>
                                            </span>
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

