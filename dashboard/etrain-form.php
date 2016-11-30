<?php
if (session_status() == PHP_SESSION_NONE) {
        session_start();
        include 'Database.php';
}

 

$hsschool = "";
$hsadd = "";
$hsgraddate = "";
$hsawards ="";

if(isset($_SESSION['user'])){
   $user = $_SESSION['user'];
   $password = $_SESSION['password'];
   $userid = $_SESSION['userid'];
    
    
    $database = new Database();

    $database->query('SELECT * from educationandtraining where userid = :userid');
    $database->bind(':userid', $userid);   

    $row = $database->single();
    $id = $row['id'];
    
    if(!empty($id)){
        $mode = 'update';
        $hsschool = $row['hsschool'];
        $hsadd = $row['hsadd'];
        $hsgraddate = $row['hsgraddate'];
        $hsdate = explode("-", $hsgraddate);
        $hsgraddate = $hsdate[1] .'/'.$hsdate[2].'/'.$hsdate[0];
        $hsawards = $row['hsawards'];
               
    }else{
        $mode = 'insert';
    }
}
?>


     <form method="post" id="etrain-form" name="etrain-form" data-parsley-validate> 
                                 <input type="hidden" id="userid" name="userid" value="<?=$userid?>">
                                 <input type="hidden" id="mode" name="mode" value="<?=$mode?>">
                    <div class="col-md-9 ">
                        <div class="col-md-12">            
                       <!--     <img  src="https://lh5.ggpht.com/NFYFP2H9CCP50vAQNLa7AtCj_mbbYmOzY978fZqd31oL5qOdvXgxU3KW8ek2VgvIOvTqWY0=w728" 
                                 alt="user">         
                        -->
                             <h2 class="title">Education &amp; Training</h2>
                        </div>
                       
                <div class="section  section-landing">
	         
					<div class="features">
						<div class="row">
		                    <div class="col-md-12">
                                      
                                
                            
                                    <div class="card card-nav-tabs">
                                            <div id="tabtitle" class="header  header-success">
                                                <!-- colors: "header-primary", "header-info", "header-success", "header-warning", "header-danger" -->
                                                <div class="nav-tabs-navigation">
                                                    <div class="nav-tabs-wrapper">
                                                        <ul class="nav nav-tabs" data-tabs="tabs">
                                                            <li class="active">
                                                                <a href="#hs" data-toggle="tab">
                                                                    <i class="material-icons">people</i>High School
                                                                </a>
                                                            </li>
                                                            <li class="">
                                                                <a href="#col" data-toggle="tab">
                                                                    <i class="material-icons">account_balance</i>College
                                                                </a>
                                                            </li>
                                                            <li class="">
                                                                <a href="#pgrad1" data-toggle="tab">
                                                                    <i class="material-icons">location_city</i>Post Graduate
                                                                </a>
                                                            </li>
                                                            
                                                        </ul>
                                                    </div>
                                                </div>
                                          </div>
                                             <div class="content">
                                                    <div class="tab-content">
                                                        <div class="tab-pane active" id="hs">
                                                            <div class="row">
                                                                  <div class="col-md-6 col-xs-6">
                                                                    <div class="form-group label-floating">
                                                                        <label class="control-label">School</label>
                                                                        <input type="text" id="hsschool" class="form-control" value="<?=$hsschool?>" data-parsley-required>
                                                                    </div>
                                                                    <div id="" class="form-group label-floating">
                                                                        <label class="control-label">School Address</label>
                                                                        <input type="text" id="hsadd" class="form-control" value="<?=$hsadd?>" data-parsley-required>
                                                                    </div>                                                                  
                                                                </div>
                                                                <div class="col-md-6 col-xs-6">                                                                   
                                                                    <div id="enddiv" class="form-group label-static">
                                                                        <label class="control-label">Graduation Date</label>
                                                                        <input type='text' id='hsgraddate' class='datepicker form-control' value="<?=$hsgraddate?>" data-parsley-required data-parsley-pattern="^((((0[13578])|(1[02]))[\/]?(([0-2][0-9])|(3[01])))|(((0[469])|(11))[\/]?(([0-2][0-9])|(30)))|(02[\/]?[0-2][0-9]))[\/]?\d{4}$">
                                                                    </div>                                                                    
                                                                </div>
                                                                <div class="col-md-12 col-xs-12">
                                                                    <hr>
                                                                   <h6><label>Awards/Recognition</label></h6>
                                                                    <div id="smhs"><?=$hsawards?></div>
                                                                    
                                                                          <script>
                                                                            $(document).ready(function() {
                                                                               $('#smhs').summernote({
                                                                                      toolbar: [
                                                                                        // [groupName, [list of button]]
                                                                                        ['style', ['bold', 'italic', 'underline', 'clear']],                       
                                                                                        ['fontsize', ['fontsize']],
                                                                                        ['color', ['color']],
                                                                                        ['para', ['ul', 'ol', 'paragraph']],
                                                                                        ['height', ['height']]
                                                                                      ]
                                                                                    });
                                                                            });
                                                                            </script>

                                                                </div>
                                                        
                                                            </div>
                                                        </div>
                                                       <div class="tab-pane" id="col">
                                                            <div class="row">
                                                                  <div class="col-md-6 col-xs-6">
                                                                    <div class="form-group label-floating">
                                                                        <label class="control-label">College/University</label>
                                                                        <input type="text" id="coluni" class="form-control" data-parsley-required>
                                                                    </div>
                                                                    <div id="" class="form-group label-floating">
                                                                        <label class="control-label">College/University Address</label>
                                                                        <input type="text" id="coladd" class="form-control" data-parsley-required>
                                                                    </div>
                                                                      <div id="" class="form-group label-floating">
                                                                        <label class="control-label">GPA</label>
                                                                        <input type="text" id="colgpa" class="form-control">
                                                                    </div> 
                                                                </div>
                                                                <div class="col-md-6 col-xs-6">                                                                   
                                                                    <div id="enddiv" class="form-group label-static">
                                                                        <label class="control-label">Graduation Date</label>
                                                                        <input type='text' id='colgraddate' class='datepicker form-control' data-parsley-required data-parsley-pattern="^((((0[13578])|(1[02]))[\/]?(([0-2][0-9])|(3[01])))|(((0[469])|(11))[\/]?(([0-2][0-9])|(30)))|(02[\/]?[0-2][0-9]))[\/]?\d{4}$">
                                                                    </div>   
                                                                    <div id="" class="form-group label-floating">
                                                                        <label class="control-label">Major/Course</label>
                                                                        <input type="text" id="colmajor" class="form-control" data-parsley-required>
                                                                    </div>   
                                                                </div>
                                                                 <div class="col-md-12 col-xs-12">
                                                                    <hr>
                                                                   <h6><label>Awards/Recognition</label></h6>
                                                                    <div id="smcol"></div>
                                                                    
                                                                          <script>
                                                                            $(document).ready(function() {
                                                                               $('#smcol').summernote({
                                                                                      toolbar: [
                                                                                        // [groupName, [list of button]]
                                                                                        ['style', ['bold', 'italic', 'underline', 'clear']],                       
                                                                                        ['fontsize', ['fontsize']],
                                                                                        ['color', ['color']],
                                                                                        ['para', ['ul', 'ol', 'paragraph']],
                                                                                        ['height', ['height']]
                                                                                      ]
                                                                                    });
                                                                            });
                                                                            </script>

                                                                </div>
                                                                
                                                            </div>
                                                        </div>
                                               <!--          <div class="tab-pane" id="pgrad1">
                                                            <div class="row">
                                                                  <div class="col-md-6 col-xs-6">
                                                                    <div class="form-group label-floating">
                                                                        <label class="control-label">Institute/University</label>
                                                                        <input type="text" id="pgrad1uni" class="form-control" data-parsley-required>
                                                                    </div>
                                                                    <div id="" class="form-group label-floating">
                                                                        <label class="control-label">Institute/University Address</label>
                                                                        <input type="text" id="pgrad1add" class="form-control" data-parsley-required>
                                                                    </div>
                                                                      <div id="" class="form-group label-floating">
                                                                        <label class="control-label">GPA</label>
                                                                        <input type="text" id="pgrad1gpa" class="form-control">
                                                                    </div> 
                                                                </div>
                                                                <div class="col-md-6 col-xs-6">                                                                   
                                                                    <div id="enddiv" class="form-group label-static">
                                                                        <label class="control-label">Graduation Date</label>
                                                                        <input type='text' id='pgrad1graddate' class='datepicker form-control' data-parsley-required data-parsley-pattern="^((((0[13578])|(1[02]))[\/]?(([0-2][0-9])|(3[01])))|(((0[469])|(11))[\/]?(([0-2][0-9])|(30)))|(02[\/]?[0-2][0-9]))[\/]?\d{4}$">
                                                                    </div>   
                                                                    <div id="" class="form-group label-floating">
                                                                        <label class="control-label">Masters/Doctorate Course</label>
                                                                        <input type="text" id="pgrad1course" class="form-control" data-parsley-required>
                                                                    </div>   
                                                                </div>
                                                                 <div class="col-md-12 col-xs-12">
                                                                    <hr>
                                                                   <h6><label>Awards/Recognition</label></h6>
                                                                    <div id="smpgrad1"></div>
                                                                    
                                                                          <script>
                                                                            $(document).ready(function() {
                                                                               $('#smpgrad1').summernote({
                                                                                      toolbar: [
                                                                                        // [groupName, [list of button]]
                                                                                        ['style', ['bold', 'italic', 'underline', 'clear']],                       
                                                                                        ['fontsize', ['fontsize']],
                                                                                        ['color', ['color']],
                                                                                        ['para', ['ul', 'ol', 'paragraph']],
                                                                                        ['height', ['height']]
                                                                                      ]
                                                                                    });
                                                                            });
                                                                            </script>

                                                                </div>
                                                                
                                                            </div>
                                                        </div>  
                                                        -->
                                                    </div>
                                                 
                                                   

                                                    </div>
                                             </div>
                            
                               
                                <button class="btn btn-primary " name="addetrain" id="addetrain" type="submit">
                                                        Save Education &amp; Training
                                                       </button>
                                  <div id="successdivworkexp" class="alert alert-success">
                                               
                                                  <div class="alert-icon">
                                                    <i class="material-icons">check</i>
                                                  </div>
                                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true"><i class="material-icons">clear</i></span>
                                                  </button>
                                                  <b>Alert: </b> Your dducation &amp; training has been saved.
                                               
                                            </div>
                                 
                             
		                    </div>
                            
                            <div class="col-md-6">
                             <!--       
                                <button class="btn btn-primary " name="addwexp" id="addwexp" type="submit">
                                                        Add Work Experience
                                                       </button>
                            -->
		                    </div>
		                    
		                </div>
					</div>
	            </div>
                        
                        
                    
                     
                        
                    </div>
                    
                    
                <div class="col-md-3">
                    
                                                    <div class="card adsright">                                            
                                                             <div class="content">
                                                                                                                                       
                                                                            <div class="row">
                                                                                <div class="col-md-12">
                                                                                    <img alt="Bootstrap Image Preview" src="img/ad1.jpg" width="300" height="250" class="img-responsive" style="padding-top: 5px"/><img alt="Bootstrap Image Preview" src="http://lorempixel.com/300/250/" class="img-responsive" style="padding-top: 5px"/>
                                                                                </div>
                                                                               
                                                                            
                                                                            </div>
                                                                      
                                                             </div>
                                                    </div>
                        
		       </div> 
    </form>

        
