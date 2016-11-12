<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="author" content="">

    <title>jobsly – find your next adventure.</title>
<style>
body {
    font-family: "Lato", sans-serif;
}

</style>
        <?php
            include 'inc/resources.php';
        ?>
      <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    </head>
<body class="body">

        <?php
            include 'inc/sidenav.php';
        ?>
    
  
<div class="container-fluid">
    <?php
        $_GET['page'] = 'main';
        include 'inc/navbar.php';
    ?>
       
 
    
<div id="main">
 <div class="row-fluid rowfull">
      <!--
        <div class="col-md-12 col-centered red-border rowfull">            
                            <img  src="https://lh5.ggpht.com/NFYFP2H9CCP50vAQNLa7AtCj_mbbYmOzY978fZqd31oL5qOdvXgxU3KW8ek2VgvIOvTqWY0=w728" 
                                 alt="user">         

                </div>
            

            </div>
        -->
                

       <div class="row-fluid">
		<div class="col-md-12 ">
		
				<h1 class="h1custom">Resume</h1>
			
			<div class="row-fluid">
                <div class="col-md-2 col-xs-2 centerindiv quickviewdiv "><span class="glyphicon glyphicon-user quickviewicon"></span>
                   <div> <span class="quickview centerindiv">Personal Information</span></div>
				</div>
				<div class="col-md-2 col-xs-2 centerindiv quickviewdiv  "><span class="glyphicon glyphicon-star-empty quickviewicon"></span>
                    <div> <span class="quickview centerindiv">Job Expectation</span></div>
				</div>
				<div class="col-md-2 col-xs-2 centerindiv quickviewdiv "><span class="glyphicon glyphicon-education quickviewicon"></span>       <div> <span class="quickview centerindiv">Education</span></div>
				</div>
                <div class="col-md-2 col-xs-2 centerindiv quickviewdiv "><span class="glyphicon glyphicon-briefcase quickviewicon"></span>
                   <div> <span class="quickview centerindiv">Work Experience</span></div>
				</div>
				<div class="col-md-2 col-xs-2 centerindiv quickviewdiv "><span class="glyphicon glyphicon-asterisk quickviewicon"></span>
                    <div> <span class="quickview centerindiv">Other Information</span></div>
				</div>
				<div class="col-md-2 col-xs-2 centerindiv quickviewdiv "><span class="glyphicon glyphicon-file quickviewicon"></span>       <div> <span class="quickview centerindiv">Preview Resume</span></div>
				</div>
				
			</div>
            </div>
           </div>
            <div class="row-fluid">
                    <div class="col-md-9 welcomediv">
                        
                        <div class="row-fluid">
                                <div class="col-md-6 welcomediv">
                                            <div class="margin-generic  rounded-panel">
                                                    <div class="panel panel-default dropshadow">
                                                        <div class="panel-heading blue-generic-bg">
                                                            <h3 class="panel-title ">
                                                                Name
                                                            </h3>
                                                        </div>
                                                        <div class="panel-body">
                                                           <div class="input-group margin-generic-3">
                                                                        <span class="glyphicon glyphicon glyphicon-user input-group-addon info-input-group-addon" ></span>
                                                                        <input type="text" class="form-control" name="fname" id="fname" placeholder="First Name" />
                                                            </div>
                                                            
                                                            <div class="input-group margin-generic-3">
                                                                        <span class="glyphicon glyphicon glyphicon-user input-group-addon info-input-group-addon" ></span>
                                                                        <input type="text" class="form-control" name="lname" id="lname" placeholder="Last Name" />
                                                            </div>
                                                            
                                                            <div class="input-group margin-generic-3">
                                                                        <span class="glyphicon glyphicon glyphicon-user input-group-addon info-input-group-addon" ></span>
                                                                        <input type="text" class="form-control" name="mname" id="mname" placeholder="Middle Name" />
                                                            </div>
                                                        </div>                          
                                                    </div>
                                            </div>
                                </div>
                                <div class="col-md-6 welcomediv">
                                            <div class="margin-generic  rounded-panel">
                                                <div class="panel panel-default dropshadow">
                                                    <div class="panel-heading blue-generic-bg">
                                                        <h3 class="panel-title ">
                                                            Panel title
                                                        </h3>
                                                    </div>
                                                    <div class="panel-body">
                                                        Panel content
                                                    </div>                          
                                                </div>                            
                                            </div>
                                </div>
                        </div>
                                    

                                 
                    </div>
                    <div class="col-md-3">
                    </div>
	       </div>
		
           <!--
		<div class="col-md-3 red-border">
			<img alt="Bootstrap Image Preview" src="http://lorempixel.com/300/250/" /><img alt="Bootstrap Image Preview" src="http://lorempixel.com/300/250/" />
		</div>
            -->
	

    </div>  
    </div> 
    
    
    
</div>    <!--main-->
    

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

</script>
     <script src="js/mycustom.js"></script> 
   <!-- local
<script src="js/bootstrap.js"></script>    -->
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>

