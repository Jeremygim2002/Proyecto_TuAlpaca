<?php
header('Content-Type: application/json');
include '../../libs/connection.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['success' => false, 'error' => 'Método HTTP no permitido']);
    exit();
}

$id_usuario = intval($_POST['id_usuario'] ?? 0);
$nombre = trim($_POST['nombre'] ?? '');
$email = trim($_POST['email'] ?? '');
$direccion = trim($_POST['direccion'] ?? '');

if ($id_usuario <= 0 || empty($nombre) || empty($email) || empty($direccion)) {
    echo json_encode(['success' => false, 'error' => 'Datos incompletos o inválidos']);
    exit();
}

$query = "UPDATE usuario SET nombre = ?, email = ?, direccion = ? WHERE id_usuario = ?";
$stmt = $conexion_db->prepare($query);

if ($stmt) {
    $stmt->bind_param('sssi', $nombre, $email, $direccion, $id_usuario);
    if ($stmt->execute()) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'error' => 'Error al ejecutar la consulta']);
    }
    $stmt->close();
} else {
    echo json_encode(['success' => false, 'error' => 'Error al preparar la consulta']);
}

$conexion_db->close();
?>
