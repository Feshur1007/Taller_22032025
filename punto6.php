<?php

class Nodo
{
    public $valor;
    public $izquierda;
    public $derecha;

    public function __construct($valor)
    {
        $this->valor = $valor;
        $this->izquierda = null;
        $this->derecha = null;
    }
}

class ArbolBinario
{
    private $raiz;

    public function __construct()
    {
        $this->raiz = null;
    }

    public function construirArbol($preorden, $inorden)
    {
        $this->raiz = $this->construir($preorden, $inorden);
    }

    private function construir($preorden, $inorden)
    {
        if (empty($preorden) || empty($inorden)) {
            return null;
        }

        $raizValor = $preorden[0];
        $nodoRaiz = new Nodo($raizValor);

        $raizIndex = array_search($raizValor, $inorden);

        $inordenIzquierdo = array_slice($inorden, 0, $raizIndex);
        $inordenDerecho = array_slice($inorden, $raizIndex + 1);

        $preordenIzquierdo = array_slice($preorden, 1, count($inordenIzquierdo));
        $preordenDerecho = array_slice($preorden, count($inordenIzquierdo) + 1);

        $nodoRaiz->izquierda = $this->construir($preordenIzquierdo, $inordenIzquierdo);
        $nodoRaiz->derecha = $this->construir($preordenDerecho, $inordenDerecho);

        return $nodoRaiz;
    }

    public function getRaiz()
    {
        return $this->raiz;
    }

    public function dibujarArbol($nodo, $nivel = 0, $espacio = 10)
    {
        if ($nodo === null) {
            return;
        }

        $this->dibujarArbol($nodo->derecha, $nivel + 1, $espacio);

        if ($nivel > 0) {
            echo str_repeat(' ', $espacio - 2) . "|\n"; 
            echo str_repeat(' ', $espacio) . $nodo->valor . "\n"; 
        } else {
            echo $nodo->valor . "\n"; 
        }


        $this->dibujarArbol($nodo->izquierda, $nivel + 1, $espacio);
    }

    public function recorridoInorden($nodo)
    {
        if ($nodo === null) {
            return [];
        }
        return array_merge($this->recorridoInorden($nodo->izquierda), [$nodo->valor], $this->recorridoInorden($nodo->derecha));
    }

    public function recorridoPreorden($nodo)
    {
        if ($nodo === null) {
            return [];
        }
        return array_merge([$nodo->valor], $this->recorridoPreorden($nodo->izquierda), $this->recorridoPreorden($nodo->derecha));
    }

    public function recorridoPostorden($nodo)
    {
        if ($nodo === null) {
            return [];
        }
        return array_merge($this->recorridoPostorden($nodo->izquierda), $this->recorridoPostorden($nodo->derecha), [$nodo->valor]);
    }
}
?>