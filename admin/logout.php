<?php


session_start();//session is a way to store information (in variables) to be used across multiple pages.

unset($_SESSION['admin_is_logged']); 

session_destroy(); 

header("Location: admin_login.php");//use for the redirection to some page  


?>