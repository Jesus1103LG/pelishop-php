<?php
require_once("src/helpers/auth.php");
class LandingController
{
    public function home()
    {
        redirectIfAuthenticated();
        include("src/Views/Landing/home.php");
    }

    public function signup()
    {
        redirectIfAuthenticated();
        require_once("src/model/personaDB.php");

        $isCedula = false;
        $isEmail = false;
        $isTelefono = false;

        if (!empty($_POST)) {
            $data = [
                "cedula" => $_POST["cedula"],
                "identidad" => $_POST["tipo-doc"],
                "nombre" => $_POST["nombre"] . " " . $_POST["apellido"],
                "email" => strtolower($_POST["email"]),
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
        redirectIfAuthenticated();
        require_once("src/model/personaDB.php");
        try {
            $isAuth = false;
            if (isset($_POST["email"]) && isset($_POST["password"])) {
                $email = strtolower($_POST["email"]);
                $password = $_POST["password"];

                $resultAuth = auth_user($email, $password);
                if (!$resultAuth) {
                    $isAuth = true;
                } else {
                    ob_start();
                    session_start();
                    $_SESSION["valid"] = true;
                    $_SESSION["email"] = $email;
                    header("Location: /peliShop_PHP/Cliente/home");
                }
            }
        } catch (PDOException $e) {
            die("ERROR: " . $e->getMessage());
        }
        include("src/Views/Landing/login.php");
    }

    public function logout()
    {
        session_start();
        unset($_SESSION["email"]);
        unset($_SESSION["valid"]);
        session_destroy();

        header("Location: /peliShop_PHP/");
    }

    public function _404()
    {
        include("src/Views/Landing/404.php");
    }
}
