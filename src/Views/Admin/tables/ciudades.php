<?php $subTitulo = "Ciudad Table"; ?>
<?php include("src/layout/header.php"); ?>

<div class="table-container" style="margin-top: 2rem;">
    <div style="display: flex; justify-content: space-between;">
        <h2><?= $subTitulo ?></h2>
        <a href="ciudad_create" class="action-link">Crear Ciudad</a>
    </div>
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
            <?php if ($ciudades): ?>
                <?php foreach ($ciudades as $ciudad): ?>
                    <tr>
                        <td><?= $ciudad["id"]; ?></td>
                        <td><?= $ciudad["ciudad"]; ?></td>
                        <td><?= get_estado($ciudad["estados_id"])["estado"]; ?></td>
                        <td>
                            <a href="ciudad_detail/<?= $ciudad["id"] ?>" class="action-link">Editar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4">No hay ciudades</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

</body>

</html>