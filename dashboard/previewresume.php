<?php
if (session_status() == PHP_SESSION_NONE) {
        session_start();
        if (!isset($database)){
           // include 'Database.php';
         }
}

if(isset($_SESSION['user'])){
   $user = $_SESSION['user'];
   $password = $_SESSION['password'];
   $userid = $_SESSION['userid'];
   $usertype = $_SESSION['usertype'];
    
   include 'authenticate.php';
}else{
    header("Location: logout.php");
}

if($ok == 1 ){
    date_default_timezone_set('Asia/Manila');
    $logtimestamp = date("Y-m-d H:i:s"); 
    include "serverlogconfig.php";
    
    $database = new Database();
    
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="../img/apple-icon.png">
	<link rel="icon" type="image/png" href="../img/favicon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>jobsly - find your next adventure</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />

	<!--     Fonts and icons     -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <link href="https://fonts.googleapis.com/css?family=Oleo+Script" rel="stylesheet">

	<!-- CSS Files -->
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link href="css/material-kit.css" rel="stylesheet"/>
    <link href="css/custom.css" rel="stylesheet"/>
    <link href="css/media.css" rel="stylesheet"/>
    <link href="css/summernote.css" rel="stylesheet"/>

    
    <script src="js/jquery.min.js" type="text/javascript"></script>
	<script src="js/bootstrap.min.js" type="text/javascript"></script>
	<script src="js/material.min.js"></script>

	<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
	<script src="js/nouislider.min.js" type="text/javascript"></script>

	<!--  Plugin for the Datepicker, full documentation here: http://www.eyecon.ro/bootstrap-datepicker/ -->
	<script src="js/bootstrap-datepicker.js" type="text/javascript"></script> 

	<!-- Control Center for Material Kit: activating the ripples, parallax effects, scripts from the example pages etc -->
	<script src="js/material-kit.js" type="text/javascript"></script>
    <script src="js/resume.js" type="text/javascript"></script>
    <script src="js/summernote.min.js" type="text/javascript"></script> 
    <script src="js/parsley.js"></script>
    <style>
            #resumeinfo ul, #resumeinfo li {
            margin: 0; padding: 0;
        }
    </style>
</head>

