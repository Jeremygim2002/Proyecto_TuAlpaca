<?php
session_start();
session_destroy();
header("location: ../../pages/logout_clear.html"); 
exit();
?>

