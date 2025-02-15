<?php
header('Content-Type: application/json');
include '../../libs/connection.php';

if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    echo json_encode(['success' => false, 'error' => 'Método HTTP no permitido']);
    exit();
}

$id_usuario = intval($_GET['id_usuario'] ?? 0);

if ($id_usuario <= 0) {
    echo json_encode(['success' => false, 'error' => 'ID de usuario inválido']);
    exit();
}

$query = "SELECT * FROM usuario WHERE id_usuario = ?";
$stmt = $conexion_db->prepare($query);

if ($stmt) {
    $stmt->bind_param('i', $id_usuario);
    $stmt->execute();
    $result = $stmt->get_result();
    $usuario = $result->fetch_assoc();

    if ($usuario) {
        echo json_encode(['success' => true, 'usuario' => $usuario]);
    } else {
        echo json_encode(['success' => false, 'error' => 'Usuario no encontrado']);
    }
    $stmt->close();
} else {
    echo json_encode(['success' => false, 'error' => 'Error al preparar la consulta']);
}

$conexion_db->close();
?>
