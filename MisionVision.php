<?php
session_start();
$active = false;
if(isset($_SESSION['idu'])) {
    $active = true;
}
?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
		<title>Explorar - MySound</title>
		<link rel="stylesheet" href="resource/css/footer.css">
		<link rel="stylesheet" href="resource/css/style2.css">
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
                <a class="seleccion ml" href="MisionVision.php">¿Quiénes somos?</a>
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

		<!-- Main -->
		<!-- Main -->
		<div id="main">
			<div class="container">
				<div class="row">

					<!-- Sidebar -->
						<div id="sidebar" class="3u">
							<section>
									<h2>SERVICIOS</h2>
								<p><a href="cuidamos.html" class="image full"><img src="resource/images/img-mision.svg" alt="" /></a>
								<p>Escucha la musica de artistas independientes y sube la tuya, y deja al mundo conocer tu propio arte.</p>
							</section>
						</div>
					<!-- Sidebar -->
				
					<!-- Content -->
						<div id="content" class="6u skel-cell-important">
							<section>
									<h2 style="font-size:32px; margin-bottom:30px;">MISION</h2>
								<p><a href="#" class="image full"><img src="resource/images/img-somos.svg" alt=""></a></p>
								<p>Ofrecer la oportunidad de subir y escuchar música de manera gratuita.</p>
							</section>
						</div>
					<!-- /Content -->
						
					<!-- Sidebar -->
						<div id="sidebar" class="3u" id="cuadro">
							<section>
									<h2>VISION</h2>
								<p><a href="cuidamos.html" class="image full"><img src="resource/images/img-vision.svg" alt="" /></a>
								<p>Ser la empresa número 1 a nivel mundial en servicios de streaming musical gratuito.</p>
								<ul class="default">
								</ul>
							</section>
						</div>
					<!-- Sidebar -->
				
				</div>
			
			</div>
		</div>

		<!-- Copyright -->
		<div id="copyright">
			<div class="container">
			<h2>CONTACTENOS</h2><hr/>
				LINEA DE ATENCIÓN: <a href="#" title="telefono movil">(+55) 3328120294</a> | CORREO: <a href="#" title="Correo electronico">viom2_team@hotmail.com</a><br/>
				COPYRIGHT © 2019
				
			</div>
		</div>
		<script src="resource/js/jquery.js"></script>
		<script src="resource/js/skel.min.js"></script>
		<script src="resource/js/skel-panels.min.js"></script>
		<script src="resource/js/init.js"></script>
	</body>
</html>