<?php
session_start();
include '../../libs/connection.php';


$email = mysqli_real_escape_string($conexion_db, $_POST['correo']);
$contrasena = hash('sha512', $_POST['contrasena']);


$validar_login = mysqli_query($conexion_db, "SELECT * FROM usuario WHERE email = '$email' AND contraseña = '$contrasena'");

if (mysqli_num_rows($validar_login) > 0) {
    $fila = mysqli_fetch_assoc($validar_login);
    

    $_SESSION['usuario'] = $fila['nombre'];  
    $_SESSION['email'] = $fila['email'];     
    $_SESSION['user_id'] = $fila['id_usuario']; 
    

    header("location: ../../pages/index.php");
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
        <style>
            .swal2-popup .swal2-confirm {
                background-color: #ffc43f !important;
                border-color: transparent !important;
                color: #fff !important;
            }
            .swal2-popup .swal2-confirm:hover {
                background-color: #f7a422 !important;
            }
            .swal2-popup .swal2-confirm:active {
                background-color: #ffc43f !important;
            }
        </style>
    </head>
    <body>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                Swal.fire({
                    icon: "error",
                    title: "Error de inicio de sesión",
                    text: "Usuario no existe, intenta de nuevo.",
                    confirmButtonText: "Aceptar",
                    customClass: {
                        confirmButton: "swal2-confirm"
                    }
                }).then(() => {
                    window.location = "../../pages/cuenta.php";
                });
            });
        </script>
    </body>
    </html>
    ';
    exit();
}

mysqli_close($conexion_db);
?>
