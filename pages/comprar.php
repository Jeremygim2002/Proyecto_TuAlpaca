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
                <h1 class="page-title pb-2">Comprar</h1>
                <nav class="breadcrumb fs-6">
                    <a class="breadcrumb-item nav-link" href="#">Home</a>
                    <span class="breadcrumb-item active" aria-current="page">Comprar</span>
                </nav>
            </div>
        </div>
    </section>





    <!------------------ Seccion 2 (Comprar) ---------------------->
    <!-- ======================================================= -->
    <?php
    $productos = include '../controller/insertar/insertar_productos.php';

    $categoria = $_GET['categoria'] ?? null;
    $precio = $_GET['precio'] ?? null;
    $orden = $_GET['orden'] ?? null;

    if ($categoria) {
        $productos = array_filter($productos, function ($producto) use ($categoria) {
            return $producto['categoria'] === $categoria;
        });
    }

    if ($precio) {
        $productos = array_filter($productos, function ($producto) use ($precio) {
            $precio_producto = $producto['precio_producto'];
            if ($precio === '>150') {
                return $precio_producto > 150;
            } elseif ($precio === '100-150') {
                return $precio_producto >= 100 && $precio_producto <= 150;
            } elseif ($precio === '<100') {
                return $precio_producto < 100;
            }
            return true;
        });
    }


    if ($orden === 'low-high') {
        usort($productos, fn($a, $b) => $a['precio_producto'] <=> $b['precio_producto']);
    } elseif ($orden === 'high-low') {
        usort($productos, fn($a, $b) => $b['precio_producto'] <=> $a['precio_producto']);
    }
    ?>
    <div class="shopify-grid">
        <div class="container-fluid">
            <div class="row g-5">
                <aside class="col-md-2">
                    <div class="sidebar">
                        <div class="widget-product-categories pt-5">
                            <h5 class="widget-title">Categorías</h5>
                            <ul class="product-categories sidebar-list list-unstyled">
                                <li class="cat-item">
                                    <a href="?categoria=" class="nav-link">Todo</a>
                                </li>
                                <li class="cat-item">
                                    <a href="?categoria=Ropa para Adultos" class="nav-link">Ropa para Adultos</a>
                                </li>
                                <li class="cat-item">
                                    <a href="?categoria=Accesorios" class="nav-link">Accesorios</a>
                                </li>
                                <li class="cat-item">
                                    <a href="?categoria=Decoración para el Hogar" class="nav-link">Hogar</a>
                                </li>
                                <li class="cat-item">
                                    <a href="?categoria=Juguetes y Peluches" class="nav-link">Juguetes y Peluches</a>
                                </li>
                                <li class="cat-item">
                                    <a href="?categoria=Ropa para Niños" class="nav-link">Ropa para Niños</a>
                                </li>
                                <li class="cat-item">
                                    <a href="?categoria=lana" class="nav-link">Lana</a>
                                </li>
                            </ul>
                        </div>
                        <div class="widget-product-categories pt-5">
                            <h5 class="widget-title">Precio</h5>
                            <ul class="product-categories sidebar-list list-unstyled">
                                <li class="cat-item">
                                    <a href="?precio=>150" class="nav-link">> 150</a>
                                </li>
                                <li class="cat-item">
                                    <a href="?precio=100-150" class="nav-link">100 - 150</a>
                                </li>
                                <li class="cat-item">
                                    <a href="?precio=<100" class="nav-link">
                                        < 100</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </aside>

                <!-- Main content -->
                <main class="col-md-10">
                    <div class="filter-shop d-flex justify-content-between">
                        <div class="showing-product">
                            <p>Mostrando <?php echo count($productos); ?> resultados</p>
                        </div>
                        <div class="sort-by">
                            <select id="input-sort" class="form-control" onchange="location = this.value;">
                                <option value="?orden=">Por Defecto</option>
                                <option value="?orden=low-high" <?php if ($orden === 'low-high') echo 'selected'; ?>>Precio (bajo-alto)</option>
                                <option value="?orden=high-low" <?php if ($orden === 'high-low') echo 'selected'; ?>>Precio (alto-bajo)</option>
                            </select>
                        </div>
                    </div>

                    <div class="product-grid row row-cols-sm-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4">
                        <?php if (!empty($productos)): ?>
                            <?php foreach ($productos as $producto): ?>
                                <div class="col">
                                    <div class="product-item">
                                        <a href="#" class="btn-wishlist">
                                            <svg width="24" height="24">
                                                <use xlink:href="#heart"></use>
                                            </svg>
                                        </a>
                                        <figure>
                                            <a href="producto_unitario.php?id_producto=<?php echo $producto['id_producto']; ?>"
                                                title="<?php echo htmlspecialchars($producto['marca_producto']); ?>">
                                                <img src="../public/images/producto/<?php echo htmlspecialchars($producto['imagen_producto']); ?>"
                                                    alt="Imagen de <?php echo htmlspecialchars($producto['marca_producto']); ?>">
                                            </a>

                                        </figure>
                                        <h3><?php echo htmlspecialchars($producto['marca_producto']); ?></h3>
                                        <span class="qty"><?php echo htmlspecialchars($producto['stock_producto']); ?> unid</span>
                                        <span class="price">S/ <?php echo number_format($producto['precio_producto'], 2); ?></span>
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="input-group product-qty">
                                                <span class="input-group-btn">
                                                    <button type="button" class="quantity-left-minus btn btn-danger btn-number" data-type="minus">
                                                        <svg width="16" height="16">
                                                            <use xlink:href="#minus"></use>
                                                        </svg>
                                                    </button>
                                                </span>
                                                <input type="text" name="quantity" class="form-control input-number quantity" value="1">
                                                <span class="input-group-btn">
                                                    <button type="button" class="quantity-right-plus btn btn-success btn-number" data-type="plus">
                                                        <svg width="16" height="16">
                                                            <use xlink:href="#plus"></use>
                                                        </svg>
                                                    </button>
                                                </span>
                                            </div>
                                            <a href="javascript:void(0);"
                                                class="nav-link add-to-cart"
                                                data-id="<?php echo $producto['id_producto']; ?>"
                                                data-marca="<?php echo htmlspecialchars($producto['marca_producto']); ?>"
                                                data-descripcion="<?php echo htmlspecialchars($producto['descripcion_producto']); ?>"
                                                data-precio="<?php echo $producto['precio_producto']; ?>">
                                                Añadir
                                                <svg width="18" height="18">
                                                    <use xlink:href="#cart"></use>
                                                </svg>
                                            </a>

                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <p>No hay productos disponibles para mostrar.</p>
                        <?php endif; ?>
                    </div>
                </main>
            </div>
        </div>
    </div>


    <script src="/public/js/cart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const addToCartButtons = document.querySelectorAll('.add-to-cart');

            addToCartButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const product = {
                        id: this.dataset.id,
                        marca: this.dataset.marca,
                        descripcion: this.dataset.descripcion,
                        precio: parseFloat(this.dataset.precio),
                        cantidad: 1
                    };
                    addToCartServer(product);
                });
            });

            function addToCartServer(product) {
                const userId = <?php echo $_SESSION['user_id']; ?>;

                fetch('../controller/comprar/add_to_cart.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({
                            id_usuario: userId,
                            id_producto: product.id,
                            cantidad: product.cantidad
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            localStorage.setItem('cart', JSON.stringify(data.cart));
                            updateCartDisplay(); 
                            Swal.fire({
                                icon: 'success',
                                title: 'Producto añadido',
                                text: `${product.marca} ha sido añadido al carrito.`,
                                showConfirmButton: false,
                                timer: 1500
                            });
                        } else {
                            console.error('Error al añadir el producto:', data.error);
                        }
                    })
                    .catch(error => {
                        console.error('Error de red:', error);
                    });
            }

            updateCartDisplay();
        });
    </script>







    <?php include '../templates/descuento.php'; ?>
    <?php include '../templates/beneficios.php'; ?>
    <?php include '../templates/footer.php'; ?>
    <?php include '../templates/footer_scripts.php'; ?>
</body>

</html>