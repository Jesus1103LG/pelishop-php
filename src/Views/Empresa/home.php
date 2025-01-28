<?php $subTitulo = "Home"; ?>
<?php include("src/layout/header.php"); ?>

<main class="table-container" style="margin-top: 2rem;">
    <div style="display: flex; justify-content: space-between;">
        <h2>Listado de mis Productos</h2>
        <a href="producto_create" class="action-link">Crear Productos</a>
    </div>
    <table class="custom-table">
        <thead>
            <tr>
                <th>IMG</th>
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
                        <td><img style="width: 40px; height: 40px; object-fit: cover; border-radius: 100%;" src="/peliShop_PHP/src/uploads/<?= $producto["foto_producto"] ?>" alt=""></td>
                        <td><?= $producto["nombre"]; ?></td>
                        <td><?= $producto["precio"]; ?></td>
                        <td><?= $producto["stock"]; ?></td>
                        <td><?= $producto["talla"]; ?></td>
                        <td><?= $producto["color"]; ?></td>
                        <td><?= $persona["email"]; ?></td>
                        <td>
                            <a href="producto_detail/<?= $producto["id"] ?>" class="action-link">Editar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="8">No tienes ningun productos</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</main>

</body>

</html>