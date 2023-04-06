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
		// Completar...	
	}


	function cambiarPermisos() {
		// Completar...	
	}


	function getCategorias() {
		// Completar...	
	}


	function getListaUsuarios() {
		// Completar...	
	}


	function getProducto($ID) {
		// Completar...	
	}


	function getProductos($orden) {
		// Completar...	
	}


	function anadirProducto($nombre, $coste, $precio, $categoria) {
		// Completar...	
	}


	function borrarProducto($id) {
		// Completar...	
	}


	function editarProducto($id, $nombre, $coste, $precio, $categoria) {
		// Completar...	
	}

?>