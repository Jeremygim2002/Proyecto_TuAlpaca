
<!DOCTYPE html>
<html lang="en">

<head>

<?php include '../templates/head.php'; ?>

</head>

<?php include '../templates/header.php'; ?>

<body>




  <!------------------ Seccion 1 (Titulos) ---------------------->
  <!-- ======================================================= -->
    <section class="py-5 mb-5" style="background: url(/public/images/background-pattern.jpg);">
      <div class="container-fluid">
        <div class="d-flex justify-content-between">
          <h1 class="page-title pb-2">Sobre Nosotros</h1>
          <nav class="breadcrumb fs-6">
            <a class="breadcrumb-item nav-link" href="#">Home</a>
            <span class="breadcrumb-item active" aria-current="page">Sobre Nosotros</span>
          </nav>
        </div>
      </div>
    </section>



  <!------------------ Seccion 2 (Contenido) ---------------------->
  <!-- ======================================================= -->
    <section class="company-detail py-4">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <p><strong>Somos un equipo de estudiantes de la Universidad</strong> comprometidos con promover los productos auténticos de la ciudad de San Juan de Tarucani, Arequipa. Nos especializamos en la venta de lana de alpaca y peluches hechos a mano con esta fibra de alta calidad, valorando las tradiciones andinas y el trabajo artesanal de la comunidad.</p>
          </div>
        </div>
        <h2>Objetivos de la web</h2>
        <div class="row">
          <div class="col-md-6">
            <p>Difundir la calidad y tradición: Dar a conocer a nivel nacional la lana de alpaca y los peluches hechos a mano en San Juan de Tarucani, resaltando la calidad y el trabajo artesanal de la comunidad</p>
          </div>
          <div class="col-md-6">
          <p>Promover el desarrollo económico y cultural de San Juan de Tarucani, apoyando a los artesanos locales y preservando las tradiciones andinas a través de la venta de productos auténticos.</p>
          </div>
        </div>
      </div>
    </section>
    

    
    <?php include '../templates/descuento.php'; ?>
  <?php include '../templates/beneficios.php'; ?>
  <?php include '../templates/footer.php'; ?>
  <?php include '../templates/footer_scripts.php'; ?>
</body>

</html>