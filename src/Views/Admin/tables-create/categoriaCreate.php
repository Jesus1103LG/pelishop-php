<?php $subTitulo = "Create Categoria"; ?>
<?php include("src/layout/header.php"); ?>

<div class="content">
    <form id="form" method="POST" action="">
        <div class="form-div">
            <label for="categoria">Categoria</label>
            <input name="categoria" id="categoria" type="text" required />
        </div>
        <div class="form-div">
            <label for="descripcion">Descripcion</label>
            <input name="descripcion" id="descripcion" type="text" required />
        </div>
        <div style="display: flex; gap: 10px;">
            <button style="width: 100%;" id="btn_edit" name="accion" value="create">CREATE</button>
        </div>
    </form>
</div>
<script src="/peliShop_PHP/src/public/javascript/signup.js"></script>

</body>

</html>