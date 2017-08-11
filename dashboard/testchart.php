<?php


   $user = 'reggie1@gmail.com';  
   $userid = 28;
   $usertype = 1;

 include 'authenticate.php';

?>
<!doctype html>
<html lang="en">
<head>
   
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="../img/apple-icon.png">
	<link rel="icon" type="image/png" href="../img/favicon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Dashboard | jobsly</title>
    <meta name="description" content="Post job ads, view resumes, and get statistical data about your job ads as well as the industry all for free." />
 	<meta name="keywords" content="Jobs, Hiring, Career, Work, Resume, Call Center Jobs, Recruitment" />
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
    <link href="css/charts.css" rel="stylesheet"/>
    <link href="css/media.css" rel="stylesheet"/>
    <link href="css/summernote.css" rel="stylesheet"/>
    
    <!--   Core JS Files   -->
	<script src="js/jquery.min.js" type="text/javascript"></script>
	<script src="js/bootstrap.min.js" type="text/javascript"></script>
	<script src="js/material.min.js"></script>

	<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
	<script src="js/nouislider.min.js" type="text/javascript"></script>

	<!--  Plugin for the Datepicker, full documentation here: http://www.eyecon.ro/bootstrap-datepicker/ -->
	<script src="js/bootstrap-datepicker.js" type="text/javascript"></script>

	<!-- Control Center for Material Kit: activating the ripples, parallax effects, scripts from the example pages etc -->
	<script src="js/material-kit.js" type="text/javascript"></script>
    <script src="js/employer-main.js" type="text/javascript"></script>
    <script src="js/summernote.min.js" type="text/javascript"></script> 
    <script src="js/parsley.js"></script>
    <script src="js/canvasjs.min.js"></script>

  
    
</head>

