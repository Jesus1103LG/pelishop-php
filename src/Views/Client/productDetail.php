<?php $subTitulo = "Proudcto Detail"; ?>
<?php include("src/layout/header.php"); ?>

<div class="content">
    <div class="product-detail">
        <div class="product-detail__img">
            <img src="/peliShop_PHP/src/uploads/<?= $producto["foto_producto"] ?>" alt="">
        </div>
        <div class="product-detail__info">
            <h1><?= $producto["nombre"] ?></h1>
            <p><b>Color:</b> <?= $producto["color"] ?></p>
            <p><b>Talla:</b> <?= $producto["talla"] ?></p>
            <p><b>Precio: Bs </b><?= $producto["precio"] ?></p>
            <div class="product_detail__info__btn">
                <button class="btn_s" id="btn_add" value="<?= $producto["id"] ?>" onclick="addToCar(this.value)">Agregar al carrito</button>
            </div>
        </div>
    </div>
</div>
<script src="/peliShop_PHP/src/public/javascript/signup.js"></script>

</body>

</html>