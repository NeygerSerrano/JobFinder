<?php

require_once './connection.php';

class Vacante {
    // Atributos privados
    private $vacant_id;
    private $empr_nit;
    private $cargo;
    private $desc_cargo;
    private $nro_vacantes;
    private $requisitos;
    private $exp_requerida;
    private $tipo_vinculo;
    private $ubicacion;
    private $salario;
    private $fecha_cierre;

    public function __construct($data = []) {
        foreach ($data as $key => $value) {
            $setter = 'set' . ucfirst($key);
            if (method_exists($this, $setter)) {
                $this->$setter($value);
            }
        }
    }

    // ----- Getters -----
    public function getVacant_id() { return $this->vacant_id; }
    public function getEmpr_nit() { return $this->empr_nit; }
    public function getCargo() { return $this->cargo; }
    public function getDesc_cargo() { return $this->desc_cargo; }
    public function getNro_vacantes() { return $this->nro_vacantes; }
    public function getRequisitos() { return $this->requisitos; }
    public function getExp_requerida() { return $this->exp_requerida; }
    public function getTipo_vinculo() { return $this->tipo_vinculo; }
    public function getUbicacion() { return $this->ubicacion; }
    public function getSalario() { return $this->salario; }
    public function getFecha_cierre() { return $this->fecha_cierre; }

    // ----- Setters -----
    public function setVacant_id($v) { $this->vacant_id = $v; }
    public function setEmpr_nit($v) { $this->empr_nit = $v; }
    public function setCargo($v) { $this->cargo = $v; }
    public function setDesc_cargo($v) { $this->desc_cargo = $v; }
    public function setNro_vacantes($v) { $this->nro_vacantes = $v; }
    public function setRequisitos($v) { $this->requisitos = $v; }
    public function setExp_requerida($v) { $this->exp_requerida = $v; }
    public function setTipo_vinculo($v) { $this->tipo_vinculo = $v; }
    public function setUbicacion($v) { $this->ubicacion = $v; }
    public function setSalario($v) { $this->salario = $v; }
    public function setFecha_cierre($v) { $this->fecha_cierre = $v; }

    // ----- Guardar -----
    public function guardar() {
        $db = Db::getConnect();
        $stmt = $db->prepare('
            INSERT INTO vacante (
                empr_nit, cargo, desc_cargo, nro_vacantes, requisitos,
                exp_requerida, tipo_vinculo, ubicacion, salario, fecha_cierre
            ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
        ');

        $stmt->bind_param(
            'ssssssssss',
            $this->empr_nit,
            $this->cargo,
            $this->desc_cargo,
            $this->nro_vacantes,
            $this->requisitos,
            $this->exp_requerida,
            $this->tipo_vinculo,
            $this->ubicacion,
            $this->salario,
            $this->fecha_cierre
        );

        return $stmt->execute();
    }

    // ----- Actualizar -----
    public function actualizar() {
        $db = Db::getConnect();
        $stmt = $db->prepare('
            UPDATE vacante SET
                cargo = ?, desc_cargo = ?, nro_vacantes = ?, requisitos = ?, 
                exp_requerida = ?, tipo_vinculo = ?, ubicacion = ?, salario = ?, fecha_cierre = ?
            WHERE vacant_id = ?
        ');

        $stmt->bind_param(
            'sssssssssi',
            $this->cargo,
            $this->desc_cargo,
            $this->nro_vacantes,
            $this->requisitos,
            $this->exp_requerida,
            $this->tipo_vinculo,
            $this->ubicacion,
            $this->salario,
            $this->fecha_cierre,
            $this->vacant_id
        );

        return $stmt->execute();
    }

    // ----- Eliminar -----
    public static function eliminar($vacant_id) {
        $db = Db::getConnect();
        $stmt = $db->prepare('DELETE FROM vacante WHERE vacant_id = ?');
        $stmt->bind_param('i', $vacant_id);
        return $stmt->execute();
    }

    // ----- Buscar por ID -----
    public static function buscarPorId($vacant_id) {
        $db = Db::getConnect();
        $stmt = $db->prepare('SELECT * FROM vacante WHERE vacant_id = ?');
        $stmt->bind_param('i', $vacant_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($row = $result->fetch_assoc()) {
            return new self($row);
        }

        return null;
    }

    public function buscarPorEmpresa($empr_nit)
    {
        $db = Db::getConnect();
        $stmt = $db->prepare('SELECT * FROM vacante WHERE empr_nit = ?');
        $stmt->bind_param('s', $empr_nit);
        $stmt->execute();
        $result = $stmt->get_result();
        $lista = [];
        while ($row = $result->fetch_assoc()) {
            $lista[] = new self($row);
        }
        return $lista;
    }

    public static function buscarParaUsuario() {
        $db = Db::getConnect();
        $stmt = $db->query("
            SELECT v.*, e.nombre_empresa AS nombre_empresa
            FROM vacante v
            JOIN empresa e ON v.empr_nit = e.nit_empresa
            WHERE v.fecha_cierre >= CURDATE()
            ORDER BY v.fecha_cierre ASC
        ");

        $lista = [];
        while ($row = $stmt->fetch_assoc()) {
            $vacante = new self($row);
            $vacante->nombre_empresa = $row['nombre_empresa']; // atributo dinámico
            $lista[] = $vacante;
        }
        return $lista;
    }



    // ----- Buscar todas -----
    public static function buscarTodas() {
        $db = Db::getConnect();
        $stmt = $db->query('SELECT * FROM vacante ORDER BY fecha_cierre DESC');
        $lista = [];
        while ($row = $stmt->fetch_assoc()) {
            $lista[] = new Vacante($row);
        }
        return $lista;
    }
}
