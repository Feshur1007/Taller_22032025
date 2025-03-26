<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resultados de Conjuntos</title>
</head>
<body>
    <h1>Resultados de los Conjuntos</h1>
    
    <!-- Imprimir resultados-->
    <div>
    <h2>Unión (A ∪ B):</h2>
    <p><?php echo $_GET['union'] ?></p>
     </div>
     <div>
         <h2>Intersección (A ∩ B):</h2>
         <p><?php echo $_GET['interseccion'] ?></p>
     </div>
     <div>
         <h2>Diferencia (A - B):</h2>
         <p><?php echo $_GET['diferenciaAB'] ?></p>
     </div>
     <div>
         <h2>Diferencia (B - A):</h2>
         <p><?php echo $_GET['diferenciaBA']  ?></p>
     </div>
     
         <a href="index.html">Volver</a>
</body>
</html>



