<?php 

	include "consultas.php";


	function pintaCategorias($defecto) {
		echo ' <label for="categoria">Categoría: </label>
				<select name="categoria">';

				//Dibujamos el desplegable de categorías
				$categorias=getCategorias();
				while ($registro= mysqli_fetch_assoc($categorias)){
					if($registro["id"]==$defecto){
						echo 
						'<option selected="selected" value='.$registro["id"].'>'.	
						$registro["name"].
						'</option>';
					}else{
						echo 
						'<option value='.$registro["id"].'>'.	
						$registro["name"].
						'</option>';
					}
				}
				echo '</select><br><br>';
				return $defecto;
	}
	

	function pintaTablaUsuarios(){
		//Obtenemos la lista de usuarios
		$listaUsuarios = getListaUsuarios();

		// Si hemos recibido un mensaje de error lo mostramos
		if (is_string($listaUsuarios)) echo $listaUsuarios;
    
		// Si hemos recibido datos, construimos la tabla
		else{
			echo 
			"<table><tr>
			<th>Full Name</th>
			<th>email</th>
			<th>enabled</th>
		</tr>";
		//Obtenemos cada una de las filas de datos que nos devolvió la consulta.
		//mysqli_fetch_assoc avanza entre cada uno de los elementos del array que contiene
		//cada vez que se llama, hasta que no haya más, por eso se puede usar en un while.
	
			while ($fila= mysqli_fetch_assoc($listaUsuarios)){
				echo 
				"<tr>\n".
				"<td>" . $fila["full_name"] . "</td>\n" . 
				"<td>" . $fila["email"] . "</td>\n";
			if (getPermisos()==1)
			{
				if ($fila["enabled"]==1){
					echo "<td>" . "<b>". $fila["enabled"] ."</b>". "</td>\n";
				}else{
					echo "<td>" . $fila["enabled"] . "</td>\n";
				}
			}
		   echo "</tr>";            
				}
			echo "</table>";	
		}

	}

		
	function pintaProductos($orden) {
		// Si hemos recibido un mensaje de error lo mostramos
		$listaProductos=getProductos($orden);
		if (is_string($listaProductos)) {
			echo $listaProductos;
		}else{
			// Si hemos recibido datos, construimos la tabla
			echo 
			'<table><tr>
			<th><a href="articulos.php?orden=id">ID</a></th>
			<th><a href="articulos.php?orden=name">Nombre</a></th>
			<th><a href="articulos.php?orden=cost">Coste</a></th>
			<th><a href="articulos.php?orden=price">Precio</a></th>
			<th><a href="articulos.php?orden=categoria">Categoría</a></th>
			<th>Acciones</th>
			</tr>';
		//Obtenemos cada una de las filas de datos que nos devolvió la consulta.
		//mysqli_fetch_assoc avanza entre cada uno de los elementos del array que contiene
		//cada vez que se llama, hasta que no haya más, por eso se puede usar en un while.
	
			while ($fila= mysqli_fetch_assoc($listaProductos)){
				echo 
				"<tr id=" . $fila["id"] . ">\n" .  
				"<td>" . $fila["id"] . "</td>\n" . 
				"<td>" . $fila["name"] . "</td>\n". 
				"<td>" . $fila["cost"] . "</td>\n". 
				"<td>" . $fila["price"] . "</td>\n".
				"<td>" . $fila["category"] . "</td>\n";
				
				//Comprobamos que el usuario tenga permisos de Editar/Borrar
						if ($_COOKIE['privilegios']=='autorizado'){
							$registro=$fila["id"];
							echo
							"<td>" . 
							'<a href="formArticulos.php?accion=editar&id='.$registro.'">Editar</a> -
							<a href="formArticulos.php?accion=borrar&id='.$registro.'">Borrar</a>' . 
							"</td>\n";
						}
				echo "</tr>";            
			}
			echo "</table>";	
		}
			
	
	}

?>