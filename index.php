<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Index.php</title>
</head>
<body>

	<h1>Inicio</h1>
	<form action="index.php" method="post">
		<label for="usuario">Usuario: </label><input type="text" name="usuario" id=""><br><br>
		<label for="correo">Correo: </label> <input type="email" name="correo" id=""><br><br>
		<input type="submit" value="Enviar">
	</form>
	
	<?php
			include "consultas.php";
	
	$t=time();
	if (!$_POST){
		//echo "<br>NO HAY POST ".(date("H:m:s",$t))."<br>";
		
		
	}else{
		//echo "<br>Sí que hay POST ".(date("H:m:s",$t))."<br>";
		
		$nombre=$_POST['usuario'];
		$correo=$_POST['correo'];
				
		$tipoUsuario = tipoUsuario($nombre,$correo);
		setcookie('usuario',$nombre, time()+ 60*30);
		
		
		switch($tipoUsuario){
		case "superadmin":
			setcookie('privilegios','superadmin');
			echo '<br>Bienvenido '. $nombre . '. Pulsa
			<a href="usuarios.php">AQUI</a> para entrar al panel de usuarios';
			break;	
		case "autorizado":
			setcookie('privilegios','user');
			echo '<br>Bienvenido '. $nombre . '. Pulsa
			<a href="articulos.php">AQUI</a> para entrar al panel de artículos';
			break;	
		case "registrado":
			echo '<br>Bienvenido '. $nombre . '. Pulsa
			<a href="articulos.php">AQUI</a> para entrar al panel de artículos';
			break;	
		default:
			echo '<br>El usuario no está registrado en el sistema o
			los datos son incorrectos';
				
				setcookie('usuario','anonimo', time()+ 60*30);
				setcookie('privilegios','no');
				break;
			}	
			
		}
		
	?>


	
</body>
</html>