<?php
header('Content-Type: application/json');
include '../../libs/connection.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['success' => false, 'error' => 'Método HTTP no permitido']);
    exit();
}

$id_usuario = intval($_POST['id_usuario'] ?? 0);

if ($id_usuario <= 0) {
    echo json_encode(['success' => false, 'error' => 'ID de usuario inválido']);
    exit();
}

$query = "DELETE FROM usuario WHERE id_usuario = ?";
$stmt = $conexion_db->prepare($query);

if ($stmt) {
    $stmt->bind_param('i', $id_usuario);
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
