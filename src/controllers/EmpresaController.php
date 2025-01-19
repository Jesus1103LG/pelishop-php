<?php
class EmpresaController
{
    public function home()
    {
        requireAuth();
        noRedirectToOtherRol();
        include("src/Views/Admin/home.php");
    }

    public function _404()
    {
        requireAuth();
        noRedirectToOtherRol();

        include("src/Views/Admin/404.php");
    }
}