<body class="landing-page">
  
   <nav class="navbar navbar-fixed-top ">
    	<div class="container">
        	<!-- Brand and toggle get grouped for better mobile display -->
                
        	<div class="navbar-header">                
        		<button type="button" class="navbar-toggle " data-toggle="collapse" data-target="#navigation-example">
            		<span class="sr-only">Toggle navigation</span>
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
        		</button>
             
        		<a class="navbar-brand logo" >jobsly</a>
        	</div>

    	</div>
    </nav>


     <div class="header header-filter purple-header">
           <div class="container">
                <div class="row-fluid">
					<div class="col-md-11 margin-top-title col-md-offset-1">
                        <div class="row-fluid">
                    
                          
                        </div>
                        
                </div>
            </div>
            </div>
        </div>
    <?php
            $database->query('select position as maxposition,fname,lname,mname,photo from workexperience, personalinformation,useraccounts where personalinformation.userid=:userid and startdate = (select max(startdate) from workexperience where workexperience.userid=:userid) and useraccounts.id=:userid');
            $database->bind(':userid', $userid);   
            try{
                $row = $database->single();
            }catch (PDOException $e) {
                $msg = $e->getTraceAsString()." ".$e->getMessage();
                $log->error($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
                die("");
            }     
            $maxposition = $row['maxposition'];
            $fname = $row['fname'];
            $mname = $row['mname'];
            $lname = $row['lname'];
            $photo = $row['photo'];
      
    ?>
  
    <div id="main" class="wrapper ">
       

		<div class="main main-raised ">
         
			<div class="container-fluid"> <!-- with fluid for full width -->
                <div class="row-fluid">   <!-- with fluid for full width -->
                    
                    <div id="resume-main-body">   
<?php



if(isset($_SESSION['user'])){

    $database->query('select position as maxposition,fname,lname,photo from workexperience, personalinformation,useraccounts where personalinformation.userid=:userid and startdate = (select max(startdate) from workexperience where workexperience.userid=:userid) and useraccounts.id=:userid');
    $database->bind(':userid', $userid);   
    try{
        $row = $database->single();
    }catch (PDOException $e) {
        $msg = $e->getTraceAsString()." ".$e->getMessage();
        $log->error($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
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

 <div class="col-md-9"> 
    
        <div class="profile-content">
	            <div class="container-fluid">
                        <div class="row-fluid">
                            
                                <div class="profile">                               
                                    <div class="avatar">
                                        <img src="<?=$photo?>" alt="Circle Image" class="img-circle img-responsive img-raised">
                                    </div>
                                    <div class="name">
                                        <h3 class="title"><?=$fname?> <?=$mname?> <?=$lname?></h3>
                                        <h5><?=$maxposition?></h5>
                                        <br>
                                         <form method="post" action="printableresume.php" id="printable-form" name="printable-form" target="_blank">
                                            <input type="hidden" id="userid" name="userid" value="<?=$userid?>">
                                        </form>     
                                        <a href='#printable' id='printable' name="printable">Printable Resume</a>
                                    </div>
          
              <?php
              $database->query('select * from personalinformation,additionalinformation where personalinformation.userid=:userid and additionalinformation.userid=:userid');
              $database->bind(':userid', $userid);   
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
                      $gender = $row['gender'];
                      $age = $row['age'];
                      $birthday = $row['birthday'];
                      if(!empty($birthday)){                        
                        $bday = explode("-", $birthday);
                      }
                      $birthday = $bday[1] .'/'.$bday[2].'/'.$bday[0];
                      
                      $dposition = $row['dposition'];
                      $plevel = $row['plevel'];                      
                      $esalary = $row['esalary'];                      
                      $languages = $row['languages'];
                      $profsum = $row['profsum'];
                      $wtravel = $row['wtravel'];
                      $wrelocate = $row['wrelocate'];
                      $pholder = $row['pholder'];                        
                                            
                     if(!empty($profsum) && strlen($profsum)>50){                           
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
                                            
                         <div class="row">
                        <!--   <div class="col-md-12">         -->                                           
                               <!-- <div align="left"> -->
                                    
                                    <div id="resumeinfo" class="">
                                        <div  class="col-md-offset-1 col-md-5">
                                                                    <ul  align="left" style="list-style: none;" class="">
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
                                                                 <div class="col-md-offset-1 col-md-5">
                                                                    <ul align="left" style="list-style: none;" class="">
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
                                   <!-- </div> --> 
                              <!--   </div> -->
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
             $database->bind(':userid', $userid);  
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
             $database->bind(':userid', $userid);  
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
             $database->bind(':userid', $userid);  
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
             $database->bind(':userid', $userid);  
             try{ 
                 $rows = $database->resultset();
             }catch (PDOException $e) {
                $msg = $e->getTraceAsString()." ".$e->getMessage();
                $log->error($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
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
                         <i class="material-icons text-info jobadheadericon">date_range</i> <?=$months[$hsdate[1]-1]?>&nbsp;<?=$hsdate[0]?>
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
                        
                        <?php
                             $database->query('SELECT othersawards FROM educationandtraining where userid = :userid');
                             $database->bind(':userid', $userid);  
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
<div class="col-md-3 ">
                          <div class="card card-ads adsright">                                            
                                                             <div class="content">
                                                                                                                                       
                                                                            <div class="row">
                                                                                <div class="col-md-12">
                                                                                    <img alt="Bootstrap Image Preview" src="img/ad1.jpg" width="300" height="250" class="img-responsive" style="padding-top: 5px"/><img alt="Bootstrap Image Preview" src="http://lorempixel.com/300/250/" class="img-responsive" style="padding-top: 5px"/>
                                                                                </div>
                                                                               
                                                                            
                                                                            </div>
                                                                      
                                                             </div>
                                                    </div>
		       </div> 
 </div>
	        </div>

		</div>
</div>
        
	    <footer class="footer">
	        <div class="container">
	            <nav class="pull-left">
	                <ul>
	                    <li>
	                        <a href="http://www.creative-tim.com">
	                            Creative Tim
	                        </a>
	                    </li>
						<li>
	                        <a href="http://presentation.creative-tim.com">
	                           About Us
	                        </a>
	                    </li>
	                    <li>
	                        <a href="http://blog.creative-tim.com">
	                           Blog
	                        </a>
	                    </li>
	                    <li>
	                        <a href="http://www.creative-tim.com/license">
	                            Licenses
	                        </a>
	                    </li>
	                </ul>
	            </nav>
	            <div class="copyright pull-right">
	                &copy; 2016, made with <i class="fa fa-heart heart"></i> by Creative Tim
	            </div>
	        </div>
	    </footer>

	</div>
    
</body>


</html>
<?php
} else{
    include 'logout.php';
    
}
?>