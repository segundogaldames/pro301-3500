<!--seccion principal-->
<div class="container-fluid mt-3" >
    <div class="row" >
        <div class="col-md-2" >
            <?php include_once ROOT . 'views' . DS . 'layout' . DS . DEFAULT_LAYOUT . DS . 'sidebar.php' ?>
        </div>
        <div class="col-md-10" >
            <div class="col-md-6" >
                <h1>Detalle de Noticia</h1>
                <?php if($this->noticia): ?>
                    <table class="table table-hover">
                        <tr>
                            <th>Id:</th>
                            <td><?= $this->noticia['id'] ?></td>
                        </tr>
                        <tr>
                            <th>Título:</th>
                            <td><?= $this->noticia['titulo'] ?></td>
                        </tr>
                        <tr>
                            <th>Descripción:</th>
                            <td><?= $this->noticia['descripcion'] ?></td>
                        </tr>
                        <tr>
                            <th>Vigente:</th>
                            <td>
                                <?php
                                    if($this->noticia['vigente'] == 1){
                                        echo 'Si';
                                    }else {
                                        echo 'No';
                                    }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <th>Autor:</th>
                            <td><?= $this->noticia['autor'] ?></td>
                        </tr>
                        <tr>
                            <th>Fecha de creación:</th>
                            <td><?= $this->noticia['created_at'] ?></td>
                        </tr>
                        <tr>
                            <th>Fecha de actualización:</th>
                            <td><?= $this->noticia['updated_at'] ?></td>
                        </tr>
                    </table>
                <?php else: ?>  
                    <p class="text-info">Dato no encontrado</p>  
                <?php endif; ?>
                <p>
                    <a href="<?= $_layoutParams['root'] ?>noticias" class="btn btn-primary">Volver</a>
                </p>
            </div>
        </div>
    </div>
</div>