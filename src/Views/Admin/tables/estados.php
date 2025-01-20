<?php $subTitulo = "Estado Table"; ?>
<?php include("src/layout/header.php"); ?>

<div class="table-container">
    <table class="custom-table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Estado</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($estados as $estado): ?>
                <tr>
                    <td><?= $estado["id"]; ?></td>
                    <td><?= $estado["estado"]; ?></td>
                    <td>
                        <a href="estado-detail/<?= $estado["id"] ?>" class="action-link">Editar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

</body>

</html>