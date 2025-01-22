<?php $subTitulo = "Empresa Detail"; ?>
<?php include("src/layout/header.php"); ?>
<?php
$nom = explode(" ", $persona["nombre"]);
?>

<div class="content">
    <form id="form" method="POST" action="">
        <div class="form-div">
            <label for="rol">¿Qué eres?</label>
            <select name="rol" id="rol" required>
                <option value="" disabled>Seleccione un opcion</option>
                <option value="2">Cliente</option>
                <option value="3" selected>Empresa</option>
            </select>
        </div>
        <div class="form-div">
            <label for="tipo-doc cedula">Documento de identidad</label>
            <div class="identidad">
                <select name="tipo-doc" id="tipo-doc" required>
                    <option value="" disabled selected>Seleccione una opción</option>
                    <?php
                    $tipos = ["V", "E", "J", "G"];
                    foreach ($tipos as $tipo) :
                    ?>
                        <option value="<?= $tipo ?>" <?= $persona["identidad"] == $tipo ? "selected" : "" ?>>
                            <?= $tipo ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <input name="cedula" id="cedula" type="text" value="<?= $persona["cedula"]; ?>" required />
            </div>
        </div>
        <div class="form-div">
            <label for="nombre">Nombre</label>
            <input name="nombre" id="nombre" type="text" value="<?= $nom[0]; ?>" required />
        </div>
        <div class="form-div">
            <label for="apellido">Apellido</label>
            <input name="apellido" id="apellido" type="text" value="<?= $nom[1]; ?>" required />
        </div>
        <div class="form-div">
            <label for="email">Email</label>
            <input name="email" id="email" type="email" value="<?= $persona["email"]; ?>" required />
        </div>
        <div class="form-div">
            <label for="telefono">Telefono</label>
            <div id="form-div-tlf">
                <input class="code" type="text" required readonly value="+58" />
                <input
                    name="telefono"
                    id="telefono"
                    type="number"
                    required
                    max="9999999999"
                    oninput="limitDigits(this)"
                    value="<?= $persona["telefono"]; ?>" />
            </div>
        </div>
        <div class="form-div">
            <label for="fechaNc">Fecha de nacimiento</label>
            <input name="fechaNc" id="fechaNc" type="date" min="1960-01-01" max="<?= $fecha ?>" value="<?= $persona["fecha_nc"] ?>" required />
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