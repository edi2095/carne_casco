
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
    <link rel="stylesheet" href="estilo.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

</head>
<body background="img/unacarnitaasada.jpg">
    <header>

        <input type="checkbox" name="" id="toggler">
        <label for="toggler" class="fas fa-bars"></label>

        <a href="Principal.html" class="logo"><img src="img/pixelcut-export.png" width="250px" height="60px"><span>.</span></a>

        <nav class="navbar">
            <a href="Principal.html">Inicio</a>
            <a href="resCerdo.html">Productos</a>
            <a href="duplica.html">Al Vacio</a>
            <a href="conatctanos.html">Contacto</a>
        </nav>
        <div class="icons">
            <a href="resCerdo.html" class="fas fa-shopping-cart"></a>
            <a href="ingreso.html" class="fas fa-user"></a>

        </div>
    </header>
   
    <form action="sesion.php" method="post" class="formBox">
        <br><h1>Tiempo restante</h1> <br><br>    
        <p id="temporizador"></p>
        
        <input type="email" id="mail" name="mail" placeholder="E-Mail" required>
        <input type="password" name="contra" placeholder="Contraseña" required>
       
  
        <button type="submit">Ingresar</button>
    </form>

    <div id="temporizador-wrapper">
    
    </div>
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
                window.location.href="duplica.html";
            }
        }, 1000);
    </script>
</body>
</html>