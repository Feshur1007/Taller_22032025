<?php

class Estadisticas {
    private $numeros;

    public function __construct($numeros) {
        $this->numeros = $numeros;
    }

    public function calcularPromedio() {
        $suma = 0;
        $num = count($this->numeros);//count cuenta el número de elementos en el array 
    
        foreach ($this->numeros as $numero) {// el bucle foreach recorre todos los numeros del array uno por uno
            $suma += $numero; // Sumar cada número a la suma total
        }
    
        return $num > 0 ? $suma / $num : 0; // No division por cero
    }

  public function calcularMedia() {
    // ordenar los números
    $numerosOrdenados = $this->numeros; 
    sort($numerosOrdenados); //sorf, ordenar elementos

    // Contamos cuántos números hay
    $total= count($numerosOrdenados);

    // Total de numeros par o impar
    if ($total % 2 == 0) {
        // par, dos números del medio
        $indece1 = $total / 2 - 1; // primer número del medio
        $indece2 = $total / 2; // egundo número del medio

        //media de los dos números
        $media = ($numerosOrdenados[$indece1] + $numerosOrdenados[$indece2]) / 2;
    } else {
        // impar,el número del medio
        $indece = floor($total / 2); // número 
        $media = $numerosOrdenados[$indece];
    }

    // retornamos la mediana calculada
    return $media;
}

public function calcularModa() {
    // Crear un array para contar 
    $conteo = [];

    // Contar cuántas veces se repite cada numero
    foreach ($this->numeros as $numero) {//el bucle foreach recorre cada numero  del array $conteo
        // Si el número ya está, incrementamos su contador
        if (isset($conteo[$numero])) {
            $conteo[$numero]++;
        } else {
            // Si no está, lo inicializamos en 1
            $conteo[$numero] = 1;
        }
    }

    // Encontrar el número que mas se repite
    $maxnum = 0;
    foreach ($conteo as $cantidad) {
        if ($cantidad > $maxnum) {
            $maxnum = $cantidad; 
        }
    }

    // Crear un array para la moda
    $moda = [];
    foreach ($conteo as $numero => $cantidad) {
        //numero que mas se repita
        if ($cantidad == $maxnum) {
            $moda[] = $numero;
        }
    }

    // retornar la moda
    return $moda;
}
}
?>