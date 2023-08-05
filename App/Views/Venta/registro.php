<h2>Ventas</h2>
<a href="<?= base_url ?>Venta/gestion" class="btn btn-primary mb-2">
    Crear Venta
</a>

<table class="table">
    <thead>
        <tr>
            <th>id</th>
            <th>Nombre Producto</th>
            <th>Cantidad</th>
            <th>Precio</th>
            <th>Stock</th>
            <th>Fecha</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($productos as $pro) : ?>
        <tr>
            <td scope="row"><?= $pro['id']; ?></td>
            <td><?= $pro['nombre_producto']; ?></td>
            <td><?= $pro['cantidad']; ?></td>
            <td><?= $pro['precio']; ?></td>
            <td><?= $pro['stock']; ?></td>
            <td><?= $pro['fecha']; ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>