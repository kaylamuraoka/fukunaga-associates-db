<!-- Session.php will verify the session, if there is no session it will redirect to login page. -->
<?php
   include('./../../config/db_conn.php');
   session_start();
   
   $user_check = $_SESSION['login_user'];
   
   $ses_sql = mysqli_query($db,"SELECT username from users where username = '$user_check' ");
   
   $row = mysqli_fetch_assoc($result);

   $login_session = $row['username'];
   
   if(!isset($_SESSION['login_user'])){
      header("location:login.php");
      die();
   }
?>