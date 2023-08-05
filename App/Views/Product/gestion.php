<h2>Admin producto</h2>
<a href="<?= base_url ?>Product/registro" class="btn btn-primary mb-2">
    Crear producto
</a>

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
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($productos as $pro) : ?>
        <tr>
            <td scope="row"><?= $pro['id']; ?></td>
            <td><?= $pro['nombre_producto']; ?></td>
            <td><?= $pro['referencia']; ?></td>
            <td><?= $pro['precio']; ?></td>
            <td><?= $pro['peso']; ?></td>
            <td><?= $pro['categoria']; ?></td>
            <td><?= $pro['stock']; ?></td>
            <td><?= $pro['fecha_creacion']; ?></td>
            <td>
                <a class="btn btn-primary" href="<?= base_url . 'Product/actualizar?id=' . $pro['id']; ?>">
                    Actualizar
                </a>
                <a class="btn btn-danger" href="<?= base_url . 'Product/eliminar?id=' . $pro['id']; ?>">
                    Eliminar
                </a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>