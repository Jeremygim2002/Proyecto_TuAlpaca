<?php 
require_once '../libs/session_check.php'; 
?>


<!DOCTYPE html>
<html lang="es">

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
        <h1 class="page-title pb-2">Checkout</h1>
        <nav class="breadcrumb fs-6">
          <a class="breadcrumb-item nav-link" href="#">Home</a>
          <span class="breadcrumb-item active" aria-current="page">Checkout</span>
        </nav>
      </div>
    </div>
  </section>




  <!------------------ Seccion 2 (Datos) ----------------------->
  <!-- ====================================================== -->
  <section class="shopify-cart checkout-wrap py-5">
    <div class="container-fluid">
      <form class="form-group" id="checkout-form">
        <div class="row d-flex flex-wrap">
          <div class="col-lg-6">
            <h4 class="text-dark pb-4">Detalles de la compra</h4>
            <div class="billing-details">
              <label for="fname">Nombre Completo</label>
              <input autocomplete="given-name" type="text" id="fname" name="firstname" class="form-control mt-2 mb-4 ps-3" value="<?php echo $nombreUsuario; ?>">

              <label for="email">Email</label>
              <input autocomplete="given-name" type="text" id="email" name="email" class="form-control mt-2 mb-4 ps-3" value="<?php echo $correoUsuario; ?>">

              <label for="dname">Departamento</label>
              <select name="departamento" id="departamento" class="form-select form-control mt-2 mb-4" aria-label="Default select example">
                <option selected="" hidden="">Seleccionar</option>
                <option value="Lima">Lima</option>
                <option value="Junin">Junin</option>
                <option value="Cusco">Cusco</option>
              </select>

              <label for="cname">Distrito</label>
              <select name="distrito" id="distrito" class="form-select form-control mt-2 mb-4" aria-label="Default select example">
                <option selected="" hidden="">Seleccionar</option>
                <option value="Lima">Lima</option>
                <option value="Miraflores">Miraflores</option>
                <option value="Chorrillos">Chorrillos</option>
              </select>

              <label for="address">Dirección</label>
              <input type="text" id="direccion" name="direccion" placeholder="Calle / Avenida / Jirón" class="form-control mt-3 ps-3 mb-3">
              <input type="text"  id="n_direccion" name="n_direccion" placeholder="N°" class="form-control ps-3 mb-4">

              <label for="email">Teléfono</label>
              <input type="text"  id="telefono" name="telefono"  class="form-control mt-2 mb-4 ps-3">

            </div>

          </div>
          <div class="col-lg-6">
            <h4 class="text-dark pb-4">Información adicional</h4>
            <div class="billing-details">
              <label for="fname">Notas (opcional)</label>
              <textarea class="form-control pt-3 pb-3 ps-3 mt-2" name="notes"  id="notes" placeholder="Notas sobre tu orden"></textarea>
            </div>

            <div class="your-order mt-5">
              <h4 class="display-7 text-dark pb-4">Resumen de la Compra</h4>
              <div class="total-price">
                <table cellspacing="0" class="table">
                  <tbody>
                    <tr class="subtotal border-top border-bottom pt-2 pb-2 text-uppercase">
                      <th>Subtotal</th>
                      <td data-title="Subtotal">
                        <span class="price-amount amount ps-5" id="checkout-subtotal">
                          <bdi>
                            <span class="price-currency-symbol">S/. </span>0.00 </bdi>
                        </span>
                      </td>
                    </tr>
                    <tr class="order-total border-bottom pt-2 pb-2 text-uppercase">
                      <th>Total</th>
                      <td data-title="Total">
                        <span class="price-amount amount ps-5" id="checkout-total">
                          <bdi>
                            <span class="price-currency-symbol">S/. </span>0.00 </bdi>
                        </span>
                      </td>
                    </tr>
                  </tbody>
                </table>



                <div class="list-group mt-5 mb-3">
                  <h4 class="display-7 text-dark pb-4">Método de Pago</h4>
                  <label class="list-group-item d-flex gap-2 border-0">
                    <input class="form-check-input flex-shrink-0" type="radio" name="listGroupRadios" id="listGroupRadios1" value="1" checked>
                    <span>
                      <strong class="text-uppercase">Tarjeta de Crédito / Débito</strong>
                      <small class="d-block text-body-secondary">BBVA / BCP / SCOTIA / INTERBANK</small>
                    </span>
                  </label>
                  <label class="list-group-item d-flex gap-2 border-0">
                    <input class="form-check-input flex-shrink-0" type="radio" name="listGroupRadios" id="listGroupRadios2" value="2">
                    <span>
                      <strong class="text-uppercase">Yape / Plin</strong>
                      <small class="d-block text-body-secondary">Se generara un código QR</small>
                    </span>
                  </label>
                  <label class="list-group-item d-flex gap-2 border-0">
                    <input class="form-check-input flex-shrink-0" type="radio" name="listGroupRadios" id="listGroupRadios3" value="3">
                    <span>
                      <strong class="text-uppercase">PayPal</strong>
                      <small class="d-block text-body-secondary">Se generara un código QR</small>
                    </span>
                  </label>
                  <label class="list-group-item d-flex gap-2 border-0">
                    <input class="form-check-input flex-shrink-0" type="radio" name="listGroupRadios" id="listGroupRadios3" value="4-">
                    <span>
                      <strong class="text-uppercase">Ya tu sabes</strong>
                      <small class="d-block text-body-secondary">Sorprendeme</small>
                    </span>
                  </label>
                </div>
                <button type="submit" name="submit" class="btn btn-dark btn-lg text-uppercase btn-rounded-none w-100">Generar orden</button>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </section>



  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const subtotal = localStorage.getItem('cartSubtotal') || '0.00';
      const total = localStorage.getItem('cartTotal') || '0.00';
      document.querySelector('.subtotal .price-amount bdi').innerText = `S/. ${subtotal}`;
      document.querySelector('.order-total .price-amount bdi').innerText = `S/. ${total}`;
    });
  </script>



  <?php include '../templates/descuento.php'; ?>
  <?php include '../templates/beneficios.php'; ?>
  <?php include '../templates/footer.php'; ?>
  <?php include '../templates/footer_scripts.php'; ?>
  <script src="/public/js/checkout.js"></script>
</body>

</html>