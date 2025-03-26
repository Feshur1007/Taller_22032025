<?php

class convertirAcronimo
{
    public function convertirAcronimo($frase)
    {
        
        $fraseLimpia = preg_replace('/[^\w\s-]/', '', $frase);
        $palabras = preg_split('/[\s-]+/', $fraseLimpia);
        $acronimo = '';
        foreach ($palabras as $palabra) {
            if (!empty($palabra)) {
                $acronimo .= strtoupper($palabra[0]);
            }
        }
        
        return $acronimo;
    }
}
?>