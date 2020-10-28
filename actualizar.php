<?php
if(!empty($_GET)) {
    $id = $_GET["id"];

    include_once "clases/Usuario.php";
    $usuario = new Usuario();
    $usuario->setId($id);
    $datosUsuario = $usuario->leerPorId();

    foreach ($datosUsuario as $item) {
        $dni = $item["dni"];
        $nombres = $item["nombres"];
        $apellidos = $item["apellidos"];
        $tipo = $item["tipo"];
    }
}
?>
<form method="post" action="<?= $_SERVER["PHP_SELF"] ?>">
    <input type="number" name="dni" placeholder="DNI"
        <?php
            if(isset($dni)){
                echo "value = '$dni'";
            }
        ?>
    ><br>
    <input type="text" name="nombres" placeholder="nombres"
        <?php
        if(isset($nombres)){
            echo "value = '$nombres'";
        }
        ?>
    ><br>
    <input type="text" name="apellidos" placeholder="apellidos"
        <?php
        if(isset($apellidos)){
            echo "value = '$apellidos'";
        }
        ?>
    ><br>
    <select name="tipo">
        <option value="admin"
            <?php
                if($tipo == "admin") {
                    echo "selected";
                }
            ?>
        >Administrador</option>
        <option value="empleado"
            <?php
                if($tipo == "empleado") {
                    echo "selected";
                }
            ?>
        >Empleado</option>
    </select><br>
    <input type="hidden" name="id" value="<?=$id?>">
    <input type="submit" name="submit" value="Actualizar">
</form>
<?php
if (!empty($_POST)) {
    $id = $_POST["id"];
    $dni = $_POST["dni"];
    $nombres = $_POST["nombres"];
    $apellidos = $_POST["apellidos"];
    $tipo = $_POST["tipo"];

    include_once "clases/Usuario.php";
    $usuario = new Usuario();
    $usuario->setId($id);
    $usuario->setDni($dni);
    $usuario->setNombres($nombres);
    $usuario->setApellidos($apellidos);
    $usuario->setTipo($tipo);
    $filas = $usuario->actualizar();

    if ($filas != 0) {
        header("location: index.php");
    } else {
        echo "No se ha guaractualizadodado";
    }
}