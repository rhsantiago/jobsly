<div class="col-md-3"> <!--left-->
                       
                <div class="section  section-landing">
	                 

					<div class="features">
                        
                        <div class="row">                  
                         <div class="jobs">
		                     <div class="col-md-12">
                                  <?php
                                $database->query('SELECT * from jobads order by dateadded desc');
                               
                                $rows = $database->resultset();
                                foreach($rows as $row){
                                    $jobid = $row['id'];
                                    $jobtitle = $row['jobtitle'];
                                    $specialization = $row['specialization'];
                                    $plevel = $row['plevel'];
                                    $jobtype = $row['jobtype'];
                                    $jobdesc = $row['jobdesc'];
                                    $msalary = $row['msalary'];
                                    $maxsalary = $row['maxsalary'];
                                    $startappdate = $row['startappdate'];
                                    $sdate = explode("-", $startappdate);
                                    $startappdate = $sdate[1] .'/'.$sdate[2].'/'.$sdate[0];
                                    $endappdate = $row['endappdate'];
                                    $edate = explode("-", $endappdate);
                                    $endappdate = $edate[1] .'/'.$edate[2].'/'.$edate[0];  
                                    
                                    $teaser = strip_tags($jobdesc);
                                    $teaser = substr($teaser, 0, 200);
                                    $teaser = strip_tags($teaser);
                                    
                                    $city = $row['city'];
                                    $province = $row['province'];
                                    $country = $row['country'];
                                    $yrsexp = $row['yrsexp'];
                                    $mineduc = $row['mineduc'];
                                    $prefcourse = $row['prefcourse'];
                                    $languages = $row['languages'];
                                    $licenses = $row['licenses'];
                                    $wtravel = $row['wtravel'];
                                    if($wtravel=='on'){
                                       $wtravel = 'checked';
                                    }
                                    $wrelocate = $row['wrelocate'];
                                    if($wrelocate=='on'){
                                       $wrelocate = 'checked';
                                    }
                                    
                                    $dateadded = $row['dateadded'];
                                    $dadd = explode("-", $dateadded);
                                    $dateadded = $dadd[1] .'/'.$dadd[2].'/'.$dadd[0];         

                               
                                
                         ?>
                                
                                <section class="blog-post">
                                    <div class="panel panel-default">
                                     <img src="img/fjord.jpg" class="img-responsive">
                                      <div class="panel-body jobad-bottomborder">
                                          <div class="jobad-meta jobad-bottomborder">
                                      <p class="blog-post-date pull-right text-muted"><?=$months[$dadd[1]-1]?>&nbsp;<?=$dadd[2]?>,&nbsp;<?=$dadd[0]?></p>
                                          <ul  class="list-inline ">
                                                                                           
                                                                                            <li>
                                                                                                <h6 id="vertical-align" class="text-muted jobadheader">
                                                                                                   <i class="material-icons text-info jobadheadericon">domain</i> &nbsp;<?=$specialization?>
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
                                                <div class="col-md-9">
                                                         <a class="nodecor" href="#"><h2 class="text-info jobcardtitle"><?=$jobtitle?></h2></a>
                                                        <div class="companypos">
                                                            <h6 class="text-muted jobcardcompany"><i>CHAMP Cargosystems Phils</i></h6>
                                                        </div> 
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="companylogo"> 
                                                        <img src="img/champ.png" width="70" height="70" class="img-responsive">
                                                    </div>
                                                </div>
                                            </div>    
                                         
                                          <div class="row-fluid">
                                                 <div class="col-md-12">  
                                                     <span class="jobcarddesc"><?=$teaser?>...</span><br>
                                                 </div>
                                                <div class="col-md-12">   
                                               
                                                    <div class="collapse-group collapse" id="viewdetails<?=$jobid?>">
                                                        <span class="jobcarddesc"><?=$jobdesc?></span>
                                                        
                                                    <div class="jobcardothers"><b>Requirements</b></div>
                                                        <ul>
                                                            <?php
                                                            if($yrsexp > 0){
                                                            ?>    
                                                                <li><span class="jobcardothers"><?=$yrsexp?> years work experience</span></li>
                                                            <?php
                                                            }
                                          
                                                            if(!empty($mineduc)){
                                                            ?>                                                            
                                                            <li><span class="jobcardothers"><?=$mineduc?></span></li>
                                                            <?php
                                                            }
                                          
                                                            if(!empty($languages)){
                                                            ?>
                                                                <li><span class="jobcardothers"><?=$languages?></span></li>
                                                            <?php
                                                            }
                                          
                                                            if(!empty($licenses)){
                                                            ?>
                                                                <li><span class="jobcardothers"><?=$licenses?></span></li>
                                                            <?php
                                                            }
                                          
                                                            if($wtravel == 'on'){
                                                            ?>
                                                                <li><span class="jobcardothers">Willing to travel</span></li>
                                                            <?php
                                                            }
                                          
                                                             if($wrelocate == 'on'){
                                                            ?>
                                                                <li><span class="jobcardothers">Willing to relocate</span></li>
                                                            <?php
                                                            }
                                                            ?>
                                                            
                                                        </ul>
                                                        <p class="jobcardothers"><b>Position Level: </b><?=$positionlevels[$plevel-1]?></p>
                                                        <p class="jobcardothers"><b>Technical / Job-specific skills</b></p>
                                                        <ul>
                                                            <?php
                                                      
                                                                    $database->query('SELECT * FROM jobskills where jobid = :jobid');                                                   
                                                                    $database->bind(':jobid', $jobid);
                                                                    $rows = $database->resultset();
                                                                           // echo $row['name'];
                                                                    foreach($rows as $row){
                                                                        echo "<li><span class='jobcardothers'>";
                                                                        echo $row['jobskill'];
                                                                        echo "</span></li>";
                                                                    }

                                                             ?>                                                              
                                                        </ul>
                                                        <p class="jobcardothers"><b>Location: </b><?=$city?>, <?=$province?> <?=$country?></p>
                                                        <p class="jobcardothers"><b>Position start date: </b><?=$months[$sdate[1]-1]?>&nbsp;<?=$sdate[2]?>,&nbsp;<?=$sdate[0]?></p>
                                                        <p class="jobcardothers"><b>Application deadline: </b><?=$months[$edate[1]-1]?>&nbsp;<?=$edate[2]?>,&nbsp;<?=$edate[0]?></p>     
                                                    </div>    
                                                </div>
                                            </div>
                                          
                                        </div>
                                          <div class="row-fluid">
                                                <div class="col-md-6">
                                                    <span class="jobcardreadmorelink"><a class="btn btn-primary jobcardreadmore" data-toggle="collapse" data-target="#viewdetails<?=$jobid?>">Read more</a></span>
                                                </div>
                                                <div class="col-md-6 actionicon">
                                                    <span class="jobcardbuttons"><a class="blog-post-share " href="#" data-toggle="tooltip" data-placement="top" title="Apply now"><i class="material-icons" >assignment_turned_in</i></a></span>
                                                    <span class="jobcardbuttons"><a class="blog-post-share " href="#" data-toggle="tooltip" data-placement="top" title="Save and Apply later"><i class="material-icons">favorite</i></a></span>
                                                    <span class="jobcardbuttons"><a class="blog-post-share " href="#" data-toggle="tooltip" data-placement="top" title="Share"><i class="material-icons">share</i></a></span>
                                                </div>
                                          </div>      
                                          
                                              
                                         
                                      </div>
                                        
                                        <div class="skilltags jobcardothers">
                                            Skilltags: <span class="text-info jobcardothers">
                                            <?php
                                                      
                                                    $database->query('SELECT * FROM jobskills where jobid = :jobid');                                                   
                                                    $database->bind(':jobid', $jobid);
                                                    $rows = $database->resultset();
                                                           // echo $row['name'];
                                                    foreach($rows as $row){
                                                        echo $row['jobskilltag'];
                                                        echo ' ';
                                                    }
                                                       
                                             ?>   
                                            
                                            </span>
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
                  
    </div><!--left-->