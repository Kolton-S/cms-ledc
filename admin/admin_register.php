<?php
   ini_set('display_errors',1);
   error_reporting(E_ALL);

   require_once('phpscripts/config.php');
   confirm_logged_in();
   if(isset($_POST['submit'])) {
   $fname = trim($_POST['fname']);
   $username = trim($_POST['username']);
   $email = trim($_POST['email']);
   $userlvl = $_POST['userlvl'];
   if(empty($userlvl)){
   $message = "Please select a user level.";
   }else{
   $result = register($fname, $username, $email, $userlvl);
   $message = $result;
   }
   }
   ?>
<!doctype html>
<html>
   <head>
      <meta charset="UTF-8">
      <title>LEDC - Register User</title>
      <link rel="stylesheet" href="css/reset.css">
      <link rel="stylesheet" href="css/main.css">
   </head>
   <body>
      <?php include('templates/navigation.php'); ?>
      <?php if(!empty($message)){echo $message;} ?>
      <section id="registerForm">
         <form action="admin_register.php" method="post">
            <label>First Name:</label>
            <input type="text" name="fname" class="textBoxes" value=""><br><br>
            <label>Username:</label>
            <input type="text" name="username" id="registerUsername" class="textBoxes" value=""><br><br>
            <label>Email:</label>
            <input type="text" name="email" id="registerEmail" class="textBoxes" value=""><br><br>
            <label>Password:</label>
            <h5 class="bolded">Password Auto Generated</h5>
            <br><br>
            <label>User Level:</label>
            <select name="userlvl" class="dropdownBox">
               <option value="">Please select a user level</option>
               <option value="2">Web Admin</option>
               <option value="1">Web Master</option>
            </select>
            <br><br>
            <input type="submit" name="submit" value="Create User" class="buttonStyle">
         </form>
      </section>
   </body>
   <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
   <script src="js/timeupdate.js"></script>
</html>
