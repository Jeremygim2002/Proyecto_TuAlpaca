<?php
$productos = include '../controller/insertar/insertar_productos.php';

$categoria = $_GET['categoria'] ?? null;
$precio = $_GET['precio'] ?? null;
$orden = $_GET['orden'] ?? null;

if ($categoria) {
    $productos = array_filter($productos, function ($producto) use ($categoria) {
        return $producto['categoria'] === $categoria;
    });
}

if ($precio) {
    $productos = array_filter($productos, function ($producto) use ($precio) {
        $precio_producto = $producto['precio_producto'];
        if ($precio === '>150') {
            return $precio_producto > 150;
        } elseif ($precio === '100-150') {
            return $precio_producto >= 100 && $precio_producto <= 150;
        } elseif ($precio === '<100') {
            return $precio_producto < 100;
        }
        return true;
    });
}


if ($orden === 'low-high') {
    usort($productos, fn($a, $b) => $a['precio_producto'] <=> $b['precio_producto']);
} elseif ($orden === 'high-low') {
    usort($productos, fn($a, $b) => $b['precio_producto'] <=> $a['precio_producto']);
}


header('Content-Type: application/json');
echo json_encode(array_values($productos));
?>
