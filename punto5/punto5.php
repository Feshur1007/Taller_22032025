<?php
interface Conversion {
    public function convertir();

}

class calculo {
    protected $numero;

    public function __construct($numero) {
        $this->numero = (int) $numero;
    }

    public function getNumero() {
        return $this->numero;
    }
}

class ConversorBinario extends calculo  {
    public function convertir(){
        return decbin($this->getNumero());
    }
}
              
 
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $numero = $_POST["numero"];

    if ($numero == " " or null){
     echo "Ingrese un número VÁLIDO";
    } else {
     $conversion = new ConversorBinario($numero);
    echo "El número en binario es: " . $conversion->convertir();
    }
}

?>