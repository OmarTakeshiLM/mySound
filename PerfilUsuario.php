<?php
require_once 'UserController.php';
session_start();
$data = obtenerInformacion($_SESSION['idu']);
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
				<a class="ml" href="MisionVision.html">¿Quiénes somos?</a>
				<a class="ml" href="faqs.html">FAQ'S</a>
				<a class="ml seleccion" href="PerfilUsuario.php">Perfil</a>
				<a class="ml" href="logout.php">salir</a>
            </nav>
        </header>
        
        
		
		<!-- Información Usuario -->
		<div class="user-Info">
		
			<img src="resource/images/headphones.jpg">
			</br>
			
			<textarea id="A" class="user-Info-input" disabled="true" spellcheck="false"><?php echo $data['u5hwo4'];?></textarea>
			<button id="1" type="button" onclick="actualiza(this)"><label class="lnr lnr-pencil"></label></button>	
			
			<span>@<?php echo $_SESSION['idu']; ?></span>
			<button id="1-1" type="button" onclick="actualiza(this)" style="margin-left:125px; margin-top:10px; visibility:hidden;"><label class="lnr lnr-upload"></label></button>	
					
			</br></br>
			
			<textarea id="B" class="user-Info-input" disabled="true" style="font-weight:normal;" spellcheck="false" ><?php echo $data['u5ybn4'];?></textarea>
			<button id="2" type="button" onclick="actualiza(this)"><label class="lnr lnr-pencil"></label></button>	
			<button id="2-1" type="button" onclick="actualiza(this)" style="margin-left:245px; margin-top:5px; visibility:hidden;"><label class="lnr lnr-upload"></label></button>	
		
			<br><br>
		
			<span style="margin-left:10px;font-size:16px;font-family:'Open Sans','Roboto',sans-serif;">Biografía</span>
			<button id="3" type="button" onclick="actualiza(this)"><label class="lnr lnr-pencil"></label></button>	
			<button id="3-1" type="button" onclick="actualiza(this)" style="margin-left:5px; margin-top:5px; visibility:hidden;"><label class="lnr lnr-upload"></label></button>	
		
			</br></br>
			
			<textarea id="C" class="user-Biography" style="font-size:15px;font-family:'Open Sans','Roboto',sans-serif;" spellcheck="false" disabled="true" >Hello World, my name is Joseph and I'm hopeful you enjoy my music. I'm really joy to share with you my music and my wich is to be hte greatest artist of rap.
			</textarea>
		
		</div>
		
		
		<!-- Tracks Usuario -->
		<div class="container-User-Tracks">
			<span class="music-title" style="float:left;">Tracks</span>
			</br></br></br>
			<?php
				$reply = obtenerTracks($_SESSION['idu']);
				if($reply) {
					echo '<a href="crear-audio.php">Crear track</a>';
					foreach ($reply as $track) {
						echo '
						<div class="container-track-profile" style="margin-top: 1rem;">
							<img src="'.$track->t5jds0.'">
							<div class="info-track-profile">
								<h3>'.$track->t5prc4.'</h3>
								<p>'.$track->t5zpw1.'</p>
								<i class="btn-play material-icons">play_arrow</i>
								<input class="path" type="hidden" value="'.$track->t5tlc3.'">
							</div>
						</div>
						';	
					}
				}else { ?>
				<span style="color:#26283F;">Aún no tienes tracks creados</span>
				<a href="crear-audio.php">Crea tu primer track</a>
			<?php } ?>
		</div>
		
		
		<!-- PlayList Usuario -->
		<div class="container-User-PlayList">
			<span class="music-title" style="float:left;">PlayLists</span>
			</br></br></br>
			<span style="color:#26283F;">Aún no tienes playlists creados</span>
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