<!-- venta_form.php -->
<h2>Venta de producto</h2>
<?php 
$action = base_url . "venta/guardar"; 
?>
<hr>
<form class="mb-4" action="<?= $action ?>" method="post">
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="id_producto">Producto</label>
            <select class="form-control" name="id_producto" id="id_producto">
                <?php foreach ($productos as $pro) : ?>
                <option value="<?= $pro['id']; ?>"><?= $pro['nombre_producto']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group col-md-6">
            <label for="cantidad">Cantidad</label>
            <input type="number" class="form-control" name="cantidad" id="cantidad" placeholder="Cantidad" required>
        </div>
    </div>

    <button type="submit" class="btn btn-primary">Confirmar</button>
</form>