<form method="post" action="<?= $_SERVER["PHP_SELF"] ?>">
    <input type="number" name="dni" placeholder="DNI"><br>
    <input type="text" name="nombres" placeholder="nombres"><br>
    <input type="text" name="apellidos" placeholder="apellidos"><br>
    <select name="tipo">
        <option value="admin">Administrador</option>
        <option value="empleado">Empleado</option>
    </select><br>
    <input type="submit" name="submit" value="Guardar">
</form>
<?php
if (!empty($_POST)) {
    $dni = $_POST["dni"];
    $nombres = $_POST["nombres"];
    $apellidos = $_POST["apellidos"];
    $tipo = $_POST["tipo"];

    include_once "clases/Usuario.php";
    $usuario = new Usuario();

    $password = "123456";
    $password = password_hash($password, PASSWORD_BCRYPT);

    $usuario->setDni($dni);
    $usuario->setPassword($password);
    $usuario->setNombres($nombres);
    $usuario->setApellidos($apellidos);
    $usuario->setTipo($tipo);
    $usuario->setEstado("habilitado");
    $filas = $usuario->crear();

    if ($filas != 0) {
        echo "Se ha guardado";
    } else {
        echo "No se ha guardado";
    }
}

