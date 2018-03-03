<script>
window.onload = function() {
   if (!window.jQuery) {  
      window.location.href = 'https://jobsly.net/dashboard/resume.php?ajax=etrain';
   } 
}    
</script> 
<?php
if (session_status() == PHP_SESSION_NONE) {
        session_start();
        include 'Database.php';
}

 

$hsschool = "";
$hsadd = "";
$hsgraddate = "";
$hsawards ="";
$coluni="";
$coladd="";
$colgpa="";
$colgraddate="";
$colmajor="";    
$smcol="";   
$pgrad1uni ="";    
$pgrad1add ="";    
$pgrad1gpa ="";    
$pgrad1graddate  ="";   
$pgrad1course ="";    
$smpgrad1=""; 
$smothers ="";    
    
if(isset($_SESSION['user'])){
   $user = $_SESSION['user'];
   $password = $_SESSION['password'];
   $userid = $_SESSION['userid'];
    date_default_timezone_set('Asia/Manila');
    $logtimestamp = date("Y-m-d H:i:s"); 
    include "serverlogconfig.php";
    $database = new Database();

    $database->query('SELECT * from educationandtraining where userid = :userid');
    $database->bind(':userid', $userid);   
    try{
        $row = $database->single();
    }catch (PDOException $e) {
        $msg = $e->getTraceAsString()." ".$e->getMessage();
        $log->error($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
        die("");
    }    
    $id = $row['id'];
    
    if(!empty($id)){
        $mode = 'update';
        $hsschool = $row['hsschool'];
        $hsadd = $row['hsadd'];
        $hsgraddate = $row['hsgraddate'];
        $hsdate = explode("-", $hsgraddate);
        $hsgraddate = $hsdate[1] .'/'.$hsdate[2].'/'.$hsdate[0];
        if($hsgraddate=='01/01/1000'){
            $hsgraddate = "";
        }
        $hsawards = $row['hsawards'];
        
        $coluni = $row['coluni'];
        $coladd = $row['coladd'];
        $colgpa = $row['colgpa'];
        $colgraddate = $row['colgraddate'];
        $coldate = explode("-", $colgraddate);
        $colgraddate = $coldate[1] .'/'.$coldate[2].'/'.$coldate[0];
        if($colgraddate=='01/01/1000'){
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
        if($pgrad1graddate=='01/01/1000'){
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
<div class="row"> 
<div class="col-md-12 center">            
      <!--
                    <div class="adstop">     <img  src="https://lh5.ggpht.com/NFYFP2H9CCP50vAQNLa7AtCj_mbbYmOzY978fZqd31oL5qOdvXgxU3KW8ek2VgvIOvTqWY0=w728" 
                                 alt="user">  
                     </div>    
        -->  
    </div>
 <div class="col-md-12">      
        <h2 class="title">Education &amp; Training</h2>
  </div>
</div>  
<div class="row">
                    <div class="col-md-offset-1 col-md-7">
                        
                       
                <div class="section  section-landing">
	         
					<div class="features">
						<div class="row">
		                    <div class="col-md-12">
                                      <form method="post" id="etrain-form" name="etrain-form" data-parsley-validate> 
                                                             <input type="hidden" id="userid" name="userid" value="<?=$userid?>">
                                                             <input type="hidden" id="mode" name="mode" value="<?=$mode?>">
                                    <div class="card card-nav-tabs cardtopmargin">
                                            <div id="tabtitle" class="header  header-danger">
                                                <!-- colors: "header-primary", "header-info", "header-success", "header-warning", "header-danger" -->
                                                <div class="nav-tabs-navigation">
                                                    <div class="nav-tabs-wrapper">
                                                        <ul class="nav nav-tabs" data-tabs="tabs">
                                                            <li class="active">
                                                                <a href="#hs" data-toggle="tab">
                                                                    <i class="material-icons">people</i>High School
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
                                                                    <div id="hsschooldiv" class="form-group label-floating">
                                                                        <label class="control-label">School</label>
                                                                        <input type="text" id="hsschool" class="form-control" value="<?=$hsschool?>"  data-parsley-hsallornone>
                                                                    </div>
                                                                    <div id="hsadddiv" class="form-group label-floating">
                                                                        <label class="control-label">School Address</label>
                                                                        <input type="text" id="hsadd" class="form-control" value="<?=$hsadd?>" data-trigger="blur" data-parsley-hsallornone>
                                                                    </div>                                                                  
                                                                </div>
                                                                <div class="col-md-6 col-xs-6">                                                                   
                                                                    <div id="hsgraddatediv" class="form-group label-static">
                                                                        <label class="control-label">Graduation Date</label>
                                                                        <input type='text' id='hsgraddate' name='hsgraddate' class='datepicker form-control' value="<?=$hsgraddate?>"  data-parsley-error-message="'Date must have mm/dd/yyy format" data-parsley-hsallornone>
                                                                    </div>                                                                    
                                                                </div>
                                                                <div class="col-md-12 col-xs-12">
                                                                    <hr>
                                                                   <h6>Awards/Recognition</h6>
                                                                    <div id="smhs"><?=$hsawards?></div>
                                                                    
                                                                          <script>
                                                                            $(document).ready(function() {
                                                                               $('#smhs').summernote({
                                                                                      toolbar: [
                                                                                        // [groupName, [list of button]]
                                                                                        ['style', ['bold', 'italic', 'underline', 'clear']],                       
                                                                                        ['fontsize', ['fontsize']],
                                                                                        ['color', ['color']],
                                                                                        ['para', ['ul', 'ol', 'paragraph']]
                                                                                      ],
                                                                                      height: 200,  
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
                                                                   
                                                                </div>
                                                        
                                                            </div>
                                                          
                                                        </div>
                                                        
                                                       
                                                    </div>
                                                 
                                                   

                                                    </div>
                                             </div>
                            
                                <div class="card card-nav-tabs cardtopmargin">
                                            <div id="tabtitle" class="header  header-primary">
                                                <!-- colors: "header-primary", "header-info", "header-success", "header-warning", "header-danger" -->
                                                <div class="nav-tabs-navigation">
                                                    <div class="nav-tabs-wrapper">
                                                        <ul class="nav nav-tabs" data-tabs="tabs">
                                                        
                                                            <li class="active">
                                                                <a href="#col" data-toggle="tab">
                                                                    <i class="material-icons">account_balance</i>College
                                                                </a>
                                                            </li>                                                     
                                                        </ul>
                                                    </div>
                                                </div>
                                          </div>
                                             <div class="content">
                                                    <div class="tab-content">
                                                      
                                                       <div class="tab-pane active" id="col">
                                                
                                                            <div class="row">
                                                                  <div class="col-md-6 col-xs-6">
                                                                    <div id="colunidiv" class="form-group label-floating">
                                                                        <label class="control-label">College/University</label>
                                                                        <input type="text" id="coluni" class="form-control" value="<?=$coluni?>" data-parsley-colallornone>
                                                                    </div>
                                                                    <div id="coladddiv" class="form-group label-floating">
                                                                        <label class="control-label">College/University Address</label>
                                                                        <input type="text" id="coladd" class="form-control" value="<?=$coladd?>"  data-parsley-colallornone>
                                                                    </div>
                                                                      <div id="colgpadiv" class="form-group label-floating">
                                                                        <label class="control-label">GPA</label>
                                                                        <input type="text" id="colgpa" value="<?=$colgpa?>" class="form-control">
                                                                    </div> 
                                                                </div>
                                                                <div class="col-md-6 col-xs-6">                                                                   
                                                                    <div id="colgraddatediv" class="form-group label-static">
                                                                        <label class="control-label">Graduation Date</label>
                                                                        <input type='text' id='colgraddate' name='colgraddate' value="<?=$colgraddate?>" class='datepicker form-control' data-parsley-error-message="'Date must have mm/dd/yyy format" data-parsley-colallornone>
                                                                    </div>   
                                                                    <div id="colmajordiv" class="form-group label-floating">
                                                                        <label class="control-label">Major/Course</label>
                                                                        <input type="text" id="colmajor" class="form-control" value="<?=$colmajor?>" data-parsley-colallornone>
                                                                    </div>   
                                                                </div>
                                                                 <div class="col-md-12 col-xs-12">
                                                                    <hr>
                                                                   <h6>Awards/Recognition</h6>
                                                                    <div id="smcol"><?=$smcol?></div>
                                                                    
                                                                          <script>
                                                                            $(document).ready(function() {
                                                                               $('#smcol').summernote({
                                                                                      toolbar: [
                                                                                        // [groupName, [list of button]]
                                                                                        ['style', ['bold', 'italic', 'underline', 'clear']],                       
                                                                                        ['fontsize', ['fontsize']],
                                                                                        ['color', ['color']],
                                                                                        ['para', ['ul', 'ol', 'paragraph']]
                                                                                      ],
                                                                                      height: 200,  
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
                                                                
                                                                </div>
                                                                
                                                            </div>
                                                           
                                                        </div>
                                                    
                                                        
                                                       
                                                    </div>
                                                 
                                                   

                                                    </div>
                                             </div>
                                
                                <div class="card card-nav-tabs cardtopmargin">
                                            <div id="tabtitle" class="header  header-info">
                                                <!-- colors: "header-primary", "header-info", "header-success", "header-warning", "header-danger" -->
                                                <div class="nav-tabs-navigation">
                                                    <div class="nav-tabs-wrapper">
                                                        <ul class="nav nav-tabs" data-tabs="tabs">
                                                         
                                                            <li class="active">
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
                                                        <div class="tab-pane active" id="pgrad1">
                                                              
                                                            <div class="row">
                                                                  <div class="col-md-6 col-xs-6">
                                                                    <div id="pgrad1unidiv" class="form-group label-floating">
                                                                        <label class="control-label">Institute/University</label>
                                                                        <input type="text" id="pgrad1uni" class="form-control" value="<?=$pgrad1uni?>" data-parsley-pgradallornone>
                                                                    </div>
                                                                    <div id="pgrad1adddiv" class="form-group label-floating">
                                                                        <label class="control-label">Institute/University Address</label>
                                                                        <input type="text" id="pgrad1add" class="form-control" value="<?=$pgrad1add?>" data-parsley-pgradallornone>
                                                                    </div>
                                                                      <div id="pgrad1gpadiv" class="form-group label-floating">
                                                                        <label class="control-label">GPA</label>
                                                                        <input type="text" id="pgrad1gpa" value="<?=$pgrad1gpa?>" class="form-control">
                                                                    </div> 
                                                                </div>
                                                                <div class="col-md-6 col-xs-6">                                                                   
                                                                    <div id="pgrad1graddatediv" class="form-group label-static">
                                                                        <label class="control-label">Graduation Date</label>
                                                                        <input type='text' id='pgrad1graddate' name='pgrad1graddate' value="<?=$pgrad1graddate?>" class='datepicker form-control' data-parsley-error-message="'Date must have mm/dd/yyy format" data-parsley-pgradallornone>
                                                                    </div>   
                                                                    <div id="pgrad1coursediv" class="form-group label-floating">
                                                                        <label class="control-label">Masters/Doctorate Course</label>
                                                                        <input type="text" id="pgrad1course" value="<?=$pgrad1course?>" class="form-control" data-parsley-pgradallornone>
                                                                    </div>   
                                                                </div>
                                                                 <div class="col-md-12 col-xs-12">
                                                                    <hr>
                                                                   <h6>Awards/Recognition</h6>
                                                                    <div id="smpgrad1"><?=$smpgrad1?></div>
                                                                    
                                                                          <script>
                                                                            $(document).ready(function() {
                                                                               $('#smpgrad1').summernote({
                                                                                      toolbar: [
                                                                                        // [groupName, [list of button]]
                                                                                        ['style', ['bold', 'italic', 'underline', 'clear']],                       
                                                                                        ['fontsize', ['fontsize']],
                                                                                        ['color', ['color']],
                                                                                        ['para', ['ul', 'ol', 'paragraph']]
                                                                                      ],
                                                                                      height: 200,
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
                                                                    
                                                                </div>
                                                                
                                                            </div>
                                                           
                                                        </div> 
                                                      
                                                    </div>
                                                 
                                                   

                                                    </div>
                                             </div>
                              
                                
                                 <div class="card card-nav-tabs cardtopmargin">
                                            <div id="tabtitle" class="header  header-success">
                                                <!-- colors: "header-primary", "header-info", "header-success", "header-warning", "header-danger" -->
                                                <div class="nav-tabs-navigation">
                                                    <div class="nav-tabs-wrapper">
                                                        <ul class="nav nav-tabs" data-tabs="tabs">
                                                      
                                                            <li class="active">
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
                                                       
                                                        <div class="tab-pane active" id="others">
                                                          
                                                            <div class="row">                                                                  
                                                                 <div class="col-md-12 col-xs-12">       
                                                                   <h6>Short Courses / Trainings / Seminars Attended</h6>
                                                                    <div id="smothers"><?=$smothers?></div>
                                                                    
                                                                          <script>
                                                                            $(document).ready(function() {
                                                                               $('#smothers').summernote({
                                                                                      toolbar: [
                                                                                        // [groupName, [list of button]]
                                                                                        ['style', ['bold', 'italic', 'underline', 'clear']],                       
                                                                                        ['fontsize', ['fontsize']],
                                                                                        ['color', ['color']],
                                                                                        ['para', ['ul', 'ol', 'paragraph']]
                                                                                      ],
                                                                                      height: 200,
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
                                                                  
                                                                </div>
                                                                
                                                            </div>
                                                           
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
                                  <button class="btn btn-primary " name="addetrain" id="addetrain" type="submit">
                                                        Save Education Details
                                                       </button>
                                </form>
                                <form method="post" id="etrainnext-form" name="etrainnext-form"> 
                             <button class="btn btn-primary " name="etrainnext" id="etrainnext" type="submit">
                                                        Skip to Next Step <i class="material-icons">arrow_forward</i>
                                                       </button>
                                </form>
		                    </div>
                            
                            <div class="col-md-6">
                             
		                    </div>
		                    
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
</div>
<script>

    
    
$(document).ready(function ($) {
    $('#etrain-form').parsley().reset();
    $('#etrain-form').parsley({
            successClass: "has-success",
            errorClass: "has-error"
    });
    window.Parsley.addValidator('hsallornone', {
        requirementType: 'regexp',
  validate: function(value) {
    var result = false;
    var hsschool = $("#etrain-form #hsschool").val();
    var hsadd = $("#etrain-form #hsadd").val();  
    var hsgraddate = $("#etrain-form #hsgraddate").val();
       $('#etrain-form #hsschooldiv').find('span').remove(); 
       $('#etrain-form #hsadddiv').find('span').remove(); 
       $('#etrain-form #hsgraddatediv').find('span').remove();
      // var regex = /^((((0[13578])|(1[02]))[\/]?(([0-2][0-9])|(3[01])))|(((0[469])|(11))[\/]?(([0-2][0-9])|(30)))|(02[\/]?[0-2][0-9]))[\/]?\d{4}$/;
       var regex = /^(0[1-9]|1[0-2])\/(0[1-9]|1\d|2\d|3[01])\/(19|20)\d{2}$/;
       var regexpeval = regex.test(hsgraddate);
      
 
    if( ((hsschool && (!hsadd || !hsgraddate)) || (hsadd && (!hsschool || !hsgraddate))|| (hsgraddate && (!hsschool || !hsadd)))
      || !regexpeval){
       $('#etrain-form #hsschooldiv').find('span').remove(); 
       $('#etrain-form #hsschooldiv').addClass('has-error');
       $('#etrain-form #hsschooldiv').find('label').addClass('redcolor'); 
       $('#etrain-form #hsschooldiv').append("<span class='material-icons form-control-feedback redcolor'>clear</span>");   
       $('#etrain-form #hsadddiv').find('span').remove();  
       $('#etrain-form #hsadddiv').addClass('has-error');
       $('#etrain-form #hsadddiv').find('label').addClass('redcolor');
       $('#etrain-form #hsadddiv').append("<span class='material-icons form-control-feedback redcolor'>clear</span>");
       $('#etrain-form #hsgraddatediv').find('span').remove();   
       $('#etrain-form #hsgraddatediv').addClass('has-error');
       $('#etrain-form #hsgraddatediv').find('label').addClass('redcolor');    
       $('#etrain-form #hsgraddatediv').append("<span class='material-icons form-control-feedback redcolor'>clear</span>");   
     
        result = false;
    }
  
    else{
       $('#etrain-form #hsschooldiv').find('span', '.has-error').remove(); 
       $('#etrain-form #hsschooldiv').addClass('has-success');
       $('#etrain-form #hsschooldiv').find('label').addClass('greencolor'); 
       $('#etrain-form #hsschooldiv').append("<span class='material-icons form-control-feedback greencolor'>done</span>");
       $('#etrain-form #hsadddiv').find('span').remove();   
       $('#etrain-form #hsadddiv').addClass('has-success');
       $('#etrain-form #hsadddiv').find('label').addClass('greencolor');  
       $('#etrain-form #hsadddiv').append("<span class='material-icons form-control-feedback greencolor'>done</span>"); 
       $('#etrain-form #hsgraddatediv').find('span').remove();    
       $('#etrain-form #hsgraddatediv').addClass('has-success');
       $('#etrain-form #hsgraddatediv').find('label').addClass('greencolor');  
       $('#etrain-form #hsgraddatediv').append("<span class='material-icons form-control-feedback greencolor'>done</span>"); 
       
        result = true;
    }

      
     return result; 
  },
  messages: {
    en: 'All fields required',

  }
});
 /*   
$('#etrain-form #hsgraddate').parsley().on('field:error', function() {
           $('#etrain-form #hsgraddatediv').addClass('has-error');
           $('#etrain-form #hsgraddatediv').append("<span class='material-icons form-control-feedback'>clear</span>");   
    });    
    $('#etrain-form #hsgraddate').parsley().on('field:success', function() {
            $('#etrain-form #hsgraddatediv').addClass('has-success');
            $('#etrain-form #hsgraddatediv').find('span').remove();
            $('#etrain-form #hsgraddatediv').append("<span class='material-icons form-control-feedback'>done</span>");   
    });    
   */ 
    
window.Parsley.addValidator('colallornone', {
  validate: function(value) {
    var result = false;
    var coluni = $("#etrain-form #coluni").val();
    var coladd = $("#etrain-form #coladd").val();  
    var colgraddate = $("#etrain-form #colgraddate").val();
    var colmajor = $("#etrain-form #colmajor").val();   
       $('#etrain-form #colunidiv').find('span').remove(); 
       $('#etrain-form #coladddiv').find('span').remove(); 
       $('#etrain-form #colgraddatediv').find('span').remove();   
       $('#etrain-form #colmajordiv').find('span').remove();
       var regex = /^(0[1-9]|1[0-2])\/(0[1-9]|1\d|2\d|3[01])\/(19|20)\d{2}$/;
       var regexpeval = regex.test(colgraddate);
    if( ((coluni && (!coladd || !colgraddate || !colmajor)) || (coladd && (!coluni || !colgraddate || !colmajor))|| (colgraddate && (!coluni || !coladd || !colmajor)) || (colmajor && (!coluni || !coladd || !colgraddate))) || !regexpeval){
       $('#etrain-form #colunidiv').addClass('has-error');
       $('#etrain-form #colunidiv').find('label').addClass('redcolor'); 
       $('#etrain-form #colunidiv').append("<span class='material-icons form-control-feedback redcolor'>clear</span>");        
       $('#etrain-form #coladddiv').addClass('has-error');
       $('#etrain-form #coladddiv').find('label').addClass('redcolor');
       $('#etrain-form #coladddiv').append("<span class='material-icons form-control-feedback redcolor'>clear</span>");
       $('#etrain-form #colmajordiv').addClass('has-error');
       $('#etrain-form #colmajordiv').find('label').addClass('redcolor');
       $('#etrain-form #colmajordiv').append("<span class='material-icons form-control-feedback redcolor'>clear</span>"); 
       $('#etrain-form #colgraddatediv').addClass('has-error');
       $('#etrain-form #colgraddatediv').find('label').addClass('redcolor');    
       $('#etrain-form #colgraddatediv').append("<span class='material-icons form-control-feedback redcolor'>clear</span>");   
        result = false;
    }else{
       $('#etrain-form #colunidiv').addClass('has-success');
       $('#etrain-form #colunidiv').find('label').addClass('greencolor'); 
       $('#etrain-form #colunidiv').append("<span class='material-icons form-control-feedback greencolor'>done</span>");
       $('#etrain-form #coladddiv').addClass('has-success');
       $('#etrain-form #coladddiv').find('label').addClass('greencolor');  
       $('#etrain-form #coladddiv').append("<span class='material-icons form-control-feedback greencolor'>done</span>");
       $('#etrain-form #colmajordiv').addClass('has-success');
       $('#etrain-form #colmajordiv').find('label').addClass('greencolor');  
       $('#etrain-form #colmajordiv').append("<span class='material-icons form-control-feedback greencolor'>done</span>");     
       $('#etrain-form #colgraddatediv').addClass('has-success');
       $('#etrain-form #colgraddatediv').find('label').addClass('greencolor');  
       $('#etrain-form #colgraddatediv').append("<span class='material-icons form-control-feedback greencolor'>done</span>"); 
         
        result = true;
    }

      
     return result; 
  },
  messages: {
   en: 'All fields required.',

  }
});
    
window.Parsley.addValidator('pgradallornone', {
  validate: function(value) {
    var result = false;
    var pgrad1uni = $("#etrain-form #pgrad1uni").val();
    var pgrad1add = $("#etrain-form #pgrad1add").val();  
    var pgrad1graddate = $("#etrain-form #pgrad1graddate").val();
    var pgrad1course = $("#etrain-form #pgrad1course").val();   
       $('#etrain-form #pgrad1unidiv').find('span').remove(); 
       $('#etrain-form #pgrad1adddiv').find('span').remove(); 
       $('#etrain-form #pgrad1graddate').find('span').remove();   
       $('#etrain-form #pgrad1course').find('span').remove();
       var regex = /^(0[1-9]|1[0-2])\/(0[1-9]|1\d|2\d|3[01])\/(19|20)\d{2}$/;
       var regexpeval = regex.test(pgrad1graddate);
    if( ((pgrad1uni && (!pgrad1add || !pgrad1graddate || !pgrad1course)) || (pgrad1add && (!pgrad1uni || !pgrad1graddate || !pgrad1course))|| (pgrad1graddate && (!pgrad1uni || !pgrad1add || !pgrad1course)) || (pgrad1course && (!pgrad1uni || !pgrad1add || !pgrad1graddate))) || !regexpeval){
       $('#etrain-form #pgrad1unidiv').addClass('has-error');
       $('#etrain-form #pgrad1unidiv').find('label').addClass('redcolor'); 
       $('#etrain-form #pgrad1unidiv').append("<span class='material-icons form-control-feedback redcolor'>clear</span>");        
       $('#etrain-form #pgrad1adddiv').addClass('has-error');
       $('#etrain-form #pgrad1adddiv').find('label').addClass('redcolor');
       $('#etrain-form #pgrad1adddiv').append("<span class='material-icons form-control-feedback redcolor'>clear</span>");
       $('#etrain-form #pgrad1coursediv').addClass('has-error');
       $('#etrain-form #pgrad1coursediv').find('label').addClass('redcolor');
       $('#etrain-form #pgrad1coursediv').append("<span class='material-icons form-control-feedback redcolor'>clear</span>"); 
       $('#etrain-form #pgrad1graddatediv').addClass('has-error');
       $('#etrain-form #pgrad1graddatediv').find('label').addClass('redcolor');    
       $('#etrain-form #pgrad1graddatediv').append("<span class='material-icons form-control-feedback redcolor'>clear</span>");   
        result = false;
    }else{
       $('#etrain-form #pgrad1unidiv').addClass('has-success');
       $('#etrain-form #pgrad1unidiv').find('label').addClass('greencolor'); 
       $('#etrain-form #pgrad1unidiv').append("<span class='material-icons form-control-feedback greencolor'>done</span>");
       $('#etrain-form #pgrad1adddiv').addClass('has-success');
       $('#etrain-form #pgrad1adddiv').find('label').addClass('greencolor');  
       $('#etrain-form #pgrad1adddiv').append("<span class='material-icons form-control-feedback greencolor'>done</span>");
       $('#etrain-form #pgrad1coursediv').addClass('has-success');
       $('#etrain-form #pgrad1coursediv').find('label').addClass('greencolor');  
       $('#etrain-form #pgrad1coursediv').append("<span class='material-icons form-control-feedback greencolor'>done</span>");     
       $('#etrain-form #pgrad1graddatediv').addClass('has-success');
       $('#etrain-form #pgrad1graddatediv').find('label').addClass('greencolor');  
       $('#etrain-form #pgrad1graddatediv').append("<span class='material-icons form-control-feedback greencolor'>done</span>"); 
         
        result = true;
    }

      
     return result; 
  },
  messages: {
   en: 'All fields required.',

  }
});   
    
    $('html, body').animate({ scrollTop: 0 }, 'fast');
    /*
    $('#etrain-form #hsschool').parsley().on('field:error', function() {
           $('#etrain-form #hsschooldiv').addClass('has-error');
           $('#etrain-form #hsschooldiv').append("<span class='material-icons form-control-feedback'>clear</span>");   
    });    
    $('#etrain-form #hsschool').parsley().on('field:success', function() {
            $('#etrain-form #hsschooldiv').addClass('has-success');
            $('#etrain-form #hsschooldiv').find('span').remove();
            $('#etrain-form #hsschooldiv').append("<span class='material-icons form-control-feedback'>done</span>");   
    });
    
    $('#etrain-form #hsadd').parsley().on('field:error', function() {
           $('#etrain-form #hsadddiv').addClass('has-error');
           $('#etrain-form #hsadddiv').append("<span class='material-icons form-control-feedback'>clear</span>");   
    });    
    $('#etrain-form #hsadd').parsley().on('field:success', function() {
            $('#etrain-form #hsadddiv').addClass('has-success');
            $('#etrain-form #hsadddiv').find('span').remove();
            $('#etrain-form #hsadddiv').append("<span class='material-icons form-control-feedback'>done</span>");   
    });
    
    $('#etrain-form #hsgraddate').parsley().on('field:error', function() {
           $('#etrain-form #hsgraddatediv').addClass('has-error');
           $('#etrain-form #hsgraddatediv').append("<span class='material-icons form-control-feedback'>clear</span>");   
    });    
    $('#etrain-form #hsgraddate').parsley().on('field:success', function() {
            $('#etrain-form #hsgraddatediv').addClass('has-success');
            $('#etrain-form #hsgraddatediv').find('span').remove();
            $('#etrain-form #hsgraddatediv').append("<span class='material-icons form-control-feedback'>done</span>");   
    });
   
    $('#etrain-form #coluni').parsley().on('field:error', function() {
           $('#etrain-form #colunidiv').addClass('has-error');
           $('#etrain-form #colunidiv').append("<span class='material-icons form-control-feedback'>clear</span>");   
    });    
    $('#etrain-form #coluni').parsley().on('field:success', function() {
            $('#etrain-form #colunidiv').addClass('has-success');
            $('#etrain-form #colunidiv').find('span').remove()
            $('#etrain-form #colunidiv').append("<span class='material-icons form-control-feedback'>done</span>");   
    });
    
    $('#etrain-form #coladd').parsley().on('field:error', function() {
           $('#etrain-form #coladddiv').addClass('has-error');
           $('#etrain-form #coladddiv').append("<span class='material-icons form-control-feedback'>clear</span>");   
    });    
    $('#etrain-form #coladd').parsley().on('field:success', function() {
            $('#etrain-form #coladddiv').addClass('has-success');
            $('#etrain-form #coladddiv').find('span').remove()
            $('#etrain-form #coladddiv').append("<span class='material-icons form-control-feedback'>done</span>");   
    });
    
    $('#etrain-form #colgraddate').parsley().on('field:error', function() {
           $('#etrain-form #colgraddatediv').addClass('has-error');
           $('#etrain-form #colgraddatediv').append("<span class='material-icons form-control-feedback'>clear</span>");   
    });    
    $('#etrain-form #colgraddate').parsley().on('field:success', function() {
            $('#etrain-form #colgraddatediv').addClass('has-success');
            $('#etrain-form #colgraddatediv').find('span').remove()
            $('#etrain-form #colgraddatediv').append("<span class='material-icons form-control-feedback'>done</span>");   
    });
    
    $('#etrain-form #colmajor').parsley().on('field:error', function() {
           $('#etrain-form #colmajordiv').addClass('has-error');
           $('#etrain-form #colmajordiv').append("<span class='material-icons form-control-feedback'>clear</span>");   
    });    
    $('#etrain-form #colmajor').parsley().on('field:success', function() {
            $('#etrain-form #colmajordiv').addClass('has-success');
            $('#etrain-form #colmajordiv').find('span').remove()
            $('#etrain-form #colmajordiv').append("<span class='material-icons form-control-feedback'>done</span>");   
    });
    
    $('#etrain-form #pgrad1uni').parsley().on('field:error', function() {
           $('#etrain-form #pgrad1unidiv').addClass('has-error');
           $('#etrain-form #pgrad1unidiv').append("<span class='material-icons form-control-feedback'>clear</span>");   
    });    
    $('#etrain-form #pgrad1uni').parsley().on('field:success', function() {
            $('#etrain-form #pgrad1unidiv').addClass('has-success');
            $('#etrain-form #pgrad1unidiv').find('span').remove()
            $('#etrain-form #pgrad1unidiv').append("<span class='material-icons form-control-feedback'>done</span>");   
    });
    
    $('#etrain-form #pgrad1add').parsley().on('field:error', function() {
           $('#etrain-form #pgrad1adddiv').addClass('has-error');
           $('#etrain-form #pgrad1adddiv').append("<span class='material-icons form-control-feedback'>clear</span>");   
    });
    $('#etrain-form #pgrad1add').parsley().on('field:success', function() {
            $('#etrain-form #pgrad1adddiv').addClass('has-success');
            $('#etrain-form #pgrad1adddiv').find('span').remove()
            $('#etrain-form #pgrad1adddiv').append("<span class='material-icons form-control-feedback'>done</span>");   
    });
    
    $('#etrain-form #pgrad1graddate').parsley().on('field:error', function() {
           $('#etrain-form #pgrad1graddatediv').addClass('has-error');
           $('#etrain-form #pgrad1graddatediv').append("<span class='material-icons form-control-feedback'>clear</span>");   
    });    
    $('#etrain-form #pgrad1graddate').parsley().on('field:success', function() {
            $('#etrain-form #pgrad1graddatediv').addClass('has-success');
            $('#etrain-form #pgrad1graddatediv').find('span').remove()
            $('#etrain-form #pgrad1graddatediv').append("<span class='material-icons form-control-feedback'>done</span>");   
    });
    
    $('#etrain-form #pgrad1course').parsley().on('field:error', function() {
           $('#etrain-form #pgrad1coursediv').addClass('has-error');
           $('#etrain-form #pgrad1coursediv').append("<span class='material-icons form-control-feedback'>clear</span>");   
    });    
    $('#etrain-form #pgrad1course').parsley().on('field:success', function() {
            $('#etrain-form #pgrad1coursediv').addClass('has-success');
            $('#etrain-form #pgrad1coursediv').find('span').remove()
            $('#etrain-form #pgrad1coursediv').append("<span class='material-icons form-control-feedback'>done</span>");   
    });
     */
    $('#resume-main-body #successdivetrain').hide();
       
});
</script>    