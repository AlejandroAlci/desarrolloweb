<?php
include "modelo/conexion.php";
$id=$_GET["id"];
$sql=$conexion->query("select * from clientes where id=$id ");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
<form calss="col-4 p-3 m-auto" method="POST">
		<h5 class="text-center text-secondary">Editar Cliente</h5> 
        <input type="hidden" name="id" value="<?= $_GET["id"] ?>">
    <?php
    include "controlador/modifi_cliente.php";
    while($datos=$sql->fetch_object()){?>
 <div class="mb-1">
    <label for="exampleInputEmail1" class="form-label">Nombre del Cliente</label>
    <input type="text" class="form-control" name="Nombre" value="<?= $datos->cliente?>">
  </div>
  <div class="mb-1">
    <label for="exampleInputEmail1" class="form-label">Fecha</label>
    <input type="date" class="form-control" name="fecha" value="<?= $datos->fecha?>">
  </div>
  <div class="mb-1">
    <label for="exampleInputEmail1" class="form-label">Pedido del cliente</label>
    <input type="text" class="form-control" name="Pedido" value="<?= $datos->pedido?>">
  </div>
  <div class="mb-1">
    <label for="exampleInputEmail1" class="form-label">Total</label>
    <input type="text" class="form-control" name="total" value="<?= $datos->total?>">
  </div>
  <div class="mb-1">
    <label for="exampleInputEmail1" class="form-label">Tipo de transferencia</label>
    <input type="text" class="form-control" name="Transferencia" value="<?= $datos->forma_pago?>">
  </div>
    <?php }
    ?>
 
  <button type="submit" class="btn btn-primary" name="btnregistrar" value="okey">Modificar Cliente</button>
</form>
</body>
</html>