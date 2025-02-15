<!DOCTYPE html>
<html lang="en">

<head>

  <?php include '../templates/head.php'; ?>

</head>

<?php include '../templates/header.php'; ?>

<body>



  <!-- Sección 1 (Título) -->
  <section class="py-5 mb-5" style="background: url(/public/images/background-pattern.jpg);">
    <div class="container-fluid">
      <div class="d-flex justify-content-between">
        <h1 class="page-title pb-2">Cuenta</h1>
        <nav class="breadcrumb fs-6">
          <a class="breadcrumb-item nav-link" href="#">Home</a>
          <a class="breadcrumb-item nav-link" href="#">Cuenta</a>
        </nav>
      </div>
    </div>
  </section>

  <!-- Sección 2 (General) -->
  <section class="login-tabs padding-large">
    <div class="container my-5 py-5">
      <div class="row">
        <div class="tabs-listing">
          <nav>
            <div class="nav nav-tabs d-flex justify-content-center border-dark-subtle mb-3" id="nav-tab" role="tablist">
              <button class="nav-link mx-3 fs-3 border-bottom border-dark-subtle border-0 text-uppercase active"
                id="nav-sign-in-tab" data-bs-toggle="tab" data-bs-target="#nav-sign-in" type="button" role="tab"
                aria-controls="nav-sign-in" aria-selected="true">Inicia Sesión</button>
              <button class="nav-link mx-3 fs-3 border-bottom border-dark-subtle border-0 text-uppercase"
                id="nav-register-tab" data-bs-toggle="tab" data-bs-target="#nav-register" type="button" role="tab"
                aria-controls="nav-register" aria-selected="false">Regístrate</button>
            </div>
          </nav>

          <!-- Sección 3 (Inicia Sesión) -->
          <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade active show" id="nav-sign-in" role="tabpanel" aria-labelledby="nav-sign-in-tab">
              <div class="col-lg-8 offset-lg-2 mt-5">

                <p class="mb-0">Redes Sociales</p>
                <hr class="my-1">
                <div class="row mt-4 mb-5">
                  <div class="d-grid col-md-6 my-2">
                    <a href="#" class="btn btn-outline-primary btn-lg text-uppercase fs-6 rounded-1 ">
                      <div class="d-flex flex-wrap justify-content-center">
                        <iconify-icon icon="ion:logo-google" class="signup-social-icon me-2"></iconify-icon>
                        <p class="mb-0">Google</p>
                      </div>
                    </a>
                  </div>
                  <div class="d-grid col-md-6 my-2">
                    <a href="#" class="btn btn-outline-primary btn-lg text-uppercase fs-6 rounded-1 ">
                      <div class="d-flex flex-wrap justify-content-center">
                        <iconify-icon icon="ion:logo-facebook" class="signup-social-icon me-2"></iconify-icon>
                        <p class="mb-0">Facebook</p>
                      </div>
                    </a>
                  </div>
                </div>

                <p class="mb-0">O Email</p>
                <hr class="my-1">

                <form action="../controller/login/login_usuario.php" method="POST" id="formLogin" class="form-group flex-wrap ">
                  <div class="form-input col-lg-12 my-4">
                    <input type="email" id="loginEmail1" name="correo" placeholder="Correo Electrónico"
                      class="form-control mb-3 p-4">
                    <input type="password" id="loginPassword" name="contrasena" placeholder="Contraseña" class="form-control mb-3 p-4"
                      aria-describedby="passwordHelpBlock">

                    <label class="py-3 d-flex flex-wrap justify-content-between">
                      <div id="passwordHelpBlock" class="form-text ">
                        <a href="#" class="text-primary fw-bold">¿Olvidaste tu contraseña?</a>
                      </div>
                    </label>
                    <div class="d-grid my-3">
                      <input type="submit" class="btn btn-primary btn-lg rounded-1" value="Ingresar"></input>
                    </div>
                  </div>
                </form>
              </div>
            </div>

            <!-- Sección 4 (Regístrate) -->
            <div class="tab-pane fade" id="nav-register" role="tabpanel" aria-labelledby="nav-register-tab">
              <div class="col-lg-8 offset-lg-2 mt-5">
                <p class="mb-0">Redes Sociales</p>
                <hr class="my-1">
                <div class="row mt-4 mb-5">
                  <div class="d-grid col-md-6 my-2">
                    <a href="#" class="btn btn-outline-primary btn-lg text-uppercase fs-6 rounded-1 ">
                      <div class="d-flex flex-wrap justify-content-center">
                        <iconify-icon icon="ion:logo-google" class="signup-social-icon me-2"></iconify-icon>
                        <p class="mb-0">Google</p>
                      </div>
                    </a>
                  </div>
                  <div class="d-grid col-md-6 my-2">
                    <a href="#" class="btn btn-outline-primary btn-lg text-uppercase fs-6 rounded-1 ">
                      <div class="d-flex flex-wrap justify-content-center">
                        <iconify-icon icon="ion:logo-facebook" class="signup-social-icon me-2"></iconify-icon>
                        <p class="mb-0">Facebook</p>
                      </div>
                    </a>
                  </div>
                </div>

                <p class="mb-0">O Email</p>
                <hr class="my-1">

                <form action="../controller/login/register_usuario.php" method="POST" id="formRegister" class="form-group flex-wrap">
                  <div class="form-input col-lg-12 my-4">
                    <input type="text" id="registerName" name="nombre_completo" placeholder="Nombre Completo"
                      class="form-control mb-3 p-4" required>
                    <input type="email" id="registerEmail" name="correo" placeholder="Correo Electrónico"
                      class="form-control mb-3 p-4" required>
                    <input type="password" id="registerPassword" name="contrasena" placeholder="Contraseña"
                      class="form-control mb-3 p-4" required>
                    <input type="password" id="confirmPassword" placeholder="Repite la Contraseña"
                      class="form-control mb-3 p-4" required>
                    <div class="d-grid my-3">
                      <input type="submit" class="btn btn-primary btn-lg rounded-1" value="crear" onclick="return validarContrasenas()">
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


  <script>
    function validarContrasenas() {
      const password = document.getElementById('registerPassword').value;
      const confirmPassword = document.getElementById('confirmPassword').value;

      if (password !== confirmPassword) {
        Swal.fire({
          icon: 'error',
          title: '¡Error!',
          text: 'Las contraseñas no coinciden. Por favor, intenta de nuevo.',
          confirmButtonText: 'Aceptar',
          customClass: {
            confirmButton: 'btn-primary' // Aplica tu clase personalizada aquí
          }
        });
        return false; // Detiene el envío del formulario
      }
      return true; // Permite enviar el formulario
    }
  </script>





  <?php include '../templates/descuento.php'; ?>
  <?php include '../templates/beneficios.php'; ?>
  <?php include '../templates/footer.php'; ?>
  <?php include '../templates/footer_scripts.php'; ?>
</body>

</html>