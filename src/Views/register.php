<?php $subTitulo = "Landing"; ?>
<?php include("../layout/header.php"); ?>

<div class="content">
    <h1>Sign Up</h1>
    <form id="form" method="POST" action="">
        <div class="form-div">
            <label for="">Nombre</label>
            <input id="nombre-signup" type="text" required />
        </div>
        <div class="form-div">
            <label for="">Apellido</label>
            <input id="apellido-signup" type="text" required />
        </div>
        <div class="form-div">
            <label for="">Email</label>
            <input id="email-signup" type="email" required />
        </div>
        <div class="form-div">
            <label for="">Telefono</label>
            <div id="form-div-tlf">
                <input class="code" type="text" required readonly value="+58" />
                <input
                    id="telefono-signup"
                    type="number"
                    required
                    max="9999999999"
                    oninput="limitDigits(this)" />
            </div>
        </div>
        <div class="form-div">
            <label for="">Fecha de nacimiento</label>
            <input id="fechaNc-signup" type="date" required />
        </div>
        <div class="form-div">
            <label for="">Foto</label>
            <input id="foto-signup" type="file" required />
        </div>
        <div class="form-div">
            <label for="">Password</label>
            <input id="password-signup" type="password" required minlength="8" />
        </div>
        <button id="btn-signup">SIGN UP</button>
    </form>
    <p>Ya tienes una Cuenta? <a href="login.html">Login</a></p>
</div>
<script src="/peliShop_PHP/src/public/javascript/signup.js"></script>

</body>

</html>