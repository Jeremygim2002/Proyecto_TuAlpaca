<?php
session_start();

if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true) {
    header("location: dashboard_admin.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <?php include '../templates/head.php'; ?>

</head>

<body>


    <div class="container my-5 py-5">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4">
                <h3 class="text-center mb-4">Iniciar Sesión como Admin</h3>
                <form action="../controller/admin/login_admin.php" method="POST" class="p-4 border rounded bg-light">
                    <div class="mb-3">
                        <label for="correo" class="form-label">Correo Electrónico</label>
                        <input type="email" name="correo" id="correo" class="form-control" required placeholder="admin@gmail.com">
                    </div>
                    <div class="mb-3">
                        <label for="contrasena" class="form-label">Contraseña</label>
                        <input type="password" name="contrasena" id="contrasena" class="form-control" required placeholder="admin">
                    </div>
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary">Ingresar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



    <?php include '../templates/footer_scripts.php'; ?>
</body>

</html>
