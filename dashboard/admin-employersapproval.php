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

}

?>

    <div class="row">
    <div class="col-md-12 center">            
                    <div class="adstop">     <img  src="https://lh5.ggpht.com/NFYFP2H9CCP50vAQNLa7AtCj_mbbYmOzY978fZqd31oL5qOdvXgxU3KW8ek2VgvIOvTqWY0=w728" 
                                 alt="user">  
                     </div>    
                           
     </div>
   
    <div class="col-md-12">
                             <h2 class="title">Employers for Account Approval</h2>
       </div>
     </div>
    <div class="col-md-9">
                       
                <div class="section  section-landing">
					<div class="features">
						<div class="row">
                                                     
                            <div class="col-md-12">
                           <div class="alljobsdiv">
                          
                               <form method="post" id="shortlist-form" name="shortlist-form"> 
                                                             <input type="hidden" id="applicantid" name="applicantid" value="">
                                                             <input type="hidden" id="jobid" name="jobid" value="">
                                                             <input type="hidden" id="mode" name="mode" value="remove">   
                                                       </form> 
                               <section class="blog-post">
                                    <div class="panel panel-default">                                    
                                      <div class="panel-body jobad-bottomborder">
                                          <div><h4 class="text-primary h4weight">Employers</h4></div>
                                    <div class="table-responsive">      
                                     <table id="activeappstable" class="table table-hover table-condensed">
                                            <thead>
                                                <tr>
                                                    <th class="col-md-2">Company Name</th>
                                                    <th class="col-md-2 text-right">Email</th>                                                   
                                                    <th class="col-md-2 text-right">Signup Date</th>
                                                    <th class="text-right">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                              
                                        <?php
                                            $database->query('SELECT id,email,companyname, signupdate from useraccounts where usertype=1 and isverified = 0 order by signupdate');      
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
                                                $companyname = $row['companyname'];
                                                $signupdate= $row['signupdate'];
                                                $dadd = explode("-", $signupdate);
                                                $dateadded = $dadd[1] .'/'.$dadd[2].'/'.$dadd[0]; 
                                       ?>
                                   
                                                <tr id="line<?=$applicantid?>">                                                   
                                                    <td><span class="h4weight"><?=$companyname?></span></td>
                                                    <td class="text-right"><?=$email?></td>                      
                                                    <td class="text-right"><?=$months[$dadd[1]-1]?>&nbsp;<?=$dadd[2]?>,&nbsp;<?=$dadd[0]?></td>
                                                    <td class="td-actions text-right">
                                                <ul class="list-inline">
                                                        <li >
                                                            <a href="#showemployermodal" data-employerid="<?=$id?>" data-mode="approve" data-toggle="modal" data-target="#admin-showemployer-modal" rel="tooltip" id="showemployer" title="View Employer" ><i class="fa fa-briefcase text-info"></i></a>
                                                        </li>
                                                      
                                                        </ul>
                                                    </td>
                                                </tr>
                                            <?php                                               
                                            }
                                            ?>
                                                
                                            </tbody>
                                        </table>
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