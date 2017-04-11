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
                                                $database->query('SELECT useraccounts.id,useraccounts.email, useraccounts.signupdate, useraccounts.isverified,companyinfo.companyname from useraccounts,companyinfo where useraccounts.id=companyinfo.userid and companyinfo.companyname like :search and usertype=1 order by signupdate desc limit '.$next.',10');
                                                $database->bind(':search', $search);
                                            }else{
                                                $database->query('SELECT useraccounts.id,email,companyinfo.companyname, signupdate,isverified from useraccounts,companyinfo where useraccounts.id=companyinfo.userid and usertype=1 order by signupdate desc limit '.$next.',10');   
                                            }
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
                                            }else{
                                               echo 'end';
                                            }