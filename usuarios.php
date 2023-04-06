<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Usuarios</title>
</head>
<body>
	<h1>Lista de usuarios</h1>
<!-- Aquí solo accede el superadmin-->
<!-- Por ello comprobamos la cookie de permisos sea la de superadmin-->
	<?php 

		include "funciones.php";
		
		if (isset($_GET['permisos'])){
			cambiarPermisos();
		}

		if ( !isset($_COOKIE['privilegios'])|| $_COOKIE['privilegios']!="superadmin" ){
			echo "No tienes permiso para estar aquí. ";
			echo "<a href='index.php'>Volver al inicio</a>";
		}else{
			echo '<form action="usuarios.php" method="get">';
			echo "Los permisos actuales estan a " .getPermisos(). ".<br><br>";
			echo '<input type="submit" name="permisos" value="Cambiar permisos"><br><br>';
			echo '</form>';
			echo '<a href="index.php">Volver al inicio</a><br><br>';
		
			pintaTablaUsuarios();
		}
	?>

</body>
</html>