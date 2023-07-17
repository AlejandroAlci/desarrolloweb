<?php

if(!empty($_POST["btnregistrar"])){
if(!empty($_POST["Nombre"]) and !empty($_POST["fecha"]) and !empty($_POST["Pedido"]) and !empty($_POST["total"]) and !empty($_POST["transferencia"])){
    $id=$_POST["id"];
    $Nombre=$_POST["Nombre"];
    $fecha=$_POST["fecha"];
    $Pedido=$_POST["Pedido"];
    $total=$_POST["total"];
    $Transferencia=$_POST["Transferencia"];
    $sql=$conexion->query(" update clientes set cliente='$Nombre', fecha='$fecha', pedido ='$Pedido', total=$total, forma_pago='$Transferencia' where id= $id");
    if($sql==1) {
        header("location:index.php");
            } else {
                echo "<div class='alert alert-danger'>Error al modificar</div>";
            }
} else {
    echo "<div class='alert alert-warning'>Campos vacios</div>";
}
}
?>