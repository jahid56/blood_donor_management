<?php
   session_start();
   
   if(session_destroy()) {
      header("Location: donor_login.php");
   }
?>