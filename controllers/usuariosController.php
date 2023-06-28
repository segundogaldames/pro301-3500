<?php
class usuariosController extends Controller
{
    private $_rol;
    private $_usuario;

    public function __construct()
    {
        parent::__construct();
        $this->_usuario = $this->loadModel('usuario');
        $this->_rol = $this->loadModel('rol');
    }

    public function index()
    {
        $this->validateAdminEditor();
        $this->_view->titulo = 'Usuarios';
        $this->_view->usuarios = $this->_usuario->getUsuarios();
        $this->_view->render('index');
    }

    public function show($id = null)
    {
        $this->validateAdminEditor();
        $this->_view->titulo = 'Usuarios';
        $this->_view->usuario = $this->_usuario->getUsuarioId($this->filtrarInt($id));
        $this->_view->render('show');
    }

    public function create()
    {
        $this->validateAdmin();
        $this->_view->titulo = 'Usuarios';
        $this->_view->send = HASH_CTRL;
        $this->_view->roles = $this->_rol->getRoles();
        $this->_view->action = 'create';
        $this->_view->process = 'usuarios/store';
        $this->_view->render('create');
    }

    public function store()
    {
        if ($this->getPostParam('send') != HASH_CTRL) {
            $this->redireccionar('error/error');
        }

        $this->validateAdmin();

        if (!$this->getTexto('run')) {
            Session::set('msg_error','Ingrese el RUN del usuario');
            $this->redireccionar('usuarios/create');
        }

        if (!$this->getTexto('nombre')) {
            Session::set('msg_error','Ingrese el nombre del usuario');
            $this->redireccionar('usuarios/create');
        }

        if (!$this->validarEmail($this->getPostParam('email'))) {
            Session::set('msg_error','Ingrese el email del usuario');
            $this->redireccionar('usuarios/create');
        }

        if (!$this->getInt('rol')) {
            Session::set('msg_error','Seleccione el rol del usuario');
            $this->redireccionar('usuarios/create');
        }

        #validacion de password
        if (!$this->getSql('password') || strlen($this->getSql('password'))< 8) {
            Session::set('msg_error','El password debe contener al menos 8 caracteres');
            $this->redireccionar('usuarios/create');
        }

        if ($this->getSql('repassword') != $this->getSql('password')) {
            Session::set('msg_error','Los passwords ingresados no coinciden');
            $this->redireccionar('usuarios/create');
        }

        $usuario = $this->_usuario->getUsuarioRun($this->getTexto('run'));

        if ($usuario) {
            Session::set('msg_error','El usuario ingresado ya existe... intente con otro');
            $this->redireccionar('usuarios/create');
        }

        $usuario = $this->_usuario->addUsuario(
            $this->getTexto('run'), 
            $this->getTexto('nombre'), 
            $this->getPostParam('email'), 
            $this->getSql('password'), 
            $this->getInt('rol')
        );

        if ($usuario) {
            Session::set('msg_success','El usuario se ha registrado correctamente');
            $this->redireccionar('usuarios');
        }
    }

    public function edit($id = null)
    {
        $this->validateAdmin();
        $this->_view->titulo = 'Usuarios';
        $this->_view->send = HASH_CTRL;
        $this->_view->usuario = $this->_usuario->getUsuarioId($this->filtrarInt($id));
        $this->_view->roles = $this->_rol->getRoles();
        $this->_view->action = 'edit';
        $this->_view->process = "usuarios/update/{$id}";
        $this->_view->render('edit');
    }

    public function update($id = null)
    {
        //print_r($_POST);exit;
        if ($this->getPostParam('send') != HASH_CTRL) {
            $this->redireccionar('error/error');
        }

        if ($this->getAlphaNum('_method') != 'PUT') {
            $this->redireccionar('error/error');
        }

        $this->validateAdmin();

        if (!$this->getTexto('run')) {
            Session::set('msg_error','Ingrese el RUN del usuario');
            $this->redireccionar('usuarios/edit/' . $id);
        }

        if (!$this->getTexto('nombre')) {
            Session::set('msg_error','Ingrese el nombre del usuario');
            $this->redireccionar('usuarios/edit/' . $id);
        }

        if (!$this->validarEmail($this->getPostParam('email'))) {
            Session::set('msg_error','Ingrese el email del usuario');
            $this->redireccionar('usuarios/edit/' . $id);
        }

        if (!$this->getInt('activo')) {
            Session::set('msg_error','Seleccione el estado del usuario');
            $this->redireccionar('usuarios/edit/' . $id);
        }

        if (!$this->getInt('rol')) {
            Session::set('msg_error','Seleccione el rol del usuario');
            $this->redireccionar('usuarios/edit/' . $id);
        }


        $usuario = $this->_usuario->editUsuario(
            $this->filtrarInt($id),
            $this->getTexto('run'), 
            $this->getTexto('nombre'), 
            $this->getPostParam('email'), 
            $this->getInt('activo'), 
            $this->getInt('rol')
        );

        if ($usuario) {
            Session::set('msg_success','El usuario se ha modificado correctamente');
            $this->redireccionar('usuarios/show/' . $id);
        }
    }
}
