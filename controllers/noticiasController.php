<?php
class noticiasController extends Controller
{
    private $_noticia;

    public function __construct()
    {
        parent::__construct();
        $this->_noticia = $this->loadModel('noticia');
    }

    public function index()
    {
        $this->validateAdminEditorPeriodista();
        $this->_view->titulo = 'Noticias';
        $this->_view->noticias = $this->_noticia->getNoticias();
        $this->_view->render('index');
    }

    public function show($id = null)
    {
        $this->validateAdminEditorPeriodista();
        $this->_view->titulo = 'Noticias';
        $this->_view->noticia = $this->_noticia->getNoticiaId($this->filtrarInt($id));
        $this->_view->render('show');
    }

    public function create()
    {
        $this->vaidatePeriodista();
        $this->_view->titulo = 'noticias';
        $this->_view->send = HASH_CTRL;
        $this->_view->process = 'noticias/store';
        $this->_view->action = 'create';
        $this->_view->render('create');
    }

    public function store()
    {
        $this->vaidatePeriodista();
        if ($this->getPostParam('send') != HASH_CTRL) {
            $this->redireccionar('error/error');
        }

        if (!$this->getTexto('titulo')) {
            Session::set('msg_error','Ingrese el titulo de la noticia');
            $this->redireccionar('noticias/create');
        }

        if (!$this->getTexto('descripcion')) {
            Session::set('msg_error','Ingrese la descripción de la noticia');
            $this->redireccionar('noticias/create');
        }

        $noticia = $this->_noticia->getNoticiaTitulo($this->getTexto('titulo'));

        if ($noticia) {
            Session::set('msg_error','La noticia ingresado ya existe... intente con otra');
            $this->redireccionar('noticias/create');
        }

        $noticia = $this->_noticia->addNoticia(
            $this->getTexto('titulo'),
            $this->getTexto('descripcion')
        );

        if ($noticia) {
            Session::set('msg_success','La noticia se ha registrado correctamente');
            $this->redireccionar('noticias');
        }
    }

    public function edit($id = null)
    {
        $this->validateEditorPeriodista();
        $this->_view->titulo = 'Noticias';
        $this->_view->send = HASH_CTRL;
        $this->_view->noticia = $this->_noticia->getNoticiaId($this->filtrarInt($id));
        $this->_view->process = "noticias/update/{$id}";
        $this->_view->action = 'edit';
        $this->_view->render('edit');
    }

    public function update($id = null)
    {
        $this->validateEditorPeriodista();
        //print_r($_POST);exit;
        if ($this->getPostParam('send') != HASH_CTRL) {
            $this->redireccionar('error/error');
        }

        if ($this->getAlphaNum('_method') != 'PUT') {
            $this->redireccionar('error/error');
        }

        if (!$this->getTexto('titulo')) {
            Session::set('msg_error','Ingrese el nombre de la noticia');
            $this->redireccionar('noticias/edit/' . $id);
        }

        if (!$this->getTexto('descripcion')) {
            Session::set('msg_error','Ingrese la descripción de la noticia');
            $this->redireccionar('noticias/edit/' . $id);
        }

        if (!$this->getInt('vigente')) {
            Session::set('msg_error','Seleccione el estado de la noticia');
            $this->redireccionar('noticias/edit/' . $id);
        }

        $noticia = $this->_noticia->editNoticia(
            $this->filtrarInt($id), 
            $this->getTexto('titulo'),
            $this->getTexto('descripcion'),
            $this->getInt('vigente')
        );

        if ($noticia) {
            Session::set('msg_success','La noticia se ha modificado correctamente');
            $this->redireccionar('noticias/show/' . $id);
        }
    }
}
