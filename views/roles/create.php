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
        <h1>Nuevo Rol</h1>
        <?php if(Session::get('msg_error')): ?>
            <p class="alert-danger"><?= Session::get('msg_error'); ?></p>
        <?php 
            endif; 
            Session::destroy('msg_error');
        ?>

        <form action="<?= $_layoutParams['root'] . $this->process; ?>" method="post">
            <label for="nombre">Rol</label>
            <input type="text" name="nombre" id="">
            <input type="hidden" name="send" value="<?= $this->send; ?>">
            <button type="submit">Guardar</button>
        </form>
    </div>

</section>