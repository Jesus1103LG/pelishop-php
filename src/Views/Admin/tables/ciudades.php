<?php $subTitulo = "Estado Table"; ?>
<?php include("src/layout/header.php"); ?>

<div class="table-container">
    <table class="custom-table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Ciudad</th>
                <th>Estado</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($ciudades as $ciudad): ?>
                <tr>
                    <td><?= $ciudad["id"]; ?></td>
                    <td><?= $ciudad["ciudad"]; ?></td>
                    <td><?= get_estado($ciudad["estados_id"])["estado"]; ?></td>
                    <td>
                        <a href="ciudad-detail/<?= $ciudad["id"] ?>" class="action-link">Editar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

</body>

</html>