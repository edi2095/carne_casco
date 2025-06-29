<?php
session_start();
if (isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in']) {
    // El usuario está conectado según la sesión
} else if (isset($_SESSION['is_logged_in']) && !$_SESSION['is_logged_in'] && isset($_SERVER['HTTP_REFERER']) && strpos($_SERVER['HTTP_REFERER'], 'cerrar.php') === false && isset($_COOKIE['PHPSESSID']) && !empty($_COOKIE['PHPSESSID']) && isset($_SERVER['REMOTE_ADDR']) && !empty($_SERVER['REMOTE_ADDR'])) {
    // El usuario no está conectado según la sesión, pero hay un posible indicio de que se cerró la página y se limpió la sesión
    // Verificar si el estado de la sesión se guardó en el almacenamiento local
    echo "<script>var isLoggedIn = localStorage.getItem('is_logged_in');</script>";
    if (isset($_COOKIE['PHPSESSID']) && !empty($_COOKIE['PHPSESSID']) && isset($_SERVER['REMOTE_ADDR']) && !empty($_SERVER['REMOTE_ADDR']) && isset($isLoggedIn) && $isLoggedIn === 'true') {
        // El estado de la sesión se guardó en el almacenamiento local y coincide con el estado de la sesión del servidor
        $_SESSION['is_logged_in'] = true;
    } else {
        // Redirigir a la página de inicio de sesión si no se puede determinar si el usuario está conectado
        header("Location: regis.php");
        exit;
    }
} else {
    // El usuario no está conectado según la sesión y no hay indicio de que se haya cerrado la página
    header("Location: regis.php"); // Redirigir a la página de inicio de sesión
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Inicio </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
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
    <section class="home" id="home">

     <div class="content">
        <h3>Carnes Frescas</h3>
        <span>Rica & Deliciosa</span>
        <p>¡Descubre la excelencia en cada bocado!.
        ¡Déjate seducir por el sabor auténtico y la jugosidad incomparable que solo nuestras carnes pueden ofrecerte!</p>
        <a href="resCerdo.html" class="btn">Comprar Ahora</a>
    </div>
    </section>
</body>
</html>