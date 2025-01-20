<?php
require_once("src/constants/admin_imports.php");
class AdminController
{
    public function home()
    {
        requireAuth();
        noRedirectToOtherRol();
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

    public function tablas()
    {
        requireAuth();
        noRedirectToOtherRol();

        include("src/Views/Admin/tablas.php");
    }

    public function clientes()
    {
        requireAuth();
        noRedirectToOtherRol();
        include("src/Views/Admin/clientes.php");
    }

    public function empresas()
    {
        requireAuth();
        noRedirectToOtherRol();
        include("src/Views/Admin/empresas.php");
    }

    public function _404()
    {
        requireAuth();
        noRedirectToOtherRol();

        include("src/Views/Admin/404.php");
    }
}
