<h1>Registrarse</h1>

<?php if(isset($_SESSION['register']) && $_SESSION['register'] == "complete"): ?>
<strong class="alert_green">Se ha registrado correctamente!</strong>
<?php elseif(isset($_SESSION['register']) && $_SESSION['register'] == "failed"): ?>
    <strong class="alert_red">Ha ocurrido un error al registrarse.</strong>
<?php endif;?>

<?php Utils::deleteSession('register')?>


<form action="<?= base_url ?>user/save" method="POST">
    <label for="name">Nombre</label>
    <input type="text" name="name" />

    <label for="last_name">Apellidos</label>
    <input type="text" name="last_name" />

    <label for="email">Email</label>
    <input type="email" name="email" />

    <label for="password">Contraseña</label>
    <input type="password" name="password" />

    <input type="file" name="image"/>

    <input type="submit" value="Guardar"/>
</form>