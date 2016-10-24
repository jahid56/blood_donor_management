<?php
   require_once 'db_con.php';
   session_start();
   
   $user_check = $_SESSION['login_admin'];
   
   $m_sql = mysqli_query($conn,"select * from admin where user_name = '$user_check' ");
   
   $row = mysqli_fetch_array($m_sql,MYSQLI_ASSOC);
   
   $login_session = $row['user_name'];
   
   if(!isset($_SESSION['login_admin'])){
      header("location:admin_login.php");
   }

?>