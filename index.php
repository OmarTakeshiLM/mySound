<?php
require_once 'UserController.php';
require_once 'lib/busqueda.php';

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
    <form class="search-content" method="get" action="index.php">
        <input type="text" name="search" placeholder="Buscar artista, canción o género." autocomplete="off" style="border-bottom: 1px solid #B4B0AF;">
        <button class="material-icons" type="submit">search</button>
        <p style="font-size:12px; color: RGBA(55,55,55,.5);">Ejemplo de búsqueda por género: Pop,Rock,Electónica,Reggae, Instrumental,etc</p>
    </form>
    <div class="tracks-group">
        <?php       
            $resultados = count($tracks);
            if($resultados>0){
                for($i=0;$i<$cont;$i++){
                    // var_dump($track); t5tlc3 es la direccion     |   t5isk2 es la playlist
                    echo '
                    <div class="track">
                        <div class="disc" style="background-image: url('.$tracks[$i][0].'); background-size: cover;"></div>
                        <div class="middle-info">
                            <h3>'.$tracks[$i][1].'</h3>
                            <p style="cursor : pointer " onclick="perfil(this)">'.$tracks[$i][2].'</p>
                            <i class="btn-play start material-icons">play_arrow</i>
                            <input class="path" type="hidden" value="'.$tracks[$i][3].'">
                        </div>
                        <div class="actions">
                            <i class="material-icons">album</i>
                            <i class="material-icons">album</i>
                            <i class="material-icons">album</i>
                            <i class="material-icons btn-add-playlist">playlist_add</i>
                            <input type="hidden" value="'.$tracks[$i][4].'">
                        </div>
                    </div>
                    ';
                }
            }else{
                echo "<h3>Sin resultados encontrados</h3>";
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
        <?php if(isset($_SESSION['idu'])) { ?>
        <form method="post" id="form-crear">
            <input type="text" placeholder="Nombre de playlist" id="input-name-playlist" name="name-playlist">
            <button type="submit" id="btn-crear" name="btn-create-playlist">Crear</button>
        </form>
        <?php } ?>
        <div class="container-list">
            <?php
                if(isset($_SESSION['idu'])) {
                    require_once 'audioController.php';
                    $playlists = obtenerPlaylist($_SESSION['idu']);
                    if($playlists) {
                        foreach($playlists as $playlist) {
                            echo '
                            <form method="POST" class="item-list" sytle="margin-bottom: 1rem;" class="formAddPlaylist">
                                <p>'.$playlist->p5uss6.'</p>
                                <input type="hidden" class="addsNamePlay" value="'.$playlist->p5uss6.'" name="add-name-playlist">
                                <button class="addPlaylist" type="submit" name="add-track-playlist">Añadir</button>
                            </form>
                            ';
                        }
                    }else {
                        echo '<span>Aun no tienes playlist creadas</span>';
                    }
                }else {
                    echo '<p><a href="login.php">Accede</a> a tu cuenta para poder crear playlists.</p>';
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