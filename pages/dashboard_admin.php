<?php
session_start(); 


if (!isset($_SESSION['admin_email']) || $_SESSION['admin_email'] !== 'admin@gmail.com') {

    header("Location: ../pages/login_admin.php");
    exit();
}


include '../libs/connection.php';


$productos_query = "SELECT * FROM producto";
$productos_result = $conexion_db->query($productos_query);


$usuarios_query = "SELECT * FROM usuario";
$usuarios_result = $conexion_db->query($usuarios_query);



$ventas_query = "SELECT v.id_venta, u.nombre AS usuario, m.descripcion AS metodo_pago, d.direccion, v.fecha, v.monto_total
                 FROM venta v
                 JOIN usuario u ON v.id_usuario = u.id_usuario
                 JOIN metodo_pago m ON v.id_metodo_pago = m.id_metodo_pago
                 JOIN direccion d ON v.id_direccion = d.id_direccion";
$ventas_result = $conexion_db->query($ventas_query);
?>

<head>

    <?php include '../templates/head.php'; ?>

</head>

<?php include '../templates/header_admin.php'; ?>

<body>


    <div class="container-fluid">
        <div class="row">
            <!-- Barra lateral -->
            <nav class="col-md-3 col-lg-2 d-md-block bg-light sidebar">
                <div class="position-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" id="productos-tab" data-bs-toggle="tab" href="#productos">Productos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="usuarios-tab" data-bs-toggle="tab" href="#usuarios">Usuarios</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="ventas-tab" data-bs-toggle="tab" href="#ventas">Ventas</a>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- Contenido principal -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="tab-content" id="tabContent">
                    <!-- Tabla de Productos -->


                    <!-- Tabla de Productos -->
                    <div class="tab-pane fade show active" id="productos" role="tabpanel">
                        <h2 class="mt-4">Lista de Productos</h2>

                        <!-- Formulario para agregar productos -->
                        <form id="form-agregar-producto" class="mb-4">
                            <div class="row g-3">
                                <div class="col-md-4">
                                    <input type="text" class="form-control" name="marca_producto" placeholder="Marca del Producto" required>
                                </div>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" name="descripcion_producto" placeholder="Descripción" required>
                                </div>
                                <div class="col-md-2">
                                    <input type="number" class="form-control" name="precio_producto" placeholder="Precio" step="0.01" required>
                                </div>
                                <div class="col-md-2">
                                    <input type="number" class="form-control" name="stock_producto" placeholder="Stock" required>
                                </div>
                                <div class="col-md-3">
                                    <select class="form-select" name="id_categoria_producto" required>
                                        <option value="" selected disabled>Seleccionar Categoría</option>
                                        <?php
                                        $categorias_query = "SELECT id_categoria_producto, descripcion FROM categoria_producto";
                                        $categorias_result = $conexion_db->query($categorias_query);
                                        while ($categoria = $categorias_result->fetch_assoc()):
                                        ?>
                                            <option value="<?php echo $categoria['id_categoria_producto']; ?>">
                                                <?php echo $categoria['descripcion']; ?>
                                            </option>
                                        <?php endwhile; ?>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <button type="submit" class="btn btn-primary w-100">Agregar Producto</button>
                                </div>
                            </div>
                        </form>

                        <!-- Tabla de productos -->
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead class="table-primary">
                                    <tr>
                                        <th>ID</th>
                                        <th>Marca</th>
                                        <th>Descripción</th>
                                        <th>Precio</th>
                                        <th>Stock</th>
                                        <th>Categoría</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody id="tabla-productos">
                                    <?php while ($producto = $productos_result->fetch_assoc()): ?>
                                        <tr>
                                            <td><?php echo $producto['id_producto']; ?></td>
                                            <td><?php echo $producto['marca_producto']; ?></td>
                                            <td><?php echo $producto['descripcion_producto']; ?></td>
                                            <td>S/. <?php echo number_format($producto['precio_producto'], 2); ?></td>
                                            <td><?php echo $producto['stock_producto']; ?></td>
                                            <td><?php echo $producto['id_categoria_producto']; ?></td>
                                            <td>
                                                <button class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil"></i></button>
                                                <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                                            </td>
                                        </tr>
                                    <?php endwhile; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>



                    <!-- Tabla de Usuarios -->
                    <div class="tab-pane fade" id="usuarios" role="tabpanel">
                        <h2 class="mt-4">Lista de Usuarios</h2>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead class="table-success">
                                    <tr>
                                        <th>ID</th>
                                        <th>Nombre</th>
                                        <th>Email</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($usuario = $usuarios_result->fetch_assoc()): ?>
                                        <tr>
                                            <td><?php echo $usuario['id_usuario']; ?></td>
                                            <td><?php echo $usuario['nombre']; ?></td>
                                            <td><?php echo $usuario['email']; ?></td>
                                            <td>
                                                <button class="btn btn-sm btn-outline-primary" onclick="editarUsuario(<?php echo $usuario['id_usuario']; ?>)"><i class="bi bi-pencil"></i></button>
                                                <button class="btn btn-sm btn-outline-danger" onclick="eliminarUsuario(<?php echo $usuario['id_usuario']; ?>)"><i class="bi bi-trash"></i></button>
                                            </td>
                                        </tr>
                                    <?php endwhile; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Tabla de Ventas -->
                    <div class="tab-pane fade" id="ventas" role="tabpanel">
                        <h2 class="mt-4">Lista de Ventas</h2>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead class="table-info">
                                    <tr>
                                        <th>ID Venta</th>
                                        <th>Usuario</th>
                                        <th>Método de Pago</th>
                                        <th>Dirección</th>
                                        <th>Fecha</th>
                                        <th>Monto Total</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($venta = $ventas_result->fetch_assoc()): ?>
                                        <tr>
                                            <td><?php echo $venta['id_venta']; ?></td>
                                            <td><?php echo $venta['usuario']; ?></td>
                                            <td><?php echo $venta['metodo_pago']; ?></td>
                                            <td><?php echo $venta['direccion']; ?></td>
                                            <td><?php echo $venta['fecha']; ?></td>
                                            <td>S/. <?php echo number_format($venta['monto_total'], 2); ?></td>
                                            <td>
                                                <button class="btn btn-sm btn-outline-info" onclick="verDetalle(<?php echo $venta['id_venta']; ?>)">Ver Detalle</button>
                                            </td>
                                        </tr>
                                    <?php endwhile; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <!-- Modal para mostrar detalles de venta -->
    <div class="modal fade" id="detalleVentaModal" tabindex="-1" aria-labelledby="detalleVentaLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detalleVentaLabel">Detalle de Venta</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="table-info">
                                <tr>
                                    <th>ID Producto</th>
                                    <th>Marca</th>
                                    <th>Cantidad</th>
                                    <th>Precio Unitario</th>
                                </tr>
                            </thead>
                            <tbody id="detalle-venta-body">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="editarUsuarioModal" tabindex="-1" aria-labelledby="editarUsuarioLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editarUsuarioLabel">Editar Usuario</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="form-editar-usuario">
                        <input type="hidden" id="editar-id-usuario" name="id_usuario">
                        <div class="mb-3">
                            <label for="editar-nombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="editar-nombre" name="nombre" required>
                        </div>
                        <div class="mb-3">
                            <label for="editar-email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="editar-email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="editar-direccion" class="form-label">Dirección</label>
                            <input type="text" class="form-control" id="editar-direccion" name="direccion" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                    </form>
                </div>
            </div>
        </div>
    </div>





    <?php include '../templates/footer_admin.php'; ?>
    <?php include '../templates/footer_scripts.php'; ?>
    <script>
        history.pushState(null, null, location.href);
        window.onpopstate = function() {
            history.pushState(null, null, location.href);
        };




        document.getElementById('form-agregar-producto').addEventListener('submit', function(event) {
            event.preventDefault();

            const formData = new FormData(this);

            fetch('../controller/admin/insertar_producto.php', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert('Producto agregado correctamente');
                        const nuevaFila = `
                    <tr>
                        <td>${data.producto_id}</td>
                        <td>${formData.get('marca_producto')}</td>
                        <td>${formData.get('descripcion_producto')}</td>
                        <td>S/. ${parseFloat(formData.get('precio_producto')).toFixed(2)}</td>
                        <td>${formData.get('stock_producto')}</td>
                        <td>${formData.get('id_categoria_producto')}</td>
                        <td>
                            <button class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil"></i></button>
                            <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                        </td>
                    </tr>
                `;
                        document.getElementById('tabla-productos').insertAdjacentHTML('beforeend', nuevaFila);
                        this.reset(); 
                    } else {
                        alert(`Error: ${data.error}`);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Error al agregar el producto');
                });
        });




        history.pushState(null, null, location.href);
        window.onpopstate = function() {
            history.pushState(null, null, location.href);
        };


        function verDetalle(idVenta) {
            const modal = new bootstrap.Modal(document.getElementById('detalleVentaModal'));
            modal.show();

            const detalleVentaBody = document.getElementById('detalle-venta-body');
            detalleVentaBody.innerHTML = '<tr><td colspan="4">Cargando...</td></tr>';

            fetch(`../controller/admin/fetch_detalle_venta.php?id_venta=${idVenta}`)
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        const detalles = data.detalles;

                        detalleVentaBody.innerHTML = detalles.map(detalle => `
                        <tr>
                            <td>${detalle.id_producto}</td>
                            <td>${detalle.marca_producto}</td>
                            <td>${detalle.cantidad}</td>
                            <td>S/. ${parseFloat(detalle.precio_unitario).toFixed(2)}</td>
                        </tr>
                    `).join('');
                    } else {
                        detalleVentaBody.innerHTML = `<tr><td colspan="4">${data.error}</td></tr>`;
                    }
                })
                .catch(error => {
                    console.error('Error al cargar los detalles:', error);
                    detalleVentaBody.innerHTML = '<tr><td colspan="4">Error al cargar los detalles</td></tr>';
                });
        }



        function editarUsuario(idUsuario) {
            fetch(`../controller/admin/fetch_usuario.php?id_usuario=${idUsuario}`)
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        const usuario = data.usuario;
                        document.getElementById('editar-id-usuario').value = usuario.id_usuario;
                        document.getElementById('editar-nombre').value = usuario.nombre;
                        document.getElementById('editar-email').value = usuario.email;
                        document.getElementById('editar-direccion').value = usuario.direccion;

                        const modal = new bootstrap.Modal(document.getElementById('editarUsuarioModal'));
                        modal.show();
                    } else {
                        alert('Error al cargar los datos del usuario.');
                    }
                });
        }

        document.getElementById('form-editar-usuario').addEventListener('submit', function(event) {
            event.preventDefault();

            const formData = new FormData(this);
            fetch('../controller/admin/update_usuario.php', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert('Usuario actualizado correctamente.');
                        location.reload();
                    } else {
                        alert('Error al actualizar el usuario.');
                    }
                });
        });

        function eliminarUsuario(idUsuario) {
            if (!confirm('¿Estás seguro de que deseas eliminar este usuario?')) return;

            fetch(`../controller/admin/delete_usuario.php?id_usuario=${idUsuario}`, {
                    method: 'POST'
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert('Usuario eliminado correctamente.');
                        location.reload(); 
                    } else {
                        alert('Error al eliminar el usuario.');
                    }
                });
        }
    </script>



</body>

</html>