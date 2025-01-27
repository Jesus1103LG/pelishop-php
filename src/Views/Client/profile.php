<?php $subTitulo = $datos["nombre"] . " Profile"; ?>
<?php include("src/layout/header.php"); ?>

<main class="content_profile">
    <div class="profile_card">
        <img src="/peliShop_PHP/src/uploads/<?= $datos["foto_perfil"] ?>" alt="<?= $datos["nombre"] ?>">
        <h2><?= $datos["nombre"] ?></h2>
        <div class="info">
            <p><b>Email:</b></p>
            <p><?= $datos["email"] ?></p>
        </div>
        <div class="info">
            <p><b>Telefono:</b></p>
            <p><?= $datos["telefono"] ?></p>
        </div>
        <div class="info">
            <p><b>Direccion:</b></p>
            <p><?= $datos["direccion_id"] ?></p>
        </div>
        <div class="info">
            <p><b>Fecha de Nacimiento:</b></p>
            <p><?= $datos["fecha_nc"] ?></p>
        </div>
        <div class="info">
            <p><b>Cuando te uniste a nosotros: </b></p>
            <p><?= $datos["create_at"] ?></p>
        </div>
        <div class="info"><a class="btn_edit" href="edit_profile">Editar Perfil</a></div>
    </div>
</main>

</body>

</html>