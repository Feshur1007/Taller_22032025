<?php
require 'Punto1.php';
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['frase'])) {
    $frase = $_POST['frase'];
    $convertidor = new convertirAcronimo();
    $acronimo = $convertidor->convertirAcronimo($frase);
} else {
    die("No se ha enviado ninguna frase.");
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resultado del Acrónimo</title>
</head>
<body>
    <h1>Resultado del Acrónimo</h1>
    <div>
        <p>Frase original: <strong><?php echo htmlspecialchars($frase); ?></strong></p>
        <p>Acrónimo: <strong><?php echo htmlspecialchars($acronimo); ?></strong></p>
    </div>
    <a href="index1.html">Volver</a>
</body>
</html>