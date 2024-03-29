<?php if (isset($actual)) : ?>
<h2>Actualizar producto</h2>
<?php 
  $action = base_url . 'Product/actualizar';
  ?>
<?php else : ?>
<h2>Registro de productos</h2>
<?php $action = base_url . 'Product/guardar'; ?>
<?php endif; ?>
<hr>
<form class="mb-4" action="<?= $action ?>" method="post">
    <div class="form-row">
        <input type="text" name="id" id="id" hidden value="<?= isset($pro) ? $pro->id : "" ?>">
        <div class="form-group col-md-4">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre"
                value="<?= isset($pro) ? $pro->nombre_producto : "" ?>" required>
        </div>
        <div class="form-group col-md-4">
            <label for="referencia">Referencia</label>
            <input type="text" class="form-control" name="referencia" id="referencia" placeholder="Referencia"
                value="<?= isset($pro) ? $pro->referencia : "" ?>" required>
        </div>
        <div class="form-group col-md-4">
            <label for="categoria">Categoria</label>
            <input type="text" class="form-control" name="categoria" id="categoria" placeholder="Categoria"
                value="<?= isset($pro) ? $pro->categoria : "" ?>" required>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-3">
            <label for="precio">Precio</label>
            <input type="number" class="form-control" name="precio" id="precio" placeholder="Precio"
                value="<?= isset($pro) ? $pro->precio : "" ?>" required>
        </div>
        <div class="form-group col-md-3">
            <label for="peso">Peso</label>
            <input type="number" class="form-control" name="peso" id="peso" placeholder="Peso"
                value="<?= isset($pro) ? $pro->peso : "" ?>" required>
        </div>
        <div class="form-group col-md-3">
            <label for="stock">Stock</label>
            <input type="number" class="form-control" name="stock" id="stock" placeholder="Stock"
                value="<?= isset($pro) ? $pro->stock : "" ?>" required>
        </div>
        <div class="form-group col-md-3">
            <label for="fecha">Fecha Creacion</label>
            <input type="date" class="form-control" name="fecha" id="fecha"
                value="<?= isset($pro) ? $pro->fecha_creacion : "" ?>" required>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

<?php if (isset($respuesta)) : ?>
<div class="bg bg-success text-white w-25 p-2">
    <strong><?= $respuesta ?></strong>
</div>
<?php endif; ?>