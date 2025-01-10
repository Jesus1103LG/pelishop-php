<?php
class EmpresaController
{
    public function home()
    {
        requireAuth();

        include("src/Views/Admin/home.php");
    }

    public function _404()
    {
        requireAuth();
        include("src/Views/Admin/404.php");
    }
}
