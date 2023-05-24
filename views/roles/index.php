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
        <h1>
            Lista de Roles
            <a href="<?= $_layoutParams['root'] ?>roles/create">Nuevo Rol</a>
        </h1>

        <?php if(Session::get('msg_success')): ?>
            <p class="alert-success"><?= Session::get('msg_success'); ?></p>
        <?php 
            endif; 
            Session::destroy('msg_success');
        ?>

        <?php if(isset($this->roles) && count($this->roles)): ?>
            <table class="table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Rol</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($this->roles as $rol): ?>
                    <tr>
                        <td><?= $rol['id'] ?></td>
                        <td><?= $rol['nombre'] ?></td>
                        <td>
                            <a href="<?= $_layoutParams['root'] ?>roles/show/<?= $rol['id'] ?>">Ver</a>
                            <a href="<?= $_layoutParams['root'] ?>roles/edit/<?= $rol['id'] ?>">Editar</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p class="text-info">No hay roles disponibles</p>
        <?php endif; ?>
    </div>

</section>