<?php
if (!empty($_POST["btnregistrar"])){
    if(!empty($_POST["Nombre"]) and  !empty($_POST["fecha"]) and !empty($_POST["Pedido"]) and !empty($_POST["total"]) and !empty($_POST["Transferencia"])){
        
        $Nombre=$_POST["Nombre"];
        $fecha=$_POST["fecha"];
        $Pedido=$_POST["Pedido"];
        $total=$_POST["total"];
        $Transferencia=$_POST["Transferencia"];

        $sql=$conexion->query("insert into clientes (cliente, fecha, pedido, total, forma_pago) VALUES ('$Nombre', '$fecha', '$Pedido', $total, '$Transferencia')");
    if($sql==1){
echo '<div class="alert alert-success">Cliente Registrado Correctamente</div>';
    } else {
        echo '<div class="alert alert-danger">Error</div>';
    }

    } else {
        echo '<div class="alert alert-warning">Campos Incompleto</div>';
    }
}
?>