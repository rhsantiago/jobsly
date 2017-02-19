<?php
if (session_status() == PHP_SESSION_NONE) {
        session_start();
        include 'Database.php';
}
include 'specialization.php';

if(isset($_SESSION['user'])){
   $user = $_SESSION['user'];
   $password = $_SESSION['password'];
   $userid = $_SESSION['userid'];
    
include "serverlogconfig.php";
    
    $database = new Database();

    $database->query('SELECT * from additionalinformation where userid = :userid');
    $database->bind(':userid', $userid);   
    
    try{
    $row = $database->single();
    }catch (PDOException $e) {
        $error = true;
        $msg = $e->getTraceAsString()." ".$e->getMessage();
        include "serverlog.php";
        die("");
    }    
    $id = $row['id'];
        $mode = 'update';
        $dposition = $row['dposition'];
        $specialization = $row['specialization'];
        $plevel = $row['plevel'];
        $esalary = $row['esalary'];
        $pworkloc = $row['pworkloc'];
        $yexp = $row['yexp'];
        $wtravel = $row['wtravel'];
        if($wtravel=='on'){
            $wtravel = 'checked';
        }
        $wrelocate = $row['wrelocate'];
        if($wrelocate=='on'){
            $wrelocate = 'checked';
        }
        $pholder = $row['pholder'];
        if($pholder=='on'){
            $pholder = 'checked';
        }
        $languages = $row['languages'];
        
    if(!empty($id)){
        $mode = 'update';               
    }else{
        $mode = 'insert';
    }
}
?>
<div class="col-md-12 center">            
       <div class="adstop"> <img  src="https://lh5.ggpht.com/NFYFP2H9CCP50vAQNLa7AtCj_mbbYmOzY978fZqd31oL5qOdvXgxU3KW8ek2VgvIOvTqWY0=w728" alt="user"></div>  
</div>
<div class="col-md-12">
     <h2 class="title">Additional Information</h2>
