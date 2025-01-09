<?php

/**
 * Rutas Publicas
 */
function requireAuth()
{
    session_start();
    if (!isset($_SESSION["valid"])) {
        header("Location: /peliShop_PHP/Landing/login");
        exit();
    }
}

/**
 * Rutas Privadas
 */
function redirectIfAuthenticated()
{
    session_start();
    if (isset($_SESSION["valid"])) {
        header("Location: /peliShop_PHP/Cliente/home");
        exit();
    }
}

function redirectTo404()
{
    session_start();
    if (isset($_SESSION["valid"])) {
        header("Location: /peliShop_PHP/Cliente/_404");
    } else {
        header("Location: /peliShop_PHP/Landing/_404");
    }
    exit();
}
