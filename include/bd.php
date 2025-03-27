

<?php
//mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);  ///
 global $bd;

    $bd = mysqli_connect('localhost','root','1224','appsalon');

    if(!$bd){
        die("Error de conexión: " . mysqli_connect_error());
    }    
    //mysqli_set_charset($bd, 'utf8mb4');   ////
?>


