<?php 

	include "conexion.php";

	function tipoUsuario($nombre, $correo){
		//Comprabamos si es superadmin
		if (esSuperadmin ($nombre, $correo)) return "superadmin";
		
		//Sino 
		//Nos conectamos a la base de datos
		$conexion= crearConexion();
		//Definimos la consulta sql para obtener los datos de los usuarios
		$sql = "SELECT * from user WHERE email='$correo' AND full_name='$nombre';";
		//Hacemos la consulta
		$resultado = mysqli_query($conexion,$sql);
		
		if (mysqli_num_rows($resultado) > 0) {
			while ($fila = mysqli_fetch_assoc($resultado)) {
				$enabled= $fila['enabled'];
				if ($enabled==1) 
					return "autorizado";
				return "registrado";
			}
		}
		return "no registrado";				
	}


	function esSuperadmin($nombre, $correo){
		//Nos conectamos a la base de datos
		$conexion= crearConexion();
		//Definimos la consulta sql para obtener los datos de los usuarios
		$sql = "SELECT * from user WHERE email='$correo' AND full_name='$nombre';";
		//Hacemos la consulta
		$resultado = mysqli_query($conexion,$sql);
		//Obtenemos el id del usuario
		$idUsuarioLogado=0;
		while ($fila= mysqli_fetch_assoc($resultado)){
			$idUsuarioLogado=$fila["id"];
		}
		//Buscamos el id del superadmin
		$sqlSuper="SELECT superadmin_id FROM setup";
		$resultSuper = mysqli_query($conexion, $sqlSuper);
		while ($fila= mysqli_fetch_assoc($resultSuper)){ 
			$idSuperAdmin=$fila["superadmin_id"];
		}
		if ($idSuperAdmin == $idUsuarioLogado)	
			return true;
	
		return false;
	}


	function getPermisos() {
		/**Devuelve el valor del campo management */
		//Conexión con la BBDD
		$conexion = crearConexion("");
		//Creamos la consulta
		$sql = "SELECT * FROM setup";
		//Hacemos la consulta y guardamos el resultado en $result
		$result = mysqli_query($conexion, $sql);
		if (mysqli_num_rows($result) > 0) {
			while ($fila= mysqli_fetch_assoc($result)){ 
				 return $fila["management"];
			}
		}
	}


	function cambiarPermisos() {
		/**Alterna/Cambia el valor del campo management */
		// Primero revisamos los permisos
		$permiso=getPermisos();
		if ($permiso==0) $cambia=1;
		else $cambia=0;

		//Accedemos al registro de la tabla
		$conexion = crearConexion("");
		$sql = "UPDATE  setup SET management=$cambia";
		$modifica = mysqli_query($conexion, $sql); 
		
		
	}


	function getCategorias() {
		//Devuelve la lista de las categorías
		$conexion = crearConexion("");
		$sql = "SELECT id, name FROM category";
		$result = mysqli_query($conexion, $sql); 
		//Si la consulta ha devuelto algún valor, devolvemos los valores.
		if (mysqli_num_rows($result) > 0) {
			return $result;
		}
		// si no, enviamos un mensaje de error.
		else {
			return "No hay nada en la lista de categorías.";
		}	
	}


	function getListaUsuarios() {
			// Devuelve una tabla virtual con los datos (full_name, email, enabled) 
		//de todos los usuarios almacenados en la tabla user.
		$conexion = crearConexion("");
		$sql = "SELECT full_name, email, enabled FROM user";
		
		//Hacemos la consulta y guardamos el resultado en $result
		$result = mysqli_query($conexion, $sql);
		
	  	//Si la consulta ha devuelto algún valor, devolvemos los valores.
	    if (mysqli_num_rows($result) > 0) {
			return $result;
		}
		// si no, enviamos un mensaje de error.
		else {
			return "No hay nada en la lista de usuarios.";
		}
	}


	function getProducto($ID) {
		// Devuelve el registro correspondiente al id pasado por parámetro
		$conexion = crearConexion("");
		$sql = "SELECT id, name, cost, price, category_id FROM product WHERE id='$ID'";
		
		//Hacemos la consulta y guardamos el resultado en $result
		$result = mysqli_query($conexion, $sql);
		
		//Si la consulta ha devuelto algún valor, devolvemos éste.
		if (mysqli_num_rows($result) > 0) {
			return $result;
		}
		// si no, enviamos un mensaje de error.
		else {
			return "No hay nada en la lista de productos.";
		}
	}


	function getProductos($orden) {
		// Devuelve una tabla virtual con los datos de los productos 
		$conexion = crearConexion("");
		
		$sql = "SELECT p.id, p.name, p.cost, p.price, p.category_id as categoria, c.name as category
			 FROM product p INNER JOIN category c ON category_id = c.id order by $orden ";
		

		//Hacemos la consulta y guardamos el resultado en $result
		$result = mysqli_query($conexion, $sql);
		
	  	//Si la consulta ha devuelto algún valor, devolvemos los valores.
	    if (mysqli_num_rows($result) > 0) {
			return $result;
		}
		// si no, enviamos un mensaje de error.
		else {
			return "No hay nada en la lista de usuarios.";
		}
	}


	function anadirProducto($nombre, $coste, $precio, $categoria) {
		// Consulta SQL para añadir un producto
		$conexion = crearConexion("");
		$sql="INSERT INTO PRODUCT (name,cost,price,category_id) VALUES ('$nombre','$coste','$precio','$categoria')";
		
		
		//Hacemos la consulta y guardamos el resultado en $result
		$result = mysqli_query($conexion, $sql);
		
		//Si la consulta SQL de tipo INSERT ha sido correcta devuelve 1
		if ($result==1) {
			//echo "Desde interior función anadirProducto ".$result;
		}else{
			//echo "Desde interior función anadirProducto ".$result;
		}
	}


	function borrarProducto($id) {
		// Consulta SQL para eliminar un producto
		$conexion = crearConexion("");
		$sql="DELETE FROM PRODUCT WHERE id='$id'";
		//$sql="INSERT INTO PRODUCT (id,name,cost,price,category_id) VALUES ('$nombre','$coste','$precio','$categoria')";
		
		
		//Hacemos la consulta y guardamos el resultado en $result
		$result = mysqli_query($conexion, $sql);
		
		//Si la consulta SQL de tipo DELETE ha sido correcta devuelve 1
		if ($result==1) {
			echo "Desde interior función borrarProducto ".$result;
		}else{
			echo "Desde interior función borrarProducto ".$result;
		}
	
	}


	function editarProducto($id, $nombre, $coste, $precio, $categoria) {
			// Consulta SQL para editar un producto
			$conexion = crearConexion("");
			$sql="UPDATE product SET name='$nombre', cost='$coste', price='$precio', 
			category_id='$categoria' WHERE id='$id'";
			
			
			//Hacemos la consulta y guardamos el resultado en $result
			$result = mysqli_query($conexion, $sql);
			
			//Si la consulta SQL de tipo DELETE ha sido correcta devuelve 1
	if ($result==1) {
		echo "Desde interior función editarProducto ".$result;
	}else{
		echo "Desde interior función editarProducto ".$result;
	}
	}

?>