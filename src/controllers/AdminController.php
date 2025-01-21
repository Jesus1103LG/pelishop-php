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

        $clientes = get_all_persona();

        include("src/Views/Admin/tables/clientes.php");
    }

    public function empresas()
    {
        requireAuth();
        noRedirectToOtherRol();

        $empresas = get_all_persona();

        include("src/Views/Admin/tables/empresas.php");
    }

    public function admins()
    {
        requireAuth();
        noRedirectToOtherRol();

        $admins = get_all_persona();

        include("src/Views/Admin/tables/admins.php");
    }

    public function estados()
    {
        requireAuth();
        noRedirectToOtherRol();

        $estados = get_all_estados();

        include("src/Views/Admin/tables/estados.php");
    }

    public function ciudades()
    {
        requireAuth();
        noRedirectToOtherRol();

        $ciudades = get_all_ciudades();

        include("src/Views/Admin/tables/ciudades.php");
    }

    public function roles()
    {
        requireAuth();
        noRedirectToOtherRol();

        $roles = get_all_roles();

        include("src/Views/Admin/tables/roles.php");
    }

    public function categorias()
    {
        requireAuth();
        noRedirectToOtherRol();

        $categorias = get_all_categoria();

        include("src/Views/Admin/tables/categorias.php");
    }

    public function _404()
    {
        requireAuth();
        noRedirectToOtherRol();

        include("src/Views/Admin/404.php");
    }
}
