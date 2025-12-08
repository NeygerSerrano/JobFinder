<?php

class HomeController {
    
    public function index() {
        // Verificar que hay sesión activa
        if (!isset($_SESSION['rol'])) {
            header('Location: index.php?controller=login&action=index');
            exit;
        }

        $estadisticas = [];

        if ($_SESSION['rol'] === 'usuario') {
            // Obtener estadísticas para usuario
            require_once './Model/postulacion.php';
            require_once './Model/vacante.php';
            
            $postulaciones = Postulacion::obtenerPorUsuario($_SESSION['usuario']);
            
            $estadisticas['total_postulaciones'] = count($postulaciones);
            $estadisticas['pendientes'] = count(array_filter($postulaciones, fn($p) => $p->getEstado() === 'Pendiente'));
            $estadisticas['aceptadas'] = count(array_filter($postulaciones, fn($p) => $p->getEstado() === 'Aceptado'));
            $estadisticas['rechazadas'] = count(array_filter($postulaciones, fn($p) => $p->getEstado() === 'Rechazado'));
            
            // Obtener vacantes recientes
            $estadisticas['vacantes_disponibles'] = Vacante::buscarParaUsuario();
            $estadisticas['ultimas_postulaciones'] = array_slice($postulaciones, 0, 5);
            
        } elseif ($_SESSION['rol'] === 'empresa') {
            // Obtener estadísticas para empresa
            require_once './Model/postulacion.php';
            require_once './Model/vacante.php';
            
            $postulaciones = Postulacion::obtenerPorEmpresa($_SESSION['usuario']);
            $vacantes = (new Vacante())->buscarPorEmpresa($_SESSION['usuario']);
            
            $estadisticas['total_vacantes'] = count($vacantes);
            $estadisticas['total_postulaciones'] = count($postulaciones);
            $estadisticas['pendientes'] = count(array_filter($postulaciones, fn($p) => $p->getEstado() === 'Pendiente'));
            $estadisticas['aceptadas'] = count(array_filter($postulaciones, fn($p) => $p->getEstado() === 'Aceptado'));
            $estadisticas['ultimas_postulaciones'] = array_slice($postulaciones, 0, 5);
            $estadisticas['vacantes_activas'] = array_filter($vacantes, fn($v) => $v->getFecha_cierre() >= date('Y-m-d'));
        }

        require './Views/home.php';
    }
    
    public function error() {
        http_response_code(404);
        echo "<h1>Error 404: La página que buscas no existe</h1>";
        echo '<a href="index.php?controller=home&action=index">Volver al inicio</a>';
    }
}
?>