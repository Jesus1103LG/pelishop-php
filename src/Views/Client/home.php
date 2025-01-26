<?php $subTitulo = "Home"; ?>
<?php include("src/layout/header.php"); ?>

<div class="banner">
    <div>
        <h1>La mejor tienda de zapatos en toda venezuela</h1>
        <h2 style="color: #1f1f1f;">pelishop</h2>
        <p>Encuentra los mejores zapatos de la mejor calidad y al mejor precio</p>
    </div>
</div>
<main class="main-cli">
    <section>
        <?php
        include("src/components/CardProduct.php");
        include("src/components/CardProduct.php");
        include("src/components/CardProduct.php");
        ?>
    </section>
    <section>
        <div class="target" style="background: url('/peliShop_PHP/src/public/img2.jpg') no-repeat center center; background-size: cover;">
            <div>
                <h3>Mejor comodidad</h3>
                <p>PeliShop de te ofrece los zapatos mas comodos para tus pies.</p>
            </div>
        </div>
        <div class="target" style="background: url('/peliShop_PHP/src/public/img1.jpg') no-repeat center center; background-size: cover;">
            <div>
                <h3>Mejores precios</h3>
                <p>Los mejores precios te los ofrece PeliShop.</p>
            </div>
        </div>
    </section>
    <section>
        <?php
        include("src/components/CardProduct.php");
        include("src/components/CardProduct.php");
        include("src/components/CardProduct.php");
        ?>
    </section>

</main>

</body>

</html>