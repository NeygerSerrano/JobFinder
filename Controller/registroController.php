<?php
require_once './Model/datospersonales.php';
require_once './Model/empresa.php';

class RegistroController {

    public function index() {
        // Si ya hay sesión activa, redirigir al home
        if (isset($_SESSION['rol'])) {
            header('Location: index.php?controller=home&action=index');
            exit;
        }
        
        require './Views/registro/index.php';
    }

    public function usuario() {
        // Si ya hay sesión activa, redirigir al home
        if (isset($_SESSION['rol'])) {
            header('Location: index.php?controller=home&action=index');
            exit;
        }

        $error = null;
        $success = null;
        $datos = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Recoger datos del formulario
            $datos = [
                'nro_documento' => trim($_POST['nro_documento'] ?? ''),
                'tipo_documento' => trim($_POST['tipo_documento'] ?? ''),
                'nombres' => trim($_POST['nombres'] ?? ''),
                'apellidos' => trim($_POST['apellidos'] ?? ''),
                'fecha_nacimiento' => trim($_POST['fecha_nacimiento'] ?? ''),
                'direccion_residencia' => trim($_POST['direccion_residencia'] ?? ''),
                'ciudad_residencia' => trim($_POST['ciudad_residencia'] ?? ''),
                'correo_electronico' => trim($_POST['correo_electronico'] ?? ''),
                'telefono' => trim($_POST['telefono'] ?? ''),
                'password' => $_POST['password'] ?? '',
                'confirm_password' => $_POST['confirm_password'] ?? '',
                'sexo' => trim($_POST['sexo'] ?? ''),
            ];

            // Validaciones
            $error = $this->validarDatosUsuario($datos);

            if (!$error) {
                try {
                    // Verificar si el usuario ya existe
                    $usuarioExistente = Datospersonales::buscarPorDocumento($datos['nro_documento']);
                    if ($usuarioExistente) {
                        $error = "Ya existe un usuario registrado con este número de documento.";
                    } else {
                        // Crear nuevo usuario
                        $usuario = new Datospersonales($datos);
                        $usuario->setFoto(''); // Foto vacía por defecto
                        
                        if ($usuario->guardar()) {
                            $success = "¡Registro exitoso! Ya puedes iniciar sesión.";
                            $datos = []; // Limpiar formulario
                        } else {
                            $error = "Error al registrar el usuario. Inténtalo de nuevo.";
                        }
                    }
                } catch (Exception $e) {
                    $error = "Error en el registro: " . $e->getMessage();
                }
            }
        }

