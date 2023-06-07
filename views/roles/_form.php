<form action="<?= $_layoutParams['root'] . $this->process; ?>" method="post">
    <div class="mb-3">
        <label for="rol" class="form-label">Rol</label>
        <input type="text" name="nombre" value="<?php if(isset($this->rol)) echo $this->rol['nombre']; else echo ''; ?>" class="form-control" id="nombre" aria-describedby="nombre">
        <div id="nombre" class="form-text text-danger">Ingrese el nombre del rol</div>
    </div>
    <input type="hidden" name="_method" value="PUT" >
    <input type="hidden" name="send" value="<?= $this->send; ?>">
    <button type="submit" class="btn btn-primary">Guardar</button>
</form>