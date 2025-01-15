<?php $subTitulo = "Home"; ?>
<?php include("src/layout/header.php"); ?>

<main class="main-admin">
    <div class="container">
        <a href="#" class="card">
            <h5 class="card-title">Cantidad de Ventas</h5>
            <p class="card-description"><?= $cant_ventas ?></p>
        </a>
        <a href="#" class="card">
            <h5 class="card-title">Cantidad de Clientes</h5>
            <p class="card-description"><?= $cant_clientes ?></p>
        </a>
        <a href="#" class="card">
            <h5 class="card-title">Cantidad de Empresas</h5>
            <p class="card-description"><?= $cant_empresas ?></p>
        </a>
        <a href="#" class="card">
            <h5 class="card-title">Cantidad de Productos</h5>
            <p class="card-description"><?= $cant_productos ?></p>
        </a>
        <a href="#" class="card">
            <h5 class="card-title">Cantidad de Categorias</h5>
            <p class="card-description"><?= $cant_categorias ?></p>
        </a>
        <a href="#" class="card">
            <h5 class="card-title">Cantidad de Admins</h5>
            <p class="card-description"><?= $cant_admins ?></p>
        </a>
    </div>
    <div class="customer-card">
        <div class="customer-header">
            <h5 class="customer-title">Lista Ventas Recientes</h5>
            <a href="#" class="view-all">View all</a>
        </div>
        <div class="customer-list">
            <ul role="list" class="customer-items">
                <?php
                if ($cant_ventas == 0)
                    include("src/components/ElementListVenta.php")
                ?>
                <?php foreach ($ventas as $venta => $key): ?>
                    <?php
                    if ($key < 5)
                        include("src/components/ElementListVenta.php");
                    ?>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
    <div class="listas-personas">
        <div class="customer-card">
            <div class="customer-header">
                <h5 class="customer-title">Lista de Clientes</h5>
                <a href="#" class="view-all">View all</a>
            </div>
            <div class="customer-list">
                <ul role="list" class="customer-items">
                    <?php $contador = 0; ?>
                    <?php foreach ($personas as $key => $persona): ?>
                        <?php
                        if ($persona["roles_id"] == 2) {
                            include("src/components/ElementListPerson.php");
                            if ($contador < 4) $contador++;
                            else break;
                        }
                        ?>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
        <div class="customer-card">
            <div class="customer-header">
                <h5 class="customer-title">Lista de Empresas</h5>
                <a href="#" class="view-all">View all</a>
            </div>
            <div class="customer-list">
                <ul role="list" class="customer-items">
                    <?php $contadorr = 0; ?>
                    <?php foreach ($personas as $persona): ?>
                        <?php
                        if ($persona["roles_id"] == 3) {
                            include("src/components/ElementListPerson.php");
                            if ($contadorr < 4) $contadorr++;
                            else break;
                        }
                        ?>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>

    </div>
</main>
</body>

</html>