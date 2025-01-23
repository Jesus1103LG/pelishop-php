<?php $subTitulo = "Estado Detail"; ?>
<?php include("src/layout/header.php"); ?>

<div class="content">
    <form id="form" method="POST" action="">
        <div class="form-div">
            <label for="estado">Estado</label>
            <input name="estado" id="estado" type="text" value="<?= $estado["estado"]; ?>" required />
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