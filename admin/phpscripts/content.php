<?php
function delete_job($id){
  include('connect.php');
  $deleteString = "DELETE FROM tbl_jobs WHERE id = '{$id}'";
  $delQuery = mysqli_query($link, $deleteString);
  if($delQuery) {
    redirect_to("../admin_index.php");
  }else{
    $message = "There was a problem deleting this job. Couldn't delete user, please contact system web master.";
    return $message;
  }
  mysqli_close($link);
}

function edit_jobSet($id) {
  echo 'Hit the edit ID set';
		redirect_to("../admin_content.php?editJS={$id}");
	}

function edit_job($idSet, $company, $logo, $image, $description, $linka) {
		include('connect.php');
		$updateString = "UPDATE tbl_jobs SET company = '{$company}', logo_src = '{$logo}', img_src = '{$image}', description = '{$description}', link = '{$linka}' WHERE id = '{$idSet}'";
		//echo $userString;
		$updateQuery = mysqli_query($link, $updateString);
		if($updateQuery) {
			redirect_to("admin_index.php");
		}else{
			$message = "There was a problem editing this job.  Maybe go back to school and learn how to edit things.";
			return $message;
		}
		mysqli_close($link);
	}
?>
