<?php
class Request
{
    private $_controlador;
    private $_metodo;
    private $_argumentos;
    private $_module;

    public function __construct()
    {
        #sanitizar la url del sistema
        if(isset($_GET['url']))
        {
            $url = filter_input(INPUT_GET, 'url', FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            $url = array_filter($url);
            $this->_controlador = strtolower(array_shift($url));
            $this->_metodo = strtolower(array_shift($url));
            $this->_argumentos = $url;

        }


        if(!$this->_controlador)
        {

            $this->_controlador = DEFAULT_CONTROLLER;
        }

        if(!$this->_metodo)
        {
            $this->_metodo = 'index';
        }
        if(!isset($this->_argumentos))
        {
            $this->_argumentos = array();
        }
    }
    public function getModule()
    {
        return $this->_module;
    }

    public function getController()
    {
        return $this->_controlador;
    }

    public function getMethod()
    {
        return $this->_metodo;
    }

    public function getArgs()
    {
        return $this->_argumentos;
    }
}

?>
