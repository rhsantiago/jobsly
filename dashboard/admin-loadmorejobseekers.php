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
<!--
                                            <div class='loadmoreform'><form method='post' id='jobseekersloadmore-form' name='jobseekersloadmore-form'><input type='hidden' id='next' name='next' value='<?=$next?>'></form></div>
-->