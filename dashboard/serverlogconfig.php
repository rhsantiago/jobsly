<?php
        include('log4php/Logger.php');
        Logger::configure('log4php/config.xml');
        $log = Logger::getLogger('myLogger');

?>