<?php
session_start();
$_SESSION = array(); // Limpiar todas las variables de sesión
session_regenerate_id(); // Regenerar el ID de sesión

// Guardar el estado de la sesión en el almacenamiento local
echo "<script>localStorage.setItem('is_logged_in', 'false');</script>";

header("Location: duplica.html"); // Redirigir a la página principal
exit;
?>
