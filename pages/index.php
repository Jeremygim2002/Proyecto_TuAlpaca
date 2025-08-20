<?php include '../controller/insertar/insertar_productos.php'; ?>
<!DOCTYPE html>
<html lang="es">

<head>
  <?php include '../templates/head.php'; ?>
</head>


<body class="" cz-shortcut-listen="true">


  <?php include '../templates/header.php'; ?>



  <!-------------------------------- Seccion 1 (Anuncios) -------------------------------->
  <!-- ================================================================================ -->
  <section class="py-3" style="background-image: url('/public/images/background-pattern.jpg'); background-repeat: no-repeat; background-size: cover;">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="banner-blocks">

            <!-- Carrusel Dinámico -->
            <div class="banner-ad large bg-info block-1">
              <div class="swiper main-swiper">
                <div class="swiper-wrapper">

                  <!-- Diapositiva 1 -->
                  <div class="swiper-slide">
                    <div class="row banner-content align-items-center p-5">
                      <div class="content-wrapper col-md-7">
                        <div class="categories my-3">Calidez Natural</div>
                        <h3 class="display-4">Descubre la suavidad de la alpaca</h3>
                        <p>Disfruta de la máxima comodidad con nuestras prendas de alpaca. Ideales para mantenerte abrigado durante el invierno, nuestras prendas están hechas con fibras de alpaca de la mejor calidad.</p>
                        <a href="../pages/comprar.php"
                          class="btn btn-outline-dark btn-lg text-uppercase fs-6 rounded-1 px-4 py-3 mt-3">Explorar colección</a>
                      </div>
                      <div class="img-wrapper col-md-5">
                        <img src="/public/images/banner_1.png" alt="Product Thumbnail" class="img-fluid">
                      </div>
                    </div>
                  </div>

                  <!-- Diapositiva 2 -->
                  <div class="swiper-slide">
                    <div class="row banner-content align-items-center p-5">
                      <div class="content-wrapper col-md-7">
                        <div class="categories mb-3 pb-3">Elegancia Sostenible</div>
                        <h3 class="banner-title">Moda que respeta el ambiente</h3>
                        <p>Nuestras prendas de alpaca no solo son elegantes, sino también sostenibles. Cada pieza está confeccionada con prácticas éticas y materiales ecológicos, cuidando el planeta mientras luces increíble.</p>
                        <a href="../pages/comprar.php" class="btn btn-outline-dark btn-lg text-uppercase fs-6 rounded-1">Explorar colección</a>
                      </div>
                      <div class="img-wrapper col-md-5">
                        <img src="/public/images/banner_2.png" alt="Product Thumbnail" class="img-fluid">
                      </div>
                    </div>
                  </div>

                  <!-- Diapositiva 3 -->
                  <div class="swiper-slide">
                    <div class="row banner-content align-items-center p-5">
                      <div class="content-wrapper col-md-7">
                        <div class="categories mb-3 pb-3">Elegancia Sostenible</div>
                        <h3 class="banner-title">Calidad y herencia en cada prenda</h3>
                        <p>Nuestros productos de alpaca están inspirados en la rica tradición textil de los Andes. Cada prenda cuenta una historia de artesanía y dedicación, llevando la herencia andina a tu guardarropa.</p>
                        <a href="../pages/comprar.php" class="btn btn-outline-dark btn-lg text-uppercase fs-6 rounded-1">Explorar colección</a>
                      </div>
                      <div class="img-wrapper col-md-5">
                        <img src="/public/images/banner_3.png" alt="Product Thumbnail" class="img-fluid">
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Paginación -->
                <div class="swiper-pagination"></div>
              </div>
            </div>

            <!-- Banner Estático: Prendas de Vestir -->
            <div class="banner-ad bg-success-subtle block-2">
              <div class="row banner-content align-items-center p-5">
                <div class="content-wrapper col-md-7">
                  <div class="categories sale mb-3 pb-3">Prendas de Vestir</div>
                  <h3 class="banner-title">Calidez Natural</h3>
                  <a href="../pages/comprar.php" class="d-flex align-items-center nav-link">
                    Explorar colección
                    <svg width="24" height="24">
                      <use xlink:href="#arrow-right"></use>
                    </svg>
                  </a>
                </div>
                <div class="img-wrapper col-md-5">
                  <img src="/public/images/banner_4.png" alt="Product Thumbnail" class="img-fluid">
                </div>
              </div>
            </div>

            <!-- Banner Estático: Lana de Alpaca -->
            <div class="banner-ad bg-danger block-3">
              <div class="row banner-content align-items-center p-5">
                <div class="content-wrapper col-md-7">
                  <div class="categories sale mb-3 pb-3">Lana de Alpaca</div>
                  <h3 class="item-title">100% fibra</h3>
                  <a href="../pages/comprar.php" class="d-flex align-items-center nav-link">
                    Explorar colección
                    <svg width="24" height="24">
                      <use xlink:href="#arrow-right"></use>
                    </svg>
                  </a>
                </div>
                <div class="img-wrapper col-md-5">
                  <img src="/public/images/banner_5.png" alt="Product Thumbnail" class="img-fluid">
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </section>





  <!-------------------------------- Seccion 2 (Categorias) -------------------------------->
  <!-- ================================================================================ -->
  <section class="py-5 overflow-hidden">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">

          <div class="section-header d-flex flex-wrap justify-content-between mb-5">
            <h2 class="section-title">Categorias</h2>

            <div class="d-flex align-items-center">
              <a href="#" class="btn-link text-decoration-none">Ver siguiente →</a>
              <div class="swiper-buttons">
                <button class="swiper-prev category-carousel-prev btn btn-yellow swiper-button-disabled" disabled=""
                  tabindex="-1" aria-label="Previous slide" aria-controls="swiper-wrapper-d11a51234979a3c0"
                  aria-disabled="true">❮</button>
                <button class="swiper-next category-carousel-next btn btn-yellow" tabindex="0" aria-label="Next slide"
                  aria-controls="swiper-wrapper-d11a51234979a3c0" aria-disabled="false">❯</button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">

          <div class="category-carousel swiper swiper-initialized swiper-horizontal">
            <div class="swiper-wrapper" id="swiper-wrapper-d11a51234979a3c0" aria-live="polite">
              <a href="comprar.php?categoria=lana" class="nav-link category-item swiper-slide swiper-slide-active"
                style="width: 315.75px; margin-right: 30px;" role="group" aria-label="1 / 12">
                <img src="/public/images/categoria_producto/lana_alpaca.png" alt="imagen_categoria">
                <h3 class="category-title">Lana de Alpaca</h3>
              </a>
              <a href="comprar.php?categoria=Ropa para Adultos" class="nav-link category-item swiper-slide swiper-slide-next"
                style="width: 315.75px; margin-right: 30px;" role="group" aria-label="2 / 12">
                <img src="/public/images/categoria_producto/prendas_vestir.png" alt="imagen_categoria">
                <h3 class="category-title">Ropa para adultos</h3>
              </a>
              <a href="comprar.php?categoria=Accesorios" class="nav-link category-item swiper-slide" style="width: 315.75px; margin-right: 30px;"
                role="group" aria-label="3 / 12">
                <img src="/public/images/categoria_producto/accesorios.png" alt="imagen_categoria">
                <h3 class="category-title">Accesorios</h3>
              </a>
              <a href="comprar.php?categoria=Decoración para el Hogar" class="nav-link category-item swiper-slide" style="width: 315.75px; margin-right: 30px;"
                role="group" aria-label="4 / 12">
                <img src="/public/images/categoria_producto/decoracion_hogar.png" alt="imagen_categoria">
                <h3 class="category-title">Decoración del Hogar</h3>
              </a>
              <a href="comprar.php?categoria=Juguetes y Peluches" class="nav-link category-item swiper-slide" style="width: 315.75px; margin-right: 30px;"
                role="group" aria-label="5 / 12">
                <img src="/public/images/categoria_producto/juguetes_peluches.png" alt="imagen_categoria">
                <h3 class="category-title">Juguetes y Peluches</h3>
              </a>
              <a href="comprar.php?categoria=Ropa para Ninos" class="nav-link category-item swiper-slide" style="width: 315.75px; margin-right: 30px;"
                role="group" aria-label="5 / 12">
                <img src="/public/images/categoria_producto/ropa_niño.png" alt="imagen_categoria">
                <h3 class="category-title">Ropa para Niños</h3>
              </a>
            </div>
            <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
          </div>

        </div>
      </div>
    </div>
  </section>



  <!---------------------------- Seccion 3 (Mas vendidos) ------------------------->
  <!-- ================================================================================ -->
  <?php
  // Incluye el archivo que carga los productos más vendidos
  $productos_mas_vendidos = include '../controller/insertar/mas_vendido.php';
  ?>

  <section class="py-5 overflow-hidden">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="section-header d-flex flex-wrap justify-content-between mb-5">
            <h2 class="section-title">Más vendidos</h2>
            <div class="d-flex align-items-center">
              <a href="#" class="btn-link text-decoration-none">Ver Siguiente →</a>
              <div class="swiper-buttons">
                <button class="swiper-prev brand-carousel-prev btn btn-yellow" aria-label="Previous slide">❮</button>
                <button class="swiper-next brand-carousel-next btn btn-yellow" aria-label="Next slide">❯</button>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          <div class="brand-carousel swiper">
            <div class="swiper-wrapper">
              <?php if (!empty($productos_mas_vendidos)): ?>
                <?php foreach ($productos_mas_vendidos as $producto): ?>
                  <div class="swiper-slide h-100">
                    <div class="card h-100 d-flex flex-column mb-3 p-3 rounded-4 shadow border-0">
                      <div class="row g-0 h-100 align-items-stretch">
                        <div class="col-md-4 d-flex align-items-stretch">
                          <!-- Ruta de imagen -->
                          <img src="/public/images/producto/<?php echo htmlspecialchars($producto['imagen']); ?>"
                            class="img-fluid rounded w-100"
                            style="height: 150px; object-fit: cover;"
                            alt="<?php echo htmlspecialchars($producto['marca']); ?>" loading="lazy">
                        </div>
                        <div class="col-md-8 d-flex align-items-stretch">
                          <div class="card-body py-0 d-flex flex-column justify-content-center h-100">
                            <p class="text-muted mb-0 fw-bold"><?php echo htmlspecialchars($producto['marca']); ?></p>
                            <span class="price">S/ <?php echo number_format($producto['precio'], 2); ?></span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php endforeach; ?>
              <?php else: ?>
                <p>No hay productos más vendidos disponibles</p>
              <?php endif; ?>
            </div>
            <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
          </div>
        </div>
      </div>
    </div>
  </section>




  <!--------------------------- Seccion 4 (Prendas de vestir) ------------------------------->
  <!-- ================================================================================ -->
  <section class="py-5">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="bootstrap-tabs product-tabs">
            <div class="tabs-header d-flex justify-content-between border-bottom my-5">
              <h3>Nueva Colección de Productos</h3>
              <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                  <a href="#nav-adultos" class="nav-link text-uppercase fs-6 active" data-bs-toggle="tab" role="tab">Ropa para adultos</a>
                  <a href="#nav-accesorios" class="nav-link text-uppercase fs-6" data-bs-toggle="tab" role="tab">Accesorios</a>
                  <a href="#nav-decoracion" class="nav-link text-uppercase fs-6" data-bs-toggle="tab" role="tab">Decoración para el Hogar</a>
                </div>
              </nav>
            </div>

            <div class="tab-content" id="nav-tabContent">
              <div class="tab-pane fade show active" id="nav-adultos" role="tabpanel">
                <div class="product-grid row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5">
                  <?php
                  $productos_adultos = array_filter($productos, function ($producto) {
                    return $producto['categoria'] === 'Ropa para Adultos';
                  });

                  if (!empty($productos_adultos)):
                    foreach ($productos_adultos as $producto):
                  ?>
                      <div class="col">
                        <div class="product-item">
                          <a href="deseos.php" class="btn-wishlist">
                            <svg width="24" height="24">
                              <use xlink:href="#heart"></use>
                            </svg>
                          </a>
                          <figure>
                            <a href="comprar.php" title="<?php echo htmlspecialchars($producto['descripcion_producto']); ?>">
                              <img src="/public/images/producto/<?php echo htmlspecialchars($producto['imagen_producto']); ?>"
                                alt="Imagen de <?php echo htmlspecialchars($producto['descripcion_producto']); ?>"
                                class="tab-image">
                            </a>
                          </figure>
                          <h3><?php echo htmlspecialchars($producto['marca_producto']); ?></h3>
                          <span class="qty"><?php echo htmlspecialchars($producto['stock_producto']); ?> unid</span>
                          <span class="price">S/ <?php echo number_format($producto['precio_producto'], 2); ?></span>
                        </div>
                      </div>
                  <?php
                    endforeach;
                  else:
                    echo "<p>No hay productos disponibles para esta categoría.</p>";
                  endif;
                  ?>
                </div>
              </div>

              <!-- Tab Accesorios -->
              <div class="tab-pane fade" id="nav-accesorios" role="tabpanel">
                <div class="product-grid row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5">
                  <?php
                  // Filtrar productos para "Accesorios"
                  $productos_accesorios = array_filter($productos, function ($producto) {
                    return $producto['categoria'] === 'Accesorios';
                  });

                  if (!empty($productos_accesorios)):
                    foreach ($productos_accesorios as $producto):
                  ?>
                      <div class="col">
                        <div class="product-item">
                          <a href="deseos.php" class="btn-wishlist">
                            <svg width="24" height="24">
                              <use xlink:href="#heart"></use>
                            </svg>
                          </a>
                          <figure>
                            <a href="comprar.php" title="<?php echo htmlspecialchars($producto['descripcion_producto']); ?>">
                              <img src="/public/images/producto/<?php echo htmlspecialchars($producto['imagen_producto']); ?>"
                                alt="Imagen de <?php echo htmlspecialchars($producto['descripcion_producto']); ?>"
                                class="tab-image">
                            </a>
                          </figure>
                          <h3><?php echo htmlspecialchars($producto['marca_producto']); ?></h3>
                          <span class="qty"><?php echo htmlspecialchars($producto['stock_producto']); ?> unid</span>
                          <span class="price">S/ <?php echo number_format($producto['precio_producto'], 2); ?></span>
                        </div>
                      </div>
                  <?php
                    endforeach;
                  else:
                    echo "<p>No hay productos disponibles para esta categoría.</p>";
                  endif;
                  ?>
                </div>
              </div>
              <div class="tab-pane fade" id="nav-decoracion" role="tabpanel">
                <div class="product-grid row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5">
                  <?php
                  $productos_decoracion = array_filter($productos, function ($producto) {
                    return $producto['categoria'] === 'Decoración para el Hogar';
                  });

                  if (!empty($productos_decoracion)):
                    foreach ($productos_decoracion as $producto):
                  ?>
                      <div class="col">
                        <div class="product-item">
                          <a href="deseos.php" class="btn-wishlist">
                            <svg width="24" height="24">
                              <use xlink:href="#heart"></use>
                            </svg>
                          </a>
                          <figure>
                            <a href="comprar.php" title="<?php echo htmlspecialchars($producto['descripcion_producto']); ?>">
                              <img src="/public/images/producto/<?php echo htmlspecialchars($producto['imagen_producto']); ?>"
                                alt="Imagen de <?php echo htmlspecialchars($producto['descripcion_producto']); ?>"
                                class="tab-image">
                            </a>
                          </figure>
                          <h3><?php echo htmlspecialchars($producto['marca_producto']); ?></h3>
                          <span class="qty"><?php echo htmlspecialchars($producto['stock_producto']); ?> unid</span>
                          <span class="price">S/ <?php echo number_format($producto['precio_producto'], 2); ?></span>
                        </div>
                      </div>
                  <?php
                    endforeach;
                  else:
                    echo "<p>No hay productos disponibles para esta categoría.</p>";
                  endif;
                  ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>




  <!--------------------- Seccion 5 (Obten tu cupon de regalo) ------------------------->
  <!-- ================================================================================ -->
  <section class="py-5">
    <div class="container-fluid">
      <div class="row">

        <div class="col-md-6">
          <div class="banner-ad bg-danger mb-3">
            <div class="banner-content p-5">

              <div class="categories text-primary fs-3 fw-bold">Compras superiores a 100</div>
              <h3 class="banner-title">Raspa y gana</h3>
              <p>Cada vez q realizes una compra superior a ese monto podras obtener 1 raspa y gana</p>
              <a href="" class="btn btn-dark text-uppercase">Usar</a>

            </div>

          </div>
        </div>
        <div class="col-md-6">
          <div class="banner-ad bg-info">
            <div class="banner-content p-5">

              <div class="categories text-primary fs-3 fw-bold">Compras superiores a 200</div>
              <h3 class="banner-title">Raspa y gana</h3>
              <p>Cada vez q realizes una compra superior a ese monto podras obtener 2 raspa y gana</p>
              <a href="" class="btn btn-dark text-uppercase">Usar</a>

            </div>

          </div>
        </div>

      </div>
    </div>
  </section>




  <!--------------------------- Seccion 6 (Nueva coleccion de Lana de Alpaca) ----------------------------->
  <!-- ================================================================================ -->
  <section class="py-5 overflow-hidden">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="section-header d-flex flex-wrap justify-content-between my-5">
            <h2 class="section-title">Nueva Colección de Lana</h2>
            <div class="d-flex align-items-center">
              <a href="javascript:void(0)" id="verSiguiente" class="btn-link text-decoration-none">Ver siguiente →</a>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="products-carousel swiper swiper-initialized swiper-horizontal swiper-backface-hidden">
            <div class="swiper-wrapper" id="swiper-wrapper-9e6b83e3f86d95fd" aria-live="polite">
              <?php
              // Filtrar productos para la categoría "Lana de Alpaca"
              $productos_lana = array_filter($productos, function ($producto) {
                return $producto['categoria'] === 'lana';
              });

              if (!empty($productos_lana)):
                foreach ($productos_lana as $producto): ?>
                  <div class="product-item swiper-slide swiper-slide-active" style="width: 315.75px; margin-right: 30px;" role="group" aria-label="1 / 8">
                    <a href="deseos.php" class="btn-wishlist">
                      <svg width="24" height="24">
                        <use xlink:href="#heart"></use>
                      </svg>
                    </a>
                    <figure>
                      <a href="comprar.php" title="<?php echo htmlspecialchars($producto['descripcion_producto']); ?>">
                        <img src="/public/images/producto/<?php echo htmlspecialchars($producto['imagen_producto']); ?>" alt="Product Thumbnail" class="tab-image">
                      </a>
                    </figure>
                    <h3><?php echo htmlspecialchars($producto['marca_producto']); ?></h3>
                    <span class="qty"><?php echo htmlspecialchars($producto['stock_producto']); ?> Unit</span>
                    <span class="price">S/ <?php echo number_format($producto['precio_producto'], 2); ?></span>
                  </div>
                <?php endforeach;
              else: ?>
                <p>No hay productos disponibles en esta categoría.</p>
              <?php endif; ?>
            </div>
            <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
          </div>
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