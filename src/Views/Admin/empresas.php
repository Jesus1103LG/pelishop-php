<?php $subTitulo = "Empresa Table"; ?>
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
                <th>Rol</th>
                <th>Password</th>
                <th>Created At</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>12345678</td>
                <td>1234-5678-9012</td>
                <td>Juan Pérez</td>
                <td>juan@example.com</td>
                <td>555-1234</td>
                <td>Calle 123, Ciudad</td>
                <td>Admin</td>
                <td>*******</td>
                <td>2023-01-01</td>
                <td>
                    <a href="#" class="action-link">Editar</a>
                </td>
            </tr>
            <tr>
                <td>87654321</td>
                <td>4321-8765-2109</td>
                <td>María López</td>
                <td>maria@example.com</td>
                <td>555-5678</td>
                <td>Calle 456, Ciudad</td>
                <td>Usuario</td>
                <td>*******</td>
                <td>2023-01-02</td>
                <td>
                    <a href="#" class="action-link">Editar</a>
                </td>
            </tr>
            <!-- Más filas aquí -->
        </tbody>
    </table>
</div>

</body>

</html>