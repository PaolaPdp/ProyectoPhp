

<?php
 global $bd;

    $bd = mysqli_connect('localhost','root','1224','Ventas');

    if(!$bd){
        die("Error de conexión: " . mysqli_connect_error());
    }    
    
?>


