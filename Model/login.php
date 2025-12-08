<?php
require_once './Model/datospersonales.php';
require_once './Model/empresa.php';

class Login {

    public static function autenticarUsuario($nro_documento, $password) {
        $usuario = Datospersonales::buscarPorDocumento($nro_documento);

        if ($usuario && password_verify($password, $usuario->getPassword())) {
            return $usuario;
        }
        return null;
    }

    public static function autenticarEmpresa($nit_empresa, $password_empresa) {
        $empresa = Empresa::buscarPorNit($nit_empresa);

        if ($empresa && password_verify($password_empresa, $empresa->getPassword_empresa())) {
            return $empresa;
        }
        return null;
    }
}
?>