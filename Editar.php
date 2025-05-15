<?php
require_once 'include/funciones.php';
require_once 'include/bd.php';

$id = $_GET['id'] ?? null;
if (!$id) {
    echo "ID no válido";
    exit;
}

$fun = new funciones($bd);
$producto = $fun->obtenerProducto($id);

if (!$producto) {
    echo "Producto no encontrado";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h3>Editar Producto</h3>
    <form action="actualizar.php" method="post">
        <input type="hidden" name="id" value="<?= $producto['id'] ?>">

        <label>Nombre:</label>
        <input type="text" name="nombre" value="<?= htmlspecialchars($producto['nombre']) ?>"><br>

        <label>Cantidad:</label>
        <input type="number" name="CANTIDAD" value="<?= $producto['CANTIDAD'] ?>"><br>

        <label>Precio Compra:</label>
        <input type="text" name="precioCompra" value="<?= $producto['precioCompra'] ?>"><br>

        <label>Precio Venta:</label>
        <input type="text" name="precioVenta" value="<?= $producto['precioVenta'] ?>"><br>

        <label>Detalles:</label>
        <input type="text" name="detalles" value="<?= htmlspecialchars($producto['detalles']) ?>"><br>

        <button type="submit">Actualizar</button>
    </form>
</body>
</html>
