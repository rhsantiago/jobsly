<?php
if (session_status() == PHP_SESSION_NONE) {
        session_start();
        include 'Database.php';
}


if(isset($_SESSION['user'])){
   $user = $_SESSION['user'];
   $password = $_SESSION['password'];
   $userid = $_SESSION['userid'];
    date_default_timezone_set('Asia/Manila');
    $logtimestamp = date("Y-m-d H:i:s");
    include "serverlogconfig.php";
    $database = new Database();

    $database->query('SELECT * from skilltags where userid = :userid');
    $database->bind(':userid', $userid);   
    try{
        $row = $database->single();
    }catch (PDOException $e) {
        $msg = $e->getTraceAsString()." ".$e->getMessage();
        $log->error($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
        die("");
    }     
    $id = $row['id'];
    $mode = 'insert';
}else{
    header("Location: logout.php");
}
?>

<div class="row"> 
<div class="col-md-12 center">            
  <div class="adstop"><img  src="https://lh5.ggpht.com/NFYFP2H9CCP50vAQNLa7AtCj_mbbYmOzY978fZqd31oL5qOdvXgxU3KW8ek2VgvIOvTqWY0=w728" alt="user">   </div>
</div> 
<div class="col-md-12">  
     <h2 class="title">Skills</h2>
</div>     
</div>
                    <div class="col-md-offset-1 col-md-7">
                        
                       
                <div class="section  section-landing">
	         
					<div class="features">
						<div class="row">
		                    <div class="col-md-12">
                                      
                                
                            
                                    <div class="card card-nav-tabs cardtopmargin">
                                            <div id="tabtitle" class="header  header-success">
                                                <!-- colors: "header-primary", "header-info", "header-success", "header-warning", "header-danger" -->
                                                <div class="nav-tabs-navigation">
                                                    <div class="nav-tabs-wrapper">
                                                        <ul class="nav nav-tabs" data-tabs="tabs">
                                                            <li class="active">
                                                                <a href="#hs" data-toggle="tab">
                                                                    <i class="material-icons">people</i>Skill Tags
                                                                </a>
                                                            </li>                                                           
                                                            
                                                        </ul>
                                                    </div>
                                                </div>
                                          </div>
                                             <div class="content">
                                                    <div class="tab-content">
                                                        
                                                        <div class="tab-pane active" id="skills">
                                                            <form method="post" id="skills-skilltag-form" name="skills-skilltag-form" data-parsley-validate> 
                                                             <input type="hidden" id="userid" name="userid" value="<?=$userid?>">
                                                             <input type="hidden" id="skills" name="mode" value="skilltag">
                                                             <input type="hidden" id="mode" name="mode" value="<?=$mode?>">
                                                            <div class="row">
                                                                <div class="col-md-12 col-xs-12">
                                                                 The skill tags are used by employers to narrow down their candidate search by skills. Make sure to enter all your relevant skills! The system auto creates the tag for you so type with spaces. Click on a skill to delete.
                                                                </div>
                                                                  <div class="col-md-6 col-xs-6">
                                                                    <div id="skilldiv" class="form-group label-floating">
                                                                        <label class="control-label">Skill</label>
                                                                        <input type="text" id="skill" class="form-control" data-parsley-required>
                                                                    </div>
                                                                                                                                   
                                                                </div>
                                                                <div class="col-md-6 col-xs-6">                                                                   <div id="skilltagdiv" class="form-group label-floating">
                                                                      
                                                                        <input type="text" id="skilltag" class="form-control" value="" disabled >
                                                                    </div>                               
                                                                </div>
                                                                <div class="col-md-12 col-xs-12">
                                                                    
                                                                    <button class="btn btn-primary " name="addskill" id="addskill" type="submit">
                                                        Save Skill
                                                       </button>
                                                                    <hr>
                                                                    Skilltags:
                                                                    <div id="skilltagsdiv" class="text-info">
                                                                     <?php
                                                    $database->query('SELECT * FROM skilltags where userid = :userid');
                                                    $database->bind(':userid', $userid);  
                                                    try{                
                                                        $rows = $database->resultset();
                                                    }catch (PDOException $e) {
                                                        $msg = $e->getTraceAsString()." ".$e->getMessage();
                                                        $log->error($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
                                                        die("");
                                                    } 
                                                    foreach($rows as $row){
                                                        $skillid = $row['id'];
                                                        $skilltag = $row['skilltag'];
                                                        
                                                        echo "<span id='$skillid'><a href='#skills-modal-del' class='text-info' data-userid='$userid' data-skillid='$skillid' data-skilltag='$skilltag' data-toggle='modal' data-target='#skills-modal-del'>$skilltag</a></span> ";
                                               
                                                    }
                                             ?>      
                                                                     </div>
                                                                </div>
                                                        
                                                            </div>
                                                        </form>        
                                                        </div>
                                                        
                                                    </div>
                                                 
                                                    </div>
                                             </div>
                            
                              <form method="post" id="skillsnext-form" name="skillsnext-form"> 
                             <button class="btn btn-primary " name="skillsnext" id="skillsnext" type="submit">
                                                        Go to Next Step
                                                       </button>
                                </form>
                                  <div id="successdivskillstag" class="alert alert-success">
                                               
                                                  <div class="alert-icon">
                                                    <i class="material-icons">check</i>
                                                  </div>
                                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true"><i class="material-icons">clear</i></span>
                                                  </button>
                                                  <b>Alert: </b> Your skill has been saved.
                                               
                                            </div>
                                 
		                    </div>
                            
                            <div class="col-md-6">
                                
                                
                          
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
 
<script src="js/jquery.easy-autocomplete.min.js"></script> 
<link rel="stylesheet" href="css/easy-autocomplete.min.css"> 
<script>
jQuery(document).ready(function ($) {
    $('html, body').animate({ scrollTop: 0 }, 'fast');
    $('#skills-skilltag-form #skill').parsley().on('field:error', function() {
           $('#skills-skilltag-form #skilldiv').addClass('has-error');
           $('#skills-skilltag-form #skilldiv').append("<span class='material-icons form-control-feedback'>clear</span>");   
    });    
    $('#skills-skilltag-form #skill').parsley().on('field:success', function() {
            $('#skills-skilltag-form #skilldiv').addClass('has-success');
            $('#skills-skilltag-form #skilldiv').find('span').remove()
            $('#skills-skilltag-form #skilldiv').append("<span class='material-icons form-control-feedback'>done</span>");   
    });
      $('#resume-main-body #successdivskillstag').hide();
    /*
    $("#skills-skilltag-form #skill").keyup(function(){
    var trimmed = $("#skills-skilltag-form #skill").val();
    trimmed = trimmed.replace(/\s+/g, '');
        $("#skills-skilltag-form #skilltag").val('#' + trimmed);
    });
   */ 
    var options = {
	url: "json/skilltags.json",
	getValue: "name",
	list: {
		match: {
			enabled: true
		       }
	       }
    }

$("#skill").easyAutocomplete(options);
    
});
</script>    