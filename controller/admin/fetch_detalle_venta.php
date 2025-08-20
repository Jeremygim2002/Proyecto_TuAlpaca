<?php
session_start();
header('Content-Type: application/json');

if (!isset($_SESSION['admin_email']) || $_SESSION['admin_email'] !== 'admin@gmail.com') {
    echo json_encode(['success' => false, 'error' => 'No autorizado']);
    exit();
}

include '../../libs/connection.php';

$id_venta = isset($_GET['id_venta']) ? intval($_GET['id_venta']) : 0;

if ($id_venta <= 0) {
    echo json_encode(['success' => false, 'error' => 'ID de venta inválido']);
    exit();
}

$query = "SELECT dv.id_producto, dv.cantidad, dv.precio_unitario, p.marca_producto 
          FROM detalle_venta dv
          INNER JOIN producto p ON dv.id_producto = p.id_producto
          WHERE dv.id_venta = ?";
$stmt = $conexion_db->prepare($query);
$stmt->bind_param('i', $id_venta);
$stmt->execute();
$result = $stmt->get_result();

$detalles = [];
while ($row = $result->fetch_assoc()) {
    $detalles[] = $row;
}

if (empty($detalles)) {
    echo json_encode(['success' => false, 'error' => 'No se encontraron detalles para esta venta']);
} else {
    echo json_encode(['success' => true, 'detalles' => $detalles]);
}

$stmt->close();
$conexion_db->close();
?>
