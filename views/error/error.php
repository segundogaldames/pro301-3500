<!--seccion principal-->
<div class="container-fluid mt-3" >
    <div class="row" >
        <div class="col-md-2" >
            <?php include_once ROOT . 'views' . DS . 'layout' . DS . DEFAULT_LAYOUT . DS . 'sidebar.php' ?>
        </div>
        <div class="col-md-10" >
            
            <?php include_once ROOT . 'views' . DS . 'partials' . DS . '_mensajes.php' ?>
            
            <h1 class="title-error">404 Página No Encontrada!</h1>
                <p>
                    <img src="<?= $_layoutParams['ruta_img'] ?>img_404.jpg" alt="" width="350">
                </p>
                <p>
                    <a href="<?= $_layoutParams['root'] ?>" class="btn btn-primary">Volver</a>
                </p>
        </div>
    </div>
</div>