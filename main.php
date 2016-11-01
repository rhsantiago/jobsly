<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="author" content="">

    <title>jobsly – jobs for the modern world</title>
<style>
body {
    font-family: "Lato", sans-serif;
}

.sidenav {
    height: 100%;
    width: 0;
    position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
    background-color: #61489d;
    overflow-x: hidden;
    transition: 0.5s;
    padding-top: 60px;
}

.sidenav a {
    padding: 8px 8px 8px 32px;
    text-decoration: none;
    font-size: 25px;
    color: #818181;
    display: block;
    transition: 0.3s
}

.sidenav a:hover, .offcanvas a:focus{
    color: #f1f1f1;
}

.sidenav .closebtn {
    position: absolute;
    top: 0;
    right: 25px;
    font-size: 36px;
    margin-left: 50px;
}

#main {
    transition: margin-left .5s;
    padding: 16px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
  
}
    

</style>
        <?php
            include 'inc/resources.php';
        ?>
      
    </head>
<body>

<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="#">About</a>
  <a href="#">Services</a>
  <a href="#">Clients</a>
  <a href="#">Contact</a>
</div>
    
  
<div class="container">
    <?php
        $_GET['page'] = 'main';
        include 'inc/navbar.php';
    ?>
        
 
    
<div id="main">
 <div class="row-fluid">
      
        <div class="col-md-8 col-centered">            
                    <img  src="https://lh5.ggpht.com/NFYFP2H9CCP50vAQNLa7AtCj_mbbYmOzY978fZqd31oL5qOdvXgxU3KW8ek2VgvIOvTqWY0=w728" 
                         width='728' height="90" alt="user">         
          
		</div>
     <div class="col-md-4 col-centered">    
     </div>
	
    </div>

        <h1 class="h1custom">Masonry CSS with Bootstrap</h1>
        
<div class="row">

    <div class="item">       
        <div class="wrapper">            
            <div class="card radius shadowDepth1">
                <div class="card__image border-tlr-radius">
                    <img src="https://unsplash.it/400/200/?random" alt="image" class="border-tlr-radius">
                </div>

                <div class="card__content card__padding">
                    <div class="card__share">
                        <div class="card__social">  
                            <a class="share-icon facebook" href="#"><span class="fa fa-facebook"></span></a>
                            <a class="share-icon twitter" href="#"><span class="fa fa-twitter"></span></a>
                            <a class="share-icon googleplus" href="#"><span class="fa fa-google-plus"></span></a>
                        </div>

                        <a id="share" class="share-toggle share-icon" href="#"></a>
                    </div>

                    <div class="card__meta">
                        <a href="#" class="industry_meta">BPO/Call Centers</a>
                        <time>17th March</time>
                    </div>
                    <br>
                    <article class="card__article">
                        <h2 class="h2custom"><a href="#jobModal" data-toggle="modal" title="Technical Support Specialists - Level 3" id="1" data-target="#job-modal">Technical Support Specialists - Level 3</a></h2>
                        <br>
                        <p>
                            Minimum 2 years experience<br>
                            Great English spoken and written skills<br>
                            Amendable to night shift                       
                        </p>
                    </article>
                </div>

                <div class="card__action">
                    
                    <div class="card__author">
                        <img src="http://lorempixel.com/40/40/sports/" alt="user">
                        <div class="card__author-content">
                           <a href="#" class="industry_meta">CHAMP Cargosystems</a>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
            
    </div>
    
   
    </div>
    
    <div class="container">
  
        <div class="row">
             <div class="loadmore" id="loadmore">
       
            </div> 
        </div>
    </div>

<script>
    var isClosed = true;
function openNav() {
    if(isClosed){
        document.getElementById("mySidenav").style.width = "250px";
        document.getElementById("main").style.marginLeft = "250px";
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

