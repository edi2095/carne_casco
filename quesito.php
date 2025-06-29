<?php
include("crear.php");
$link = Conectarse();
session_start();

if (!isset($_SESSION['xd_id'])) {
    header("Location: regis.php");
    exit;
}

$usuario_id = $_SESSION['xd_id'];


$sql = "SELECT usuario FROM registro WHERE id = '$usuario_id'";
$result = $link->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $nombre = $row["usuario"];
} else {
    $nombre = "Desconocido";
}

$sql = "SELECT bistec, molida, adobada, espinazo, longaniza, chistorra, chorizo, chuleta FROM pou WHERE id = $usuario_id";
$result = $link->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="estilo.css">

    <title>Carrito de compras</title>
    <style>
        h1 {
    
    margin-top: 200px; /* Ajusta este valor según sea necesario para separar el header del título */
}
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 50px 0;
            font-size: 18px;
            text-align: left;
        }
        th, td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
<header>
    <input type="checkbox" name="" id="toggler">
    <label for="toggler" class="fas fa-bars"></label>

    <a href="Principal.html" class="logo"><img src="img/pixelcut-export.png" width="250px" height="60px"><span>.</span></a>

    <nav class="navbar">
        <a href="Principal.html">Inicio</a>
        <a href="Everything.html">Productos</a>
        <a href="duplica.html">Al Vacio</a>
        <a href="conatctanos.html">Contacto</a>
    </nav>
    <div class="icons">
        <a href="quesito.php" class="fas fa-shopping-cart"></a>
        <a href="regis.php" class="fas fa-user"></a>
    </div>
</header>

<center><h1>carrito de compras</h1></center>

<table>
    <tr>
        <th>Nombre</th>
        <th>Bistec</th>
        <th>Molida</th>
        <th>Adobada</th>
        <th>Espinazo</th>
        <th>Longaniza</th>
        <th>Chistorra</th>
        <th>Chorizo</th>
        <th>Chuleta</th>
    </tr>
    <?php
    if ($result->num_rows > 0) {
        // Mostrar los datos de cada fila
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $nombre . "</td><td>" . $row["bistec"]. "</td><td>" . $row["molida"]. "</td><td>" . $row["adobada"]. "</td><td>" . $row["espinazo"]. "</td><td>" . $row["longaniza"]. "</td><td>" . $row["chistorra"]. "</td><td>" . $row["chorizo"]. "</td><td>" . $row["chuleta"]. "</td></tr>";
        }
    } else {
        echo "<tr><td colspan='9'>No se encontraron resultados</td></tr>";
    }
    $link->close();
    ?>
</table>
</body>
</html>
