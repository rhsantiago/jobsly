<?php

   // include 'Database.php';
    $database = new Database();
    date_default_timezone_set('Asia/Manila');
    $logtimestamp = date("Y-m-d H:i:s");
    include "serverlogconfig.php";

    $database->query("SELECT * FROM quotes ORDER BY RAND() LIMIT 1");

    try{
        $row = $database->single();
        $log->info($logtimestamp." - ".$_SESSION['user'] . " " .$msg);
    }catch (PDOException $e) {
         $msg = $e->getTraceAsString()." ".$e->getMessage();
         $log->error($logtimestamp." - " .$msg); 
         die("");
    }
    $quote = $row['quote'];
    $author = $row['author'];

?>



<section class="blog-post">
                                    <div class="panel panel-default">
                              
                                      <div class="panel-body jobad-bottomborder">
                                          
                                     
                                        <div class="blog-post-content">
                                             
                                         
                                          <div class="row-fluid">
                                                 <div class="col-md-12">
                                                    <blockquote>
                                                      <p><?=$quote?></p>
                                                      <footer><cite title="Source Title"><?=$author?></cite></footer>
                                                    </blockquote> 
                                                    
                                                 </div>
                                                
                                            </div>
                                          
                                        </div>
                                   
                                         
                                      </div>
                                        
                                        
                                    </div>
                                  </section>