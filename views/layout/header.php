<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8"/>
        <title>Tienda de playeras</title>
        <link rel="stylesheet" type="text/css" href="<?= base_url ?>./styles/css/styles.css?v=<?php echo(rand()); ?>"/>
    </head>

    <body>
        <div id="container">
            <!-- Cabecera -->
            <header id="header">
                <div id="logo">
                    <img src="<?= base_url ?>./styles/img/camiseta.png" alt="Camiseta logo"/>
                    <a href="./index.php">
                        Tienda de playeras
                    </a>
                </div>
            </header>

            <!-- Menu -->
            <nav id="menu">
                <ul>
                    <li><a href="<?=base_url?>">Inicio</a></li>
                    <?php
                        $categories = Utils::showCategories();
                        while($cat = $categories->fetch_object()):
                    ?>
                        <li><a href="<?=base_url?>category/see&id=<?=$cat->id_category?>"><?= $cat->name_category ?></a></li>
                    <?php endwhile; ?>
                </ul>
            </nav>

            <div id="content">