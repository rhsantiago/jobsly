<?php
if (session_status() == PHP_SESSION_NONE) {
        session_start();
        include 'Database.php';
}


if(isset($_SESSION['user'])){
   $user = $_SESSION['user'];
   $password = $_SESSION['password'];
   $userid = $_SESSION['userid'];
    
    
    $database = new Database();
    
    $database->query('select position as maxposition,fname,lname from workexperience, personalinformation where personalinformation.userid=:userid and startdate = (select max(startdate) from workexperience where workexperience.userid=:userid)');
    $database->bind(':userid', $userid);   

    $row = $database->single();
    $maxposition = $row['maxposition'];
    $fname = $row['fname'];
    $lname = $row['lname'];
    
    $months = array('January','February','March','April','May','June','July','August','September','October','November','December');
    
}
?>
<script>
jQuery(document).ready(function ($) {
   
            $('body').addClass('profile-page');
    
});
</script>      

 <div class="col-md-12"> 
    
        <div class="profile-content">
	            <div class="container-fluid">
                        <div class="row-fluid">
                            
                                <div class="profile">                               
                                    <div class="avatar">
                                        <img src="img/christian.jpg" alt="Circle Image" class="img-circle img-responsive img-raised">
                                    </div>
                                    <div class="name">
                                        <h3 class="title"><?=$fname?>&nbsp;<?=$lname?></h3>
                                        <h5><?=$maxposition?></h5>
                                    </div>
                                    <div class="jumbotron">
                                 <div class="row">                                                               
                                                                <div class="col-md-offset-1 col-md-5 resumetextalign">
                                                                    <ul style="list-style: none;" class="">
                                                                        <li> Mobile Number: 09175555555</li>
                                                                        <li> Email: reg@jobsly.net</li>
                                                                        <li> Landline: 8234827</li>
                                                                        <li> Street Address: 87 Spain st., Better Living Subd</li>
                                                                        <li> City: Paranaque, Metro Manila Philippines</li>
                                                                        <li> Nationality: Filipino</li>
                                                                        <li> Birthdate: 11/09/2016</li>
                                                                    </ul>
                                                                </div>
                                                                 <div class="col-md-offset-1 col-md-5 resumetextalign">
                                                                    <ul style="list-style: none;" class="">
                                                                        <li> Desired Position: Senior Developer</li>     
                                                                        <li> Position Level: Middle  Manager</li>
                                                                        <li> Expected Salary: 100000</li> 
                                                                        <li> Languages: English, Filipino</li> 
                                                                        <li> Willing to Travel</li>
                                                                        <li> Willing to Relocate</li>
                                                                        <li> Valid Passport Holder</li>
                                                                        </ul>
                                                                </div>
                                                        
                                                            </div>
                                    </div>    
                                <!--    
                                    <div class="card card-nav-tabs">
                                            
                                             <div class="content">
                                                    <div class="tab-content">
                                                        
                                                        <div class="tab-pane active" id="hs">
                                                            
                                                            <div class="row">
                                                               
                                                                <div class="col-md-6 resumetextalign">
                                                                    <ul style="list-style: none;" class="">
                                                                        <li> Mobile Number: 09175555555</li>
                                                                        <li> Email: reg@jobsly.net</li>
                                                                        <li> Landline: 8234827</li>
                                                                        <li> Street Address: 87 Spain st., Better Living Subd</li>
                                                                        <li> City: Paranaque, Metro Manila Philippines</li>
                                                                        <li> Nationality: Filipino</li>
                                                                        <li> Birthdate: 11/09/2016</li>
                                                                    </ul>
                                                                </div>
                                                                 <div class="col-md-6 resumetextalign">
                                                                    <ul style="list-style: none;" class="">
                                                                        <li> Desired Position: Senior Developer</li>     
                                                                        <li> Position Level: Middle  Manager</li>
                                                                        <li> Expected Salary: 100000</li> 
                                                                        <li> Work Location: Makati</li>
                                                                        <li> Specialization: IT</li>
                                                                        <li> Years of Experience: 15</li>  
                                                                        <li> Languages: English, Filipino</li> 
                                                                        <li> Willing to Travel</li>
                                                                        <li> Willing to Relocate</li>
                                                                        <li> Valid Passport Holder</li>
                                                                        </ul>
                                                                </div>
                                                        
                                                            </div>
                                                              
                                                        </div>
                                                        
                                                    </div>
                                                 
                                                    </div>
                                             </div>
                                    
                                    -->
                                    
                                </div>
                            
                             <link href="css/timeline.css" rel="stylesheet"/>

   
    <ul class="timeline">
        <?php
             $database->query('SELECT * FROM workexperience where userid = :userid order by startdate desc');
             $database->bind(':userid', $userid);  
             $rows = $database->resultset();
             
             $isleft = true;
             $datefloat ='';                               
             foreach($rows as $row){
                $sdate = explode("-", $row['startdate']);
                $startdate = $sdate[1] .'/'.$sdate[2].'/'.$sdate[0];
                $edate = explode("-", $row['enddate']);
                $enddate = $edate[1] .'/'.$edate[2].'/'.$edate[0];
                
                 if($isleft){
                    echo '<li>';
                    $isleft = false;
                    $datefloat ='editfloatright';
                 }else{                     
                     echo "<li class='timeline-inverted'>";
                     $isleft = true;
                     $datefloat ='editfloatleft';
                 }
        ?>
           
          <div class="timeline-badge"><i class="material-icons">work</i></div>
          <div class="timeline-panel">
            <div class="timeline-heading">
                <ul class="list-inline">                   
                    <li class="<?=$datefloat?>"><?=$months[$sdate[1]-1]?>&nbsp;<?=$sdate[0]?></li>
                    <li></li>
                 </ul>
                <ul class="list-inline">
                    <li><h4 class="text-info"><?=$row['position']?></h4></li>
                    <li><h7 class="text-muted"><i><?=$row['company']?></i></h7> </li>
                    
                 </ul>
          
             <ul class="list-inline">
                 <li>
                     <h6 id="vertical-align" class="text-muted">
                        <i class="material-icons text-info material-icons.md-24" >business</i><i id='industryli'> <?=$row['industry']?></i>
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
               
            </div>
            <div class="timeline-body collapse-group collapse" id="viewdetails<?=$row['id']?>">              
              <?=$row['jobdescription']?>
            </div>
             <p class="center"><a class="btn expandmore" data-toggle="collapse" data-target="#viewdetails<?=$row['id']?>"><i class="material-icons blackicon md-36">expand_more</i></a></p>
              
          </div>           
        </li>
        <?php
             }
            
            $database->query('SELECT * FROM educationandtraining where userid = :userid order by pgrad1graddate desc');
             $database->bind(':userid', $userid);  
             $rows = $database->resultset();
                         
             $datefloat ='';                               
             foreach($rows as $row){
                $pgrad1date = explode("-", $row['pgrad1graddate']);
                $pgrad1graddate = $pgrad1date[1] .'/'.$pgrad1date[2].'/'.$pgrad1date[0];  
                
                 if($isleft){
                    echo '<li>';
                    $isleft = false;
                    $datefloat ='editfloatright';
                 }else{                     
                     echo "<li class='timeline-inverted'>";
                     $isleft = true;
                     $datefloat ='editfloatleft';
                 }
        ?>    
                <div class="timeline-badge warning"><i class="material-icons">school</i></div>
          <div class="timeline-panel">
            <div class="timeline-heading">
                <ul class="list-inline">                   
                    <li class="<?=$datefloat?>"><?=$months[$pgrad1date[1]-1]?>&nbsp;<?=$pgrad1date[0]?></li>
                    <li></li>
                 </ul>
                <ul class="list-inline">
                    <li><h4 class="text-info"><?=$row['pgrad1course']?></h4></li>
                    <li><h7 class="text-muted"><i><?=$row['pgrad1uni']?></i></h7> </li>
                    
                 </ul>
          
             <ul class="list-inline">
                 <li>
                     <h6 id="vertical-align" class="text-muted">
                        <i class="material-icons text-info md-8" >business</i><i id='industryli'> <?=$row['pgrad1add']?></i>
                     </h6>
                 </li>
                 <li>
                     <h6 id="vertical-align" class="text-muted">
                        <i class="material-icons text-info md-8" >business</i><i id='industryli'> <?=$row['pgrad1gpa']?></i>
                     </h6>
                 </li>
                  <li>
                      <h6 id="vertical-align" class="text-muted">
                         <i class="material-icons text-info">date_range</i> <?=$pgrad1graddate?>
                      </h6>
                  </li>
                
               </ul>
                <hr>
            </div>
            <div class="timeline-body collapse-group collapse" id="pgrad1viewdetails<?=$row['id']?>">              
              <?=$row['pgrad1awards']?>
            </div>
              <p><a class="btn" data-toggle="collapse" data-target="#pgrad1viewdetails<?=$row['id']?>">View details &raquo;</a></p>  
          </div>           
        </li>            
        <?php             
             }
                                            
             $database->query('SELECT * FROM educationandtraining where userid = :userid order by colgraddate desc');
             $database->bind(':userid', $userid);  
             $rows = $database->resultset();
                         
             $datefloat ='';                               
             foreach($rows as $row){
                $coldate = explode("-", $row['colgraddate']);
                $colgraddate = $coldate[1] .'/'.$coldate[2].'/'.$coldate[0];  
                
                 if($isleft){
                    echo '<li>';
                    $isleft = false;
                    $datefloat ='editfloatright';
                 }else{                     
                     echo "<li class='timeline-inverted'>";
                     $isleft = true;
                     $datefloat ='editfloatleft';
                 }
                                            
        ?>
               <div class="timeline-badge warning"><i class="material-icons">school</i></div>
          <div class="timeline-panel">
            <div class="timeline-heading">
                <ul class="list-inline">                   
                    <li class="<?=$datefloat?>"><?=$months[$coldate[1]-1]?>&nbsp;<?=$coldate[0]?></li>
                    <li></li>
                 </ul>
                <ul class="list-inline">
                    <li><h4 class="text-info"><?=$row['colmajor']?></h4></li>
                    <li><h7 class="text-muted"><i><?=$row['coluni']?></i></h7> </li>
                    
                 </ul>
          
             <ul class="list-inline">
                 <li>
                     <h6 id="vertical-align" class="text-muted">
                        <i class="material-icons text-info md-8" >business</i><i id='industryli'> <?=$row['coladd']?></i>
                     </h6>
                 </li>
                 <li>
                     <h6 id="vertical-align" class="text-muted">
                        <i class="material-icons text-info md-8" >business</i><i id='industryli'> <?=$row['colgpa']?></i>
                     </h6>
                 </li>
                  <li>
                      <h6 id="vertical-align" class="text-muted">
                         <i class="material-icons text-info">date_range</i> <?=$colgraddate?>
                      </h6>
                  </li>
                
               </ul>
                <hr>
            </div>
            <div class="timeline-body collapse-group collapse" id="colviewdetails<?=$row['id']?>">              
              <?=$row['colawards']?>
            </div>
              <p><a class="btn" data-toggle="collapse" data-target="#colviewdetails<?=$row['id']?>">View details &raquo;</a></p>  
          </div>           
        </li>                   
        <?php
             }
            
             $database->query('SELECT * FROM educationandtraining where userid = :userid order by hsgraddate desc');
             $database->bind(':userid', $userid);  
             $rows = $database->resultset();
                         
             $datefloat ='';                               
             foreach($rows as $row){
                 $hsdate = explode("-", $row['hsgraddate']);
                $hsgraddate = $hsdate[1] .'/'.$hsdate[2].'/'.$hsdate[0];    
                    
                
                 if($isleft){
                    echo '<li>';
                    $isleft = false;
                    $datefloat ='editfloatright';
                 }else{                     
                     echo "<li class='timeline-inverted'>";
                     $isleft = true;
                     $datefloat ='editfloatleft';
                 }                       
        ?>
                            
             <div class="timeline-badge warning"><i class="material-icons">school</i></div>
          <div class="timeline-panel">
            <div class="timeline-heading">
                <ul class="list-inline">                   
                    <li class="<?=$datefloat?>"><?=$months[$hsdate[1]-1]?>&nbsp;<?=$hsdate[0]?></li>
                    <li></li>
                 </ul>
                <ul class="list-inline">
                    <li><h4 class="text-info">High School</h4></li>
                    <li><h7 class="text-muted"><i><?=$row['hsschool']?></i></h7> </li>
                    
                 </ul>
          
             <ul class="list-inline">
                 <li>
                     <h6 id="vertical-align" class="text-muted">
                        <i class="material-icons text-info md-8" >business</i><i id='industryli'> <?=$row['hsadd']?></i>
                     </h6>
                 </li>
                  <li>
                      <h6 id="vertical-align" class="text-muted">
                         <i class="material-icons text-info">date_range</i> <?=$hsgraddate?>
                      </h6>
                  </li>
                
               </ul>
                <hr>
            </div>
            <div class="timeline-body collapse-group collapse" id="hsviewdetails<?=$row['id']?>">              
              <?=$row['hsawards']?>
            </div>
              <a class="btn" data-toggle="collapse" data-target="#hsviewdetails<?=$row['id']?>">View details &raquo;</a> 
          </div>           
        </li>                  
                            
                         
        
        <?php
             }
        ?>                                    
    
            
    </ul>

                            
                            
                            
	                    </div>
                
               </div>
        </div>
        
                        
 </div>

