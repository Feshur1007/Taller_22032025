<?php
require 'punto6.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['preorden']) && isset($_POST['inorden'])) {
    $preorden = explode(' → ', $_POST['preorden']);
    $inorden = explode(' → ', $_POST['inorden']);
    
    $arbol = new ArbolBinario();
    
    $arbol->construirArbol($preorden, $inorden);
    $raiz = $arbol->getRaiz();
    
    echo "<pre>";
    $arbol->dibujarArbol($raiz);
    echo "</pre>";
} else {
    die("Se requieren al menos los recorridos preorden e inorden.");
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resultados del Árbol Binario</title>
</head>
<body>
    <h1>Resultados del Árbol Binario</h1>
    <div>
        <p>Recorrido Inorden: <strong><?php echo implode(' → ', $arbol->recorridoInorden($raiz)); ?></strong></p>
        <p>Recorrido Preorden: <strong><?php echo implode(' → ', $arbol->recorridoPreorden($raiz)); ?></strong></p>
        <p>Recorrido Postorden: <strong><?php echo implode(' → ', $arbol->recorridoPostorden($raiz)); ?></strong></p>
    </div>
    <a href="index6.html">Volver</a>
</body>
</html>