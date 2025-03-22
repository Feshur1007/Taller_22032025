<?

interface model
{
    function get($prop);
    function set($prop, $value);
}

abstract class letras implements model
{
    protected $palabra = null;
    private $acronimo = null;

    abstract function toString();

    function CreacionDeAcronimos()
    {
        $acronimo  = '';
        foreach ($this->palabra as $palabra) {
            $acronimo .= strtoupper($palabra[0]);
        }
    }

    function get($prop)
    {
        return $this->{$prop};
    }

    function set($prop, $value)
    {
        $this->{$prop} = $value;
    }
}
