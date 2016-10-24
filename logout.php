<?php
   session_start();
   
   if(session_destroy()) {
      header("Location: mem_login.php");
   }
?>