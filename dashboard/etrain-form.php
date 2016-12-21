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
        
               
    }else{
        $mode = 'insert';
    }
}
?>


     
                    <div class="col-md-offset-1 col-md-7">
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
                                                            <li class="">
                                                                <a href="#others" data-toggle="tab">
                                                                    <i class="material-icons">note_add</i>Others
                                                                </a>
                                                            </li>
                                                            
                                                        </ul>
                                                    </div>
                                                </div>
                                          </div>
                                             <div class="content">
                                                    <div class="tab-content">
                                                        
                                                        <div class="tab-pane active" id="hs">
                                                            <form method="post" id="etrain-hs-form" name="etrain-hs-form" data-parsley-validate> 
                                                             <input type="hidden" id="userid" name="userid" value="<?=$userid?>">
                                                             <input type="hidden" id="etrain" name="mode" value="hs">
                                                             <input type="hidden" id="mode" name="mode" value="<?=$mode?>">
                                                            <div class="row">
                                                                  <div class="col-md-6 col-xs-6">
                                                                    <div id="hsschooldiv" class="form-group label-floating">
                                                                        <label class="control-label">School</label>
                                                                        <input type="text" id="hsschool" class="form-control" value="<?=$hsschool?>" data-parsley-required>
                                                                    </div>
                                                                    <div id="hsadddiv" class="form-group label-floating">
                                                                        <label class="control-label">School Address</label>
                                                                        <input type="text" id="hsadd" class="form-control" value="<?=$hsadd?>" data-parsley-required>
                                                                    </div>                                                                  
                                                                </div>
                                                                <div class="col-md-6 col-xs-6">                                                                   
                                                                    <div id="hsgraddatediv" class="form-group label-static">
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
                                                                                      ],
                                                                                      callbacks: {
                                                                                      onPaste: function (e) {
                                                                                          var bufferText = ((e.originalEvent || e).clipboardData || window.clipboardData).getData('Text');

                                                                                          e.preventDefault();

                                                                                          // Firefox fix
                                                                                          setTimeout(function () {
                                                                                              document.execCommand('insertText', false, bufferText);
                                                                                          }, 10);
                                                                                      }
                                                                                    }  
                                                                                    });
                                                                            });
                                                                            </script>
                                                                    <button class="btn btn-primary " name="addetrain" id="addetrain" type="submit">
                                                        Save High School Details
                                                       </button>
                                                                </div>
                                                        
                                                            </div>
                                                        </form>        
                                                        </div>
                                                        
                                                        
                                                   
                                                       <div class="tab-pane" id="col">
                                                           <form method="post" id="etrain-col-form" name="etrain-col-form" data-parsley-validate> 
                                                             <input type="hidden" id="userid" name="userid" value="<?=$userid?>">
                                                             <input type="hidden" id="etrain" name="mode" value="col">
                                                             <input type="hidden" id="mode" name="mode" value="<?=$mode?>">     
                                                            <div class="row">
                                                                  <div class="col-md-6 col-xs-6">
                                                                    <div id="colunidiv" class="form-group label-floating">
                                                                        <label class="control-label">College/University</label>
                                                                        <input type="text" id="coluni" class="form-control" value="<?=$coluni?>" data-parsley-required>
                                                                    </div>
                                                                    <div id="coladddiv" class="form-group label-floating">
                                                                        <label class="control-label">College/University Address</label>
                                                                        <input type="text" id="coladd" class="form-control" value="<?=$coladd?>" data-parsley-required>
                                                                    </div>
                                                                      <div id="colgpadiv" class="form-group label-floating">
                                                                        <label class="control-label">GPA</label>
                                                                        <input type="text" id="colgpa" value="<?=$colgpa?>" class="form-control">
                                                                    </div> 
                                                                </div>
                                                                <div class="col-md-6 col-xs-6">                                                                   
                                                                    <div id="colgraddatediv" class="form-group label-static">
                                                                        <label class="control-label">Graduation Date</label>
                                                                        <input type='text' id='colgraddate' value="<?=$colgraddate?>" class='datepicker form-control' data-parsley-required data-parsley-pattern="^((((0[13578])|(1[02]))[\/]?(([0-2][0-9])|(3[01])))|(((0[469])|(11))[\/]?(([0-2][0-9])|(30)))|(02[\/]?[0-2][0-9]))[\/]?\d{4}$">
                                                                    </div>   
                                                                    <div id="colmajordiv" class="form-group label-floating">
                                                                        <label class="control-label">Major/Course</label>
                                                                        <input type="text" id="colmajor" class="form-control" value="<?=$colmajor?>" data-parsley-required>
                                                                    </div>   
                                                                </div>
                                                                 <div class="col-md-12 col-xs-12">
                                                                    <hr>
                                                                   <h6><label>Awards/Recognition</label></h6>
                                                                    <div id="smcol"><?=$smcol?></div>
                                                                    
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
                                                                                      ],
                                                                                      callbacks: {
                                                                                      onPaste: function (e) {
                                                                                          var bufferText = ((e.originalEvent || e).clipboardData || window.clipboardData).getData('Text');

                                                                                          e.preventDefault();

                                                                                          // Firefox fix
                                                                                          setTimeout(function () {
                                                                                              document.execCommand('insertText', false, bufferText);
                                                                                          }, 10);
                                                                                      }
                                                                                    }
                                                                                    });
                                                                            });
                                                                            </script>
                                                                   <button class="btn btn-primary " name="addetrain" id="addetrain" type="submit">
                                                        Save College Details
                                                       </button>     
                                                                </div>
                                                                
                                                            </div>
                                                               </form>
                                                        </div>
                                                        
                                                        
                                                    
                                                        <div class="tab-pane" id="pgrad1">
                                                             <form method="post" id="etrain-pgrad1-form" name="etrain-pgrad1-form" data-parsley-validate> 
                                                             <input type="hidden" id="userid" name="userid" value="<?=$userid?>">
                                                             <input type="hidden" id="etrain" name="mode" value="pgrad1">
                                                             <input type="hidden" id="mode" name="mode" value="<?=$mode?>">   
                                                            <div class="row">
                                                                  <div class="col-md-6 col-xs-6">
                                                                    <div id="pgrad1unidiv" class="form-group label-floating">
                                                                        <label class="control-label">Institute/University</label>
                                                                        <input type="text" id="pgrad1uni" class="form-control" value="<?=$pgrad1uni?>" data-parsley-required>
                                                                    </div>
                                                                    <div id="pgrad1adddiv" class="form-group label-floating">
                                                                        <label class="control-label">Institute/University Address</label>
                                                                        <input type="text" id="pgrad1add" class="form-control" value="<?=$pgrad1add?>" data-parsley-required>
                                                                    </div>
                                                                      <div id="pgrad1gpadiv" class="form-group label-floating">
                                                                        <label class="control-label">GPA</label>
                                                                        <input type="text" id="pgrad1gpa" value="<?=$pgrad1gpa?>" class="form-control">
                                                                    </div> 
                                                                </div>
                                                                <div class="col-md-6 col-xs-6">                                                                   
                                                                    <div id="pgrad1graddatediv" class="form-group label-static">
                                                                        <label class="control-label">Graduation Date</label>
                                                                        <input type='text' id='pgrad1graddate' value="<?=$pgrad1graddate?>" class='datepicker form-control' data-parsley-required data-parsley-pattern="^((((0[13578])|(1[02]))[\/]?(([0-2][0-9])|(3[01])))|(((0[469])|(11))[\/]?(([0-2][0-9])|(30)))|(02[\/]?[0-2][0-9]))[\/]?\d{4}$">
                                                                    </div>   
                                                                    <div id="pgrad1coursediv" class="form-group label-floating">
                                                                        <label class="control-label">Masters/Doctorate Course</label>
                                                                        <input type="text" id="pgrad1course" value="<?=$pgrad1course?>" class="form-control" data-parsley-required>
                                                                    </div>   
                                                                </div>
                                                                 <div class="col-md-12 col-xs-12">
                                                                    <hr>
                                                                   <h6><label>Awards/Recognition</label></h6>
                                                                    <div id="smpgrad1"><?=$smpgrad1?></div>
                                                                    
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
                                                                                      ],
                                                                                      callbacks: {
                                                                                      onPaste: function (e) {
                                                                                          var bufferText = ((e.originalEvent || e).clipboardData || window.clipboardData).getData('Text');

                                                                                          e.preventDefault();

                                                                                          // Firefox fix
                                                                                          setTimeout(function () {
                                                                                              document.execCommand('insertText', false, bufferText);
                                                                                          }, 10);
                                                                                      }
                                                                                    }
                                                                                    });
                                                                            });
                                                                            </script>
                                                                     <button class="btn btn-primary " name="addetrain" id="addetrain" type="submit">
                                                        Save Post Graduate Details
                                                       </button>

                                                                </div>
                                                                
                                                            </div>
                                                             </form>     
                                                        </div> 
                                                        
                                                        
                                                        <div class="tab-pane" id="others">
                                                             <form method="post" id="etrain-others-form" name="etrain-others-form"> 
                                                             <input type="hidden" id="userid" name="userid" value="<?=$userid?>">
                                                             <input type="hidden" id="etrain" name="mode" value="others">
                                                             <input type="hidden" id="mode" name="mode" value="<?=$mode?>">   
                                                            <div class="row">                                                                  
                                                                 <div class="col-md-12 col-xs-12">       
                                                                   <h6><label>Vocational / Trainings / Seminars Attended</label></h6>
                                                                    <div id="smothers"><?=$smothers?></div>
                                                                    
                                                                          <script>
                                                                            $(document).ready(function() {
                                                                               $('#smothers').summernote({
                                                                                      toolbar: [
                                                                                        // [groupName, [list of button]]
                                                                                        ['style', ['bold', 'italic', 'underline', 'clear']],                       
                                                                                        ['fontsize', ['fontsize']],
                                                                                        ['color', ['color']],
                                                                                        ['para', ['ul', 'ol', 'paragraph']],
                                                                                        ['height', ['height']]
                                                                                      ],
                                                                                      callbacks: {
                                                                                          onPaste: function (e) {
                                                                                              var bufferText = ((e.originalEvent || e).clipboardData || window.clipboardData).getData('Text');

                                                                                              e.preventDefault();

                                                                                              // Firefox fix
                                                                                              setTimeout(function () {
                                                                                                  document.execCommand('insertText', false, bufferText);
                                                                                              }, 10);
                                                                                          }
                                                                                        }
                                                                                    });
                                                                            });
                                                                            </script>
                                                                     <button class="btn btn-primary " name="addetrain" id="addetrain" type="submit">
                                                        Save Other Details
                                                       </button>

                                                                </div>
                                                                
                                                            </div>
                                                             </form>     
                                                        </div>  
                                                        
                                                       
                                                    </div>
                                                 
                                                   

                                                    </div>
                                             </div>
                            
                               <!--
                                <button class="btn btn-primary " name="addetrain" id="addetrain" type="submit">
                                                        Save Education &amp; Training
                                                       </button>
                                -->
                                  <div id="successdivetrain" class="alert alert-success">
                                               
                                                  <div class="alert-icon">
                                                    <i class="material-icons">check</i>
                                                  </div>
                                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true"><i class="material-icons">clear</i></span>
                                                  </button>
                                                  <b>Alert: </b> Your education &amp; training has been saved.
                                               
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
    $('#etrain-hs-form #hsschool').parsley().on('field:error', function() {
           $('#etrain-hs-form #hsschooldiv').addClass('has-error');
           $('#etrain-hs-form #hsschooldiv').append("<span class='material-icons form-control-feedback'>clear</span>");   
    });    
    $('#etrain-hs-form #hsschool').parsley().on('field:success', function() {
            $('#etrain-hs-form #hsschooldiv').addClass('has-success');
            $('#etrain-hs-form #hsschooldiv').find('span').remove()
            $('#etrain-hs-form #hsschooldiv').append("<span class='material-icons form-control-feedback'>done</span>");   
    });
    
    $('#etrain-hs-form #hsadd').parsley().on('field:error', function() {
           $('#etrain-hs-form #hsadddiv').addClass('has-error');
           $('#etrain-hs-form #hsadddiv').append("<span class='material-icons form-control-feedback'>clear</span>");   
    });    
    $('#etrain-hs-form #hsadd').parsley().on('field:success', function() {
            $('#etrain-hs-form #hsadddiv').addClass('has-success');
            $('#etrain-hs-form #hsadddiv').find('span').remove()
            $('#etrain-hs-form #hsadddiv').append("<span class='material-icons form-control-feedback'>done</span>");   
    });
    
    $('#etrain-hs-form #hsgraddate').parsley().on('field:error', function() {
           $('#etrain-hs-form #hsgraddatediv').addClass('has-error');
           $('#etrain-hs-form #hsgraddatediv').append("<span class='material-icons form-control-feedback'>clear</span>");   
    });    
    $('#etrain-hs-form #hsgraddate').parsley().on('field:success', function() {
            $('#etrain-hs-form #hsgraddatediv').addClass('has-success');
            $('#etrain-hs-form #hsgraddatediv').find('span').remove()
            $('#etrain-hs-form #hsgraddatediv').append("<span class='material-icons form-control-feedback'>done</span>");   
    });
    
    $('#etrain-col-form #coluni').parsley().on('field:error', function() {
           $('#etrain-col-form #colunidiv').addClass('has-error');
           $('#etrain-col-form #colunidiv').append("<span class='material-icons form-control-feedback'>clear</span>");   
    });    
    $('#etrain-col-form #coluni').parsley().on('field:success', function() {
            $('#etrain-col-form #colunidiv').addClass('has-success');
            $('#etrain-col-form #colunidiv').find('span').remove()
            $('#etrain-col-form #colunidiv').append("<span class='material-icons form-control-feedback'>done</span>");   
    });
    
    $('#etrain-col-form #coladd').parsley().on('field:error', function() {
           $('#etrain-col-form #coladddiv').addClass('has-error');
           $('#etrain-col-form #coladddiv').append("<span class='material-icons form-control-feedback'>clear</span>");   
    });    
    $('#etrain-col-form #coladd').parsley().on('field:success', function() {
            $('#etrain-col-form #coladddiv').addClass('has-success');
            $('#etrain-col-form #coladddiv').find('span').remove()
            $('#etrain-col-form #coladddiv').append("<span class='material-icons form-control-feedback'>done</span>");   
    });
    
    $('#etrain-col-form #colgraddate').parsley().on('field:error', function() {
           $('#etrain-col-form #colgraddatediv').addClass('has-error');
           $('#etrain-col-form #colgraddatediv').append("<span class='material-icons form-control-feedback'>clear</span>");   
    });    
    $('#etrain-col-form #colgraddate').parsley().on('field:success', function() {
            $('#etrain-col-form #colgraddatediv').addClass('has-success');
            $('#etrain-col-form #colgraddatediv').find('span').remove()
            $('#etrain-col-form #colgraddatediv').append("<span class='material-icons form-control-feedback'>done</span>");   
    });
    
    $('#etrain-col-form #colmajor').parsley().on('field:error', function() {
           $('#etrain-col-form #colmajordiv').addClass('has-error');
           $('#etrain-col-form #colmajordiv').append("<span class='material-icons form-control-feedback'>clear</span>");   
    });    
    $('#etrain-col-form #colmajor').parsley().on('field:success', function() {
            $('#etrain-col-form #colmajordiv').addClass('has-success');
            $('#etrain-col-form #colmajordiv').find('span').remove()
            $('#etrain-col-form #colmajordiv').append("<span class='material-icons form-control-feedback'>done</span>");   
    });
    
    $('#etrain-pgrad1-form #pgrad1uni').parsley().on('field:error', function() {
           $('#etrain-pgrad1-form #pgrad1unidiv').addClass('has-error');
           $('#etrain-pgrad1-form #pgrad1unidiv').append("<span class='material-icons form-control-feedback'>clear</span>");   
    });    
    $('#etrain-pgrad1-form #pgrad1uni').parsley().on('field:success', function() {
            $('#etrain-pgrad1-form #pgrad1unidiv').addClass('has-success');
            $('#etrain-pgrad1-form #pgrad1unidiv').find('span').remove()
            $('#etrain-pgrad1-form #pgrad1unidiv').append("<span class='material-icons form-control-feedback'>done</span>");   
    });
    
    $('#etrain-pgrad1-form #pgrad1add').parsley().on('field:error', function() {
           $('#etrain-pgrad1-form #pgrad1adddiv').addClass('has-error');
           $('#etrain-pgrad1-form #pgrad1adddiv').append("<span class='material-icons form-control-feedback'>clear</span>");   
    });
    $('#etrain-pgrad1-form #pgrad1add').parsley().on('field:success', function() {
            $('#etrain-pgrad1-form #pgrad1adddiv').addClass('has-success');
            $('#etrain-pgrad1-form #pgrad1adddiv').find('span').remove()
            $('#etrain-pgrad1-form #pgrad1adddiv').append("<span class='material-icons form-control-feedback'>done</span>");   
    });
    
    $('#etrain-pgrad1-form #pgrad1graddate').parsley().on('field:error', function() {
           $('#etrain-pgrad1-form #pgrad1graddatediv').addClass('has-error');
           $('#etrain-pgrad1-form #pgrad1graddatediv').append("<span class='material-icons form-control-feedback'>clear</span>");   
    });    
    $('#etrain-pgrad1-form #pgrad1graddate').parsley().on('field:success', function() {
            $('#etrain-pgrad1-form #pgrad1graddatediv').addClass('has-success');
            $('#etrain-pgrad1-form #pgrad1graddatediv').find('span').remove()
            $('#etrain-pgrad1-form #pgrad1graddatediv').append("<span class='material-icons form-control-feedback'>done</span>");   
    });
    
    $('#etrain-pgrad1-form #pgrad1course').parsley().on('field:error', function() {
           $('#etrain-pgrad1-form #pgrad1coursediv').addClass('has-error');
           $('#etrain-pgrad1-form #pgrad1coursediv').append("<span class='material-icons form-control-feedback'>clear</span>");   
    });    
    $('#etrain-pgrad1-form #pgrad1course').parsley().on('field:success', function() {
            $('#etrain-pgrad1-form #pgrad1coursediv').addClass('has-success');
            $('#etrain-pgrad1-form #pgrad1coursediv').find('span').remove()
            $('#etrain-pgrad1-form #pgrad1coursediv').append("<span class='material-icons form-control-feedback'>done</span>");   
    });
    
    $('#resume-main-body #successdivetrain').hide();
       
});
</script>    