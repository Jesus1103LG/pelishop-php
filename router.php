<?php
// Enrutador
class Router
{
    private $controller;
    private $method;
    private $params = [];

    public function __construct()
    {
        $this->matchRoute();
    }

    public function matchRoute()
    {
        $url = explode("/", URL);

        // Determina el controlador y el metodo
        $this->controller = !empty($url[1]) ? $url[1] : "Landing";
        $this->method = !empty($url[2]) ? $url[2] : "home";

        // Si hay parametros adicionales en la url, guardalos
        $this->params = array_slice($url, 3);

        $this->controller = $this->controller . "Controller";

        $controllerPath = __DIR__ . "/src/controllers/" . $this->controller . ".php";

        // Redirige a 404 si el controlador no existe
        if (!file_exists($controllerPath)) {
            header("Location: /prueba/admin/_404");
            exit;
        }

        require_once($controllerPath);
    }

    public function run()
    {
        $controller = new $this->controller();
        $method = $this->method;

        // Verifica si el método existe en el controlador
        if (!method_exists($controller, $method)) {
            header("Location: /prueba/admin/_404");
            exit;
        }

        // Refleja el método para obtener información sobre los parámetros
        $reflection = new ReflectionMethod($controller, $method);
        $requiredParams = $reflection->getNumberOfRequiredParameters();
        $optionalParams = $reflection->getNumberOfParameters() - $requiredParams;

        // Si el método no permite parámetros pero la URL tiene, redirige
        if ($requiredParams === 0 && $optionalParams === 0 && !empty($this->params)) {
            header("Location: /prueba/admin/invalid_route");
            exit;
        }

        // Llama al método con los parámetros
        call_user_func_array([$controller, $method], $this->params);
    }
}
