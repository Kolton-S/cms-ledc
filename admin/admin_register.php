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
<title>CMS Portal Login</title>
</head>
<body>
  <h1>Welcome Company Name to your create user page</h1>
	<?php if(!empty($message)){echo $message;} ?>
	<form action="admin_register.php" method="post">
	<label>First Name:</label>
	<input type="text" name="fname" value="	<?php if(!empty($fname)){echo $fname;} ?>
"><br><br>

	<label>Username:</label>
	<input type="text" name="username" value="	<?php if(!empty($username)){echo $username;} ?>
"><br><br>



	<label>Email:</label>
	<input type="text" name="email" value="	<?php if(!empty($email)){echo $email;} ?>
"><br><br>

<label>Password:</label>
<h5>Password Auto Generated</h5>
<br><br>

	<label>User Level:</label>
	<select name="userlvl">
		<option value="">Please select a user level</option>
		<option value="2">Web Admin</option>
		<option value="1">Web Master</option>
	</select><br><br>

	<input type="submit" name="submit" value="Create User">
	</form>

</body>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="js/timeupdate.js"></script>
</html>
