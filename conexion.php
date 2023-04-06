<?php 

	function crearConexion() {
		// Datos de la conexión
		$host = "localhost";
		$user = "root";
		$pass = "";
		$baseDatos = "pac_dwes";

		// Establecemos la conexión con la BBDD
		$conexion=mysqli_connect($host,$user,$pass,$baseDatos);

		//Si hay un erro en la conexión, lo mostramos y detenemos
		if (!$conexion){
			die("<br>Error en la conexión a la base de datos : " . 
			mysqli_connect_error());
		}

		//Si está todo correcto, devolvemos la conexión con la base de datos
		else{
			//echo ("Conexión correcta con la base de datos : " . $baseDatos);
		}
		return $conexion;
	}


	function cerrarConexion($conexion) {
		mysqli_close($conexion);
	}


?>