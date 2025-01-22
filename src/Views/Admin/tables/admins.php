<?php $subTitulo = "Admins Table"; ?>
<?php include("src/layout/header.php"); ?>

<div class="table-container">
    <table class="custom-table">
        <thead>
            <tr>
                <th>Cédula</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Teléfono</th>
                <th>Dirección</th>
                <th>Fecha Nacimiento</th>
                <th>Rol</th>
                <th>Password</th>
                <th>Created At</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($admins as $admin): ?>
                <?php if ($admin["roles_id"] == 1): ?>
                    <tr>
                        <td><?= $admin["identidad"] . "." . $admin["cedula"]; ?></td>
                        <td><?= $admin["nombre"]; ?></td>
                        <td><?= $admin["email"]; ?></td>
                        <td><?= $admin["telefono"]; ?></td>
                        <td><?= $admin["direccion_id"]; ?></td>
                        <td><?= $admin["fecha_nc"]; ?></td>
                        <td><?= $admin["roles_id"] == 1 ? "Admin" : "NSA"; ?></td>
                        <td class="password-display"><?= $admin["password"]; ?></td>
                        <td><?= $admin["create_at"]; ?></td>
                        <td>
                            <a href="admin-detail/<?= $admin["cedula"] ?>" class="action-link">Editar</a>
                        </td>
                    </tr>
                <?php endif; ?>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

</body>

</html>