<h1>Detalle del pedido</h1>

<?php if(isset($order_list)): ?>
    <h3>Datos del pedido</h3> <br/>
    Número del pedido: <?= $order_list->id_order; ?> <br/><br/>
    Total a pagar: <?= $order_list->cost_order; ?> <br/><br/>
    Fecha: <?= $order_list->date_order; ?> <br/><br/>
    Estatus: 
    <?php if($order_list->status_order == "confirm"): ?>
        Pendiente
    <?php elseif($order_list->status_order == "preparation"): ?>
        En preparación
    <?php elseif($order_list->status_order == "ready"): ?>
        Preparado para enviar
    <?php elseif($order_list->status_order == "sended"): ?>
        Enviado
    <?php endif; ?> <br/><br/>

    <?php if(isset($_SESSION['admin'])): ?>
        <h3>Cambiar el estado del pedido</h3> <br/>
        <form action="<?= base_url ?>order/status" method="POST">
            <input type="hidden" value="<?=$order_list->id_order?>" name="order_id" />
            <select name="status">
                <option value="confirm"
                    <?= $order_list->status_order == 'confirm' ? 'selected' : ''; ?> >
                    Pendiente
                </option>
                <option value="preparation"
                    <?= $order_list->status_order == 'preparation' ? 'selected' : ''; ?> >
                    En preparación
                </option>
                <option value="ready"
                    <?= $order_list->status_order == 'ready' ? 'selected' : ''; ?>>
                    Preparado para enviar
                </option>
                <option value="sended"
                    <?= $order_list->status_order == 'sended' ? 'selected' : ''; ?>>
                    Enviado
                </option>
            </select>

            <input type="submit" value="Cambiar estado"/>
        </form><br/>
    <?php endif; ?>

    <h3>Dirección del envío</h3> <br/>
        Provincia: <?= $order_list->province_order; ?> <br/><br/>
        Localidad: <?= $order_list->locality_order; ?> <br/><br/>
        Dirección: <?= $order_list->direction_order; ?> <br/><br/>

    <h3>Productos</h3><br/><br/>
    <table>
        <tr>
            <th>Imágen</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Unidades</th>
        </tr>
        
        <?php while($product = $products->fetch_object()): ?>
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