<?php



class Calculadora
{

    private $num = 0;

    public function __construct($num){
        
        $this->num = $num;
    }

    public function fibonacci() {
        
        if ($this->num < 1) {
            return "El número debe ser mayor a 0 para calcular Fibonacci.";
        }

        $fib = [0, 1]; 
        
        for ($i = 2; $i < $this->num; $i++) {
            $fib[$i] = $fib[$i - 1] + $fib[$i - 2]; 
        }
        
        return $fib; 
    }

    public function factorial() {
        if ($this->num  < 0) {
            return "No se puede calcular el factorial de un número negativo";
        }

        $factorial = 1; 
        
        for ($i = 1; $i <= $this->num ; $i++) {
            $factorial = $factorial* $i; 
        }
        
        return $factorial; 
    }
    
}


$resultado = " ";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numero = $_POST["numero"];
    $operacion = $_POST["operacion"];
    
    if ($numero == 0) {
        $resultado = "Por favor, ingrese un número válido.";
    } else {
        $calc = new Calculadora($numero);

    if ($operacion == "fibonacci") {
        $resultado = "Sucesión de Fibonacci: " .implode(", ", $calc->fibonacci()); 
    } elseif ($operacion == "factorial") {
        $resultado = $calc->factorial();
    }
}
}

header("Location: Formulario.php? resultado=" . urlencode($resultado));
exit();



?>
