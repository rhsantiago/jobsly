<?php
if (session_status() == PHP_SESSION_NONE) {
        session_start();
        // if (!isset($database)){
     //       include 'Database.php';
     //    }
}  

if(isset($_SESSION['user'])){
   $user = $_SESSION['user'];
   $password = $_SESSION['password'];
   $adminid = $_SESSION['adminid'];
  
   include 'admin-authenticate.php';
}
$msg = "";
if($ok == 1 ){
        date_default_timezone_set('Asia/Manila');
        $logtimestamp = date("Y-m-d H:i:s"); 
        include "serverlogconfig.php";
        

?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="img/favicon.ico">
	<link rel="icon" href="img/favicon.ico">
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
    
    <!--   Core JS Files   -->
	<script src="js/jquery.min.js" type="text/javascript"></script>
	<script src="js/bootstrap.min.js" type="text/javascript"></script>
	<script src="js/material.min.js"></script>

	<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
	<script src="js/nouislider.min.js" type="text/javascript"></script>

	<!-- Control Center for Material Kit: activating the ripples, parallax effects, scripts from the example pages etc -->
	<script src="js/material-kit.js" type="text/javascript"></script>
    <script src="js/admin-quotes.js" type="text/javascript"></script>
   
</head>

<body class="landing-page">
     <!-- Modal -->
	<div class="modal fullscreen-modal fade" id="viewquote-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog modal-lg" role="document">
	    <div class="modal-content modalcontent">
	      
	    </div>
	  </div>
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
                    <li><a href="admin-home.php" id="home"><i class="material-icons">home</i>Home</a></li>
                    <li class="dropdown active"><a href="admin-approvals.php" class="dropdown-toggle" data-toggle="dropdown" id="pinfo"><i class="material-icons">assignment_turned_in</i>Approvals<b class="caret"></b></a>
                         <ul class="dropdown-menu">
                                    <li><a href="admin-approvals.php?ajax=jobadsappr" id="jobadsappr"><i class="material-icons">flag</i>&nbsp;Job Ads</a></li>
                                    <li><a href="admin-approvals.php?ajax=empappr" id="empappr"><i class="material-icons">business</i>&nbsp;Employers</a></li>  
                                    <li><a href="admin-approvals.php?ajax=jseekerappr" id="jseekerappr"><i class="material-icons">people</i>&nbsp;Job Seekers</a></li>  
                         </ul> 
                    </li>
                    <li class="dropdown active"><a href="admin-jobads.php" class="dropdown-toggle" data-toggle="dropdown" id="pinfo"><i class="material-icons">work</i>Job Ads<b class="caret"></b></a>
                         <ul class="dropdown-menu">
                                    <li><a href="admin-jobads.php?ajax=alist" id="alist"><i class="material-icons">list</i>&nbsp;Active List</a></li>
                                    <li><a href="admin-jobads.php?ajax=ilist" id="ilist"><i class="material-icons">highlight_off</i>&nbsp;Inactive List</a></li>
                         </ul> 
                    </li>
                    <li class="dropdown active"><a href="admin-employers.php" class="dropdown-toggle" data-toggle="dropdown"><i class="material-icons">business</i>&nbsp;Employers<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="admin-employers.php?ajax=emplist" id="emplist"><i class="material-icons">list</i>&nbsp;List</a></li>
                            <li><a href="admin-employers.php?ajax=empjobads" id="empjobads"><i class="material-icons">work</i>&nbsp;Job Ads</a></li>
                        </ul>    
                    </li>
                    <li><a href="admin-jobseekers.php" id="jobseekers"><i class="material-icons">people</i>Jobseekers</a></li>
                    <li><a href="admin-quotes.php"><i class="material-icons">mood</i>&nbsp;Quotes</a></li>
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
            $database->query('select adminphoto,fname from adminaccounts where id=:userid');
            $database->bind(':userid', $adminid);   
            try {
                $row = $database->single();      
            }catch (PDOException $e) {
                $msg = $e->getTraceAsString()." ".$e->getMessage();
                $log->error($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
                die("");
            }
            $adminphoto = $row['adminphoto'];
            $fname = $row['fname'];            
            if(empty($adminphoto)){
                $adminphoto='img/unknown.png';
            }
      
    ?>
    <!--sidebar-->
   <div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
   <div class="center sidenavmargin">
                                <div class="avatar center">
                                        <img src="<?=$adminphoto?>" alt="Circle Image" width="100" height="100" class="img-circle img-responsive img-raised center">
                                    </div>
                                    <div class="name">
                                        <h4 class="sidenavname"><?=$fname?></h4>                                        
                                    </div>  
       </div>    
   <div class="sidebar-item"><a href="admin-home.php"><i class="material-icons">home</i>&nbsp;Home</a></div>    
   <div class="sidebar-item dropdown active"><a href="admin-approvals.php" class="dropdown-toggle" data-toggle="dropdown" id="pinfo"><i class="material-icons">assignment_turned_in</i>&nbsp;Approvals<b class="caret"></b></a>
            <ul class="dropdown-menu">
                                    <li><a href="admin-approvals.php?ajax=jobadsappr" id="jobadsappr"><i class="material-icons">flag</i>&nbsp;Job Ads</a></li>
                                    <li><a href="admin-approvals.php?ajax=empappr" id="empappr"><i class="material-icons">business</i>&nbsp;Employers</a></li>  
                                    <li><a href="admin-approvals.php?ajax=jseekerappr" id="jseekerappr"><i class="material-icons">people</i>&nbsp;Job Seekers</a></li>
                         </ul> 
    </div>
   <div class="sidebar-item dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="admin-jobads.php"><i class="material-icons">work</i>&nbsp;Job Ads<b class="caret"></b></a>
    <ul class="dropdown-menu">
                            <li><a href="admin-jobads.php?ajax=alist" id="alist"><i class="material-icons">list</i>&nbsp;Active List</a></li>
                            <li><a href="admin-jobads.php?ajax=ilist" id="ilist"><i class="material-icons">highlight_off</i>&nbsp;Inactive List</a></li>    
    </ul>
    </div>       
   <div class="sidebar-item dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="admin-employers.php"><i class="material-icons">business</i>&nbsp;Employers<b class="caret"></b></a>
    <ul class="dropdown-menu">
                            <li><a href="admin-employers.php?ajax=emplist" id="emplist"><i class="material-icons">list</i>&nbsp;List</a></li>
                            <li><a href="admin-employers.php?ajax=empjobads" id="empjobads"><i class="material-icons">work</i>&nbsp;Job Ads</a></li>    
    </ul>
    </div>
   <div class="sidebar-item"><a href="admin-jobseekers.php"><i class="material-icons">people</i>&nbsp;Jobseekers</a></div>
   <div class="sidebar-item"><a href="admin-quotes.php"><i class="material-icons">mood</i>&nbsp;Quotes</a></div>

</div>
  
     <!--sidebar-->
    <div id="main" class="wrapper ">
       

		<div class="main main-raised ">
         
			<div class="container-fluid"> <!-- with fluid for full width -->
                <div class="row-fluid">   <!-- with fluid for full width -->
                    
                    <div id="resume-main-body">                       

    <div class="row">
    <div class="col-md-12 center">            
               <!--
                    <div class="adstop">     <img  src="https://lh5.ggpht.com/NFYFP2H9CCP50vAQNLa7AtCj_mbbYmOzY978fZqd31oL5qOdvXgxU3KW8ek2VgvIOvTqWY0=w728" 
                                 alt="user">  
                     </div>    
        -->  
                           
     </div>
   
    <div class="col-md-12">
                             <h2 class="title">Quotes</h2>
       </div>
     </div>
    <div class="col-md-9">
                       
                <div class="section  section-landing">
	                 

					<div class="features">
						<div class="row">
                          <div class="col-md-12">
                              
                           <div class="allquotesdiv">
                               <section class="blog-post">
                                  <div class="panel panel-default" >
                                      <form method="post" id="quotes-form" name="quotes-form"> 
                                          <input type="hidden" id="adminid" name="adminid" value="<?=$adminid?>">      
                                       <div class="panel-body" >
                                           <div class="col-md-12">

                                             <div id="quotediv" class="form-group label-floating" >
                                                  <label class="control-label">Quote</label>
                                                  <input type="text" id="quote" name="quote" class="form-control searchform" value="">      
                                             </div>
                                               <div id="authordiv" class="form-group label-floating" >
                                                  <label class="control-label">Author</label>                                          
                                                  <input type="text" id="author" name="author" class="form-control searchform" value="">
                                             </div>
                                            </div>  
                                             <div class="col-md-12">
                                               <button class="btn btn-primary btn-sm" type="submit">Add</button>
                                                <div id="addsuccess" name="addsuccess" class="alert alert-success">
                                               
                                                  <div class="alert-icon">
                                                    <i class="material-icons">check</i>
                                                  </div>
                                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true"><i class="material-icons">clear</i></span>
                                                  </button>
                                                  <b>Alert: </b> Quote Added
                                            </div> 
                                           </div>
                                             </div>
                                            </form>
                                      
                                  </div>
                                </section> 
                               
                               
                               <section class="blog-post">
                                    <div class="panel panel-default">                                    
                                      <div class="panel-body jobad-bottomborder">
                                          <div><h4 class="text-primary h4weight">Quotes</h4></div>
                                    <div class="table-responsive">      
                                     <table id="quotestable" class="table table-hover table-condensed">
                                            <thead>
                                                <tr>
                                                    <th class="col-md-2">Author</th>  
                                                    <th class="col-md-8">Quote</th>                                                    
                                                    <th class="text-right">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody id="quotetablebody">
                              
                                        <?php
                                            $id='';
                                            
                                            $database->query('select * from quotes order by id desc');     
                                            try{
                                                $rows = $database->resultset();
                                            }catch (PDOException $e) {
                                                $msg = $e->getTraceAsString()." ".$e->getMessage();
                                                $log->error($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
                                                die("");
                                            }
                                            foreach($rows as $row){
                                                $qid = $row['id'];
                                                $quote = $row['quote'];
                                                $author = $row['author'];
                                                $quote = substr($quote,0,30);
                                       ?>
                                   
                                                <tr id="line<?=$qid?>">                                                   
                                                    <td><span class="h4weight"><?=$author?></span></td>
                                                    <td class=""><?=$quote?>...</td>       
                                                    <td class="td-actions text-right">
                                                <ul class="list-inline">
                                                        <li >
                                                            <a href="#viewquotemodal" data-qid="<?=$qid?>" data-mode="view" data-toggle="modal" data-target="#viewquote-modal" id="viewquote" title="View Quote" ><i class="fa fa-search-plus fa-2x text-info"></i></a>
                                                        </li>
                                                      
                                                        </ul>
                                                    </td>
                                                </tr>
                                            <?php                                               
                                            }
                                            ?>
                                                
                                            </tbody>
                                        </table>
                                        <div class="col-md-12">                                
                                             <div id="endofsearch" name="endofsearch" class="alert alert-warning">
                                               
                                                  <div class="alert-icon">
                                                    <i class="material-icons">check</i>
                                                  </div>
                                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true"><i class="material-icons">clear</i></span>
                                                  </button>
                                                  <b>Alert: </b> There doesn't seem to be anything here ¯\_(ツ)_/¯
                                                                 
                                               
                                            </div>
                                   
                                        </div>
                                        <div class="col-md-12 center">                                           
                                                <a id="jobseekerapprloadmore" name="jobseekerapprloadmore" class="btn btn-primary" data-search="<?=$search?>" data-next="<?=$next?>">Load More</a>
                                        </div>
                                      </div>    
                                        </div>  
                                    </div>
                                  </section>
                            
                                </div> 
                                
                                
                                
                            </div>                            
                      
                     <?php
                           
                            try{
                                $row = $database->single();
                            }catch (PDOException $e) {
                                 $msg = $e->getTraceAsString()." ".$e->getMessage();
                                 $log->error($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
                                 die("");
                             }
                            
                    ?>
                                
                  
                         
		                </div>
					</div>
	            </div>                         
                    </div>
                    
                    
                <div class="col-md-3 pull-right">
                        <!--
                          <div class="card card-ads adsright">                                            
                               <div class="content">
                                 <div class="row">
                                     <div class="col-md-12">
                                          
                                     </div>
                                   </div>
                                </div>
                          </div>
                    -->
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
});        
</script>

</html>
<?php
} else{
    include 'logout.php';
    
}
?>