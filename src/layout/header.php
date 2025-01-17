<?php
$url = explode("/", URL);
$url = !empty($url[2]) ? $url[2] : "home";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="/peliShop_PHP/src/public/logo.png" type="image/x-icon" />
    <title>PeliShop - <?= $subTitulo ?></title>
    <link rel="stylesheet" href="/peliShop_PHP/src/public/css/style.css" />
    <link rel="stylesheet" href="/peliShop_PHP/src/public/css/signUp.css" />
    <link rel="stylesheet" href="/peliShop_PHP/src/public/css/Admin/style.css" />
    <link rel="stylesheet" href="/peliShop_PHP/src/public/css/404.css">
</head>

<body>
    <header class="header">
        <nav class="navbar">
            <div class="navbar-first-div">
                <img src="/peliShop_PHP/src/public/logo.png" alt="PeliShop-logo" />
                <p><b>Peli</b>Shop</p>
            </div>
            <div class="navbar-last-div">
                <?php if (!isset($_SESSION["rol"])): ?>
                    <ul class="navbar-links">
                        <li><a href="/peliShop_PHP/">HOME</a></li>
                        <li><a href="">SHOP</a></li>
                        <li><a href="">SITE</a></li>
                    </ul>
                <?php elseif ($_SESSION["rol"] == 1): ?>
                    <?php include("src/layout/navAdmin.php"); ?>
                <?php elseif ($_SESSION["rol"] == 2): ?>
                    <?php include("src/layout/navCliente.php"); ?>
                <?php elseif ($_SESSION["rol"] == 3): ?>
                    <?php include("src/layout/navEmpresa.php"); ?>
                <?php endif; ?>
                <?php if (!isset($_SESSION["valid"])): ?>
                    <ul class="navbar-links">
                        <?php if ($url == "signup"): ?>
                            <li><a href="/peliShop_PHP/Landing/login">LOGIN</a></li>
                        <?php elseif ($url == "login"): ?>
                            <li><a href="/peliShop_PHP/Landing/signup">SIGN UP</a></li>
                        <?php else: ?>
                            <li><a href="/peliShop_PHP/Landing/login">LOGIN</a></li>
                            <li><a href="/peliShop_PHP/Landing/signup">SIGN UP</a></li>
                        <?php endif; ?>

                    </ul>
                <?php else: ?>
                    <ul class="navbar-links">
                        <li><a href="/peliShop_PHP/Cliente/home">PROFILE</a></li>
                        <li><a href="/peliShop_PHP/Landing/logout">LOGOUT</a></li>
                    </ul>
                <?php endif; ?>
            </div>
        </nav>
    </header>