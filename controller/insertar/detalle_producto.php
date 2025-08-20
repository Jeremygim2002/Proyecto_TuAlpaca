<?php
include_once '../libs/connection.php'; 


if (!isset($_GET['id_producto']) || empty($_GET['id_producto'])) {
    die("Error: No se especificó un producto válido.");
}
$id_producto = intval($_GET['id_producto']);


$query = "
    SELECT p.id_producto, p.marca_producto, p.descripcion_producto, p.imagen_producto, 
           p.precio_producto, p.stock_producto, cp.descripcion AS categoria_producto,
           cf.color AS color_fibra, ctf.descripcion AS categoria_fibra, 
           a.nombre AS nombre_alpaca, prod.nombre AS nombre_productor, 
           tp.descripcion AS tipo_productor
    FROM producto p
    LEFT JOIN categoria_producto cp ON p.id_categoria_producto = cp.id_categoria_producto
    LEFT JOIN fibra_alpaca fa ON p.id_fibra_alpaca = fa.id_fibra_alpaca
    LEFT JOIN color_fibra cf ON fa.id_color_fibra = cf.id_color_fibra
    LEFT JOIN categoria_fibra ctf ON fa.id_categoria_fibra = ctf.id_categoria_fibra
    LEFT JOIN alpaca a ON fa.id_alpaca = a.id_alpaca
    LEFT JOIN productor prod ON a.id_productor = prod.id_productor
    LEFT JOIN tipo_productor tp ON prod.id_tipo_productor = tp.id_tipo_productor
    WHERE p.id_producto = ?";


$stmt = $conexion_db->prepare($query);

if (!$stmt) {
    die("Error en la preparación de la consulta: " . $conexion_db->error);
}

$stmt->bind_param("i", $id_producto);
$stmt->execute();
$result = $stmt->get_result();


if ($result->num_rows === 0) {
    die("Error: Producto no encontrado.");
}
$producto = $result->fetch_assoc();


$stmt->close();
$conexion_db->close();
