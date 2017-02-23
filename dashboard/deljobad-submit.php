
<?php
if(isset($_POST['jobid'])){ $jobid = $_POST['jobid']; }
if(isset($_POST['mode'])){ $mode = $_POST['mode']; }
if(isset($_POST['userid'])){ $userid = $_POST['userid']; }

if (session_status() == PHP_SESSION_NONE) {
        session_start();
        if (!isset($database)){
            include 'Database.php';
        }
}

$database = new Database();

if(isset($_SESSION['user'])){
   $user = $_SESSION['user'];
   $password = $_SESSION['password'];
   $userid = $_SESSION['userid'];
    date_default_timezone_set('Asia/Manila');
    $logtimestamp = date("Y-m-d H:i:s");     
   include "serverlogconfig.php"; 
        $database->query('Delete from jobads where id = :jobid');
        $database->bind(':jobid', $jobid);
        try{
            $database->execute();
            $msg = "delete jobad";
            $log->info($logtimestamp." - ".$_SESSION['user'] . " " .$msg);    
        }catch (PDOException $e) {
            $msg = $e->getTraceAsString()." ".$e->getMessage();
            $log->error($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
            die("");
        }    
?>

 <?php
        $months = array('January','February','March','April','May','June','July','August','September','October','November','December');
        $positionlevels = array('Executive','Manager','Assistant Manager','Supervisor','5 Years+ Experienced Employee','1-4 Years Experienced Employee','1 Year Experienced Employee/Fresh Grad');
                                $database->query('SELECT * from jobads where userid = :userid order by dateadded desc');
                                $database->bind(':userid', $userid);   
                                
                                try{
                                    $rows = $database->resultset();
                                }catch (PDOException $e) {
                                     $msg = $e->getTraceAsString()." ".$e->getMessage();
                                     $log->error($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
                                     die("");
                                }
                                foreach($rows as $row){
                                    $id = $row['id'];
                                    $jobtitle = $row['jobtitle'];
                                    $company = $row['company'];
                                    $specialization = $row['specialization'];
                                    $plevel = $row['plevel'];
                                    $jobtype = $row['jobtype'];
                                    $msalary = $row['msalary'];
                                    $maxsalary = $row['maxsalary'];
                                    $startappdate = $row['startappdate'];
                                    $sdate = explode("-", $startappdate);
                                    $startappdate = $sdate[1] .'/'.$sdate[2].'/'.$sdate[0];
                                    $endappdate = $row['endappdate'];
                                    $edate = explode("-", $endappdate);
                                    $endappdate = $edate[1] .'/'.$edate[2].'/'.$edate[0];   

                                    $dateadded = $row['dateadded'];
                                    $dadd = explode("-", $dateadded);
                                    $dateadded = $dadd[1] .'/'.$dadd[2].'/'.$dadd[0];         

                               
                                
                         ?>
                                
                                <section class="blog-post">
                                    <div class="panel panel-default">
                                    
                                      <div class="panel-body jobad-bottomborder">
                                          <div class="jobad-meta jobad-bottomborder">
                                      <p class="blog-post-date pull-right text-muted"><?=$months[$dadd[1]-1]?>&nbsp;<?=$dadd[2]?>,&nbsp;<?=$dadd[0]?></p>
                                          <ul  class="list-inline ">
                                                                                           
                                                                                            <li>
                                                                                                <h6 id="vertical-align" class="text-muted jobadheader">
                                                                                                   <i class="material-icons text-info jobadheadericon">domain</i> &nbsp;<?=$specialization?>
                                                                                                </h6>
                                                                                            </li>
                                                                                            <li>
                                                                                                <h6 id="vertical-align" class="text-muted jobadheader">
                                                                                                <i class="material-icons text-info jobadheadericon">date_range</i>&nbsp;<?=$positionlevels[$plevel-1]?>
                                                                                                </h6>
                                                                                            </li>
                                                                                            <li>
                                                                                                <h6 id="vertical-align" class="text-muted jobadheader">
                                                                                                   <i class="material-icons text-info jobadheadericon">local_atm</i> &nbsp;Php <?=$msalary?> - <?=$maxsalary?>
                                                                                                </h6>
                                                                                            </li>
                                                                                        </ul>
                                          
                                        </div>
                                     
                                        <div class="blog-post-content">
                                            
                                            <div class="row-fluid">
                                                <div class="col-md-6">
                                                    
                                                         <a class="nodecor" href="#"><h2 class="text-info jobad-title"><?=$jobtitle?></h2></a>
                                                        <div class="companypos">
                                                            <h6 class="text-muted"><i><?=$company?></i></h6>
                                                        </div> 
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="companylogo"> 
                                                        <img src="img/champ.png" width="70" height="70" class="img-responsive">
                                                    </div>
                                                </div>
                                            </div>    
                                         
                                          
                                          
                                        </div>                                  
                                         <div class="row-fluid">
                                               
                                                <div class="col-md-6 actionicon pull-right">                                                   
                                                        <a class="blog-post-share " href="#editjob" id="editjob" data-jobid="<?=$id?>" data-toggle="tooltip" data-placement="top" title="Edit"><i class="material-icons" >edit</i></a>
                                                        <a class="blog-post-share " href="#deljob" id="deljob" data-toggle="modal" data-placement="top" data-jobid="<?=$id?>" data-mode="del" data-target="#jobpost-modal" title="Delete"><i class="material-icons">delete</i></a>   
                                                </div>
                                          </div> 
                                      </div>
                                        
                                        
                                    </div>
                                  </section>
                                    <?php
                                }
    
}
                                    ?>