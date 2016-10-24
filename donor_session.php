<?php
   require_once 'db_con.php';
   session_start();
   
   $user_check = $_SESSION['login_donor'];
   
   $m_sql = mysqli_query($conn,"select name from donor_reg where user_id = '$user_check' ");
   
   $row = mysqli_fetch_array($m_sql,MYSQLI_ASSOC);
   
   $login_session = $row['name'];
   
   if(!isset($_SESSION['login_donor'])){
      header("location:donor_login.php");
   }

?>