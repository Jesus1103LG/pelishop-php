<?php $subTitulo = "Productos Table"; ?>
<?php include("src/layout/header.php"); ?>

<div class="table-container" style="margin-top: 2rem;">
    <div style="display: flex; justify-content: space-between;">
        <h2><?= $subTitulo ?></h2>
        <a href="pruduct_create" class="action-link">Crear Pruducto</a>
    </div>
    <table class="custom-table">
        <thead>
            <tr>
                <th>Id</th>
                <th>nombre</th>
                <th>precio</th>
                <th>stock</th>
                <th>talla</th>
                <th>color</th>
                <th>distribuidor</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($productos): ?>
                <?php foreach ($productos as $producto): ?>
                    <tr>
                        <td><?= $producto["id"]; ?></td>
                        <td><?= $producto["nombre"]; ?></td>
                        <td><?= $producto["precio"]; ?></td>
                        <td><?= $producto["stock"]; ?></td>
                        <td><?= $producto["talla"]; ?></td>
                        <td><?= $producto["color"]; ?></td>
                        <td><?= get_persona_cedula($producto["persona_cedula"])["email"]; ?></td>
                        <td>
                            <a href="producto_detail/<?= $producto["id"] ?>" class="action-link">Editar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="8">No hay productos</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

</body>

</html>