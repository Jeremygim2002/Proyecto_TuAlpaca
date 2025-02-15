<?php
// Incluir el archivo de productos
$productos = include '../controller/insertar/insertar_productos.php';

// Obtener filtros desde la solicitud AJAX
$categoria = $_GET['categoria'] ?? null;
$precio = $_GET['precio'] ?? null;
$orden = $_GET['orden'] ?? null;

// Filtrar por categoría
if ($categoria) {
    $productos = array_filter($productos, function ($producto) use ($categoria) {
        return $producto['categoria'] === $categoria;
    });
}

// Filtrar por rango de precio
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

// Ordenar los productos
if ($orden === 'low-high') {
    usort($productos, fn($a, $b) => $a['precio_producto'] <=> $b['precio_producto']);
} elseif ($orden === 'high-low') {
    usort($productos, fn($a, $b) => $b['precio_producto'] <=> $a['precio_producto']);
}

// Devolver los productos como JSON
header('Content-Type: application/json');
echo json_encode(array_values($productos));
?>
