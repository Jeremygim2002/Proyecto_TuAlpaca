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
  <!-- ======================================================= -->
  <section class="py-5 mb-5" style="background: url(/public/images/background-pattern.jpg);">
    <div class="container-fluid">
      <div class="d-flex justify-content-between">
        <h1 class="page-title pb-2">Carrito</h1>
        <nav class="breadcrumb fs-6">
          <a class="breadcrumb-item nav-link" href="index.php">Home</a>
          <span class="breadcrumb-item active" aria-current="page">Carrito</span>
        </nav>
      </div>
    </div>
  </section>




  <!------------------ Seccion 2 (Cuerpo) ---------------------->
  <!-- ======================================================= -->
  <section class="py-5">
    <div class="container-fluid">
      <div class="row g-5">
        <div class="col-md-8">

          <div class="table-responsive cart">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col" class="card-title text-uppercase text-muted">Producto</th>
                  <th scope="col" class="card-title text-uppercase text-muted">Cantidad</th>
                  <th scope="col" class="card-title text-uppercase text-muted">Precio</th>
                  <th scope="col" class="card-title text-uppercase text-muted"></th>
                </tr>
              </thead>
              <tbody>



              </tbody>
            </table>
          </div>

        </div>
        <div class="col-md-4">
          <div class="cart-totals bg-grey py-5">
            <h4 class="text-dark pb-4">Total</h4>
            <div class="total-price pb-5">
              <table cellspacing="0" class="table text-uppercase">
                <tbody>
                  <tr class="subtotal pt-2 pb-2 border-top border-bottom">
                    <th>Subtotal</th>
                    <td data-title="Subtotal">
                      <span class="price-amount amount text-dark ps-5">
                        <bdi>
                          <span class="price-currency-symbol">$</span>2,370.00
                        </bdi>
                      </span>
                    </td>
                  </tr>
                  <tr class="order-total pt-2 pb-2 border-bottom">
                    <th>Total</th>
                    <td data-title="Total">
                      <span class="price-amount amount text-dark ps-5">
                        <bdi>
                          <span class="price-currency-symbol">$</span>2,370.00</bdi>
                      </span>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="button-wrap row g-2">
              <div class="col-md-6"><button class="btn btn-dark py-3 px-4 text-uppercase btn-rounded-none w-100">Aplicar descuento</button></div>
              <div class="col-md-6"><a href="comprar.php"><button
                    class="btn btn-dark py-3 px-4 text-uppercase btn-rounded-none w-100">Continuar comprando</button></a></div>
              <div class="col-md-12"><a href="checkout.php"><button
                    class="btn btn-primary py-3 px-4 text-uppercase btn-rounded-none w-100">Proceder al checkout</button></a>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>





  <script>
    document.addEventListener('DOMContentLoaded', function() {
      loadCartFromServer();

      function loadCartFromServer() {
        fetch('../controller/comprar/fetch_cart.php')
          .then(response => response.json())
          .then(data => {
            if (data.success) {
              localStorage.setItem('cart', JSON.stringify(data.cart));
              updateCartDisplay(); // Actualiza la tabla del carrito y barra lateral
            } else {
              console.error('Error al cargar el carrito:', data.error);
            }
          })
          .catch(error => console.error('Error de red:', error));
      }

      function updateCartDisplay() {
        const cart = JSON.parse(localStorage.getItem('cart')) || [];
        const cartTableBody = document.querySelector('.cart tbody');
        const cartTotalElement = document.getElementById('cart-total');
        const cartTotalHeader = document.getElementById('cart-total-header');
        const cartSubtotalElement = document.querySelector('.subtotal td span');
        const carttotalElement = document.querySelector('.order-total td span');

        cartTableBody.innerHTML = '';
        let cartTotal = 0;
        let subtotal = 0;

        if (cart.length === 0) {
          cartTableBody.innerHTML = '<tr><td colspan="4" class="text-center">El carrito está vacío.</td></tr>';
        } else {
          cart.forEach(product => {
            const row = document.createElement('tr');
            row.innerHTML = `
                    <td class="py-4">
                        <div class="cart-info d-flex align-items-center">
                            <img src="../public/images/producto/${product.imagen}" alt="${product.marca}" class="img-fluid" style="width: 80px;">
                            <div class="ps-3">
                                <h5>${product.marca}</h5>
                            </div>
                        </div>
                    </td>
                    <td class="py-4">
                        <div class="input-group product-qty w-50">
                            <button type="button" class="quantity-left-minus btn btn-light btn-number" onclick="updateQuantity(${product.id}, 'decrease')">
                                <svg width="16" height="16"><use xlink:href="#minus"></use></svg>
                            </button>
                            <input type="text" class="form-control input-number text-center" value="${product.cantidad}" readonly>
                            <button type="button" class="quantity-right-plus btn btn-light btn-number" onclick="updateQuantity(${product.id}, 'increase')">
                                <svg width="16" height="16"><use xlink:href="#plus"></use></svg>
                            </button>
                        </div>
                    </td>
                    <td class="py-4">S/. ${(product.precio * product.cantidad).toFixed(2)}</td>
                    <td class="py-4">
                        <a href="#" class="cart-remove" onclick="removeFromCart(${product.id})">
                            <svg width="24" height="24"><use xlink:href="#trash"></use></svg>
                        </a>
                    </td>`;
            cartTableBody.appendChild(row);
            subtotal += product.precio * product.cantidad;
          });
        }

        cartTotal = subtotal * 0.82; 


        cartTotalElement.textContent = `S/. ${subtotal.toFixed(2)}`;
        cartTotalHeader.textContent = `S/. ${subtotal.toFixed(2)}`;
        cartSubtotalElement.textContent = `S/. ${cartTotal.toFixed(2)}`;
        carttotalElement.textContent = `S/. ${subtotal.toFixed(2)}`;
        localStorage.setItem('cartSubtotal', cartTotal.toFixed(2));
        localStorage.setItem('cartTotal', subtotal.toFixed(2)); 



      }

      window.updateQuantity = function(id_producto, action) {
        fetch('../controller/comprar/update_quantity.php', {
            method: 'POST',
            headers: {
              'Content-Type': 'application/json'
            },
            body: JSON.stringify({
              id_producto,
              action
            })
          })
          .then(response => response.json())
          .then(data => {
            if (data.success) {
              window.location.reload(); 
              loadCartFromServer(); 
            } else {
              console.error('Error al actualizar la cantidad');
            }
          });
      };

      window.removeFromCart = function(id_producto) {
        fetch('../controller/comprar/remove_from_cart.php', {
            method: 'POST',
            headers: {
              'Content-Type': 'application/json'
            },
            body: JSON.stringify({
              id_producto
            })
          })
          .then(response => response.json())
          .then(data => {
            if (data.success) {
              window.location.reload(); 
              loadCartFromServer(); 
            } else {
              console.error('Error al eliminar el producto');
            }
          });
      };
    });
  </script>








  <?php include '../templates/descuento.php'; ?>
  <?php include '../templates/beneficios.php'; ?>
  <?php include '../templates/footer.php'; ?>
  <?php include '../templates/footer_scripts.php'; ?>
</body>

</html>