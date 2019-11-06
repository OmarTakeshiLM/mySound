<?php
require_once 'lib/perfil.php';

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
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <title> MySound</title>
        <link rel="stylesheet" href="resource/css/style.css">
		<link rel="stylesheet" href="resource/css/footer.css">
        <link rel="stylesheet" href="resource/css/icons.css">
		<link rel="stylesheet" href="resource/css/popupForm.css">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<link href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" rel="stylesheet">
    </head>

    <body>
        <header class="menu">
            <a href="index.php" class="logo">
                <h2>MySound</h2>
            </a>
            <nav class="options">
                <a class="ml" href="index.php">explorar</a>
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
        
        
		
		<!-- Información Usuario -->
		<div class="user-Info">
            
            <div class="profilePicture">
					<img src="<?php if(isset($data['u5wfj3'])){ echo $data['u5wfj3']; }else{  echo 'resource/images/defaultPicture.jpg';} ?>">
            </div>
			
			
			<textarea id="A" class="user-Info-input" disabled="true" spellcheck="false"><?php echo $nombreArtista[0] ?></textarea>
			
			<span>@<?php echo $_GET['artista']; ?></span>
			<button id="1-1" type="button" onclick="actualiza(this)" style="margin-left:125px; margin-top:10px; visibility:hidden;"><label class="lnr lnr-upload"></label></button>	
					
			<!--Nacionalidad -->
			<textarea id="B" class="user-Info-input" disabled="true" style="font-weight:normal;" spellcheck="false" ><?php echo $nacionalidad[0];?></textarea>
		
			<br><br>
		
			<span style="margin-left:10px;font-size:16px;font-family:'Open Sans','Roboto',sans-serif;">Biografía</span>  
		
			
			<textarea class="user-Biography" style="height:290px; width:230px;" disabled="true" spellcheck="false">
                <?php echo $biografia[0] ?>
			</textarea>
		
		</div>
		
		
		<!-- Tracks Usuario -->
        <h4 class="music-title" style="margin-top:-770px; margin-left:350px; font-weight:normal;">Tracks</h4>
		<div class="container-User-Tracks">
			<?php
				if($contT > 0) {
                    echo '<br>';
                    for($i=0;$i<$contT;$i++){
						echo '<br>
                        <div class="container-track-profile" style="margin-bottom: 1rem;">
                            <img style="object-fit: cover; width: 130px; height: 130px;" src="'.$arrayTracks[$i][4].'">
                            <div class="info-track-profile">
                                <h3>'.$arrayTracks[$i][0].'</h3>
                                <p>'.$arrayTracks[$i][5].'</p>
                                <i class="btn-play material-icons">play_arrow</i>
                                <input class="path" type="hidden" value="'.$arrayTracks[$i][3].'">
                            </div>
						</div>
						';
                    }
				}else { ?>
				<span style="color:#26283F;"><br><br>Aún no tiene tracks creados.</span>
			<?php } ?>
		</div>
		
		
		<!-- PlayList Usuario -->
		<h4 class="music-title" style="margin-top:-770px; margin-left:950px; font-weight:normal;">PlayList</h4>
        <div class="container-User-PlayList">
            <?php
            if($contP > 0){
                echo '<br>';
                for($i=0;$i<$contP;$i++){
                    echo '
                        <div class="container-playlist-profile" style="margin-top: 1rem;">
				            <div class="info-playlist-profile">
                                <h3>'.$arrayPlay[$i][0].'</h3>
                                <p>Tracks: '.$arrayPlay[$i][1].'</p>
                            </div>
                        </div>
                    ';
                }
            }else{
                echo '<span style="color:#26283F;"><br><br>Aún no tiene playlists creados.</span>';
            }
            ?>
            
            
		</div>
        
        
		<!-- Reproductor Música -->
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

		
		<!-- Copyright -->
		<div style="margin-bottom: 6rem;" id="copyright">
			<div class="container">
				<h2>CONTACTENOS</h2>
				LINEA DE ATENCIÓN: <a href="#" title="telefono movil">(+55) 3328120294</a> | CORREO: <a href="#" title="Correo electronico">viom2_team@hotmail.com</a><br/>
				COPYRIGHT © 2019
			</div>
		</div>
		
		<script src="resource/js/play.js"></script>
		<script>
			function actualiza(button) {
				var x = button.id;
				switch (x) {
					case '1':
						document.getElementById("1-1").style.visibility="visible";
						textArea = document.getElementById('A');
						textArea.disabled = false;
						break;
					case '2':
						document.getElementById("2-1").style.visibility="visible";
						textArea = document.getElementById('B');
						textArea.disabled = false;
						break;
					case '3':
						document.getElementById("3-1").style.visibility="visible";
						textArea = document.getElementById('C');
						textArea.disabled = false;
						break;
					case '1-1':
						document.getElementById("1-1").style.visibility="hidden";
						textArea = document.getElementById('A');
						textArea.disabled = true;
						break;
					case '2-1':
						document.getElementById("2-1").style.visibility="hidden";
						textArea = document.getElementById('B');
						textArea.disabled = true;
						break;
					case '3-1':
						document.getElementById("3-1").style.visibility="hidden";
						textArea = document.getElementById('C');
						textArea.disabled = true;
						break;
					default:
						return false;
				}
			}
		</script>
    </body>
</html>