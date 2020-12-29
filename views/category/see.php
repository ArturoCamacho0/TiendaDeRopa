<?php if(isset($category)): ?>
    <h1><?= $category->name_category ?></h1>

    <?php if($products->num_rows == 0): ?>
        <p>No hay productos para mostrar</p>
    <?php else: ?>

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
                <a href="<?=base_url?>cart/add&id=<?=$pro->id_product?>" class="button">Comprar</a>
            </div>
        <?php endwhile; ?>

    <?php endif; ?>

<?php else: ?>
    <h1>La categoría no existe</h1>
<?php endif; ?>