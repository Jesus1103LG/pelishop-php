<?php $subTitulo = "Empresa Table"; ?>
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
            <?php foreach ($empresas as $empresa): ?>
                <?php if ($empresa["roles_id"] == 3): ?>
                    <tr>
                        <td><?= $empresa["identidad"] . "." . $empresa["cedula"]; ?></td>
                        <td><?= $empresa["nombre"]; ?></td>
                        <td><?= $empresa["email"]; ?></td>
                        <td><?= $empresa["telefono"]; ?></td>
                        <td><?= $empresa["direccion_id"]; ?></td>
                        <td><?= $empresa["fecha_nc"]; ?></td>
                        <td><?= $empresa["roles_id"] == 3 ? "Empresa" : "NSE"; ?></td>
                        <td class="password-display"><?= $empresa["password"]; ?></td>
                        <td><?= $empresa["create_at"]; ?></td>
                        <td>
                            <a href="empresa-detail/<?= $empresa["cedula"] ?>" class="action-link">Editar</a>
                        </td>
                    </tr>
                <?php endif; ?>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

</body>

</html>