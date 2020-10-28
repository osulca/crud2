<?php
    include_once "clases/Usuario.php";
    $usuario = new Usuario();
    $datosUsuarios = $usuario->leer();
?>
<table border="1">
    <thead>
        <tr>
            <th>#</th>
            <th>dni</th>
            <th>usuarios</th>
            <th>tipo</th>
            <th>estado</th>
            <th>&nbsp;</th>
            <th>&nbsp;</th>
        </tr>
    </thead>
    <tbody>
    <?php
        foreach ($datosUsuarios as $key => $item){
            echo "<tr>
                    <td>".($key+1)."</td>
                    <td>".$item["dni"]."</td>
                    <td>".$item["nombres"]." ".$item["apellidos"]."</td>
                    <td>".$item["tipo"]."</td>
                    <td>".$item["estado"]."</td>
                    <td><a href='actualizar.php?id=".$item["id"]."'>Actualizar</a></td>
                    <td><a href='eliminar.php?id=".$item["id"]."'>Eliminar</a></td>
                 </tr>";
        }
    ?>
    </tbody>
</table>