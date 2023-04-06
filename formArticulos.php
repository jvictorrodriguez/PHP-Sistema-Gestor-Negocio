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
		

				
		if(isset($_GET["accion"])){
			if ($_GET['accion']=='anadir'){
				formAnadir();
			}elseif ($_GET['accion']=='borrar'){
				formConsulta();
				echo '<input type="submit" value="Borrar" name="boton">';
			}elseif ($_GET['accion']=='editar'){
				formConsulta();
				echo '<input type="submit" value="Modificar" name="boton">';

			}
		}
		
	}
	
	function formAnadir(){
		echo' 
		<form action="formArticulos.php" method="GET">
		<label for="id">ID: </label> 	<input type="text" name="id"  disabled ><br><br>	
		<label for="nombre">Nombre: </label> 	<input type="text" name="nombre"  ><br><br>
		<label for="coste">Coste: </label>		<input type="number" step="any" name="coste" required ><br><br>	
		<label for="precio">Precio: </label>	<input type="number" step="any" name="precio" ><br><br>';
		pintaCategorias("");
		echo '
		<input type="submit" value="Añadir" name="boton">
		</form>';
		
	}
	function formConsulta(){
			//Dibujamos la información.  Borrar

			$fila= mysqli_fetch_assoc(getProducto($_GET['id']));	

			if (isset($_GET['accion'])) {
				$accion=$_GET['accion'];
			}else{
				$accion="";
			}
			$id=$fila["id"];
			$nombre=$fila["name"];
			$coste=$fila["cost"];
			$precio=$fila["price"];
			$categoria=$fila["category_id"];
			echo '
			<form action="formArticulos.php" method="GET">
			
				<label for="id">ID: </label>			
				<input type="text" name="id"  disabled value='.$id.'><br><br><input type="text" name="id"  hidden value='.$id.'>
				<label for="nombre">Nombre: </label><input type="text" name="nombre"  value ="'.$nombre.'"><br><br>					
				<label for="coste">Coste: </label>	<input type="number" step="any" name="coste" required value='.$coste.'><br><br>
				<label for="precio">Precio: </label><input type="number" step="any" name="precio" value='.$precio.'><br><br>';
				pintaCategorias($categoria);
	}


		if(isset($_GET['boton'])) {

			switch($_GET["boton"]){
				case "Añadir":
					formAnadir();
					$productoAnadido = anadirProducto(
						$_GET['nombre'],
						$_GET['coste'],$_GET['precio'],$_GET['categoria'],$_GET['nombre']);
					echo '<br>Se ha añadido el producto ';
					echo '<a href="articulos.php">Volver </a>';
					break;
				case "Borrar":
					formConsulta();
					echo " Se ha eliminado el artículo ";
					borrarProducto($_GET['id']);
					echo '<a href="articulos.php">Volver </a>';		
					break;
					case "Modificar":
					formConsulta();
					echo "Artículo modificado";
					editarProducto($_GET['id'],$_GET['nombre'], $_GET["coste"], $_GET["precio"], $_GET["categoria"]);
					echo '<a href="articulos.php">Volver </a>';
					break;
				}

		}

			


	?>
	
</body>
</html>
