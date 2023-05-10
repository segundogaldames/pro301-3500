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
        <h1>Lista de Roles</h1>

        <pre>
            <?php print_r($this->roles); ?>
        </pre>

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
                    <td>Botones</td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php endif; ?>
    </div>

</section>