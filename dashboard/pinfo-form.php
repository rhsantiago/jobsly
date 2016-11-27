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
    $country = "";
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
    
}
?>

<form method="post" id="pinfo-form" name="pinfo-form">
                    <input type="hidden" id="id" name="id" value="<?=$id?>">
                    <input type="hidden" id="mode" name="mode" value="<?=$mode?>">
                    <input type="hidden" id="userid" name="userid" value="<?=$userid?>">          
                    <div class="col-md-9 ">
                        <div class="col-md-12">            
                       <!--     <img  src="https://lh5.ggpht.com/NFYFP2H9CCP50vAQNLa7AtCj_mbbYmOzY978fZqd31oL5qOdvXgxU3KW8ek2VgvIOvTqWY0=w728" 
                                 alt="user">         
                        -->
                             <h2 class="title">Personal Information</h2>
                        </div>
                       
                <div class="section  section-landing">
	                

					<div class="features">
						<div class="row">
		                    <div class="col-md-6">
                                    <div class="card card-nav-tabs">
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
                                                            <div class="form-group label-floating">
                                                                <label class="control-label">First Name</label>
                                                                <input type="text" id="fname" class="form-control" value="<?=$fname ?>">
                                                            </div>
                                                            <div class="form-group label-floating">
                                                                <label class="control-label">Last Name</label>
                                                                <input type="text" id="lname" class="form-control" value="<?=$lname ?>">
                                                            </div>
                                                            <div class="form-group label-floating">
                                                                <label class="control-label">Middle Name</label>
                                                                <input type="text" id="mname" class="form-control" value="<?=$mname ?>">
                                                            </div>
                                                        </div>

                                                    </div>
                                             </div>
                                    </div>
                                
                                    <div class="card card-nav-tabs">
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
                                                            <div class="form-group label-floating">
                                                                <label class="control-label">Street Address</label>
                                                                <input type="text" id="street" class="form-control" value="<?=$street ?>">
                                                            </div>
                                                            <div class="form-group label-floating">
                                                                <label class="control-label">City</label>
                                                                <input type="text" id="city" class="form-control" value="<?=$city ?>">
                                                            </div>
                                                             <div class="form-group label-floating">
                                                                <label class="control-label">Province</label>
                                                                <input type="text" id="province" class="form-control" value="<?=$province ?>">
                                                            </div>
                                                            <div class="form-group label-floating">
                                                                <label class="control-label">Country</label>
                                                                <input type="text" id="country" class="form-control" value="<?=$country ?>">
                                                            </div>
                                                        </div>

                                                    </div>
                                             </div>
                                    </div>
                                
                                
		                    </div>
                            
                            <div class="col-md-6">
                                    <div class="card card-nav-tabs">
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
                                                            <div class="form-group label-floating">
                                                                <label class="control-label">Mobile Number</label>
                                                                <input type="text" id="mnumber" class="form-control" value="<?=$mnumber ?>">
                                                            </div>
                                                            <div class="form-group label-floating">
                                                                <label class="control-label">Email</label>
                                                                <input type="email" id="myemail" class="form-control" value="<?=$myemail ?>">
                                                            </div>
                                                             <div class="form-group label-floating">
                                                                <label class="control-label">Landline</label>
                                                                <input type="text" id="landline" class="form-control" value="<?=$landline ?>">
                                                            </div>
                                                        </div>

                                                    </div>
                                             </div>
                                    </div>
                                
                                    <div class="card card-nav-tabs">
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
                                                            <div class="form-group label-floating">
                                                                <label class="control-label">Age</label>
                                                                <input type="text" id="age" class="form-control" value="<?=$age ?>">
                                                            </div>
                                                            <div id="birthdaydiv" class="form-group label-static">
                                                                <label class="control-label">Birthday</label>
                                                                <input type='text' id='birthday' class='datepicker form-control' value="<?=$birthday ?>">
                                                            </div>
                                                             <div class="form-group label-floating">
                                                                <label class="control-label">Gender</label>
                                                                <select class="form-control" id="gender" name="gender"  placeholder="Gender">
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
                                                            <div class="form-group label-floating">
                                                                <label class="control-label">Nationality</label>
                                                                <input type="text" id="nationality" class="form-control" value="<?=$nationality ?>">
                                                            </div>
                                                           
                                                        </div>

                                                    </div>
                                             </div>
                                    </div>
                                   
                                
		                    </div>
		                     <div class="col-md-12">
                                
                                            <div class="savebutton">
                                                <button class="btn btn-primary " name="savepinfo" id="savepinfo" type="submit">Save Personal Information</button>
                                            </div>       
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

