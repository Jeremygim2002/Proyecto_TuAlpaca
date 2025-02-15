<?php 
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['usuario']) || !isset($_SESSION['user_id'])) {
    echo '
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                verificarSesion();
            });

            function verificarSesion() {
                Swal.fire({
                    icon: "warning",
                    title: "Acceso denegado",
                    text: "Por favor, inicia sesión para continuar.",
                    confirmButtonText: "Ir a Cuenta"
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location = "cuenta.php";
                    }
                });
            }
        </script>
    ';
    session_destroy();
    exit();
}

// Extraer datos del usuario desde la sesión (de manera segura)
$nombreUsuario = htmlspecialchars($_SESSION['usuario']);
$correoUsuario = htmlspecialchars($_SESSION['email']);
?>
