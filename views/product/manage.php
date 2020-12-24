<h1>Gestión de productos</h1>

<a href="<?=base_url?>product/create" class="button small">Agregar producto</a>

<?php if(isset($_SESSION['product']) && $_SESSION['product'] == "complete"): ?>
    <strong class="alert_green">El producto se ha creado correctamente!</strong>
<?php elseif(isset($_SESSION['product']) && $_SESSION['product'] != "complete"):?>
    <strong class="alert_red">Ha ocurrido un error guardando el producto.</strong>
<?php endif; Utils::deleteSession('product');?>

<?php if(isset($_SESSION['delete']) && $_SESSION['delete'] == "complete"): ?>
    <strong class="alert_green">El producto se ha eliminado correctamente!</strong>
<?php elseif(isset($_SESSION['delete']) && $_SESSION['delete'] != "complete"):?>
    <strong class="alert_red">Ha ocurrido un error eliminando el producto.</strong>
<?php endif; Utils::deleteSession('delete');?>

<table>
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Precio</th>
        <th>Existencias</th>
        <th>Acciones</th>
    </tr>
    <?php while($pro = $products->fetch_object()): ?>
        <tr>
            <td><?= $pro->id_product ?></td>
            <td><?= $pro->name_product ?></td>
            <td><?= $pro->price_product ?></td>
            <td><?= $pro->stock_product ?></td>
            <td>
                <a href="<?=base_url?>product/edit&id=<?=$pro->id_product?>" class="button gestion blue">Editar</a>
                <a href="<?=base_url?>product/delete&id=<?=$pro->id_product?>" class="button gestion red">Eliminar</a>
            </td>
        </tr>
    <?php endwhile; ?>
</table>