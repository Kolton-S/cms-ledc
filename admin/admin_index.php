<?php
   //ini_set('display_errors',1);
   //error_reporting(E_ALL);

   require_once('phpscripts/config.php');
   confirm_logged_in();

?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>CMS Portal Login</title>
</head>
<body>
  <h1>Welcome Company Name to your admin page</h1>
  <?php echo "<h2>Hi - {$_SESSION['user_name']}</h2>"; ?>
  <?php echo "<h2>Last Login - {$_SESSION['last_login']}</h2>"; ?>
  <h4 id="contentChange">.</h4>
  <?php if(!empty($fail_message)){echo $fail_message;}?>
  <?php if(!empty($message)){echo $message;}?>
  <?php if(!empty($mysqlQueryResponse)){echo $mysqlQueryResponse;}?>
  <?php if(!empty($regmessage)){echo $regmessage;}?>
  <a href="admin_register.php"><button class="buttonStyle">Register New User</button></a>
  <a href="admin_edituser.php"><button class="buttonStyle">Edit User</button></a>
  <a href="phpscripts/caller.php?caller_id=logout"><button class="buttonStyle">Sign Out</button></a>
</body>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="js/timeupdate.js"></script>
</html>
