                <!-- Barra lateral -->
                <aside id="lateral">
                    <div id="login" class="block_aside">
                    <?php if(!isset($_SESSION['identity'])): ?>
                        <h3>Entrar a la web</h3>
                        <form action="<?=base_url?>user/login" method="POST">
                            <label for="email">Email</label>
                            <input type="email" name="email"/>
                            <label for="password">Contraseña</label>
                            <input type="password" name="password"/>
                            <input type="submit" value="Enviar"/>
                        </form>

                    <?php else: ?>
                        <h3><?= $_SESSION['identity']->name_user ?> <?= $_SESSION['identity']->last_name_user ?></h3>
                    <?php endif; ?>

                        <ul>
                        <?php if(isset($_SESSION['identity'])): ?>
                            <li><a href="#">Mis pedidos</a></li>

                            <?php if(isset($_SESSION['admin'])): ?>
                                <li><a href="<?=base_url?>category/index">Gestionar categorías</a></li>
                                <li><a href="<?=base_url?>product/manage">Gestionar productos</a></li>
                                <li><a href="#">Gestionar pedidos</a></li>
                            <?php endif; ?>
                            
                            <li><a href="<?=base_url?>user/logout">Cerrar sesión</a></li>
                        <?php else: ?>
                            <li><a href="<?=base_url?>user/register">Registrarse</a></li>
                        <?php endif; ?>
                        </ul>
                    </div>

                    <div id="cart" class="block_aside">
                        <h3>Mi carrito</h3>
                        <ul>
                            <?php $stats = Utils::stats_cart();  ?>
                            <li>Productos (<?= $stats['count'] ?>)</li>
                            <li>Total de los productos $<?= $stats['total'] ?></li>
                            <li><a href="<?=base_url?>cart/index">Ver el carrito</a></li>
                        </ul>
                    </div>

                </aside>

                <!-- Contenido central -->
                <div id="central">