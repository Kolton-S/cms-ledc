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
         $result = logIn($username, $password, $ip);
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
<title>CMS Portal Login</title>
</head>

<body>
  <h1>Welcome Company Name</h1>
  <?php if(!empty($fail_message)){echo $fail_message;}?>
  <?php if(!empty($message)){echo $message;}?>
  <form action="admin_login.php" method="post">
    <lable>Username:</lable>
    <input type="text" name="username" value="">
    <br>
    <lable>Password</lable>
    <input type="text" name="password" value="">
    <br>
    <input type="submit" name="submit" value="Show me the money">
  </form>
</body>
</html>
