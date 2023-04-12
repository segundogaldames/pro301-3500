<?php
    $saludo = 'Hola mundo del programador';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal de Noticias</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@200;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <header>
        <div>
            <?= $saludo; ?>
        </div>
        <div></div>
        <div></div>
        <div>Hola</div>
        <div></div>
        <div style="text-align: end;margin-top: 10px;">
            <div class="instagram">
                <a href="https://www.instagram.com/profesorgaldames/" target="_blank">
                    <img src="img/img-instagram.jpg" alt="Instagram" width="25">
                </a>
            </div>
        </div>

    </header>
    <nav>
        <ul>
            <li>
                <a href="index.html">Inicio</a>
            </li>
            <li>
                <a href="#">Acerca de</a>
            </li>
            <li>
                <a href="#">Contacto</a>
            </li>
        </ul>
    </nav>
    <section>
        <aside>
            <ul>
                <li>
                    <a href="#">Categoría 1</a>
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

        <div class="noticias">
            <a href="#">
                <div class="articulo">
                    <div class="imagen">
                        <img src="img/noticias/noticia_1.jpeg" alt="" width="100%">
                    </div>
                    <div class="title-articulo">
                        <h1 class="title-noticia">Titulo de la noticia</h1>
                    </div>
                    <div class="texto">
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Recusandae similique laborum amet
                            accusantium, harum ducimus distinctio autem, facere inventore nam nobis quod atque ipsum
                            blanditiis sed dolores, adipisci iure consequuntur.</p>
                    </div>
                </div>
            </a>

        </div>
        <div class="noticias">
            <a href="#">
                <div class="articulo">
                    <div class="imagen">
                        <img src="img/noticias/noticia_1.jpeg" alt="" width="100%">
                    </div>
                    <div class="title-articulo">
                        <h1 class="title-noticia">Titulo de la noticia</h1>
                    </div>
                    <div class="texto">
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Recusandae similique laborum amet
                            accusantium, harum ducimus distinctio autem, facere inventore nam nobis quod atque ipsum
                            blanditiis sed dolores, adipisci iure consequuntur.</p>
                    </div>
                </div>
            </a>

        </div>
        <div class="noticias">
            <a href="#">
                <div class="articulo">
                    <div class="imagen">
                        <img src="img/noticias/noticia_1.jpeg" alt="" width="100%">
                    </div>
                    <div class="title-articulo">
                        <h1 class="title-noticia">Titulo de la noticia</h1>
                    </div>
                    <div class="texto">
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Recusandae similique laborum amet
                            accusantium, harum ducimus distinctio autem, facere inventore nam nobis quod atque ipsum
                            blanditiis sed dolores, adipisci iure consequuntur.</p>
                    </div>
                </div>
            </a>

        </div>
        <div class="noticias">
            <a href="#">
                <div class="articulo">
                    <div class="imagen">
                        <img src="img/noticias/noticia_1.jpeg" alt="" width="100%">
                    </div>
                    <div class="title-articulo">
                        <h1 class="title-noticia">Titulo de la noticia</h1>
                    </div>
                    <div class="texto">
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Recusandae similique laborum amet
                            accusantium, harum ducimus distinctio autem, facere inventore nam nobis quod atque ipsum
                            blanditiis sed dolores, adipisci iure consequuntur.</p>
                    </div>
                </div>
            </a>

        </div>

    </section>
    <footer>
        Pie de pagina
    </footer>
</body>

</html>