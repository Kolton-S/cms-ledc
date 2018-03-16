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

   if(isset($_POST['submitEdit'])) {
   	$companyEdit = trim($_POST['companyEdit']);
   	$logoEdit = trim($_POST['logoEdit']);
   	$imageEdit = trim($_POST['imageEdit']);
   	$descriptionEdit = trim($_POST['descriptionEdit']);
   	$linkaEdit = trim($_POST['linkEdit']);
   		$result = edit_job($idSetEdit, $companyEdit, $logoEdit, $imageEdit, $descriptionEdit, $linkaEdit);
   		$messageEdit = $result;
   	}

   	if(isset($_POST['submitAdd'])) {
   		$company = trim($_POST['company']);
   		$logo = $_FILES['logo'];
   		$image = $_FILES['image'];
   		$description = trim($_POST['description']);
   		$linka = trim($_POST['link']);
   		if (!empty($logo) && !empty($image)){
   			$result = add_job($idSet, $company, $logo, $image, $description, $linka);
   			$message = $result;
   		}
   		}
   ?>
<!doctype html>
<html>
   <head>
      <meta charset="UTF-8">
      <title>LEDC - Content Editor</title>
      <link rel="stylesheet" href="css/reset.css">
      <link rel="stylesheet" href="css/main.css">
   </head>
   <body>
      <?php include("templates/navigation.php"); ?>
      <div id="tabGroup">
         <a href="#delJobs" class="buttonStyle">Delete Jobs</a>
         <a href="#editJobs" class="buttonStyle">Edit Jobs</a>
         <a href="#addJob" class="buttonStyle">Add Job</a>
      </div>
      <section id="contentWrapper">
         <div id="delJobs" class="tab">
            <?php
               while ($row = mysqli_fetch_array($delJobs)){
                 echo "{$row['id']} {$row['company']} <a href=\"phpscripts/caller.php?caller_id=deleteJ&id={$row['id']}\" class='deleteUser'>Delete Job</a><br>";
               }
               ?>
         </div>
         <div id="editJobs" class="tab active">
            <?php
               while ($row = mysqli_fetch_array($editJobs)){
                 echo "{$row['id']} {$row['company']} <a href=\"phpscripts/caller.php?caller_id=editJS&id={$row['id']}\" class='deleteUser'>Edit Job</a><br>";
               }
               ?>
            <?php if(!empty($messageEdit)){echo $messageEdit;}?>
            <form action="admin_content.php" method="post" >
               <label>Company Name:</label>
               <input type="text" name="companyEdit" class="textBoxes" value="	<?php echo $found_content['company']; ?>
                  "><br><br>
               <label>Logo Name:</label>
               <input type="text" name="logoEdit" class="textBoxes" value="	<?php echo $found_content['logo_src']; ?>
                  "><br><br>
               <label>Main Image Name:</label>
               <input type="text" name="imageEdit" class="textBoxes" value="	<?php echo $found_content['img_src']; ?>
                  "><br><br>
               <label>Description:</label>
               <input type="text" name="descriptionEdit" class="textBoxes" value="	<?php echo $found_content['description']; ?>
                  "><br><br>
               <label>Link:</label>
               <input type="text" name="linkEdit" class="textBoxes" value="	<?php echo $found_content['link']; ?>
                  "><br><br>
               <input type="submit" name="submitEdit" class="buttonStyle" value="Edit Job">
            </form>
         </div>
         <div id="addJob" class="tab">
            <?php if(!empty($message)){echo $message;}?>
            <form action="admin_content.php" method="post" >
               <label>Company Name:</label>
               <input type="text" name="company" class="textBoxes"><br><br>
               <label>Logo Name:</label>
               <input type="file" name="logo_src" class="textBoxes" value=""><br><br>
               <label>Main Image Name:</label>
               <input type="file" name="img_src" class="textBoxes" value=""><br><br>
               <label>Description:</label>
               <input type="text" name="description" class="textBoxes"><br><br>
               <label>Link:</label>
               <input type="text" name="link" class="textBoxes"><br><br>
               <input type="submit" name="submitAdd" class="buttonStyle" value="Add Job">
            </form>
         </div>
      </section>
   </body>
   <script src="js/reveal.js"></script>
   <script src="js/timeupdate.js"></script>
</html>
