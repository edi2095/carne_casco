<?php
include("crear.php");

$mail = $_REQUEST["email"];
$nom = $_REQUEST["nombre"];
$pASS = $_REQUEST["pASS"];
$edad = $_REQUEST["edad"];
$ubi = $_REQUEST["ubi"];

$link = Conectarse();

if ($link->connect_error) {
    die("Connection failed: " . $link->connect_error);
}

$sql = "INSERT INTO registro (usuario, mail, edad, pass) VALUES (?, ?, ?, ?)";
$stmt = $link->prepare($sql);

if ($stmt === false) {
    die("Error en la preparación de la declaración: " . $link->error);
}

$stmt->bind_param("sssi", $nom, $mail, $edad, $pASS);

if ($stmt->execute()) {
    // Obtener el ID del registro insertado
    $id = $stmt->insert_id;
    
    // Iniciar sesión
    session_start();
    
    // Almacenar el ID de usuario en la sesión
    $_SESSION['xd_id'] = $id;
    
    //header("Location: xd.php");
    echo("Registro completado exitosamente");
    exit;
} else {
    echo "<script>alert('Error al guardar el registro: " . $stmt->error . "');</script>";
}

$stmt->close();
$link->close();
?>
