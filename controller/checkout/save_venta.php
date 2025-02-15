<?php
session_start();
include '../../libs/connection.php';

if (!isset($_SESSION['user_id'])) {
    echo json_encode(['success' => false, 'message' => 'Usuario no autenticado']);
    exit();
}

$data = json_decode(file_get_contents('php://input'), true);
$id_usuario = $_SESSION['user_id'];
$id_metodo_pago = $data['id_metodo_pago'];
$id_direccion = $data['id_direccion'];
$fecha = date('Y-m-d');
$monto_total = $data['monto_total'];

$query = "INSERT INTO venta (id_usuario, id_metodo_pago, id_direccion, fecha, monto_total) VALUES (?, ?, ?, ?, ?)";
$stmt = $conexion_db->prepare($query);
$stmt->bind_param('iiisd', $id_usuario, $id_metodo_pago, $id_direccion, $fecha, $monto_total);
$stmt->execute();

if ($stmt->affected_rows > 0) {
    $id_venta = $stmt->insert_id;
    echo json_encode(['success' => true, 'id_venta' => $id_venta]);
} else {
    echo json_encode(['success' => false, 'message' => 'Error al guardar la venta']);
}

$stmt->close();
$conexion_db->close();
?>
