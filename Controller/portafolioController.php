<?php
require_once './Model/portafolio.php';

class PortafolioController {

    public function index() {
        // Verificar sesión activa
        if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'usuario') {
            header('Location: index.php?controller=login&action=index');
            exit;
        }

        // Obtener proyectos del usuario actual
        $nro_doc_persona = $_SESSION['usuario'];
        $proyectos = Portafolio::buscarPorUsuario($nro_doc_persona);
        
        require './Views/portafolio/index.php';
    }

    public function crear() {
        // Verificar sesión activa
        if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'usuario') {
            header('Location: index.php?controller=login&action=index');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Manejar subida de imagen (si aplicable)
            $fotoNombre = null;
            if (isset($_FILES['foto_proyecto']) && $_FILES['foto_proyecto']['error'] === UPLOAD_ERR_OK) {
                $tmp_name = $_FILES['foto_proyecto']['tmp_name'];
                $originalName = basename($_FILES['foto_proyecto']['name']);
                $uploadDir = __DIR__ . '/../uploads/proyectos/';
                
                // Crear carpeta si no existe
                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0755, true);
                }
                
                $fotoNombre = uniqid() . "_" . $originalName;
                $destino = $uploadDir . $fotoNombre;
                
                if (!move_uploaded_file($tmp_name, $destino)) {
                    die("Error al subir la foto del proyecto");
                }
            }

            $datos = $_POST;
            $datos['nro_doc_persona'] = $_SESSION['usuario'];
            $datos['foto_proyecto'] = $fotoNombre;

            $port = new Portafolio($datos);
            $port->guardar();

            header("Location: index.php?controller=portafolio&action=index");
            exit;
        } else {
            require './Views/portafolio/crear.php';
        }
    }

    public function editar($id_proyecto) {
        // Verificar sesión activa
        if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'usuario') {
            header('Location: index.php?controller=login&action=index');
            exit;
        }

        $port = Portafolio::buscarPorId($id_proyecto);
        
        // Verificar que el proyecto pertenece al usuario actual
        if (!$port || $port->getNro_doc_persona() !== $_SESSION['usuario']) {
            header('Location: index.php?controller=portafolio&action=index');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Manejar actualización de imagen (si aplicable)
            $fotoNombre = $port->getFoto_proyecto(); // Mantener foto actual por defecto

            if (isset($_FILES['foto_proyecto']) && $_FILES['foto_proyecto']['error'] === UPLOAD_ERR_OK) {
                $tmp_name = $_FILES['foto_proyecto']['tmp_name'];
                $originalName = basename($_FILES['foto_proyecto']['name']);
                $uploadDir = __DIR__ . '/../uploads/proyectos/';
                
                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0755, true);
                }
                
                $fotoNombre = uniqid() . "_" . $originalName;
                $destino = $uploadDir . $fotoNombre;
                
                if (move_uploaded_file($tmp_name, $destino)) {
                    // Eliminar foto anterior si existía
                    if ($port->getFoto_proyecto() && file_exists($uploadDir . $port->getFoto_proyecto())) {
                        unlink($uploadDir . $port->getFoto_proyecto());
                    }
                }
            }

            $datos = $_POST;
            $datos['nro_doc_persona'] = $_SESSION['usuario'];
            $datos['foto_proyecto'] = $fotoNombre;
            
            $portActualizado = new Portafolio($datos);
            $portActualizado->setId_proyecto($id_proyecto);
            $portActualizado->actualizar();

            header("Location: index.php?controller=portafolio&action=index");
            exit;
        } else {
            require './Views/portafolio/editar.php';
        }
    }

    public function ver() {
        // Verificar sesión activa
        if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'usuario') {
            header('Location: index.php?controller=login&action=index');
            exit;
        }

        // Obtener proyectos del usuario actual
        $nro_doc_persona = $_SESSION['usuario'];
        $portafolios = Portafolio::buscarPorUsuario($nro_doc_persona);

        require './Views/portafolio/ver.php';
    }

    public function eliminar($id_proyecto) {
        // Verificar sesión activa
        if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'usuario') {
            header('Location: index.php?controller=login&action=index');
            exit;
        }

        $nro_doc_persona = $_SESSION['usuario'];
        
        // Verificar que el proyecto pertenece al usuario actual
        $port = Portafolio::buscarPorId($id_proyecto);
        if ($port && $port->getNro_doc_persona() === $nro_doc_persona) {
            // Eliminar foto si existe
            if ($port->getFoto_proyecto()) {
                $uploadDir = __DIR__ . '/../uploads/proyectos/';
                $fotoPath = $uploadDir . $port->getFoto_proyecto();
                if (file_exists($fotoPath)) {
                    unlink($fotoPath);
                }
            }
            
            Portafolio::eliminar($id_proyecto, $nro_doc_persona);
        }

        header("Location: index.php?controller=portafolio&action=index");
        exit;
    }

    public function error() {
        echo "<h1>La página que buscas no existe</h1>";
    }
}