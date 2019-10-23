<?php
    require_once 'audioController.php';
    session_start();
    if(!isset($_SESSION['idu'])) {
        header('Location: index.php');
    }
    $error = null;
    if(isset($_POST['btn-save'])) {
        $data = array(
            "idusuario" => $_SESSION['idu'],
            "audio" => $_FILES['archivo'],
            "portada" => $_FILES['portada'],
            "titulo" => $_POST['titulo'],
            "genero" => $_POST['genero'],
            "desc" => $_POST['desc']
        );
        $av = json_decode(audioValido($data['audio']));
        if($av->codigo == 200) {
            $iv = json_decode(imagenValida($data['portada']));
            if($iv->codigo == 200) {
                $cv = json_decode(camposValidos($data));
                if($cv->codigo == 200) {
                    guardarTrack($data);
                }else {
                    $error = $cv->mensaje;
                }
            }else {
                $error = $iv->mensaje;
            }
        }else {
            $error = $av->mensaje;
        }
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creación de audio</title>
    <link rel="stylesheet" href="resource/css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
    <header class="menu">
        <a href="index.php" class="logo">
            <h2>MySound</h2>
        </a>
        <nav class="options">
            <a class="ml" href="index.php">explorar</a>
            <a class="ml" href="MisionVision.html">¿quienes somos?</a>
            <a class="ml" href="faqs.html">faq</a>
            <a class="ml" href="PerfilUsuario.php">perfil</a>
            <a class="ml" href="logout.php">salir</a>
        </nav>
    </header>
    <p class="alert-error"><?php echo isset($error) ? $error : null; ?></p>
    <h1 class="center padded">Creación de música</h1>
    <form method="post" class="grid" enctype="multipart/form-data">
        <div class="file-audio">
            <input id="inputFileAudio" name="archivo" accept="audio/mp3, .wav" type="file">
            <span id="btnFileAudio" class="btn">Seleccionar archivo de audio</span>
            <label style="margin-left: 1rem">El tamaño maximo es de 5MB</label>
        </div>
        <div class="image">
            <img id="containerImage">
            <input id="inputImage" type="file" name="portada" accept="image/png, .jpeg, .jpg, image/gif">
            <span id="btnImage">Subir imagen</span>
        </div>
        <div class="inputs">
            <input type="text" id="inputTitulo" name="titulo" placeholder="Titulo">
            <select name="genero" id="">
                <option value="0">Genero</option>
                <option value="Pop">Pop</option>
                <option value="Rock">Rock</option>
                <option value="Electrónica">Electrónica</option>
                <option value="Reggae">Reggae</option>
                <option value="Instrumental">Instrumental</option>
            </select>
            <textarea cols="30" name="desc" rows="10" placeholder="Descripción"></textarea>
        </div>
        <button name="btn-save" class="btn-submit btn primary" type="submit">Guardar track</button>
    </form>

    <div class="music-control">
        <i class="material-icons">skip_previous</i>
        <i class="material-icons">play_arrow</i>
        <i class="material-icons">skip_next</i>
        <div class="progress"></div>
        <i class="material-icons">volume_up</i>
    </div>
    <script src="resource/js/main.js"></script>
</body>
</html>