<?php
class LandingController
{
    public function home()
    {
        include("src/Views/Landing/home.php");
    }

    public function signup()
    {
        require_once("src/model/personaDB.php");

        $isCedula = false;
        $isEmail = false;
        $isTelefono = false;

        if (!empty($_POST)) {
            $data = [
                "cedula" => $_POST["cedula"],
                "identidad" => $_POST["tipo-doc"],
                "nombre" => $_POST["nombre"] . " " . $_POST["apellido"],
                "email" => $_POST["email"],
                "telefono" => $_POST["telefono"],
                "rol" => $_POST["rol"],
                "password" => $_POST["password"],
                "fecha_nc" => $_POST["fechaNc"]
            ];

            try {
                if (get_persona_cedula($data["cedula"])) $isCedula = true;
                if (get_persona_email($data["email"])) $isEmail = true;
                if (get_persona_telefono($data["telefono"])) $isTelefono = true;

                if (!($isCedula or $isEmail or $isTelefono)) {
                    create_persona($data);
                    header("Location: /peliShop_PHP/Landing/login");
                }
            } catch (PDOException $e) {
                die("ERROR: " . $e->getMessage());
            }
        }

        include("src/Views/Landing/register.php");
    }

    public function login()
    {
        include("src/Views/Landing/login.php");
    }

    public function _404()
    {
        include("src/Views/Landing/404.php");
    }
}
