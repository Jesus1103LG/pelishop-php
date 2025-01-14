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
                <li class="customer-item">
                    <div class="customer-details">
                        <div class="customer-img">
                            <img src="/docs/images/people/profile-picture-1.jpg" alt="Neil image" />
                        </div>
                        <div class="customer-info">
                            <p class="customer-name">Neil Sims</p>
                            <p class="customer-email">email@windster.com</p>
                        </div>
                        <div class="customer-amount">$320</div>
                    </div>
                </li>
                <!-- More list items here, following the same structure -->
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
                    <li class="customer-item">
                        <div class="customer-details">
                            <div class="customer-img">
                                <img src="/docs/images/people/profile-picture-1.jpg" alt="Neil image" />
                            </div>
                            <div class="customer-info">
                                <p class="customer-name">Neil Sims</p>
                                <p class="customer-email">email@windster.com</p>
                            </div>
                            <div class="customer-amount">31.083.641</div>
                        </div>
                    </li>
                    <!-- More list items here, following the same structure -->
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
                    <li class="customer-item">
                        <div class="customer-details">
                            <div class="customer-img">
                                <img src="/docs/images/people/profile-picture-1.jpg" alt="Neil image" />
                            </div>
                            <div class="customer-info">
                                <p class="customer-name">Neil Sims</p>
                                <p class="customer-email">email@windster.com</p>
                            </div>
                            <div class="customer-amount">31.083.641</div>
                        </div>
                    </li>
                    <!-- More list items here, following the same structure -->
                </ul>
            </div>
        </div>

    </div>
</main>
</body>

</html>