<?php
require_once 'UserController.php';
session_start();
$active = false;
if(isset($_SESSION['idu'])) {
    $active = true;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Explorar - MySound</title>
    <link rel="stylesheet" href="resource/css/footer.css">
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
            <a class="ml seleccion" href="index.php">explorar</a>
            <a class="ml" href="MisionVision.php">¿Quiénes somos?</a>
            <a class="ml" href="faqs.php">FAQ'S</a>
            <?php
            if($active) {
            ?>
            <a class="ml" href="PerfilUsuario.php">Perfil</a>
				<a class="ml" href="logout.php">salir</a>
            <?php 
            }else {
            ?>
            <a class="ml" href="login.php">Acceso</a>
            <a class="ml btn-underline" href="registro.php">Registro</a>
            <?php } ?>
            
        </nav>
    </header>
    <form class="search-content">
        <input type="text" name="search" placeholder="Escribe aquí tu búsqueda" autocomplete="off">
        <button class="material-icons" type="submit">search</button>
    </form>
    <div class="tracks-group">
        <?php
            $tracks = obtenerTracksExplorer();
            foreach($tracks as $track) {
                // var_dump($track);
                echo '
                <div class="track">
                    <div class="disc" style="background-image: url('.$track->t5jds0.'); background-size: cover;"></div>
                    <div class="middle-info">
                        <h3>'.$track->t5prc4.'</h3>
                        <a href="#">'.$track->t5qwd7.'</a>
                        <i class="btn-play start material-icons">play_arrow</i>
                        <input class="path" type="hidden" value="'.$track->t5tlc3.'">
                    </div>
                    <div class="actions">
                        <i class="material-icons">album</i>
                        <i class="material-icons">album</i>
                        <i class="material-icons">album</i>
                        <i class="material-icons btn-add-playlist">playlist_add</i>
                        <input type="hidden" value="'.$track->t5isk2.'">
                    </div>
                </div>
                ';
            }
        ?>
    </div>
    <div class="music-control">
			<i class="material-icons">skip_previous</i>
			<i id="playStop" class="material-icons">play_arrow</i>
			<i class="material-icons">skip_next</i>
			<div class="progress"></div>
			<i id="volume-control" class="material-icons">volume_up</i>
			<audio id="reproductor"></audio>
			<div class="container-volume">
				<i id="volume-mute" class="material-icons">volume_muted</i>
				<div id="volume" class="volume-range"></div>
			</div>
		</div>
    <div class="back-modal" style="display: none;"></div>
    <div class="modal" style="display: none;">
        <h3>Añadir track a pLaylist</h3>
        <form method="post" id="form-crear">
            <input type="text" placeholder="Nombre de playlist" id="input-name-playlist" name="name-playlist">
            <button type="submit" id="btn-crear" name="btn-create-playlist">Crear</button>
        </form>
        <div class="container-list">
            <?php
                require_once 'audioController.php';
                $playlists = obtenerPlaylist($_SESSION['idu']);
                if($playlists) {
                    foreach($playlists as $playlist) {
                        echo '
                        <form method="POST" class="item-list" sytle="margin-bottom: 1rem;" id="formAddPlaylist">
                            '.$playlist->p5uss6.'
                            <input type="hidden" id="addNamePlay" value="'.$playlist->p5uss6.'" name="add-name-playlist">
                            <button id="addPlaylist" type="submit" name="add-track-playlist">Añadir</button>
                        </form>
                        ';
                    }
                }else {
                    echo '<span>Aun no tienes playlist creadas</span>';
                }
            ?>
        </div>
    </div>
    <!-- Copyright -->
    <div style="margin-bottom: 6rem;" id="copyright">
        <div class="container">
        <h2>CONTACTENOS</h2><hr/>
            LINEA DE ATENCIÓN: <a href="#" title="telefono movil">(+55) 3328120294</a> | CORREO: <a href="#" title="Correo electronico">viom2_team@hotmail.com</a><br/>
            COPYRIGHT © 2019
        </div>
    </div>
    <script src="resource/js/play.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <script src="resource/js/index-script.js"></script>
</body>
</html>