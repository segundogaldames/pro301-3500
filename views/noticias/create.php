<!--seccion principal-->
<div class="container-fluid mt-3" >
    <div class="row" >
        <div class="col-md-2" >
            <?php include_once ROOT . 'views' . DS . 'layout' . DS . DEFAULT_LAYOUT . DS . 'sidebar.php' ?>
        </div>
        <div class="col-md-10" >
            <div class="col-md-6" >
                <h1>Nueva Noticia</h1>
                <?php include_once ROOT . 'views' . DS . 'partials' . DS . '_mensajes.php' ?>
    
                <?php include_once ROOT . 'views' . DS . 'noticias' . DS . '_form.php' ?>
            </div>
        </div>
    </div>
</div>