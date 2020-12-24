<?php if(isset($edit) && isset($pro) && is_object($pro)):
    $url_action = base_url."product/save&id=".$pro->id_product;?>
    <h1>Editar producto <?="[".$pro->id_product."] ".$pro->name_product?></h1>
<?php else: $url_action = base_url."product/save";?>
    <h1>Crear producto</h1>
    
<?php endif; ?>

<form action="<?=$url_action?>" method="POST" enctype="multipart/form-data">
    <label for="name">Nombre</label>
    <input type="text" name="name" value="<?=isset($pro) ? $pro->name_product : ""?>" required/>

    <label for="description">Descripción</label>
    <textarea name="description" required><?=isset($pro) ? $pro->description_product : ""?></textarea>

    <label for="price" required>Precio</label>
    <input type="number" name="price" value="<?=isset($pro) ? $pro->price_product : ""?>" step="any"/>

    <label for="stcok" required>Existencias</label>
    <input type="number" name="stock" value="<?=isset($pro) ? $pro->stock_product : ""?>"/>

    <label for="off">Descuento(%)</label>
    <input type="number" name="off" value="<?=isset($pro) ? $pro->off_product : ""?>"/>

    <label for="image">Imágen</label>
    <?php if(isset($pro) && is_object($pro) && !empty($pro->image_product)): ?>
        <img src="<?=base_url?>uploads/images/<?=$pro->image_product?>" class="tumb" alt="product"/>
    <?php endif; ?>
    <input type="file" name="image"/>

    <label for="category">Categoría</label>
    <select name="category">
        <?php
            $categories = Utils::showCategories();
            while($cat = $categories->fetch_object()):
        ?>
            <option value="<?=$cat->id_category?>" <?=isset($pro) && is_object($pro) && $cat->id_category == $pro->category_id ? 'selected' : '' ?>><?= $cat->name_category ?></option>
            
        <?php endwhile; ?>
    </select>

    <input type="submit" value="Guardar"/>
</form>