<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Calculadora PHP</title>

</head>
<body>

<h2>Calculadora de Fibonacci y Factorial</h2>

<!-- Formulario -->
<form action="proceso.php"  method="post">
    <label for="numero">Ingrese un número:</label>
    <input type="number" name="numero" id="numero" required>
    
    <label for="operacion">Seleccione una operación:</label>
    <select name="operacion" id="operacion">
        <option value="fibonacci">Fibonacci</option>
        <option value="factorial">Factorial</option>
    </select>
    
    <button type="submit">Calcular</button>
</form>


<h2>Resultado del Cálculo:</h2>

<p>
    <?php 
        if (isset($_GET['resultado'])) {
    echo $_GET['resultado'];
} else {
    echo "No hay resultado disponible.";
}
    ?>
</p>




</body>
</html>


