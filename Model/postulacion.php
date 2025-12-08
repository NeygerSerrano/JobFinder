<?php
require_once './connection.php';

class Postulacion {
    private $nro_doc_persona;
    private $vac_id;
    private $estado;
    private $observaciones;
    private $fecha_postulacion;

    // Campos adicionales para mostrar información de la vacante y empresa
    private $nombre_vacante;
    private $descripcion_vacante;
    private $salario;
    private $ubicacion;
    private $nombre_empresa;
    private $nombre_completo;

    public function __construct($data = []) {
        foreach ($data as $key => $value) {
            $setter = 'set' . ucfirst($key);
            if (method_exists($this, $setter)) {
                $this->$setter($value);
            }
        }
    }

    // ----- Getters -----
    public function getNro_doc_persona() { return $this->nro_doc_persona; }
    public function getVac_id() { return $this->vac_id; }
    public function getEstado() { return $this->estado; }
    public function getObservaciones() { return $this->observaciones; }
    public function getFecha_postulacion() { return $this->fecha_postulacion; }

    public function getNombre_vacante() { return $this->nombre_vacante; }
    public function getDescripcion_vacante() { return $this->descripcion_vacante; }
    public function getSalario() { return $this->salario; }
    public function getUbicacion() { return $this->ubicacion; }
    public function getNombre_empresa() { return $this->nombre_empresa; }
    public function getNombre_completo() { return $this->nombre_completo; }

    // ----- Setters -----
    public function setNro_doc_persona($v) { $this->nro_doc_persona = $v; }
    public function setVac_id($v) { $this->vac_id = $v; }
    public function setEstado($v) { $this->estado = $v; }
    public function setObservaciones($v) { $this->observaciones = $v; }
    public function setFecha_postulacion($v) { $this->fecha_postulacion = $v; }

    public function setNombre_vacante($v) { $this->nombre_vacante = $v; }
    public function setDescripcion_vacante($v) { $this->descripcion_vacante = $v; }
    public function setSalario($v) { $this->salario = $v; }
    public function setUbicacion($v) { $this->ubicacion = $v; }
    public function setNombre_empresa($v) { $this->nombre_empresa = $v; }
    public function setNombre_completo($v) { $this->nombre_completo = $v; }

    // ----- Guardar postulación -----
    public function guardar() {
        $db = Db::getConnect();
        $stmt = $db->prepare('
            INSERT INTO postulacion (nro_doc_persona, vac_id, estado, observaciones, fecha_postulacion)
            VALUES (?, ?, ?, ?, ?)
        ');
        $stmt->bind_param(
            'sisss',
            $this->nro_doc_persona,
            $this->vac_id,
            $this->estado,
            $this->observaciones,
            $this->fecha_postulacion
        );
        return $stmt->execute();
    }

    // ----- Verificar si ya se postuló -----
    public static function yaPostulado($nro_doc_persona, $vac_id) {
        $db = Db::getConnect();
        $stmt = $db->prepare('SELECT * FROM postulacion WHERE nro_doc_persona = ? AND vac_id = ?');
        $stmt->bind_param('si', $nro_doc_persona, $vac_id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->num_rows > 0;
    }

    // ----- Obtener postulaciones por usuario -----
    public static function obtenerPorUsuario($nro_doc_persona) {
        $db = Db::getConnect();
        $stmt = $db->prepare('
            SELECT p.*, 
                   v.cargo AS nombre_vacante, v.desc_cargo AS descripcion_vacante, v.salario, v.ubicacion,
                   e.nombre_empresa
            FROM postulacion p
            INNER JOIN vacante v ON p.vac_id = v.vacant_id
            INNER JOIN empresa e ON v.empr_nit = e.nit_empresa
            WHERE p.nro_doc_persona = ?
        ');
        $stmt->bind_param('s', $nro_doc_persona);
        $stmt->execute();
        $result = $stmt->get_result();

        $lista = [];
        while ($row = $result->fetch_assoc()) {
            $lista[] = new self($row);
        }

        return $lista;
    }

    // ----- Obtener postulaciones por empresa -----
    public static function obtenerPorEmpresa($empr_nit) {
        $db = Db::getConnect();

        $stmt = $db->prepare('
            SELECT 
                p.nro_doc_persona,
                p.vac_id,
                p.estado,
                p.observaciones,
                p.fecha_postulacion,
                v.cargo AS nombre_vacante,
                v.desc_cargo AS descripcion_vacante,
                v.fecha_cierre,
                CONCAT(dp.nombres, " ", dp.apellidos) AS nombre_completo,
                dp.nro_documento AS documento
            FROM postulacion p
            INNER JOIN vacante v ON p.vac_id = v.vacant_id
            INNER JOIN datos_personales dp ON p.nro_doc_persona = dp.nro_documento
            WHERE v.empr_nit = ?
        ');

        $stmt->bind_param('s', $empr_nit);
        $stmt->execute();
        $result = $stmt->get_result();

        $lista = [];
        while ($row = $result->fetch_assoc()) {
            $lista[] = new self($row);
        }

        return $lista;
    }


    // ----- Actualizar estado de la postulación -----
    public static function actualizarEstado($nro_doc_persona, $vac_id, $nuevo_estado) {
        $db = Db::getConnect();
        $stmt = $db->prepare('UPDATE postulacion SET estado = ? WHERE nro_doc_persona = ? AND vac_id = ?');
        $stmt->bind_param('ssi', $nuevo_estado, $nro_doc_persona, $vac_id);
        return $stmt->execute();
    }



    // ----- Cancelar postulación -----
    public static function cancelar($nro_doc_persona, $vac_id) {
        $db = Db::getConnect();
        $stmt = $db->prepare('DELETE FROM postulacion WHERE nro_doc_persona = ? AND vac_id = ?');
        $stmt->bind_param('si', $nro_doc_persona, $vac_id);
        return $stmt->execute();
    }
}
