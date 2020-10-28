<?php

include_once "clases/ConexionDB.php";
class Usuario
{
    private $id;
    private $dni;
    private $password;
    private $nombres;
    private $apellidos;
    private $tipo;
    private $estado;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id): void
    {
        $this->id = $id;
    }

    public function getDni()
    {
        return $this->dni;
    }

    public function setDni($dni): void
    {
        $this->dni = $dni;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password): void
    {
        $this->password = $password;
    }

    public function getNombres()
    {
        return $this->nombres;
    }

    public function setNombres($nombres): void
    {
        $this->nombres = $nombres;
    }

    public function getApellidos()
    {
        return $this->apellidos;
    }

    public function setApellidos($apellidos): void
    {
        $this->apellidos = $apellidos;
    }

    public function getTipo()
    {
        return $this->tipo;
    }

    public function setTipo($tipo): void
    {
        $this->tipo = $tipo;
    }

    public function getEstado()
    {
        return $this->estado;
    }

    public function setEstado($estado): void
    {
        $this->estado = $estado;
    }

    public function crear()
    {
        try{
            $db = new ConexionDB();
            $conn = $db->abrirConexion();

            $sql = "INSERT INTO usuarios(dni, password, nombres, apellidos, tipo, estado) 
                    VALUES($this->dni, '$this->password', '$this->nombres', '$this->apellidos', '$this->tipo', '$this->estado')";
            $resultado = $conn->prepare($sql);
            $resultado->execute();

            $db->cerrarConexion();

            return $resultado->rowCount();
        }catch (Exception $e){
            echo $e->getMessage();
        }
    }

    public function leer()
    {
        try{
            $db = new ConexionDB();
            $conn = $db->abrirConexion();

            $sql = "SELECT * FROM usuarios";
            $resultado = $conn->prepare($sql);
            $resultado->execute();
            $data = $resultado->fetchAll();

            $db->cerrarConexion();

            return $data;
        }catch (Exception $e){
            echo $e->getMessage();
        }
    }

    public function leerPorId()
    {
        try{
            $db = new ConexionDB();
            $conn = $db->abrirConexion();

            $sql = "SELECT * FROM usuarios WHERE id=$this->id";
            $resultado = $conn->prepare($sql);
            $resultado->execute();
            $data = $resultado->fetchAll();

            $db->cerrarConexion();

            return $data;
        }catch (Exception $e){
            echo $e->getMessage();
        }
    }

    public function actualizar()
    {
        try{
            $db = new ConexionDB();
            $conn = $db->abrirConexion();

            $sql = "UPDATE usuarios
                    SET dni = $this->dni, nombres = '$this->nombres', apellidos = '$this->apellidos', tipo = '$this->tipo'
                    WHERE id = $this->id";
            $resultado = $conn->prepare($sql);
            $resultado->execute();

            $db->cerrarConexion();

            return $resultado->rowCount();
        }catch (Exception $e){
            echo $e->getMessage();
        }
    }

    public function eliminar()
    {
        try{
            $db = new ConexionDB();
            $conn = $db->abrirConexion();

            $sql = "DELETE FROM usuarios WHERE id = $this->id";
            $resultado = $conn->prepare($sql);
            $resultado->execute();

            $db->cerrarConexion();

            return $resultado->rowCount();
        }catch (Exception $e){
            echo $e->getMessage();
        }
    }
}