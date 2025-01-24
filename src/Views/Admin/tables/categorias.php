<?php $subTitulo = "Categoria Table"; ?>
<?php include("src/layout/header.php"); ?>

<div class="table-container" style="margin-top: 2rem;">
    <div style="display: flex; justify-content: space-between;">
        <h2><?= $subTitulo ?></h2>
        <a href="categoria_create" class="action-link">Crear Categoria</a>
    </div>
    <table class="custom-table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Categoria</th>
                <th>Descripcion</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($categorias): ?>
                <?php foreach ($categorias as $categoria): ?>
                    <tr>
                        <td><?= $categoria["id"]; ?></td>
                        <td><?= $categoria["categoria"]; ?></td>
                        <td><?= $categoria["descripcion"] != "" ? $categoria["descripcion"] : "No hay descripcion"; ?></td>
                        <td>
                            <a href="categoria_detail/<?= $categoria["id"] ?>" class="action-link">Editar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4">No hay Categorias</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

</body>

</html>