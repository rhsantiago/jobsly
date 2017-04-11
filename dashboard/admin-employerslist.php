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
    
   include "serverlogconfig.php";
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
                             <h2 class="title">Employer List</h2>
       </div>
     </div>
    <div class="col-md-9">
                       
                <div class="section  section-landing">
					<div class="features">
						<div class="row">
                                                     
                            <div class="col-md-12">
                            
              <section class="blog-post">
                  <div class="panel panel-default" >
                      <form method="post" id="employersearch-form" name="employersearch-form"> 
                          <input type="hidden" id="adminid" name="adminid" value="<?=$adminid?>">      
                       <div class="panel-body" >
                           <div class="col-md-9">
                               
                             <div id="searchdiv" class="form-group label-floating" >
                                  <label class="control-label">Search Employers</label>
                                 
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
                                          <div><h4 class="text-primary h4weight">Employers</h4></div>
                                    <div class="table-responsive">      
                                     <table id="activeappstable" class="table table-hover table-condensed">
                                            <thead>
                                                <tr>
                                                    <th class="col-md-2">Company Name</th>
                                                    <th class="col-md-2 text-right">Email</th>                                                   
                                                    <th class="col-md-2 text-right">Signup Date</th>
                                                    <th class="col-md-2 text-right">Status</th>
                                                    <th class="text-right">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody id="employerstablebody">
                              
                                        <?php
                                            if(!empty($search)){
                                                $search='%'.$search.'%';
                                                $database->query('SELECT useraccounts.id,useraccounts.email, useraccounts.signupdate, useraccounts.isverified,companyinfo.companyname from useraccounts,companyinfo where useraccounts.id=companyinfo.userid and companyinfo.companyname like :search and usertype=1 order by signupdate desc limit 0,10');
                                                $database->bind(':search', $search);
                                            }else{
                                                $database->query('SELECT useraccounts.id,email,companyinfo.companyname, signupdate,isverified from useraccounts,companyinfo where useraccounts.id=companyinfo.userid and usertype=1 order by signupdate desc limit 0,10');   
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
                                                $companyname = $row['companyname'];
                                                $signupdate= $row['signupdate'];
                                                $dadd = explode("-", $signupdate);
                                                $dateadded = $dadd[1] .'/'.$dadd[2].'/'.$dadd[0]; 
                                                $isverified= $row['isverified'];
                                                if($isverified==1){
                                                    $isverified="<spam class='text-success h4weight'>Active</span>";
                                                }else{
                                                    $isverified="<spam class='text-danger h4weight'>Inactive</span>";
                                                }
                                       ?>
                                   
                                                <tr id="line<?=$id?>">                                                   
                                                    <td><span class="h4weight"><?=$companyname?></span></td>
                                                    <td class="text-right"><?=$email?></td>
                                                    <td class="text-right"><?=$months[$dadd[1]-1]?>&nbsp;<?=$dadd[2]?>,&nbsp;<?=$dadd[0]?></td>
                                                    <td class="text-right"><?=$isverified?></td>
                                                    <td class="td-actions text-right">
                                                <ul class="list-inline">
                                                        <li >
                                                            <a target="_blank" href="admin-employers.php?ajax=emppage&employerid=<?=$id?>" rel="tooltip" id="showemployer" title="View Employer" ><i class="fa fa-building fa-2x text-info"></i></a>
                                                            <!-- ajax anabled
                                                            <a href="#showemployermodal" data-employerid="<?=$id?>" data-mode="approve" data-toggle="modal" data-target="#admin-showemployer-modal" rel="tooltip" id="showemployer" title="View Employer" ><i class="fa fa-building fa-2x text-info"></i></a>
                                                            -->
                                                            &nbsp;&nbsp;
                                                            <a target="_blank" href="admin-employers.php?ajax=empjobads&employerid=<?=$id?>"  rel="tooltip" id="showemployer" title="View Job Ads by this Employer" ><i class="fa fa-external-link-square fa-2x text-warning"></i></a>
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
                                                <a id="employersloadmore" name="employersloadmore" class="btn btn-primary" data-search="<?=$search?>" data-next="<?=$next?>">Load More</a>
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
  $('#resume-main-body #endofsearch').hide();
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