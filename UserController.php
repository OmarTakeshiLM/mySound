<?php
    require_once 'lib/DB.php';
    use Lib\DB;

    function obtenerTracks($usuario) {
        $db = new DB();
        $query = "SELECT * FROM t5fjs0w WHERE t5qwd7='$usuario';";
        $reply = $db->readAll($query);
        // var_dump($reply[0]);
        return $reply;
	}
	
	function obtenerTracksExplorer() {
		$db = new DB();
        $query = "SELECT * FROM t5fjs0w";
        $reply = $db->readAll($query);
        return $reply;
	}
	
	function borrarTrack(){
		
		$id = $_POST['EliminaT'];
	
		$servername = 'localhost';
		$database = 'b5ojcad';
		$username = 'root';
		$password = '';

		$conexion = mysqli_connect($servername, $username, $password, $database);
		mysqli_set_charset($conexion, 'utf8');
		
		
		$query = "DELETE FROM t5fjs0w WHERE t5isk2 = '$id'";
		mysqli_query($conexion,$query); 
		mysqli_close($conexion);
		
	}
	
	function borrarPlaylist(){
		
		$id = $_POST['EliminaP'];
	
		$servername = 'localhost';
		$database = 'b5ojcad';
		$username = 'root';
		$password = '';

		$conexion = mysqli_connect($servername, $username, $password, $database);
		mysqli_set_charset($conexion, 'utf8');
		
		
		$query = "DELETE FROM p5trp7m WHERE p5lqm5 = '$id'";
		mysqli_query($conexion,$query); 
		mysqli_close($conexion);
		
	}
	
	function obtenerPlaylists($usuario) {
        $db = new DB();
        $query = "SELECT * FROM p5trp7m WHERE p5wnq8='$usuario';";
        $reply = $db->readAll($query);
        // var_dump($reply[0]);
        return $reply;
    }

    function obtenerInformacion($usuario) {
        $db = new DB();
        $query = "SELECT u5hwo4,u5asd4,u5pyt0,u5rem2,u5ybn4,u5wfj3 FROM u5lwe5a WHERE u5wkx0='$usuario';";
        $reply = $db->read($query);
        // var_dump($reply[0]);
        return $reply;
    }
	
	function actualizaInformacionUsuario($usuario,$columna,$reemplazo){
		
		$columnaX = "";
		
		$servername = 'localhost';
		$database = 'b5ojcad';
		$username = 'root';
		$password = '';

		$conexion = mysqli_connect($servername, $username, $password, $database);
		mysqli_set_charset($conexion, 'utf8');
		
		$columnaX = "";
		if( $columna == "1" ){
			$columnaX = "u5wkx0";
			
			$query = "SELECT * FROM u5lwe5a WHERE u5wkx0='$reemplazo'";
			$resultado = mysqli_query($conexion, $query);
			$cantidadNombres = mysqli_num_rows($resultado);
			
			if( $cantidadNombres > 0  ){
				echo '<script language="javascript">
						alert("Nombre ya registrado. Escriba una distinto");
					</script>';
				return false;
			}else{
				$_SESSION['idu'] = $reemplazo;
			}
		}else if( $columna == "2" ){
			$columnaX = "u5hwo4";
		}else if( $columna == "7" ){
			$columnaX = "u5ybn4";
		}else if( $columna == "6" ){
			$columnaX = "u5rem2";
		}
		
		$query = "UPDATE u5lwe5a SET $columnaX='$reemplazo' WHERE u5wkx0='$usuario'";
		
		mysqli_query($conexion,$query); 
		mysqli_close($conexion);
		
	}
	
	
	
	
	