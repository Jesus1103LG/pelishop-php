<?php
// Rutas Protegidas
function requireAuth()
{
    session_start();

    // Verifica si la sesión está activa
    if (!isset($_SESSION["valid"])) {
        // Redirige al usuario al login
        header("Location: /peliShop_PHP/Landing/login");
        exit();
    }
}

// Rutas Publicas
function redirectIfAuthenticated()
{
    session_start();

    // Si hay una sesión activa, redirige al home o cualquier otra página
    if (isset($_SESSION["valid"])) {
        header("Location: /peliShop_PHP/Cliente/home");
        exit();
    }
}

function redirectTo404()
{
    session_start();

    // Verifica si el usuario está autenticado
    if (isset($_SESSION["valid"])) {
        // Redirige a un 404 para usuarios autenticados
        header("Location: /peliShop_PHP/Cliente/_404");
    } else {
        // Redirige a un 404 genérico
        header("Location: /peliShop_PHP/Landing/_404");
    }
    exit();
}
