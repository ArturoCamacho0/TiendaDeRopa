                <h1>Algunos de nuestros productos</h1>

                <?php while($pro = $products->fetch_object()): ?>
                        <div class="product">
                            <a href="<?=base_url?>product/see&id=<?=$pro->id_product?>">
                                <?php if($pro->image_product != null): ?>
                                        <img src="<?= base_url ?>uploads/images/<?=$pro->image_product?>" alt="Producto"/>
                                <?php else: ?>
                                    <img src="<?= base_url ?>styles/img/camiseta.png" alt="Producto"/>
                                <?php endif; ?>
                                <h2><?=$pro->name_product?></h2>
                            </a>
                            <p><?=$pro->price_product?></p>
                            <a href="#" class="button">Comprar</a>
                        </div>
                    </a>
                <?php endwhile; ?>
                </div>