
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

}

?>

