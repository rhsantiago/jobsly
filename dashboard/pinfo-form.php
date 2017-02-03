<?php


    if (session_status() == PHP_SESSION_NONE) {
        session_start();
        include 'Database.php';
    }
    $user = "";
    $password = "";
    $userid= "";
    $id=0;
    $fname = "";
    $lname = "";
    $mname = "";
    $street = "";
    $city = "";
    $province = "";
    $country = "Philippines";
    $mnumber = "";
    $myemail = "";
    $landline = "";
    $age = "";
    $birthday ="";
    $nationality ="";
    $mode = "";

if(isset($_SESSION['user'])){
   $user = $_SESSION['user'];
   $password = $_SESSION['password'];
   $userid = $_SESSION['userid'];
    
  
    $database = new Database();

    $database->query('SELECT * from personalinformation where userid = :userid');
    $database->bind(':userid', $userid);   

    $row = $database->single();
    $id = $row['id'];
    
    if(!empty($id)){
        $mode = 'update';
        $fname = $row['fname'];
        $lname = $row['lname'];
        $mname = $row['mname'];
        $street = $row['street'];
        $city = $row['city'];
        $province = $row['province'];
        $country = $row['country'];
        $mnumber = $row['mnumber'];
        $myemail = $row['myemail'];
        $landline = $row['landline'];
        $age = $row['age'];
        $birthday = $row['birthday'];
        $bday = explode("-", $birthday);
        $birthday = $bday[1] .'/'.$bday[2].'/'.$bday[0];
        $gender = $row['gender'];
        $nationality = $row['nationality'];
    }else{
        $mode = 'insert';
    }
    
    $database->query('SELECT photo from useraccounts where id = :userid');
    $database->bind(':userid', $userid);   

    $row = $database->single();
    $photo = $row['photo'];
    
}
?>


<div class="row">    
   <div class="col-md-12 center">            
       <div class="adstop"> <img  src="https://lh5.ggpht.com/NFYFP2H9CCP50vAQNLa7AtCj_mbbYmOzY978fZqd31oL5qOdvXgxU3KW8ek2VgvIOvTqWY0=w728" alt="user"></div>  
   </div>
    <div class="col-md-12">
                             <h2 class="title">Personal Information</h2>
       </div>
