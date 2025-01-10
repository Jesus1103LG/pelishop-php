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
    if (isset($_SESSION["valid"]) && isset($_SESSION["rol"])) {
        if ($_SESSION["rol"] == 1) {
            header("Location: /peliShop_PHP/Admin/home");
            exit();
        } else if ($_SESSION["rol"] == 2) {
            header("Location: /peliShop_PHP/Cliente/home");
            exit();
        } else if ($_SESSION["rol"] == 3) {
            header("Location: /peliShop_PHP/Empresa/home");
            exit();
        }
    }
}

function redirectTo404()
{
    session_start();
    if (isset($_SESSION["valid"]) && isset($_SESSION["rol"])) {
        if ($_SESSION["rol"] == 1) {
            header("Location: /peliShop_PHP/Admin/_404");
        } else if ($_SESSION["rol"] == 2) {
            header("Location: /peliShop_PHP/Cliente/_404");
        } else if ($_SESSION["rol"] == 3) {
            header("Location: /peliShop_PHP/Empresa/_404");
        }
    } else {
        header("Location: /peliShop_PHP/Landing/_404");
    }
    exit();
}
