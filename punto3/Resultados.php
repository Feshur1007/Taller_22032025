<?php
require 'punto3Clases.php'; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Números ingresados
    $numeros = $_POST['numeros'];

    // Instancia de la clase Estadisticas
    $estadisticas = new Estadisticas($numeros);

    // Promedio
    $promedio = $estadisticas->calcularPromedio();

    // Media
    $media = $estadisticas->calcularMedia();

    // Moda
    $moda = $estadisticas->calcularModa();
} else {
    // Mensaje
    echo "Ingrese los números";
    exit; // Salir si no se envía
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resultados de Estadísticas</title>
</head>
<body>
    <h1>Resultados de las Estadísticas</h1>
    
    <div>
        <h2>Promedio:</h2>
        <p><?php echo $promedio; ?></p>
    </div>
    
    <div>
        <h2>Media:</h2>
        <p><?php echo $media; ?></p>
    </div>
    
    <div>
        <h2>Moda:</h2>
        <p><?php echo implode(", ", $moda); ?></p> <!-- el array de moda a  cadena -->
    </div>
    
    <a href="index3.html">Volver</a>
</body>
</html>