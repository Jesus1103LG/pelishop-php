<?php $subTitulo = "Cliente Table"; ?>
<?php include("src/layout/header.php"); ?>

<div class="table-container">
    <table class="custom-table">
        <thead>
            <tr>
                <th>Cédula</th>
                <th>Identidad</th>
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
            <?php foreach ($clientes as $cliente): ?>
                <?php if ($cliente["roles_id"] == 2): ?>
                    <tr>
                        <td><?= $cliente["cedula"]; ?></td>
                        <td><?= $cliente["identidad"]; ?></td>
                        <td><?= $cliente["nombre"]; ?></td>
                        <td><?= $cliente["email"]; ?></td>
                        <td><?= $cliente["telefono"]; ?></td>
                        <td><?= $cliente["direccion_id"]; ?></td>
                        <td><?= $cliente["fecha_nc"]; ?></td>
                        <td><?= $cliente["roles_id"] == 2 ? "Cliente" : "NSC"; ?></td>
                        <td class="password-display"><?= $cliente["password"]; ?></td>
                        <td><?= $cliente["create_at"]; ?></td>
                        <td>
                            <a href="cliente-detail/<?= $cliente["cedula"] ?>" class="action-link">Editar</a>
                        </td>
                    </tr>
                <?php endif; ?>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

</body>

</html>