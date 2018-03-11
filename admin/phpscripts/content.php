<?php
function delete_job($id){
  include('connect.php');
  $deleteString = "DELETE FROM tbl_jobs WHERE id = '{$id}'";
  $delQuery = mysqli_query($link, $deleteString);
  if($delQuery) {
    redirect_to("../admin_index.php");
  }else{
    $message = "There was a problem deleting this job. If this problem persists, please contact system web master.";
    return $message;
  }
  mysqli_close($link);
}

function edit_jobSet($id) {
		redirect_to("../admin_content.php?editJS={$id}");
	}

function edit_job($idSet, $company, $logo, $image, $description, $linka) {
		include('connect.php');
		$updateString = "UPDATE tbl_jobs SET company = '{$company}', logo_src = '{$logo}', img_src = '{$image}', description = '{$description}', link = '{$linka}' WHERE id = '{$idSet}'";
		// echo $updateString;
		$updateQuery = mysqli_query($link, $updateString);
		if($updateQuery) {
			redirect_to("admin_index.php");
		}else{
			$message = "There was a problem editing this job. If this problem persists, please contact system web master.";
			return $message;
		}
		mysqli_close($link);
	}

  function add_job($idSet, $company, $logo, $image, $description, $linka) {
  		include('connect.php');
  		$updateString = "INSERT INTO tbl_jobs VALUES(NULL, '{$company}', '{$logo}', '{$image}', '{$description}', '{$linka}')";
  		// echo $updateString;
  		$updateQuery = mysqli_query($link, $updateString);
  		if($updateQuery) {
  			redirect_to("admin_index.php");
  		}else{
  			$message = "There was a problem adding this job. If this problem persists, please contact system web master.";
  			return $message;
  		}
  		mysqli_close($link);
  	}
?>
