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
   $userid = $_SESSION['userid'];
$search="";
if(isset($_POST['search'])){ $search = $_POST['search']; }
if(isset($_POST['next'])){ $next = $_POST['next']; }
if(isset($_POST['jobid'])){ $jobid = $_POST['jobid']; }    
$months = array('Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec');
date_default_timezone_set('Asia/Manila');
$logtimestamp = date("Y-m-d H:i:s"); 
include "serverlogconfig.php";
 $database = new Database();   
}
                                            $database->query('SELECT distinct jobapplications.userid,fname,lname,jobapplications.esalary,jobapplications.isshortlisted,jobapplications.isnew, additionalinformation.specialization, (select distinct position from workexperience,jobapplications where workexperience.userid=jobapplications.userid order by startdate desc limit 0,1) as position from workexperience, personalinformation, jobapplications,additionalinformation,jobads, useraccounts where 
                                            jobads.id=:jobid 
                                            and jobapplications.isreject=0
                                            and jobapplications.jobid=jobads.id  
                                            and jobapplications.userid=personalinformation.userid 
                                            and jobapplications.userid=additionalinformation.userid
                                            and jobapplications.userid=workexperience.userid
                                            and jobapplications.userid=useraccounts.id
                                            and useraccounts.isverified = 1
                                            and jobads.userid=:userid order by jobapplications.id desc limit '.$next.',10');
                                            $database->bind(':jobid', $jobid);
                                            $database->bind(':userid', $userid);

                                            try{    
                                                $rows2 = $database->resultset();
                                                $row_cnt = $database->rowCount();
                                            }catch (PDOException $e) {
                                                $msg = $e->getTraceAsString()." ".$e->getMessage();
                                                $log->error($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
                                                die("");
                                            } 
                                            if($row_cnt > 0){
                                                    foreach($rows2 as $row2){
                                                        $applicantid = $row2['userid'];
                                                        $fname = $row2['fname'];
                                                        $lname = $row2['lname'];
                                                        $esalary = $row2['esalary'];
                                                        $position = $row2['position'];
                                                        $specialization = $row2['specialization'];
                                                        $isshortlisted = $row2['isshortlisted'];
                                                        $isnew = $row2['isnew'];
                                               ?>

                                                        <tr id="line<?=$applicantid?>">                                                   
                                                            <td>
                                                            <ul class="list-inline"> 
                                                                <li>
                                                                    <span class="h4weight"><?=$fname?> <?=$lname?></span>
                                                                </li>
                                                                <li id="newbadgediv<?=$applicantid?>">                                                   
                                                                    <?php
                                                                        if($isnew==1){
                                                                            echo "<span class='badge'>New</span>";
                                                                        }
                                                                    ?>
                                                                </li>
                                                            </ul>    
                                                            </td>
                                                            <td><?=$specarray[$specialization]?></td>       
                                                            <td><?=$position?></td>                                                   
                                                            <td>Php <?=$esalary?></td>
                                                            <td class="td-actions text-right">
                                                        <ul class="list-inline">
                                                                <li >
                                                                    <form method="post" action="viewresume-newpage.php" id="viewresume-form<?=$applicantid?>" name="viewresume-form<?=$applicantid?>" target="_blank">                    
                                                                <input type="hidden" id="mode" name="mode" value="view">
                                                                <input type="hidden" id="jobid" name="jobid" value="<?=$jobid?>">
                                                                <input type="hidden" id="applicantid" name="applicantid" value="<?=$applicantid?>">   
                                                            </form>
                                                            <a target="_blank" href="#resumeview" data-applicantid="<?=$applicantid?>" id="resumeview" title="View Profile" ><i class="fa fa-user fa-2x text-info"></i></a>
                                                                    <!-- ajax enabled
                                                                    <a href="#viewresumemodal" data-applicantid="<?=$applicantid?>" data-userid="<?=$userid?>" data-jobid="<?=$jobid?>" data-toggle="modal" data-target="#viewresume-modal" rel="tooltip" id="applicantview" title="View Profile" ><i class="fa fa-user fa-2x text-info"></i></a>
                                                                     -->   
                                                                </li>
                                                              <li id="slline<?=$applicantid?>" >   
                                                                    <?php
                                                                        if($isshortlisted==0){
                                                                    ?>      
                                                                    <button id="shortlistbutton" type="button" data-applicantid="<?=$applicantid?>" data-jobid="<?=$jobid?>" data-mode="add" rel="tooltip" title="Add to shortlist" class="btn btn-success btn-simple btn-xs"><i class="fa fa-plus fa-2x"></i></button>                                                          
                                                                    <?php
                                                                        }else{
                                                                    ?>        
                                                                         <button type='button' rel='tooltip' title='Already in shortlist' class='btn btn-success btn-simple btn-xs'><i class='fa fa-check fa-2x'></i></button>
                                                                    <?php
                                                                        }
                                                                    ?>
                                                                </li>
                                                               <li>
                                                                    <a href="#rejectappmodal" id="rejectbutton" type="button" data-applicantid="<?=$applicantid?>" data-jobid="<?=$jobid?>" data-toggle="modal" data-mode="reject" data-target="#rejectapp-modal" rel="tooltip" title="Reject" class="btn btn-danger btn-simple btn-xs"><i class="fa fa-times fa-2x"></i></a>

                                                                </li>
                                                                </ul>
                                                            </td>
                                                        </tr>
                                                    <?php                                               
                                                    } 
                                            }else{
                                               echo 'end';
                                            }
                                            ?>
