<?php

final class loginController extends Controller
{
    private $_usuario;
    public function __construct()
    {
        parent::__construct();
        $this->_usuario = $this->loadModel('usuario');
    }

    public function index()
    {}

    public function login()
    {
        $this->_view->titulo = 'Usuarios';
        $this->_view->send = HASH_CTRL;
        $this->_view->process = 'login/store';
        $this->_view->render('login');
    }

    public function store()
    {
        if ($this->getPostParam('send') != HASH_CTRL) {
            $this->redireccionar('error/error');
        }

        if (Session::get('authenticate')) {
            $this->redireccionar();
        }

        if (!$this->validarEmail($this->getPostParam('email'))) {
            Session::set('msg_error','Ingrese su email');
            $this->redireccionar('login/login');
        }

        if (!$this->getSql('password')) {
            Session::set('msg_error','Ingrese su password');
            $this->redireccionar('login/login');
        }

        $usuario = $this->_usuario->getUsuarioEmailPassword(
            $this->getPostParam('email'), 
            $this->getSql('password')
        );

        if (!$usuario) {
            Session::set('msg_error','El email o la password no están registrados');
            $this->redireccionar('login/login');
        }

        Session::set('authenticate', true);
        Session::set('user_id', $usuario['id']);
        Session::set('user_name', $usuario['nombre']);
        Session::set('user_email', $usuario['email']);
        Session::set('user_rol', $usuario['rol']);
        Session::set('tiempo', time());

        $this->redireccionar();
    }

    public function logout()
    {
        Session::destroy();
        $this->redireccionar();
    }
}
