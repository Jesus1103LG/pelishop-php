<?php $subTitulo = "Shop"; ?>
<?php include("src/layout/header.php"); ?>

<main class="main">
    <section class="main-f"></section>
    <section class="main-filtros">
        <div class="filtro">
            <div class="div-filtro">
                <h4>Filtrar por Color</h4>
                <select id="filtro-color">
                    <option>Selecciona el color</option>
                    <option value="Negro">Negro</option>
                    <option value="Blanco">Blanco</option>
                    <option value="Rojo">Rojo</option>
                    <option value="Azul">Azul</option>
                    <option value="Gris">Gris</option>
                    <option value="Verde">Verde</option>
                    <option value="Amarillo">Amarillo</option>
                    <option value="Naranja">Naranja</option>
                    <option value="Rosa">Rosa</option>
                    <option value="Morado">Morado</option>
                </select>
            </div>
            <div class="div-filtro">
                <h4>Filtrar por Ciudad</h4>
                <input
                    id="filtro-ciudad"
                    type="text"
                    placeholder="Filtrar por ciudad" />
            </div>
            <div class="div-filtro">
                <h4>Cambiar Moneda</h4>
                <div class="filtro-moneda">
                    <label>
                        <input type="checkbox" id="checkbox1" />
                        Bolivares
                    </label>
                    <label>
                        <input type="checkbox" id="checkbox2" checked="true" />
                        Dolares
                    </label>
                </div>
            </div>
        </div>
    </section>
    <section class="main-contenido">
        <div class="buscador">
            <img
                class="buscador-lupa"
                src="/peliShop_PHP/src/public/busqueda.svg"
                alt="Lupa de busqueda" />
            <input class="buscador-input" type="text" placeholder="buscar..." />
        </div>
        <div class="products">
            <!-- AQUI VAN TODOS LOS PRODUCTOS -->
            <?php
            include("src/components/CardProduct.php");
            include("src/components/CardProduct.php");
            include("src/components/CardProduct.php");
            include("src/components/CardProduct.php");
            include("src/components/CardProduct.php");
            include("src/components/CardProduct.php");
            include("src/components/CardProduct.php");
            ?>
        </div>
    </section>
</main>
<script src="Javascript/shop.js"></script>

</body>

</html>