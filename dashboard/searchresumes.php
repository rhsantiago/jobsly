<?php
if (session_status() == PHP_SESSION_NONE) {
        session_start();  
        if (!isset($database)){
           // include 'Database.php';
         }
}
if(isset($_SESSION['user'])){
   $user = $_SESSION['user'];
   $password = $_SESSION['password'];
   $userid = $_SESSION['userid'];
   $usertype = $_SESSION['usertype'];

   
     date_default_timezone_set('Asia/Manila');
     $logtimestamp = date("Y-m-d H:i:s");
     include "serverlogconfig.php";
     
include 'specialization.php';
$isjobseeker = '';
//if(isset($_GET['jobid'])){ $jobid = $_GET['jobid']; }


 //$database = new Database();
     
    $months = array('Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec');
    $positionlevels = array('Executive','Manager','Assistant Manager','Supervisor','5 Years+ Experienced Employee','1-4 Years Experienced Employee','1 Year Experienced Employee/Fresh Grad');

?>
<div class="row">
    <div class="col-md-12 center">
                    <div class="adstop">     <img  src="https://lh5.ggpht.com/NFYFP2H9CCP50vAQNLa7AtCj_mbbYmOzY978fZqd31oL5qOdvXgxU3KW8ek2VgvIOvTqWY0=w728" 
                                 alt="user">
                     </div>
     </div>
     </div>
     <div class="col-md-9">                    
                <div class="section  section-landing">
					<div class="features">
						<div class="row">
                            
                            <div class="col-md-12">
                                    <section class="blog-post">
                                    <div class="panel panel-default">
                                      <div class="panel-body jobad-bottomborder">
                                          <div><h4 class="text-info h4weight">Other Applicants</h4></div>
                                    <div class="table-responsive">
                                     <table class="table table-hover table-condensed">
                                            <thead>
                                                <tr>
                                                    <th>Latest Position</th>
                                                    <th class="col-md-2">Years of Experience</th>
                                                    <th class="col-md-2">Expected Salary</th>                                           
                                                    <th>Educational Attainment</th>
                                                    <th class="text-left">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                              
                                        <?php
                                            $database->query('Select distinct useraccounts.id, workexperience.position,additionalinformation.esalary,yexp, colmajor from workexperience, useraccounts,additionalinformation, educationandtraining where 
                                            workexperience.startdate = (select max(startdate) from workexperience where workexperience.userid=useraccounts.id) 
                                            and workexperience.userid=useraccounts.id 
                                            and additionalinformation.userid=useraccounts.id 
                                            and educationandtraining.userid=useraccounts.id 
                                            and usertype=2 order by esalary desc limit 0,10');
                                                             
                                            try{
                                                $rows2 = $database->resultset();
                                            }catch (PDOException $e) {
                                                $msg = $e->getTraceAsString()." ".$e->getMessage();
                                                $log->error($logtimestamp." - ".$_SESSION['user'] . " " .$msg);
                                                die("");
                                            }    
                                            foreach($rows2 as $row2){
                                                $applicantid = $row2['id']; 
                                                $position = $row2['position'];
                                                $esalary = $row2['esalary'];
                                                $yexp = $row2['yexp'];
                                                $colmajor = $row2['colmajor'];
                                                
                                                if($applicantid==$userid){
                                       ?>
                                   
                                                <tr class="text-info">
                                        <?php
                                                }else{
                                        ?>            
                                                <tr>
                                        <?php
                                                }
                                        ?>        
                                                    <td>
                                                        <ul class="list-inline">
                                                            <li>
                                                                <span class="h4weight"><?=$position?></span>
                                                            </li>           
                                                        </ul>
                                                    </td>
                                                    <td><?=$yexp?></td>
                                                    <td>Php <?=$esalary?></td>
                                                    <td><?=$colmajor?></td>
                                                    <td class="td-actions ">
                                                        <ul class="list-inline">
                                                            <li>
                                                                <!-- ajax enabled
                                                                <a href="#viewresumemodal" data-applicantid="<?=$applicantid?>" data-userid="<?=$userid?>" data-jobid="<?=$jobid?>" data-view="shortlist" data-toggle="modal" data-target="#viewresume-modal" rel="tooltip" id="applicantview" title="View Profile" >
                                                                    <i class="fa fa-user fa-2x text-info"></i>
                                                                </a>
                                                                -->
                                                                 <a href="viewinviteresume-newpage.php?applicantid=<?=$applicantid?>&userid=<?=$userid?>" target="_blank" rel="tooltip" id="applicantview" title="View Profile" >
                                                                    <i class="fa fa-user fa-2x text-info"></i>
                                                                </a>
                                                            </li>
                                                        
                                                        <li id='invited<?=$applicantid?>'>
                                                         <a href="#invitemodal" data-applicantid="<?=$applicantid?>" data-mode="insert" data-userid="<?=$userid?>" data-jobid="<?=$jobid?>" data-view="matched" data-toggle="modal" data-target="#invite-modal" rel="tooltip" id="inviteview" title="Invite to Apply" >
                                                            <i class="fa fa-envelope fa-2x text-warning"></i>
                                                          </a>
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
<?php
} else{
    include 'logout.php';
    
}
?>