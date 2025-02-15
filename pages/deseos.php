<?php 
require_once '../libs/session_check.php'; 
?>

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
          <h1 class="page-title pb-2">Deseos</h1>
          <nav class="breadcrumb fs-6">
            <a class="breadcrumb-item nav-link" href="#">Home</a>
            <span class="breadcrumb-item active" aria-current="page">Deseos</span>
          </nav>
        </div>
      </div>
    </section>



  <!------------------ Seccion 1 (Datos) ---------------------->
  <!-- ====================================================== -->
  <section id="Wishlist" class="py-5 my-5">
    <div class="container">
      <table class="table">
        <thead>
          <tr>
            <th scope="col" class="card-title text-uppercase">Producto</th>
            <th scope="col" class="card-title text-uppercase">Precio Unitario</th>
            <th scope="col" class="card-title text-uppercase">Estatus de Stock</th>
            <th scope="col" class="card-title text-uppercase"></th>
          </tr>
        </thead>
        <tbody>

          <tr>
            <td class="py-4">
              <div class="cart-info d-flex flex-wrap align-items-center ">
                <div class="col-lg-3">
                  <div class="card-image">
                    <img src="images/item7.jpg" alt="imagen" class="img-fluid">
                  </div>
                </div>
                <div class="col-lg-9">
                  <div class="card-detail ps-3">
                    <h5 class="card-title">
                      <a href="#" class="text-decoration-none">Oso</a>
                    </h5>
                  </div>
                </div>
              </div>
            </td>
            <td class="py-4 align-middle">
              <div class="total-price">
                <span class="secondary-font fw-medium">S/. 250.00</span>
              </div>
            </td>
            <td class="py-4 align-middle">
              <div class="total-price">
                <span class="secondary-font fw-medium">In Stoke</span>
              </div>
            </td>
            <td class="py-4 align-middle">
              <div class="d-flex align-items-center">
                <div class="me-4"><button class="btn btn-dark p-3 text-uppercase fs-6 btn-rounded-none w-100">Añadir al carrito</button></div>
                <div class="cart-remove">
                  <a href="#">
                    <svg width="24" height="24">
                      <use xlink:href="#trash"></use>
                    </svg>
                  </a>
                </div>
              </div>
            </td>
          </tr>


        </tbody>
      </table>
    </div>
  </section>






  <?php include '../templates/descuento.php'; ?>
  <?php include '../templates/beneficios.php'; ?>
  <?php include '../templates/footer.php'; ?>
  <?php include '../templates/footer_scripts.php'; ?>
</body>

</html>