<?php

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
                    <li><a href="">HOME</a></li>
                    <li><a href="shop.html">SHOP</a></li>
                    <li><a href="">SITE</a></li>
                </ul>
                <ul class="navbar-links">
                    <li><a href="login.html">SIGN IN</a></li>
                    <li><a href="src/views/register.php">SIGN UP</a></li>
                </ul>
            </div>
        </nav>
    </header>