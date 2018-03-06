<?php
	//DO NOT PUT LINK TO CALLER.PHP IN THE CONFIG FILE.
	require_once("config.php");

	if(isset($_GET['caller_id'])){
		$dir = $_GET['caller_id'];
		if($dir == 'logout') {
			logged_out();
		}else if($dir == 'delete') {
			$id = $_GET['id'];
			delete_user($id);
		}else if($dir == 'deleteJ') {
			$id = $_GET['id'];
			delete_job($id);
		}else if($dir == 'editJS') {
			$id = $_GET['id'];
			edit_jobSet($id);
		}else{
			echo "Caller id was passed incorrectly";
		}
	}





?>
