<h1>registro de productros</h1>
<?php
if(isset($_SESSION['register']) && $_SESSION['register']):  ?>
    <strong>Producto ingresado</strong>
<?php else: ?>
    <strong>Ha ocurrido un error</strong>
<?php endif; ?>

<form class="form form-inline" action="<?=base_url?>productos/guardar" method="post">
    <div class="form-group">
      <label for="nombre">Nombre</label>
      <input type="text"
        class="form-control" name="nombre" id="nombre" placeholder="Nombre">
    </div>
    <div class="form-group">
      <label for="referencia">Referencia</label>
      <input type="text"
        class="form-control" name="referencia" id="referencia" placeholder="Referencia">
    </div>
    <div class="form-group">
      <label for="precio">Precio</label>
      <input type="number"
        class="form-control" name="precio" id="precio" placeholder="Precio">
    </div>
    <div class="form-group">
      <label for="peso">Peso</label>
      <input type="number"
        class="form-control" name="peso" id="peso" placeholder="Peso">
    </div>
    <div class="form-group">
      <label for="categoria">Categoria</label>
      <input type="text"
        class="form-control" name="categoria" id="categoria" placeholder="Categoria">
    </div>
    <div class="form-group">
      <label for="stock">Stock</label>
      <input type="number"
        class="form-control" name="stock" id="stock" placeholder="Stock">
    </div>
    <div class="form-group">
      <label for="fecha">Fecha Creacion</label>
      <input type="date"
        class="form-control" name="fecha" id="fecha" >
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

