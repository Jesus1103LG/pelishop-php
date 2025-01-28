<?php
require_once("src/helpers/auth.php");
require_once("src/model/personaDB.php");
require_once("src/model/productoDB.php");
class EmpresaController
{
    public function home()
    {
        requireAuth();
        noRedirectToOtherRol();
        $persona = get_persona_email($_SESSION["email"]);
        $productos = get_all_productos_by_persona($persona["cedula"]);
        include("src/Views/Empresa/home.php");
    }

    public function productos()
    {
        requireAuth();
        noRedirectToOtherRol();
        $persona = get_persona_email($_SESSION["email"]);
        $productos = get_all_productos_by_persona($persona["cedula"]);
        include("src/Views/Empresa/home.php");
    }

    public function producto_create()
    {
        requireAuth();
        noRedirectToOtherRol();
        require_once("src/helpers/loadImage.php");
        $empresa = get_persona_email($_SESSION["email"]);

        try {
            if (!empty($_POST)) {
                $data = [
                    "nombre" => $_POST["nombre"],
                    "precio" => $_POST["precio"],
                    "stock" => $_POST["stock"],
                    "talla" => $_POST["talla"],
                    "color" => $_POST["color"],
                    "persona_cedula" => $_POST["distribuidor"],
                    "foto_producto" => uploadImage("image")
                ];

                create_producto($data);
                header("Location: /peliShop_PHP/Empresa/productos");
                exit;
            }
        } catch (Exception $e) {
            die("ERROR: " . $e->getMessage());
        }

        include("src/Views/Empresa/productoCreate.php");
    }

    public function _404()
    {
        requireAuth();
        noRedirectToOtherRol();

        include("src/Views/Admin/404.php");
    }
}
