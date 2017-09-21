<?php


    if (session_status() == PHP_SESSION_NONE) {
        session_start();
        include 'Database.php';
    }

if(isset($_SESSION['user'])){
   $user = $_SESSION['user'];
   $password = $_SESSION['password'];
   $userid = $_SESSION['userid'];
    date_default_timezone_set('Asia/Manila');
    $logtimestamp = date("Y-m-d H:i:s"); 
    include "serverlogconfig.php";
    $database = new Database();

    $database->query('SELECT * from jobads where userid = :userid');
    $database->bind(':userid', $userid);   
    try{
        $row = $database->single();
    }catch (PDOException $e) {
        $msg = $e->getTraceAsString()." ".$e->getMessage();
        $log->error($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
        die("");
    }

    $mode = 'insert';
   
    
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
                             <h2 class="title">Essay Questions</h2>
       </div>
     </div>
    <div class="col-md-offset-1 col-md-7">
                       
                <div class="section  section-landing">
	                 

					<div class="features">
						<div class="row">
                            
                    
		                    <div class="col-md-12">
                                    <div class="card card-nav-tabs cardtopmargin">
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
                                                 <form method="post" id="jobessays-form" name="jobessays-form" data-parsley-validate>
                                                        <input type="hidden" id="id" name="id" value="<?=$id?>">
                                                        <input type="hidden" id="mode" name="mode" value="insert">
                                                        <input type="hidden" id="userid" name="userid" value="<?=$userid?>"> 
                                                    <div class="tab-content">
                                                        <div class="tab-pane active" id="profile">                                                            
                                                   <div class="row">
                                                       <div class="col-md-12">
                                                           Create reusable Essay questions for your job ads here. When creating a job ad or a template, essay questions will appear as a drop-down list.
                                                       </div>
                                                       <div class="col-md-12"> 
                                                            <div id="questiondiv" class="form-group label-floating">
                                                                <label class="control-label">Essay Question</label>
                                                                <input class="form-control" id="question" name="question"  data-parsley-required>     
                                                                          
                                                   
                                                                         
                                                           
                                                            </div>
                                                        
                                                        </div>
                                                       
                                                          </div>
                                                    </div>
                                                        
                                                     
                                                        <div class="savebutton">
                                                            <button class="btn btn-primary " name="savepinfo" id="savepinfo" type="submit">Save Essay Question</button>
                                                        </div>
                                                        </div>
                                                  </form>      
                                                    </div>
                                             </div>
                                   
                                 
		                    </div>
                            <div class="col-md-12">
                                
                                                  
                                             <div id="successdivessay" class="alert alert-success">
                                               
                                                  <div class="alert-icon">
                                                    <i class="material-icons">check</i>
                                                  </div>
                                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true"><i class="material-icons">clear</i></span>
                                                  </button>
                                                 <b>Alert: </b><div id="essaydeldiv">Your Essay question has been saved.</div>
                                               
                                            </div>
                                   
                            </div>
                            <div class="col-md-12">
                                <div id="essaysdiv">
                                      <?php                     
                                          $database->query('SELECT id,question FROM jobessays where userid = :userid');
                                          $database->bind(':userid', $userid);  
                                          try{                     
                                              $rows = $database->resultset();
                                          }catch (PDOException $e) {
                                                $msg = $e->getTraceAsString()." ".$e->getMessage();
                                                $log->error($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
                                                die("");
                                          }                     
                                          foreach($rows as $row){
                                               $id=$row['id'];
                                               $question=$row['question'];
                                      ?>      
                                        <div class="card essaymargintop">                                           
                                             <div class="content">
                                                    <div class="tab-content">
                                                        <div class="tab-pane active" id="profile">                                                            
                                                            <div class="row">
                                                      
                                                               <div class="col-md-12"> 
                                                                        <ul class="list-inline">
                                                                                          
                                                                                            <li class="editfloatright">
                                                                                                <a href='#essaymodal' id="editessay" title="Edit" data-mode="update" data-essayid="<?=$row['id']?>" data-userid="<?=$userid?>" data-toggle="modal" data-target="#jobessay-modal"><i class="material-icons">edit</i></a>
                                                                                                <a href='#essaymodal' id="delessay" title="Delete" data-mode="del" data-essayid="<?=$row['id']?>" data-userid="<?=$userid?>" data-toggle="modal" data-target="#jobessay-modal"><i class="material-icons">delete</i></a>
                                                                                            </li>
                                                                                        </ul>
                                                                 <?=$question?>

                                                                </div>
                                                       
                                                            </div>
                                                        </div>                                                       
                                                     </div>
                                              </div>
                                        </div>
                                    <?php  
                                         } 
                                    ?>
                                    
                                </div>
                                
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
jQuery(document).ready(function ($) {
    $('#successdivessay').hide();

    $('#jobessays-form #question').parsley().on('field:error', function() {
           $('#jobessays-form #questiondiv').addClass('has-error');
           $('#jobessays-form #questiondiv').append("<span class='material-icons form-control-feedback'>clear</span>");   
    });    
    $('#jobessays-form #question').parsley().on('field:success', function() {
            $('#jobessays-form #questiondiv').addClass('has-success');
            $('#jobessays-form #questiondiv').find('span').remove()
            $('#jobessays-form #questiondiv').append("<span class='material-icons form-control-feedback'>done</span>");   
    });
    
    
});       
</script>