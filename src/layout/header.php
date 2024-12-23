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
</head>

<body>
    <header class="header">
        <nav class="navbar">
            <div class="navbar-first-div">
                <img src="/peliShop_PHP/src/public/logo.png" alt="PeliShop-logo" />
                <p><b>Peli</b>Shop</p>
            </div>
            <div class="navbar-last-div">
                <ul class="navbar-links">
                    <li><a href="/peliShop_PHP/">HOME</a></li>
                    <li><a href="">SHOP</a></li>
                    <li><a href="">SITE</a></li>
                </ul>
                <ul class="navbar-links">
                    <?php if ($url == "signup"): ?>
                        <li><a href="/peliShop_PHP/Landing/login.html">LOGIN</a></li>
                    <?php elseif ($url == "login"): ?>
                        <li><a href="/peliShop_PHP/Landing/signup">SIGN UP</a></li>
                    <?php else: ?>
                        <li><a href="/peliShop_PHP/Landing/login.html">LOGIN</a></li>
                        <li><a href="/peliShop_PHP/Landing/signup">SIGN UP</a></li>
                    <?php endif; ?>

                </ul>
            </div>
        </nav>
    </header>