<?php 


    function registrarUsuario($data,$gustos){

		
		if (empty($data['nombreUsuario']) or empty($data['nombreArtistico']) or empty($data['email']) or empty($data['pass1']) or empty($data['pass2']) or empty($data['genero']) or empty($data['pais'])   ){
            
			return 'Por favor, verifique que todos los datos sean llenados.';
		
        }else{
			
			
			$servername = 'localhost';
			$database = 'b5ojcad';
			$user = 'root';
			$password = '';

			$conexion = mysqli_connect($servername, $user, $password, $database);
			mysqli_set_charset($conexion, 'utf8');
			
			$query = "SELECT * FROM u5lwe5a WHERE u5asd4='".$data['email']."' ";
			$resultado = mysqli_query($conexion, $query);
			$cantidadCorreos = mysqli_num_rows($resultado);
			
			$query = "SELECT * FROM u5lwe5a WHERE u5wkx0='".$data['nombreUsuario']."' ";
			$resultado = mysqli_query($conexion, $query);
			$cantidadNombres = mysqli_num_rows($resultado);
			
			if( $cantidadCorreos > 0  ){
				return 'El correo electrónico ya ha sido registrado anteriormente. Favor de ingresar uno distinto.';
			}
			if( $cantidadNombres > 0  ){
				return 'El nombre de artista ya ha sido registrado anteriormente. Favor de ingresar uno distinto.';
			}
			if ($data['pass1'] != $data['pass2']){
                return 'Las contraseñas no coinciden. Verifique que sean iguales';
            }
			for ($fila=0; $fila<count($gustos); $fila++) {
				if( $gustos[$fila][1] == "on"){
					$band = false;
					$tipoGusto = $gustos[$fila][0];
					for ($filaAux=0; $filaAux<count($gustos); $filaAux++) {
						if( $gustos[$filaAux][0] == $tipoGusto and  $gustos[$filaAux][3] == "on" ){
							$band = true;
						}
					}
					if( $band == false )
						return 'Usted seleccionó un interés. Verifique seleccionar al menos un gusto.';
				}
			}
			
			// Encriptar contraseña
			$data['pass1'] = hash('sha512', $data['pass1']);
			
			
			$UnombreU = $data['nombreUsuario'];
			$UnombreA = $data['nombreArtistico'];
			$Upswd = $data['pass1'];
			$Uemail = $data['email'];
			$Ugenero = $data['genero'];
			$Upais = $data['pais'];
			
			
			// Agregar a la BD (tabla usuario) el usuario
			$query = "INSERT INTO u5lwe5a (u5wkx0,u5hwo4,u5nbf8,u5asd4,u5pyt0,u5rem2,u5ybn4) VALUES ('$UnombreA', '$UnombreU', '$Upswd',  '$Uemail', '$Ugenero', null, '$Upais' )";               					
			$resultado = mysqli_query($conexion, $query);

			
			// Obtengo el ID del usuario
			$query = "SELECT * FROM u5lwe5a WHERE u5wkx0 ='$UnombreA'";
			$resultado =  mysqli_query($conexion, $query);
			$fila = mysqli_fetch_array($resultado);
			$ID = $fila['u5wkx0'];
			
			for ($fila=0; $fila<count($gustos); $fila++) {
				if( $gustos[$fila][3] == "on"){
					$insertaGusto = $gustos[$fila][2];
					$query = "INSERT INTO g5jad9j (g5rjc6,g5pio7) VALUES ('$ID','$insertaGusto')";               					
					mysqli_query($conexion, $query);
				}
			}
			

			mysqli_close($conexion);
			
			echo '<script language="javascript">
					alert("'.$data['nombreArtistico'].', tu registro ha sido exitoso. Bienvenido a MySound.");
					self.location="login.php";
				</script>';
			return '';
			
		}
		
	}
	
	function logearUsuario($correo,$password){
		
		
	}
	

?>