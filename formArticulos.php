<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Formulario de artículos</title>
</head>
<body>
	<!-- Aquí solo acceden los usuarios registrados salvo el superadmin-->
	<?php
		include "funciones.php";
		if ($_COOKIE['privilegios']!='autorizado') {
			echo "No tienes permiso para estar aquí. ";
			echo "<a href='index.php'>Volver al inicio</a>";
		}else{
crear();

		}
		function crear(){
			echo' 
			<form action="formArticulos.php" method="GET">
			<label for="id">ID: </label> 	<input type="text" name="id"  disabled ><br><br>
			<label for="nombre">Nombre: </label> 	<input type="text" name="nombre"  ><br><br>
			<label for="coste">Coste: </label>		<input type="number" step="any" name="coste" required ><br><br>
			<label for="precio">Precio: </label>	<input type="number" step="any" name="precio" ><br><br>';
			pintaCategorias("");
			echo '<input type="submit" value="crea" name="boton">
			</form>';

			$productoAnadido = anadirProducto($_GET['nombre'],$_GET['coste'],
			$_GET['precio'],$_GET['categoria'],$_GET['nombre']);
				echo 'Se ha añadido el producto ';
				
		}
	?>
	
</body>
</html>
