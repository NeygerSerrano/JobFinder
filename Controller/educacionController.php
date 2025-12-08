<?php
require_once './Model/educacion.php';

class EducacionController {
    
    public function index() {
        // Verificar sesión activa
        if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'usuario') {
            header('Location: index.php?controller=login&action=index');
            exit;
        }

        // Obtener educaciones del usuario actual
        $nro_doc_persona = $_SESSION['usuario'];
        $educaciones = Educacion::buscarPorUsuario($nro_doc_persona);
        
        require './Views/educacion/index.php';
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
            
            $edu = new Educacion($datos);
            $edu->guardar();
            
            header("Location: index.php?controller=educacion&action=index");
            exit;
        } else {
            require './Views/educacion/crear.php';
        }
    }

    public function editar($id_estudio) {
        // Verificar sesión activa
        if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'usuario') {
            header('Location: index.php?controller=login&action=index');
            exit;
        }

        $educacion = Educacion::buscarEducacion($id_estudio);
        
        // Verificar que la educación pertenece al usuario actual
        if (!$educacion || $educacion->getNro_doc_persona() !== $_SESSION['usuario']) {
            header('Location: index.php?controller=educacion&action=index');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $datos = $_POST;
            $datos['nro_doc_persona'] = $_SESSION['usuario'];
            
            $educacionActualizada = new Educacion($datos);
            $educacionActualizada->setId_estudio($id_estudio);
            $educacionActualizada->actualizar();
            
            header("Location: index.php?controller=educacion&action=index");
            exit;
        } else {
            require './Views/educacion/editar.php';
        }
    }

    public function ver() {
        // Verificar sesión activa
        if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'usuario') {
            header('Location: index.php?controller=login&action=index');
            exit;
        }

        // Obtener educaciones del usuario actual
        $nro_doc_persona = $_SESSION['usuario'];
        $educaciones = Educacion::buscarPorUsuario($nro_doc_persona);
        
        require './Views/educacion/ver.php';
    }

    public function eliminar($id_estudio) {
        // Verificar sesión activa
        if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'usuario') {
            header('Location: index.php?controller=login&action=index');
            exit;
        }

        $nro_doc_persona = $_SESSION['usuario'];
        
        // Verificar que la educación pertenece al usuario actual
        $educacion = Educacion::buscarEducacion($id_estudio);
        if ($educacion && $educacion->getNro_doc_persona() === $nro_doc_persona) {
            Educacion::eliminar($id_estudio, $nro_doc_persona);
        }
        
        header("Location: index.php?controller=educacion&action=index");
        exit;
    }

    public function error() {
        echo "<h1>La página que buscas no existe</h1>";
    }
}