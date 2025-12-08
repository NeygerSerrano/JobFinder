<?php

require_once './connection.php';

class Datospersonales {
    // Atributos privados
    private $nro_documento;
    private $tipo_documento;
    private $nombres;
    private $apellidos;
    private $fecha_nacimiento;
    private $direccion_residencia;
    private $ciudad_residencia;
    private $correo_electronico;
    private $telefono;
    private $password;
    private $sexo;
    private $foto;
    // private $hab1;
    // private $hab2;
    // private $hab3;

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

    // ----- Getters -----
    public function getNro_documento() { return $this->nro_documento; }
    public function getTipo_documento() { return $this->tipo_documento; }
    public function getNombres() { return $this->nombres; }
    public function getApellidos() { return $this->apellidos; }
    public function getFecha_nacimiento() { return $this->fecha_nacimiento; }
    public function getDireccion_residencia() { return $this->direccion_residencia; }
    public function getCiudad_residencia() { return $this->ciudad_residencia; }
    public function getCorreo_electronico() { return $this->correo_electronico; }
    public function getTelefono() { return $this->telefono; }
    public function getPassword() { return $this->password; }
    public function getSexo() { return $this->sexo; }
    public function getFoto() { return $this->foto; }
    // public function getHab1() { return $this->hab1; }
    // public function getHab2() { return $this->hab2; }
    // public function getHab3() { return $this->hab3; }

    // ----- Setters -----
    public function setNro_documento($v) { $this->nro_documento = $v; }
    public function setTipo_documento($v) { $this->tipo_documento = $v; }
    public function setNombres($v) { $this->nombres = $v; }
    public function setApellidos($v) { $this->apellidos = $v; }
    public function setFecha_nacimiento($v) { $this->fecha_nacimiento = $v; }
    public function setDireccion_residencia($v) { $this->direccion_residencia = $v; }
    public function setCiudad_residencia($v) { $this->ciudad_residencia = $v; }
    public function setCorreo_electronico($v) { $this->correo_electronico = $v; }
    public function setTelefono($v) { $this->telefono = $v; }
    public function setPassword($v) { $this->password = $v; }
    public function setSexo($v) { $this->sexo = $v; }
    public function setFoto($v) { $this->foto = $v; }
    // public function setHab1($v) { $this->hab1 = $v; }
    // public function setHab2($v) { $this->hab2 = $v; }
    // public function setHab3($v) { $this->hab3 = $v; }

    // ----- Guardar -----
    public function guardar() {
        $db = Db::getConnect();
        $stmt = $db->prepare('
            INSERT INTO datos_personales (
                nro_documento, tipo_documento, nombres, apellidos, fecha_nacimiento,
                direccion_residencia, ciudad_residencia, correo_electronico, telefono,
                password, sexo, foto
            ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
        ');

        $hashed_password = password_hash($this->password, PASSWORD_DEFAULT);

        $stmt->bind_param(
            'ssssssssssss',
            $this->nro_documento,
            $this->tipo_documento,
            $this->nombres,
            $this->apellidos,
            $this->fecha_nacimiento,
            $this->direccion_residencia,
            $this->ciudad_residencia,
            $this->correo_electronico,
            $this->telefono,
            $hashed_password,
            $this->sexo,
            $this->foto,
            // $this->hab1,
            // $this->hab2,
            // $this->hab3
        );

        return $stmt->execute();
    }

    // ----- Actualizar -----
    public function actualizar() {
        $db = Db::getConnect();
        $stmt = $db->prepare('
            UPDATE datos_personales SET
                tipo_documento = ?, nombres = ?, apellidos = ?, fecha_nacimiento = ?,
                direccion_residencia = ?, ciudad_residencia = ?, correo_electronico = ?, 
                telefono = ?, password = ?, sexo = ?, foto = ?
            WHERE nro_documento = ?
        ');

        $hashed_password = password_hash($this->password, PASSWORD_DEFAULT);

        $stmt->bind_param(
            'ssssssssssss',
            $this->tipo_documento,
            $this->nombres,
            $this->apellidos,
            $this->fecha_nacimiento,
            $this->direccion_residencia,
            $this->ciudad_residencia,
            $this->correo_electronico,
            $this->telefono,
            $hashed_password,
            $this->sexo,
            $this->foto,
            // $this->hab1,
            // $this->hab2,
            // $this->hab3,
            $this->nro_documento
        );

        return $stmt->execute();
    }

    // ----- Eliminar -----
    public static function eliminar($nro_documento) {
        $db = Db::getConnect();
        $stmt = $db->prepare('DELETE FROM datos_personales WHERE nro_documento = ?');
        $stmt->bind_param('s', $nro_documento);
        return $stmt->execute();
    }

    // ----- Buscar por documento -----
    public static function buscarPorDocumento($nro_documento) {
        $db = Db::getConnect();
        $stmt = $db->prepare('SELECT * FROM datos_personales WHERE nro_documento = ?');
        $stmt->bind_param('s', $nro_documento);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($row = $result->fetch_assoc()) {
            return new self($row);
        }

        return null;
    }

    // ----- Buscar todos ------
    public static function buscarTodos(){
        $db = Db::getConnect();
        $stmt = $db->query('SELECT * FROM datos_personales');
        $lista = [];
        while ($row = $stmt->fetch_assoc()) {

            $lista[] = new Datospersonales($row);
        }
        return $lista;
    }
}
