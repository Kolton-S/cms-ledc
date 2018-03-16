<?php
   //ini_set('display_errors',1);
   //error_reporting(E_ALL);
   require_once('phpscripts/config.php');
   // confirm_logged_in();
    $tbl = "tbl_user";
    $users = getAll($tbl);

   ?>
<!doctype html>
<html>
   <head>
      <meta charset="UTF-8">
      <title>LEDC - Delete User</title>
      <link rel="stylesheet" href="css/reset.css">
      <link rel="stylesheet" href="css/main.css">
   </head>
   <body>
      <?php include('templates/navigation.php'); ?>
      <section id="deleteUser">
         <?php
            while ($row = mysqli_fetch_array($users)){
              echo "{$row['user_fname']} <a href=\"phpscripts/caller.php?caller_id=delete&id={$row['user_id']}\" class='deleteUser'>Delete User</a><br><br>";
            }
            ?>
      </section>
   </body>
   <script src="js/timeupdate.js"></script>
</html>
