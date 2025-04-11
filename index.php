<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once 'include/funciones.php';
require_once 'include/bd.php';

$fun = new funciones($bd); // Pasamos la conexió
$listar = $_POST['listar'] ?? null;


// Clase crud, por si se necesita más adelante
class crud {
    public $bd;

    public function __construct($bd) {
        $this->bd = $bd;  
    }    

public function listarr($fun){
    // Ejecuta la consulta si se hizo clic en "Listar Clientes"
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['listar'])) {
    // Ejecutar la consulta  
    $consulta = $fun->consultas();
    $listado = $fun->listado();

    if (!$listado) {
        echo "<p>Error al realizar la consulta.</p>";
        exit();
    }

    if (mysqli_num_rows($listado) > 0) {
        while ($producto = mysqli_fetch_assoc($listado)) {
            echo "<div>";
            echo "<a>" . htmlspecialchars($producto['nombre']) . "</a><br>";
            echo "<a>" . htmlspecialchars($producto['unidadMedida']) . "</a><br>";
            echo "<a>" . htmlspecialchars($producto['CANTIDAD']) . "</a><br>";
            echo "<a>" . htmlspecialchars($producto['precioCompra']) . "</a><br>";
            echo "<a>" . htmlspecialchars($producto['precioVenta']) . "</a><br>";
            echo "<a>" . htmlspecialchars($producto['detalles']) . "</a><br>";
            echo "</div>";
        }    
    } else {
        echo "<p>No hay clientes disponibles.</p>";
    }

    // Cierra la conexión si es necesario
    mysqli_close($this->bd);
}
}
public function registrar($fun){
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['registrar'])) {
        // Ejecutar la consulta de registro
        $reg=$fun->register();
        $registrar=$fun->registrado();
    } else {
        echo "<p>Error al registrar el producto.</p>";
    }
    
}

}
$crud = new crud($bd);
$crud->listarr($fun);

?>