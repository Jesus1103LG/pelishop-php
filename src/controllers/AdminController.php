<?php
require_once("src/constants/admin_imports.php");
class AdminController
{
    public function home()
    {
        requireAuth();
        $cant_ventas = count(get_all_ventas());
        $cant_clientes = count(get_persona_rol(2));
        $cant_empresas = count(get_persona_rol(3));
        $cant_productos = count(get_all_productos());
        $cant_categorias = count(get_all_categoria());
        $cant_admins = count(get_persona_rol(1));
        $personas = get_all_persona();
        $ventas = get_all_ventas();

        include("src/Views/Admin/home.php");
    }

    public function _404()
    {
        requireAuth();
        include("src/Views/Admin/404.php");
    }
}
