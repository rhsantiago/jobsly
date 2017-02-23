<?php
if (session_status() == PHP_SESSION_NONE) {
        session_start();   
}
if(isset($_SESSION['user'])){
if(isset($_POST['id'])){ $id = $_POST['id']; }
if(isset($_POST['mode'])){ $mode = $_POST['mode']; }
if(isset($_POST['userid'])){ $userid = $_POST['userid']; }
if(isset($_POST['userid'])){ $userid = $_POST['userid']; }
date_default_timezone_set('Asia/Manila');
$logtimestamp = date("Y-m-d H:i:s");
include "serverlogconfig.php";
include 'Database.php';
$database = new Database();
}else{
    header("Location: logout.php");
}

    if(isset($_POST['question'])){ $question = $_POST['question']; }
 
    if($mode=='insert'){
         $database->query('INSERT INTO jobessays (id, userid, question) VALUES (NULL, :userid,:question)');
         $database->bind(':question', $question);
    }
    if($mode=='update'){
         $database->query('UPDATE jobessays SET question = :question WHERE jobessays.id = :id and userid = :userid');
         $database->bind(':id', $id);
         $database->bind(':question', $question);
    }
    if($mode=='del'){
         $database->query('Delete from jobessays where jobessays.id = :id and userid = :userid');
         $database->bind(':id', $id);
    }
         
    $database->bind(':userid', $userid);     
    try{
        $database->execute();
        $msg = "jobessay ".$mode;      
        $log->info($logtimestamp." - ".$_SESSION['user'] . " " .$msg);
    }catch (PDOException $e) {
        $msg = $e->getTraceAsString()." ".$e->getMessage();
        $log->error($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
        die("");
    } 
                                          $database->query('SELECT id,question FROM jobessays where userid = :userid');
                                          $database->bind(':userid', $userid);
                                          try{  
                                              $rows = $database->resultset();
                                          }catch (PDOException $e) {
                                                $msg = $e->getTraceAsString()." ".$e->getMessage();
                                                $log->error($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
                                                die("");
                                          }     
                                          foreach($rows as $row){
                                               $id=$row['id'];
                                               $question=$row['question'];
?> 
                                        <div class="card essaymargintop">                                           
                                             <div class="content">
                                                    <div class="tab-content">
                                                        <div class="tab-pane active" id="profile">                                                            
                                                            <div class="row">
                                                      
                                                               <div class="col-md-12"> 
                                                                        <ul class="list-inline">
                                                                                          
                                                                                            <li class="editfloatright">
                                                                                                <a href='#essaymodal' id="editessay" title="Edit" data-mode="update" data-essayid="<?=$row['id']?>" data-userid="<?=$userid?>" data-toggle="modal" data-target="#jobessay-modal"><i class="material-icons">edit</i></a>
                                                                                                <a href='#essaymodal' id="delessay" title="Delete" data-mode="del" data-essayid="<?=$row['id']?>" data-userid="<?=$userid?>" data-toggle="modal" data-target="#jobessay-modal"><i class="material-icons">delete</i></a>
                                                                                            </li>
                                                                                        </ul>
                                                                 <?=$question?>

                                                                </div>
                                                       
                                                            </div>
                                                        </div>                                                       
                                                     </div>
                                              </div>
                                        </div>
                                    <?php  
                                         } 
                                    ?>