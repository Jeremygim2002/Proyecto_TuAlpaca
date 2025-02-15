<!DOCTYPE html>
<html lang="en">

<head>

<?php include '../templates/head.php'; ?>

</head>

<?php include '../templates/header.php'; ?>

<body>



  <!------------------ Seccion 1 (Titulo) ---------------------->
  <!-- ====================================================== -->
    <section class="py-5 mb-5" style="background: url(/public/images/background-pattern.jpg);">
      <div class="container-fluid">
        <div class="d-flex justify-content-between">
          <h1 class="page-title pb-2">Contacto</h1>
          <nav class="breadcrumb fs-6">
            <a class="breadcrumb-item nav-link" href="#">Home</a>
            <span class="breadcrumb-item active" aria-current="page">Contacto</span>
          </nav>
        </div>
      </div>
    </section>




  <!------------------ Seccion 2 (Datos) ----------------------->
  <!-- ====================================================== -->
    <section class="contact-us py-5">
      <div class="container-fluid">
        <div class="row">
          <div class="contact-info col-lg-6 pb-3">
            <div class="page-content d-flex flex-wrap">
              <div class="col-lg-6 col-sm-12">
                <div class="content-box text-dark pe-4 mb-5">
                  <h3 class="card-title">Ubicación</h3>
                  <div class="contact-address pt-3">
                    <p>Ctra. Central, Ate 15487</p>
                  </div>

                </div>
              </div>
              <div class="col-lg-6 col-sm-12">
                <div class="content-box">
                  <h3 class="card-title">Contacto</h3>
                  <div class="contact-number">
                    <p>
                      <a href="#">123456789</a>
                    </p>
                  </div>
                  <div class="email-address">
                    <p>
                      <a href="#">ucv@gmail.com</a>
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>


  <!------------------ Seccion 3 (Form) ----------------------->
  <!-- ====================================================== -->
          <div class="inquiry-item col-lg-6">
            <div class="bg-light p-5 rounded-5">
              <h2 class="display-7 text-dark">Suscribete</h2>
              <p>Suscribete para tener las ultimas promociones</p>
              <form id="form" class="form-group flex-wrap">
                <div class="col-lg-12 mb-3">
                  <input type="text" name="email" placeholder="Correo Electrónico" class="form-control ps-3">
                </div>
              </form>
              <div class="d-grid">
                <button class="btn btn-primary btn-lg text-uppercase btn-rounded-none">Enviar</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>




  <!------------------ Seccion 4 (Mapa) ------------------------>
  <!-- ====================================================== -->
    <section class="google-map"> 
  <div class="mapouter">
    <div class="gmap_canvas">
      <iframe width="100%" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=-12.0243192,-76.9104192&t=&z=15&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
      <br>
      <style>
        .mapouter {
          position: relative;
          text-align: right;
          height: 500px;
          width: 100%;
        }
      </style>
      <style>
        .gmap_canvas {
          overflow: hidden;
          background: none !important;
          height: 500px;
          width: 100%;
        }
      </style>
    </div>
  </div>
</section>






<?php include '../templates/descuento.php'; ?>
  <?php include '../templates/beneficios.php'; ?>
  <?php include '../templates/footer.php'; ?>
  <?php include '../templates/footer_scripts.php'; ?>
</body>

</html>