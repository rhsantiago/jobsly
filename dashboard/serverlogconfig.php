<?php
if(!class_exists('LoggerAutoloader')){
      include('log4php/Logger.php');
      Logger::configure('log4php/config.xml');
      $log = Logger::getLogger('myLogger');
}
date_default_timezone_set('Asia/Manila');
$logtimestamp = date("Y-m-d H:i:s");
?>