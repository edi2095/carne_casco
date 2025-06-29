<?php
function Conectarse(){ //Colocar contraseña para app serv
	if (!($link=mysqli_connect("localhost","root","")))
		exit();
	if (!mysqli_select_db($link,"bdphp"))
		exit();
return $link;
}


?>
