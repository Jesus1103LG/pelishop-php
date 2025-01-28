<?php $subTitulo = "Shop"; ?>
<?php include("src/layout/header.php"); ?>

<main class="main">
    <section class="main-contenido">
        <div class="buscador">
            <img
                class="buscador-lupa"
                src="/peliShop_PHP/src/public/busqueda.svg"
                alt="Lupa de busqueda" />
            <input class="buscador-input" type="text" placeholder="buscar..." />
        </div>
        <div class="products">
            <?php foreach ($productos as $producto): ?>
                <?php include("src/components/CardProduct.php"); ?>
            <?php endforeach; ?>
        </div>
    </section>
</main>
<script src="Javascript/shop.js"></script>

</body>

</html>