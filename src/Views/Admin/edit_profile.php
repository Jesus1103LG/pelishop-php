<?php $subTitulo = "Edit Profile"; ?>
<?php include("src/layout/header.php"); ?>
<?php
$nom = explode(" ", $persona["nombre"]);

if (count($nom) > 2) {
    $nom = [$nom[0] . " " . $nom[1], $nom[2] . " " . $nom[3]];
}

if ($persona["direccion_id"] != 1) {
    $direccion_persona = get_direccion($persona["direccion_id"]);
    $ciudad_persona = get_ciudad($direccion_persona["ciudades_id"]);
    $estado_persona = $ciudad_persona["estados_id"];
}
?>

<div class="content">
    <form id="form" method="POST" action="" style="width: 50%;" enctype="multipart/form-data">
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
        <div class="form-div">
            <label for="direccion">Direccion</label>
            <?php if ($persona["direccion_id"] == 1): ?>
                <div id="form-div-tlf">
                    <input style="width: 33%;" placeholder="Calle, Av, Barrio, etc." name="direccion" id="direccion" type="text" required />
                    <select style="width: 33%;" name="estado" id="estado" required style="width: 100%;" onchange="cargarCiudadesAdmin(this.value)">
                        <option value="" disabled selected>Seleccione tu estado</option>
                        <?php foreach ($estados as $estado): ?>
                            <option value="<?= $estado["id"] ?>"><?= $estado["estado"] ?></option>
                        <?php endforeach ?>
                    </select>
                    <select style="width: 33%;" name="ciudad" id="ciudad" required style="width: 100%;">
                        <option value="" disabled selected>Seleccione tu ciudad</option>
                    </select>
                </div>
            <?php else: ?>
                <div id="form-div-tlf">

                    <input style="width: 33%;" name="direccion" id="direccion" type="text" value="<?= $direccion_persona["calle"] ?>" required />
                    <select style="width: 33%;" name="estado" id="estado" required style="width: 100%;" onchange="cargarCiudadesAdmin(this.value)">
                        <option value="" disabled selected>Seleccione tu estado</option>
                        <?php foreach ($estados as $estado): ?>
                            <option value="<?= $estado["id"] ?>" <?= $estado["id"] == $estado_persona ? "selected" : "" ?>><?= $estado["estado"] ?></option>
                        <?php endforeach ?>
                    </select>
                    <select style="width: 33%;" name="ciudad" id="ciudad" required style="width: 100%;">
                        <option value="" disabled selected>Seleccione tu ciudad</option>
                        <option value="<?= $ciudad_persona["id"] ?>" selected><?= $ciudad_persona["ciudad"] ?></option>
                    </select>
                </div>
            <?php endif; ?>
        </div>
        <div class="form-div">
            <label for="image">Foto de Perfil</label>
            <input name="image" id="image" type="file" value="<?= $persona["foto_perfil"] ?>" required />
        </div>
        <div style="display: flex; gap: 10px;">
            <button style="width: 100%;" id="btn_edit" name="accion" value="update">EDIT</button>
        </div>
    </form>
</div>
<script src="/peliShop_PHP/src/public/javascript/signup.js"></script>
<script src="/peliShop_PHP/src/public/javascript/edit_profile.js"></script>

</body>

</html>