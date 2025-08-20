<?php

include '../libs/connection.php';


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


$result = mysqli_query($conexion_db, $sql);


$productos_mas_vendidos = [];

if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $productos_mas_vendidos[] = $row;
    }
} else {
    echo "No se encontraron productos más vendidos.";
}


mysqli_close($conexion_db);


return $productos_mas_vendidos;
?>
