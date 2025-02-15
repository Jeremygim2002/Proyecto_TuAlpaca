<?php
// Conexión a la base de datos
include '../libs/connection.php';

// Consulta SQL para seleccionar 8 productos aleatorios de cualquier categoría
$sql = "
    SELECT 
        id_producto AS id,
        imagen_producto AS imagen,
        marca_producto AS marca,
        precio_producto AS precio 
    FROM producto 
    ORDER BY RAND() 
    LIMIT 8
";

// Ejecutar la consulta
$result = mysqli_query($conexion_db, $sql);

// Almacenar los resultados en un arreglo
$productos_mas_vendidos = [];

if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $productos_mas_vendidos[] = $row;
    }
} else {
    echo "No se encontraron productos más vendidos.";
}

// Cerrar la conexión
mysqli_close($conexion_db);

// Devolver los datos para su uso en el HTML
return $productos_mas_vendidos;
?>
