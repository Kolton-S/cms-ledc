<?php

   function logIn($username, $password, $localtime, $ip){
     require_once('connect.php');
     $username = mysqli_real_escape_string($link, $username);// mysqli_real_escape_string to stop sql injections
     $password = mysqli_real_escape_string($link, $password);
     $loginstring = "SELECT * FROM tbl_user WHERE user_name = '{$username}' AND user_pass = '{$password}'";//usrname & password from the database, puts it in loginstring
     $currentAttempt = "SELECT attempts FROM tbl_user WHERE user_name = '{$username}'";
     $attemptQuery = mysqli_query($link, $currentAttempt);
     $convertInt = mysqli_fetch_row($attemptQuery);
     $getAttempt = $convertInt[0];
     $user_set = mysqli_query($link, $loginstring);
     if(mysqli_num_rows($user_set)){
       $found_user = mysqli_fetch_array($user_set, MYSQLI_ASSOC);
       $attempt = $found_user['attempts'];
       $id = $found_user['user_id'];
       $_SESSION['user_id'] = $id; // sessions can't be saved or cashed, deleted on page close. Temp file.
       $_SESSION['user_name'] = $found_user['user_fname'];
       $_SESSION['attempts'] = $attempt;
       $_SESSION['last_login'] = $found_user['last_login'];
       date_default_timezone_set("America/Toronto");
       $timeset = date('d-m-Y h:i:s A');
       $current_time = "UPDATE tbl_user SET last_login = '{$timeset}' WHERE user_id = '{$id}'";
       if ($attempt >= 3) {
          $message = 'Sorry your account has been lock out. Please contact the administrator';
          return $message;
        }else if(mysqli_query($link, $loginstring)){
         $updatestring = "UPDATE tbl_user SET user_ip = '$ip' WHERE user_id={$id}";
         $updatequery = mysqli_query($link, $updatestring);
       } // updates the ip in the database.
       $updatetime = mysqli_query($link, $current_time);
       redirect_to('admin_index.php');
     } else {
       $setAttempt = $getAttempt + "1";
       $bump_login = "UPDATE tbl_user SET attempts = attempts+1 WHERE user_name = `{$username}`";
       $bump = mysqli_query($link, $bump_login);
       $message = "Username and or password is incorrect {$username} \n\n Your current attempts are {$getAttempt}, you are locked out at 3.";
       return $message;
     }
     mysqli_close($link);
   }

?>
