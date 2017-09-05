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
   $search="";
   if(isset($_POST['search'])){ $search = $_POST['search']; } 
   $next=10; 
}

?>

    <div class="row">
    <div class="col-md-12 center">            
                    <div class="adstop">     <img  src="https://lh5.ggpht.com/NFYFP2H9CCP50vAQNLa7AtCj_mbbYmOzY978fZqd31oL5qOdvXgxU3KW8ek2VgvIOvTqWY0=w728" 
                                 alt="user">  
                     </div>    
                           
     </div>
   
    <div class="col-md-12">
                             <h2 class="title">Active Job Ads List</h2>
       </div>
     </div>
    <div class="col-md-9">
                       
                <div class="section  section-landing">
					<div class="features">
						<div class="row">
                                                     
                            <div class="col-md-12">
                            
              <section class="blog-post">
                  <div class="panel panel-default" >
                      <form method="post" id="jobadssearch-form" name="jobadssearch-form"> 
                          <input type="hidden" id="adminid" name="adminid" value="<?=$adminid?>">      
                       <div class="panel-body" >
                           <div class="col-md-9">
                               
                             <div id="searchdiv" class="form-group label-floating" >
                                  <label class="control-label">Search Job Ads</label>
                                 
                                  <input type="text" id="search" class="form-control searchform" value="<?=$search?>">  
                             </div>
                            </div>  
                             <div class="col-md-3">
                               <button class="btn btn-primary btn-md" type="submit">Search</button>
                           </div>
                             </div>
                            </form>
                  </div>
                </section>   
                                
                                
                           <div class="alljobsdiv">
                          
                               <section class="blog-post">
                                    <div class="panel panel-default">                                    
                                      <div class="panel-body jobad-bottomborder">
                                          <div><h4 class="text-primary h4weight">Active Job Ads</h4></div>
                                    <div class="table-responsive">      
                                     <table id="activeappstable" class="table table-hover table-condensed">
                                            <thead>
                                                <tr>
                                                    <th class="col-md-2">Position</th>
                                                    <th class="col-md-2 text-right">Company</th>                                                   
                                                    <th class="col-md-2 text-right">Posted By</th>
                                                    <th class="col-md-2 text-right">Max Salary</th>
                                                    <th class="col-md-2 text-right">Date Added</th>
                                                    <th class="text-right">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody id="activejobadstablebody">
                              
                                        <?php
                                            if(!empty($search)){
                                                $search='%'.$search.'%';
                                                $database->query('SELECT distinct jobads.id,jobads.userid,jobads.jobtitle,jobads.company, jobads.maxsalary, jobads.dateadded, companyinfo.companyname from jobads,companyinfo where jobads.jobtitle like :search and jobads.userid=companyinfo.userid and jobads.isactive=1 order by jobads.dateadded desc limit 0,10');
                                                $database->bind(':search', $search);
                                            }else{
                                                $database->query('SELECT distinct jobads.id,jobads.userid,jobads.jobtitle,jobads.company, jobads.maxsalary, jobads.dateadded,jobads.isactive, companyinfo.companyname from jobads,companyinfo where jobads.userid=companyinfo.userid and jobads.isactive=1 order by jobads.dateadded desc limit 0,10');   
                                            }
                                            try{
                                                $rows = $database->resultset();
                                            }catch (PDOException $e) {
                                                $msg = $e->getTraceAsString()." ".$e->getMessage();
                                                $log->error($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
                                                die("");
                                            }
                                            $userid='';
                                            foreach($rows as $row){
                                                $id = $row['id'];
                                                $userid = $row['userid'];
                                                $jobtitle = $row['jobtitle'];
                                                $companyname = $row['companyname'];
                                                $company= $row['company'];
                                                $maxsalary= $row['maxsalary'];
                                                $companyname= $row['companyname'];   
                                                $dateadded= $row['dateadded']; 
                                                $dadd = explode("-", $dateadded);
                                                $dateadded = $dadd[1] .'/'.$dadd[2].'/'.$dadd[0];
                                       ?>
                                   
                                                <tr id="line<?=$id?>">                                                   
                                                    <td><span class="h4weight"><?=$jobtitle?></span></td>
                                                    <td class="text-right"><?=$company?></td>        
                                                    <td class="text-right"><?=$companyname?></td> 
                                                    <td class="text-right"><?=$maxsalary?></td>
                                                    <td class="text-right"><?=$months[$dadd[1]-1]?>&nbsp;<?=$dadd[2]?>,&nbsp;<?=$dadd[0]?></td>
                                                    
                                                    <td class="td-actions text-right">
                                                <ul class="list-inline">
                                                        <li >
                                                            <!--
                                                            <a href="#showjobmodal" data-jobid="<?=$id?>" data-mode="view" data-toggle="modal" data-target="#admin-showjob-modal" rel="tooltip" id="showjob" title="View Job Ad" ><i class="fa fa-briefcase fa-2x text-info"></i></a>&nbsp;
                                                            -->
                                                            <a target="_blank" href="admin-jobads.php?ajax=jdtls&employerid=<?=$userid?>&jobid=<?=$id?>"  rel="tooltip" id="jobdetails" title="View Job Ad Details" ><i class="fa fa-external-link-square fa-2x text-warning" ></i></a>
                                                        </li>
                                                      
                                                        </ul>
                                                    </td>
                                                </tr>
                                            <?php                                               
                                            }
                                            ?>
                                                
                                            </tbody>
                                        </table>
                                        <div class="col-md-12">                                
                                             <div id="endofsearch" name="endofsearch" class="alert alert-warning">
                                               
                                                  <div class="alert-icon">
                                                    <i class="material-icons">check</i>
                                                  </div>
                                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true"><i class="material-icons">clear</i></span>
                                                  </button>
                                                  <b>Alert: </b> There doesn't seem to be anything here ¯\_(ツ)_/¯
                                                                 
                                               
                                            </div>
                                   
                                        </div>
                                        <div class="col-md-12 center">                                           
                                                <a id="activejobadsloadmore" name="activejobadsloadmore" class="btn btn-primary" data-search="<?=$search?>" data-next="<?=$next?>">Load More</a>
                                        </div>
                                      </div>    
                                        </div>  
                                    </div>
                                  </section>
                            
                                </div> 
                                
                                
                                
                            </div>  
                                     
		                     
		                </div>
					</div>
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
<script>
jQuery(document).ready(function ($) {
  $('#resume-main-body #endofsearch').hide();
 
    
});       
</script>