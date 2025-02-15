<?php
session_start();
header('Content-Type: application/json');

if (!isset($_SESSION['user_id'])) {
    echo json_encode(['success' => false, 'error' => 'Usuario no autenticado']);
    exit();
}

include '../../libs/connection.php';

$data = json_decode(file_get_contents('php://input'), true);

if (isset($data['id_usuario'], $data['id_producto'], $data['cantidad'])) {
    $id_usuario = intval($data['id_usuario']);
    $id_producto = intval($data['id_producto']);
    $cantidad = intval($data['cantidad']);

    // Verificar si el producto ya está en el carrito del usuario
    $query = "SELECT * FROM carrito WHERE id_usuario = ? AND id_producto = ?";
    $stmt = $conexion_db->prepare($query);
    $stmt->bind_param('ii', $id_usuario, $id_producto);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Si el producto ya está en el carrito, actualiza la cantidad
        $update_query = "UPDATE carrito SET cantidad = cantidad + ? WHERE id_usuario = ? AND id_producto = ?";
        $update_stmt = $conexion_db->prepare($update_query);
        $update_stmt->bind_param('iii', $cantidad, $id_usuario, $id_producto);
        $success = $update_stmt->execute();
        file_put_contents('php://stderr', "Update carrito: " . ($success ? "Éxito" : "Error") . "\n");
    } else {
        // Insertar nuevo producto en el carrito
        $insert_query = "INSERT INTO carrito (id_usuario, id_producto, cantidad) VALUES (?, ?, ?)";
        $insert_stmt = $conexion_db->prepare($insert_query);
        $insert_stmt->bind_param('iii', $id_usuario, $id_producto, $cantidad);
        $success = $insert_stmt->execute();
        file_put_contents('php://stderr', "Insert carrito: " . ($success ? "Éxito" : "Error") . "\n");
    }

    // Obtener carrito actualizado
    $cart_query = "SELECT c.id_producto, c.cantidad, p.marca_producto, p.descripcion_producto, p.precio_producto 
                   FROM carrito c 
                   INNER JOIN producto p ON c.id_producto = p.id_producto 
                   WHERE c.id_usuario = ?";
    $cart_stmt = $conexion_db->prepare($cart_query);
    $cart_stmt->bind_param('i', $id_usuario);
    $cart_stmt->execute();
    $cart_result = $cart_stmt->get_result();

    $cart_items = [];
    while ($row = $cart_result->fetch_assoc()) {
        $cart_items[] = [
            'id' => $row['id_producto'],
            'marca' => $row['marca_producto'],
            'descripcion' => $row['descripcion_producto'],
            'precio' => $row['precio_producto'],
            'cantidad' => $row['cantidad']
        ];
    }

    echo json_encode(['success' => true, 'cart' => $cart_items]);
} else {
    echo json_encode(['success' => false, 'error' => 'Datos incompletos']);
}

$conexion_db->close();

?>
