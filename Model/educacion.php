<?php
require_once './connection.php';

class Educacion {

    private $id_estudio;
    private $fecha_ini;
    private $fecha_fin;
    private $titulo_estudio;
    private $entidad;
    private $descripcion;
    private $nro_doc_persona;

    public function __construct($data = []) {
        foreach ($data as $key => $value) {
            $setter = 'set' . ucfirst($key);
            if (method_exists($this, $setter)) {
                $this->$setter($value);
            }
        }
    }

    // Getters y setters
    public function getId_estudio() { return $this->id_estudio; }
    public function setId_estudio($id_estudio) { $this->id_estudio = $id_estudio; }

    public function getFecha_ini() { return $this->fecha_ini; }
    public function setFecha_ini($fecha_ini) { $this->fecha_ini = $fecha_ini; }

    public function getFecha_fin() { return $this->fecha_fin; }
    public function setFecha_fin($fecha_fin) { $this->fecha_fin = $fecha_fin; }

    public function getTitulo_estudio() { return $this->titulo_estudio; }
    public function setTitulo_estudio($titulo_estudio) { $this->titulo_estudio = $titulo_estudio; }

    public function getEntidad() { return $this->entidad; }
    public function setEntidad($entidad) { $this->entidad = $entidad; }

    public function getDescripcion() { return $this->descripcion; }
    public function setDescripcion($descripcion) { $this->descripcion = $descripcion; }

    public function getNro_doc_persona() { return $this->nro_doc_persona; }
    public function setNro_doc_persona($nro_doc_persona) { $this->nro_doc_persona = $nro_doc_persona; }

    // Guardar nuevo registro
    public function guardar()
    {
        $db = Db::getConnect();
        $stmt = $db->prepare('
            INSERT INTO educacion (fecha_ini, fecha_fin, titulo_estudio, entidad, descripcion, nro_doc_persona)
            VALUES (?, ?, ?, ?, ?, ?)
        ');

        $stmt->bind_param(
            "ssssss",
            $this->fecha_ini,
            $this->fecha_fin,
            $this->titulo_estudio,
            $this->entidad,
            $this->descripcion,
            $this->nro_doc_persona
        );

        $stmt->execute();
        $stmt->close();
    }

    // Actualizar existente
    public function actualizar()
    {
        $db = Db::getConnect();
        $stmt = $db->prepare('
            UPDATE educacion
            SET fecha_ini = ?, 
                fecha_fin = ?,
                titulo_estudio = ?, 
                entidad = ?, 
                descripcion = ?,
                nro_doc_persona = ?
            WHERE id_estudio = ?
        ');

        $stmt->bind_param(
            "ssssssi",  
            $this->fecha_ini,
            $this->fecha_fin,
            $this->titulo_estudio,
            $this->entidad,
            $this->descripcion,
            $this->nro_doc_persona,  
            $this->id_estudio
        );

        $stmt->execute();
        $stmt->close();
    }

    // Eliminar
    public static function eliminar($id_estudio, $nro_doc_persona)
    {
        $db = Db::getConnect();
        $stmt = $db->prepare('DELETE FROM educacion WHERE id_estudio = ? AND nro_doc_persona = ?');
        $stmt->bind_param("is", $id_estudio, $nro_doc_persona);
        $stmt->execute();
        $stmt->close();
    }

    // Obtener todos (sin filtro)
    public static function buscarEducaciones()
    {
        $db = Db::getConnect();
        $stmt = $db->query('SELECT * FROM educacion ORDER BY fecha_ini DESC');
        $lista = [];
        while ($row = $stmt->fetch_assoc()) {
            $lista[] = new Educacion($row);
        }
        return $lista;
    }

    // NUEVO: Buscar educaciones de un usuario específico
    public static function buscarPorUsuario($nro_doc_persona)
    {
        $db = Db::getConnect();
        $stmt = $db->prepare('SELECT * FROM educacion WHERE nro_doc_persona = ? ORDER BY fecha_ini DESC');
        $stmt->bind_param("s", $nro_doc_persona);
        $stmt->execute();
        $result = $stmt->get_result();
        
        $lista = [];
        while ($row = $result->fetch_assoc()) {
            $lista[] = new Educacion($row);
        }
        
        $stmt->close();
        return $lista;
    }

    // Buscar una educación específica
    public static function buscarEducacion($id_estudio)
    {
        $db = Db::getConnect();
        $stmt = $db->prepare('SELECT * FROM educacion WHERE id_estudio = ?');
        $stmt->bind_param("i", $id_estudio);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($row = $result->fetch_assoc()) {
            $stmt->close();
            return new Educacion($row);
        }

        $stmt->close();
        return null;
    }
}