<?php
header('Content-Type: application/json');
include '../../libs/connection.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['success' => false, 'error' => 'Método HTTP no permitido']);
    exit();
}

// Validar datos enviados
$marca_producto = trim($_POST['marca_producto'] ?? '');
$descripcion_producto = trim($_POST['descripcion_producto'] ?? '');
$precio_producto = floatval($_POST['precio_producto'] ?? 0);
$stock_producto = intval($_POST['stock_producto'] ?? 0);
$id_categoria_producto = intval($_POST['id_categoria_producto'] ?? 0);

if (empty($marca_producto) || empty($descripcion_producto) || $precio_producto <= 0 || $stock_producto <= 0 || $id_categoria_producto <= 0) {
    echo json_encode(['success' => false, 'error' => 'Datos inválidos o incompletos']);
    exit();
}

// Insertar producto
$query = "INSERT INTO producto (marca_producto, descripcion_producto, precio_producto, stock_producto, id_categoria_producto)
          VALUES (?, ?, ?, ?, ?)";
$stmt = $conexion_db->prepare($query);

if ($stmt) {
    $stmt->bind_param('ssdii', $marca_producto, $descripcion_producto, $precio_producto, $stock_producto, $id_categoria_producto);
    if ($stmt->execute()) {
        echo json_encode(['success' => true, 'producto_id' => $stmt->insert_id]);
    } else {
        echo json_encode(['success' => false, 'error' => 'Error al insertar producto']);
    }
    $stmt->close();
} else {
    echo json_encode(['success' => false, 'error' => 'Error al preparar la consulta']);
}

$conexion_db->close();
?>
