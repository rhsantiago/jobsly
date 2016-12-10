<?php
if (session_status() == PHP_SESSION_NONE) {
        session_start();
        include 'Database.php';
}

 

$startdate = "";
$enddate = "";
$sdate = "";
$edate ="";

if(isset($_SESSION['user'])){
   $user = $_SESSION['user'];
   $password = $_SESSION['password'];
   $userid = $_SESSION['userid'];
    
    
    $database = new Database();
}
?>


     <form method="post" id="wexp-form" name="wexp-form" data-parsley-validate data-parsley-trigger="keyup"> 
                                 <input type="hidden" id="userid" name="userid" value="<?=$userid?>">
                                 <input type="hidden" id="mode" name="mode" value="insert">
                    <div class="col-md-offset-1 col-md-7">
                        <div class="col-md-12">            
                       <!--     <img  src="https://lh5.ggpht.com/NFYFP2H9CCP50vAQNLa7AtCj_mbbYmOzY978fZqd31oL5qOdvXgxU3KW8ek2VgvIOvTqWY0=w728" 
                                 alt="user">         
                        -->
                             <h2 class="title">Work Experience</h2>
                        </div>
                       
                <div class="section  section-landing">
	         
					<div class="features">
						<div class="row">
		                    <div class="col-md-12">
                                        <div id="workexpcardsdiv">
                                            <?php
                                                    $database->query('SELECT * FROM workexperience where userid = :userid order by startdate desc');
                                                    $database->bind(':userid', $userid);  
                                                    $rows = $database->resultset();
                                                           // echo $row['name'];
                                                    foreach($rows as $row){
                                                        
                                                        $sdate = explode("-", $row['startdate']);
                                                        $startdate = $sdate[1] .'/'.$sdate[2].'/'.$sdate[0];
                                                        $edate = explode("-", $row['enddate']);
                                                        $enddate = $edate[1] .'/'.$edate[2].'/'.$edate[0];
                                             ?>           
                                                        
                                                        <div class="card">                                            
                                                             <div class="content">                           
                                                                            <div class="row">
                                                                                <div class="col-md-12">
                                                                                    <div id="workexpcard" class="">
                                                                                        <ul class="list-inline">
                                                                                          <li><h3 class="text-info"><?=$row['position']?></h3></li>
                                                                                            <li><h6 class="text-muted"><i><?=$row['company']?></i></h6> </li>
                                                                                            <li class="editfloatright">
                                                                                                <a href='#workexpmodal' id="editworkexp" title="Edit" data-mode="update" data-workexpid="<?=$row['id']?>" data-userid="<?=$userid?>" data-toggle="modal" data-target="#workexp-modal"><i class="material-icons">edit</i></a>
                                                                                                <a href='#workexpmodal' id="delworkexp" title="Delete" data-mode="del" data-workexpid="<?=$row['id']?>" data-userid="<?=$userid?>" data-toggle="modal" data-target="#workexp-modal"><i class="material-icons">delete</i></a>
                                                                                            </li>
                                                                                        </ul>
                                                                                        <ul  class="list-inline ">
                                                                                            <li >
                                                                                                <h6 id="vertical-align" class="text-muted">
                                                                                                    <i class="material-icons text-info">business</i><span><i id='industryli'><?=$row['industry']?></i></span>
                                                                                                </h6>
                                                                                            </li>
                                                                                            <li>
                                                                                                <h6 id="vertical-align" class="text-muted">
                                                                                                   <i class="material-icons text-info">date_range</i> <?=$startdate?> - <?=$enddate?>
                                                                                                </h6>
                                                                                            </li>
                                                                                            <li>
                                                                                                <h6 id="vertical-align" class="text-muted">
                                                                                                <i class="material-icons text-info">people</i><i> <?=$row['plevel']?></i>
                                                                                                </h6>
                                                                                            </li>
                                                                                            <li>
                                                                                                <h6 id="vertical-align" class="text-muted">
                                                                                                   <i class="material-icons text-info">local_atm</i> Php <?=$row['msalary']?>
                                                                                                </h6>
                                                                                            </li>
                                                                                        </ul>
                                                                                        <hr>
                                                                                        <p>
                                                                                            <span class="text-muted"><i class="material-icons text-info">description</i> </span>
                                                                                            <?=$row['jobdescription']?>
                                                                                        </p>
                                                                                    </div>
                                                                                </div>
                                                                               
                                                                            
                                                                            </div>
                                                                      
                                                             </div>
                                                    </div>
                                                                   
                                                        
                                             <?php          
                                                    }
                                             ?>
                                            
                                         
                                        </div>
                                
                            
                                    <div class="card card-nav-tabs">
                                            <div id="tabtitle" class="header  header-success">
                                                <!-- colors: "header-primary", "header-info", "header-success", "header-warning", "header-danger" -->
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
                                                                       <input type='text' id='startdate' class='datepicker form-control' data-parsley-required data-parsley-pattern="^((((0[13578])|(1[02]))[\/]?(([0-2][0-9])|(3[01])))|(((0[469])|(11))[\/]?(([0-2][0-9])|(30)))|(02[\/]?[0-2][0-9]))[\/]?\d{4}$">
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
                                                                        <input type="text" id="plevel" class="form-control">
                                                                    </div>
                                                                    <div id="enddiv" class="form-group label-static">
                                                                        <label class="control-label">End Date</label>
                                                                        <input type='text' id='enddate' class='datepicker form-control' data-parsley-required data-parsley-pattern="^((((0[13578])|(1[02]))[\/]?(([0-2][0-9])|(3[01])))|(((0[469])|(11))[\/]?(([0-2][0-9])|(30)))|(02[\/]?[0-2][0-9]))[\/]?\d{4}$">
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
                                                                   <h6><label>Job Description</label></h6>
                                                                    <div id="summernote"><p>Hello Summernote</p></div>
                                                                    
                                                                          <script>
                                                                            $(document).ready(function() {
                                                                               $('#summernote').summernote({
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

                                                    </div>
                                             </div>
                                    </div>
                               
                                <button class="btn btn-primary " name="addwexp" id="addwexp" type="submit">
                                                        Add Work Experience
                                                       </button>
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
    </form>
<script>
jQuery(document).ready(function ($) {
    $('#wexp-form #company').parsley().on('field:error', function() {
           $('#wexp-form #companydiv').addClass('has-error');
           $('#wexp-form #companydiv').append("<span class='material-icons form-control-feedback'>clear</span>");   
    });    
    $('#wexp-form #company').parsley().on('field:success', function() {
            $('#wexp-form #companydiv').addClass('has-success');
            $('#wexp-form #companydiv').find('span').remove()
            $('#wexp-form #companydiv').append("<span class='material-icons form-control-feedback'>done</span>");   
    });
    
    $('#wexp-form #position').parsley().on('field:error', function() {
           $('#wexp-form #positiondiv').addClass('has-error');
           $('#wexp-form #positiondiv').append("<span class='material-icons form-control-feedback'>clear</span>");   
    });    
    $('#wexp-form #position').parsley().on('field:success', function() {
            $('#wexp-form #positiondiv').addClass('has-success');
            $('#wexp-form #positiondiv').find('span').remove()
            $('#wexp-form #positiondiv').append("<span class='material-icons form-control-feedback'>done</span>");   
    });
    
    $('#wexp-form #startdate').parsley().on('field:error', function() {
           $('#wexp-form #startdiv').addClass('has-error');
           $('#wexp-form #startdiv').append("<span class='material-icons form-control-feedback'>clear</span>");   
    });    
    $('#wexp-form #startdate').parsley().on('field:success', function() {
            $('#wexp-form #startdiv').addClass('has-success');
            $('#wexp-form #startdiv').find('span').remove()
            $('#wexp-form #startdiv').append("<span class='material-icons form-control-feedback'>done</span>");   
    });
    
    $('#wexp-form #msalary').parsley().on('field:error', function() {
           $('#wexp-form #msalarydiv').addClass('has-error');
           $('#wexp-form #msalarydiv').append("<span class='material-icons form-control-feedback'>clear</span>");   
    });    
    $('#wexp-form #msalary').parsley().on('field:success', function() {
            $('#wexp-form #msalarydiv').addClass('has-success');
            $('#wexp-form #msalarydiv').find('span').remove()
            $('#wexp-form #msalarydiv').append("<span class='material-icons form-control-feedback'>done</span>");   
    });
    
    $('#wexp-form #enddate').parsley().on('field:error', function() {
           $('#wexp-form #enddiv').addClass('has-error');
           $('#wexp-form #enddiv').append("<span class='material-icons form-control-feedback'>clear</span>");   
    });    
    $('#wexp-form #enddate').parsley().on('field:success', function() {
            $('#wexp-form #enddiv').addClass('has-success');
            $('#wexp-form #enddiv').find('span').remove()
            $('#wexp-form #enddiv').append("<span class='material-icons form-control-feedback'>done</span>");   
    });
    
    $('#wexp-form #successdivworkexp').hide();
   
    
});       
</script>
        
