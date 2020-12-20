<h1>Crear una nueva categoría</h1>

<form action="<?=base_url?>category/save" method="POST">
    <label for="name">Nombre de la categoría</label>
    <input type="text" name="name" required/>

    <input type="submit" value="Guardar"/>
</form>