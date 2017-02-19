<?php
        date_default_timezone_set('Asia/Manila');
        $logtimestamp = date("Y-m-d H:i:s");
        if($error==true){
            $log->error($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
        }else{
            $log->info($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
        }
?>