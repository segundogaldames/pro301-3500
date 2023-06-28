<form action="<?= $_layoutParams['root'] . $this->process; ?>" method="post">
    <div class="mb-3">
        <label for="run" class="form-label">RUN</label>
        <input type="text" name="run" value="<?php if(isset($this->usuario)) echo $this->usuario['run']; else echo ''; ?>" class="form-control" id="run" aria-describedby="run">
        <div id="nombre" class="form-text text-danger">Ingrese el run del usuario</div>
    </div>
    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre</label>
        <input type="text" name="nombre" value="<?php if(isset($this->usuario)) echo $this->usuario['nombre']; else echo ''; ?>" class="form-control" id="nombre" aria-describedby="nombre">
        <div id="nombre" class="form-text text-danger">Ingrese el nombre del usuario</div>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" name="email" value="<?php if(isset($this->usuario)) echo $this->usuario['email']; else echo ''; ?>" class="form-control" id="email" aria-describedby="email">
        <div id="nombre" class="form-text text-danger">Ingrese el email del usuario</div>
    </div>
    <div class="mb-3">
        <label for="rol" class="form-label">Rol</label>
        <select name="rol" class="form-control">
            <?php if($this->action == 'edit'): ?>
                <option value="<?= $this->usuario['rol_id'] ?>">
                    <?= $this->usuario['rol'] ?>
                </option>
            <?php endif;?>
            <option value="">Seleccione un rol</option>
            <?php foreach($this->roles as $rol): ?>
                <option value="<?= $rol['id'] ?>"><?= $rol['nombre'] ?></option>
            <?php endforeach;?>
        </select>
        <div id="nombre" class="form-text text-danger">Ingrese el nombre del usuario</div>
    </div>
    <?php if($this->action == 'edit'): ?>
        <div class="mb-3">
            <label for="activo" class="form-label">Estado</label>
            <select name="activo" class="form-control">
                <?php if($this->usuario['activo'] == 1):?>
                    <option value="1">Activo</option>
                    <option value="2">Desactivar</option>
                <?php else:?>
                    <option value="2">Inactivo</option>
                    <option value="1">Activar</option>
                <?php endif;?>
            </select>
            <div id="nombre" class="form-text text-danger">Ingrese el nombre del usuario</div>
        </div>
    <?php endif;?>
    <?php if($this->action == 'create'):?>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="nombre" aria-describedby="password">
            <div id="password" class="form-text text-danger">Ingrese el password del usuario</div>
        </div>
        <div class="mb-3">
            <label for="repassword" class="form-label">Confirmar Password</label>
            <input type="password" name="repassword" class="form-control" id="nombre" aria-describedby="password">
            <div id="password" class="form-text text-danger">Confirme el password del usuario</div>
        </div>
    <?php endif;?>
    <input type="hidden" name="_method" value="PUT" >
    <input type="hidden" name="send" value="<?= $this->send; ?>">
    <button type="submit" class="btn btn-primary">Guardar</button>
    <a href="<?= $_layoutParams['root'] ?>usuarios" class="btn btn-link">Volver</a>
</form>