</div>    
                    <div class="col-md-offset-1 col-md-8">
                        
                       
                <div class="section  section-landing">
	                

					<div class="features">
						<div class="row">
                            <form method="post" id="pinfo-form" name="pinfo-form" data-parsley-validate>
                    <input type="hidden" id="id" name="id" value="<?=$id?>">
                    <input type="hidden" id="mode" name="mode" value="<?=$mode?>">
                    <input type="hidden" id="userid" name="userid" value="<?=$userid?>"> 
		                    <div class="col-md-6">
                                    <div class="card card-nav-tabs cardtopmargin">
                                            <div id="tabtitle" class="header  header-success">
                                                <!-- colors: "header-primary", "header-info", "header-success", "header-warning", "header-danger" -->
                                                <div class="nav-tabs-navigation">
                                                    <div class="nav-tabs-wrapper">
                                                        <ul class="nav nav-tabs" data-tabs="tabs">
                                                            <li class="active">
                                                                <a href="#profile" data-toggle="tab">
                                                                    <i class="material-icons">fingerprint</i>
                                                                   Personal Information
                                                                </a>
                                                            </li>										
                                                        </ul>
                                                    </div>
                                                </div>
                                          </div>
                                             <div class="content">
                                                    <div class="tab-content">
                                                        <div class="tab-pane active" id="profile">
                                                            <div id="fnamediv" class="form-group label-floating">
                                                                <label class="control-label">First Name</label>
                                                                <input type="text" id="fname" class="form-control" value="<?=$fname ?>" data-parsley-required >  
                                                            </div>
                                                            <div id="lnamediv" class="form-group label-floating">
                                                                <label class="control-label">Last Name</label>
                                                                <input type="text" id="lname" class="form-control" value="<?=$lname ?>"  data-parsley-required>
                                                            </div>
                                                            <div class="form-group label-floating">
                                                                <label class="control-label">Middle Name</label>
                                                                <input type="text" id="mname" class="form-control" value="<?=$mname ?>">
                                                            </div>
                                                            <div >
                                                                 <a href="#photo-modal" data-userid="<?=$userid?>" data-toggle="modal">Upload Photo</a>
                                                              </div>
                                                            <?php
                                                                    if(!empty($photo)){
                                                             ?>
                                                             <div class="container"><div class="col-md-1" style="padding-left: 0px;  padding-right: 0px;">
                                                                    <img src="<?=$photo?>" class="img-responsive">
                                                                </div>
                                                            </div>
                                                           
                                                             <?php
                                                                    }
                                                             ?>
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
                                                                <a href="#profile" data-toggle="tab">
                                                                    <i class="material-icons">place</i>
                                                                    Location
                                                                </a>
                                                            </li>										
                                                        </ul>
                                                    </div>
                                                </div>
                                          </div>
                                             <div class="content">
                                                    <div class="tab-content">
                                                        <div class="tab-pane active" id="profile">
                                                            <div id="streetdiv" class="form-group label-floating">
                                                                <label class="control-label">Street Address</label>
                                                                <input type="text" id="street" class="form-control" value="<?=$street ?>" data-parsley-required>
                                                            </div>
                                                            <div id="citydiv" class="form-group label-floating">
                                                                <label class="control-label">City</label>
                                                                <input type="text" id="city" class="form-control" value="<?=$city ?>"  data-parsley-required>
                                                            </div>
                                                             <div id="provincediv" class="form-group label-floating">
                                                                <label class="control-label">Province</label>
                                                                <input type="text" id="province" class="form-control" value="<?=$province ?>" data-parsley-required data-parsley-pattern="^[a-zA-Z ]+$">
                                                            </div>
                                                            <div id="countrydiv" class="form-group label-floating">
                                                                <label class="control-label">Country</label>
                                                                <input type="text" id="country" class="form-control" value="<?=$country ?>"  data-parsley-required data-parsley-pattern="^[a-zA-Z ]+$">
                                                            </div>
                                                        </div>

                                                    </div>
                                             </div>
                                    </div>
                                
                                
		                    </div>
                            
                            <div class="col-md-6">
                                    <div class="card card-nav-tabs cardtopmargin">
                                            <div id="tabtitle" class="header  header-warning">
                                                <!-- colors: "header-primary", "header-info", "header-success", "header-warning", "header-danger" -->
                                                <div class="nav-tabs-navigation">
                                                    <div class="nav-tabs-wrapper">
                                                        <ul class="nav nav-tabs" data-tabs="tabs">
                                                            <li class="active">
                                                                <a href="#profile" data-toggle="tab">
                                                                    <i class="material-icons">phonelink_ring</i>
                                                                    Contact Information
                                                                </a>
                                                            </li>										
                                                        </ul>
                                                    </div>
                                                </div>
                                          </div>
                                             <div class="content">
                                                    <div class="tab-content">
                                                        <div class="tab-pane active" id="profile">
                                                            <div id="mnumberdiv" class="form-group label-floating">
                                                                <label class="control-label">Mobile Number</label>
                                                                <input type="text" id="mnumber" class="form-control" value="<?=$mnumber ?>" data-parsley-required data-parsley-pattern="^[\d\+\-\.\(\)\/\s]*$">
                                                            </div>
                                                            <div id="myemaildiv" class="form-group label-floating">
                                                                <label class="control-label">Email</label>
                                                                <input type="email" id="myemail" class="form-control" value="<?=$myemail ?>" data-parsley-required data-parsley-type="email">
                                                            </div>
                                                             <div id="landlinediv" class="form-group label-floating">
                                                                <label class="control-label">Landline</label>
                                                                <input type="text" id="landline" class="form-control" value="<?=$landline ?>" data-parsley-pattern="^[\d\+\-\.\(\)\/\s]*$">
                                                            </div>
                                                        </div>

                                                    </div>
                                             </div>
                                    </div>
                                
                                    <div class="card card-nav-tabs cardtopmargin">
                                            <div id="tabtitle" class="header  header-danger">
                                                <!-- colors: "header-primary", "header-info", "header-success", "header-warning", "header-danger" -->
                                                <div class="nav-tabs-navigation">
                                                    <div class="nav-tabs-wrapper">
                                                        <ul class="nav nav-tabs" data-tabs="tabs">
                                                            <li class="active">
                                                                <a href="#profile" data-toggle="tab">
                                                                    <i class="material-icons">person</i>
                                                                    Other Personal Details
                                                                </a>
                                                            </li>										
                                                        </ul>
                                                    </div>
                                                </div>
                                          </div>
                                             <div class="content">
                                                    <div class="tab-content">
                                                        <div class="tab-pane active" id="profile">
                                                            <div id="agediv" class="form-group label-floating">
                                                                <label class="control-label">Age</label>
                                                                <input type="text" id="age" class="form-control" value="<?=$age ?>" data-parsley-required data-parsley-type="number">                                                             
                                                            </div>
                                                            <div id="birthdaydiv" class="form-group label-static">
                                                                <label class="control-label">Birthday (MM/DD/YYYY)</label>
                                                                <input type='text' id='birthday' class='datepicker form-control' value="<?=$birthday ?>"  data-parsley-required data-trigger="blur" data-parsley-pattern="^((((0[13578])|(1[02]))[\/]?(([0-2][0-9])|(3[01])))|(((0[469])|(11))[\/]?(([0-2][0-9])|(30)))|(02[\/]?[0-2][0-9]))[\/]?\d{4}$">
                                                            </div>
                                                             <div id="genderdiv" class="form-group label-floating">
                                                                <label class="control-label">Gender</label>
                                                                <select class="form-control" id="gender" name="gender"  placeholder="Gender" data-parsley-required>
                                                                    <?php
 
                                                                        if($gender =='male'){
                                                                            echo"<option value='' disabled></option>";
                                                                            echo"<option value='male' selected>Male</option>";
                                                                            echo"<option value='female'>Female</option>";
                                                                        }else if($gender =='female'){
                                                                            echo"<option value='' disabled></option>";
                                                                            echo"<option value='male'>Male</option>";
                                                                            echo"<option value='female' selected>Female</option>";
                                                                        }else{
                                                                            echo"<option value='' selected disabled></option>";
                                                                            echo"<option value='male'>Male</option>";
                                                                            echo"<option value='female'>Female</option>";
                                                                        }
                                                            
                                                                    ?>
                                                                                                         
                                                                </select>
                                                            </div>
                                                            <div id="nationalitydiv" class="form-group label-floating">
                                                                <label class="control-label">Nationality</label>
                                                                <input type="text" id="nationality" class="form-control" value="<?=$nationality ?>" data-parsley-required data-parsley-pattern="^[a-zA-Z ]+$">
                                                            </div>
                                                           
                                                        </div>

                                                    </div>
                                             </div>
                                    </div>
                                   
                                
		                    </div>
                             </form>
                             
                            </div>
                        <div class="col-md-12 leftmargin10">  
                                 <div class="col-md-6">

                                                <div class="savebutton leftmargin10">
                                                    <button class="btn btn-primary " name="savepinfo" id="savepinfo" type="submit">Save Personal Information</button>
                                                </div>      

                                </div>
                                
                                <div class="col-md-6">                                
                                     <form method="post" id="pinfonext-form" name="pinfonext-form"> 
                                 <button class="btn btn-primary " name="pinfonext" id="pinfonext" type="submit">Go to Next Step</button>
                                    </form>
                                </div>                                            
                            </div>
                            <div class="col-md-12">                                    
                                             <div id="successdivpinfo" class="alert alert-success">
                                               
                                                  <div class="alert-icon">
                                                    <i class="material-icons">check</i>
                                                  </div>
                                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true"><i class="material-icons">clear</i></span>
                                                  </button>
                                                  <b>Alert: </b> Your personal information has been saved.
                                               
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
    $('#pinfo-form #fname').parsley().on('field:error', function() {
           $('#pinfo-form #fnamediv').addClass('has-error');
           $('#pinfo-form #fnamediv').append("<span class='material-icons form-control-feedback'>clear</span>");   
    });    
    $('#pinfo-form #fname').parsley().on('field:success', function() {
            $('#pinfo-form #fnamediv').addClass('has-success');
            $('#pinfo-form #fnamediv').find('span').remove()
            $('#pinfo-form #fnamediv').append("<span class='material-icons form-control-feedback'>done</span>");   
    });
    
    $('#pinfo-form #lname').parsley().on('field:error', function() {
           $('#pinfo-form #lnamediv').addClass('has-error');
           $('#pinfo-form #lnamediv').append("<span class='material-icons form-control-feedback'>clear</span>");   
    });    
    $('#pinfo-form #lname').parsley().on('field:success', function() {
            $('#pinfo-form #lnamediv').addClass('has-success');
            $('#pinfo-form #lnamediv').find('span').remove()
            $('#pinfo-form #lnamediv').append("<span class='material-icons form-control-feedback'>done</span>");   
    });
    
    $('#pinfo-form #street').parsley().on('field:error', function() {
           $('#pinfo-form #streetdiv').addClass('has-error');
           $('#pinfo-form #streetdiv').append("<span class='material-icons form-control-feedback'>clear</span>");   
    });    
    $('#pinfo-form #street').parsley().on('field:success', function() {
            $('#pinfo-form #streetdiv').addClass('has-success');
            $('#pinfo-form #streetdiv').find('span').remove()
            $('#pinfo-form #streetdiv').append("<span class='material-icons form-control-feedback'>done</span>");   
    });
    
    $('#pinfo-form #city').parsley().on('field:error', function() {
           $('#pinfo-form #citydiv').addClass('has-error');
           $('#pinfo-form #citydiv').append("<span class='material-icons form-control-feedback'>clear</span>");   
    });    
    $('#pinfo-form #city').parsley().on('field:success', function() {
            $('#pinfo-form #citydiv').addClass('has-success');
            $('#pinfo-form #citydiv').find('span').remove()
            $('#pinfo-form #citydiv').append("<span class='material-icons form-control-feedback'>done</span>");   
    });
    
    $('#pinfo-form #province').parsley().on('field:error', function() {
           $('#pinfo-form #provincediv').addClass('has-error');
           $('#pinfo-form #provincediv').append("<span class='material-icons form-control-feedback'>clear</span>");   
    });    
    $('#pinfo-form #province').parsley().on('field:success', function() {
            $('#pinfo-form #provincediv').addClass('has-success');
            $('#pinfo-form #provincediv').find('span').remove()
            $('#pinfo-form #provincediv').append("<span class='material-icons form-control-feedback'>done</span>");   
    });
    
    $('#pinfo-form #country').parsley().on('field:error', function() {
           $('#pinfo-form #countrydiv').addClass('has-error');
           $('#pinfo-form #countrydiv').append("<span class='material-icons form-control-feedback'>clear</span>");   
    });    
    $('#pinfo-form #country').parsley().on('field:success', function() {
            $('#pinfo-form #countrydiv').addClass('has-success');
            $('#pinfo-form #countrydiv').find('span').remove()
            $('#pinfo-form #countrydiv').append("<span class='material-icons form-control-feedback'>done</span>");   
    });
    
    $('#pinfo-form #mnumber').parsley().on('field:error', function() {
           $('#pinfo-form #mnumberdiv').addClass('has-error');
           $('#pinfo-form #mnumberdiv').append("<span class='material-icons form-control-feedback'>clear</span>");   
    });    
    $('#pinfo-form #mnumber').parsley().on('field:success', function() {
            $('#pinfo-form #mnumberdiv').addClass('has-success');
            $('#pinfo-form #mnumberdiv').find('span').remove()
            $('#pinfo-form #mnumberdiv').append("<span class='material-icons form-control-feedback'>done</span>");   
    });
    
    $('#pinfo-form #myemail').parsley().on('field:error', function() {
           $('#pinfo-form #myemaildiv').addClass('has-error');
           $('#pinfo-form #myemaildiv').append("<span class='material-icons form-control-feedback'>clear</span>");   
    });    
    $('#pinfo-form #myemail').parsley().on('field:success', function() {
            $('#pinfo-form #myemaildiv').addClass('has-success');
            $('#pinfo-form #myemaildiv').find('span').remove()
            $('#pinfo-form #myemaildiv').append("<span class='material-icons form-control-feedback'>done</span>");   
    });
    
    $('#pinfo-form #landline').parsley().on('field:error', function() {
           $('#pinfo-form #landlinediv').addClass('has-error');
           $('#pinfo-form #landlinediv').append("<span class='material-icons form-control-feedback'>clear</span>");   
    });    
    $('#pinfo-form #landline').parsley().on('field:success', function() {
            $('#pinfo-form #landlinediv').addClass('has-success');
            $('#pinfo-form #landlinediv').find('span').remove()
            $('#pinfo-form #landlinediv').append("<span class='material-icons form-control-feedback'>done</span>");   
    });
    
    $('#pinfo-form #age').parsley().on('field:error', function() {
           $('#pinfo-form #agediv').addClass('has-error');
           $('#pinfo-form #agediv').append("<span class='material-icons form-control-feedback'>clear</span>");   
    });    
    $('#pinfo-form #age').parsley().on('field:success', function() {
            $('#pinfo-form #agediv').addClass('has-success');
            $('#pinfo-form #agediv').find('span').remove()
            $('#pinfo-form #agediv').append("<span class='material-icons form-control-feedback'>done</span>");   
    });
    
    $('#pinfo-form #birthday').parsley().on('field:error', function() {
           $('#pinfo-form #birthdaydiv').addClass('has-error');
           $('#pinfo-form #birthdaydiv').append("<span class='material-icons form-control-feedback'>clear</span>");   
    });    
    $('#pinfo-form #birthday').parsley().on('field:success', function() {
            $('#pinfo-form #birthdaydiv').addClass('has-success');
            $('#pinfo-form #birthdaydiv').find('span').remove()
            $('#pinfo-form #birthdaydiv').append("<span class='material-icons form-control-feedback'>done</span>");   
    });
    
    $('#pinfo-form #gender').parsley().on('field:error', function() {
           $('#pinfo-form #birthdaydiv').addClass('has-error');
           $('#pinfo-form #birthdaydiv').append("<span class='material-icons form-control-feedback'>clear</span>");   
    });    
    $('#pinfo-form #gender').parsley().on('field:success', function() {
            $('#pinfo-form #genderdiv').addClass('has-success');
            $('#pinfo-form #genderdiv').find('span').remove()
            $('#pinfo-form #genderdiv').append("<span class='material-icons form-control-feedback'>done</span>");   
    });
    
    $('#pinfo-form #nationality').parsley().on('field:error', function() {
           $('#pinfo-form #nationalitydiv').addClass('has-error');
           $('#pinfo-form #nationalitydiv').append("<span class='material-icons form-control-feedback'>clear</span>");   
    });    
    $('#pinfo-form #nationality').parsley().on('field:success', function() {
            $('#pinfo-form #nationalitydiv').addClass('has-success');
            $('#pinfo-form #nationalitydiv').find('span').remove()
            $('#pinfo-form #nationalitydiv').append("<span class='material-icons form-control-feedback'>done</span>");   
    });
    
    
    
});       
</script>