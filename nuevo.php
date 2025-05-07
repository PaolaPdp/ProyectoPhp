<?php
    require_once 'include/funciones.php';
    require_once 'include/bd.php';    
    $registrar = $_POST['registrar'] ?? null;     
    $reg = new funciones($bd); // Pasamos la conexión a la clase funciones
?>
<!DOCTYPE html>
<html lang="es" class="h-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Empresa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link href="css/estilo.css" rel="stylesheet">
</head>

<body class="d-flex flex-column h-100">

    
    <!-- Begin page content -->
    <main class="flex-shrink-0">
        <div class="container">
            <h3 class="my-3">Nuevo Producto</h3>
            
                
            <form method="post" action="nuevo.php" class="row g-3"  autocomplete="off">

                <div class="col-md-4">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" required autofocus>
                </div>   

                <div class="col-md-4">
                    <label for="nombre" class="form-label">unidadMedida</label>
                    <input type="text" class="form-control" id="unidadMedida" name="unidadMedida" required autofocus>
                </div> 

                <!-- <div class="col-md-8">
                    <label for="um" class="form-label">UM</label>
                    <select class="form-select" id="unidadMedida" name="unidadMedida" required>
                        <option value="">Seleccionar</option>
                        <option value="1">Unidad</option>
                        <option value="2">Caja</option>
                        <option value="3">Paquete</option>
                    </select>
                </div> -->

                <div class="col-md-6">
                    <label for="cantidad" class="form-label">Cantidad</label>
                    <input type="text" class="form-control" id="CANTIDAD" name="CANTIDAD" required>
                </div>

                <div class="col-md-6">
                    <label for="pc" class="form-label">Precio Compra</label>
                    <input type="text" class="form-control" id="precioCompra" name="precioCompra" required>
                </div>

                <div class="col-md-6">
                    <label for="pv" class="form-label">Precio de Venta</label>
                    <input type="text" class="form-control" id="precioVenta" name="precioVenta">
                </div>

                <div class="col-md-6">
                    <label for="detalles" class="form-label">Detalles</label>
                    <input type="text" class="form-control" id="detalles" name="detalles" required>
                </div>
                

                <div class="col-12">
                    <a href="Listado.php" class="btn btn-secondary">Regresar</a>
                    <button type="submit" name="registrar" id="registrar" class="btn btn-primary">Guardar</button>
                </div>                

            </form>

        </div>
    </main>

    <footer class="footer mt-auto py-3 bg-body-tertiary">
        <div class="container">
            <span class="text-body-secondary"> 2025 | Ventas de Productos</span>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>


        <?php
    function registrar($reg){

        echo "ingresoooloo----------->>>";
        if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['registrar'])) {
            
            echo("se registro....");
            // Ejecutar la consulta de registro            
            $registrar = $reg->registrado();
    
            // header("Location: index.php");
            // exit();
        }
       
        
    }
    registrar($reg);
        ?>
</body>

<!-- php
    mysqli_close($bd);
?> -->

</html>