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
  <?php echo "<h2>Hi-{$_SESSION['user_name']}</h2>"; ?>
  <?php echo "<h3>Last Login: {$_SESSION['last_login']}</h3>"; ?>
  <h4 id="contentChange"></h4>
</body>
<script src="js/timeupdate.js"></script>
</html>
