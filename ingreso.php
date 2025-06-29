<?php
session_start();

if (isset($_SESSION['xd_id'])) {
    // Si la sesión no existe, redirigir a la página de inicio de sesión
    header("Location: xd.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuario</title>
    <link rel="stylesheet" href="ingreso.css">
</head>
<body background="img/unacarnitaasada.jpg">
    <div id="temporizador-wrapper">
        <h1>Tiempo restante</h1> <br><br>    
        <p id="temporizador"></p>
    </div>
    <form action="whoAreU.php" method="post" class="formBox">
        <a href="Principal.html" class="titulo" ><img src="img/pixelcut-export.png" width="250px" height="60px"></a>
        <input type="text" name="nombre" placeholder="Nombre de usuario" required>
        <input type="email" id="email" name="email" placeholder="E-Mail" required>
        <input type="password" name="pASS" placeholder="Contraseña" required>
        <input type="number" name="edad" placeholder="Edad" required>
        <input type="text" name="ubi" placeholder="Ubicación" required>
        <button type="submit">Ingresar</button>
    </form>
    <script>
        var ahora = new Date().getTime();
        var tiempoFinal = ahora + (5 * 60 * 1000);
        var x = setInterval(function() {
            var ahora = new Date().getTime();
            var tiempoRestante = tiempoFinal - ahora;
            var minutos = Math.floor((tiempoRestante % (1000 * 60 * 60)) / (1000 * 60));
            var segundos = Math.floor((tiempoRestante % (1000 * 60)) / 1000);
            document.getElementById("temporizador").innerHTML = minutos + "m " + segundos + "s ";
            if (tiempoRestante < 0) {
                clearInterval(x);
                window.alert("¡Tiempo terminado!");
                window.close();
                window.location.href="principal.php";
            }
        }, 1000);
    </script>
</body>
</html>