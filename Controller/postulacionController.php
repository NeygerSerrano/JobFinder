<?php
require_once './Model/postulacion.php';
require_once './Model/vacante.php';
require_once './Model/empresa.php';
require_once './Model/educacion.php';
require_once './Model/portafolio.php';

class PostulacionController {

    // ----- Mostrar postulaciones del usuario -----
    public function indexUsuario() {
        // session_start();
        $nro_doc = $_SESSION['usuario']; // Número de documento del usuario logueado

        $postulaciones = Postulacion::obtenerPorUsuario($nro_doc);

        require './Views/postulacion/indexUsuario.php';
    }

    // ----- Crear nueva postulación -----
    public function crear($vac_id)
    {
        session_start();

        // Obtener el documento del usuario desde la sesión
        if (!isset($_SESSION['usuario'])) {
            // Redirigir al login si no hay usuario
            header("Location: index.php?controller=login&action=index");
            exit;
        }
        $nro_doc = $_SESSION['usuario'];

        // Verificar si ya se postuló
        if (Postulacion::yaPostulado($nro_doc, $vac_id)) {
            $_SESSION['error'] = "Ya te has postulado a esta vacante.";
            header("Location: index.php?controller=vacante&action=ver");
            exit;
        }

        // Crear objeto Postulacion
        $postulacion = new Postulacion();
        $postulacion->setNro_doc_persona($nro_doc);
        $postulacion->setVac_id($vac_id);
        $postulacion->setEstado("Pendiente");
        $postulacion->setObservaciones(""); // vacío por ahora
        $postulacion->setFecha_postulacion(date('Y-m-d'));

        $resultado = $postulacion->guardar();

        if ($resultado) {
            $_SESSION['mensaje'] = "Postulación realizada correctamente.";
        } else {
            $_SESSION['error'] = "No se pudo realizar la postulación.";
        }

        // Redirigir de nuevo a la vista de vacantes
        header("Location: index.php?controller=vacante&action=verVacantes");
        exit;
    }

    // ----- Cancelar postulación de un usuario -----
    public function cancelar($vac_id) {
        // session_start();
        $nro_doc = $_SESSION['usuario'];

        $resultado = Postulacion::cancelar($nro_doc, $vac_id);

        if ($resultado) {
            $_SESSION['mensaje'] = "Postulación cancelada correctamente.";
        } else {
            $_SESSION['error'] = "No se pudo cancelar la postulación.";
        }

        header("Location: index.php?controller=postulacion&action=indexUsuario");
        exit;
    }

    // ----- Mostrar postulaciones recibidas para la empresa -----
    public function indexEmpresa() {
        // session_start();
        $empresa_nit = $_SESSION['usuario']; // NIT de la empresa logueada

        $postulaciones = Postulacion::obtenerPorEmpresa($empresa_nit);

        require './Views/postulacion/indexEmpresa.php';
    }

    // ----- Cambiar estado de una postulación -----
    public function cambiarEstado() {
        session_start();
        $nro_doc = $_GET['nro_doc_persona'];
        $vac_id = $_GET['vac_id'];
        $estado = $_GET['estado']; // "Aceptado" o "Rechazado"

        $resultado = Postulacion::actualizarEstado($nro_doc, $vac_id, $estado);

        if ($resultado) {
            $_SESSION['mensaje'] = "El estado de la postulación se actualizó correctamente.";
        } else {
            $_SESSION['error'] = "No se pudo actualizar el estado.";
        }

        header("Location: index.php?controller=postulacion&action=indexEmpresa");
        exit;
    }

    
    public function verPerfilUsuario() {
        // Documento del candidato recibido por GET
        $nro_doc = $_GET['nro_doc_persona'] ?? null;

        if (!$nro_doc) {
            $_SESSION['error'] = "No se pudo acceder al perfil del candidato.";
            header("Location: index.php?controller=postulacion&action=indexEmpresa");
            exit;
        }

        // Importar modelos necesarios
        require_once './Model/datospersonales.php';
        require_once './Model/educacion.php';
        require_once './Model/experiencia.php';
        require_once './Model/portafolio.php';

        // Cargar datos
        $datosPersonales = DatosPersonales::buscarPorDocumento($nro_doc);
        $educaciones = Educacion::buscarPorUsuario($nro_doc);
        $experiencias = Experiencia::buscarPorUsuario($nro_doc);
        $proyectos = Portafolio::buscarPorUsuario($nro_doc);

        // Cargar la vista de perfil para la empresa
        require './Views/postulacion/perfilUsuario.php';
    }


}
