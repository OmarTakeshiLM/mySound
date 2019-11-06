<?php
//Obtenemos primeros los tracks y después las listas de reproduccion
    $conn = new mysqli("localhost", "root", "","b5ojcad");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }else{
        //Tacks
        $artist = $_GET["artista"];
        
        
//ARREGLO DE TRACK
        //Hacemos la consulta
        //  nombretrack,valoracion,duracion,ruta, imagen, ID
        $sql = "SELECT t5prc4,t5jsi8,t5iwj7,t5tlc3,t5jds0,t5zpw1 FROM t5fjs0w WHERE t5qwd7= '$artist'";
        //Hacemos la consulta y mostramos resultados
        $listaTracks = mysqli_query($conn,$sql);
        $contT = mysqli_num_rows($listaTracks);         //Para saber cuantos resultados obtuvo la consulta
        $i = 0;
        //Lo que hacemos es un arreglo
        while($fila = mysqli_fetch_row($listaTracks)){
            $arrayTracks[$i]= array($fila[0],$fila[1],$fila[2],$fila[3],$fila[4],$fila[5],$artist);
            $i++;
        }
        //echo $contT."<br>";
//ARREGLO DE PLAYLIST
        //Hacemos la consulta Nombre de la playlist
        $sql = "SELECT p5uss6,p5lqm5 FROM p5trp7m WHERE p5wnq8= '$artist'";
        //Hacemos la consulta y mostramos resultados
        $listaPlay = mysqli_query($conn,$sql);
        $contP = mysqli_num_rows($listaPlay);
        $i = 0;
        while($fila = mysqli_fetch_row($listaPlay)){
            //Consultamos el numero de tracks, para eso hacemos una consulta usando el ide de la playlist
            $sql = "SELECT p5mso3 FROM p5trp7m WHERE p5wnq8= '$artist'";
            $numT = mysqli_query($conn,$sql);
            $arrayPlay[$i]= array($fila[0],mysqli_num_rows($numT));
            $i++;
        }
//Conseguir datos importantes
        //Obtenemos el nombre del artista
        $sql = "SELECT u5hwo4 FROM u5lwe5a WHERE u5wkx0='$artist'";
        $nombreArtista = mysqli_fetch_row(mysqli_query($conn,$sql));
        //Obtenemos la nacionalidad
        $sql = "SELECT u5ybn4 FROM u5lwe5a WHERE u5wkx0='$artist'";
        $nacionalidad = mysqli_fetch_row(mysqli_query($conn,$sql));
        //Obtenemos la biografia del artista
        $sql = "SELECT u5rem2 FROM u5lwe5a WHERE u5wkx0='$artist'";
        $biografia = mysqli_fetch_row(mysqli_query($conn,$sql));

    }
$conn->close();
?>