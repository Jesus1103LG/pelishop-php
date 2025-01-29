<?php
require_once("src/model/personaDB.php");
require_once("src/model/productoDB.php");
require_once("src/model/estadosDB.php");
require_once("src/model/direccionDB.php");
require_once("src/model/ciudadesDB.php");
require_once("src/model/productoDB.php");
require_once("src/helpers/loadImage.php");


class ClienteController
{
    public function home()
    {
        requireAuth();
        noRedirectToOtherRol();

        $productos = get_all_productos();

        include("src/Views/Client/home.php");
    }

    public function profile()
    {
        requireAuth();
        noRedirectToOtherRol();

        $datos = get_persona_email($_SESSION["email"]);

        include("src/Views/Client/profile.php");
    }

    public function edit_profile()
    {
        requireAuth();
        noRedirectToOtherRol();
        $persona = get_persona_email($_SESSION["email"]);

        $estados = get_all_estados();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Leer los datos enviados en la solicitud POST
            $input = json_decode(file_get_contents('php://input'), true);

            // Validar que se haya enviado el estado_id
            if (isset($input['estado_id'])) {
                $estado_id = intval($input['estado_id']);
                $ciudades = get_ciudades_by_estado($estado_id);

                // Generar las opciones de ciudades como HTML
                $html = '<option value="" disabled selected>Seleccione tu ciudad</option>';
                foreach ($ciudades as $ciudad) {
                    $html .= ("<option value='" . $ciudad["id"] . "'>" . $ciudad["ciudad"] . "</option>");
                }

                // Devolver el fragmento HTML
                echo $html;
                exit;
            }

            if (isset($_POST["accion"])) {
                if ($persona["direccion_id"] == 1) {
                    $direccion_nueva = create_direccion($_POST["direccion"], $_POST["estado"], $_POST["ciudad"]);
                }

                $profile_photo = $_FILES["image"]["name"] == $persona["foto_perfil"] ? $persona["foto_perfil"] : uploadImage("image");

                $data = [
                    "cedula" => $persona["cedula"],
                    "identidad" => $persona["identidad"],
                    "nombre" => $_POST["nombre"] . " " . $_POST["apellido"],
                    "email" => $_POST["email"],
                    "telefono" => $_POST["telefono"],
                    "fecha_nc" => $_POST["fechaNc"],
                    "direccion" => $direccion_nueva ? $direccion_nueva : $persona["direccion_id"],
                    "foto_perfil" => $_FILES["image"]["name"] == "default.png" ? "default.png" : $profile_photo,
                    "rol" => $persona["roles_id"]
                ];

                switch ($_POST["accion"]) {
                    case 'update':
                        update_persona($data);
                        header("Location: /peliShop_PHP/Cliente/profile");
                        break;
                    default:
                        echo "Accion no reconocida.";
                        break;
                }
            }
        }

        include("src/Views/Client/edit_profile.php");
    }

    public function shop()
    {
        requireAuth();
        noRedirectToOtherRol();

        $productos = get_all_productos();

        include("src/Views/Client/shop.php");
    }

    public function carrito_compras()
    {
        requireAuth();
        noRedirectToOtherRol();

        // Inicializa la variable $carrito desde la sesión o como un array vacío
        $carrito = isset($_SESSION["carrito"]) ? $_SESSION["carrito"] : [];

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            // Intentar obtener los datos enviados en el cuerpo de la solicitud
            $carrito = json_decode(file_get_contents("php://input"), true);
            var_dump($carrito);
            if (json_last_error() === JSON_ERROR_NONE) {
                // Guardar el carrito en la sesión
                $_SESSION["carrito"] = $carrito;

                // Opcional: Enviar una respuesta JSON al frontend
                echo json_encode(["status" => "success", "message" => "Carrito actualizado"]);
                exit;
            } else {
                echo json_encode(["status" => "error", "message" => json_last_error_msg()]);
                exit;
            }
        }

        // Incluir la vista, el carrito estará disponible como variable
        include("src/Views/Client/carrito_compras.php");
    }


    public function _404()
    {
        requireAuth();
        noRedirectToOtherRol();

        include("src/Views/Client/404.php");
    }
}
