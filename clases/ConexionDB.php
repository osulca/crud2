<?php

class ConexionDB {
    private $dsn = "mysql:host=localhost;dbname=prueba";
    private $user = "root";
    private $password = "";
    private $option = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'");
    public $conn = null;

    public function abrirConexion(){
        try{
            $this->conn = new PDO($this->dsn, $this->user, $this->password, $this->option);
            return $this->conn;
        } catch(PDOException $e) {
            echo $e->getMessage()+"tu conexion no sirve";
        }
    }
    
    public function cerrarConexion(){
        return $this->conn = null;
    }
    
}