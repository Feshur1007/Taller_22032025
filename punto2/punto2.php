<?php

class calculadora
{

    private $num = 0;

    public function __construct($num){
        
        $this->num = $num;
    }

    public function fibonacci() {

        $fib = [0, 1]; 
        
        for ($i = 2; $i < $this->num; $i++) {
            $fib[$i] = $fib[$i - 1] + $fib[$i - 2]; 
        }
        
        return $fib; 
    }

    public function factorial() {
        if ($this->num  < 0) {
            return "No se puede calcular el factorial de un número negativo";
        }elseif($this->num  == null){
            return "Debes ingresar un numero"
        }

        $factorial = 1; 
        
        for ($i = 1; $i <= $this->num ; $i++) {
            $factorial = $factorial* $i; 
        }
        
        return $factorial; 
    }




    
}











/*

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $num = intval($_POST["numero"]); 
    $operacion = $_POST["operacion"]; 
    
    $calc = new calculadora(); 
    $resultado = "";

    if ($operacion == "fibonacci") {
        $resultado = implode(", ", $calc->fibonacci($num));
    } elseif ($operacion == "factorial") {
        $resultado = $calc->factorial($num);
    }
}*/


?>
