<?php $subTitulo = "Login"; ?>
<?php include("src/layout/header.php"); ?>

<div class="content">
    <h1>Login</h1>
    <form id="form" method="POST" action="">
        <div class="form-div">
            <label for="email">Email</label>
            <input id="email" name="email" type="email" required />
        </div>
        <div class="form-div">
            <label for="password">Password</label>
            <input id="password" name="password" type="password" required />
            <?= $isAuth ? "<p class='error'>Usuario o Contraseña Incorrecta</p>" : "" ?>
        </div>
        <button>LOGIN</button>
    </form>
    <p>No tienes una Cuenta? <a href="/peliShop_PHP/Landing/signup">Sign Up</a></p>
</div>
</body>

</html>