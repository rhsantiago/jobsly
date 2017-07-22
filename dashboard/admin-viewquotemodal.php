<?php
if (session_status() == PHP_SESSION_NONE) {
        session_start();   
}
$msg='';
if(isset($_SESSION['user'])){
    if(isset($_POST['qid'])){ $qid = $_POST['qid']; }

    include 'Database.php';
    $database = new Database();
    date_default_timezone_set('Asia/Manila');
    $logtimestamp = date("Y-m-d H:i:s");
    include "serverlogconfig.php";

    $database->query("select * from quotes where id=:qid");
    $database->bind(':qid', $qid);
     
    try{
        $row = $database->single();
        $log->info($logtimestamp." - ".$_SESSION['user'] . " " .$msg);
    }catch (PDOException $e) {
         $msg = $e->getTraceAsString()." ".$e->getMessage();
         $log->error($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
         die("");
    }
    $quote = $row['quote'];
    $author = $row['author'];
}

?>
<form method="post" id="quote-form-modal" name="quote-form-modal">
                 <input id="qid" name="qid" type="hidden" value="<?=$qid?>">
                 <input id="mode" name="mode" type="hidden" value="delete">
<div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title text-primary h4weight" id="myModalLabel">Quote</h4>
	      </div>
<blockquote>
  <p><?=$quote?></p>
  <footer><cite title="Source Title"><?=$author?></cite></footer>
</blockquote>


<div class="modal-footer blog-post">
             
            <button type="submit" class="btn btn-primary">Delete</button>
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        
	      </div>
</form>    