<body class="landing-page">
 
     <!-- Modal -->
	<div class="modal fullscreen-modal fade" id="viewresume-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog modal-lg" role="document">
	    <div class="modal-content modalcontent">
	      
	    </div>
	  </div>
	</div>
    <div class="modal fullscreen-modal fade" id="invite-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog modal-lg" role="document">
	    <div class="modal-content modalcontent">
	      
	    </div>
	  </div>
	</div>
    <div class="modal fullscreen-modal fade" id="showjob-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog modal-lg" role="document">
	    <div class="modal-content modalcontent">
	      
	    </div>
	  </div>
	</div>
    <div class="modal fullscreen-modal fade" id="rejectapp-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog modal-lg" role="document">
	    <div class="modal-content modalcontent">
	      
	    </div>
	  </div>
	</div>
    <div class="modal fullscreen-modal fade" id="logoupload-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <form role="form"  action="uploadlogo-submit.php" method="post" enctype="multipart/form-data">         
            <input type="hidden" id="userid" name="userid" value="<?=$userid?>">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content modalcontent">
	        <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title text-primary h4weight" id="myModalLabel">Upload Company Logo</h4>
	      </div>
            <div id="modalrejectapp" class="modal-body">
            
            <div id="fileuploaddiv" class="">                 
                   <input type="file" id="fileToUpload" name="fileToUpload" class="">
                 </div> 
           </div>
            <div class="modal-footer blog-post">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        <button type="submit" class="btn btn-primary">Upload</button>
	      </div>
	    </div>
           
	  </div>
        </form>    
	</div>
    
    
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
               <i onclick="openNav()" class="leftofnavheader material-icons">menu</i>
        		<a class="navbar-brand logo" >jobsly</a>
        	</div>

        	<div class="collapse navbar-collapse" id="navigation-example">
        		<ul class="nav navbar-nav navbar-right">
                    <li><a href="employer-home.php" id="home"><i class="material-icons">home</i>Home</a></li>
                    <li><a href="searchresumes.php" id="home"><i class="material-icons">find_in_page</i>Resume&nbsp;Search</a></li>
                    <li class="dropdown active"><a href="employer-main.php" class="dropdown-toggle" data-toggle="dropdown" id="pinfo"><i class="material-icons">people</i>Applicants<b class="caret"></b></a>
                         <ul class="dropdown-menu">
                                    <li><a href="employer-main.php?ajax=ajposts"><i class="material-icons">flag</i>&nbsp;By Job Ad</a></li>
                                    <li><a href="employer-main.php?ajax=short"><i class="material-icons">sort</i>&nbsp;Shortlist</a></li>  
                                    <li><a href="employer-main.php?ajax=napp"><i class="material-icons">new_releases</i>&nbsp;New Applicants</a></li>                                 
                         </ul> 
                    </li>
                    <li class="dropdown active"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="material-icons">work</i>Job Ads<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="employer-jobads.php?ajax=ajads" id="ajads"><i class="material-icons">list</i>&nbsp;My Job Ads</a></li>
                            <li><a href="employer-jobads.php?ajax=pjobad" id="pjobad"><i class="material-icons">note_add</i>&nbsp;Post a Job Ad</a></li>
                            <li><a href="employer-jobads.php?ajax=jtemp" id="jtemp"><i class="material-icons">content_copy</i>&nbsp;Job Templates</a></li>
                            <li><a href="employer-jobads.php?ajax=essays" id="essays"><i class="material-icons">mode_edit</i>&nbsp;Essays</a></li>
                        </ul>    
                    </li>
                    <li class="divider"></li>
		            <li><a href="logout.php" id="logout"><i class="material-icons">do_not_disturb</i>Sign Out</a></li>
		            
    				
                </ul>    				
        	</div>
    	</div>
    </nav>



     <div class="header header-filter purple-header">
            <div class="container">
                <div class="row-fluid">
					<div class="col-md-11 margin-top-title col-md-offset-1">
                        <div class="row-fluid">
                            
                            <div id="resumesb" class="">  
                               
                            </div>
                            
                          
	                 </div>
                </div>
            </div>
            </div>
        </div>
    <!--sidebar-->
   <?php
            $database->query('select companyname,cperson,logo, industry from companyinfo where userid=:userid');
            $database->bind(':userid', $userid);   
            try {
                $row = $database->single();      
            }catch (PDOException $e) {
                $msg = $e->getTraceAsString()." ".$e->getMessage();
                $log->error($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
                die("");
            }
            $companyname = $row['companyname'];
            $cperson = $row['cperson'];
            $logo = $row['logo'];
            if(empty($logo)){
                $logo='img/unknown.png';
            }
            $industry = $row['industry'];       
      
    ?>
    <!--sidebar-->
   <div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
   <div class="center sidenavmargin">
                                <div class="avatar center">
                                        <img src="<?=$logo?>" alt="Circle Image" width="100" height="100" class="img-circle img-responsive img-raised center">
                                    </div>
                                    <div class="name">
                                        <h4 class="sidenavname"><?=$companyname?></h4>
                                        <h5 class="sidenavposition"><?=$cperson?></h5>
                                    </div>  
       </div>    
   <div class="sidebar-item"><a href="employer-home.php"><i class="material-icons">home</i>&nbsp;Home</a></div>
   <div class="sidebar-item"><a href="searchresumes.php"><i class="material-icons">find_in_page</i>&nbsp;Resume&nbsp;Search</a></div>        
   <div class="sidebar-item dropdown active"><a href="employer-main.php" class="dropdown-toggle" data-toggle="dropdown" id="pinfo"><i class="material-icons">people</i>&nbsp;Applicants<b class="caret"></b></a>
            <ul class="dropdown-menu">
                                    <li><a href="employer-main.php?ajax=ajposts"><i class="material-icons">flag</i>&nbsp;By Job Ad</a></li>
                                    <li><a href="employer-main.php?ajax=short"><i class="material-icons">sort</i>&nbsp;Shortlist</a></li>  
                                    <li><a href="employer-main.php?ajax=napp"><i class="material-icons">new_releases</i>&nbsp;New Applicants</a></li>
            </ul> 
    </div>
   <div class="sidebar-item dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="employer-jobads.php"><i class="material-icons">work</i>&nbsp;Job Ads<b class="caret"></b></a>
    <ul class="dropdown-menu">
                            <li><a href="employer-jobads.php?ajax=ajads" id="ajads"><i class="material-icons">list</i>&nbsp;My Job Ads</a></li>
                            <li><a href="employer-jobads.php?ajax=pjobad" id="pjobad"><i class="material-icons">note_add</i>&nbsp;Post a Job Ad</a></li>
                            <li><a href="employer-jobads.php?ajax=jtemp" id="jtemp"><i class="material-icons">content_copy</i>&nbsp;Job Templates</a></li>
                            <li><a href="employer-jobads.php?ajax=essays" id="essays"><i class="material-icons">mode_edit</i>&nbsp;Essays</a></li>
    </ul>
    </div>
  
   
</div>
  
     <!--sidebar-->
    <div id="main" class="wrapper ">
       

		<div class="main main-raised ">
         
			<div class="container-fluid"> <!-- with fluid for full width -->
                <div class="row-fluid">   <!-- with fluid for full width -->
                    
                    <div id="resume-main-body">                       
                                <?php


    $database = new Database();
    $database->query('SELECT id,companyname,companyaddress,cperson,logo,designation,cpersonemail,companywebsite,cpersontelno,industry from companyinfo where userid=:userid');
    $database->bind(':userid', $userid);
    try{
        $row = $database->single();
    }catch (PDOException $e) {
       $msg = $e->getTraceAsString()." ".$e->getMessage();
       $log->error($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
       die("");
    }
    $id = $row['id'];
    $companyname = $row['companyname'];
    $companyaddress = $row['companyaddress'];
    $cperson = $row['cperson'];
    $designation = $row['designation'];
    $cpersonemail = $row['cpersonemail'];
    $companywebsite = $row['companywebsite'];
    $cpersontelno = $row['cpersontelno'];
    $industry = $row['industry'];
    $logo = $row['logo'];

?>


    
    <div class="row">
    <div class="col-md-12 center">            
                  <!--  <div class="adstop">     <img  src="https://lh5.ggpht.com/NFYFP2H9CCP50vAQNLa7AtCj_mbbYmOzY978fZqd31oL5qOdvXgxU3KW8ek2VgvIOvTqWY0=w728" 
                                 alt="user">  
                     </div>    
                      -->     
     </div>
   
    <div class="col-md-12">
                             <h2 class="title">Home</h2>
       </div>
     </div>
                        <p></p>
                        
<?php
     $database->query("SELECT sum(impressions) as totalimpressions, sum(views) as totalviews from jobads WHERE userid=:userid and dateadded BETWEEN (CURDATE() - INTERVAL 30 DAY) AND CURDATE()");
     $database->bind(':userid', $userid);                                             
     try{
          $row = $database->single();
     }catch (PDOException $e) {
          $msg = $e->getTraceAsString()." ".$e->getMessage();
          $log->error($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
          die("");
     }
     $totalimpressions = $row['totalimpressions'];
     $totalviews = $row['totalviews'];
     $ctrrate =   ($totalviews / $totalimpressions) * 100;
     $ctrrate = number_format((float)$ctrrate, 2, '.', '');                    
?>                    
     <div class="row-fluid">
                  <div class="col-md-4" >
                        <div class="toptotals" >  
                               <div class="toptitles" >  
                                    Impressions (last 30 days)
                                </div>
                                <div class="topvalues" >  
                                    <?=$totalimpressions?>
                                </div>
                        </div>
                        

                          <div id="impressionschart" style="height: 250px; width: 90%;">
	                      </div>

                  </div>
                  <div class="col-md-4">
                             <div class="toptotals" >  
                                    <div class="toptitles" >  
                                    Views (last 30 days)
                                </div>
                                <div class="topvalues" >  
                                    <?=$totalviews?>
                                </div>
                            </div>
   
                  <div id="viewschart" style="height: 250px; width: 90%;">
	                      </div>
                  </div>   
                  <div class="col-md-4">
                             <div class="toptotals" >  
                                <div class="toptitles" >  
                                    Click Through Rate (last 30 days)
                                </div>
                                <div class="topvalues" >  
                                    <?=$ctrrate?>%
                                </div>
                            </div> 
                  <div id="ctrchart" style="height: 250px; width: 90%;">
	                      </div>   
                  </div>
    </div>
                  
         <div class="row-fluid">
              <div class="col-md-12 middlepanel margintop10">  
            <div class="col-md-7" >  
                
                                 <div class="table-responsive margintop10 tablediv">      
                                     <table class="table table-hover table-condensed">
                                            <thead class="tablehead">
                                                <tr align="left" class="infoblue font12 whitecolor">
                                                    <th >Job Title</th>
                                                    <th>Impressions</th>
                                                    <th>Views</th>
                                                    <th>Click<br>Through Rate</th>    
                                                    <th>Resume<br>Submissions</th>                                                  
                                                </tr>
                                            </thead>
                                            <tbody>
                       <?php
                                            $database->query('SELECT id,jobtitle,views,impressions,isactive from jobads where userid=:userid order by dateadded desc limit 0,5');
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
                                                $views = $row['views'];
                                                $impressions= $row['impressions'];
                                                $isactive= $row['isactive'];
                                                $ctr=0;
                                                if($views > 0 && $impressions > 0){
                                                    $ctr = ($views/$impressions) * 100;
                                                    $ctr = number_format((float)$ctr, 2, '.', '');
                                                }
                                                
                                                $database->query('SELECT count(jobapplications.id) as resumes from jobapplications where jobid=:jobid');
                                                $database->bind(':jobid', $id);
                                                try{
                                                    $row2= $database->single();
                                                }catch (PDOException $e) {
                                                   $msg = $e->getTraceAsString()." ".$e->getMessage();
                                                   $log->error($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
                                                   die("");
                                                }    
                                                $resumes = $row2['resumes'];
                                              
                                       ?>             
                                                                           
                                                <tr class="font12">
                                                    <td><?=$jobtitle?></td>       
                                                    <td><?=$impressions?></td> 
                                                    <td><?=$views?></td>
                                                    <td><?=$ctr?>%</td>
                                                    <td><?=$resumes?></td>
                                                   
                                                </tr>
                                             <?php
                                            }
                                            ?>
                                                                                            
                                            </tbody>
                                        </table>
                                
                                      </div>  
              
            </div>
            <div class="col-md-5 padleft-15" >
                <div class="">
                     <div id="chart4"  style="height: 300px; width: 80%;">
                     </div>
                </div>    
            </div>  
        </div>           
                               
     </div>
                        
    <div class="row-fluid">
                  <div class="col-md-4 margintop10" >                  
                          <div id="chart5" style="height: 250px; width: 90%;">
	                      </div>
                  </div>
                  <div class="col-md-8 margintop10 pull-right">
                          <div class="toptotals" >  
                               <div class="toptitles" >  
                                    Average Salary
                                </div>
                                <div class="topvalues" >  
                                    28,757.43
                                </div>
                        </div>
                          <div id="chart6" style="height: 250px; width: 85%;">
	                      </div>  
                  </div>
                
                 
    </div>                    
                        
                    </div> <!--resume main body-->        
                
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
<script type="text/javascript">
CanvasJS.addColorSet("jobslycolorset",
     [//colorSet Array
    "#55b559",
    "#a72abd",
    "#fbc53c",
    "#f55145",
    "#0ab1fc",
    ]);
    
<?php
     $database->query("SELECT dateadded, sum(impressions) as totimp from jobads WHERE userid=:userid and dateadded BETWEEN (CURDATE() - INTERVAL 30 DAY) AND CURDATE() group BY dateadded");
     $database->bind(':userid', $userid);                                             
     try{
          $rows = $database->resultset();
     }catch (PDOException $e) {
          $msg = $e->getTraceAsString()." ".$e->getMessage();
          $log->error($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
          die("");
     }
    
?>
    var chart1 = new CanvasJS.Chart("impressionschart",
    { 
      colorSet:  "jobslycolorset",    
      height:250,     
      backgroundColor: "#e7e7e7",
      animationEnabled: true,  
      axisY:{
        tickLength: 5,  
        includeZero: false,  
        interval: 50,
      },
      axisX:{
        tickLength: 5,   
        valueFormatString: "DD-MMM"
      },    
      title:{
      text: "Impressions",
      fontSize: 16,  
      },
       data: [
      {
        type: "line",
        lineThickness: 5,         
        markerType: "none",   
        dataPoints: [
    <?php
        $index=0;
        $num_rows = $database->rowCount(); 
        
        foreach($rows as $row){
            $dateadded = $row['dateadded'];
            $dadd = explode("-", $dateadded);
            $dateadded = $dadd[0].",". ($dadd[1]-1).",".$dadd[2];
            
            $totimp = $row['totimp'];
            
            echo "{ x: new Date(".$dateadded."), y: ".$totimp." }";
            if($index<$num_rows){
                echo ",";
            }
            $index++;
        }
    ?>    
       // { x: new Date(2012, 00, 1), y: 450 },
       // { x: new Date(2012, 01, 1), y: 414 },
       // { x: new Date(2012, 02, 1), y: 520 },
       // { x: new Date(2012, 03, 1), y: 460 },
      //  { x: new Date(2012, 04, 1), y: 450 }
        ]
      }
      ]
    });


    
    <?php
     $database->query("SELECT jobtitle, views from jobads WHERE userid=:userid and dateadded BETWEEN (CURDATE() - INTERVAL 30 DAY) AND CURDATE()");
     $database->bind(':userid', $userid);                                             
     try{
          $rows = $database->resultset();
     }catch (PDOException $e) {
          $msg = $e->getTraceAsString()." ".$e->getMessage();
          $log->error($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
          die("");
     }
 
    ?>
	var chart2 = new CanvasJS.Chart("viewschart",
	{  
        colorSet:  "jobslycolorset",
        height:250,     
        backgroundColor: "#e7e7e7",
		title:{
			text: "Views",
            fontSize: 16
		},
        animationEnabled: true,
		data: [
		{
			type: "doughnut",
            innerRadius: "60%", 
			startAngle: 60,
			toolTipContent: "{legendText}: {y} - <strong>#percent% </strong>",
			showInLegend: true,
          explodeOnClick: false, //**Change it to true
			dataPoints: [
                <?php
                    $index=0;
                    $num_rows = $database->rowCount(); 

                    foreach($rows as $row){
                        $jobtitle = $row['jobtitle'];
                        $views = $row['views'];

                        echo "{y: ".$views.", indexLabel: '".$jobtitle." #percent%', legendText: '".$jobtitle."' }";
                        if($index<$num_rows){
                            echo ",";
                        }
                        $index++;
                    }
                ?> 
			//	{y: 65899660, indexLabel: "Barack Obama #percent%", legendText: "Barack Obama" },
			//	{y: 60929152, indexLabel: "Mitt Romney #percent%", legendText: "Mitt Romney" },
			//	{y: 2175850,  indexLabel: "Others #percent%", legendText: "Others" }
                
			]
		}
		]
	});
    
    
    <?php
     $industrysearch = '%'.$industry.'%';
     $database->query("SELECT sum(impressions) as totimp, sum(views) as totviews from jobads
 inner join companyinfo on companyinfo.industry like :industry  and jobads.userid=companyinfo.userid and jobads.dateadded  BETWEEN (CURDATE() - INTERVAL 30 DAY) AND CURDATE()");
    // $database->bind(':userid', $userid);
     $database->bind(':industry', $industrysearch);  
     try{
          $row = $database->single();
     }catch (PDOException $e) {
          $msg = $e->getTraceAsString()." ".$e->getMessage();
         // $log->error($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
         echo $msg;
          die("");
     }
      $totimp = $row['totimp'];
      $totviews = $row['totviews'];
    
     $industryctr =   ($totviews / $totimp) * 100;
     $industryctr = number_format((float)$industryctr, 2, '.', ''); 
    
     $database->query("SELECT sum(impressions) as totimpuser, sum(views) as totviewsuser from jobads
 inner join companyinfo on companyinfo.industry like :industry and jobads.userid=:userid and jobads.userid=companyinfo.userid and jobads.dateadded  BETWEEN (CURDATE() - INTERVAL 30 DAY) AND CURDATE()");
     $database->bind(':userid', $userid);
     $database->bind(':industry', $industry);  
     try{
          $row = $database->single();
     }catch (PDOException $e) {
          $msg = $e->getTraceAsString()." ".$e->getMessage();
         // $log->error($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
         echo $msg;
          die("");
     }
      $totimpuser = $row['totimpuser'];
      $totviewsuser = $row['totviewsuser'];
      $userctr =   ($totviewsuser / $totimpuser) * 100;
      $userctr = number_format((float)$userctr, 2, '.', '');
    
    
    ?>
var chart3 = new CanvasJS.Chart("ctrchart", {
    
      height:250,     
      backgroundColor: "#e7e7e7",
      dataPointWidth: 100,
      animationEnabled: true,
				title: {
					text: "Click Through Rate - <?=$industry?>",
                    fontSize: 16
				},
				axisX: {
					interval: 10
				},				
				data: [{
					type: "column",
                    color: "#fbc53c",                
					indexLabelLineThickness: 2,
					dataPoints: [
						  { x: 10, y: <?=$industryctr?>,label: "Industry CTR" },
						  { x: 20, y: <?=$userctr?>,label: "Company CTR"}
					]
				}]
			});

    
var chart4 = new CanvasJS.Chart("chart4",
    {
       height:250,
       backgroundColor: "#CCCCCC",
       title:{
       text: "Average Resume Submissions",
       fontSize: 16,
       animationEnabled: true,    
      },
      axisY: {
          interval: 50,         
      },
      axisX: { 
          tickLength: 0,
          valueFormatString:  " ",
      },    
      data: [{        
        type: "bar",
        color: "#0ab1fc",
        showInLegend: true,  
        indexLabelFontColor: "white",
        legendText: "Industry CTR",  
        dataPoints: [
        { x: 10, indexLabel: "Marketing, advertising and PR",y: 171 },
        { x: 20, indexLabel: "Information technology",y: 155},
        { x: 30, indexLabel: "Creative arts and design",y: 150 },
        { x: 40, indexLabel: "Business, consulting and management",y: 165 },
        { x:50, indexLabel: "Accountancy, banking and finance", y: 195 }
        ]
      },
      {        
        type: "bar",
        color: "#81d0f4",  
        showInLegend: true,
        legendText: "Company CTR",
        dataPoints: [
        { x: 10, y: 71 },
        { x: 20, y: 55},
        { x: 30, y: 50 },
        { x: 40, y: 65 },
        { x:50, y: 95 }
        ]
      }        
      ]
    });
    
    
    var chart5 = new CanvasJS.Chart("chart5",
	{
        colorSet:  "jobslycolorset",    
        height:250,
        backgroundColor: "#e7e7e7",
        animationEnabled: true,
		title:{
			text: "jobsly Resume Distribution",
            fontSize: 16
		},
                animationEnabled: true,
		legend:{
			verticalAlign: "center",
			horizontalAlign: "right",
			fontSize: 12,
		},		
		data: [
		{        
			type: "pie",   
			indexLabel: "{label} {y}%",
			startAngle:-20,      
			showInLegend: true,
			toolTipContent:"{legendText} {y}%",
			dataPoints: [
				{  y: 83.24, legendText:"Education and Training"},
				{  y: 8.16, legendText:"Legal Services!"},
				{  y: 4.67, legendText:"Sciences"},
				{  y: 1.67, legendText:"Baidu"},       
				{  y: 0.98, legendText:"Others"}
			]
		}
		]
	});
   
    
    var chart6 = new CanvasJS.Chart("chart6",
	{
        colorSet:  "jobslycolorset",    
        height:250,
        animationEnabled: true,
        backgroundColor: "#e7e7e7",
		title:{
			text: "Employees Salary in a Company",
            fontSize: 16
		},
		axisY: {
			includeZero:false,
			title: "Salary in USD(Thousands)",
			interval: 50,
		}, 	
		data: [
		{
			type: "rangeBar",
			showInLegend: true,
			yValueFormatString: "$#0.##K",
			indexLabel: "{y[#index]}",
			legendText: "Department wise Min and Max Salary",
			dataPoints: [   // Y: [Low, High]
				{x: 10, y:[80, 110], label: "Data Scientist"},
				{x: 20, y:[95, 141], label: "Product Manager" },
				{x: 30, y:[98, 115], label: "Web Developer" },
				{x: 40, y:[90, 160], label: "Software Engineer"},
				{x: 50, y:[100,152], label: "Quality Assurance"}
			]
		}
		]
	});
	</script>  
	
    <script>
    var isClosed = true;
function openNav() {
    if(isClosed){
        document.getElementById("mySidenav").style.width = "200px";
        document.getElementById("main").style.marginLeft = "200px";
        isClosed = false;
    } else{
        closeNav();
    }
}

function closeNav() {
  
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("main").style.marginLeft= "0";
    isClosed = true;
}

$(document).ready(function() {
    // Optimalisation: Store the references outside the event handler:
    var $window = $(window);

    function checkWidth() {
        var windowsize = $window.width();
        if (windowsize >= 768) {        
          openNav();
        }
        if(windowsize < 768){        
            closeNav();
        }
    }
    // Execute on load
    checkWidth();
    // Bind event listener
    $(window).resize(checkWidth);
    chart1.render();
	chart2.render();
    chart3.render();
    chart4.render();
    chart5.render();
    chart6.render();
});        
</script>

</html>
