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
                                                $id='';
                                                $signupdate='';
                                            $database->query('SELECT useraccounts.id,fname, lname, email,signupdate from personalinformation, useraccounts where personalinformation.userid=useraccounts.id  order by signupdate desc limit '.$next.',10');      
                                            try{
                                                $rows = $database->resultset();
                                                $row_cnt = $database->rowCount();
                                            }catch (PDOException $e) {
                                                $msg = $e->getTraceAsString()." ".$e->getMessage();
                                                $log->error($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
                                                die("");
                                            }
                                            if($row_cnt > 0){
                                                    foreach($rows as $row){
                                                        $id = $row['id'];
                                                        $email = $row['email'];
                                                        $fname= $row['fname'];
                                                        $lname= $row['lname'];
                                                        $signupdate= $row['signupdate'];
                                                        $dadd = explode("-", $signupdate);
                                                        $dateadded = $dadd[1] .'/'.$dadd[2].'/'.$dadd[0]; 
                                               ?>

                                                        <tr id="line<?=$id?>">                                                   
                                                            <td><span class="h4weight"><?=$fname?> <?=$lname?></span></td>
                                                            <td class="text-right"><?=$email?></td>                      
                                                            <td class="text-right"><?=$months[$dadd[1]-1]?>&nbsp;<?=$dadd[2]?>,&nbsp;<?=$dadd[0]?></td>
                                                            <td class="td-actions text-right">
                                                        <ul class="list-inline">
                                                                <li >
                                                                    <a href="#viewjobseekermodal" data-applicantid="<?=$id?>" data-mode="view" data-toggle="modal" data-target="#admin-viewresumemodal" rel="tooltip" id="viewjobseeker" title="View Jobseeker" ><i class="fa fa-user fa-2x text-info"></i></a>
                                                                </li>

                                                                </ul>
                                                            </td>
                                                        </tr>
                                                    <?php                                               
                                                    } 
                                            }else{
                                               echo 'end';
                                            }