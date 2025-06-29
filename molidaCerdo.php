<?php
include("crear.php");
$link = Conectarse();
session_start();

if (!isset($_SESSION['xd_id'])) {
    header("Location: regis.php");
    exit;
}

$usuario_id = $_SESSION['xd_id'];

// Verificar si el usuario ya tiene un registro en la tabla
$sql = "SELECT * FROM pou WHERE id = '$usuario_id'";
$result = $link->query($sql);

if ($result->num_rows == 0) {
    // Si no existe, insertar un nuevo registro
    $sql = "INSERT INTO pou(id, bistec, molida, adobada, espinazo, longaniza, chistorra, chorizo, chuleta) VALUES ('$usuario_id', 0, 0, 0, 0, 0, 0, 0, 0)";
    mysqli_query($link, $sql);
}

// Actualizar los valores si se envió un formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $amount = $_POST['amount'];
    $sql = "UPDATE pou SET molida = molida + '$amount' WHERE id = '$usuario_id'";
    mysqli_query($link, $sql);
}
header("Location: molidaCerdo.html");
?>
