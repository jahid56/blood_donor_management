<?php
require_once 'db_con.php';
require_once 'header.php';
?>


<?php
   include('admin_session.php');
   error_reporting(E_ERROR||E_WARNING);
?>
<html>
   
   <head>
      <title>Welcome </title>
   </head>
   
   <body>
      <h1>Welcome <?php echo $login_session; ?></h1> 
      <h2><a href = "logout.php">Sign Out</a></h2>
   </body>
   
</html>