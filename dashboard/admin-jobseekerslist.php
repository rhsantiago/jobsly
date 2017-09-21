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
   $adminid = $_SESSION['adminid'];
$search="";
if(isset($_POST['search'])){ $search = $_POST['search']; }

$months = array('Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec');
date_default_timezone_set('Asia/Manila');
$logtimestamp = date("Y-m-d H:i:s"); 
include "serverlogconfig.php";
 $database = new Database();   
 $next=10;    
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
                             <h2 class="title">Jobseekers</h2>
       </div>
     </div>
    <div class="col-md-9">
                       
                <div class="section  section-landing">
					<div class="features">
						<div class="row">                                                     
                            <div class="col-md-12">
                             <section class="blog-post">
                              <div class="panel panel-default" >
                                  <form method="post" action="admin-jobseekers.php" id="jobseekersearch-form" name="jobseekersearch-form"> 
                                      <input type="hidden" id="adminid" name="adminid" value="<?=$adminid?>">      
                                   <div class="panel-body" >
                                       <div class="col-md-9">

                                         <div id="searchdiv" class="form-group label-floating" >
                                              <label class="control-label">Search Jobseekers</label>

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
                                    <form method="post" id="jobseekeractivation-form" name="jobseekeractivation-form">
                                        <input type='hidden' id='action' name='action' value=''>
                                        <input type='hidden' id='applicantid' name='applicantid' value=''>
                                     </form>     
                               <section class="blog-post">
                                    <div class="panel panel-default">                                    
                                      <div class="panel-body jobad-bottomborder">
                                          <div><h4 class="text-primary h4weight">Jobseekers</h4></div>
                                    <div class="table-responsive">      
                                     <table id="jobseekerstable" class="table table-hover table-condensed">
                                            <thead>
                                                <tr>
                                                    <th class="col-md-2">Name</th>
                                                    <th class="col-md-2 text-right">Email</th>                                                   
                                                    <th class="col-md-2 text-right">Signup Date</th>
                                                    <th class="col-md-2 text-left">Status</th>
                                                    <th class="text-left">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody id="jobseekerstablebody">
                              
                                        <?php
                                            $id='';
                                            $signupdate='';
                                            if(!empty($search)){                                       
                                                $search='%'.$search.'%';
                                                $database->query('SELECT useraccounts.id,fname, lname, email,signupdate, isverified from personalinformation, useraccounts where personalinformation.userid=useraccounts.id and (fname like :search or lname like :search or email like :search) order by signupdate desc limit 0,10');
                                                $database->bind(':search', $search);
                                            }else{
                                                $database->query('SELECT useraccounts.id,fname, lname, email,signupdate, isverified from personalinformation, useraccounts where personalinformation.userid=useraccounts.id  order by signupdate desc limit 0,10');                                            
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
                                                $email = $row['email'];
                                                $fname= $row['fname'];
                                                $lname= $row['lname'];
                                                $signupdate= $row['signupdate'];
                                                $isverified= $row['isverified'];
                                                $dadd = explode("-", $signupdate);
                                                $dateadded = $dadd[1] .'/'.$dadd[2].'/'.$dadd[0]; 
                                       ?>
                                   
                                                <tr id="line<?=$id?>">                                                   
                                                    <td><span class="h4weight"><?=$fname?> <?=$lname?></span></td>
                                                    <td class="text-right"><?=$email?></td>                      
                                                    <td class="text-right"><?=$months[$dadd[1]-1]?>&nbsp;<?=$dadd[2]?>,&nbsp;<?=$dadd[0]?></td>
                                                    <td id="statusline<?=$id?>" class="text-left">
                                                    <?php
                                                        if($isverified==1){
                                                    ?>
                                                            <span class="text-success h4weight">Active</span>
                                                    <?php
                                                        
                                                        }else{
                                                    ?>    
                                                            <span class="text-danger h4weight">Inactive</span>
                                                    <?php    
                                                        }
                                                    ?>
                                                    </td>
                                                    <td class="td-actions text-left">
                                                <ul class="list-inline">
                                                        <li >
                                                            <a href="#viewjobseekermodal" data-applicantid="<?=$id?>" data-mode="view" data-toggle="modal" data-target="#admin-viewresumemodal" rel="tooltip" id="viewjobseeker" title="View Jobseeker" ><i class="fa fa-user fa-2x text-info"></i></a>
                                                         </li> 
                                                        <li id="btnline<?=$id?>">
                                                            
                                                                       
                                                                                                <?php
                                                                                                if($isverified==1){
                                                                                               echo"<button class='btn btn-primary btn-xs' name='activatebtn' id='activatebtn' type='submit' data-applicantid='$id' data-action='deactivate'>Deactivate</button>";
                                                                                                }else if($isverified==0){   
                                                                                                echo"<button class='btn btn-primary btn-xs' name='activatebtn' id='activatebtn' type='submit' data-applicantid='$id' data-action='activate'>Activate</button>";    
                                                                                                }
                                                                                                ?>
                                                                            
                                                                    
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
                                                <a id="jobseekersloadmore" name="jobseekersloadmore" class="btn btn-primary" data-search="<?=$search?>" data-next="<?=$next?>">Load More</a>
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