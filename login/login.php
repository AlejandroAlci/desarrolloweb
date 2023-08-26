<!doctype html>
<html lang="es">
<head>
    <title>Iniciar Sesión</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Verificar las credenciales aquí utilizando tu lógica de autenticación
    // Por ejemplo:
    if ($username === "alejo" && $password === "1234") {
        $_SESSION['username'] = $username;
        header("Location: ../index.php");
        exit();
    } else {
        $error_message = 'Credenciales incorrectas. Intente de nuevo.';
    }
}
?>

<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-4">
            <h3 class="text-center text-secondary">Inicio de Sesión</h3>
            <?php if (isset($error_message)) { ?>
                <p class="text-danger"><?php echo $error_message; ?></p>
            <?php } ?>
            <form method="POST">
                <div class="mb-3">
                    <label for="username" class="form-label">Usuario</label>
                    <input type="text" class="form-control" name="username" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" name="password" required>
                </div>
                <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>
