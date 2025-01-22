<?php $subTitulo = "Rol Table"; ?>
<?php include("src/layout/header.php"); ?>

<div class="table-container">
    <table class="custom-table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Rol</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($roles): ?>
                <?php foreach ($roles as $rol): ?>
                    <tr>
                        <td><?= $rol["id"]; ?></td>
                        <td><?= $rol["rol"]; ?></td>
                        <td>
                            <a href="rol_detail/<?= $rol["id"] ?>" class="action-link">Editar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="3">No hay Roles</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

</body>

</html>