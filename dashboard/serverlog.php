<?php
        if (session_status() == PHP_SESSION_NONE) {
            session_start();

        }
       
        date_default_timezone_set('Asia/Manila');
        $logtimestamp = date("Y-m-d H:i:s");
        $error = $_GET['error'];
        if($error==true){
            $log->error($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
        }else{
            $log->info($logtimestamp." - ".$_SESSION['user'] . " " .$msg); 
        }
?>