<?php
require_once './connection.php';

class Experiencia {
    private $id_experiencia;
    private $fecha_ini;
    private $fecha_fin;
    private $cargo;
    private $empresa;
    private $descripcion_funciones;
    private $nro_doc_persona;

    public function __construct($data = []) {
        foreach ($data as $key => $value) {
            // Genera el nombre del setter respetando los guiones bajos
            $setter = 'set' . ucfirst($key);
            
            // Si existe el método, lo llama
            if (method_exists($this, $setter)) {
                $this->$setter($value);
            }
        }
    }

    // Getters y Setters...
    public function getId_experiencia() { return $this->id_experiencia; }
    public function setId_experiencia($v) { $this->id_experiencia = $v; }

    public function getFecha_ini() { return $this->fecha_ini; }
    public function setFecha_ini($v) { $this->fecha_ini = $v; }

    public function getFecha_fin() { return $this->fecha_fin; }
    public function setFecha_fin($v) { $this->fecha_fin = $v; }

    public function getCargo() { return $this->cargo; }
    public function setCargo($v) { $this->cargo = $v; }

    public function getEmpresa() { return $this->empresa; }
    public function setEmpresa($v) { $this->empresa = $v; }

    public function getDescripcion_funciones() { return $this->descripcion_funciones; }
    public function setDescripcion_funciones($v) { $this->descripcion_funciones = $v; }

    public function getNro_doc_persona() { return $this->nro_doc_persona; }
    public function setNro_doc_persona($v) { $this->nro_doc_persona = $v; }

    // ----- Guardar -----
    public function guardar() {
        $db = Db::getConnect();
        $stmt = $db->prepare('INSERT INTO experiencia 
            (fecha_ini, fecha_fin, cargo, empresa, descripcion_funciones, nro_doc_persona) 
            VALUES (?, ?, ?, ?, ?, ?)');
        
        $stmt->bind_param('ssssss',
            $this->fecha_ini,
            $this->fecha_fin,
            $this->cargo,
            $this->empresa,
            $this->descripcion_funciones,
            $this->nro_doc_persona
        );

        return $stmt->execute();
    }

    // ----- Actualizar -----
    public function actualizar() {
        $db = Db::getConnect();
        $stmt = $db->prepare('UPDATE experiencia SET 
            fecha_ini = ?, fecha_fin = ?, cargo = ?, empresa = ?, descripcion_funciones = ?
            WHERE id_experiencia = ?');

        $stmt->bind_param('sssssi',
            $this->fecha_ini,
            $this->fecha_fin,
            $this->cargo,
            $this->empresa,
            $this->descripcion_funciones,
            $this->id_experiencia
        );

        return $stmt->execute();
    }

    // ----- Eliminar -----
    public static function eliminar($id_experiencia, $nro_doc_persona) {
        $db = Db::getConnect();
        $stmt = $db->prepare('DELETE FROM experiencia WHERE id_experiencia = ? AND nro_doc_persona = ?');
        $stmt->bind_param('is', $id_experiencia, $nro_doc_persona);
        return $stmt->execute();
    }

    // ----- Obtener por persona -----
    public static function obtenerPorPersona($nro_doc_persona) {
        $db = Db::getConnect();
        $stmt = $db->prepare('SELECT * FROM experiencia WHERE nro_doc_persona = ? ORDER BY fecha_ini DESC');
        $stmt->bind_param('s', $nro_doc_persona);
        $stmt->execute();
        $result = $stmt->get_result();

        $experiencias = [];
        while ($row = $result->fetch_assoc()) {
            $experiencias[] = new self($row);
        }

        return $experiencias;
    }

    public static function obtenerExperiencias() {
        $db = Db::getConnect();
        $stmt = $db->query('SELECT * FROM experiencia');
        $lista = [];
        while ($row = $stmt->fetch_assoc()) {

            $lista[] = new Experiencia($row);
        }
        return $lista;
    }

    public static function buscarPorId($id) {
        $db = Db::getConnect();
        $stmt = $db->prepare('SELECT * FROM experiencia WHERE id_experiencia = ?');
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($row = $result->fetch_assoc()) {
            return new self($row);
        }

        return null;
    }

    // AGREGAR ESTE MÉTODO AL MODELO EXPERIENCIA EXISTENTE
    public static function buscarPorUsuario($nro_doc_persona) {
        $db = Db::getConnect();
        $stmt = $db->prepare('SELECT * FROM experiencia WHERE nro_doc_persona = ? ORDER BY fecha_fin DESC');
        $stmt->bind_param("s", $nro_doc_persona);
        $stmt->execute();
        $result = $stmt->get_result();
        
        $lista = [];
        while ($row = $result->fetch_assoc()) {
            $lista[] = new Experiencia($row);
        }
        
        return $lista;
    }
}
