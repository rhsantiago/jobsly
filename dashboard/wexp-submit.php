<?php
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
    $edate = explode("/", $enddate);
    $enddate = $edate[2] .'-'.$edate[0].'-'.$edate[1];
    if(isset($_POST['currentempcb'])){ $currentempcb = $_POST['currentempcb']; }
    if(isset($_POST['jobdesc'])){ $jobdesc = $_POST['jobdesc']; }
}

include 'Database.php';
$database = new Database();
    
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
    $database->execute();
    

                                                    $database->query('SELECT * FROM workexperience where userid = :userid order by startdate desc');
                                                    $database->bind(':userid', $userid);  
                                                    $rows = $database->resultset();
                                                           // echo $row['name'];
                                                    foreach($rows as $row){
                                                        
                                                        $sdate = explode("-", $row['startdate']);
                                                        $startdate = $sdate[1] .'/'.$sdate[2].'/'.$sdate[0];
                                                        $edate = explode("-", $row['enddate']);
                                                        $enddate = $edate[1] .'/'.$edate[2].'/'.$edate[0];
                                                        $jobdesc = $row['jobdescription'];
                                                        $teaser = strip_tags($jobdesc, '<p>');
                                                        $teaser = substr($teaser, 0, 200);
                                                        $teaser = strip_tags($teaser, '<p>');
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
                                                                                                <i class="material-icons text-info jobadheadericon">date_range</i>&nbsp;<?=$startdate?> - <?=$enddate?>
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
                                                      <?=$teaser?>...<br>
                                                 </div>
                                                <div class="col-md-12">   
                                               
                                                    <div class="collapse-group collapse" id="viewdetails<?=$row['id']?>">
                                                  <?=$jobdesc?>
                                                   >     
                                                    </div>    
                                                </div>
                                            </div>
                                            <div class="row-fluid">
                                               <div class="col-md-6">
                                                        <a class="btn btn-primary" data-toggle="collapse" data-target="#viewdetails<?=$row['id']?>">Read more</a>
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
                                                       <!-- 
                                                        <div class="card">                                            
                                                             <div class="content">                           
                                                                            <div class="row">
                                                                                <div class="col-md-12">
                                                                                    <div id="workexpcard" class="">
                                                                                        <ul class="list-inline">
                                                                                          <li><h3 class="text-info"><?=$row['position']?></h3></li>
                                                                                            <li><h6 class="text-muted"><i><?=$row['company']?></i></h6> </li>
                                                                                            <li class="editfloatright">
                                                                                                <a href='#workexpmodal' id="editworkexp" title="Edit" data-workexpid="<?=$row['id']?>" data-userid="<?=$userid?>" data-toggle="modal" data-target="#workexp-modal"><i class="material-icons">edit</i></a>
                                                                                                <a href='#workexpmodaldel' id="delworkexp" title="Delete" data-workexpid="<?=$row['id']?>" data-userid="<?=$userid?>" data-toggle="modal" data-target="#workexp-modal-del"><i class="material-icons">delete</i></a>
                                                                                            </li>
                                                                                        </ul>
                                                                                        <ul class="list-inline">
                                                                                            <li>
                                                                                                <h6 class="text-muted">
                                                                                                    <i class="material-icons text-info">business</i><i id='industryli'> <?=$row['industry']?></i>
                                                                                                </h6>
                                                                                            </li>
                                                                                            <li>
                                                                                                <h6 class="text-muted">
                                                                                                   <i class="material-icons text-info">date_range</i> <?=$startdate?> - <?=$enddate?>
                                                                                                </h6>
                                                                                            </li>
                                                                                            <li>
                                                                                                <h6 class="text-muted">
                                                                                                <i class="material-icons text-info">people</i><i> <?=$row['plevel']?></i>
                                                                                                </h6>
                                                                                            </li>
                                                                                            <li>
                                                                                                <h6 class="text-muted">
                                                                                                   <i class="material-icons text-info">local_atm</i> Php <?=$row['msalary']?>
                                                                                                </h6>
                                                                                            </li>
                                                                                        </ul>
                                                                                        <hr>
                                                                                        <p>
                                                                                            <span class="text-muted"><i class="material-icons text-info">description</i> </span>
                                                                                            <?=$row['jobdescription']?>
                                                                                        </p>
                                                                                    </div>
                                                                                </div>
                                                                               
                                                                            
                                                                            </div>
                                                                      
                                                             </div>
                                                    </div>
                                               -->                    
                                                        
                                             <?php          
                                                    }
                                             ?>
                                            