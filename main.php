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
		
				<h1 class="h1custom">Dashboard</h1>
			
			<div class="row-fluid">
                <div class="col-md-2 col-xs-2 centerindiv quickviewdiv "><div class="material-icons  quickviewicon" style="font-size:28px;">check </div>
                   <div> <span class="quickview centerindiv">Active Applications</span></div>
				</div>
				<div class="col-md-2 col-xs-2 centerindiv quickviewdiv  "><div class="material-icons quickviewicon " style="font-size:28px;">mail</div>
                    <div> <span class="quickview centerindiv">Job Invitations</span></div>
				</div>
				<div class="col-md-2 col-xs-2 centerindiv quickviewdiv "><div class="material-icons quickviewicon" style="font-size:28px;">assignment_returned</div>       <div> <span class="quickview centerindiv">Saved Applications</span></div>
				</div>
                <div class="col-md-2 col-xs-2 centerindiv quickviewdiv "><div class="material-icons  quickviewicon" style="font-size:28px;">check </div>
                   <div> <span class="quickview centerindiv">Active Applications</span></div>
				</div>
				<div class="col-md-2 col-xs-2 centerindiv quickviewdiv "><div class="material-icons quickviewicon" style="font-size:28px;">mail</div>
                    <div> <span class="quickview centerindiv">Job Invitations</span></div>
				</div>
				<div class="col-md-2 col-xs-2 centerindiv quickviewdiv "><div class="material-icons quickviewicon" style="font-size:28px;">assignment_returned</div>       <div> <span class="quickview centerindiv">Saved Applications</span></div>
				</div>
				
			</div>
            </div>
           </div>
            <div class="row-fluid">
                    <div class="col-md-9 welcomediv">
                        <div class="jumbotron well dropshadow">
                            <h1 class="h1custom">
                                Thank you for starting your next adventure with jobsly!
                            </h1>
                            <p>
                                This is a template for a simple marketing or informational website. It includes a large callout called the hero unit and three supporting pieces of content. Use it as a starting point to create something more unique.
                            </p>
                            <p>
                                <a class="btn btn-primary btn-large" href="#">Learn more</a>
                            </p>
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

