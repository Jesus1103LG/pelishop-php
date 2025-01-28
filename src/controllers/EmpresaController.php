<?php
require_once("src/helpers/auth.php");
require_once("src/helpers/loadImage.php");
require_once("src/model/personaDB.php");
require_once("src/model/productoDB.php");
require_once("src/model/estadosDB.php");
require_once("src/model/ciudadesDB.php");
require_once("src/model/direccionDB.php");
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

    public function producto_detail($id)
    {
        requireAuth();
        noRedirectToOtherRol();

        $producto = get_producto($id);

        try {
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $data = [
                    "nombre" => $_POST["nombre"],
                    "precio" => $_POST["precio"],
                    "stock" => $_POST["stock"],
                    "talla" => $_POST["talla"],
                    "color" => $_POST["color"],
                    "persona_cedula" => $_POST["distribuidor"]
                ];

                if (isset($_POST["accion"])) {
                    switch ($_POST["accion"]) {
                        case 'update':
                            update_producto($id, $data);
                            header("Location: ../productos");
                            break;
                        case 'delete':
                            delete_producto($id);
                            header("Location: ../productos");
                            break;
                        default:
                            echo "Accion no reconocida.";
                            break;
                    }
                }
            }
        } catch (Exception $e) {
            die("ERROR:" . $e->getMessage());
        }
        include("src/Views/Empresa/productDetail.php");
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
            var_dump($input);
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
                        header("Location: /peliShop_PHP/Empresa/profile");
                        break;
                    default:
                        echo "Accion no reconocida.";
                        break;
                }
            }
        }

        include("src/Views/Empresa/edit_profile.php");
    }

    public function _404()
    {
        requireAuth();
        noRedirectToOtherRol();

        include("src/Views/Admin/404.php");
    }
}
