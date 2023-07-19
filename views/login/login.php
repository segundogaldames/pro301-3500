<!--seccion principal-->
<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-md-2">
            <?php include_once ROOT . 'views' . DS . 'layout' . DS . DEFAULT_LAYOUT . DS . 'sidebar.php' ?>
        </div>
        <div class="col-md-10">
            <div class="col-md-6">
                <h4 class="text-info">Ingresa tus credenciales para continuar...</h4>
                <?php include_once ROOT . 'views' . DS . 'partials' . DS . '_mensajes.php' ?>

                <form name="form" action="<?= $_layoutParams['root'] . $this->process; ?>" method="post">

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" id="email" aria-describedby="email">
                        <div id="msg_email" class="form-text text-danger"></div>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="nombre"
                            aria-describedby="password">
                        <div id="msg_password" class="form-text text-danger"></div>
                    </div>

                    <input type="hidden" name="send" value="<?= $this->send; ?>">
                    <button type="button" onclick="validateLogin();" class="btn btn-primary">Ingresar</button>
                </form>
            </div>
        </div>
    </div>
</div>