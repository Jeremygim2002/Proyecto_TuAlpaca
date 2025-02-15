<?php
session_start();
session_destroy(); // Destruir la sesión
header("location: ../../pages/logout_clear.html"); // Redirigir a una página intermedia
exit();
?>

