<h2>Admin producto</h2>

<a href="<?=base_url?>productos/registro" class="btn btn-primary">
crear producto</a>

<table class="table">
    <thead>
        <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Referencia</th>
            <th>Precio</th>
            <th>Peso</th>
            <th>Categoria</th>
            <th>Stock</th>
            <th>Fecha</th>
        </tr>
    </thead>
    <tbody>
        <?php while($pro = $productos->fetch_object()) :?>
        <tr>
            <td scope="row"><?=$pro->id;?></td>
            <td><?=$pro->nombre;?></td>
            <td><?=$pro->referencia;?></td>
            <td><?=$pro->precio;?></td>
            <td><?=$pro->peso;?></td>
            <td><?=$pro->categoria;?></td>
            <td><?=$pro->stock;?></td>
            <td><?=$pro->fecha_creacion;?></td>
        </tr>
        <tr>
            <td scope="row"></td>
            <td></td>
            <td></td>
        </tr>
        <?php endwhile;?>
    </tbody>
</table>