<?php
include '../../libs/connection.php';

// Obtener los valores del formulario
$nombre_completo = mysqli_real_escape_string($conexion_db, $_POST['nombre_completo']);
$correo = mysqli_real_escape_string($conexion_db, $_POST['correo']);
$contrasena = mysqli_real_escape_string($conexion_db, $_POST['contrasena']);

// Encriptar la contraseña
$contrasena = hash('sha512', $contrasena);

// Verificar si el correo ya existe en la base de datos
$verificar_correo = mysqli_query($conexion_db, "SELECT * FROM usuario WHERE email = '$correo'");

if (!$verificar_correo) {
    die("Error en la consulta: " . mysqli_error($conexion_db));
}

if (mysqli_num_rows($verificar_correo) > 0) {
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
                    title: "Correo ya registrado",
                    text: "Este correo ya está registrado, intenta con otro.",
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
} else {
    // Insertar el usuario en la base de datos
    $query = "INSERT INTO usuario (nombre, email, contraseña) VALUES('$nombre_completo', '$correo', '$contrasena')";
    $ejecutar = mysqli_query($conexion_db, $query);

    if ($ejecutar) {
        echo '
        <!DOCTYPE html>
        <html lang="es">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Registro exitoso</title>
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
                        icon: "success",
                        title: "Registro exitoso",
                        text: "Usuario registrado exitosamente.",
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
    } else {
        echo '
        <!DOCTYPE html>
        <html lang="es">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Error en el registro</title>
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
                        title: "Error en el registro",
                        text: "Hubo un problema al registrar el usuario, intenta de nuevo.",
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
    }
}

// Cerrar la conexión
mysqli_close($conexion_db);
?>
