<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../public/css/login.css">
    <script src="../public/mostrarContrasena.js"></script>
    <script src="../public/validacionRegistro.js"></script>
    <title>Registro</title>
</head>

<body>
    <main>
        <div class="titulo">
            <h1>Registrate</h1>
            <h3 id="frase">Para poder usar el sistema es necesaria una cuenta</h3>
        </div>
        <div class="fuera">
            <h2>Login</h2>
            <form action="../control/registro.php" method="post" id="formulario">
                <div class="input-container">
                    <input type="text" id="username" name="username" placeholder="Username" required>
                    <p id="nombreError"></p>
                </div>
                <input type="email" id="email" name="email" placeholder="Email" required>
                <p id="emailError"></p>
                <br>
                <div class="input-container divContrasena">
                    <input type="password" id="password" name="password" placeholder="Password" required>
                    <i class="bx bx-show-alt" name="mostrarContrasena" id="mostrarContrasena"></i>
                    <p id="passwdError"></p>
                </div>
                <button type="submit" name="enviar" id="enviar">Registrase</button>
            </form>
        </div>
    </main>
</body>

</html>