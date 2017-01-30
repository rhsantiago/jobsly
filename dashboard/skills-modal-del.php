<?php
if (session_status() == PHP_SESSION_NONE) {
        session_start();
       
    }    
if(isset($_POST['userid'])){ $userid = $_POST['userid']; }
if(isset($_POST['skillid'])){ $skillid= $_POST['skillid']; }
if(isset($_POST['skilltag'])){ $skilltag = $_POST['skilltag']; }

?>    
    
   <form method="post" id="delskill-form" name="delskill-form"> 
             <input type="hidden" id="userid" name="userid" value="<?=$userid?>">
             <input type="hidden" id="skillid" name="skillid" value="<?=$skillid?>">             
<div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title text-primary h4weight" id="myModalLabel">Delete Skill</h4>
	      </div>
	      <div id="modaldeljobad" class="modal-body modal-gray">
	                              
                                    <div class="card card-nav-tabs">
                                           
                                             <div class="content">
                                                    <div class="tab-content">
                                                        <div class="tab-pane active" id="profile">
                                                            <div class="row">
                                                                  
                                                               
                                                                <div class="col-md-12 col-xs-12 text-center">
                                                                
                                                                    <h3><label class="text-danger">Are you sure you want to delete <span class='text-info'><?=$skilltag?></span></label></h3>
                                                                    

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
 