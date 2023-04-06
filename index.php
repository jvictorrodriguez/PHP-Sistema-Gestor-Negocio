<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Index.php</title>
</head>
<body>

	<?php
	
		include "consultas.php";


	?>
	<h1>Inicio</h1>
	<form action="index.php" method="post">
		<label for="usuario">Usuario: </label><input type="text" name="usuario" id=""><br><br>
		<label for="correo">Correo: </label> <input type="email" name="correo" id=""><br><br>
		<input type="submit" value="Enviar">
	</form>
	
	
</body>
</html>