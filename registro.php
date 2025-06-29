<html>
<title>Registro de alumnos</title>
<body>
  <?php
include("crear.php");
$link=Conectarse();
$nombre=$_REQUEST["nombre"];
$mail=$_REQUEST["mail"];
$edad=$_REQUEST["edad"];
$pass=$_REQUEST["contra"];
$ubi=$_REQUEST["ubi"];

$Sql="INSERT INTO registro(usuario,mail,edad,pass,imag)VALUES('$nombre','$mail','$edad','$pass','$ubi')";
mysqlI_query($link,$Sql);
?>
</body>
</html>