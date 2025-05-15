<?php
    require_once 'include/funciones.php';
    require_once 'include/bd.php';
    $fun = new funciones($bd); // Pasamos la conexió  
    $listado = $fun->listado();

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

    <main class="flex-shrink-0">
        <div class="container">
            <h3 class="my-3" id="titulo">PROODUCTOS</h3>

            <a href="nuevo.php" class="btn btn-success">Agregar</a>

            <table class="table table-hover table-bordered my-3" aria-describedby="titulo">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">Código del Producto</th>
                        <th scope="col">Nombre del Producto</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Precio de Compra</th>
                        <th scope="col">Precio de Venta</th>
                        <th scope="col">Detalles</th>
                    </tr>
                </thead>                

                <tbody>
    <?php
    if (mysqli_num_rows($listado) >= 0) {
        while ($producto = mysqli_fetch_assoc($listado)) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($producto['id']) . "</td>";
            echo "<td>" . htmlspecialchars($producto['nombre']) . "</td>";
            echo "<td>" . htmlspecialchars($producto['CANTIDAD']) . "</td>";
            echo "<td>" . htmlspecialchars($producto['precioCompra']) . "</td>";
            echo "<td>" . htmlspecialchars($producto['precioVenta']) . "</td>";
            echo "<td>" . htmlspecialchars($producto['detalles']) . "</td>";
            echo "<td>
                    <a href='editar.php?id=" . $producto['id'] . "' class='btn btn-warning btn-sm me-2'>Editar</a>
                    <button type='button' name='eliminar' class='btn btn-danger btn-sm' data-bs-toggle='modal' data-bs-target='#eliminaModal' data-bs-id='" . $producto['id'] . "'>Eliminar</button>
                </td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='7'>No hay productos disponibles.</td></tr>";
    }
    ?>                 

                </tbody>
            </table>
        </div>
    </main>

    <footer class="footer mt-auto py-3 bg-body-tertiary">
        <div class="container">
            <span class="text-body-secondary"> 2025 | Ventas de productos</span>
        </div>
    </footer>

    <div class="modal fade" id="eliminaModal" tabindex="-1" aria-labelledby="eliminaModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="eliminaModalLabel">Aviso</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>¿Desea eliminar este registro?</p>
                </div>

                <div class="modal-footer">
    <form id="form-elimina" action="" method="post">
        <input type="hidden" name="id" id="elimina-id">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" name="eliminar" class="btn btn-danger">Eliminar</button>
    </form>
</div>



            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>

    <script>

const eliminaModal = document.getElementById('eliminaModal')
if (eliminaModal) {
    eliminaModal.addEventListener('show.bs.modal', event => {
        const button = event.relatedTarget
        const id = button.getAttribute('data-bs-id')
        
        const inputId = eliminaModal.querySelector('#elimina-id')
        inputId.value = id

        const form = eliminaModal.querySelector('#form-elimina')
        form.setAttribute('action', 'Eliminar.php')
    })
}
    </script>

</body>

<!-- ?php
    mysqli_close($bd);
?> -->

</html>