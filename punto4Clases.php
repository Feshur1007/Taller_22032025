<?php

interface Model
{
    function get($prop);
    function set($prop, $value);
}

abstract class Conjunto implements Model
{
    protected $conjuntoA = [];
    protected $conjuntoB = [];

    public function get($prop)
    {
        return $this->{$prop};
    }

    public function set($prop, $value)
    {
        $this->{$prop} = $value;
    }

    abstract public function union();
    abstract public function interseccion();
    abstract public function diferenciaAB();
    abstract public function diferenciaBA();
}

class OperacionesConjuntos extends Conjunto
{
    // Constructor que recibe las cadenas de los conjuntos A y B
    public function __construct($conjuntoA, $conjuntoB)
    {
        // Asignamos los conjuntos A y B después de convertir los datos en arrays de enteros
        $this->set('conjuntoA', array_map('intval', explode(',', $conjuntoA)));
        $this->set('conjuntoB', array_map('intval', explode(',', $conjuntoB)));
    }

    
    // Unión de los conjuntos
    public function union(){

    $union = $this->get('conjuntoA');
    $conjuntoB = $this->get('conjuntoB');

    // Recorremos conjuntoB y agregamos los elementos que no estén en conjuntoA
    foreach ($conjuntoB as $elemento) {
        if (!in_array($elemento, $union)) {
            $union[] = $elemento;
        }
    }

    return $union;
    }

    // Intersección de los conjuntos
    
    public function interseccion(){
    $conjuntoA = $this->get('conjuntoA');
    $conjuntoB = $this->get('conjuntoB');
    $interseccion = [];

    foreach ($conjuntoA as $elemento) {
        if (in_array($elemento, $conjuntoB)) {
            $interseccion[] = $elemento;
        }
    }

    return $interseccion;
   }


    // Diferencia A - B
    public function diferenciaAB(){
        $conjuntoA = $this->get('conjuntoA');
        $conjuntoB = $this->get('conjuntoB');
        $diferenciaAB = [];
    
        foreach ($conjuntoA as $elemento) {
            if (!in_array($elemento, $conjuntoB)) {
                $diferenciaAB[] = $elemento;
            }
        }
    
        return $diferenciaAB;
    }
    

    // Diferencia B - A
    public function diferenciaBA(){
    $conjuntoB = $this->get('conjuntoB');
    $conjuntoA = $this->get('conjuntoA');
    $diferenciaBA = [];

    foreach ($conjuntoB as $elemento) {
        if (!in_array($elemento, $conjuntoA)) {
            $diferenciaBA[] = $elemento;
        }
    }

    return $diferenciaBA;
    }

}

// Verificar si los datos fueron enviados por POST
if (isset($_POST['conjuntoA']) && isset($_POST['conjuntoB'])) {
    $conjuntoA = $_POST['conjuntoA'];
    $conjuntoB = $_POST['conjuntoB'];

    // Crear instancia de la clase OperacionesConjuntos
    $operaciones = new OperacionesConjuntos($conjuntoA, $conjuntoB);

    // resultados
    $union = $operaciones->union(); 
    $interseccion = $operaciones->interseccion();
    $diferenciaAB = $operaciones->diferenciaAB();
    $diferenciaBA = $operaciones->diferenciaBA();

    // Mensajes
    $union = empty($union) ? "No hay elementos en la unión." : implode(', ', $union);
    $interseccion = empty($interseccion) ? "No hay elementos en la intersección." : implode(', ', $interseccion);
    $diferencia = empty($diferenciaAB) ? "No hay elementos en la diferencia A - B." : implode(', ', $diferenciaAB);
    $diferencia = empty($diferenciaBA) ? "No hay elementos en la diferencia B - A." : implode(', ', $diferenciaBA);

    // Redirigir a la página de resultados
    header("Location: resultados.php?union=" . urlencode($union) .//urlencode, convierte una cadena de texto en una versión segura para usar en una URL.
           "&interseccion=" . urlencode($interseccion) .
           "&diferenciaAB=" . urlencode($diferencia) .
           "&diferenciaBA=" . urlencode($diferencia));
    exit(); // Detener la ejecución 
}
?>



