<?php
if (session_status() == PHP_SESSION_NONE) {
        session_start();
        include 'Database.php';
}


if(isset($_SESSION['user'])){
   $user = $_SESSION['user'];
   $password = $_SESSION['password'];
   $userid = $_SESSION['userid'];
    
    
    $database = new Database();

    $database->query('SELECT * from skilltags where userid = :userid');
    $database->bind(':userid', $userid);   

    $row = $database->single();
    $id = $row['id'];
    $mode = 'insert';
}
?>
<script>
jQuery(document).ready(function ($) {
   
            $('body').addClass('profile-page');
    
});
</script>      

     
                    <div class="col-md-12">
         
                        <div class="profile-content">
	            <div class="container">
                        <div class="row">
	                    <div class="profile">
	                        <div class="avatar">
	                            <img src="img/christian.jpg" alt="Circle Image" class="img-circle img-responsive img-raised">
	                        </div>
	                        <div class="name">
	                            <h3 class="title">Christian Louboutin</h3>
								<h6>Designer</h6>
	                        </div>
	                    </div>
	                </div>
                
                            </div>
                        </div>
        
                        
                    </div>

