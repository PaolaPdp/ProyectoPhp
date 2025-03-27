<!DOCTYPE html>
<html lang="es">

<head>
    <title>Mostrar texto con PHP</title>
</head>

<body>

    <form method="post">
        <button type="submit" name="mostrar">Haz clic aquí</button>
    </form>

    <?php
    // Verifica si el botón ha sido presionado
    if (isset($_POST['mostrar'])) {
        echo "<p>¡Hola! Este es el texto mostrado con PHP.</p>";

       
        
    }
    ?>



</html>