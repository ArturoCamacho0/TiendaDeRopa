<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8"/>
        <title>Tienda de playeras</title>
        <link rel="stylesheet" type="text/css" href="./styles/css/styles.css?v=<?php echo(rand()); ?>"/>
    </head>

    <body>
        <div id="container">
            <!-- Cabecera -->
            <header id="header">
                <div id="logo">
                    <img src="./styles/img/camiseta.png" alt="Camiseta logo"/>
                    <a href="./index.php">
                        Tienda de playeras
                    </a>
                </div>
            </header>

            <!-- Menu -->
            <nav id="menu">
                <ul>
                    <li><a href="#">Inicio</a></li>
                    <li><a href="#">Categoría 1</a></li>
                    <li><a href="#">Categoría 2</a></li>
                    <li><a href="#">Categoría 3</a></li>
                    <li><a href="#">Categoría 4</a></li>
                    <li><a href="#">Categoría 5</a></li>
                    <li><a href="#">Categoría 6</a></li>
                </ul>
            </nav>

            <div id="content">
                <!-- Barra lateral -->
                <aside id="lateral">
                    <div id="login" class="block_aside">
                        <h3>Entrar a la web</h3>
                        <form action="" method="post">
                            <label for="email">Email</label>
                            <input type="email" name="email"/>
                            <label for="password">Contraseña</label>
                            <input type="password" name="password"/>
                            <input type="submit" value="Enviar"/>
                        </form>

                        <ul>
                            <li><a href="#">Mis pedidos</a></li>
                            <li><a href="#">Gestionar pedidos</a></li>
                            <li><a href="#">Gestionar categorías</a></li>
                        </ul>
                    </div>
                </aside>

                <!-- Contenido central -->
                <div id="central">
                    <h1>Productos destacados</h1>
                    <div class="product">
                        <img src="./styles/img/camiseta.png" alt="Camiseta"/>
                        <h2>Camiseta azul ancha</h2>
                        <p>30$</p>
                        <a href="#" class="button">Comprar</a>
                    </div>

                    <div class="product">
                        <img src="./styles/img/camiseta.png" alt="Camiseta"/>
                        <h2>Camiseta azul ancha</h2>
                        <p>30$</p>
                        <a href="#" class="button">Comprar</a>
                    </div>

                    <div class="product">
                        <img src="./styles/img/camiseta.png" alt="Camiseta"/>
                        <h2>Camiseta azul ancha</h2>
                        <p>30$</p>
                        <a href="#" class="button">Comprar</a>
                    </div>
                </div>
            </div>
            <!-- Pie de página -->
            <footer id="footer">
                <p>
                    Desarrollado por Arturo Camacho Hernández &copy; <?= date('Y') ?>
                </p>
            </footer>
        </div>
    </body>
</html>