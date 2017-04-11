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
if(isset($_POST['next'])){ $next = $_POST['next']; }
$months = array('Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec');
date_default_timezone_set('Asia/Manila');
$logtimestamp = date("Y-m-d H:i:s"); 
include "serverlogconfig.php";
 $database = new Database();   
}
                                            if(!empty($search)){
                                                $search='%'.$search.'%';
                                                $database->query('SELECT distinct jobads.id,jobads.userid,jobads.jobtitle,jobads.company, jobads.maxsalary, jobads.dateadded, companyinfo.companyname from jobads,companyinfo where jobads.jobtitle like :search and jobads.userid=companyinfo.userid and jobads.isactive=0 order by jobads.dateadded desc limit '.$next.',10');
                                                $database->bind(':search', $search);
                                            }else{
                                                $database->query('SELECT distinct jobads.id,jobads.userid,jobads.jobtitle,jobads.company, jobads.maxsalary, jobads.dateadded,jobads.isactive, companyinfo.companyname from jobads,companyinfo where jobads.userid=companyinfo.userid and jobads.isactive=0 order by jobads.dateadded desc limit '.$next.',10');   
                                            }
                                            try{
                                                $rows = $database->resultset();
                                                $row_cnt = $database->rowCount();
                                            }catch (PDOException $e) {
                                                $msg = $e->getTraceAsString()." ".$e->getMessage();
                                                $log->error($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
                                                die("");
                                            }
                                            $userid='';
                                            if($row_cnt > 0){
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
                                                        $isactive = $row['isactive'];
                                                        $inactive='';
                                                        if($isactive < 1){
                                                            $inactive=' inactive';
                                                        }
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
                                            }else{
                                               echo 'end';
                                            }