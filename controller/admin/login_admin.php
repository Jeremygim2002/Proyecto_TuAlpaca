<?php
session_start();

if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true) {
    header("location: ../../pages/dashboard_admin.php");
    exit();
}

$email = isset($_POST['correo']) ? $_POST['correo'] : '';
$password = isset($_POST['contrasena']) ? $_POST['contrasena'] : '';

$admin_email = 'admin@gmail.com';
$admin_password = 'admin'; 

if ($email === $admin_email && $password === $admin_password) {
    $_SESSION['admin_logged_in'] = true;
    $_SESSION['admin_email'] = $admin_email;
    header("location: ../../pages/dashboard_admin.php");
    exit();
} else {
    echo '
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Error</title>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </head>
    <body>
        <script>
            Swal.fire({
                icon: "error",
                title: "Error de inicio de sesión",
                text: "Credenciales inválidas, inténtelo de nuevo.",
                confirmButtonText: "Aceptar"
            }).then(() => {
                window.location.href = "../../pages/login_admin.php";
            });
        </script>
    </body>
    </html>
    ';
    exit();
}
?>
