<?php $subTitulo = "Direccion Table"; ?>
<?php include("src/layout/header.php"); ?>

<div class="table-container">
    <table class="custom-table">
        <thead>
            <tr>
                <th>Id</th>
                <th>calle</th>
                <th>estado</th>
                <th>ciudad</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($direcciones): ?>
                <?php foreach ($direcciones as $direccion): ?>
                    <tr>
                        <td><?= $direccion["id"]; ?></td>
                        <td><?= $direccion["calle"]; ?></td>
                        <td><?= get_estado($direccion["estados_id"])["estado"]; ?></td>
                        <td><?= get_ciudad($direccion["ciudades_id"])["ciudad"]; ?></td>
                        <td>
                            <a href="direccion_detail/<?= $direccion["id"] ?>" class="action-link">Editar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5">No hay direcciones</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

</body>

</html>