        require './Views/registro/usuario.php';
    }

    public function empresa() {
        // Si ya hay sesión activa, redirigir al home
        if (isset($_SESSION['rol'])) {
            header('Location: index.php?controller=home&action=index');
            exit;
        }

        $error = null;
        $success = null;
        $datos = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Recoger datos del formulario
            $datos = [
                'nit_empresa' => trim($_POST['nit_empresa'] ?? ''),
                'nombre_empresa' => trim($_POST['nombre_empresa'] ?? ''),
                'nombre_delegado' => trim($_POST['nombre_delegado'] ?? ''),
                'cargo_delegado' => trim($_POST['cargo_delegado'] ?? ''),
                'correo_empresa' => trim($_POST['correo_empresa'] ?? ''),
                'password_empresa' => $_POST['password_empresa'] ?? '',
                'confirm_password' => $_POST['confirm_password'] ?? '',
                'telefono_empresa' => trim($_POST['telefono_empresa'] ?? ''),
                'pagweb_empresa' => trim($_POST['pagweb_empresa'] ?? ''),
            ];

            // Validaciones
            $error = $this->validarDatosEmpresa($datos);

            if (!$error) {
                try {
                    // Verificar si la empresa ya existe
                    $empresaExistente = Empresa::buscarPorNit($datos['nit_empresa']);
                    if ($empresaExistente) {
                        $error = "Ya existe una empresa registrada con este NIT.";
                    } else {
                        // Crear nueva empresa
                        $empresa = new Empresa($datos);
                        $empresa->setLogo_foto(''); // Logo vacío por defecto
                        
                        $empresa->guardar();
                        $success = "¡Registro exitoso! Ya puedes iniciar sesión.";
                        $datos = []; // Limpiar formulario
                    }
                } catch (Exception $e) {
                    $error = "Error en el registro: " . $e->getMessage();
                }
            }
        }

        require './Views/registro/empresa.php';
    }

    private function validarDatosUsuario($datos) {
        // Campos obligatorios
        $camposObligatorios = [
            'nro_documento', 'tipo_documento', 'nombres', 'apellidos', 
            'fecha_nacimiento', 'direccion_residencia', 'ciudad_residencia', 
            'correo_electronico', 'telefono', 'password', 'confirm_password', 'sexo'
        ];

        foreach ($camposObligatorios as $campo) {
            if (empty($datos[$campo])) {
                return "Todos los campos son obligatorios.";
            }
        }

        // Validar número de documento
        if (!is_numeric($datos['nro_documento']) || strlen($datos['nro_documento']) < 6) {
            return "El número de documento debe ser numérico y tener al menos 6 dígitos.";
        }

        // Validar email
        if (!filter_var($datos['correo_electronico'], FILTER_VALIDATE_EMAIL)) {
            return "El correo electrónico no tiene un formato válido.";
        }

        // Validar teléfono
        if (!is_numeric($datos['telefono']) || strlen($datos['telefono']) < 10) {
            return "El teléfono debe ser numérico y tener al menos 10 dígitos.";
        }

        // Validar contraseña
        if (strlen($datos['password']) < 6) {
            return "La contraseña debe tener al menos 6 caracteres.";
        }

        // Confirmar contraseña
        if ($datos['password'] !== $datos['confirm_password']) {
            return "Las contraseñas no coinciden.";
        }

        // Validar fecha de nacimiento
        $fechaNacimiento = DateTime::createFromFormat('Y-m-d', $datos['fecha_nacimiento']);
        if (!$fechaNacimiento) {
            return "La fecha de nacimiento no es válida.";
        }

        $hoy = new DateTime();
        $edad = $hoy->diff($fechaNacimiento)->y;
        if ($edad < 14 || $edad > 100) {
            return "La edad debe estar entre 14 y 100 años.";
        }

        return null; // Sin errores
    }

    private function validarDatosEmpresa($datos) {
        // Campos obligatorios
        $camposObligatorios = [
            'nit_empresa', 'nombre_empresa', 'nombre_delegado', 
            'cargo_delegado', 'correo_empresa', 'password_empresa', 
            'confirm_password', 'telefono_empresa'
        ];

        foreach ($camposObligatorios as $campo) {
            if (empty($datos[$campo])) {
                return "Todos los campos son obligatorios (excepto página web).";
            }
        }

        // Validar NIT
        if (!is_numeric($datos['nit_empresa']) || strlen($datos['nit_empresa']) < 8) {
            return "El NIT debe ser numérico y tener al menos 8 dígitos.";
        }

        // Validar email
        if (!filter_var($datos['correo_empresa'], FILTER_VALIDATE_EMAIL)) {
            return "El correo electrónico no tiene un formato válido.";
        }

        // Validar teléfono
        if (!is_numeric($datos['telefono_empresa']) || strlen($datos['telefono_empresa']) < 10) {
            return "El teléfono debe ser numérico y tener al menos 10 dígitos.";
        }

        // Validar contraseña
        if (strlen($datos['password_empresa']) < 6) {
            return "La contraseña debe tener al menos 6 caracteres.";
        }

        // Confirmar contraseña
        if ($datos['password_empresa'] !== $datos['confirm_password']) {
            return "Las contraseñas no coinciden.";
        }

        return null; // Sin errores
    }
}
?>