
<?php

class funciones{
    public $bd;

public function __construct($bd) {
        $this->bd = $bd;
    }

public function consultas(){       
    try {        
        if (!$this->bd) {
            throw new Exception("No hay conexión a la base de datos.");
        }                
    } catch (Exception $e) {
        error_log($e->getMessage()); // Registra el error
        return false; 
    }
}

public function listado(){    
    $consulta = mysqli_query($this->bd, "SELECT * FROM producto;");

        if (!$consulta) {
            throw new Exception("Error en la consulta: " . mysqli_error($this->bd));
        }
        return $consulta;
}

public function registrado(){
    $cantidad = (int) $_POST['CANTIDAD'];
    $register = mysqli_query($this->bd, "INSERT INTO producto (nombre, unidadMedida, CANTIDAD, precioCompra, precioVenta, detalles) VALUES (
    '$_POST[nombre]', 
    '$_POST[unidadMedida]', '$cantidad', 
    '$_POST[precioCompra]', 
    '$_POST[precioVenta]', 
    '$_POST[detalles]');");

    if (!$register) {
        throw new Exception("Error al registrar el producto: " . mysqli_error($this->bd));
    } else {
        echo "<p>Producto registrado correctamente.</p>";
    }
}

}

?>

