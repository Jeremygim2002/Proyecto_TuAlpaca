<?php
session_start();
session_destroy(); // Destruye la sesión
header("location: ../../pages/index.php"); // Redirige al login de admin
exit();
?>
