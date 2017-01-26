<?php
if (session_status() == PHP_SESSION_NONE) {
        session_start();
        include 'Database.php';
    }    
if(isset($_POST['userid'])){ $userid = $_POST['userid']; }
if(isset($_POST['essayid'])){ $essayid = $_POST['essayid']; }
if(isset($_POST['mode'])){ $mode = $_POST['mode']; }

if($mode=='del'){
?>    
    
   <form method="post" id="jobessays-form" name="jobessays-form"> 
             <input type="hidden" id="userid" name="userid" value="<?=$userid?>">
             <input type="hidden" id="id" name="id" value="<?=$essayid?>">
             <input type="hidden" id="mode" name="mode" value="del">
<div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title text-primary h4weight" id="myModalLabel">Delete Essay</h4>
	      </div>
	      <div id="modaleditessay" class="modal-body modal-gray">
	                              
                                    <div class="card card-nav-tabs cardtopmargin">
                                           
                                             <div class="content">
                                                    <div class="tab-content">
                                                        <div class="tab-pane active" id="profile">
                                                            <div class="row">
                                                                  
                                                               
                                                                <div class="col-md-12 col-xs-12 text-center">
                                                                
                                                                   <h3><label class="text-danger">Are you sure you want to delete this Essay question?</label></h3>
                                                                    

                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                             </div>
                                    </div>
                               
                           
	      </div>
	      <div class="modal-footer blog-post">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        <button type="submit" class="btn btn-primary">I'm sure</button>
	      </div>
</form>
    
    
    
    
<?php    
    
    
}else{
    $database = new Database();

    $database->query('SELECT * from jobessays where id = :essayid');
    $database->bind(':essayid', $essayid);   

    $row = $database->single();
    $id = $row['id'];
    $question = $row['question'];
    
   
?>



<form method="post" id="jobessays-form" name="jobessays-form" data-parsley-validate> 
             <input type="hidden" id="userid" name="userid" value="<?=$userid?>">
             <input type="hidden" id="id" name="id" value="<?=$essayid?>">
             <input type="hidden" id="mode" name="mode" value="update">
<div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="myModalLabel">Edit Essay Question</h4>
	      </div>
	      <div id="modaleditessay" class="modal-body">
	                              
                                    <div class="card card-nav-tabs">
                                            <div id="tabtitle" class="header  header-success">
                                                <!-- colors: "header-primary", "header-info", "header-success", "header-warning", "header-danger" -->
                                                <div class="nav-tabs-navigation">
                                                    <div class="nav-tabs-wrapper">
                                                        <ul class="nav nav-tabs" data-tabs="tabs">
                                                            <li class="active">
                                                                <a href="#profile" data-toggle="tab">
                                                                    <i class="material-icons">mode_edit</i>
                                                                    Essay Questions
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
                                                                  <div class="col-md-12 col-xs-12">
                                                                    <div id="questiondiv" class="form-group label-floating">
                                                                        <label class="control-label">Essay Question</label>
                                                                        <input class="form-control" id="question" name="question"  value="<?=$question?>" data-parsley-required>

                                                                    </div>
                                                            
                                                                
                                                                 </div>
                                                        </div>

                                                    </div>
                                             </div>
                                    </div>
                               
                                 
                           
                               
              </div>   
	      </div>
	      <div class="modal-footer">
              
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        <button type="submit" class="btn btn-primary" >Save changes</button>
              
               
	      </div>
</form>
<script>
jQuery(document).ready(function ($) {

    /*
    $('#pinfo-form #fname').parsley().on('field:error', function() {
           $('#pinfo-form #fnamediv').addClass('has-error');
           $('#pinfo-form #fnamediv').append("<span class='material-icons form-control-feedback'>clear</span>");   
    });    
    $('#pinfo-form #fname').parsley().on('field:success', function() {
            $('#pinfo-form #fnamediv').addClass('has-success');
            $('#pinfo-form #fnamediv').find('span').remove()
            $('#pinfo-form #fnamediv').append("<span class='material-icons form-control-feedback'>done</span>");   
    });
    
   
    
    */
    
});       
</script>
<?php
}
?>