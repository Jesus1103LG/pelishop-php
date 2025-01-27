<?php
class ClienteController
{
    public function home()
    {
        requireAuth();
        noRedirectToOtherRol();
        require_once("src/model/personaDB.php");

        // TODO: Logica para mostrar los productos.
        include("src/Views/Client/home.php");
    }

    public function profile()
    {
        requireAuth();
        noRedirectToOtherRol();

        require_once("src/model/personaDB.php");

        // TODO: Logica para mostrar los datos del usuario.

        include("src/Views/Client/profile.php");
    }

    public function shop()
    {
        requireAuth();
        noRedirectToOtherRol();

        require_once("src/model/productoDB.php");

        include("src/Views/Client/shop.php");
    }

    public function _404()
    {
        requireAuth();
        noRedirectToOtherRol();

        include("src/Views/Client/404.php");
    }
}
