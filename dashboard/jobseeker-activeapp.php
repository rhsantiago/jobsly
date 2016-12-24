<?php


    if (session_status() == PHP_SESSION_NONE) {
        session_start();
        include 'Database.php';
    }

if(isset($_SESSION['user'])){
   $user = $_SESSION['user'];
   $password = $_SESSION['password'];
   $userid = $_SESSION['userid'];
    
 /* 
    $database = new Database();

    $database->query('SELECT * from jobads where userid = :userid');
    $database->bind(':userid', $userid);   

    $row = $database->single();
 

    $mode = 'insert';
   
 */    
}

?>

    
    <div class="row">
    <div class="col-md-12 center">            
                    <div class="adstop">     <img  src="https://lh5.ggpht.com/NFYFP2H9CCP50vAQNLa7AtCj_mbbYmOzY978fZqd31oL5qOdvXgxU3KW8ek2VgvIOvTqWY0=w728" 
                                 alt="user">  
                     </div>    
                           
     </div>
   
    <div class="col-md-12">
                             <h2 class="title">Active Applications</h2>
       </div>
     </div>
    <div class="col-md-offset-1 col-md-7">
                       
                <div class="section  section-landing">
	                 

					<div class="features">
						<div class="row">
                  
                         
		                     <div class="col-md-12">
                                
                                          
                                   
                            </div>
		                </div>
					</div>
	            </div>
                        
                        
                    
                        
                        
    </div>
                    
                    
                <div class="col-md-3 pull-right">
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


<script>
jQuery(document).ready(function ($) {

    
});       
</script>