<?php
if (session_status() == PHP_SESSION_NONE) {
        session_start();
        include 'Database.php';
}

$isshortlisted = 0;
if(isset($_SESSION['user'])){
   $user = $_SESSION['user'];
   $password = $_SESSION['password'];
   $adminid = $_SESSION['adminid'];
  
   if(isset($_POST['applicantid'])){ $applicantid = $_POST['applicantid']; }
   if(isset($_POST['mode'])){ $mode = $_POST['mode']; } 
  
    date_default_timezone_set('Asia/Manila');
    $logtimestamp = date("Y-m-d H:i:s");
    include "serverlogconfig.php";
    $database = new Database();
    
   // $database->query('select position as maxposition,fname,lname,mname,photo from workexperience, personalinformation,useraccounts where personalinformation.userid=:userid and useraccounts.id=:userid and startdate = (select max(startdate) from workexperience where workexperience.userid=:userid)');
    $database->query('select fname,lname,mname,photo from personalinformation,useraccounts where personalinformation.userid=:userid and useraccounts.id=:userid');
    $database->bind(':userid', $applicantid);   
    try{
        $row = $database->single();
    }catch (PDOException $e) {
        $msg = $e->getTraceAsString()." ".$e->getMessage();
        $log->error($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
        die("");
    }     
 
    $photo = $row['photo'];
    $fname = $row['fname'];
    $lname = $row['lname'];
    $mname = $row['mname'];
    if(empty($photo)){
         $photo='img/unknown.png';
    }
    
     $database->query('select position as maxposition from workexperience where startdate = (select max(startdate) from workexperience where workexperience.userid=:userid)');
    $database->bind(':userid', $applicantid);   
    try{
        $row = $database->single();
    }catch (PDOException $e) {
        $msg = $e->getTraceAsString()." ".$e->getMessage();
        $log->error($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
        die("");
    }     
    $maxposition = $row['maxposition'];
        
    $months = array('Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec');
    $positionlevels = array('Executive','Manager','Assistant Manager','Supervisor','5 Years+ Experienced Employee','1-4 Years Experienced Employee','1 Year Experienced Employee/Fresh Grad');   
    
}else{
    header("Location: logout.php");
}
?>
<script>
jQuery(document).ready(function ($) {
   
            $('body').addClass('profile-page');
    
});
</script>   
<div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title text-primary h4weight" id="myModalLabel">View Resume</h4>
	      </div>
	      <div id="modaleditessay" class="modal-body modal-gray ">

        <div class="profile-content">
	            <div class="container-fluid">
                        <div class="row-fluid">
                            
                                <div class="profile">                               
                                    <div class="avatar">
                                        <img src="<?=$photo?>" alt="Circle Image" class="img-circle img-responsive img-raised">
                                    </div>
                                    <div class="name">
                                        <h3 class="title"><?=$fname?>&nbsp;<?=$mname?>&nbsp;<?=$lname?></h3>
                                        <h5><?=$maxposition?></h5>
                                    </div>
                                  
              <?php
              $database->query('select * from personalinformation,additionalinformation where personalinformation.userid=:userid and additionalinformation.userid=:userid');
              $database->bind(':userid', $applicantid);   
                      try{                       
                          $row = $database->single();  
                      }catch (PDOException $e) {
                            $msg = $e->getTraceAsString()." ".$e->getMessage();
                            $log->error($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
                            die("");
                      }     
                      $mnumber = $row['mnumber'];
                      $myemail = $row['myemail'];
                      $landline = $row['landline'];                                
                      $street = $row['street'];
                      $city = $row['city'];
                      $province = $row['province'];                                
                      $nationality = $row['nationality'];
                      $age = $row['age'];                       
                      $gender = $row['gender'];                        
                      $birthday = $row['birthday'];                              
                      if(!empty($birthday)){                        
                        $bday = explode("-", $birthday);
                        $birthday = $bday[1] .'/'.$bday[2].'/'.$bday[0];  
                      }
                      
                      
                      $dposition = $row['dposition'];
                      $plevel = $row['plevel'];                      
                      $esalary = $row['esalary'];                      
                      $languages = $row['languages'];                    
                      $wtravel = $row['wtravel'];
                      $wrelocate = $row['wrelocate'];
                      $profsum = $row['profsum'];                       
                      $pholder = $row['pholder'];                        
                                            
                      if(!empty($profsum)){                         
              ?>
                       <section class="blog-post">
                                    <div class="panel panel-default">
                                    
                                      <div class="panel-body">                                        
                                     
                                        <div class="blog-post-content">
                                            
                         <div class="row-fluid">
                           <div class="col-md-12">
                               <div align="left">
                               <?=$profsum?>
                               </div>
                                
                                 </div>
                            </div>  
                                                
                          </div>
                                       </div>
                                    </div>
                                 
              </section>
                 <?php
                     }
                ?>                  
                 <section class="blog-post">
                                    <div class="panel panel-default">
                                    
                                      <div class="panel-body">                                        
                                     
                                        <div class="blog-post-content">
                                            
                         <div class="row-fluid">
                           <div class="col-md-12">                                                    
                                <div align="left">
                                    
                                    <div class="name center">
                                        <div class="col-md-offset-1 col-md-5 resumetextalign">
                                                                    <ul style="list-style: none;" class="">
                                                                        <li> Mobile Number: <b><?=$mnumber?></b></li>
                                                                        <li> Email: <b><?=$myemail?></b></li>
                                                                        <li> Landline: <b><?=$landline?></b></li>
                                                                        <li> Street Address: <b><?=$street?></b></li>
                                                                        <li> City: <?=$city?>, <b><?=$province?></b></li>
                                                                        <li> Nationality: <b><?=$nationality?></b></li>
                                                                        <li> Age: <b><?=$age?></b></li>
                                                                        <li> Birthdate: <b><?=$months[$bday[1]-1]?> &nbsp;<?=$bday[2]?>,&nbsp;<?=$bday[0]?></b></li>
                                                                        <li> Gender: <b><?=$gender?></b></li>
                                                                    </ul>
                                                                </div>
                                                                 <div class="col-md-offset-1 col-md-5 resumetextalign">
                                                                    <ul style="list-style: none;" class="">
                                                                        <li> Desired Position: <b><?=$dposition?></b></li>     
                                                                        <li> Position Level: <b><?=$positionlevels[$plevel-1]?></b></li>
                                                                        <li> Expected Salary: <b><?=$esalary?></b></li> 
                                                                        <li> Languages: <b><?=$languages?></b></li> 
                                                                        <?php
                                                                            if($wtravel=='on'){
                                                                                echo '<li> <b>Willing to Travel</b></li>';
                                                                            }
                                                                            if($wrelocate=='on'){
                                                                                echo '<li><b> Willing to Relocate</b></li>';
                                                                            }
                                                                            if($pholder=='on'){
                                                                                echo '<li> <b>Valid Passport Holder</b></li';
                                                                            }
                                                                        ?>                                                                     
                                                                     </ul>
                                                                </div>
                                                        
                                                            </div>
                                    </div>  
                                 </div>
                            </div>  
                                                
                          </div>
                                       </div>
                                    </div>
                                 
              </section>             
                                </div>
                            
                             <link href="css/timeline.css" rel="stylesheet"/>

   
    <ul class="timeline">
        <?php
             $database->query('SELECT * FROM workexperience where userid = :userid order by startdate desc');
             $database->bind(':userid', $applicantid);  
             try{
                 $rows = $database->resultset();
             }catch (PDOException $e) {
                    $msg = $e->getTraceAsString()." ".$e->getMessage();
                    $log->error($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
                    die("");
             } 
             $isleft = true;
             $datefloat ='';
           
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
                
                 if($isleft){
                    echo '<li>';
                    $isleft = false;
                    $datefloat ='editfloatright';
                 }else{                     
                     echo "<li class='timeline-inverted'>";
                     $isleft = true;
                     $datefloat ='editfloatleft';
                 }
        ?>
           
          <div class="timeline-badge infocolor"><i class="material-icons">work</i></div>
          <div class="timeline-panel timelinerounded">
            <div class="timeline-heading  timelinebodybottomborder">
                <ul class="list-inline <?php if($datefloat=='editfloatleft'){ echo ' tltextright';}?>">      
                    <li class=""><h4 class="timelinepos text-info resumecard margin10 "><?=$row['position']?></h4></li>
                   
                    <li class="<?=$datefloat?> margin10"><?=$months[$sdate[1]-1]?>&nbsp;<?=$sdate[0]?></li>
                 </ul>
                <div class="margin-10 text-muted">
              <ul class="list-inline tlcompanydiv <?php if($datefloat=='editfloatleft'){ echo ' tltextright';}?>">
                    <li><h7 class=""><i><?=$row['company']?></i></h7></li>
                    <li></li>
                    
                 </ul>
              </div>         
            </div>
            
            <div class="timeline-body collapse-group collapse jobdescdiv" id="viewdetails<?=$row['id']?>"> 
                
             <ul class="list-inline">
                 <li>
                     <h6 id="vertical-align" class="text-muted jobadheader">
                        <i class="material-icons text-info material-icons.md-24 jobadheadericon" >business</i><i id='industryli'> <?=$row['industry']?></i>
                     </h6>
                 </li>
                  <li>
                      <h6 id="vertical-align" class="text-muted jobadheader">
                         <i class="material-icons text-info jobadheadericon">date_range</i> 
                          <?=$months[$sdate[1]-1]?>&nbsp;<?=$sdate[0]?> -
                          <?php
                              if($enddate != 'present'){
                                 echo $months[$edate[1]-1].'&nbsp;'.$edate[0];
                              }else{
                                  echo "present";
                              }
                           ?>
                      </h6>
                  </li>
                  
               </ul>
              <?=$row['jobdescription']?>
            </div>
             <p class="center"><a class="btn expandmore" data-toggle="collapse" data-target="#viewdetails<?=$row['id']?>"><i class="material-icons blackicon md-36">expand_more</i></a></p>
              
          </div>           
        </li>
        <li>&nbsp;</li>                    
        <?php
             }
            
             $database->query('SELECT * FROM educationandtraining where userid = :userid order by pgrad1graddate desc');
             $database->bind(':userid', $applicantid); 
             try{
                 $rows = $database->resultset();
             }catch (PDOException $e) {
                $msg = $e->getTraceAsString()." ".$e->getMessage();
                $log->error($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
                die("");
             }      
             $datefloat ='';                               
             foreach($rows as $row){
             $pgrad1uni = $row['pgrad1uni'];
             $pgrad1course = $row['pgrad1course'];
             if(!empty($pgrad1uni) || !empty($pgrad1course)){        
                $pgrad1date = explode("-", $row['pgrad1graddate']);
                $pgrad1graddate = $pgrad1date[1] .'/'.$pgrad1date[2].'/'.$pgrad1date[0];  
                
                 if($isleft){
                    echo '<li>';
                    $isleft = false;
                    $datefloat ='editfloatright';
                 }else{                     
                     echo "<li class='timeline-inverted'>";
                     $isleft = true;
                     $datefloat ='editfloatleft';
                 }
        ?>    
                <div class="timeline-badge success"><i class="material-icons">school</i></div>
          <div class="timeline-panel timelinerounded">
            <div class="timeline-heading timelinebodybottomborder">
                <ul class="list-inline <?php if($datefloat=='editfloatleft'){ echo ' tltextright';}?>">
                    <li><h4 class="timelinepos text-success resumecard margin10"><?=$row['pgrad1course']?></h4></li>
                    <li class="<?=$datefloat?> margin10"><?=$months[$pgrad1date[1]-1]?>&nbsp;<?=$pgrad1date[0]?></li>
                   
                 </ul> 
                <div class="margin-10 text-muted">
              <ul class="list-inline tlcompanydiv <?php if($datefloat=='editfloatleft'){ echo ' tltextright';}?>">
                    <li><h7><i><?=$row['pgrad1uni']?></i></h7></li>                  
                 </ul>
              </div>
            </div>
              
            <div class="timeline-body collapse-group collapse jobdescdiv" id="pgrad1viewdetails<?=$row['id']?>"> 
                 <ul class="list-inline">
                 <li>
                     <h6 id="vertical-align" class="text-muted jobadheader">
                        <i class="material-icons text-info md-8 jobadheadericon" >business</i><i id='industryli'> <?=$row['pgrad1add']?></i>
                     </h6>
                 </li>
                 <li>
                     <h6 id="vertical-align" class="text-muted jobadheader">
                        <i class="material-icons text-info md-8 jobadheadericon" >grade</i><i id='industryli'> <?=$row['pgrad1gpa']?></i>
                     </h6>
                 </li>
                  <li>
                      <h6 id="vertical-align" class="text-muted jobadheader">
                         <i class="material-icons text-info jobadheadericon">date_range</i> <?=$months[$pgrad1date[1]-1]?>&nbsp;<?=$pgrad1date[0]?>
                      </h6>
                  </li>
                
               </ul>
              <?=$row['pgrad1awards']?>
            </div>
               <p class="center"><a class="btn expandmore" data-toggle="collapse" data-target="#pgrad1viewdetails<?=$row['id']?>"><i class="material-icons blackicon md-36">expand_more</i></a></p>
          </div>           
        </li>   
        <li>&nbsp;</li>            
        <?php             
             }
             }
                                            
             $database->query('SELECT * FROM educationandtraining where userid = :userid order by colgraddate desc');
             $database->bind(':userid', $applicantid); 
             try{
                $rows = $database->resultset();
             }catch (PDOException $e) {
                $msg = $e->getTraceAsString()." ".$e->getMessage();
                $log->error($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
                die("");
            } 
                         
             $datefloat ='';                               
             foreach($rows as $row){
                $coldate = explode("-", $row['colgraddate']);
                $colgraddate = $coldate[1] .'/'.$coldate[2].'/'.$coldate[0]; 
                  $coluni = $row['coluni'];
                if(!empty($coluni) && $coldate[0] > 0){
                 if($isleft){
                    echo '<li>';
                    $isleft = false;
                    $datefloat ='editfloatright';
                 }else{                     
                     echo "<li class='timeline-inverted'>";
                     $isleft = true;
                     $datefloat ='editfloatleft';
                 }
                                            
        ?>
               <div class="timeline-badge success"><i class="material-icons">school</i></div>
          <div class="timeline-panel timelinerounded">
            <div class="timeline-heading timelinebodybottomborder">
                <ul class="list-inline <?php if($datefloat=='editfloatleft'){ echo ' tltextright';}?>">
                    <li><h4 class="timelinepos text-success resumecard margin10"><?=$row['colmajor']?></h4></li>
                    <li class="<?=$datefloat?> margin10"><?=$months[$coldate[1]-1]?>&nbsp;<?=$coldate[0]?></li>
                </ul>
                 <div class="margin-10 text-muted">
              <ul class="list-inline tlcompanydiv <?php if($datefloat=='editfloatleft'){ echo ' tltextright';}?>">
                    <li><h7><i><?=$row['coluni']?></i></h7> </li>             
                 </ul>
              </div>       
            </div>
              
            <div class="timeline-body collapse-group collapse jobdescdiv" id="colviewdetails<?=$row['id']?>"> 
                <ul class="list-inline">
                 <li>
                     <h6 id="vertical-align" class="text-muted jobadheader">
                        <i class="material-icons text-info md-8 jobadheadericon" >business</i><i id='industryli'> <?=$row['coladd']?></i>
                     </h6>
                 </li>
                 <li>
                     <h6 id="vertical-align" class="text-muted jobadheader">
                        <i class="material-icons text-info md-8 jobadheadericon" >grade</i><i id='industryli'> <?=$row['colgpa']?></i>
                     </h6>
                 </li>
                  <li>
                      <h6 id="vertical-align" class="text-muted jobadheader">
                         <i class="material-icons text-info jobadheadericon">date_range</i> <?=$months[$coldate[1]-1]?>&nbsp;<?=$coldate[0]?>
                      </h6>
                  </li>
                
               </ul>
              <?=$row['colawards']?>
            </div>
              <p class="center"><a class="btn expandmore" data-toggle="collapse" data-target="#colviewdetails<?=$row['id']?>"><i class="material-icons blackicon md-36">expand_more</i></a></p>              
          </div>           
        </li>  
        <li>&nbsp;</li>    
        <?php
             }
             }
             $database->query('SELECT * FROM educationandtraining where userid = :userid order by hsgraddate desc');
             $database->bind(':userid', $applicantid); 
             try{
                 $rows = $database->resultset();
             }catch (PDOException $e) {
                $msg = $e->getTraceAsString()." ".$e->getMessage();
                $log->error($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
                die("");
             }             
             $datefloat ='';                               
             foreach($rows as $row){
                 $hsdate = explode("-", $row['hsgraddate']);
                $hsgraddate = $hsdate[1] .'/'.$hsdate[2].'/'.$hsdate[0];    
                $hsscchool = $row['hsschool'];                   
                if(!empty($hsscchool) && $hsdate[0] > 0){   
                
                 if($isleft){
                    echo '<li>';
                    $isleft = false;
                    $datefloat ='editfloatright';
                 }else{                     
                     echo "<li class='timeline-inverted'>";
                     $isleft = true;
                     $datefloat ='editfloatleft';
                 }                       
        ?>
                            
             <div class="timeline-badge success"><i class="material-icons">school</i></div>
          <div class="timeline-panel timelinerounded">
            <div class="timeline-heading timelinebodybottomborder">
                <ul class="list-inline <?php if($datefloat=='editfloatleft'){ echo ' tltextright';}?>">
                    <li><h4 class="timelinepos text-success resumecard margin10">High School</h4></li>
                    <li class="<?=$datefloat?> margin10"><?=$months[$hsdate[1]-1]?>&nbsp;<?=$hsdate[0]?></li>
                    <li></li>
                 </ul> 
                <div class="margin-10 text-muted">
                  <ul class="list-inline tlcompanydiv <?php if($datefloat=='editfloatleft'){ echo ' tltextright';}?>">
                        <li><h7><i><?=$row['hsschool']?></i></h7> </li>             
                     </ul>
                  </div>
            </div>
               
            <div class="timeline-body collapse-group collapse jobdescdiv" id="hsviewdetails<?=$row['id']?>"> 
               <ul class="list-inline">
                 <li>
                     <h6 id="vertical-align" class="text-muted jobadheader">
                        <i class="material-icons text-info md-8 jobadheadericon" >business</i><i id='industryli'> <?=$row['hsadd']?></i>
                     </h6>
                 </li>
                  <li>
                      <h6 id="vertical-align" class="text-muted jobadheader">
                         <i class="material-icons text-info jobadheadericon">date_range</i> <?=$months[$hsdate[1]-1]?>&nbsp;<?=$hsdate[0]?>
                      </h6>
                  </li>
                
               </ul>   
              <?=$row['hsawards']?>
            </div>
               <p class="center"><a class="btn expandmore" data-toggle="collapse" data-target="#hsviewdetails<?=$row['id']?>"><i class="material-icons blackicon md-36">expand_more</i></a></p>
           </div>           
        </li>                  
        <li>&nbsp;</li>          
        <?php
             }
             }
        ?>                                    
    
            
    </ul>

              <?php
                             $database->query('SELECT othersawards FROM educationandtraining where userid = :userid');
                             $database->bind(':userid', $applicantid);  
                             try{ 
                                 $row = $database->single();
                             }catch (PDOException $e) {
                                $msg = $e->getTraceAsString()." ".$e->getMessage();
                                $log->error($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
                                die("");
                             } 
                             $othersawards= $row['othersawards'];
                             if(!empty($othersawards)){    
                        ?>
                        <section class="blog-post">
                                    <div class="panel panel-default">
                                    
                                      <div class="panel-body">                                        
                                     
                                        <div class="blog-post-content">
                                            
                         <div class="row-fluid">
                           <div class="col-md-12">
                               <div align="left">
                                   <h4 class="text-warning">Professional Trainings</h4>
                               <?=$othersawards?>
                               </div>
                                
                                 </div>
                            </div>  
                                                
                          </div>
                                       </div>
                                    </div>
                                 
                            </section>  
                           <?php
                             }
                            ?>              
                            
                            
	                    </div>
                
               </div>
        </div>
        
                        
 </div>

	                              
                               
         

	      <div class="modal-footer blog-post">
              <ul class="list-inline">
               <li>
                   
                </li> 
                <li> <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>	</li>  
              </ul>  
	      </div>

<script>
jQuery(document).ready(function ($) {
   
    /*
    $('#pinfo-form #fname').parsley().on('field:error', function() {
           $('#pinfo-form #fnamediv').addClass('has-error');
           $('#pinfo-form #fnamediv').append("<span class='material-icons form-control-feedback'>clear</span>");   
    });    
    $('#pinfo-form #fname').parsley().on('field:success', function() {
            $('#pinfo-form #fnamediv').addClass('has-success');
            $('#pinfo-form #fnamediv').find('span').remove()
            $('#pinfo-form #fnamediv').append("<span class='material-icons form-control-feedback'>done</span>");   
    });
    
   
    
    */
    
});       
</script>
