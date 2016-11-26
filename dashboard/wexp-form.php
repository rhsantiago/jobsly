<?php
session_start();
if(isset($_SESSION['user'])){
   $user = $_SESSION['user'];
   $password = $_SESSION['password'];
   $userid = $_SESSION['userid'];
}
?>




<form method="post" id="wexp-form" name="wexp-form">  
                    <input type="hidden" id="userid" name="userid" value="<?=$userid?>">          
                    <div class="col-md-9 ">
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
                                                <div class="card">                                            
                                                             <div class="content">
                                                                                                                                       
                                                                            <div class="row">
                                                                                <div class="col-md-12">
                                                                                    <div class="">
                                                                                        <ul class="list-inline">
                                                                                          <li><h3 class="text-info">Senior Software Engineer</h3></li>
                                                                                            <li><h6 class="text-muted"><i>CHAMP Cargosystems Inc.</i></h6> </li>
                                                                                        </ul>
                                                                                        <ul class="list-inline">
                                                                                            <li>
                                                                                                <h6 class="text-muted">
                                                                                                    <i class="material-icons text-info">business</i><i> Airline Cargo</i>
                                                                                                </h6>
                                                                                            </li>
                                                                                            <li>
                                                                                                <h6 class="text-muted">
                                                                                                   <i class="material-icons text-info">date_range</i> 03/21/2015 - 11/01/2016
                                                                                                </h6>
                                                                                            </li>
                                                                                            <li>
                                                                                                <h6 class="text-muted">
                                                                                                    <i class="material-icons text-info">people</i><i> High Senior</i>
                                                                                                </h6>
                                                                                            </li>
                                                                                            <li>
                                                                                                <h6 class="text-muted">
                                                                                                   <i class="material-icons text-info">local_atm</i> Php 85,000
                                                                                                </h6>
                                                                                            </li>
                                                                                        </ul>
                                                                                        <hr>
                                                                                        <p><span class="text-muted"><i class="material-icons text-info">description</i></span>
	                            I will be the leader of a company that ends up being worth billions of dollars, because I got the answers. I understand culture. I am the nucleus. I think that’s a responsibility that I have, to push possibilities, to show people, this is the level that things could be at.</p>
                                                                                    </div>
                                                                                </div>
                                                                               
                                                                            
                                                                            </div>
                                                                      
                                                             </div>
                                                    </div>
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
                                                                    <div class="form-group label-floating">
                                                                        <label class="control-label">Company Name</label>
                                                                        <input type="text" id="company" class="form-control">
                                                                    </div>
                                                                    <div class="form-group label-floating">
                                                                        <label class="control-label">Position</label>
                                                                        <input type="text" id="position" class="form-control">
                                                                    </div>
                                                                    <div id="startdiv" class="form-group label-static">
                                                                        <label class="control-label">Start Date</label>
                                                                       <input type='text' id='startdate' class='datepicker form-control'>
                                                                    </div>
                                                                      <div class="form-group label-floating">
                                                                        <label class="control-label">Monthly Salary</label>
                                                                        <input type="text" id="msalary" class="form-control">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-xs-6">
                                                                    <div class="form-group label-floating">
                                                                        <label class="control-label">Industry</label>
                                                                        <input type="text" id="industry" class="form-control">
                                                                    </div>
                                                                    <div class="form-group label-floating">
                                                                        <label class="control-label">Position Level</label>
                                                                        <input type="text" id="plevel" class="form-control">
                                                                    </div>
                                                                    <div id="enddiv" class="form-group label-static">
                                                                        <label class="control-label">End Date</label>
                                                                        <input type='text' id='enddate' class='datepicker form-control'>
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
                                                                <div class="col-md-12">
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
                               
                                
                                
		                    </div>
                            
                            <div class="col-md-6">
                                    
                                <button class="btn btn-primary " name="addwexp" id="addwexp" type="submit">
                                                        Add Work Experience
                                                       </button>
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
