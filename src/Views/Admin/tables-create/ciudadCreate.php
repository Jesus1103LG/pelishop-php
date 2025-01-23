<?php $subTitulo = "Create Ciudad"; ?>
<?php include("src/layout/header.php"); ?>

<div class="content">
    <form id="form" method="POST" action="">
        <div class="form-div">
            <label for="ciudad">Ciudad</label>
            <input name="ciudad" id="ciudad" type="text" required />
        </div>
        <div class="form-div">
            <label for="estado">Estado</label>
            <div class="identidad">
                <select name="estado" id="estado" required style="width: 100%;">
                    <option value="" disabled selected>Seleccione un opcion</option>
                    <?php foreach ($estados as $estado): ?>
                        <option value="<?= $estado["id"] ?>"><?= $estado["estado"] ?></option>
                    <?php endforeach ?>
                </select>
            </div>
        </div>
        <div style="display: flex; gap: 10px;">
            <button style="width: 100%;" id="btn_edit" name="accion" value="create">CREATE</button>
        </div>
    </form>
</div>
<script src="/peliShop_PHP/src/public/javascript/signup.js"></script>

</body>

</html>