</div>
                    <div class="col-md-offset-1 col-md-8">
                        <div class="col-md-12">            
                       <!--     <img  src="https://lh5.ggpht.com/NFYFP2H9CCP50vAQNLa7AtCj_mbbYmOzY978fZqd31oL5qOdvXgxU3KW8ek2VgvIOvTqWY0=w728" 
                                 alt="user">         
                        -->
                             
                        </div>
                       
              <div class="section  section-landing">  
	         
					<div class="features">
						<div class="row">
		                    <div class="col-md-12">
                                   <form method="post" id="ainfo-form" name="ainfo-form" data-parsley-validate> 
                                                             <input type="hidden" id="userid" name="userid" value="<?=$userid?>">
                                                             <input type="hidden" id="etrain" name="mode" value="hs">
                                                             <input type="hidden" id="mode" name="mode" value="<?=$mode?>">   
                                
                            
                                    <div class="card card-nav-tabs cardtopmargin">
                                            <div id="tabtitle" class="header  header-success">
                                                <!-- colors: "header-primary", "header-info", "header-success", "header-warning", "header-danger" -->
                                                <div class="nav-tabs-navigation">
                                                    <div class="nav-tabs-wrapper">
                                                        <ul class="nav nav-tabs" data-tabs="tabs">
                                                            <li class="active">
                                                                <a href="#hs" data-toggle="tab">
                                                                    <i class="material-icons">sentiment_very_satisfied</i>Job Expectation
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
                                                                    <div id="dpositiondiv" class="form-group label-floating">
                                                                        <label class="control-label">Desired Position</label>
                                                                        <input type="text" id="dposition" class="form-control" value="<?=$dposition?>" data-parsley-required>
                                                                    </div>
                                                                      <div id="esalarydiv" class="form-group label-floating">
                                                                        <label class="control-label">Expected Salary</label>
                                                                        <input type="text" id="esalary" class="form-control" value="<?=$esalary?>" data-parsley-required data-parsley-type="number">
                                                                    </div>
                                                                     
                                                                                                                                     
                                                                </div>
                                                                <div class="col-md-6 col-xs-6">                                                                   <div id="pleveldiv" class="form-group label-floating">
                                                                        <label class="control-label">Position Level</label>
                                                                    <select class="form-control" id="plevel" name="plevel"  placeholder="Position Level" data-parsley-required>
                                                                        <?php
                                                                            echo'<option disabled></option>';
                                                                            echo"<option value='1' "; if($plevel==1){echo'selected';} echo">Executive</option>";
                                                                            echo"<option value='2' "; if($plevel==2){echo'selected';} echo">Manager</option>";
                                                                            echo"<option value='3' "; if($plevel==3){echo'selected';} echo">Assistant Manager</option>";
                                                                            echo"<option value='4' "; if($plevel==4){echo'selected';} echo">Supervisor</option>";
                                                                            echo"<option value='5' "; if($plevel==5){echo'selected';} echo"> 5 Years+ Experienced Employee</option>";
                                                                            echo"<option value='6' "; if($plevel==6){echo'selected';} echo">1-4 Years Experienced Employee</option>";
                                                                            echo"<option value='7' "; if($plevel==7){echo'selected';} echo"><1 Year Experienced Employee/Fresh Grad</option>";
        
                                                                        ?>
                                                                    </select>                                                                        
                                                                    </div>
                                                                    <div id="specializationdiv" class="form-group label-floating">
                                                                        <label class="control-label">Specialization</label>
                                                                        <select class="form-control" id="specialization" name="specialization"  placeholder="Specialization" data-parsley-required>
                                                                            <option disabled></option>
                                                                            <?php
                                                                                    $i=0;
                                                                                    foreach($specarray as $spec){
                                                                                        echo "<option value='$i' "; if($specialization==$i){echo'selected';} echo">$specarray[$i]</option>";
                                                                                        $i++;
                                                                                    }
                                                                            ?>
                                                                        </select>
                                                                        
                                                                    </div> 
                                                                    <div id="otherspecdiv" class="form-group label-floating">
                                                                        <label class="control-label">Other Specialization</label>
                                                                        <input type="text" id="otherspec" class="form-control" value="<?=$specialization?>" data-parsley-required>
                                                                    </div>
                                                                                                                                  
                                                                </div>
                                                               
                                                        
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
                                                                <a href="#hs" data-toggle="tab">
                                                                    <i class="material-icons">info</i>Other Information
                                                                </a>
                                                            </li>                                                           
                                                            
                                                        </ul>
                                                    </div>
                                                </div>
                                          </div>
                                             <div class="content">
                                                    <div class="tab-content">
                                                        
                                                        <div class="tab-pane active" id="">
                                                            
                                                            <div class="row">
                                                                  <div class="col-md-6 col-xs-6">
                                                                    <div id="yexpdiv" class="form-group label-floating">
                                                                        <label class="control-label">Years of Experience</label>
                                                                        <input type="text" id="yexp" class="form-control" value="<?=$yexp?>" data-parsley-required data-parsley-type="number">
                                                                    </div>
                                                                      <div id="wtraveldiv" class="form-group">
                                                                         <div class="checkbox">
                                                                            <label>
                                                                                    <input type="checkbox" id="wtravel" name="optionsCheckboxes" <?=$wtravel?>>
                                                                                Willing to Travel?
                                                                            </label>
                                                                        </div>
                                                                      </div>
                                                                        <div id="pholderdiv" class="form-group">
                                                                         <div class="checkbox">
                                                                            <label>
                                                                                    <input type="checkbox" id="pholder" name="optionsCheckboxes" <?=$pholder?>>
                                                                                Do you have a valid passport?
                                                                            </label>
                                                                        </div>                                                                         
                                                                      </div>                                                             
                                                                </div>
                                                                <div class="col-md-6 col-xs-6"> 
                                                                    <div id="languagesdiv" class="form-group label-floating">
                                                                        <label class="control-label">Languages</label>
                                                                        <input type="text" id="languages" class="form-control" value="<?=$languages?>">
                                                                    </div>
                                                                     <div id="pworklocdiv" class="form-group label-floating">
                                                                        <label class="control-label">Work Location</label>
                                                                        <input type="text" id="pworkloc" class="form-control" value="<?=$pworkloc?>">
                                                                    </div>
                                                                    <div id="wrelocatediv" class="form-group">
                                                                         <div class="checkbox">
                                                                            <label>
                                                                                    <input type="checkbox" id="wrelocate" name="optionsCheckboxes" <?=$wrelocate?>>
                                                                                Willing to Relocate?
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                                                                                  
                                                                </div>
                                                                <div class="col-md-12 col-xs-12">
                                                                   
                                                                </div>
                                                        
                                                            </div>
                                                             
                                                        </div>
                                                        
                                                    </div>
                                                 
                                                    </div>
                                             </div>
                                       <div class="col-md-6 leftmargin10">
                                    <button class="btn btn-primary " name="saveainfo" id="saveainfo" type="submit">
                                                                Save Additional Information
                                                               </button>
                                </div>   
                                       </form>
                              <div class="col-md-12 leftmargin10">
                                
                                       
                                       <div class="col-md-6">
                                     <form method="post" id="ainfonext-form" name="ainfonext-form"> 
                                     <button class="btn btn-primary " name="ainfonext" id="ainfonext" type="submit">
                                                                Preview Resume
                                                               </button>
                                        </form>
                                    </div>
                            </div>
                               
                                       
		                    </div>
                           
                       
		                </div>
                            
					</div> <!--features-->
                       <div id="successdivainfo" class="alert alert-success">
                                               
                                                  <div class="alert-icon">
                                                    <i class="material-icons">check</i>
                                                  </div>
                                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true"><i class="material-icons">clear</i></span>
                                                  </button>
                                                  <b>Alert: </b> Your additional information has been saved.
                                               
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
    $('html, body').animate({ scrollTop: 0 }, 'fast');
    $('#resume-main-body #successdivainfo').hide();
    
    $('#ainfo-form #dposition').parsley().on('field:error', function() {
           $('#ainfo-form #dpositiondiv').addClass('has-error');
           $('#ainfo-form #dpositiondiv').append("<span class='material-icons form-control-feedback'>clear</span>");   
    });    
    $('#ainfo-form #dposition').parsley().on('field:success', function() {
            $('#ainfo-form #dpositiondiv').addClass('has-success');
            $('#ainfo-form #dpositiondiv').find('span').remove();
            $('#ainfo-form #dpositiondiv').append("<span class='material-icons form-control-feedback'>done</span>");   
    });
    
    $('#ainfo-form #esalary').parsley().on('field:error', function() {
           $('#ainfo-form #esalarydiv').find('span').remove();
           $('#ainfo-form #esalarydiv').removeClass('has-success has-error');
           $('#ainfo-form #esalarydiv').addClass('has-error');           
           $('#ainfo-form #esalarydiv').append("<span class='material-icons form-control-feedback'>clear</span>");   
    });    
    $('#ainfo-form #esalary').parsley().on('field:success', function() {
            $('#ainfo-form #esalarydiv').find('span').remove();
            $('#ainfo-form #esalarydiv').removeClass('has-success has-error');
            $('#ainfo-form #esalarydiv').addClass('has-success');            
            $('#ainfo-form #esalarydiv').append("<span class='material-icons form-control-feedback'>done</span>");   
    });
    
    $('#ainfo-form #plevel').parsley().on('field:error', function() {
           $('#ainfo-form #pleveldiv').addClass('has-error');
           $('#ainfo-form #pleveldiv').append("<span class='material-icons form-control-feedback'>clear</span>");   
    });    
    $('#ainfo-form #plevel').parsley().on('field:success', function() {
            $('#ainfo-form #pleveldiv').addClass('has-success');
            $('#ainfo-form #pleveldiv').find('span').remove();
            $('#ainfo-form #pleveldiv').append("<span class='material-icons form-control-feedback'>done</span>");   
    });
    
    $('#ainfo-form #specialization').parsley().on('field:error', function() {
           $('#ainfo-form #specializationdiv').addClass('has-error');
           $('#ainfo-form #specializationdiv').append("<span class='material-icons form-control-feedback'>clear</span>");   
    });    
    $('#ainfo-form #specialization').parsley().on('field:success', function() {
            $('#ainfo-form #specializationdiv').addClass('has-success');
            $('#ainfo-form #specializationdiv').find('span').remove();
            $('#ainfo-form #specializationdiv').append("<span class='material-icons form-control-feedback'>done</span>");   
    });
       
});
</script>    