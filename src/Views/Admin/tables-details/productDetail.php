<?php $subTitulo = "Proudcto Detail"; ?>
<?php include("src/layout/header.php"); ?>

<div class="content">
    <form id="form" method="POST" action="">
        <div class="form-div">
            <label for="nombre">Nombre</label>
            <input name="nombre" id="nombre" type="text" value="<?= $producto["nombre"]; ?>" required />
        </div>
        <div class="form-div">
            <label for="talla">Talla</label>
            <input name="talla" id="talla" type="text" value="<?= $producto["talla"]; ?>" required />
        </div>
        <div class="form-div">
            <label for="color">Color</label>
            <input name="color" id="color" type="text" value="<?= $producto["color"]; ?>" required />
        </div>
        <div class="form-div">
            <label for="precio">Precio</label>
            <div id="form-div-tlf">
                <input
                    style="width: 100%;"
                    name="precio"
                    id="precio"
                    type="number"
                    required
                    step="0.01"
                    max="99999"
                    oninput="limitDigits(this)"
                    value="<?= $producto["precio"]; ?>" />
            </div>
        </div>
        <div class="form-div">
            <label for="stock">Stock</label>
            <div id="form-div-tlf">
                <input
                    style="width: 100%;"
                    name="stock"
                    id="stock"
                    type="number"
                    required
                    min="1"
                    max="9999999999"
                    oninput="limitDigits(this)"
                    value="<?= $producto["stock"]; ?>" />
            </div>
        </div>
        <div class="form-div">
            <label for="distribuidor">Distribuidor</label>
            <input type="text" value="<?= get_persona_cedula($producto["persona_cedula"])["email"]; ?>" required readonly />
            <input hidden name="distribuidor" id="distribuidor" type="text" value="<?= $producto["persona_cedula"]; ?>" required readonly />
        </div>
        <div style="display: flex; gap: 10px;">
            <button style="width: 50%;" id="btn_edit" name="accion" value="update">EDIT</button>
            <button id="btn_delete" name="accion" value="delete">DELETE</button>
        </div>
    </form>
</div>
<script src="/peliShop_PHP/src/public/javascript/signup.js"></script>

</body>

</html>