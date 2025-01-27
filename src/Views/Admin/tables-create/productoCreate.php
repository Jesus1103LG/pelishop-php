<?php $subTitulo = "Create Product"; ?>
<?php include("src/layout/header.php"); ?>

<div class="content">
    <form id="form" method="POST" action="" enctype="multipart/form-data">
        <div class="form-div">
            <label for="nombre">Nombre</label>
            <input name="nombre" id="nombre" type="text" required />
        </div>
        <div class="form-div">
            <label for="talla">Talla</label>
            <input name="talla" id="talla" type="text" required />
        </div>
        <div class="form-div">
            <label for="color">Color</label>
            <input name="color" id="color" type="text" required />
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
                    oninput="limitDigits(this)" />
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
                    oninput="limitDigits(this)" />
            </div>
        </div>
        <div class="form-div">
            <label for="distribuidor">Distribuidor</label>
            <select name="distribuidor" id="distribuidor" required>
                <option value="" selected disabled>Seleccione un distribuidor...</option>
                <?php foreach ($empresas as $empresa): ?>
                    <?php if ($empresa["roles_id"] == 3): ?>
                        <option value="<?= $empresa["cedula"] ?>"><?= $empresa["email"] ?></option>
                    <?php endif; ?>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-div">
            <label for="image">Foto del Producto</label>
            <input name="image" id="image" type="file" accept="image/*" required />
        </div>
        <div style="display: flex; gap: 10px;">
            <button style="width: 100%;" id="btn_edit" name="accion" value="create">CREATE</button>
        </div>
    </form>
</div>
<script src="/peliShop_PHP/src/public/javascript/signup.js"></script>

</body>

</html>