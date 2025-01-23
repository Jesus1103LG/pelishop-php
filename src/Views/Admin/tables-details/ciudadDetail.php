<?php $subTitulo = "Ciudad Detail"; ?>
<?php include("src/layout/header.php"); ?>

<div class="content">
    <form id="form" method="POST" action="">
        <div class="form-div">
            <label for="ciudad">Ciudad</label>
            <input name="ciudad" id="ciudad" type="text" value="<?= $ciudad["ciudad"] ?>" required />
        </div>
        <div class="form-div">
            <label for="estado">Estado</label>
            <div class="identidad">
                <select name="estado" id="estado" required style="width: 100%;">
                    <option value="" disabled selected>Seleccione un opcion</option>
                    <?php foreach ($estados as $estado): ?>
                        <option value="<?= $estado["id"] ?>" <?= $ciudad["estados_id"] == $estado["id"] ? "selected" : "" ?>><?= $estado["estado"] ?></option>
                    <?php endforeach ?>
                </select>
            </div>
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