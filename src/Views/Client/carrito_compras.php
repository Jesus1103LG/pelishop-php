<?php $subTitulo = "Carrito de Compras"; ?>
<?php
include("src/layout/header.php");
$total_compra = 0;
?>

<main class="main-carrito">
    <?php if (!empty($carrito)): ?>
        <h1>Tu carrito de compras</h1>
        <ul class="ul-carrito">
            <?php foreach ($carrito as $producto): ?>
                <?php
                $product = get_producto($producto["idProducto"]);
                $total_compra += ($product["precio"] * $producto["cant"]);
                ?>
                <li class="element_carrtio">
                    <img src="/peliShop_PHP/src/uploads/<?= $product["foto_producto"] ?>" alt="">
                    <div class="div-inf">
                        <h4><?= $product["nombre"] ?></h4>
                        <p><b>Bs </b><?= $product["precio"] ?></p>
                    </div>
                    <div class="div-cant">
                        <p>Cantidad:</p>
                        <div>
                            <button class="btn__" onclick="incrementarCantidad(this.value)" value="<?= $producto["idProducto"] ?>">+</button>
                            <input type="number" readonly value="<?= $producto["cant"] ?>">
                            <button class="btn__" onclick="disminuirCantidad(this.value)" value="<?= $producto["idProducto"] ?>">-</button>
                        </div>
                    </div>
                    <button class="btn_" id="btn_delete" value="<?= $producto["idProducto"] ?>" onclick="removeFromCar(this.value)">Eliminar Pedido</button>
                </li>
            <?php endforeach; ?>
        </ul>
        <div>
            <h3>Total de Compra: Bs <?= $total_compra ?></h3>
        </div>
    <?php else: ?>
        <p>Tu carrito está vacío.</p>
    <?php endif; ?>

</main>

</body>

</html>