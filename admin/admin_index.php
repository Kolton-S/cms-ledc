<?php
   //ini_set('display_errors',1);
   //error_reporting(E_ALL);

   require_once('phpscripts/config.php');
   confirm_logged_in();
   $id = $_SESSION['user_id'];
   // echo $id;
   $tbl = "tbl_user";
   $col = "user_id";
   $popForm = getSingle($tbl, $col, $id);
   $found_user = mysqli_fetch_array($popForm, MYSQLI_ASSOC);
   if($found_user['needs_edit'] == 1){
     redirect_to("admin_edituser.php");
   }
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>LEDC - Portal Home</title>
<link rel="stylesheet" href="css/reset.css">
<link rel="stylesheet" href="css/main.css">
</head>
<body>
  <?php include('templates/navigation.php'); ?>
  <?php if(!empty($fail_message)){echo $fail_message;}?>
  <?php if(!empty($message)){echo $message;}?>
  <?php if(!empty($mysqlQueryResponse)){echo $mysqlQueryResponse;}?>
  <?php if(!empty($regmessage)){echo $regmessage;}?>
  <section id="menuSelection">
  <a href="admin_register.php"><button class="buttonStyle">Register New User</button></a>
  <a href="admin_edituser.php"><button class="buttonStyle">Edit User</button></a>
  <a href="admin_deleteuser.php"><button class="buttonStyle">Delete User</button></a>
  <a href="admin_content.php"><button class="buttonStyle">Page Contents</button></a>

</section>
</body>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="js/timeupdate.js"></script>
</html>
