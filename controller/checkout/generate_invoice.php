<?php
session_start();
include '../../libs/connection.php';
require_once '../../tcpdf/tcpdf.php'; // Asegúrate de que esta ruta sea correcta

// Verificar si el usuario está autenticado
if (!isset($_SESSION['user_id'])) {
    echo json_encode(['success' => false, 'message' => 'Usuario no autenticado']);
    exit();
}

$id_venta = $_GET['id_venta']; // El ID de la venta se pasa como parámetro GET

try {
    // Obtener detalles de la venta
    $query_venta = "
        SELECT v.id_venta, v.fecha, v.monto_total, u.nombre, u.email, 
               d.departamento, d.distrito, d.direccion, d.n_direccion, d.telefono
        FROM venta v
        JOIN usuario u ON v.id_usuario = u.id_usuario
        JOIN direccion d ON v.id_direccion = d.id_direccion
        WHERE v.id_venta = ?";
    $stmt_venta = $conexion_db->prepare($query_venta);
    $stmt_venta->bind_param('i', $id_venta);
    $stmt_venta->execute();
    $result_venta = $stmt_venta->get_result();
    $venta = $result_venta->fetch_assoc();

    if (!$venta) {
        throw new Exception("No se encontró la venta con ID: $id_venta");
    }

    // Obtener detalles de los productos en la venta
    $query_detalle = "
        SELECT p.marca_producto, p.descripcion_producto, dv.cantidad, dv.precio_unitario 
        FROM detalle_venta dv
        JOIN producto p ON dv.id_producto = p.id_producto
        WHERE dv.id_venta = ?";
    $stmt_detalle = $conexion_db->prepare($query_detalle);
    $stmt_detalle->bind_param('i', $id_venta);
    $stmt_detalle->execute();
    $result_detalle = $stmt_detalle->get_result();

    // Crear PDF con TCPDF
    $pdf = new TCPDF();
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Tu Alpaca');
    $pdf->SetTitle('Boleta de Venta');
    $pdf->SetSubject('Detalle de la Venta');
    $pdf->SetKeywords('boleta, venta, compra');

    $pdf->AddPage();

    // Encabezado
    $html = '<h1 style="text-align: center;">Boleta de Venta</h1>';
    $html .= '<p><strong>ID Venta:</strong> ' . $venta['id_venta'] . '</p>';
    $html .= '<p><strong>Fecha:</strong> ' . $venta['fecha'] . '</p>';
    $html .= '<p><strong>Cliente:</strong> ' . $venta['nombre'] . '</p>';
    $html .= '<p><strong>Email:</strong> ' . $venta['email'] . '</p>';
    $html .= '<p><strong>Dirección:</strong> ' . $venta['direccion'] . ' N° ' . $venta['n_direccion'] . ', ' . $venta['distrito'] . ', ' . $venta['departamento'] . '</p>';
    $html .= '<p><strong>Teléfono:</strong> ' . $venta['telefono'] . '</p>';

    // Detalles de los productos
    $html .= '<h2>Productos</h2>';
    $html .= '<table border="1" cellpadding="5" style="width: 100%; border-collapse: collapse;">
                <thead>
                    <tr style="background-color: #f2f2f2;">
                        <th>Marca</th>
                        <th>Descripción</th>
                        <th>Cantidad</th>
                        <th>Precio Unitario</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>';
    $total = 0;
    while ($detalle = $result_detalle->fetch_assoc()) {
        $subtotal = $detalle['cantidad'] * $detalle['precio_unitario'];
        $total += $subtotal;
        $html .= '<tr>
                    <td>' . $detalle['marca_producto'] . '</td>
                    <td>' . $detalle['descripcion_producto'] . '</td>
                    <td>' . $detalle['cantidad'] . '</td>
                    <td>S/ ' . number_format($detalle['precio_unitario'], 2) . '</td>
                    <td>S/ ' . number_format($subtotal, 2) . '</td>
                  </tr>';
    }
    $html .= '</tbody>
            </table>';
    $html .= '<h2>Total: S/ ' . number_format($venta['monto_total'], 2) . '</h2>';

    // Agregar contenido al PDF
    $pdf->writeHTML($html, true, false, true, false, '');

    // Ruta de guardado del PDF
    $pdf_directory = __DIR__ . '/../../public/pdf/';
    if (!is_dir($pdf_directory)) {
        mkdir($pdf_directory, 0777, true);
    }
    $file_name = 'boleta_venta_' . $id_venta . '.pdf';
    $file_path = $pdf_directory . $file_name;

    // Guardar el PDF
    $pdf->Output($file_path, 'F');

    // Responder con la ruta del PDF generado
    if (file_exists($file_path)) {
        echo json_encode(['success' => true, 'pdf_path' => '/public/pdf/' . $file_name]);
    } else {
        throw new Exception('No se pudo generar el PDF.');
    }
} catch (Exception $e) {
    echo json_encode(['success' => false, 'message' => $e->getMessage()]);
}

$stmt_venta->close();
$stmt_detalle->close();
$conexion_db->close();
?>
