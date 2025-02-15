<?php
session_start();
header('Content-Type: application/json');

if (!isset($_SESSION['user_id'])) {
    echo json_encode(['success' => false, 'error' => 'Usuario no autenticado']);
    exit();
}

include '../../libs/connection.php';
$id_usuario = intval($_SESSION['user_id']);

$query = "SELECT c.id_producto, c.cantidad, p.marca_producto, p.descripcion_producto, p.precio_producto, p.imagen_producto 
          FROM carrito c 
          INNER JOIN producto p ON c.id_producto = p.id_producto 
          WHERE c.id_usuario = ?";
$stmt = $conexion_db->prepare($query);
$stmt->bind_param('i', $id_usuario);
$stmt->execute();
$result = $stmt->get_result();

$cart_items = [];
while ($row = $result->fetch_assoc()) {
    $cart_items[] = [
        'id' => $row['id_producto'],
        'marca' => $row['marca_producto'],
        'descripcion' => $row['descripcion_producto'],
        'precio' => $row['precio_producto'],
        'imagen' => $row['imagen_producto'],
        'cantidad' => $row['cantidad']
    ];
}

echo json_encode(['success' => true, 'cart' => $cart_items]);

$conexion_db->close();
?>


