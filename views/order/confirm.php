<h1 class="alert_green">Tu pedido se ha confirmado!</h1>

<p>
    Tu pedido ha sido guardado con éxito, una vez que realices la transferencia
    bancaria con el coste del pedido, será procesado y enviado.
</p>

<br/>

<h3>Datos del pedido: </h3><br/>
<?php if(isset($order_user)): ?>
    Número del pedido: <?= $order_user->id_order; ?> <br/><br/>
    Total a pagar: <?= $order_user->cost_order; ?> <br/><br/>

    Productos:<br/><br/>
    <table>
        <tr>
            <th>Imágen</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Unidades</th>
        </tr>
        
        <?php while($product = $order_products->fetch_object()): ?>
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
                
                <td><?= $product->units ?></td>
            </tr>
        <?php endwhile; ?>
    </table>
<?php endif; ?>