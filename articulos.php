<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Articulos</title>
</head>
<body>
	<h1>Lista de artículos</h1>

	<?php 
		//echo "<br>La cookie de privilegios es : ". $_COOKIE['privilegios']."<br>";
		include "funciones.php";
		if ($_COOKIE['privilegios']!='autorizado' && ($_COOKIE['privilegios']!='registrado')) {
			echo "No tienes permiso para estar aquí. ";
			echo "<a href='index.php'>Volver al inicio</a>";
		}else{
			echo '<a href="formArticulos.php?accion=anadir">Añadir producto</a>';
			if (!isset($_GET['orden'])){
					$orden='id';
					//echo $order;
			}else{
				$orden=$_GET['orden'];
				//echo $order;
			}
			//order by name cost price id category
			$listaProductos = getProductos("$orden");
			pintaProductos("$orden");
		}
	?>


</body>
</html>