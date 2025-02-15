<?php
session_start();
header('Content-Type: application/json');

if (!isset($_SESSION['user_id'])) {
    echo json_encode(['success' => false, 'error' => 'Usuario no autenticado']);
    exit();
}

include '../../libs/connection.php';
$id_usuario = intval($_SESSION['user_id']);
$data = json_decode(file_get_contents('php://input'), true);
$id_producto = intval($data['id_producto']);

$query = "DELETE FROM carrito WHERE id_usuario = ? AND id_producto = ?";
$stmt = $conexion_db->prepare($query);
$stmt->bind_param('ii', $id_usuario, $id_producto);
$success = $stmt->execute();

echo json_encode(['success' => $success]);

$conexion_db->close();
?>

