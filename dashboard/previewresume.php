<?php
if (session_status() == PHP_SESSION_NONE) {
        session_start();
        include 'Database.php';
}


if(isset($_SESSION['user'])){
   $user = $_SESSION['user'];
   $password = $_SESSION['password'];
   $userid = $_SESSION['userid'];
    
    include "serverlogconfig.php";
    $database = new Database();
    
    $database->query('select position as maxposition,fname,lname,photo from workexperience, personalinformation,useraccounts where personalinformation.userid=:userid and startdate = (select max(startdate) from workexperience where workexperience.userid=:userid) and useraccounts.id=:userid');
    $database->bind(':userid', $userid);   
    try{
        $row = $database->single();
    }catch (PDOException $e) {
        $error = true;
        $msg = $e->getTraceAsString()." ".$e->getMessage();
        include "serverlog.php";
        die("");
    }     
    $maxposition = $row['maxposition'];
    $fname = $row['fname'];
    $lname = $row['lname'];
    $photo = $row['photo'];
    
    $months = array('Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec');
    $bday = array('0000','00','00');
    $positionlevels = array('Executive','Manager','Assistant Manager','Supervisor','5 Years+ Experienced Employee','1-4 Years Experienced Employee','1 Year Experienced Employee/Fresh Grad');
}
?>
<script>
jQuery(document).ready(function ($) {
   
            $('body').addClass('profile-page');
    
});
</script>      

 <div class="col-md-12"> 
    
        <div class="profile-content">
	            <div class="container-fluid">
                        <div class="row-fluid">
                            
                                <div class="profile">                               
                                    <div class="avatar">
                                        <img src="<?=$photo?>" alt="Circle Image" class="img-circle img-responsive img-raised">
                                    </div>
                                    <div class="name">
                                        <h3 class="title"><?=$fname?>&nbsp;<?=$lname?></h3>
                                        <h5><?=$maxposition?></h5>
                                    </div>
                                    <div class="jumbotron">
              <?php
              $database->query('select * from personalinformation,additionalinformation where personalinformation.userid=:userid and additionalinformation.userid=:userid');
              $database->bind(':userid', $userid);   
                      try{                              
                          $row = $database->single();   
                      }catch (PDOException $e) {
                            $error = true;
                            $msg = $e->getTraceAsString()." ".$e->getMessage();
                            include "serverlog.php";
                            die("");
                      }                        
                      $mnumber = $row['mnumber'];
                      $myemail = $row['myemail'];
                      $landline = $row['landline'];                                
                      $street = $row['street'];
                      $city = $row['city'];
                      $province = $row['province'];                                
                      $nationality = $row['nationality'];          
                      $birthday = $row['birthday'];
                      if(!empty($birthday)){                        
                        $bday = explode("-", $birthday);
                      }
                      $birthday = $bday[1] .'/'.$bday[2].'/'.$bday[0];
                      
                      $dposition = $row['dposition'];
                      $plevel = $row['plevel'];                      
                      $esalary = $row['esalary'];                      
                      $languages = $row['languages'];                      
                      $wtravel = $row['wtravel'];
                      $wrelocate = $row['wrelocate'];
                      $pholder = $row['pholder'];                        
                                            
                                            
              ?>
                                        
                                 <div class="row">                                                               
                                                                <div class="col-md-offset-1 col-md-5 resumetextalign">
                                                                    <ul style="list-style: none;" class="">
                                                                        <li> Mobile Number: <?=$mnumber?></li>
                                                                        <li> Email: <?=$myemail?></li>
                                                                        <li> Landline: <?=$landline?></li>
                                                                        <li> Street Address: <?=$street?></li>
                                                                        <li> City: <?=$city?>, <?=$province?></li>
                                                                        <li> Nationality: <?=$nationality?></li>
                                                                        <li> Birthdate: <?=$birthday?></li>
                                                                    </ul>
                                                                </div>
                                                                 <div class="col-md-offset-1 col-md-5 resumetextalign">
                                                                    <ul style="list-style: none;" class="">
                                                                        <li> Desired Position: <?=$dposition?></li>     
                                                                        <li> Position Level: <?=$positionlevels[$plevel-1]?></li>
                                                                        <li> Expected Salary: <?=$esalary?></li> 
                                                                        <li> Languages: <?=$languages?></li> 
                                                                        <?php
                                                                            if($wtravel=='on'){
                                                                                echo '<li> Willing to Travel</li>';
                                                                            }
                                                                            if($wrelocate=='on'){
                                                                                echo '<li> Willing to Relocate</li>';
                                                                            }
                                                                            if($pholder=='on'){
                                                                                echo '<li> Valid Passport Holder</li';
                                                                            }
                                                                        ?>                                                                     
                                                                     </ul>
                                                                </div>
                                                        
                                                            </div>
                                    </div>    
                              
                                </div>
                            
                             <link href="css/timeline.css" rel="stylesheet"/>

   
    <ul class="timeline">
        <?php
             $database->query('SELECT * FROM workexperience where userid = :userid order by startdate desc');
             $database->bind(':userid', $userid);  
             try{
                $rows = $database->resultset();
             }catch (PDOException $e) {
                $error = true;
                $msg = $e->getTraceAsString()." ".$e->getMessage();
                include "serverlog.php";
                die("");
             } 
             $isleft = true;
             $datefloat ='';
           
             foreach($rows as $row){
                $sdate = explode("-", $row['startdate']);
                $startdate = $sdate[1] .'/'.$sdate[2].'/'.$sdate[0];
                $edate = explode("-", $row['enddate']);
                $enddate = $edate[1] .'/'.$edate[2].'/'.$edate[0];
                
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
                         <i class="material-icons text-info jobadheadericon">date_range</i> <?=$startdate?> - <?=$enddate?>
                      </h6>
                  </li>
                  
               </ul>
              <?=$row['jobdescription']?>
            </div>
             <p class="center"><a class="btn expandmore" data-toggle="collapse" data-target="#viewdetails<?=$row['id']?>"><i class="material-icons blackicon md-36">expand_more</i></a></p>
              
          </div>           
        </li>
        <?php
             }
            
            $database->query('SELECT * FROM educationandtraining where userid = :userid order by pgrad1graddate desc');
             $database->bind(':userid', $userid);  
             try{   
                 $rows = $database->resultset();
             }catch (PDOException $e) {
                $error = true;
                $msg = $e->getTraceAsString()." ".$e->getMessage();
                include "serverlog.php";
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
                         <i class="material-icons text-info jobadheadericon">date_range</i> <?=$pgrad1graddate?>
                      </h6>
                  </li>
                
               </ul>
              <?=$row['pgrad1awards']?>
            </div>
               <p class="center"><a class="btn expandmore" data-toggle="collapse" data-target="#pgrad1viewdetails<?=$row['id']?>"><i class="material-icons blackicon md-36">expand_more</i></a></p>
          </div>           
        </li>            
        <?php             
             }
             }
                                            
             $database->query('SELECT * FROM educationandtraining where userid = :userid order by colgraddate desc');
             $database->bind(':userid', $userid);  
             try{
                 $rows = $database->resultset();
             }catch (PDOException $e) {
                $error = true;
                $msg = $e->getTraceAsString()." ".$e->getMessage();
                include "serverlog.php";
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
                    <li><h7><i><?=$coluni?></i></h7> </li>             
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
                         <i class="material-icons text-info jobadheadericon">date_range</i> <?=$colgraddate?>
                      </h6>
                  </li>
                
               </ul>
              <?=$row['colawards']?>
            </div>
              <p class="center"><a class="btn expandmore" data-toggle="collapse" data-target="#colviewdetails<?=$row['id']?>"><i class="material-icons blackicon md-36">expand_more</i></a></p>              
          </div>           
        </li>                   
        <?php
             }
             }
            
             $database->query('SELECT * FROM educationandtraining where userid = :userid order by hsgraddate desc');
             $database->bind(':userid', $userid);  
             try{ 
                 $rows = $database->resultset();
             }catch (PDOException $e) {
                $error = true;
                $msg = $e->getTraceAsString()." ".$e->getMessage();
                include "serverlog.php";
                die("");
             } 
             $datefloat ='';                               
             foreach($rows as $row){
                 $hsgraddate= $row['hsgraddate'];
                 $hsdate = explode("-",$hsgraddate);
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
                        <li><h7><i><?=$hsscchool?></i></h7> </li>             
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
                         <i class="material-icons text-info jobadheadericon">date_range</i> <?=$hsgraddate?>
                      </h6>
                  </li>
                
               </ul>   
              <?=$row['hsawards']?>
            </div>
               <p class="center"><a class="btn expandmore" data-toggle="collapse" data-target="#hsviewdetails<?=$row['id']?>"><i class="material-icons blackicon md-36">expand_more</i></a></p>
           </div>           
        </li>                  
                    
        <?php
             }
        }
        ?>                                    
    
            
    </ul>

                            
                            
                            
	                    </div>
                
               </div>
        </div>
        
                        
 </div>

