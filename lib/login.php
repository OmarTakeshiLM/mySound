<?php
    $cor = $_POST["correo"];
    $ps  = $_POST["pass"];
    //conectamos a la base de datos
    $conn = new mysqli("localhost", "root", "","b5ojcad");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        
    }else{
        //contraseña dada, contraseña guardada
        
        $c = mysqli_query($conn,"SELECT u5nbf8 FROM u5lwe5a WHERE u5asd4 = '$cor'");
        
        if(!$c){
           echo "error" ;
        }else{
			//Resultado de la busqueda
            $resultado = mysqli_fetch_row($c);
			//encriptamos la contraseña
            $ps = hash('sha512',$ps);
			//Verificamos que la contraseña sea correcta
            if ($ps == $resultado[0]){
				//si esta correcto, entonces 
				//obtenemos el id de la persona
				$i   = mysqli_query($conn,"SELECT u5wkx0 FROM u5lwe5a WHERE u5asd4 = '$cor'");
				$idu = mysqli_fetch_row($i);

                //Redireccionar a la pàgina principal si està corecto todo
                session_start();
                $_SESSION['account']= $cor;
				$_SESSION['idu'] = $idu[0];
                echo '<script language="javascript">
                    self.location="../PerfilUsuario.php";
				</script>
                ';
            }else{
                //mostrar mensaje de error
                echo '<script language="javascript">
					alert("Error, Revisa tus datos");
                    self.location="../login.php";
				</script>
                ';
            }
        }

    }
$conn->close();
?>