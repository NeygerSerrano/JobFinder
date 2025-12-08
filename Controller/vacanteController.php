<?php

require_once './Model/vacante.php';
require_once './Model/empresa.php';

class VacanteController {

    public function index() {
        $vacantes = Vacante::buscarTodas();
        require './Views/vacantes/index.php';
    }

    public function crear() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $vacante = new Vacante($_POST);
            $vacante->setEmpr_nit($_SESSION['usuario']); // NIT empresa logueada
            if ($vacante->guardar()) {
                header('Location: index.php?controller=vacante&action=index');
                exit;
            } else {
                $error = "Error al guardar la vacante.";
            }
        }
        require './Views/vacantes/crear.php';
    }

    public function editar() {
        if (!isset($_GET['id'])) {
            header('Location: index.php?controller=vacante&action=index');
            exit;
        }

        $vacante = Vacante::buscarPorId($_GET['id']);
        if (!$vacante) {
            header('Location: index.php?controller=vacante&action=index');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $vacante->setCargo($_POST['cargo']);
            $vacante->setDesc_cargo($_POST['desc_cargo']);
            $vacante->setNro_vacantes($_POST['nro_vacantes']);
            $vacante->setRequisitos($_POST['requisitos']);
            $vacante->setExp_requerida($_POST['exp_requerida']);
            $vacante->setTipo_vinculo($_POST['tipo_vinculo']);
            $vacante->setUbicacion($_POST['ubicacion']);
            $vacante->setSalario($_POST['salario']);
            $vacante->setFecha_cierre($_POST['fecha_cierre']);

            if ($vacante->actualizar()) {
                header('Location: index.php?controller=vacante&action=index');
                exit;
            } else {
                $error = "Error al actualizar la vacante.";
            }
        }

        require './Views/vacantes/editar.php';
    }

    public function ver()
    {
        // Aquí asumimos que tienes una sesión con la empresa activa
        $empr_nit = $_SESSION['usuario'] ?? null;

        if (!$empr_nit) {
            header("Location: index.php?controller=home&action=index");
            exit;
        }

        $vacanteModel = new Vacante();
        $vacantes = $vacanteModel->buscarPorEmpresa($empr_nit); // Esto sería un método en el modelo
        require './Views/vacantes/ver.php';
    }

    public function verVacantes() {

        $vacantes = Vacante::buscarParaUsuario();

        require './Views/vacantes/verVacantes.php';
    }

    public function detalles($vacant_id) {
        // Traer la vacante por ID
        $vacante = Vacante::buscarPorId($vacant_id);
        if (!$vacante) {
            echo "<h1>Vacante no encontrada</h1>";
            return;
        }

        // Traer la empresa asociada
        $empresa = Empresa::buscarPorNit($vacante->getEmpr_nit());

        // Cargar la vista detalle con ambos objetos
        require './Views/vacantes/detalles.php';
    }


    public function eliminar() {
        if (isset($_GET['id'])) {
            Vacante::eliminar($_GET['id']);
        }
        header('Location: index.php?controller=vacante&action=index');
        exit;
    }


    public function obtenerVacante($vacant_id)
    {
        session_start();
        if (!isset($_SESSION['empresa'])) {
            http_response_code(403);
            echo json_encode(['error' => 'No autorizado']);
            return;
        }

        $vacante = Vacante::buscarPorId($vacant_id);
        if ($vacante) {
            echo json_encode($vacante);
        } else {
            http_response_code(404);
            echo json_encode(['error' => 'Vacante no encontrada']);
        }
    }



}
