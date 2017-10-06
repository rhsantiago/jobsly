<?php
if (session_status() == PHP_SESSION_NONE) {
        session_start();   
}
if(isset($_SESSION['user'])){
date_default_timezone_set('Asia/Manila');
$logtimestamp = date("Y-m-d H:i:s");
include "serverlogconfig.php";
include 'Database.php';
$id=0;
$database = new Database();
$months = array('Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec');    
if(isset($_POST['id'])){ $id = $_POST['id']; }
if(isset($_POST['mode'])){ $mode = $_POST['mode']; }
if(isset($_POST['userid'])){ $userid = $_POST['userid']; }
if($mode!='del'){    
    
    
    if(isset($_POST['company'])){ $company = $_POST['company']; }
    if(isset($_POST['position'])){ $position = $_POST['position']; }
    if(isset($_POST['startdate'])){ $startdate = $_POST['startdate']; }
    $sdate = explode("/", $startdate);
    $startdate = $sdate[2] .'-'.$sdate[0].'-'.$sdate[1];
    if(isset($_POST['msalary'])){ $msalary = $_POST['msalary']; }
    if(isset($_POST['industry'])){ $industry = $_POST['industry']; }
    if(isset($_POST['plevel'])){ $plevel = $_POST['plevel']; }
    if(isset($_POST['enddate'])){ $enddate = $_POST['enddate']; }
    if(isset($_POST['currentempcb'])){ $currentempcb = $_POST['currentempcb']; }
    if($currentempcb=='off'){
        $edate = explode("/", $enddate);
        $enddate = $edate[2] .'-'.$edate[0].'-'.$edate[1];
        $log->info("wexp off". $currentempcb); 
    }else{
        $enddate = '1000-01-01';
        $log->info("wexp on". $currentempcb); 
    }
    
    if(isset($_POST['jobdesc'])){ $jobdesc = $_POST['jobdesc']; }
}

 
    if($mode=='del'){
         $database->query('Delete from workexperience where id = :id ');
         $database->bind(':id', $id);
    }else{
        if($mode=='insert'){
            $database->query(' INSERT INTO workexperience (id, userid, company,position,startdate,msalary,industry,plevel,enddate,currentemployer,jobdescription) VALUES (NULL, :userid, :company, :position,:startdate,:msalary,:industry,:plevel,:enddate,:currentempcb,:jobdesc)');
            $database->bind(':userid', $userid);
        }
        if($mode=='update'){
             $database->query('UPDATE workexperience SET company = :company, position = :position, startdate = :startdate, msalary = :msalary, industry = :industry, plevel = :plevel, enddate = :enddate, currentemployer = :currentempcb, jobdescription = :jobdesc WHERE workexperience.id = :id');
            $database->bind(':id', $id);
        }

        $database->bind(':company', $company);
        $database->bind(':position', $position);  
        $database->bind(':startdate', $startdate);
        $database->bind(':msalary', $msalary); 
        $database->bind(':industry', $industry); 
        $database->bind(':plevel', $plevel); 
        $database->bind(':enddate', $enddate); 
        $database->bind(':currentempcb', $currentempcb);
        $database->bind(':jobdesc', $jobdesc);
    }
    try{
        $database->execute();
        $msg = "workexperience ".$mode;
        $log->info($logtimestamp." - ".$_SESSION['user'] . " " .$msg." ".$id); 
    }catch (PDOException $e) {
        $msg = $e->getTraceAsString()." ".$e->getMessage();
        $log->error($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
        die("");
    } 
    

                                                    $database->query('SELECT * FROM workexperience where userid = :userid order by startdate desc');
                                                    $database->bind(':userid', $userid);
                                                    try{
                                                        $rows = $database->resultset();
                                                    }catch (PDOException $e) {
                                                        $msg = $e->getTraceAsString()." ".$e->getMessage();
                                                        $log->error($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
                                                        die("");
                                                    }
                                                    foreach($rows as $row){
                                                        
                                                        $sdate = explode("-", $row['startdate']);
                                                        $startdate = $sdate[1] .'/'.$sdate[2].'/'.$sdate[0];
                                                        $cecb = $row['currentemployer'];
                                                        if($cecb=='off'){
                                                            $edate = explode("-", $row['enddate']);
                                                            $enddate = $edate[1] .'/'.$edate[2].'/'.$edate[0];
                                                        }else{
                                                            $enddate='present';
                                                        }
                                                        $jobdesc = $row['jobdescription'];
                                                    
?> 
                               <section class="blog-post">
                                    <div class="panel panel-default">
                                    
                                      <div class="panel-body jobad-bottomborder">
                                          <div class="jobad-meta jobad-bottomborder">
                                     
                                          <ul  class="list-inline ">
                                                                                           
                                                                                            <li>
                                                                                                <h6 id="vertical-align" class="text-muted jobadheader">
                                                                                                   <i class="material-icons text-info jobadheadericon">business</i> &nbsp;<?=$row['industry']?>
                                                                                                </h6>
                                                                                            </li>
                                                                                            <li>
                                                                                                <h6 id="vertical-align" class="text-muted jobadheader">
                                                                                                <i class="material-icons text-info jobadheadericon">date_range</i>&nbsp;<?=$months[$sdate[1]-1]?>&nbsp;<?=$sdate[0]?> -
                                                                                                    <?php
                                                                                                        if($enddate != 'present'){
                                                                                                            echo $months[$edate[1]-1].'&nbsp;'.$edate[0];
                                                                                                        }else{
                                                                                                            echo "present";
                                                                                                        }
                                                                                                    ?>
                                                                                                </h6>
                                                                                            </li>
                                                                                            <li>
                                                                                                <h6 id="vertical-align" class="text-muted jobadheader">
                                                                                                   <i class="material-icons text-info jobadheadericon">local_atm</i> &nbsp;Php <?=$row['msalary']?>
                                                                                                </h6>
                                                                                            </li>
                                                                                        </ul>
                                          
                                        </div>
                                     
                                        <div class="blog-post-content">
                                            
                                            <div class="row-fluid">
                                                    
                                                <div class="col-md-6  jobad-titletopmargin">
                                                         <a class="nodecor" href='#showjobmodal' data-toggle="modal" data-target="#showjob-modal" data-jobid="<?=$id?>"><h2 class="text-info jobad-title"><?=$row['position']?></h2></a>
                                                        <div class="companypos">
                                                            <h6 class="text-muted"><i><?=$row['company']?></i></h6>
                                                        </div> 
                                                </div>
                                                
                                            </div>
                                            <div class="row-fluid">
                                               
                                                <div class="col-md-12">   
                                               
                                                    <div class="collapse-group collapse" id="viewdetails<?=$row['id']?>">
                                                  <?=$jobdesc?>                                                 
                                                    </div>    
                                                </div>
                                            </div>
                                            <div class="row-fluid">
                                               <div class="col-md-6">
                                                        <a class="btn btn-primary btn-sm" data-toggle="collapse" data-target="#viewdetails<?=$row['id']?>">Read more</a>
                                                </div>
                                                <div class="col-md-6 actionicon">                                                   
                                                        <span class="jobcardbuttons"><a href='#workexpmodal' id="editworkexp" title="Edit" data-mode="update" data-workexpid="<?=$row['id']?>" data-userid="<?=$userid?>" data-toggle="modal" data-target="#workexp-modal"><i class="material-icons">edit</i></a></span>
                                                        <span class="jobcardbuttons"><a href='#workexpmodal' id="delworkexp" title="Delete" data-mode="del" data-workexpid="<?=$row['id']?>" data-userid="<?=$userid?>" data-toggle="modal" data-target="#workexp-modal"><i class="material-icons">delete</i></a></span>
                                                </div>
                                          </div> 
                                          
                                          
                                        </div>                                  
                                         
                                      </div>
                                        
                                        
                                    </div>
                                  </section>
                                                      
                                                        
                                             <?php          
                                                    }

    }else{
         header("Location: logout.php");
    }   
                                             ?>
                                            