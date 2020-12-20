<h1>Gestionar las categorias</h1>

<a href="<?=base_url?>category/create" class="button small">Crear categoría</a>

<table>
    <tr>
        <th>ID</th>
        <th>Nombre</th>
    </tr>
    <?php while($cat = $categories->fetch_object()): ?>
        <tr>
            <td><?= $cat->id_category ?></td>
            <td><?= $cat->name_category ?></td>
        </tr>
    <?php endwhile; ?>
</table>