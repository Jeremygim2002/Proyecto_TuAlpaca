<?php
session_start();
include '../../libs/connection.php';

if (!isset($_SESSION['user_id'])) {
    echo json_encode(['success' => false, 'message' => 'Usuario no autenticado']);
    exit();
}

$data = json_decode(file_get_contents('php://input'), true);

$departamento = $data['departamento'];
$distrito = $data['distrito'];
$direccion = $data['direccion'];
$n_direccion = $data['n_direccion'];
$telefono = $data['telefono'];
$notas = $data['notas'];

$query = "INSERT INTO direccion (departamento, distrito, direccion, n_direccion, telefono, notas) VALUES (?, ?, ?, ?, ?, ?)";
$stmt = $conexion_db->prepare($query);
$stmt->bind_param('ssssss', $departamento, $distrito, $direccion, $n_direccion, $telefono, $notas);
$stmt->execute();

if ($stmt->affected_rows > 0) {
    $id_direccion = $stmt->insert_id;
    echo json_encode(['success' => true, 'id_direccion' => $id_direccion]);
} else {
    echo json_encode(['success' => false, 'message' => 'Error al guardar la dirección']);
}

$stmt->close();
$conexion_db->close();
?>
