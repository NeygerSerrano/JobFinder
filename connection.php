<?php

class Db {

    private static $instance = NULL;

    private function __construct()
    {

    }

    public static function getConnect() {
        if (!isset(self::$instance)) {
            $host = 'localhost';
            $user = 'root';
            $pass = '';
            $dbname = 'hv3';

            self::$instance = new mysqli($host, $user, $pass, $dbname);

            if (self::$instance->connect_error) {
                die('Error de conexión (' . self::$instance->connect_errno . ') '
                    . self::$instance->connect_error);
            }

            // Opcional: establecer el charset a utf8
            self::$instance->set_charset('utf8');
        }
        return self::$instance;
    }

}