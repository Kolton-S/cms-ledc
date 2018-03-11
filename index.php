<?php
   require_once('admin/phpscripts/config.php');
     $tbl = "tbl_jobs";
     $getJobs = getAll($tbl);
?>

<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>LEDC - Jobs</title>
<link rel="stylesheet" href="css/foundation.css">
<link rel="stylesheet" href="css/app.css">
</head>
<body>
  <section id="jobBus" class="fullpage-wrapper row">
     <div class="full">
    <h2 class="hide">Job Opportunities></h2>
    <div class="pulse1 slide rowjobs1">
  <?php
    // ! means not, so not a string.
    if(!is_string($getJobs)){
      while($row = mysqli_fetch_array($getJobs)){
        echo "<div class=\"small-12 medium-4 large-4 columns\"><img src=\"images/{$row['logo_src']}\" class=\"jobLogo\" alt=\"{$row['company']}\">
        <img src=\"images/{$row['img_src']}\" class=\"jobImg\" alt=\"{$row['company']}\">
        <p class=\"jobText\">{$row['description']}<br>
        <a href=\"{$row['link']}\">{$row['link']}</a></div></p>
        "; // \ makes the " not count as a close to the string the img tag is in
      }
    }else{
        echo "<p class=\"error\">{$getJobs}</p>";
    }

  ?>
</div>
</div>
</section>
</body>
</html>
