<?php 
require_once '../libs/session_check.php'; 
?>

<?php include '../templates/head.php'; ?>

</head>

<?php include '../templates/header.php'; ?>

<body>



  <!------------------ Seccion 1 (Titulo y descripcion) ---------------------->
  <!-- ==================================================================== -->


  <?php
  // Conexión a la base de datos
  include '../controller/insertar/detalle_producto.php';

  // Verifica si $producto está correctamente definido
  if (!isset($producto) || empty($producto)) {
    die("Error: No se pudo cargar el producto.");
  }

  ?>
  <section id="selling-product" class="single-product mt-0 mt-md-5">
    <div class="container-fluid">
      <nav class="breadcrumb">
        <a class="breadcrumb-item" href="#">Home</a>
        <span class="breadcrumb-item active" aria-current="page">Producto</span>
      </nav>
      <div class="row g-5">
        <div class="col-lg-7">
          <div class="row flex-column-reverse flex-lg-row">
            <div class="col-md-12 col-lg-2">
              <!-- product-thumbnail-slider -->
              <div class="swiper product-thumbnail-slider">
                <div class="swiper-wrapper">
                  <div class="swiper-slide">
                    <img src="../public/images/producto/<?php echo htmlspecialchars($producto['imagen_producto']); ?>" alt="imagen del producto" class="thumb-image img-fluid">
                  </div>
                  <div class="swiper-slide">
                    <img src="../public/images/producto/<?php echo htmlspecialchars($producto['imagen_producto']); ?>" alt="imagen del producto" class="thumb-image img-fluid">
                  </div>
                </div>
              </div>
              <!-- / product-thumbnail-slider -->
            </div>
            <div class="col-md-12 col-lg-10">
              <!-- product-large-slider -->
              <div class="swiper product-large-slider">
                <div class="swiper-wrapper">
                  <div class="swiper-slide">
                    <div class="image-zoom" data-scale="2.5" data-image="<?php echo htmlspecialchars($producto['imagen_producto']); ?>">
                      <img src="../public/images/producto/<?php echo htmlspecialchars($producto['imagen_producto']); ?>" alt="Imagen del producto" class="img-fluid">
                    </div>
                  </div>
                  <div class="swiper-slide">
                    <div class="image-zoom" data-scale="2.5" data-image="<?php echo htmlspecialchars($producto['imagen_producto']); ?>">
                      <img src="../public/images/producto/<?php echo htmlspecialchars($producto['imagen_producto']); ?>" alt="Imagen del producto" class="img-fluid">
                    </div>
                  </div>
                </div>
                <div class="swiper-pagination"></div>
              </div>
              <!-- / product-large-slider -->
            </div>
          </div>
        </div>
        <div class="col-lg-5">
          <div class="product-info">
            <div class="element-header">
              <h2 itemprop="name" class="display-6"><?php echo htmlspecialchars($producto['marca_producto']); ?></h2>
            </div>
            <div class="product-price pt-3 pb-3">
              <strong class="text-primary display-6 fw-bold"> S/.
                <?php echo number_format($producto['precio_producto'], 2); ?>
              </strong>
            </div>
            <p><?php echo htmlspecialchars($producto['descripcion_producto']); ?></p>

            <div class="cart-wrap py-5">
              <div class="color-options product-select">
                <div class="color-toggle" data-option-index="0">
                  <h6 class="item-title text-uppercase text-dark">
                    Color de la fibra
                  </h6>

                  <ul class="select-list list-unstyled d-flex">
                    <li class="select-item pe-3" data-val="Green" title="Green">
                      <a href="#" class="btn btn-light active">
                        <?php echo htmlspecialchars($producto['color_fibra']); ?>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="swatch product-select" data-option-index="1">
                <h6 class="item-title text-uppercase text-dark">Categoria de la fibra</h6>
                <ul class="select-list list-unstyled d-flex">
                  <li data-value="S" class="select-item pe-3">
                    <a href="#" class="btn btn-light active">
                      <?php echo htmlspecialchars($producto['categoria_fibra']); ?>
                    </a>
                  </li>
                </ul>
              </div>
              <div class="product-quantity pt-3">
                <div class="stock-number text-dark">
                  <em>En stock: <?php echo intval($producto['stock_producto']); ?> unidades</em>
                </div>

                <div class="stock-button-wrap">

                  <div class="input-group product-qty" style="max-width: 150px;">
                    <span class="input-group-btn">
                      <button type="button" class="quantity-left-minus btn btn-light btn-number" data-type="minus" data-field="">
                        <svg width="16" height="16">
                          <use xlink:href="#minus"></use>
                        </svg>
                      </button>
                    </span>
                    <input type="text" id="quantity" name="quantity" class="form-control input-number text-center" value="1" min="1" max="100">
                    <span class="input-group-btn">
                      <button type="button" class="quantity-right-plus btn btn-light btn-number" data-type="plus" data-field="">
                        <svg width="16" height="16">
                          <use xlink:href="#plus"></use>
                        </svg>
                      </button>
                    </span>
                  </div>
                  <div class="qty-button d-flex flex-wrap pt-3">
                    <button type="submit" class="btn btn-primary py-3 px-4 text-uppercase me-3 mt-3">Comprar</button>
                    <button type="submit" name="add-to-cart" value="1269" class="btn btn-dark py-3 px-4 text-uppercase mt-3">Añadir al carrito</button>
                  </div>
                </div>
              </div>
            </div>
            <div class="meta-product py-2">
              <div class="meta-item d-flex align-items-baseline">
                <h6 class="item-title no-margin pe-2">Código: </h6>
                <ul class="select-list list-unstyled d-flex">
                  <li data-value="S" class="select-item">
                    <?php echo intval($producto['id_producto']); ?>
                  </li>
                </ul>
              </div>
              <div class="meta-item d-flex align-items-baseline">
                <h6 class="item-title no-margin pe-2">Categoria:</h6>
                <ul class="select-list list-unstyled d-flex">
                  <li data-value="S" class="select-item">
                    <a href="">
                      <?php echo htmlspecialchars($producto['categoria_producto']); ?>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


  <!------------------ Seccion 2 (Mas descripcion del producto) ---------------------->
  <!-- ============================================================================ -->
  <section class="product-info-tabs py-5">
    <div class="container-fluid">
      <div class="row">
        <div class="d-flex flex-column flex-md-row align-items-start gap-5">
          <div class="nav flex-row flex-wrap flex-md-column nav-pills me-3 col-lg-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <button class="nav-link text-start active" id="v-pills-description-tab" data-bs-toggle="pill" data-bs-target="#v-pills-description" type="button" role="tab" aria-controls="v-pills-description" aria-selected="true">Datos de la Alpaca</button>
            <button class="nav-link text-start" id="v-pills-reviews-tab" data-bs-toggle="pill" data-bs-target="#v-pills-reviews" type="button" role="tab" aria-controls="v-pills-reviews" aria-selected="false">Datos del vendedor</button>
          </div>
          <div class="tab-content" id="v-pills-tabContent">
            <div class="tab-pane fade show active" id="v-pills-description" role="tabpanel" aria-labelledby="v-pills-description-tab" tabindex="0">
              <h5>Algunos datos son:</h5><br>
              <ul style="list-style-type:disc;" class="list-unstyled ps-4">
                <li> Nombre:
                  <?php echo htmlspecialchars($producto['nombre_alpaca']); ?>
                </li>
              </ul>
            </div>
            <div class="tab-pane fade" id="v-pills-reviews" role="tabpanel" aria-labelledby="v-pills-reviews-tab" tabindex="0">
              <h5>Algunos datos son:</h5><br>
              <div class="review-box d-flex flex-wrap">
                <div class="col-lg-6 d-flex flex-wrap gap-3">
                  <div class="col-md-2">
                    <div class="image-holder">
                      <img src="" alt="imagen_alpaca" class="img-fluid rounded-circle">
                    </div>
                  </div>
                  <div class="col-md-8">
                    <div class="review-content">
                      <div class="review-header">
                        <span class="author-name">Nombre del productor:</span>
                      </div>
                      <p>
                        <?php echo htmlspecialchars($producto['nombre_productor']); ?>
                      </p>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6 d-flex flex-wrap gap-3">
                  <div class="col-md-2">
                    <div class="image-holder">
                      <img src="" alt="imagen_productor" class="img-fluid rounded-circle">
                    </div>
                  </div>
                  <div class="col-md-8">
                    <div class="review-content">
                      <div class="review-header">
                        <span class="author-name">Tipo de productor:</span>
                      </div>
                      <p>
                        <?php echo htmlspecialchars($producto['tipo_productor']); ?>
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
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