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

    public function cliente_detail($cedula)
    {
        requireAuth();
        noRedirectToOtherRol();

        $persona = get_persona_cedula($cedula);

        try {
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $data = [
                    "cedula" => $_POST["cedula"],
                    "identidad" => $_POST["tipo-doc"],
                    "nombre" => $_POST["nombre"] . " " . $_POST["apellido"],
                    "email" => strtolower($_POST["email"]),
                    "telefono" => $_POST["telefono"],
                    "rol" => $_POST["rol"],
                    "fecha_nc" => $_POST["fechaNc"]
                ];

                if (isset($_POST["accion"])) {
                    switch ($_POST["accion"]) {
                        case 'update':
                            update_persona($data);
                            header("Location: ../clientes");
                            break;
                        case 'delete':
                            delete_persona($cedula);
                            header("Location: ../clientes");
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

        include("src/Views/Admin/tables-details/clienteDetail.php");
    }

    public function empresas()
    {
        requireAuth();
        noRedirectToOtherRol();

        $empresas = get_all_persona();

        include("src/Views/Admin/tables/empresas.php");
    }

    public function empresa_detail($cedula)
    {
        requireAuth();
        noRedirectToOtherRol();

        $persona = get_persona_cedula($cedula);

        try {
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $data = [
                    "cedula" => $_POST["cedula"],
                    "identidad" => $_POST["tipo-doc"],
                    "nombre" => $_POST["nombre"] . " " . $_POST["apellido"],
                    "email" => strtolower($_POST["email"]),
                    "telefono" => $_POST["telefono"],
                    "rol" => $_POST["rol"],
                    "fecha_nc" => $_POST["fechaNc"]
                ];

                if (isset($_POST["accion"])) {
                    switch ($_POST["accion"]) {
                        case 'update':
                            update_persona($data);
                            header("Location: ../empresas");
                            break;
                        case 'delete':
                            delete_persona($cedula);
                            header("Location: ../empresas");
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

        include("src/Views/Admin/tables-details/empresaDetail.php");
    }

    public function admins()
    {
        requireAuth();
        noRedirectToOtherRol();

        $admins = get_all_persona();

        include("src/Views/Admin/tables/admins.php");
    }

    public function admin_detail($cedula): void
    {
        requireAuth();
        noRedirectToOtherRol();

        $persona = get_persona_cedula($cedula);

        try {
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $data = [
                    "cedula" => $_POST["cedula"],
                    "identidad" => $_POST["tipo-doc"],
                    "nombre" => $_POST["nombre"] . " " . $_POST["apellido"],
                    "email" => strtolower($_POST["email"]),
                    "telefono" => $_POST["telefono"],
                    "rol" => $_POST["rol"],
                    "fecha_nc" => $_POST["fechaNc"]
                ];

                if (isset($_POST["accion"])) {
                    switch ($_POST["accion"]) {
                        case 'update':
                            update_persona($data);
                            header("Location: ../admins");
                            break;
                        case 'delete':
                            delete_persona($cedula);
                            header("Location: ../admins");
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

        include("src/Views/Admin/tables-details/adminDetail.php");
    }

    public function estados()
    {
        requireAuth();
        noRedirectToOtherRol();

        $estados = get_all_estados();

        include("src/Views/Admin/tables/estados.php");
    }

    public function estado_detail($id)
    {
        requireAuth();
        noRedirectToOtherRol();

        $estado = get_estado($id);

        try {
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $data = $_POST["estado"];

                if (isset($_POST["accion"])) {
                    switch ($_POST["accion"]) {
                        case 'update':
                            update_estados($id, $data);
                            header("Location: ../estados");
                            break;
                        case 'delete':
                            delete_estados($id);
                            header("Location: ../estados");
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

        include("src/Views/Admin/tables-details/estadoDetail.php");
    }

    public function ciudades()
    {
        requireAuth();
        noRedirectToOtherRol();

        $ciudades = get_all_ciudades();

        include("src/Views/Admin/tables/ciudades.php");
    }

    public function ciudad_detail($id)
    {
        requireAuth();
        noRedirectToOtherRol();

        $ciudad = get_ciudad($id);
        $estados = get_all_estados();

        try {
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $ciudad = $_POST["ciudad"];
                $estado = $_POST["estado"];

                if (isset($_POST["accion"])) {
                    switch ($_POST["accion"]) {
                        case 'update':
                            update_ciudad($id, $ciudad, $estado);
                            header("Location: ../ciudades");
                            break;
                        case 'delete':
                            delete_ciudad($id);
                            header("Location: ../ciudades");
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

        include("src/Views/Admin/tables-details/ciudadDetail.php");
    }

    public function roles()
    {
        requireAuth();
        noRedirectToOtherRol();

        $roles = get_all_roles();

        include("src/Views/Admin/tables/roles.php");
    }

    public function rol_detail($id)
    {
        requireAuth();
        noRedirectToOtherRol();

        $_rol = get_rol($id);

        try {
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $data = $_POST["rol"];

                if (isset($_POST["accion"])) {
                    switch ($_POST["accion"]) {
                        case 'update':
                            update_rol($id, $data);
                            header("Location: ../roles");
                            break;
                        case 'delete':
                            delete_rol($id);
                            header("Location: ../roles");
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

        include("src/Views/Admin/tables-details/rolDetail.php");
    }

    public function categorias()
    {
        requireAuth();
        noRedirectToOtherRol();

        $categorias = get_all_categoria();

        include("src/Views/Admin/tables/categorias.php");
    }

    public function categoria_detail($id)
    {
        requireAuth();
        noRedirectToOtherRol();

        $categoria = get_categoria($id);

        try {
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $category = $_POST["categoria"];
                $descripcion = $_POST["descripcion"];

                if (isset($_POST["accion"])) {
                    switch ($_POST["accion"]) {
                        case 'update':
                            update_categoria($id, $category, $descripcion);
                            header("Location: ../categorias");
                            break;
                        case 'delete':
                            delete_categoria($id);
                            header("Location: ../categorias");
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

        include("src/Views/Admin/tables-details/categoriaDetail.php");
    }

    public function productos()
    {
        requireAuth();
        noRedirectToOtherRol();

        $productos = get_all_productos();

        include("src/Views/Admin/tables/productos.php");
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
        include("src/Views/Admin/tables-details/productDetail.php");
    }

    public function ventas()
    {
        requireAuth();
        noRedirectToOtherRol();

        $ventas = get_all_ventas();

        include("src/Views/Admin/tables/ventas.php");
    }

    public function direcciones()
    {
        requireAuth();
        noRedirectToOtherRol();

        $direcciones = get_all_direcciones();

        include("src/Views/Admin/tables/direcciones.php");
    }

    public function _404()
    {
        requireAuth();
        noRedirectToOtherRol();

        include("src/Views/Admin/404.php");
    }
}
