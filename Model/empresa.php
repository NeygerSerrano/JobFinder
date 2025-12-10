<?php
require_once './connection.php';

class Empresa {

    private $nit_empresa;
    private $nombre_empresa;
    private $logo_foto;
    private $nombre_delegado;
    private $cargo_delegado;
    private $correo_empresa;
    private $password_empresa;
    private $telefono_empresa;
    private $pagweb_empresa;

    public function __construct($data = []) {
        foreach ($data as $key => $value) {
            $setter = 'set' . ucfirst($key);  // Ejemplo: setNit_empresa
            if (method_exists($this, $setter)) {
                $this->$setter($value);
            }
        }
    }

    // Getters y Setters
    public function getNit_empresa() { return $this->nit_empresa; }
    public function setNit_empresa($nit_empresa) { $this->nit_empresa = $nit_empresa; }

    public function getNombre_empresa() { return $this->nombre_empresa; }
    public function setNombre_empresa($nombre_empresa) { $this->nombre_empresa = $nombre_empresa; }

    public function getLogo_foto() { return $this->logo_foto; }
    public function setLogo_foto($logo_foto) { $this->logo_foto = $logo_foto; }

    public function getNombre_delegado() { return $this->nombre_delegado; }
    public function setNombre_delegado($nombre_delegado) { $this->nombre_delegado = $nombre_delegado; }

    public function getCargo_delegado() { return $this->cargo_delegado; }
    public function setCargo_delegado($cargo_delegado) { $this->cargo_delegado = $cargo_delegado; }

    public function getCorreo_empresa() { return $this->correo_empresa; }
    public function setCorreo_empresa($correo_empresa) { $this->correo_empresa = $correo_empresa; }

    public function getPassword_empresa() { return $this->password_empresa; }
    public function setPassword_empresa($password_empresa) { $this->password_empresa = $password_empresa; }

    public function getTelefono_empresa() { return $this->telefono_empresa; }
    public function setTelefono_empresa($telefono_empresa) { $this->telefono_empresa = $telefono_empresa; }

    public function getPagweb_empresa() { return $this->pagweb_empresa; }
    public function setPagweb_empresa($pagweb_empresa) { $this->pagweb_empresa = $pagweb_empresa; }

    // Métodos CRUD
    public function guardar() {
        $db = Db::getConnect();
        $insert = $db->prepare("
            INSERT INTO empresa 
            (nit_empresa, nombre_empresa, logo_foto, nombre_delegado, cargo_delegado, correo_empresa, password_empresa, telefono_empresa, pagweb_empresa) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)
        ");
        $password_hashed = password_hash($this->getPassword_empresa(), PASSWORD_DEFAULT);
        $insert->bind_param(
            "sssssssss",
            $this->nit_empresa,
            $this->nombre_empresa,
            $this->logo_foto,
            $this->nombre_delegado,
            $this->cargo_delegado,
            $this->correo_empresa,
            $password_hashed,
            $this->telefono_empresa,
            $this->pagweb_empresa
        );
        $insert->execute();
        $insert->close();
    }

    public function actualizar() {
        $db = Db::getConnect();
        $update = $db->prepare("
            UPDATE empresa SET 
            nombre_empresa = ?, 
            logo_foto = ?, 
            nombre_delegado = ?, 
            cargo_delegado = ?, 
            correo_empresa = ?, 
            password_empresa = ?, 
            telefono_empresa = ?, 
            pagweb_empresa = ?
            WHERE nit_empresa = ?
        ");
        // Solo hashear la contraseña si no está ya hasheada (nueva contraseña)
        $password_to_save = $this->getPassword_empresa();
        if (!empty($this->getPassword_empresa()) && !password_get_info($this->getPassword_empresa())['algo']) {
            $password_to_save = password_hash($this->getPassword_empresa(), PASSWORD_DEFAULT);
        }

        $update->bind_param(
            "sssssssss",
            $this->nombre_empresa,
            $this->logo_foto,
            $this->nombre_delegado,
            $this->cargo_delegado,
            $this->correo_empresa,
            $password_to_save,
            $this->telefono_empresa,
            $this->pagweb_empresa,
            $this->nit_empresa
        );
        $update->execute();
        $update->close();
    }

    public static function eliminar($nit_empresa) {
        $db = Db::getConnect();
        $delete = $db->prepare("DELETE FROM empresa WHERE nit_empresa = ?");
        $delete->bind_param("s", $nit_empresa);
        $delete->execute();
        $delete->close();
    }

    public static function buscarPorNit($nit_empresa) {
        $db = Db::getConnect();
        $select = $db->prepare("SELECT * FROM empresa WHERE nit_empresa = ?");
        $select->bind_param("s", $nit_empresa);
        $select->execute();
        $result = $select->get_result();
        if ($row = $result->fetch_assoc()) {
            return new Empresa($row);
        }
        return null;
    }

    public static function obtenerTodas() {
        $db = Db::getConnect();
        $result = $db->query("SELECT * FROM empresa");
        $lista = [];
        while ($row = $result->fetch_assoc()) {

            $lista[] = new Empresa($row);
        }
        return $lista;
    }
}
