<script>
window.onload = function() {
   if (!window.jQuery) {  
      window.location.href = 'https://jobsly.net/dashboard/resume.php?ajax=workexp';
   } 
}    
</script> 
<?php
if (session_status() == PHP_SESSION_NONE) {
        session_start();
        include 'Database.php';
}

 

$startdate = "";
$enddate = "";
$sdate = "";
$edate ="";
$plevel = 7;
if(isset($_SESSION['user'])){
   $user = $_SESSION['user'];
   $password = $_SESSION['password'];
   $userid = $_SESSION['userid'];
    date_default_timezone_set('Asia/Manila');
    $logtimestamp = date("Y-m-d H:i:s");
    include "serverlogconfig.php";
    $database = new Database();
    $months = array('Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec');
}else{
    header("Location: logout.php");
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
                       <h2 class="title">Work Experience</h2> 
            <!-- <span class="jobcardbuttons"><a href='#profile' id="add"><i class="material-icons">edit</i> Add</a></span> -->
             
          </div> 
    </div>   
                   <div class="col-md-offset-1 col-md-7">
                        
                <div class="section  section-landing">
	         
					<div class="features">
						<div class="row">
		                    <span class="jobcardbuttons"><a href='#workexpmodal' class='btn btn-primary btn-sm' id="addworkexp" title="Add" data-mode="insert" data-workexpid="0" data-userid="<?=$userid?>" data-toggle="modal" data-target="#workexp-modal"> Add </a></span>
                                        <div id="workexpcardsdiv">
                                            <?php
                                                    $database->query('SELECT * FROM workexperience where userid = :userid order by startdate desc');
                                                    $database->bind(':userid', $userid);  
                                                    try{
                                                        $rows = $database->resultset();
                                                    }catch (PDOException $e) {
                                                        $msg = $e->getTraceAsString()." ".$e->getMessage();
                                                        $log->error($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
                                                        die("");
                                                    } 
                                                    foreach($rows as $row){
                                                        
                                                        $sdate = explode("-", $row['startdate']);
                                                        $startdate = $sdate[1] .'/'.$sdate[2].'/'.$sdate[0];
                                                        $cecb = $row['currentemployer'];
                                                        if($cecb=='off'){
                                                            $edate = explode("-", $row['enddate']);
                                                            $enddate = $edate[1] .'/'.$edate[2].'/'.$edate[0];
                                                        }else{
                                                            $enddate='present';
                                                        }
                                                        $jobdesc = $row['jobdescription'];
                                                 
                                             ?>           
                                           
                                            <section class="blog-post">
                                    <div class="panel panel-default">
                                    
                                      <div class="panel-body jobad-bottomborder">
                                          <div class="jobad-meta jobad-bottomborder">
                                     
                                          <ul  class="list-inline ">
                                                                                           
                                                                                            <li>
                                                                                                <h6 id="vertical-align" class="text-muted jobadheader">
                                                                                                   <i class="material-icons text-info jobadheadericon">business</i> &nbsp;<?=$row['industry']?>
                                                                                                </h6>
                                                                                            </li>
                                                                                            <li>
                                                                                                <h6 id="vertical-align" class="text-muted jobadheader">
                                                                                                <i class="material-icons text-info jobadheadericon">date_range</i>&nbsp;
                                                                                                    <?=$months[$sdate[1]-1]?>&nbsp;<?=$sdate[0]?> -
                                                                                                    <?php
                                                                                                        if($enddate != 'present'){
                                                                                                            echo $months[$edate[1]-1].'&nbsp;'.$edate[0];
                                                                                                        }else{
                                                                                                            echo "present";
                                                                                                        }
                                                                                                    ?>
                                                                                           
                                                                                                </h6>
                                                                                            </li>
                                                                                            <li>
                                                                                                <h6 id="vertical-align" class="text-muted jobadheader">
                                                                                                   <i class="material-icons text-info jobadheadericon">local_atm</i> &nbsp;Php <?=$row['msalary']?>
                                                                                                </h6>
                                                                                            </li>
                                                                                        </ul>
                                          
                                        </div>
                                     
                                        <div class="blog-post-content">
                                            
                                            <div class="row-fluid">
                                                    
                                                <div class="col-md-6  jobad-titletopmargin">
                                                         <a class="nodecor" href='#showjobmodal' data-toggle="modal" data-target="#showjob-modal" data-jobid="<?=$id?>"><h2 class="text-info jobad-title"><?=$row['position']?></h2></a>
                                                        <div class="companypos">
                                                            <h6 class="text-muted"><i><?=$row['company']?></i></h6>
                                                        </div>
                                                </div>
                                                
                                            </div>
                                            <div class="row-fluid">
                                                 
                                                <div class="col-md-12">
                                               
                                                    <div class="collapse-group collapse" id="viewdetails<?=$row['id']?>">
                                                  <?=$jobdesc?>
                                                 
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row-fluid">
                                               <div class="col-md-6">
                                                        <a class="btn btn-primary btn-sm" data-toggle="collapse" data-target="#viewdetails<?=$row['id']?>">Read more</a>
                                                </div>
                                                <div class="col-md-6 actionicon">                                                   
                                                        <span class="jobcardbuttons"><a href='#workexpmodal' id="editworkexp" title="Edit" data-mode="update" data-workexpid="<?=$row['id']?>" data-userid="<?=$userid?>" data-toggle="modal" data-target="#workexp-modal"><i class="material-icons">edit</i></a></span>
                                                        <span class="jobcardbuttons"><a href='#workexpmodal' id="delworkexp" title="Delete" data-mode="del" data-workexpid="<?=$row['id']?>" data-userid="<?=$userid?>" data-toggle="modal" data-target="#workexp-modal"><i class="material-icons">delete</i></a></span>
                                                </div>
                                          </div> 
                                          
                                          
                                        </div>                                  
                                         
                                      </div>
                                        
                                        
                                    </div>
                                  </section>
                                        
                                             <?php          
                                                    }
                                             ?>
                                            
                                         
                                        
                            </div>
                            <!--
                                <form method="post" id="wexp-form" name="wexp-form" data-parsley-validate data-parsley-trigger="keyup"> 
                                 <input type="hidden" id="userid" name="userid" value="<?=$userid?>">
                                 <input type="hidden" id="mode" name="mode" value="insert">
                                    <div id="card" class="card card-nav-tabs cardtopmargin">
                                            <div id="tabtitle" class="header  header-success">
                                               
                                                <div class="nav-tabs-navigation">
                                                    <div class="nav-tabs-wrapper">
                                                        <ul class="nav nav-tabs" data-tabs="tabs">
                                                            <li class="active">
                                                                <a href="#profile" data-toggle="tab">
                                                                    <i class="material-icons">location_city</i>
                                                                    Work Experience
                                                                </a>
                                                            </li>										
                                                        </ul>
                                                    </div>
                                                </div>
                                          </div>
                                             <div class="content">
                                                    <div class="tab-content">
                                                        <div class="tab-pane active" id="profile">
                                                            <div class="row">
                                                                  <div class="col-md-6 col-xs-6">
                                                                    <div id="companydiv" class="form-group label-floating">
                                                                        <label class="control-label">Company Name</label>
                                                                        <input type="text" id="company" class="form-control" data-parsley-required >                                                                      
                                                                    </div>
                                                                    <div id="positiondiv" class="form-group label-floating">
                                                                        <label class="control-label">Position</label>
                                                                        <input type="text" id="position" class="form-control" data-parsley-required>
                                                                    </div>
                                                                    <div id="startdiv" class="form-group label-static">
                                                                        <label class="control-label">Start Date</label>
                                                                       <input type='text' id='startdate' class='datepicker form-control' data-parsley-required  data-parsley-pattern="^((((0[13578])|(1[02]))[\/]?(([0-2][0-9])|(3[01])))|(((0[469])|(11))[\/]?(([0-2][0-9])|(30)))|(02[\/]?[0-2][0-9]))[\/]?\d{4}$">
                                                                    </div>
                                                                      <div id="msalarydiv" class="form-group label-floating">
                                                                        <label class="control-label">Monthly Salary</label>
                                                                        <input type="text" id="msalary" class="form-control" data-parsley-required data-parsley-type="number">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-xs-6">
                                                                    <div id="industrydiv" class="form-group label-floating">
                                                                        <label class="control-label">Industry</label>
                                                                        <input type="text" id="industry" class="form-control">
                                                                    </div>
                                                                    <div id="pleveldiv" class="form-group label-floating">
                                                                        <label class="control-label">Position Level</label>
                                                                        <select class="form-control" id="plevel" name="plevel"  placeholder="Position Level">       
                                                                           <option value='1' <?php if($plevel==1){echo' selected';}?>>Executive</option>
                                                                           <option value='2' <?php if($plevel==2){echo' selected';}?>>Manager</option>
                                                                           <option value='3' <?php if($plevel==3){echo' selected';}?>>Assistant Manager</option>
                                                                           <option value='4' <?php if($plevel==4){echo' selected';}?>>Supervisor</option>
                                                                           <option value='5' <?php if($plevel==5){echo' selected';}?>> 5 Years+ Experienced Employee</option>
                                                                           <option value='6' <?php if($plevel==6){echo' selected';}?>>1-4 Years Experienced Employee</option>
                                                                           <option value='7' <?php if($plevel==7){echo' selected';}?>>1 Year Experienced Employee/Fresh Grad</option>
                                                                </select>
                                                                    </div>
                                                                    <div id="enddiv" class="form-group label-static">
                                                                        <label class="control-label">End Date</label>
                                                                        <input type='text' id='enddate' name="enddate" class='datepicker form-control' data-parsley-required  data-parsley-pattern="^((((0[13578])|(1[02]))[\/]?(([0-2][0-9])|(3[01])))|(((0[469])|(11))[\/]?(([0-2][0-9])|(30)))|(02[\/]?[0-2][0-9]))[\/]?\d{4}$">
                                                                    </div>
                                                                    <div id="currentemp" class="form-group">
                                                                         <div class="checkbox">
                                                                            <label>
                                                                                    <input type="checkbox" id="currentempcb" name="optionsCheckboxes">
                                                                                Current Employer
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                        <div class="col-md-12 col-xs-12">
                                                                    <hr>
                                                            <span>Responsibilities / Accomplishments</span>
                                                                    <div id="summernote"></div>
                                                                    
                                                                          <script>
                                                                            $(document).ready(function() {
                                                                               $('#summernote').summernote({
                                                                                      toolbar: [
                                                                                        // [groupName, [list of button]]
                                                                                        ['style', ['bold', 'italic', 'underline', 'clear']],                       
                                                                                        ['fontsize', ['fontsize']],
                                                                                        ['color', ['color']],
                                                                                        ['para', ['ul', 'ol', 'paragraph']]
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
                                                                                    },
                                                                                    cleaner:{
          notTime: 2400, // Time to display Notifications.
          action: 'paste', // both|button|paste 'button' only cleans via toolbar button, 'paste' only clean when pasting content, both does both options.
          newline: '<br>', // Summernote's default is to use '<p><br></p>'
          notStyle: 'position:absolute;top:0;left:0;right:0', // Position of Notification
          icon: '<i class="note-icon">[Your Button]</i>',
          keepHtml: false, // Remove all Html formats
          keepClasses: false, // Remove Classes
          badTags: ['style', 'script', 'applet', 'embed', 'noframes', 'noscript', 'html'], // Remove full tags with contents
          badAttributes: ['style', 'start'] // Remove attributes from remaining tags
    }
                                                                                    });
                                                                            });
                                                                            </script>

                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div><button class="btn btn-primary " name="addwexp" id="addwexp" type="submit">
                                                        Add Work Experience
                                                       </button>
                                                 
                                                 
                                             </div>
                                        
                                        
                                    </div>
                                    </form>
                             
                                
                                  <div id="successdivworkexp" class="alert alert-success">
                                               
                                                  <div class="alert-icon">
                                                    <i class="material-icons">check</i>
                                                  </div>
                                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true"><i class="material-icons">clear</i></span>
                                                  </button>
                                                  <b>Alert: </b> Your work experience has been saved.
                                               
                                            </div>
                                    -->
                             
		                      <div>
                                     <form method="post" id="wexpnext-form" name="wexpnext-form"> 
                                            <button class="btn btn-primary " name="wexpnext" id="wexpnext" type="submit">
                                                            Go to Next Step <i class="material-icons">arrow_forward</i>
                                                           </button>
                                    </form>
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
                            

<script>
$(document).ready(function ($) {
     $('html, body').animate({ scrollTop: 0 }, 'fast');
     /* 
     $('#wexp-form-modal #successdivworkexp').hide();
     $(function() {
          $.material.init();
     });
     $('#wexp-form-modal #startdate').datepicker();                    
     $('#wexp-form-modal #enddate').datepicker();
     $("#wexp-form-modal #enddate").datepicker({
      onSelect: function() {
        $("#wexp-form").validate();
      }
     });
    
     $("#wexp-form-modal #enddate").datepicker()
     .on("input change", function (e) {
        $("#wexp-form-modal").validate();
     });
     
    
   
    $('#wexp-form #company').parsley().on('field:error', function() {
           $('#wexp-form #companydiv').addClass('has-error');
           $('#wexp-form #companydiv').append("<span class='material-icons form-control-feedback'>clear</span>");   
    });    
    $('#wexp-form #company').parsley().on('field:success', function() {
            $('#wexp-form #companydiv').addClass('has-success');
            $('#wexp-form #companydiv').find('span').remove();
            $('#wexp-form #companydiv').append("<span class='material-icons form-control-feedback'>done</span>");   
    });
    
    $('#wexp-form #position').parsley().on('field:error', function() {
           $('#wexp-form #positiondiv').addClass('has-error');
           $('#wexp-form #positiondiv').append("<span class='material-icons form-control-feedback'>clear</span>");   
    });    
    $('#wexp-form #position').parsley().on('field:success', function() {
            $('#wexp-form #positiondiv').addClass('has-success');
            $('#wexp-form #positiondiv').find('span').remove();
            $('#wexp-form #positiondiv').append("<span class='material-icons form-control-feedback'>done</span>");   
    });
    
    $('#wexp-form #startdate').parsley().on('field:error', function() {
           $('#wexp-form #startdiv').addClass('has-error');
           $('#wexp-form #startdiv').append("<span class='material-icons form-control-feedback'>clear</span>");   
    }); 
    
    $('#wexp-form #startdate').datepicker().on('changeDate', function (ev) {
            $('#wexp-form #startdiv').removeClass('has-error');
            $('#wexp-form #startdiv').addClass('has-success');
            $('#wexp-form #startdiv').find('span').remove();
            $('#wexp-form #startdiv').append("<span class='material-icons form-control-feedback'>done</span>");   
    });
    
    $('#wexp-form #startdate').parsley().on('field:success', function() {
            $('#wexp-form #startdiv').addClass('has-success');
            $('#wexp-form #startdiv').find('span').remove();
            $('#wexp-form #startdiv').append("<span class='material-icons form-control-feedback'>done</span>");   
    });
    
    $('#wexp-form #msalary').parsley().on('field:error', function() {
           $('#wexp-form #msalarydiv').addClass('has-error');
           $('#wexp-form #msalarydiv').append("<span class='material-icons form-control-feedback'>clear</span>");   
    });    
    $('#wexp-form #msalary').parsley().on('field:success', function() {
            $('#wexp-form #msalarydiv').addClass('has-success');
            $('#wexp-form #msalarydiv').find('span').remove();
            $('#wexp-form #msalarydiv').append("<span class='material-icons form-control-feedback'>done</span>");   
    });
    
    $('#wexp-form #enddate').parsley().on('field:error', function() {
           $('#wexp-form #enddiv').addClass('has-error');
           $('#wexp-form #enddiv').append("<span class='material-icons form-control-feedback'>clear</span>");   
    });    
    
    $('#wexp-form #enddate').datepicker().on('changeDate', function (ev) {
            $('#wexp-form #enddiv').removeClass('has-error');
            $('#wexp-form #enddiv').addClass('has-success');
            $('#wexp-form #enddiv').find('span').remove();
            $('#wexp-form #enddiv').append("<span class='material-icons form-control-feedback'>done</span>");   
    });
    
    $('#wexp-form #enddate').parsley().on('field:success', function() {
            $('#wexp-form #enddiv').addClass('has-success');
            $('#wexp-form #enddiv').find('span').remove();
            $('#wexp-form #enddiv').append("<span class='material-icons form-control-feedback'>done</span>");   
    });
    
    $('#currentempcb').click(function(){
        if($(this).is(":checked")){
           $("#enddate").attr("disabled" , "disabled");
           $('#enddate').removeAttr('data-parsley-required');           
        }
        else{
           $("#enddate").removeAttr("disabled");
           $('#enddate').attr('data-parsley-required', '');    
           
        }
    });
    
    $('#successdivworkexp').hide();
   */ 
    
});       
</script>
        
