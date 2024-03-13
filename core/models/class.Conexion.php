<?php

class Conexion extends PDO{
    private $dbname = "decanatoDB";
    //nombre servidor
    private $host = "localhost";
    //nombre usuarios base de datos
    private $user = "root";
    //password usuario
    private $pass = 'n0m3l0';
    //puerto postgreSql
    private $port = '4000';
    private $db;

    public function __construct() {
        try {
            $this->db = parent::__construct("mysql:host=$this->host;dbname=$this->dbname;charset=utf8",$this->user,$this->pass);
        } catch(PDOException $e) {
            echo  $e->getMessage();
        }
    }

    public function close_con(){
       $this->db = null;
    }

}

?>
