<form name="form" action="<?= $_layoutParams['root'] . $this->process; ?>" method="post">
    <div class="mb-3">
        <label for="titulo" class="form-label">Título</label>
        <input type="text" name="titulo" value="<?php if(isset($this->noticia)) echo $this->noticia['titulo']; else echo ''; ?>" class="form-control" id="titulo" aria-describedby="nombre">
        <div id="msg_titulo" class="form-text text-danger">Ingrese el título de la noticia</div>
    </div>
    <div class="mb-3">
        <label for="descripcion" class="form-label">Descripción</label>
        <textarea name="descripcion" id="descripcion" class="form-control" rows="4">
            <?php if(isset($this->noticia)) echo $this->noticia['descripcion']; else echo ''; ?>
        </textarea>
        <div id="msg_descripcion" class="form-text text-danger">Ingrese la descripción de la noticia</div>
    </div>
    <?php if($this->action == 'edit'): ?>
        <div class="mb-3">
            <label for="vigente" class="form-label">Estado</label>
            <select name="vigente" class="form-control">
                <?php if($this->noticia['vigente'] == 1): ?>
                    <option value="1">Vigente</option>
                    <option value="2">Desactivar</option>
                <?php else: ?>
                    <option value="2">Inactivo</option>
                    <option value="2">Activar</option>
                <?php endif; ?>
            </select>
            <div id="msg_vigente" class="form-text text-danger">Seleccione el estado de la noticia</div>
        </div>
    <?php endif; ?>
    <input type="hidden" name="_method" value="PUT" >
    <input type="hidden" name="send" value="<?= $this->send; ?>">
    <button type="submit" class="btn btn-primary">Guardar</button>
</form>