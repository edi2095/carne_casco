<?php
include("crear.php");

$mail = $_REQUEST["mail"];
$pass = $_REQUEST["contra"];

$link = Conectarse();

$sql = "SELECT id FROM registro WHERE mail = '$mail' AND pass = '$pass'";
$result = $link->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $id = $row["id"];
    
    // Iniciar sesión
    session_start();
    
    // Almacenar el ID de usuario en la sesión
    $_SESSION['xd_id'] = $id;
    
    header("Location: xd.php");
    exit;
} else {
    echo "<script>alert('Inicio de sesión incorrecto');</script>";
}
?>
