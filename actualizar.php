
<?php
require_once 'include/funciones.php';
require_once 'include/bd.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $cantidad = $_POST['CANTIDAD'];
    $precioCompra = $_POST['precioCompra'];
    $precioVenta = $_POST['precioVenta'];
    $detalles = $_POST['detalles'];

    $fun = new funciones($bd);
    $fun->actualizarProducto($id, $nombre, $cantidad, $precioCompra, $precioVenta, $detalles);

    header("Location: Listado.php");
    exit;
}
?>