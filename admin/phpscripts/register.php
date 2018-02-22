<?php

   function register($username, $email, $fname){
     require_once('connect.php');
     $username = mysqli_real_escape_string($link, $username);// mysqli_real_escape_string to stop sql injections
     $email = mysqli_real_escape_string($link, $email);
     $fname = mysqli_real_escape_string($link, $fname);
     $ranString = substr(str_shuffle(MD5(microtime())), 0, 10);
     date_default_timezone_set("America/Toronto");
     $timeset = date('d-m-Y h:i:s A');
     $hashed = password_hash($ranString, PASSWORD_BCRYPT);
     if ($hashed != ''){
       $register = "INSERT INTO tbl_user VALUES(NULL, '{$fname}', '{$username}', '{$hashed}', '{$email}', '{$timeset}', '0', NULL)";
       mysqli_query($link, $register);
       $mysqlQueryResponse = $register;
       return $mysqlQueryResponse;
       redirect_to('admin_register.php');
     } else {
       $regmessage = "Registration not complete, please contact a webmaster.";
       return $regmessage;
     }
     mysqli_close($link);
   }


//  function ranString($length = 10) {
//     $ranString = '';
//     $char = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
//     $charLength = strlen($char);
//     for ($i = 0; $i < $length; $i++) {
//         $ranString .= $char[rand(0, $charLength - 1)];
//     }
//     return $ranString;
// }

?>
