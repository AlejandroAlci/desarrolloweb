<?php
if (!empty($_GET["id"])){
    $id=$_GET["id"];
    $sql=$conexion->query("delete from clientes where id = $id ");
    if($sql==1){
echo '<div>Cliente Eliminada Correctamente</div>';
    } else {
        echo '<div>Error al eliminar</div>';
    }
}
?>