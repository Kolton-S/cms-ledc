<?php
   //ini_set('display_errors',1);
   //error_reporting(E_ALL);
   require_once('phpscripts/config.php');
   // confirm_logged_in();

   $id = $_SESSION['user_id'];
   // echo $id;
   $tbl = "tbl_user";
   $col = "user_id";
   $popForm = getSingle($tbl, $col, $id);
   $found_user = mysqli_fetch_array($popForm, MYSQLI_ASSOC);
   if(isset($_POST['submit'])) {
   	$fname = trim($_POST['fname']);
   	$username = trim($_POST['username']);
   	$password = trim($_POST['password']);
   	$email = trim($_POST['email']);
   		$result = editUser($id, $fname, $username, $password, $email);
   		$message = $result;
   	}
   ?>
<!doctype html>
<html>
   <head>
      <meta charset="UTF-8">
      <title>LEDC - Edit User</title>
      <link rel="stylesheet" href="css/reset.css">
      <link rel="stylesheet" href="css/main.css">
   </head>
   <body>
      <?php include('templates/navigation.php'); ?>
      <?php if(!empty($message)){echo $message;} ?>
      <section id="editUser">
         <form action="admin_edituser.php" method="post">
            <label>First Name:</label>
            <input type="text" name="fname" class="textBoxes" value="	<?php echo $found_user['user_fname']; ?>
               "><br><br>
            <label>Username:</label>
            <input type="text" name="username" class="textBoxes" value="	<?php echo $found_user['user_name']; ?>
               "><br><br>
            <label>Password:</label>
            <input type="text" name="password" class="textBoxes" value="	<?php echo $found_user['user_pass']; ?>
               "><br><br>
            <label>Email:</label>
            <input type="text" name="email" class="textBoxes" value="	<?php echo $found_user['user_email']; ?>
               "><br><br>
            <input type="submit" name="submit" class="buttonStyle" value="Edit User">
         </form>
      </section>
   </body>
   <script src="js/timeupdate.js"></script>
</html>
