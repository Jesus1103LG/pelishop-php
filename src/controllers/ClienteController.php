<?php
require_once("src/helpers/auth.php");
class ClienteController
{
    public function home()
    {
        requireAuth();

        require_once("src/model/personaDB.php");

        // TODO: Logica para mostrar los productos.
        include("src/Views/Client/home.php");
    }

    public function profile()
    {
        requireAuth();

        require_once("src/model/personaDB.php");

        // TODO: Logica para mostrar los datos del usuario.

        include("src/Views/Client/profile.php");
    }

    public function _404()
    {
        requireAuth();
        include("src/Views/Client/404.php");
    }
}
