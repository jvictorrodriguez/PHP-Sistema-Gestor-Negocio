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

			if (isset($_GET['id'])){
		//	if (isset($_GET['id']) || $_GET['id']>0){
				
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
				
				
				//Si no se pasa un id es un Alta de producto
			}else{
				$accion="anadir";
				$id="";
				$nombre="";
				$coste="";
				$precio="";
				$categoria="";
			}
			
			//<input type="text" name="nombre"  value ='. $nombre .'><br><br>
			//Dibujamos la información. El mismo código para Alta/Editar/Borrar
			echo '
			<form action="formArticulos.php" method="GET">
			
			<label for="id">ID: </label>			
			<input type="text" name="id"  disabled value='.$id.'><br><br><input type="text" name="id"  hidden value='.$id.'>
				
				<label for="nombre">Nombre: </label>	
					<input type="text" name="nombre"  value ="'.$nombre.'"><br><br>
				
				<label for="coste">Coste: </label>		
					<input type="number" step="any" name="coste" required value='.$coste.'><br><br>
				
				<label for="precio">Precio: </label>	
					<input type="number" step="any" name="precio" value='.$precio.'><br><br>';

				//$categoria= 
				pintaCategorias($categoria);
			
				if ($accion=='editar') 		 echo '<input type="submit" value="modifica" name="boton">';
				elseif ($accion=='borrar')	 echo '<input type="submit" value="elimina" name="boton">';
				elseif ($accion=='anadir')	 echo '<input type="submit" value="crea" name="boton">';
		
				echo '<a href="articulos.php">Volver </a>';
				$opcion="";	
				if (isset($_GET["boton"])) {
					$opcion=$_GET["boton"];
					//echo $opcion;
				}
						
						switch($opcion){
							case "modifica"	:
								echo "Artículo modificado";
								editarProducto($_GET['id'],$_GET['nombre'], $_GET["coste"], $_GET["precio"], $_GET["categoria"]);
								break;
							case "elimina": 	
								echo "Artículo eliminado";
								borrarProducto($id);
								break;
								
							case "crea": 	
								$productoAnadido = anadirProducto(
									$_GET['nombre'],
									$_GET['coste'],$_GET['precio'],$_GET['categoria'],$_GET['nombre']);
								echo 'Se ha añadido el producto ';
								/* $_GET['nombre'],
								$_GET['coste'],$_GET['precio'],$_GET['categoria'],$_GET['nombre']); */
								echo 'Se ha añadido el producto ';
								break; 
							
						} 
					
				echo 
				'</form>';
		}
	?>

	
</body>
</html>