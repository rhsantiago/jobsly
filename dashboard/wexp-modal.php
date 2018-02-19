<?php
if (session_status() == PHP_SESSION_NONE) {
        session_start();
        include 'Database.php';
    }    
if(isset($_POST['userid'])){ $userid = $_POST['userid']; }
if(isset($_POST['workexpid'])){ $workexpid = $_POST['workexpid']; }
if(isset($_POST['mode'])){ $mode = $_POST['mode']; }

if(isset($_SESSION['user'])){

}else{
    header("Location: logout.php");
}
$startdate = '';
$enddate = '';
$startdateinput = '';
$enddateinput = '';
$sdate = array('0000','00','00');
$edate = array('0000','00','00');
if($mode=='del'){
?>    
    
   <form method="post" id="wexp-form-modal" name="wexp-form-modal" data-parsley-validate>
             <input type="hidden" id="userid" name="userid" value="<?=$userid?>">
             <input type="hidden" id="id" name="id" value="<?=$workexpid?>">
             <input type="hidden" id="mode" name="mode" value="del">
<div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title text-primary h4weight" id="myModalLabel">Delete Work Experience</h4>
	      </div>
	      <div id="modaleditworkexp" class="modal-body modal-gray">
	                              
                                    <div class="card card-nav-tabs">
                                           
                                             <div class="content">
                                                    <div class="tab-content">
                                                        <div class="tab-pane active" id="profile">
                                                            <div class="row">
                                                                  
                                                               
                                                                <div class="col-md-12 col-xs-12 text-center">
                                                                
                                                                   <h3 ><label class="text-danger">Are you sure you want to delete this Work Experience?</label></h3>
                                                                    

                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                             </div>
                                    </div>
                               
                           
	      </div>
	      <div class="modal-footer blog-post">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        <button type="submit" class="btn btn-primary"><i class="material-icons">done</i> I'm sure</button>
	      </div>
</form>
    
    
    
    
<?php    
    
    
}else if($mode=='update'){
    $database = new Database();

    $database->query('SELECT * from workexperience where id = :workexpid');
    $database->bind(':workexpid', $workexpid);   
    try{
        $row = $database->single();
    }catch (PDOException $e) {
        $msg = $e->getTraceAsString()." ".$e->getMessage();
        $log->error($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
        die("");
    } 
    
    $id = $row['id'];
    $company = $row['company'];
    $position = $row['position'];
    $msalary = $row['msalary'];
    $industry = $row['industry'];
    $jobdescription = $row['jobdescription'];
    $startdate = $row['startdate'];
    
    if($startdate=='0000-00-00'){
        $startdateinput = "";
    }else{
        $sdate = explode("-", $startdate);
        if(isset($sdate[1]) && isset($sdate[2]) && isset($sdate[1])){
            $startdateinput = $sdate[1] .'/'.$sdate[2].'/'.$sdate[0];
        }
    }
    $enddate = $row['enddate'];
    if($enddate=='0000-00-00'){
        $enddateinput = "";
    }else{
        $edate = explode("-", $enddate);
        if(isset($edate[1]) && isset($edate[2]) && isset($edate[1])){           
            $enddateinput = $edate[1] .'/'.$edate[2].'/'.$edate[0];
        }
    }

    $cecb = $row['currentemployer'];
    if($cecb=='on'){
        $cecb = 'checked';
    }
    
    $plevel = $row['plevel'];
}else if($mode=='insert'){
    $company = "";
    $position = "";
    $msalary = "";
    $industry = "";
    $jobdescription = "";
    $cecb = "";
    $plevel = 0;
}
?>

<style>
.datepicker{z-index:1151 !important;}
</style>
<?php
    if($mode!='del'){
?>
<form method="post" id="wexp-form-modal" name="wexp-form-modal" > 
             <input type="hidden" id="userid" name="userid" value="<?=$userid?>">
             <input type="hidden" id="id" name="id" value="<?=$workexpid?>">
             <input type="hidden" id="mode" name="mode" value="<?=$mode?>">
<div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title text-primary h4weight" id="myModalLabel">
                <?php
                    if($mode=='insert'){
                        echo "Add";
                    }else{
                        echo "Edit";
                    }
                        
                ?>
                Work Experience</h4>
	      </div>
	      <div id="modaleditworkexp" class="modal-body modal-gray">
	                              
                                    <div class="card card-nav-tabs cardtopmargin">
                                          
                                             <div class="content">
                                                    <div class="tab-content">
                                                        <div class="tab-pane active" id="profile">
                                                            <div class="row">
                                                                  <div class="col-md-6 col-xs-6">
                                                                    <div class="form-group label-floating">
                                                                        <label class="control-label">Company Name</label>
                                                                        <input type="text" id="company" class="form-control" value="<?=$company?>" data-parsley-required>
                                                                    </div>
                                                                    <div id="positiondiv" class="form-group label-floating">
                                                                        <label class="control-label">Position</label>
                                                                        <input type="text" id="position" class="form-control" value="<?=$position?>" data-parsley-required>
                                                                    </div>
                                                                    <div id="startdiv" class="form-group  label-static">
                                                                        <label class="control-label">Start Date</label>
                                                                       <input type='text' id='startdate' name='startdate' class='datepicker form-control'  value="" data-parsley-required data-parsley-pattern="^((((0[13578])|(1[02]))[\/]?(([0-2][0-9])|(3[01])))|(((0[469])|(11))[\/]?(([0-2][0-9])|(30)))|(02[\/]?[0-2][0-9]))[\/]?\d{4}$">
                                                                    </div>
                                                                      <div class="form-group label-floating">
                                                                        <label class="control-label">Monthly Salary</label>
                                                                        <input type="text" id="msalary" class="form-control" value="<?=$msalary?>" required data-parsley-type="number">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-xs-6">
                                                                    <div class="form-group label-floating">
                                                                        <label class="control-label">Industry</label>
                                                                        <input type="text" id="industry" class="form-control"  value="<?=$industry?>">
                                                                    </div>
                                                                    <div class="form-group label-floating">
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
                                                                        <input type='text' id='enddate' class='datepicker form-control'  value="" data-parsley-required data-parsley-pattern="^((((0[13578])|(1[02]))[\/]?(([0-2][0-9])|(3[01])))|(((0[469])|(11))[\/]?(([0-2][0-9])|(30)))|(02[\/]?[0-2][0-9]))[\/]?\d{4}$">
                                                                    </div>
                                                                    <div id="currentemp" class="form-group">
                                                                         <div class="">
                                                                            <label>
                                                                                <input type="checkbox" id="currentempcb" name="currentempcb" <?=$cecb?>>
                                                                                Current Employer
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12 col-xs-12">
                                                                    <hr>
                                                                   Responsibilities / Accomplishments
                                                                    <div id="summernote"><?=$jobdescription?></div>
                                                                          <script>
                                                                            $(document).ready(function() {
                                                                               
                                                                            });
                                                                            </script>

                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                             </div>
                                    </div>
                               
                               
                                  <div id="successdivworkexp" class="alert alert-success">
                                               
                                                  <div class="alert-icon">
                                                    <i class="material-icons">check</i>
                                                  </div>
                                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true"><i class="material-icons">clear</i></span>
                                                  </button>
                                                  <b>Alert: </b> Your work experience has been saved.
                                               
                                            </div>
                           
	      </div>
	      <div class="modal-footer blog-post">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        <button type="submit" class="btn btn-primary" >
                <?php
                    if($mode=='insert'){
                        echo "<i class='material-icons'>add</i> Add Work Experience";
                    }else{
                        echo "<i class='material-icons'>save</i> Save changes";
                    }
                        
                ?>
                
              </button>
	      </div>
</form>
<?php
}
?>
<script>
$(document).ready(function ($) {
     $('#wexp-form-modal').parsley({
                            successClass: "has-success",
                            errorClass: "has-error"
                        });
    $('#summernote').summernote({
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
                                                                                    },
 /*  cleaner:{
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
   */ 
    });
    
    $("#wexp-form-modal #startdate").val("<?=$startdateinput?>");
    $("#wexp-form-modal #enddate").val("<?=$enddateinput?>");

    $('#wexp-form-modal #company').parsley().on('field:error', function() {
           $('#wexp-form-modal #companydiv').addClass('has-error');
           $('#wexp-form-modal #companydiv').append("<span class='material-icons form-control-feedback'>clear</span>");   
    });    
    $('#wexp-form-modal #company').parsley().on('field:success', function() {
            $('#wexp-form-modal #companydiv').addClass('has-success');
            $('#wexp-form-modal #companydiv').find('span').remove();
            $('#wexp-form-modal #companydiv').append("<span class='material-icons form-control-feedback'>done</span>");   
    });
    
    $('#wexp-form-modal #position').parsley().on('field:error', function() {
           $('#wexp-form-modal #positiondiv').addClass('has-error');
           $('#wexp-form-modal #positiondiv').append("<span class='material-icons form-control-feedback'>clear</span>");   
    });    
    $('#wexp-form-modal #position').parsley().on('field:success', function() {
            $('#wexp-form-modal #positiondiv').addClass('has-success');
            $('#wexp-form-modal #positiondiv').find('span').remove();
            $('#wexp-form-modal #positiondiv').append("<span class='material-icons form-control-feedback'>done</span>");   
    });
    
    $('#wexp-form-modal #startdate').parsley().on('field:error', function() {
           $('#wexp-form-modal #startdiv').addClass('has-error');
           $('#wexp-form-modal #startdiv').append("<span class='material-icons form-control-feedback'>clear</span>");   
    }); 
    
    $('#wexp-form-modal #startdate').datepicker().on('changeDate', function (ev) {
            $('#wexp-form-modal #startdiv').removeClass('has-error');
            $('#wexp-form-modal #startdiv').addClass('has-success');
            $('#wexp-form-modal #startdiv').find('span').remove();
            $('#wexp-form-modal #startdiv').append("<span class='material-icons form-control-feedback'>done</span>");   
    });
    
    $('#wexp-form-modal #startdate').parsley().on('field:success', function() {
            $('#wexp-form-modal #startdiv').addClass('has-success');
            $('#wexp-form-modal #startdiv').find('span').remove();
            $('#wexp-form-modal #startdiv').append("<span class='material-icons form-control-feedback'>done</span>");   
    });
    
    $('#wexp-form-modal #msalary').parsley().on('field:error', function() {
           $('#wexp-form-modal #msalarydiv').addClass('has-error');
           $('#wexp-form-modal #msalarydiv').append("<span class='material-icons form-control-feedback'>clear</span>");   
    });    
    $('#wexp-form-modal #msalary').parsley().on('field:success', function() {
            $('#wexp-form-modal #msalarydiv').addClass('has-success');
            $('#wexp-form-modal #msalarydiv').find('span').remove();
            $('#wexp-form-modal #msalarydiv').append("<span class='material-icons form-control-feedback'>done</span>");   
    });
    
    $('#wexp-form-modal #enddate').parsley().on('field:error', function() {
           $('#wexp-form-modal #enddiv').addClass('has-error');
           $('#wexp-form-modal #enddiv').append("<span class='material-icons form-control-feedback'>clear</span>");   
    });    
    
    $('#wexp-form-modal #enddate').datepicker().on('changeDate', function (ev) {
            $('#wexp-form-modal #enddiv').removeClass('has-error');
            $('#wexp-form-modal #enddiv').addClass('has-success');
            $('#wexp-form-modal #enddiv').find('span').remove();
            $('#wexp-form-modal #enddiv').append("<span class='material-icons form-control-feedback'>done</span>");   
    });
    
    $('#wexp-form-modal #enddate').parsley().on('field:success', function() {
            $('#wexp-form-modal #enddiv').addClass('has-success');
            $('#wexp-form-modal #enddiv').find('span').remove();
            $('#wexp-form-modal #enddiv').append("<span class='material-icons form-control-feedback'>done</span>");   
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
  
    
  //  $('#successdivworkexp').hide();
});       
</script>