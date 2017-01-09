<?php


    if (session_status() == PHP_SESSION_NONE) {
        session_start();
         if (!isset($database)){
            include 'Database.php';
         }
    }
if(isset($_POST['jobid'])){ $jobid = $_POST['jobid']; } 
if(isset($_SESSION['user'])){
   $user = $_SESSION['user'];
   $password = $_SESSION['password'];
   $userid = $_SESSION['userid'];
    
  
    $database = new Database();

    $months = array('January','February','March','April','May','June','July','August','September','October','November','December');
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
                             <h2 class="title">Job Details</h2>
       </div>
     </div>
    <div class="col-md-9">
                       
                <div class="section  section-landing">
	                 

					<div class="features">
						<div class="row">
                                                     
                            <div class="col-md-12">
                           <div class="alljobsdiv">
                          <?php
                                $database->query('SELECT * from jobads where id = :jobid and isactive=1 order by dateadded desc');
                                $database->bind(':jobid', $jobid);   
                                
                                $row = $database->single();
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
                               
                                     $database->query('select (select count(id) from jobapplications where jobid=:jobid) as aapps,(select count(id) from jobapplications where jobid=:jobid and isnew=1) as napps from jobapplications');
                                     $database->bind(':jobid', $id);   

                                     $row = $database->single();       
                                     $aapps = $row['aapps'];
                                     $napps = $row['napps'];
                                    
                         ?>
                                <form method="post" id="jobdetails" name="jobdetails">                    
                                    <input type="hidden" id="jobid" name="jobid" value="<?=$id?>">
                                </form>
                                <section class="blog-post">
                                    <div class="panel panel-default">
                                    
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
                                                <div class="col-md-6 jobad-titletopmargin">
                                                    
                                                         <a class="nodecor" href="#"><h2 class="text-info jobad-title"><?=$jobtitle?></h2></a>
                                                        <div class="companypos">
                                                            <h6 class="text-muted"><i><?=$company?></i></h6>
                                                        </div> 
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="companylogo"  align='right'> 
                                                        <img src="img/champ.png" width="70" height="70" class="img-responsive">
                                                    </div>
                                                </div>
                                            </div>
                                              
                                            </div>                                  
                                       
                                      </div>
                                        
                                        
                                    </div>
                                  </section>
                             
                                </div> 
                                
                                
                                
                            </div>  
                        
                          <!--    <div class="col-lg-3 col-md-6 col-sm-6"> -->
                            <div class="row-fluid">
                            <div class="col-lg-3 col-md-3"> 
							<div class="card card-stats ">
								<div class="card-header cardmargin" data-background-color="purple">
                                    <h3 class="center"><?=$aapps?></h3>
								</div>
								<div class="card-content">
									<p class="category">Active<br>Applications</p>								
								</div>
								<div class="card-footer">
									
								</div>
							</div>
                                  
						</div>
                            <div class="col-lg-3 col-md-3"> 
							<div class="card card-stats ">
								<div class="card-header cardmargin" data-background-color="orange">
                                    <h3 class="center">1164</h3>
								</div>
								<div class="card-content">
									<p class="category">Shortlisted</p>								
								</div>
								<div class="card-footer">
									
								</div>
							</div>
                                  
						</div>
                                <div class="col-lg-3 col-md-3"> 
							<div class="card card-stats ">
								<div class="card-header cardmargin" data-background-color="blue">
                                    <h3 class="center"><?=$napps?></h3>
								</div>
								<div class="card-content">
									<p class="category">New<br>Applications</p>								
								</div>
								<div class="card-footer">
									
								</div>
							</div>
                                  
						</div>
                                <div class="col-lg-3 col-md-3"> 
							<div class="card card-stats ">
								<div class="card-header cardmargin" data-background-color="blue">
                                    <h3 class="center">4126</h3>
								</div>
								<div class="card-content">
									<p class="category">New<br>Applications</p>								
								</div>
								<div class="card-footer">
									
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
    /*
jquery(document).ready(function ($) {
  $('#successdivdeljob').hide();
    
    $('#pinfo-form #fname').parsley().on('field:error', function() {
           $('#pinfo-form #fnamediv').addClass('has-error');
           $('#pinfo-form #fnamediv').append("<span class='material-icons form-control-feedback'>clear</span>");   
    });    
    $('#pinfo-form #fname').parsley().on('field:success', function() {
            $('#pinfo-form #fnamediv').addClass('has-success');
            $('#pinfo-form #fnamediv').find('span').remove()
            $('#pinfo-form #fnamediv').append("<span class='material-icons form-control-feedback'>done</span>");   
    });
    
   
    
  
    
});       */  
</script>