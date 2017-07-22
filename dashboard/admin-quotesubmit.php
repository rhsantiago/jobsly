<?php
if (session_status() == PHP_SESSION_NONE) {
        session_start();   
}
$msg='';
$mode='';
if(isset($_SESSION['user'])){
    if(isset($_POST['quote'])){ $quote = $_POST['quote']; }
    if(isset($_POST['author'])){ $author = $_POST['author']; }
    if(isset($_POST['mode'])){ $mode = $_POST['mode']; }
    if(isset($_POST['qid'])){ $qid = $_POST['qid']; }
    include 'Database.php';
    $database = new Database();
    date_default_timezone_set('Asia/Manila');
    $logtimestamp = date("Y-m-d H:i:s");
    include "serverlogconfig.php";
    
    if($mode=='delete'){
         $database->query("delete from quotes where id=:qid");
         $database->bind(':qid', $qid);
    }else{
        $database->query("Insert into quotes (id, quote, author) values (0,:quote,:author)");
        $database->bind(':quote', $quote);
        $database->bind(':author', $author);
    }
    try{
        $database->execute();
        $log->info($logtimestamp." - ".$_SESSION['user'] . " " .$msg);
    }catch (PDOException $e) {
         $msg = $e->getTraceAsString()." ".$e->getMessage();
         $log->error($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
         die("");
    }
    
}

?>

<?php

                                            $database->query('select * from quotes order by id desc');     
                                            try{
                                                $rows = $database->resultset();
                                            }catch (PDOException $e) {
                                                $msg = $e->getTraceAsString()." ".$e->getMessage();
                                                $log->error($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
                                                die("");
                                            }
                                            foreach($rows as $row){
                                                $qid = $row['id'];
                                                $quote = $row['quote'];
                                                $author = $row['author'];
                                                $quote = substr($quote,0,30);
                                       ?>
                                   
                                                <tr id="line<?=$qid?>">                                                   
                                                    <td><span class="h4weight"><?=$author?></span></td>
                                                    <td class=""><?=$quote?>...</td>       
                                                    <td class="td-actions text-right">
                                                <ul class="list-inline">
                                                        <li >
                                                            <a href="#viewquotemodal" data-qid="<?=$qid?>" data-mode="view" data-toggle="modal" data-target="#viewquote-modal" rel="tooltip" id="viewquote" title="View Quote" ><i class="fa fa-user fa-2x text-info"></i></a>
                                                        </li>
                                                      
                                                        </ul>
                                                    </td>
                                                </tr>
                                            <?php                                               
                                            }
                                            ?>