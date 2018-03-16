<?php
   echo "<nav id='mainNav'>
   <ul>
   <li id='loggedIn'>User Logged In: {$_SESSION['user_name']}<br>Last Login: {$_SESSION['last_login']}</li>
   <li id='dailyMessage'><h4 id='contentChange'>.</h4></li>
   <li id='logoutButton'><a href='phpscripts/caller.php?caller_id=logout'><button class='buttonStyle'>Sign Out</button></a></li>
   <li id='homeButton'><a href='admin_index.php'><button class='buttonStyle'>Home</button></a></li>
   </ul>
   </nav>";
?>
