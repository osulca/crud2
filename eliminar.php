<?php
$id = $_GET["id"];

include_once "clases/Usuario.php";
$usuario = new Usuario();
$usuario->setId($id);
$filas = $usuario->eliminar();

if ($filas != 0) {
    header("location: index.php");
} else {
    echo "No se ha eliminado";
}
