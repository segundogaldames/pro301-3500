<!--seccion principal-->
<div class="container-fluid mt-3" >
    <div class="row" >
        <div class="col-md-2" >
            <?php include_once ROOT . 'views' . DS . 'layout' . DS . DEFAULT_LAYOUT . DS . 'sidebar.php' ?>
        </div>
        <div class="col-md-10" >
            <div class="col-md-6" >
                <h1>Nuevo Rol</h1>
                <?php include_once ROOT . 'views' . DS . 'partials' . DS . '_mensajes.php' ?>
    
                <form action="<?= $_layoutParams['root'] . $this->process; ?>" method="post">
                    <div class="mb-3">
                        <label for="rol" class="form-label">Rol</label>
                        <input type="text" name="nombre" class="form-control" id="nombre" aria-describedby="nombre">
                        <div id="nombre" class="form-text text-danger">Ingrese el nombre del rol</div>
                    </div>
                    <input type="hidden" name="send" value="<?= $this->send; ?>">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </form>
            </div>
        </div>
    </div>
</div>