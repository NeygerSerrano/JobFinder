<?php
require_once './Model/Empresa.php';

class EmpresaController {

    public function index() {
        // Acá puedes implementar una lista si lo deseas
        require './Views/empresa/index.php';
    }

    public function crear() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $logoNombre = null;

            if (isset($_FILES['logo_foto']) && $_FILES['logo_foto']['error'] === UPLOAD_ERR_OK) {
                $tmp_name = $_FILES['logo_foto']['tmp_name'];
                $originalName = basename($_FILES['logo_foto']['name']);
                $uploadDir = __DIR__ . '/../uploads/';

                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0755, true);
                }

                $logoNombre = uniqid() . "_" . $originalName;
                $destino = $uploadDir . $logoNombre;

                if (!move_uploaded_file($tmp_name, $destino)) {
                    die("Error al subir el logo");
                }
            }

            $datos = $_POST;
            $datos['logo_foto'] = $logoNombre;

            $empresa = new Empresa($datos);
            $empresa->guardar();

            header("Location: index.php?action=listar_empresas");
            exit;

        } else {
            require './Views/empresa/crear.php';
        }
    }


    public function editar($nit_empresa) {
        $empresaExistente = Empresa::buscarPorNit($nit_empresa);

        if (!$empresaExistente) {
            die("Empresa no encontrada");
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $logoViejo = $empresaExistente->getLogo_foto();
            $logoNombre = $logoViejo;

            $uploadDir = __DIR__ . '/../uploads/';
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0755, true);
            }

            if (isset($_FILES['logo_foto']) && $_FILES['logo_foto']['error'] === UPLOAD_ERR_OK) {
                $tmp_name = $_FILES['logo_foto']['tmp_name'];
                $originalName = basename($_FILES['logo_foto']['name']);
                $logoNombre = uniqid() . "_" . $originalName;
                $destino = $uploadDir . $logoNombre;

                if (!move_uploaded_file($tmp_name, $destino)) {
                    die("Error al subir el logo");
                }

                if ($logoViejo && file_exists($uploadDir . $logoViejo)) {
                    unlink($uploadDir . $logoViejo);
                }
            }

            $datos = $_POST;
            $datos['logo_foto'] = $logoNombre;
            $datos['nit_empresa'] = $nit_empresa; // asegúrate de mantener el NIT

            $empresaActualizada = new Empresa($datos);
            $empresaActualizada->actualizar();

            header("Location: index.php?controller=empresa&action=perfil");
            exit;

        } else {
            require './Views/empresa/editar.php';
        }
    }


    public function eliminar($nit_empresa) {
        Empresa::eliminar($nit_empresa);
        header("Location: index.php?action=listar_empresas");
        exit;
    }

    public function ver() {
        $empresas = Empresa::obtenerTodas(); // 👈 Asegúrate que usas $empresas, no $empresa

        if (!$empresas) {
            die("No hay empresas registradas.");
        }

        require './Views/empresa/ver.php';
    }

    public function perfil() {
        // Verificar que hay sesión activa y es empresa
        if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'empresa') {
            header('Location: index.php?controller=login&action=index');
            exit;
        }

        $nit_empresa = $_SESSION['usuario']; // 👈 acá está guardado en login

        // Obtener datos de la empresa desde el modelo
        require_once './Model/empresa.php';
        $empresa = Empresa::buscarPorNit($nit_empresa);

        if (!$empresa) {
            // Si no encuentra la empresa, redirigir o mostrar error
            die("No se encontraron datos de la empresa con NIT $nit_empresa");
        }

        // Pasar la variable a la vista
        require './Views/empresa/perfil.php';
    }




    public function error() {
        echo "<h1>La página que buscas no existe</h1>";
    }


}
