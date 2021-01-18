<?php 

    require_once "../../clases/Categorias.php";

    $obj = new Categorias();

    $mostrar = $obj->consultar_categorias();

?>

<select name="s_categoria" id="s_categoria" class="form-control">
    <option value="">Seleccione una opción</option>
    <?php foreach ($mostrar as $key): ?>
        <option value="<?php echo $key['id_categoria']; ?>"><?php echo $key['nombre']; ?></option>
    <?php endforeach; ?>
</select>