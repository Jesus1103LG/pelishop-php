<?php $subTitulo = "Sign Up"; ?>
<?php include("src/layout/header.php"); ?>

<div class="content">
    <form id="form" method="POST" action="">
        <div class="form-div">
            <label for="rol">¿Qué eres?</label>
            <select name="rol" id="rol" required>
                <option value="" disabled selected>Seleccione un opcion</option>
                <option value="2">Cliente</option>
                <option value="3">Empresa</option>
            </select>
        </div>
        <div class="form-div">
            <label for="tipo-doc cedula">Documento de identidad</label>
            <div class="identidad">
                <select name="tipo-doc" id="tipo-doc" required>
                    <option value="" disabled selected>Seleccione un opcion</option>
                    <option value="V">V</option>
                    <option value="E">E</option>
                    <option value="J">J</option>
                    <option value="G">G</option>
                </select>
                <input name="cedula" id="cedula" type="text" required />
            </div>
        </div>
        <div class="form-div">
            <label for="nombre">Nombre</label>
            <input name="nombre" id="nombre" type="text" required />
        </div>
        <div class="form-div">
            <label for="apellido">Apellido</label>
            <input name="apellido" id="apellido" type="text" required />
        </div>
        <div class="form-div">
            <label for="email">Email</label>
            <input name="email" id="email" type="email" required />
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
                    oninput="limitDigits(this)" />
            </div>
        </div>
        <div class="form-div">
            <label for="fechaNc">Fecha de nacimiento</label>
            <input name="fechaNc" id="fechaNc" type="date" required />
        </div>

        <div class="form-div">
            <label for="password">Password</label>
            <input name="password" id="password" type="password" required minlength="8" />
        </div>
        <button id="btn">SIGN UP</button>
    </form>
    <p>Ya tienes una Cuenta? <a href="login.html">Login</a></p>
</div>
<script src="/peliShop_PHP/src/public/javascript/signup.js"></script>

</body>

</html>