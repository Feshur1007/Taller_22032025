<?

interface model 
{
    function get($drop);
    function set($drop, $value);
}

abstract class letras implements model
{
    protected $palabra = null;

    abstract function toString();
    

}


