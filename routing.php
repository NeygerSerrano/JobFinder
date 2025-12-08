<?php

$controllers = array(
    'login' => ['index', 'login', 'logout', 'error'],
    'home' => ['index'],
    'empresa' => ['index', 'crear', 'editar', 'eliminar', 'ver', 'perfil'],
    'datospersonales' => ['index', 'crear', 'editar', 'eliminar', 'ver', 'perfil', 'generarPDF'],
    'experiencia' => ['index', 'crear', 'editar', 'eliminar', 'ver'],
    'educacion' => ['index', 'crear', 'editar', 'eliminar', 'ver'],
    'portafolio' => ['index', 'crear', 'editar', 'eliminar', 'ver'],
    'vacante' => ['index', 'crear', 'editar', 'eliminar', 'ver', 'verVacantes', 'detalles'],
    'postulacion' => ['indexUsuario', 'indexEmpresa', 'cancelar', 'crear', 'cambiarEstado', 'verPerfilUsuario', 'editar', 'eliminar', 'ver'],
    // Agrega más controladores y acciones aquí si lo necesitas
);

// Validación básica de existencia del controlador y acción
if (array_key_exists($controller, $controllers)) {
    if (in_array($action, $controllers[$controller])) {
        call($controller, $action);
    } else {
        call('login', 'error'); // acción por defecto si no existe
    }
} else {
    call('login', 'error'); // controlador por defecto si no existe
}

function call($controller, $action)
{
    $controllerFile = 'Controller/' . $controller . 'Controller.php';
    
    // Verificar que el archivo del controlador existe
    if (!file_exists($controllerFile)) {
        http_response_code(404);
        echo "<h1>Error 404: Controlador no encontrado</h1>";
        return;
    }
    
    require_once($controllerFile);

    switch ($controller) {
        case 'login':
            require_once('Model/Login.php');
            $controllerObj = new LoginController();
            break;
        case 'home':
            $controllerObj = new HomeController();
            break;
        case 'empresa':
            require_once('Model/empresa.php');
            $controllerObj = new EmpresaController();
            break;
        case 'datospersonales':
            require_once('Model/datospersonales.php');
            $controllerObj = new DatospersonalesController();
            break;
        case 'experiencia':
            require_once('Model/experiencia.php');
            $controllerObj = new ExperienciaController();
            break;
        case 'educacion':
            require_once('Model/educacion.php');
            $controllerObj = new EducacionController();
            break;
        case 'portafolio':
            require_once('Model/portafolio.php');
            $controllerObj = new PortafolioController();
            break;
        case 'vacante':
            require_once('Model/vacante.php');
            $controllerObj = new VacanteController();
            break;
        case 'postulacion':
            require_once('Model/postulacion.php');
            $controllerObj = new PostulacionController();
            break;
        default:
            http_response_code(404);
            echo "<h1>Error 404: Controlador no encontrado</h1>";
            return;
    }

    // Verificar que el método existe
    if (!method_exists($controllerObj, $action)) {
        http_response_code(404);
        echo "<h1>Error 404: Acción no encontrada</h1>";
        return;
    }

    try {
        $reflection = new ReflectionMethod($controllerObj, $action);
        $expectedParams = $reflection->getNumberOfParameters();

        $args = [];

        // Recolecta los parámetros esperados desde $_GET en el orden correcto
        foreach ($reflection->getParameters() as $param) {
            $paramName = $param->getName();
            if (isset($_GET[$paramName])) {
                $args[] = $_GET[$paramName];
            } elseif (!$param->isOptional()) {
                http_response_code(400);
                echo "<h1>Error 400: Falta el parámetro requerido: $paramName</h1>";
                return;
            }
        }

        // Llama al método con los argumentos necesarios
        $controllerObj->{$action}(...$args);
        
    } catch (ReflectionException $e) {
        http_response_code(500);
        echo "<h1>Error 500: Error interno del servidor</h1>";
    }
}
?>