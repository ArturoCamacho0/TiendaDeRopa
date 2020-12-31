<?php if(isset($_SESSION['identity'])): ?>
    <h1>Hacer pedido</h1>

    <form action="<?=base_url?>order/add" method="POST">
        <label for="province">Provincia</label>
        <input type="text" name="province"/>

        <label for="location">Ciudad</label>
        <input type="text" name="location"/>

        <label for="direction">Dirección</label>
        <input type="text" name="direction"/>

        <input type="submit" value="Confirmar pedido"/>
    </form>

    <br/>
    <a href="<?=base_url?>cart/index">Ver los productos y el total...</a>
<?php else: ?>
    <h1>No estás identificado</h1>
    <p>Necesitas identificarte para realizar un pedido.</p>
<?php endif; ?>