<?php
//conectamos a la base de datos
    $conn = new mysqli("localhost", "root", "","b5ojcad");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        
    }else{
        $i    = 0;
        $tracks = array();
        if(empty($_GET)){
            $sql  = "SELECT t5jds0, t5prc4, t5qwd7,t5tlc3,t5isk2 FROM t5fjs0w";
            $aux  = mysqli_query($conn,$sql);
            $cont = mysqli_num_rows($aux);
                while($fila = mysqli_fetch_row($aux)){
                    $tracks[$i] = array($fila[0],$fila[1],$fila[2],$fila[3],$fila[4]);
                    $i++;
                }

        }else{
            $filtro = $_GET["search"];
            if(empty($filtro)){
                //Si esta vacia, mostramos resultados aleatorios
                //Imagen,Nombre de Tracks, Autor, path 3 campos
                $sql  = "SELECT t5jds0, t5prc4, t5qwd7,t5tlc3,t5isk2 FROM t5fjs0w";
                $aux  = mysqli_query($conn,$sql);
                $cont = mysqli_num_rows($aux);
                if($cont < 12){
                    while($fila = mysqli_fetch_row($aux)){
                        $tracks[$i] = array($fila[0],$fila[1],$fila[2],$fila[3],$fila[4]);
                        $i++;
                    }
                }
                

            }else{
                //Si contiene algo, hacemos la búsqueda
                //nombre de cancion or artista or genero
                //Imagen,Nombre de Tracks, Autor, 3 campos
                $sql = "SELECT t5jds0, t5prc4, t5qwd7, t5tlc3,t5isk2 FROM t5fjs0w WHERE t5prc4 = '$filtro' OR t5qwd7 = '$filtro' OR t5zpw1 = '$filtro'";
                $aux  = mysqli_query($conn,$sql);
                $cont = mysqli_num_rows($aux);
                while($fila = mysqli_fetch_row($aux)){
                    $tracks[$i] = array($fila[0],$fila[1],$fila[2],$fila[3],$fila[4]);
                    $i++;
                }

            }
        }
    }
$conn->close();
?>