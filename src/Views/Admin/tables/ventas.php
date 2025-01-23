<?php $subTitulo = "Venta Table"; ?>
<?php include("src/layout/header.php"); ?>

<div class="table-container">
    <table class="custom-table">
        <thead>
            <tr>
                <th>Id</th>
                <th>fecha</th>
                <th>monto</th>
                <th>Persona</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($ventas): ?>
                <?php foreach ($ventas as $venta): ?>
                    <tr>
                        <td><?= $venta["id"]; ?></td>
                        <td><?= $venta["fecha"]; ?></td>
                        <td><?= $venta["monto"]; ?></td>
                        <td><?= get_persona_cedula($venta["persona_cedula"])["nombre"]; ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4">No hay ventas</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

</body>

</html>