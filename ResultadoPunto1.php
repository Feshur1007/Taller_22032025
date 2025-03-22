<?php
require 'Punto1.php';

$letras = new Letras ($_POST ['palabra'], $_POST['acronimo']);
?>

<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title> Resultado</title>
</head>
<body>
    <h1>
        El acronimo es:
    </h1>
    <div>
        <?php
        echo $acronimo->CreacionDeAcronimos();
        ?>
    </div>
</body>


</html>