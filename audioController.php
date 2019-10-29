<?php
    require_once 'lib/DB.php';
    use Lib\DB;

function audioValido($audio) {
    $directorio = 'audios/'; #Directorio en dónde guardamos la imagen
    $archivo = $directorio.basename($audio['name']);

    #pathinfo — Devuelve información acerca de la ruta de un fichero
    $tipoArchivo = strtolower(pathinfo($archivo, PATHINFO_EXTENSION));

    #Tamaño del audio
    if ($audio['size'] > 50000000) {
        $respuesta['mensaje'] = "El archivo de audio es muy grande";
        $respuesta['codigo'] = 400;
        return json_encode($respuesta, JSON_PRETTY_PRINT);
    }

    #Validar formato
    if($tipoArchivo != "mp3" && $tipoArchivo != "wav") {
    $respuesta['mensaje'] = "El archivo de audio no tiene un formato válido";
        $respuesta['codigo'] = 400;
        return json_encode($respuesta, JSON_PRETTY_PRINT);
    }

    if (file_exists($archivo)) {
        $respuesta['mensaje'] = "El archivo ya existe";
        $respuesta['codigo'] = 400;
    } else {
        $respuesta['mensaje'] = "Es una audio de tipo valido";
        $respuesta['codigo'] = 200;
    }
    return json_encode($respuesta, JSON_PRETTY_PRINT);
}

function imagenValida($portada) {
    $directorio = 'portadas/'; #Directorio en dónde guardamos la imagen
    $archivo = $directorio.basename($portada['name']);

    #pathinfo — Devuelve información acerca de la ruta de un fichero
    $tipoArchivo = strtolower(pathinfo($archivo, PATHINFO_EXTENSION));
    $validar = getimagesize($portada['tmp_name']); #Tamalo de una imagen
    if ($validar !== false) {

        #Tamaño de la imagen
        if ($portada['size'] > 500000) {
            $respuesta['mensaje'] = "El archivo es muy grande";
            $respuesta['codigo'] = 400;
            return json_encode($respuesta, JSON_PRETTY_PRINT);
        }

        #Validar formato
        if($tipoArchivo != "jpg" && $tipoArchivo != "png" && $tipoArchivo != "gif" && $tipoArchivo != "jpeg") {
        $respuesta['mensaje'] = "El archivo de portada no tiene un formato válido";
            $respuesta['codigo'] = 400;
            return json_encode($respuesta, JSON_PRETTY_PRINT);
        }

        if (file_exists($archivo)) {
            $respuesta['mensaje'] = "El archivo ya existe";
            $respuesta['codigo'] = 400;
        } else {
            $respuesta['mensaje'] = "Es una imagen de tipo ".$validar['mime'];
            $respuesta['codigo'] = 200;
        }
    } else {
        $respuesta['mensaje'] = "No es una imagen";
        $respuesta['codigo'] = 400;
    }
    return json_encode($respuesta, JSON_PRETTY_PRINT);
}

function camposValidos($campos) {
    if(strlen($campos['titulo']) > 3) {
        if(strlen($campos['genero']) > 2) {
            $respuesta['mensaje'] = "Campos válidos";
            $respuesta['codigo'] = 200;
        }else {
            $respuesta['mensaje'] = "El genero es obligatorio";
            $respuesta['codigo'] = 400;
            return json_encode($respuesta, JSON_PRETTY_PRINT);
        }
    }else {
        $respuesta['mensaje'] = "El titulo es obligatorio";
        $respuesta['codigo'] = 400;
        return json_encode($respuesta, JSON_PRETTY_PRINT);
    }
    return json_encode($respuesta, JSON_PRETTY_PRINT);
}

function guardarTrack($data) {
    $dir_portada = 'portadas/';
    $portada = $data['portada'];
    $file_portada = $dir_portada.basename($data['idusuario'].$data['titulo'].'.png');
    $dir_audio = 'audios/';
    $audio = $data['audio'];
    $file_audio = $dir_audio.basename($data['idusuario'].$data['titulo'].'.mp3');
    date_default_timezone_set('UTC');
    $data['audio'] = $data['idusuario'].$data['titulo'].'.mp3';
    $data['portada'] = $data['idusuario'].$data['titulo'].'.png';
    if (move_uploaded_file($audio['tmp_name'], $file_audio) && move_uploaded_file($portada['tmp_name'], $file_portada)) {
        $query = "INSERT INTO t5fjs0w (t5isk2,t5qwd7,t5prc4,t5jsi8,t5iwj7,t5tlc3,t5jds0,t5zpw1,t5oin7) VALUES (DEFAULT, '".$data['idusuario']."', '".$data['titulo']."', NULL, 0, '".$dir_audio.$data['audio']."', '".$dir_portada.$data['portada']."', '".$data['genero']."', '".$data['desc']."')";
        $db = new DB();
        $db->insert($query);
    }
}

function obtenerPlaylist($usuario) {
    $query = "SELECT * FROM p5trp7m WHERE p5wnq8='".$usuario."' GROUP BY p5uss6";
    $db = new DB();
    $reply = $db->readAll($query);
    return $reply;
}