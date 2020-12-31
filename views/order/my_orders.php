<?php if(isset($manage)): ?>
    <h1>Gestionar pedidos</h1>
<?php else: ?>
    <h1>Mis pedidos</h1>
<?php endif; ?>

<table>
    <tr>
        <th>Número del pedido</th>
        <th>Coste del pedido</th>
        <th>Fecha del pedido</th>
        <?php if(isset($manage)): ?>
            <th>Estatus del pedido</th>
        <?php endif; ?>
    </tr>

    <?php while($order = $orders->fetch_object()): ?>
        <tr>
            <td><a href="<?=base_url?>order/detail&id=<?=$order->id_order?>"><?=$order->id_order ?></a></td>
            <td><?=$order->cost_order ?></td>
            <td><?=$order->date_order ?></td>
            <?php if(isset($manage)): ?>
                <td><?=$order->status_order ?></td>
            <?php endif; ?>
        </tr>
    <?php endwhile; ?>
</table>