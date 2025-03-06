<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="./public/css/login.css">
    <script src="./public/mostrarContrasena.js"></script>
    <title>Inicio sesión</title>
</head>

<body>
    <main>
        <div class="titulo">
            <h1>Sistema de Gestión de tareas</h1>
            <h3 id="frase">Este sistema te permite crear tareas y modificarlas</h3>
        </div>
        <div class="fuera">
            <h2 class="tituloForm">Inicio de sesión</h2>
            <form action="./control/sesionIniciada.php" method="post">
                <div class="input-container">
                    <input type="text" id="username" name="username" placeholder="Username" required>
                </div>
                <?php
                if (isset($_SESSION["msgUser"])) {
                    echo '<div class="error-message">' . $_SESSION["msgUser"] . '</div>';
                    unset($_SESSION["msgUser"]);
                }
                ?>
                <div class="input-container divContrasena">
                    <input type="password" id="password" name="password" placeholder="Password" required>
                    <i class="bx bx-show-alt" name="mostrarContrasena" id="mostrarContrasena"></i>
                </div>
                <?php
                if (isset($_SESSION["msgPasswd"])) {
                    echo '<div class="error-message">' . $_SESSION["msgPasswd"] . '</div>';
                    unset($_SESSION["msgPasswd"]);
                }
                ?>
                <button type="submit" name="enviar" id="enviar">Iniciar sesión</button>
            </form>
            <div class="linea-container">
                <div class="linea"></div>
                <span class="o">o</span>
                <div class="linea"></div>
            </div>
            <div>
                <a href="./view/form_registro.php" id="crearCuenta">¿Aún no tienes cuenta? Crea una cuenta</a>
            </div>
        </div>
    </main>
</body>

</html>