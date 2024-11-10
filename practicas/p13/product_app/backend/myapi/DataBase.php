<?php
namespace TECWEB\MYAPI;

abstract class DataBase {
    protected $conexion;
    protected $response;

    public function __construct($db, $user, $pass) {
        $this->conexion = @mysqli_connect(
            'localhost',
            $user,
            $pass,
            $db
        );
    
        /**
         * NOTA: si la conexión falló $conexion contendrá false
         **/
        if(!$this->conexion) {
            die('¡Base de datos NO conectada!');
        }
        $this->response = [];
    }

    public function getData() {
        return json_encode($this->response);
    }
}
?>
