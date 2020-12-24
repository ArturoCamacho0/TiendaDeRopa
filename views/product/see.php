<?php if(isset($pro)): ?>
    <h1><?= $pro->name_product ?></h1>

    <div id="detail_product">

        <div class="detail_image">
            <?php if($pro->image_product != null): ?>
                    <img src="<?= base_url ?>uploads/images/<?=$pro->image_product?>" alt="Producto"/>
            <?php else: ?>
                <img src="<?= base_url ?>styles/img/camiseta.png" alt="Producto"/>
            <?php endif; ?>
        </div>

        <div class="detail_data">
            <p class="description"><?=$pro->description_product?></p>
            <p class="price">$<?=$pro->price_product?></p>
            <a href="#" class="button">Comprar</a>
        </div>

    </div>

<?php else: ?>
    <h1>El producto no existe</h1>
<?php endif; ?>