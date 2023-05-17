<!--seccion principal-->
<section>
    <aside>
        <ul>
            <li>
                <a href="<?= $_layoutParams['root'] ?>roles">Roles</a>
            </li>
            <li>
                <a href="#">Categoría 2</a>
            </li>
            <li>
                <a href="#">Categoría 3</a>
            </li>
            <li>
                <a href="#">Categoría 4</a>
            </li>
        </ul>
    </aside>

    <div>
        <h1>Detalle de Rol</h1>
        <?php if($this->rol): ?>
            <table class="table">
                <tr>
                    <th>Id:</th>
                    <td><?= $this->rol['id'] ?></td>
                </tr>
                <tr>
                    <th>Nombre:</th>
                    <td><?= $this->rol['nombre'] ?></td>
                </tr>
                <tr>
                    <th>Fecha de creación:</th>
                    <td><?= $this->rol['created_at'] ?></td>
                </tr>
                <tr>
                    <th>Fecha de actualización:</th>
                    <td><?= $this->rol['updated_at'] ?></td>
                </tr>
            </table>
        <?php else: ?>  
            <p class="text-info">Dato no encontrado</p>  
        <?php endif; ?>
        <p>
            <a href="<?= $_layoutParams['root'] ?>roles" class="btn btn-primary">Volver</a>
        </p>
    </div>

</section>