<?php 


    function registrarUsuario($data,$gustos){

		
		if (empty($data['nombre']) or empty($data['email']) or empty($data['pass1']) or empty($data['pass2']) or empty($data['genero']) or empty($data['pais'])   ){
            
			return 'Por favor, verifique que todos los datos sean llenados.';
		
        }else{
			
			
			$servername = 'localhost';
			$database = 'b5ojcad';
			$user = 'root';
			$password = '';

			$conexion = mysqli_connect($servername, $user, $password, $database);
			mysqli_set_charset($conexion, 'utf8');
	
			if (!$conexion) {
				die("Connection failed: " . mysqli_connect_error());
			}
			
			
			$query = "SELECT * FROM u5lwe5a WHERE u5asd4='".$data['email']."' ";
			$resultado = mysqli_query($conexion, $query);
			$cantidad = mysqli_num_rows($resultado);
			
			if( $cantidad > 0  ){
				return 'El correo electronico ya ha sido registrado anteriormente. Favor de cambiarlo';
			}
			if ($data['pass1'] != $data['pass2']){
                return 'Las contraseñas no coinciden. Verifique que sean iguales';
            }
			
			// Encriptar contraseñas
			$data['pass1'] = hash('sha512', $data['pass1']);
			$data['pass2'] = hash('sha512', $data['pass2']);
			
			
			$Unombre = $data['nombre'];
			$Upswd = $data['pass1'];
			$Uemail = $data['email'];
			$Ugenero = $data['genero'];
			$Upais = $data['pais'];
			
			// Agregar a la BD (tabla usuario) el usuario
			$query = "INSERT INTO u5lwe5a (u5wkx0,u5hwo4,u5nbf8,u5asd4,u5pyt0,u5rem2,u5ybn4) VALUES (DEFAULT, '$Unombre', '$Upswd',  '$Uemail', '$Ugenero', null, '$Upais' )";               					
			mysqli_query($conexion, $query);
			
			// Obtengo el ID del usuario
			$query = "SELECT * FROM u5lwe5a WHERE u5asd4 ='$Uemail'";
			$resultado =  mysqli_query($conexion, $query);
			$fila = mysqli_fetch_array($resultado);
			$ID = $fila['u5wkx0'];
			
			
			foreach($gustos as $key => $item) {
				if( $item=="on" ){
					$query = "INSERT INTO g5jad9j (g5rjc6,g5pio7) VALUES ('$ID','$key')";               					
					mysqli_query($conexion, $query);
				}
			}
			
			echo '<script language="javascript">
					alert("'.$data['nombre'].'  ha sido registrado exitosamente. Bienvenido a MySound.");
					self.location="index.html";
				</script>';
			
			
			return '';
			
		}
		
	}
	
	function logearUsuario($correo,$password){
		
		
	}
	

?>