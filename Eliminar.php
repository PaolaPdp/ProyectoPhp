<?php
require_once 'include/funciones.php';
require_once 'include/bd.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['eliminar'])) {
    $id = intval($_POST['id']);

    $fun = new funciones($bd);
    $fun->eliminar($id);

    
    header('Location: Listado.php');
    exit();
    
} else {
    echo "No se recibió una solicitud válida.";
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
<!-- <div class="col-12">
        <a href="Listado.php" class="btn btn-secondary">Regresar</a>
                    
</div>     -->
</body>
</html>
