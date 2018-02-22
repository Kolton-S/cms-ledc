<?php
function register($fname, $username, $password, $email, $userlvl) {
 include('connect.php');
 $userString = "INSERT INTO tbl_user VALUES(NULL,'{$fname}', '{$username}', '{$password}', '{$email}', NULL, '{$userlvl}', 'no')";
 //echo $userString;
 $userQuery = mysqli_query($link, $userString);
 if($userQuery) {
   redirect_to("admin_index.php");
 }else{
   $message = "There was a problem setting up this user.  Maybe reconsider your hiring practices.";
   return $message;
 }
 mysqli_close($link);
}

function editUser($id, $fname, $username, $password, $email) {
		include('connect.php');
		$userString = "UPDATE tbl_user SET user_name = '{$username}', user_fname = '{$fname}', user_pass = '{$password}', user_email = '{$email}' WHERE user_id = '{$id}'";
		//echo $userString;
		$userQuery = mysqli_query($link, $userString);
		if($userQuery) {
			redirect_to("admin_index.php");
		}else{
			$message = "There was a problem editing this user.  Maybe go back to school and learn how to edit things.";
			return $message;
		}
		mysqli_close($link);
	}
?>
