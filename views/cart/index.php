<h1>Carrito de la compra</h1>

<?php if (isset($_SESSION['order']) && $_SESSION['order'] == "failed"): ?>
    <strong class="alert_red">Ha ocurrido un error con el pedido</strong>
    <?php unset($_SESSION['order']); ?>
<?php endif; ?>

<table>
    <tr>
        <th>Imágen</th>
        <th>Nombre</th>
        <th>Precio</th>
        <th>Unidades</th>
    </tr>

    <?php 
    foreach($cart as $index => $element):
        $product = $element['product'];
    ?>
        
        <tr>
            <td>
                <?php if($product->image_product != null): ?>
                    <img class="img_cart" src="<?= base_url ?>uploads/images/<?=$product->image_product?>" alt="Producto"/>
                <?php else: ?>
                    <img class="img_cart" src="<?= base_url ?>styles/img/camiseta.png" alt="Producto"/>
                <?php endif; ?>
            </td>

            <td>
                <a href="<?= base_url ?>product/see&id=<?= $product->id_product ?>"><?= $product->name_product ?></a>
            </td>

            <td><?= $product->price_product ?></td>
            
            <td><?= $element['units'] ?></td>
        </tr>
    <?php endforeach; ?>
</table>

<br/>

<?php $stats = Utils::stats_cart(); ?>

<div class="order">
    <h3>Precio total: $<?= $stats['total']; ?> </h3>
    
    <a href="<?=base_url?>order/index" class="button _cart">Hacer pedido</a>
</div>