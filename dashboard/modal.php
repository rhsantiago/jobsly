<?php
    
     if(isset($_POST['userid'])){ $userid = $_POST['userid']; }
     if(isset($_POST['workexpid'])){ $workexpid = $_POST['workexpid']; }
?>

<style>
.datepicker{z-index:1151 !important;}
</style>
<div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="myModalLabel">Edit Work Experience</h4>
	      </div>
	      <div id="modaleditworkexp" class="modal-body">
	      <form method="post" id="wexp-form" name="wexp-form"> 
                                 <input type="hidden" id="userid" name="userid" value="<?=$userid?>">
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
                                                                    <div id="positiondiv" class="form-group label-floating">
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
                                 
                                 </form>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        <button type="button" class="btn btn-primary">Save changes</button>
	      </div>
