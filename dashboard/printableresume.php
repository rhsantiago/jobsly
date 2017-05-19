<?php
if (session_status() == PHP_SESSION_NONE) {
        session_start();
        if (!isset($database)){
           // include 'Database.php';
         }
}
if(isset($_POST['userid'])){ $useridparam = $_POST['userid']; }
if(isset($_POST['employerid'])){ $employeridparam = $_POST['employerid']; }
if(isset($_SESSION['user'])){
   $user = $_SESSION['user'];
   $password = $_SESSION['password'];
   $userid = $_SESSION['userid'];
   $usertype = $_SESSION['usertype'];
    
   include 'authenticate.php';
}else{
    header("Location: logout.php");
}

if(($useridparam != $userid) && ($employeridparam != $userid)){
    header("Location: logout.php");
}

if($ok == 1 ){
    date_default_timezone_set('Asia/Manila');
    $logtimestamp = date("Y-m-d H:i:s"); 
    include "serverlogconfig.php";
    
    $database = new Database();
   // $database->query('select position as maxposition,fname,lname,mname,photo from workexperience, personalinformation,useraccounts where personalinformation.userid=:userid and startdate = (select max(startdate) from workexperience where workexperience.userid=:userid) and useraccounts.id=:userid');
    $database->query('select fname,lname,mname,photo from personalinformation,useraccounts where personalinformation.userid=:userid and useraccounts.id=:userid');
            $database->bind(':userid', $useridparam);   
            try{
                $row = $database->single();
            }catch (PDOException $e) {
                $msg = $e->getTraceAsString()." ".$e->getMessage();
                $log->error($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
                die("");
            }     
          
    
            $fname = $row['fname'];
            $mname = $row['mname'];
            $lname = $row['lname'];
            $photo = $row['photo'];
     $database->query('select position as maxposition from workexperience where startdate = (select max(startdate) from workexperience where workexperience.userid=:userid)');
            $database->bind(':userid', $useridparam);   
            try{
                $row = $database->single();
            }catch (PDOException $e) {
                $msg = $e->getTraceAsString()." ".$e->getMessage();
                $log->error($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
                die("");
            }     
            $maxposition = $row['maxposition'];
    
    
    
    $months = array('Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec');
    $bday = array('0000','00','00');
    $positionlevels = array('Executive','Manager','Assistant Manager','Supervisor','5 Years+ Experienced Employee','1-4 Years Experienced Employee','1 Year Experienced Employee/Fresh Grad');
    
    
    $database->query('select * from personalinformation,additionalinformation where personalinformation.userid=:userid and additionalinformation.userid=:userid');
              $database->bind(':userid', $useridparam);   
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
   <!-- <link href="css/material-kit.css" rel="stylesheet"/> -->
    <link href="css/custom.css" rel="stylesheet"/>
    <link href="css/media.css" rel="stylesheet"/> 
<script src="js/jquery.min.js" type="text/javascript"></script>
<style>
    .margin30{
        margin: 30px;
    }
    .resumename{
        font-size: 30px;
    }
    
    .resumesection{
        font-size: 18px;
    }
   
    .nopadmargin{
        padding: 0 !important;
        margin:  0 !important;
    }
    .h4weight{
        font-weight: 400 !important;
    }
</style>
</head>   
<body class="landing-page">
    <div class="container">
            <div class="row-fluid"  >
                <div class="col-md-7 ">
                    <div class="margin30">
                        <ul class="nopadmargin" style="list-style: none;">
                        <li><span class="resumename"><?=$fname?> <?=$mname?> <?=$lname?></span></li>
                        <li><span><i><?=$maxposition?></i></span></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-5 ">
                    <div class="margin30">
                         <ul class="" style="list-style: none;">
                             <li>Email: <?=$myemail?></li>
                             <li>Mobile: <?=$mnumber?></li>
                        </ul>       
                    </div>    
                </div>
                <?php
                  if(!empty($profsum) && strlen($profsum)>50){        
                ?>          
                <!--Professional Summary-->
                <div class="col-md-12">
                     <hr class="nopadmargin h4weight">
                </div>
                <div class="col-md-3 ">
                    <div class="margin10">
                        <span class="resumesection"><i>Professional Summary</i></span>
                    </div>
                </div>                
                <div class="col-md-9 ">
                     <div class="margin10">
                        <div align="left">
                            <?=$profsum?>
                        </div>
                    </div>
                    
                </div>
                <?php
                  }
                    $database->query('SELECT * FROM workexperience where userid = :userid order by startdate desc');
                     $database->bind(':userid', $useridparam);  
                     try{
                        $rows = $database->resultset();
                     }catch (PDOException $e) {
                        $msg = $e->getTraceAsString()." ".$e->getMessage();
                        $log->error($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
                        die("");
                     }
                if($database->rowCount()>0){
                ?>    
                <!--work exp-->
                <div class="col-md-12">
                     <hr class="nopadmargin">
                </div>               
                <div class="col-md-3 ">
                    <div class="margin10">
                        <span class="resumesection"><i>Work Experience</i></span>
                    </div>
                </div>
                <?php
                     
                     
                     $first= true;
                     $offset = '';
                     foreach($rows as $row){
                        $position = $row['position'];
                        $jobdesc = $row['jobdescription'];  
                        $sdate = explode("-", $row['startdate']);
                        $startdate = $sdate[1] .'/'.$sdate[2].'/'.$sdate[0];
                        $cecb = $row['currentemployer'];
                        if($cecb=='off'){
                            $edate = explode("-", $row['enddate']);
                            $enddate = $edate[1] .'/'.$edate[2].'/'.$edate[0];
                         }else{
                            $enddate='present';
                         }
                         
                         if($first != true){
                             $offset = 'col-md-offset-3 ';
                         }else{
                             $offset = '';
                         }

                ?>
                    <div class="<?=$offset?> col-md-9 ">
                         <div class="margin10">
                            <ul class="nopadmargin" style="list-style: none;">
                            <li><span class="resumesection h4weight"><?=$position?></span></li>
                            <li><span><i><?=$months[$sdate[1]-1]?>&nbsp;<?=$sdate[0]?> -
                          <?php
                              if($enddate != 'present'){
                                 echo $months[$edate[1]-1].'&nbsp;'.$edate[0];
                              }else{
                                  echo "present";
                              }
                           ?></i></span></li>
                            </ul>
                        </div>
                        <div class="margin10">
                            <?=$jobdesc?>
                        </div>
                    </div>
                
                <?php
                        $first = false;     
                     }
}
                ?>         
                
                <?php
                                                    $database->query('SELECT * FROM skilltags where userid = :userid');
                                                    $database->bind(':userid', $useridparam);  
                                                    try{                
                                                        $rows = $database->resultset();
                                                    }catch (PDOException $e) {
                                                        $msg = $e->getTraceAsString()." ".$e->getMessage();
                                                        $log->error($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
                                                        die("");
                                                    } 
                                                   
                ?>                                        
                <!--Skills-->
                <div class="col-md-12">
                     <hr class="nopadmargin h4weight">
                </div>
                <div class="col-md-3 ">
                    <div class="margin10">
                        <span class="resumesection"><i>Key Skills</i></span>
                    </div>
                </div>                
                <div class="col-md-9 ">
                     <div class="margin10">
                        <ul class="nopadmargin" style="list-style: none;">
                        <li><span class="">
                            <?php
                                 foreach($rows as $row){
                                     $skill = $row['skill'];
                                     echo $skill.',';  
                                 }
                            ?>
                            </span></li>
                        
                        </ul>
                    </div>
                    
                </div>
                
                <!--Education-->
                <div class="col-md-12">
                     <hr class="nopadmargin h4weight">
                </div>
                <div class="col-md-3 ">
                    <div class="margin10">
                        <span class="resumesection"><i>Education</i></span>
                    </div>
                </div>
                <?php
                    $database->query('SELECT * from educationandtraining where userid = :userid');
                    $database->bind(':userid', $useridparam);   
                    try{
                        $row = $database->single();
                    }catch (PDOException $e) {
                        $msg = $e->getTraceAsString()." ".$e->getMessage();
                        $log->error($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
                        die("");
                    }    
                    $id = $row['id'];

                    if(!empty($id)){
                        $mode = 'update';
                        $hsschool = $row['hsschool'];
                        $hsadd = $row['hsadd'];
                        $hsgraddate = $row['hsgraddate'];
                        $hsdate = explode("-", $hsgraddate);
                        $hsgraddate = $hsdate[1] .'/'.$hsdate[2].'/'.$hsdate[0];
                        if($hsgraddate=='00/00/0000'){
                            $hsgraddate = "";
                        }
                        $hsawards = $row['hsawards'];

                        $coluni = $row['coluni'];
                        $coladd = $row['coladd'];
                        $colgpa = $row['colgpa'];
                        $colgraddate = $row['colgraddate'];
                        $coldate = explode("-", $colgraddate);
                        $colgraddate = $coldate[1] .'/'.$coldate[2].'/'.$coldate[0];
                        if($colgraddate=='00/00/0000'){
                            $colgraddate = "";
                        }
                        $colmajor = $row['colmajor'];
                        $smcol = $row['colawards'];

                        $pgrad1uni = $row['pgrad1uni'];
                        $pgrad1add = $row['pgrad1add'];
                        $pgrad1gpa = $row['pgrad1gpa'];
                        $pgrad1graddate = $row['pgrad1graddate'];
                        $pgrad1date = explode("-", $pgrad1graddate);
                        $pgrad1graddate = $pgrad1date[1] .'/'.$pgrad1date[2].'/'.$pgrad1date[0];
                        if($pgrad1graddate=='00/00/0000'){
                            $pgrad1graddate = "";
                        }
                        $pgrad1course = $row['pgrad1course'];
                        $smpgrad1 = $row['pgrad1awards'];

                        $smothers = $row['othersawards'];


                    }
                    $first= true;
                    $offset = '';
                    if(!empty($pgrad1uni) && !empty($pgrad1course)){                    
                ?>
                
                 <div class=" col-md-9">
                     <div class="margin10">
                        <ul class="nopadmargin" style="list-style: none;">
                        <li><span class="resumesection h4weight"><?=$pgrad1course = $row['pgrad1course']?></span></li>
                        <li><span><?=$pgrad1uni?></span></li>    
                        <li><span><i><?=$months[$pgrad1date[1]-1]?>&nbsp;<?=$pgrad1date[0]?></i></span></li>
                        </ul>
                    </div>
                    <?php
                    if(!empty($smpgrad1)){
                        echo"<div class='margin10'>$smpgrad1</div>";
                    }
                    ?> 
                </div>
                <?php
                    $offset = 'col-md-offset-3 ';
                    }
                    
                    if(!empty($coluni) && !empty($colmajor)){
                ?>    
                <div class="<?=$offset?> col-md-9 ">
                    <div class="margin10">
                        <ul class="nopadmargin" style="list-style: none;">
                        <li><span class="resumesection h4weight"><?=$colmajor?></span></li>
                        <li><span><?=$coluni?></span></li>
                        <li><span><i><?=$months[$coldate[1]-1]?>&nbsp;<?=$coldate[0]?></i></span></li>
                        </ul>
                    </div>
                    <?php
                    if(!empty($smcol)){
                        echo"<div class='margin10'>$smcol</div>";
                    }
                    ?>                 
                </div>
                <?php
                    $offset = 'col-md-offset-3 ';
                    }
                    if(!empty($hsschool)){
                ?>    
                <div class="<?=$offset?> col-md-9 ">
                    <div class="margin10">
                        <ul class="nopadmargin" style="list-style: none;">
                        <li><span class="resumesection h4weight">High School</span></li>
                        <li><span><?=$hsschool?></span></li>
                        <li><span><i><?=$months[$hsdate[1]-1]?>&nbsp;<?=$hsdate[0]?></i></span></li>
                        </ul>
                    </div>
                    <?php
                    if(!empty($hsawards)){
                        echo"<div class='margin10'>$hsawards</div>";
                    }
                    ?>                   
                </div>
                <?php
                    $offset = 'col-md-offset-3 ';
                    }
                ?>
                
                <div class="col-md-12">
                     <hr class="nopadmargin h4weight">
                </div>
                
                <!-- Professional Trainings --> 
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
                <div class="col-md-12">
                     <hr class="nopadmargin h4weight">
                </div>
                <div class="col-md-3 ">
                    <div class="margin10">
                        <span class="resumesection"><i>Professional Trainings</i></span>
                    </div>
                </div>                
                <div class="col-md-9 ">
                     <div class="margin10">
                        <div align="left">
                            <?=$othersawards?>
                        </div>
                    </div>
                </div>
                <?php
                         }
                ?>
            </div>
    </div>
</body>
    
</html>
<?php
} else{
    include 'logout.php';
    
}
?>