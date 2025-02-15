<?php
session_start();
include '../../libs/connection.php';

$data = json_decode(file_get_contents('php://input'), true);
$id_venta = $data['id_venta'];
$productos = $data['productos']; 

$query = "INSERT INTO detalle_venta (id_venta, id_producto, cantidad, precio_unitario) VALUES (?, ?, ?, ?)";
$stmt = $conexion_db->prepare($query);

foreach ($productos as $producto) {
    $stmt->bind_param('iiid', $id_venta, $producto['id'], $producto['cantidad'], $producto['precio']);
    $stmt->execute();
}

if ($stmt->affected_rows > 0) {
 
    $id_usuario = $_SESSION['user_id'];
    $delete_cart_query = "DELETE FROM carrito WHERE id_usuario = ?";
    $delete_stmt = $conexion_db->prepare($delete_cart_query);
    $delete_stmt->bind_param('i', $id_usuario);
    $delete_stmt->execute();

    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'message' => 'Error al guardar los detalles de la venta']);
}

$stmt->close();
$conexion_db->close();

?>
