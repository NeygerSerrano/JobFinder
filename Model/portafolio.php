<?php
require_once './connection.php';

class Portafolio
{
    private $id_proyecto;
    private $nombre_proyecto;
    private $fecha;
    private $descripcion_proyecto;
    private $foto_proyecto;
    private $link_proyecto;
    private $nro_doc_persona;

    // Constructor dinámico con setters tipo setId_proyecto
    public function __construct($data = [])
    {
        foreach ($data as $key => $value) {
            $setter = 'set' . ucfirst($key); 
            if (method_exists($this, $setter)) {
                $this->$setter($value);
            }
        }
    }

    // Getters y setters
    public function getId_proyecto() { return $this->id_proyecto; }
    public function setId_proyecto($id_proyecto) { $this->id_proyecto = $id_proyecto; }

    public function getNombre_proyecto() { return $this->nombre_proyecto; }
    public function setNombre_proyecto($nombre_proyecto) { $this->nombre_proyecto = $nombre_proyecto; }

    public function getFecha() { return $this->fecha; }
    public function setFecha($fecha) { $this->fecha = $fecha; }

    public function getDescripcion_proyecto() { return $this->descripcion_proyecto; }
    public function setDescripcion_proyecto($descripcion_proyecto) { $this->descripcion_proyecto = $descripcion_proyecto; }

    public function getLink_proyecto() { return $this->link_proyecto; }
    public function setLink_proyecto($link_proyecto) { $this->link_proyecto = $link_proyecto; }

    public function getFoto_proyecto() { return $this->foto_proyecto; }
    public function setFoto_proyecto($foto_proyecto) { $this->foto_proyecto = $foto_proyecto; }

    public function getNro_doc_persona() { return $this->nro_doc_persona; }
    public function setNro_doc_persona($nro_doc_persona) { $this->nro_doc_persona = $nro_doc_persona; }

    // ---------- CRUD ---------- //

    // Guardar
    public function guardar()
    {
        $db = Db::getConnect();
        $stmt = $db->prepare("INSERT INTO portafolio 
            (nombre_proyecto, fecha, descripcion_proyecto, foto_proyecto, link_proyecto, nro_doc_persona) 
            VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param(
            "ssssss",
            $this->nombre_proyecto,
            $this->fecha,
            $this->descripcion_proyecto,
            $this->foto_proyecto,
            $this->link_proyecto,
            $this->nro_doc_persona
        );
        return $stmt->execute();
    }

    // Actualizar
    public function actualizar()
    {
        $db = Db::getConnect();
        $stmt = $db->prepare("UPDATE portafolio 
            SET nombre_proyecto = ?, fecha = ?, descripcion_proyecto = ?, foto_proyecto = ?, link_proyecto = ?, nro_doc_persona = ? 
            WHERE id_proyecto = ?");
        $stmt->bind_param(
            "ssssssi",
            $this->nombre_proyecto,
            $this->fecha,
            $this->descripcion_proyecto,
            $this->foto_proyecto,
            $this->link_proyecto,
            $this->nro_doc_persona,
            $this->id_proyecto
        );
        return $stmt->execute();
    }

    // Eliminar
    public static function eliminar($id_proyecto, $nro_doc_persona)
    {
        $db = Db::getConnect();
        $stmt = $db->prepare("DELETE FROM portafolio WHERE id_proyecto = ? AND nro_doc_persona = ?");
        $stmt->bind_param("is", $id_proyecto, $nro_doc_persona);
        return $stmt->execute();
    }

    // Buscar por ID
    public static function buscarPorId($id_proyecto)
    {
        $db = Db::getConnect();
        $stmt = $db->prepare("SELECT * FROM portafolio WHERE id_proyecto = ?");
        $stmt->bind_param("i", $id_proyecto);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        return $row ? new Portafolio($row) : null;
    }

    // Listar todos
    public static function buscarTodos()
    {
        $db = Db::getConnect();
        $result = $db->query("SELECT * FROM portafolio");
        $lista = [];
        while ($row = $result->fetch_assoc()) {
            $lista[] = new Portafolio($row);
        }
        return $lista;
    }

    // AGREGAR ESTE MÉTODO AL MODELO PORTAFOLIO EXISTENTE
    public static function buscarPorUsuario($nro_doc_persona) {
        $db = Db::getConnect();
        $stmt = $db->prepare('SELECT * FROM portafolio WHERE nro_doc_persona = ? ORDER BY fecha DESC');
        $stmt->bind_param("s", $nro_doc_persona);
        $stmt->execute();
        $result = $stmt->get_result();
        
        $lista = [];
        while ($row = $result->fetch_assoc()) {
            $lista[] = new Portafolio($row);
        }
        
        return $lista;
    }
}
