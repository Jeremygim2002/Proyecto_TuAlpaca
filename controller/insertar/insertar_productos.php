<?php
// Incluir archivo de conexión a la base de datos
include '../libs/connection.php';

// Construir la consulta SQL base
$sql = "SELECT p.id_producto, p.imagen_producto, p.marca_producto, p.descripcion_producto, p.precio_producto, p.stock_producto, cp.descripcion AS categoria
        FROM producto p
        INNER JOIN categoria_producto cp ON p.id_categoria_producto = cp.id_categoria_producto";


// Ejecutar la consulta
$result = mysqli_query($conexion_db, $sql);

// Inicializar arreglo de productos
$productos = [];

// Verificar si la consulta fue exitosa
if ($result !== false && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $productos[] = [
            'id_producto' => $row['id_producto'],
            'imagen_producto' => $row['imagen_producto'],
            'marca_producto' => $row['marca_producto'],
            'descripcion_producto' => $row['descripcion_producto'],
            'precio_producto' => $row['precio_producto'],
            'stock_producto' => $row['stock_producto'],
            'categoria' => $row['categoria'],
        ];
    }
}

// Cerrar la conexión
mysqli_close($conexion_db);

// Devolver los productos
return $productos;
?>
