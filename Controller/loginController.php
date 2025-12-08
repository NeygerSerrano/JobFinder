<?php
require_once './Model/Login.php';

class LoginController {

    public function index() {
        // Si ya hay sesión activa, redirigir al home
        if (isset($_SESSION['rol'])) {
            header('Location: index.php?controller=home&action=index');
            exit;
        }
        
        // Variables para mantener los datos del formulario
        $error = null;
        $tipo_seleccionado = '';
        $nro_documento = '';
        $nit_empresa = '';
        
        require './Views/login/index.php';
    }

    public function login() {
        // Variables para mantener los datos del formulario y mostrar errores
        $error = null;
        $tipo_seleccionado = '';
        $nro_documento = '';
        $nit_empresa = '';
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $tipo = trim($_POST['tipo'] ?? '');
            $tipo_seleccionado = $tipo; // Mantener selección

            if ($tipo === 'usuario') {
                $nro_documento = trim($_POST['nro_documento'] ?? '');
                $password = $_POST['password'] ?? '';

                // Validar campos vacíos
                if (empty($nro_documento) || empty($password)) {
                    $error = "Todos los campos son obligatorios.";
                } else {
                    try {
                        $usuario = Login::autenticarUsuario($nro_documento, $password);

                        if ($usuario) {
                            $_SESSION['rol'] = 'usuario';
                            $_SESSION['usuario'] = $usuario->getNro_documento();
                            $_SESSION['nombre'] = $usuario->getNombres();

                            // var_dump($usuario->getNombres()); // 👈 debería mostrar el string del nombre
                            // var_dump($_SESSION);              // 👈 deberías ver "nombre" dentro del array
                            // exit;

                            header('Location: index.php?controller=home&action=index');
                            exit;
                        } else {
                            $error = "Credenciales de usuario inválidas. Verifica tu número de documento y contraseña.";
                        }
                    } catch (Exception $e) {
                        $error = "Error en la autenticación: " . $e->getMessage();
                        // Para debugging, puedes descomentar la siguiente línea:
                        // error_log("Error de autenticación: " . $e->getMessage());
                    }
                }

            } elseif ($tipo === 'empresa') {
                $nit_empresa = trim($_POST['nit_empresa'] ?? '');
                $password_empresa = $_POST['password_empresa'] ?? '';

                // Validar campos vacíos
                if (empty($nit_empresa) || empty($password_empresa)) {
                    $error = "Todos los campos son obligatorios.";
                } else {
                    try {
                        $empresa = Login::autenticarEmpresa($nit_empresa, $password_empresa);

                        if ($empresa) {
                            $_SESSION['rol'] = 'empresa';
                            $_SESSION['usuario'] = $empresa->getNit_empresa();
                            $_SESSION['nombre'] = $empresa->getNombre_empresa(); 
                            header('Location: index.php?controller=home&action=index');
                            exit;
                        } else {
                            $error = "Credenciales de empresa inválidas. Verifica tu NIT y contraseña.";
                        }
                    } catch (Exception $e) {
                        $error = "Error en la autenticación: " . $e->getMessage();
                        // Para debugging, puedes descomentar la siguiente línea:
                        // error_log("Error de autenticación: " . $e->getMessage());
                    }
                }
            } else {
                $error = "Debes seleccionar un tipo de login.";
            }
        } else {
            // Si no es POST, redirigir al formulario
            header('Location: index.php?controller=login&action=index');
            exit;
        }

        // Si llegamos aquí, hay un error - volver a mostrar el formulario
        require './Views/login/index.php';
    }

    public function logout() {
        // Limpiar todas las variables de sesión
        $_SESSION = array();
        
        // Destruir la sesión
        session_destroy();
        
        // Redirigir al login
        header('Location: index.php?controller=login&action=index');
        exit;
    }

    public function error() {
        http_response_code(404);
        echo "<h1>Error 404: La página de login que buscas no existe</h1>";
        echo '<a href="index.php?controller=login&action=index">Volver al login</a>';
    }
}
?>