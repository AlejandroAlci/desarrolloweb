<!doctype html>
<html lang="es">
<head>
    <title>Inicio Sesión</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login/login.php");
    exit();
}

include "modelo/conexion.php";
include "controlador/eliminar_persona.php";
include "controlador/registro_persona.php";
?>
	<div class="container-fluid row"> 
	<form calss="col-4 p-3" method="POST">
		<h3 class="text-center text-secondary">Registro de Clientes</h3> 

 <div class="mb-1">
    <label for="exampleInputEmail1" class="form-label">Nombre del Cliente</label>
    <input type="text" class="form-control" name="Nombre">
  </div>
  <div class="mb-1">
    <label for="exampleInputEmail1" class="form-label">Fecha</label>
    <input type="date" class="form-control" name="fecha">
  </div>
  <div class="mb-1">
    <label for="exampleInputEmail1" class="form-label">Pedido del cliente</label>
    <input type="text" class="form-control" name="Pedido">
  </div>
  <div class="mb-1">
    <label for="exampleInputEmail1" class="form-label">Total</label>
    <input type="text" class="form-control" name="total">
  </div>
  <div class="mb-1">
    <label for="exampleInputEmail1" class="form-label">Tipo de transferencia</label>
    <input type="text" class="form-control" name="Transferencia">
  </div>
  <button type="submit" class="btn btn-primary" name="btnregistrar" value="okey">Registrar</button>
</form>
<div calss="col-8 p-4 mx-auto">
<table class="table">
  <thead class="bg-info">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nombre del cliente</th>
      <th scope="col">Fecha</th>
      <th scope="col">Pedido</th>
	  <th scope="col">Total</th>
	  <th scope="col">Forma de pago</th>
	  <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
	<?php
	
			include "modelo/conexion.php";
			$sql=$conexion->query("select * from clientes");
			while ($datos=$sql->fetch_object()){?>
<tr>
      <td><?=$datos->id ?></td>
      <td><?=$datos->cliente ?></td>
	   <td><?=$datos->fecha ?></td>
      <td><?=$datos->pedido ?></td>
      <td><?=$datos->total ?></td>
	   <td><?=$datos->forma_pago ?></td>
      <td>
		<a href="modificar_cliente.php?id= <?=$datos->id ?>">Editar</a>
		<a href="index.php?id= <?=$datos->id ?>">Eliminar</a>
	  </td>
    </tr>

<?php	}	

	?>

    
  </tbody>
</table>
</div>

	</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>
