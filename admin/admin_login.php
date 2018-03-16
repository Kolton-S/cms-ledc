<?php
   //ini_set('display_errors',1);
   //error_reporting(E_ALL);

   require_once('phpscripts/config.php');

   $ip = $_SERVER['REMOTE_ADDR']; // gets the ip address of the computer accessing
   //echo $ip;
   if(isset($_POST['submit'])){
     $username = trim($_POST['username']); //trim removes the 'whitespace' aka spaces at the start or end of the username; might be there if copy/pasted in
     $password = trim($_POST['password']);
     if ($username !== "" && $password !== ""){
         $result = logIn($username, $password, $localtime,  $ip);
         $message = $result;
      }else{
       $message = "Please fill in the required fields";
     }
   }

   ?>
<!doctype html>
<html>
   <head>
      <meta charset="UTF-8">
      <title>LEDC - Portal Login</title>
      <link rel="stylesheet" href="css/main.css">
   </head>
   <body id="backgroundImageLogin">
      <?php if(!empty($fail_message)){echo "<div id='errorMessages'>${fail_message}</div>";}?>
      <?php if(!empty($message)){echo "<div id='errorMessages'>${message}</div>";}?><br>
      <section id="loginForm">
         <form action="admin_login.php" id="login" method="post">
            <input type="text" name="username" id="username" value="" placeholder="Username" title="Your Username">
            <br>
            <input type="password" name="password" id="password" value="" placeholder="Password" title="Your Password">
            <br>
            <div id="loginButtonCon">
               <p id="loginText">Login</p>
               <input type="submit" name="submit" id="loginButton" value="">
            </div>
         </form>
      </section>
   </body>
   <script src="js/loginFunction.js"></script>
</html>
