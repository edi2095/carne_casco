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
    <link rel="stylesheet" href="registro.css">
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
    <div class="container">
        <div class="content">
          <h1>Bienvenido</h1>
          <a href="ingreso.html"><button >Registrarse</button></a>
          <a href="sesin.php"><button>Iniciar Sesión</button></a>
        </div>
      </div>
        
    </body>
    </html>