<?php
function register($fname, $username, $email, $userlvl) {
 include('connect.php');
 $ranPass = $rand = substr(md5(microtime()),rand(0,26),10);
 date_default_timezone_set("America/Toronto");
 $timeset = date('d-m-Y h:i:s A');
 echo $timeset;
 $userString = "INSERT INTO tbl_user VALUES(NULL,'{$fname}', '{$username}', '{$ranPass}', '{$email}', '{$timeset}', '{$userlvl}', 'no', NULL, '0')";
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
		$updateString = "UPDATE tbl_user SET user_name = '{$username}', user_fname = '{$fname}', user_pass = '{$password}', user_email = '{$email}' WHERE user_id = '{$id}'";
		//echo $userString;
		$updateQuery = mysqli_query($link, $updateString);
		if($updateQuery) {
			redirect_to("admin_index.php");
		}else{
			$message = "There was a problem editing this user.  Maybe go back to school and learn how to edit things.";
			return $message;
		}
		mysqli_close($link);
	}

  function delete_user($id){
		include('connect.php');
		$deleteString = "DELETE FROM tbl_user WHERE user_id = '{$id}'";
		$delQuery = mysqli_query($link, $deleteString);
		if($delQuery) {
			redirect_to("../admin_index.php");
		}else{
			$message = "There was a problem editing this user. Couldn't delete user, please contact system web master.";
			return $message;
		}
		mysqli_close($link);
	}
?>
