<h2>Venta de producto</h2> 
<?php 
$action=base_url."venta/guardarVenta"; 
?>
<hr>
<form class="mb-4" action="<?= $action ?>" method="post">
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="id_producto">Producto</label>
            <select class="form-control" name="id_producto" id="id_producto">
                <?php while($pro = $ventas->fetch_object()) :?>
                <option value ="<?=$pro->id;?>"><?=$pro->nombre;?></option>
                <?php endwhile;?>
            </select>
        </div>
        <div class="form-group col-md-6">
            <label for="cantidad">Cantidad</label>
            <input type="number"
            class="form-control" name="cantidad" id="cantidad" 
            placeholder="Cantidad" required>
        </div>
    </div>
    
    <button type="submit" class="btn btn-primary">Confirmar</button>
</form>

