<?php
    session_start();
    session_unset(); 
    session_destroy();
   // header("Location: http://localhost:444/jobsly");
    
    //header("Location: http://localhost/jobsly");
     header("Location: http://192.168.1.10/jobsly");
?>