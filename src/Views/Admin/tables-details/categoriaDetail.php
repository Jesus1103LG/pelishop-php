<?php $subTitulo = "Categoria Detail"; ?>
<?php include("src/layout/header.php"); ?>

<div class="content">
    <form id="form" method="POST" action="">
        <div class="form-div">
            <label for="categoria">Categoria</label>
            <input name="categoria" id="categoria" type="text" value="<?= $categoria["categoria"] ?>" required />
        </div>
        <div class="form-div">
            <label for="descripcion">Descripcion</label>
            <input name="descripcion" id="descripcion" type="text" value="<?= $categoria["descripcion"] ?>" />
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