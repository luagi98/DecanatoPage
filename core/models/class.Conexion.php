<?php

class Conexion extends PDO
{
    private $dbname = "decanatoDB";
    //nombre servidor
    private $host = "localhost";
    //nombre usuarios base de datos
    private $user = "root";
    //password usuario
    private $pass = 'rootroot';
    //puerto postgreSql
    private $port = 1433;
    private $db;

    public function __construct()
    {
        try {
            $dsn = "sqlsrv:server=$this->host;Database=$this->dbname";
            $this->db = parent::__construct($dsn, $this->user, $this->pass);
            $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error en la conexión: " . $e->getMessage();
        }
    }

    public function close_con()
    {
        $this->db = null;
    }
}

?>
