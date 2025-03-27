
<?php
require_once  'include/funciones.php';
require_once  'include/bd.php';

$fun = new funciones($bd); // Pasamos la conexión
$listar = $_POST['listar'] ?? null;


// Ejecuta la consulta si se hizo clic en "Listar Clientes"
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['listar'])) {

    // Ejecutar la consulta  
    $consulta = $fun->consultas();
    $listado = $fun->listado();

    if (!$listado) {
        echo "<p>Error al realizar la consulta.</p>";
        exit();
    }


if (mysqli_num_rows($listado) > 0 ) {
    while ($cliente = mysqli_fetch_assoc($listado)) {
        echo "<div>";
        echo "<a>" . htmlspecialchars($cliente['nombre']) . "</a> ";
        echo "<a>" . htmlspecialchars($cliente['apellido']) . "</a>";
        echo "</div>";
    }
    
} else {
    echo "<p>No hay clientes disponibles.</p>";

// Cierra la conexión si es necesario
    mysqli_close($bd);
}


}

?>





<?php
// function suma($a,$b){
//     $r=$a+$b;
//     echo $r;
// }
// suma(5,3);
//phpinfo(); 

// $personas=["Estrella","Angel","Paola","Cielo","Evelyn"];
// foreach ($personas as $valores) {    
//     echo $valores."<br>";
// }


// ---------------> Recorrer un array asociativo
// $mascotas = [    
//         "nombre" => "peluche",
//         "color" => "gringo",
//         "edad" => 5
// ];
// foreach ($mascotas as $key => $value) { 

//     // echo $key.": ".$value."<br>";
//     echo "$key: $value <br>";
// }

//------------->> Modificar un array dentro del foreach
// $numeros = [1,2,3,4,5];
// foreach ($numeros as &$value) {
//     $value *= 2;   
// }
// print_r($numeros);


//----------->> Recorrer un objeto
// class persona {
//     public $nombre = "Estrella";
//     public $edad = 3;
// }

// $objeto = new persona();

// foreach ($objeto as $propiedad => $valorPropiedad) {
//     echo "$propiedad :  $valorPropiedad <br>";
// }
?>

