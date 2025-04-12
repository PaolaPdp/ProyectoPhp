<!DOCTYPE html>
<html lang="es">

<head>
    <title>Mostrar texto con PHP</title>
</head>

<body>

    <form method="post" action="index.php">
    <input type="text" name="nombre" placeholder="Nombre">
    <input type="text" name="unidadMedida" placeholder="Unidad de medida">
    <input type="number" name="CANTIDAD" placeholder="Cantidad">
    <input type="number" step="0.01" name="precioCompra" placeholder="Precio de compra">
    <input type="number" step="0.01" name="precioVenta" placeholder="Precio de venta">
    <textarea name="detalles" placeholder="Detalles"></textarea>
    <button type="submit" name="registrar" id="registrar" aria-required="true">Registrar Producto</button>
    </form> 



</html>