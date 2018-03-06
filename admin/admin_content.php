<?php
	//ini_set('display_errors',1);
	//error_reporting(E_ALL);
	require_once('phpscripts/config.php');
	// confirm_logged_in();
  $tbl = "tbl_jobs";
  $delJobs = getAll($tbl);
	$editJobs = getAll($tbl);
	$col = "id";
	$idSet = 1;
	if( isset( $_GET['editJS'])) {
    $idSet = $_GET['editJS'];
	}
	$popForm = getSingle($tbl, $col, $idSet);
	$found_content = mysqli_fetch_array($popForm, MYSQLI_ASSOC);

	if(isset($_POST['submit'])) {
		$company = trim($_POST['company']);
		$logo = trim($_POST['logo']);
		$image = trim($_POST['image']);
		$description = trim($_POST['description']);
		$linka = trim($_POST['link']);
			$result = edit_job($idSet, $company, $logo, $image, $description, $linka);
			$message = $result;
		}
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>CMS Portal</title>
<link rel="stylesheet" href="css/main.css">
</head>
<body>
	<h1>LEDC Edit Content Page</h1>
	<section id="delJobs">

  <?php
    while ($row = mysqli_fetch_array($delJobs)){
      echo "{$row['id']} {$row['company']} <a href=\"phpscripts/caller.php?caller_id=deleteJ&id={$row['id']}\">Delete Job</a><br>";
    }
  ?>
	</section>
	<section id="editJobs">

  <?php
    while ($row = mysqli_fetch_array($editJobs)){
      echo "{$row['id']} {$row['company']} <a href=\"phpscripts/caller.php?caller_id=editJS&id={$row['id']}\">Edit Job</a><br>";
    }
  ?>
	<?php if(!empty($message)){echo $message;} echo $idSet; ?>
	<form action="admin_content.php" method="post" >
	<label>Company Name:</label>
	<input type="text" name="company" value="	<?php echo $found_content['company']; ?>
"><br><br>

	<label>Logo Name:</label>
	<input type="text" name="logo" value="	<?php echo $found_content['logo_src']; ?>
"><br><br>

	<label>Main Image Name:</label>
	<input type="text" name="image" value="	<?php echo $found_content['img_src']; ?>
"><br><br>

	<label>Description:</label>
	<input type="text" name="description" value="	<?php echo $found_content['description']; ?>
"><br><br>

<label>Link:</label>
<input type="text" name="link" value="	<?php echo $found_content['link']; ?>
"><br><br>

	<input type="submit" name="submit" value="Edit Job">
	</form>
	</section>

</body>
<!-- <script src="js/reveal.js"></script> -->
</html>
