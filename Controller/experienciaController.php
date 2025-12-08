<?php
require_once './Model/experiencia.php';

class ExperienciaController {

    public function index() {
        // Verificar sesión activa
        if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'usuario') {
            header('Location: index.php?controller=login&action=index');
            exit;
        }

        // Obtener experiencias del usuario actual
        $nro_doc_persona = $_SESSION['usuario'];
        $experiencias = Experiencia::buscarPorUsuario($nro_doc_persona);
        
        require './Views/experiencia/index.php';
    }

    public function crear() {
        // Verificar sesión activa
        if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'usuario') {
            header('Location: index.php?controller=login&action=index');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $datos = $_POST;
            // Asignar el documento de la persona logueada
            $datos['nro_doc_persona'] = $_SESSION['usuario'];

            $exp = new Experiencia($datos);
            $exp->guardar();

            header("Location: index.php?controller=experiencia&action=index");
            exit;
        } else {
            require './Views/experiencia/crear.php';
        }
    }

    public function editar($id_experiencia) {
        // Verificar sesión activa
        if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'usuario') {
            header('Location: index.php?controller=login&action=index');
            exit;
        }

        $exp = Experiencia::buscarPorId($id_experiencia);
        
        // Verificar que la experiencia pertenece al usuario actual
        if (!$exp || $exp->getNro_doc_persona() !== $_SESSION['usuario']) {
            header('Location: index.php?controller=experiencia&action=index');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $datos = $_POST;
            $datos['nro_doc_persona'] = $_SESSION['usuario'];
            
            $expActualizada = new Experiencia($datos);
            $expActualizada->setId_experiencia($id_experiencia);
            $expActualizada->actualizar();

            header("Location: index.php?controller=experiencia&action=index");
            exit;
        } else {
            require './Views/experiencia/editar.php';
        }
    }

    public function ver() {
        // Verificar sesión activa
        if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'usuario') {
            header('Location: index.php?controller=login&action=index');
            exit;
        }

        // Obtener experiencias del usuario actual
        $nro_doc_persona = $_SESSION['usuario'];
        $experiencias = Experiencia::buscarPorUsuario($nro_doc_persona);

        require './Views/experiencia/ver.php';
    }

    public function eliminar($id_experiencia) {
        // Verificar sesión activa
        if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'usuario') {
            header('Location: index.php?controller=login&action=index');
            exit;
        }

        $nro_doc_persona = $_SESSION['usuario'];
        
        // Verificar que la experiencia pertenece al usuario actual
        $exp = Experiencia::buscarPorId($id_experiencia);
        if ($exp && $exp->getNro_doc_persona() === $nro_doc_persona) {
            Experiencia::eliminar($id_experiencia, $nro_doc_persona);
        }

        header("Location: index.php?controller=experiencia&action=index");
        exit;
    }

    public function error() {
        echo "<h1>La página que buscas no existe</h1>";
    }
}