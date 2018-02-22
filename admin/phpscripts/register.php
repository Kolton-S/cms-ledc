<?php

   function register($username, $email, $fname, $ip){
     require_once('connect.php');
     $username = mysqli_real_escape_string($link, $username);// mysqli_real_escape_string to stop sql injections
     $password = mysqli_real_escape_string($link, $password);
     $loginstring = "SELECT * FROM tbl_user WHERE user_name = '{$username}' AND user_pass = '{$password}'"; //usrname & password from the database, puts it in loginstring
     $user_set = mysqli_query($link, $loginstring);
     if(mysqli_num_rows($user_set)){
       $found_user = mysqli_fetch_array($user_set, MYSQLI_ASSOC);
       $attempt = $found_user['attempts'];
       $id = $found_user['user_id'];
       $ll = $found_user['last_login'];
       $_SESSION['user_id'] = $id; // sessions can't be saved or cashed, deleted on page close. Temp file.
       $_SESSION['user_name'] = $found_user['user_fname'];
       $_SESSION['last_login'] = $ll;
       $_SESSION['attempts'] = $attempt;
       $last_login = "CURRENT_TIMESTAMP";
       $current_time = "UPDATE tbl_user SET last_login = CURRENT_TIMESTAMP WHERE user_id = '{$id}'";
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
       $bump_login = "UPDATE tbl_user SET attempts = attempts + 1 WHERE user_name = $username";
       $bump = mysqli_query($link, $bump_login);
       $message = "Username and or password is incorrect";
       return $message;
     }
     mysqli_close($link);
   }

?>
