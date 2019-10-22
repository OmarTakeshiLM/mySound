<?php
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
	<link rel="stylesheet" href="resource/css/footer.css">
    <link rel="stylesheet" href="resource/css/style.css">
	<link rel="stylesheet" href="resource/css/icons.css">
	<style> .mt{margin-top:50px;} p{margin-top:15px}</style>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700&display=swap" rel="stylesheet">
</head>

<body>

    <header class="menu">
        <a href="index.php" class="logo">
            <h2>MySound</h2>
        </a>
        <nav class="options">
                <a class="ml" href="index.php">explorar</a>
                <a class="ml" href="MisionVision.php">¿Quiénes somos?</a>
                <a class="ml seleccion" href="faqs.php">FAQ'S</a>
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
    
    <h1 class="ml mt">Bienvenido, aquí podrás encontrar ayuda a preguntas frecuentes</h1>
	<ul style="margin-left:100px; list-style:none">
		<li><h2 class="mt">¿Cómo registrarme?</h2></li>

		<p class="ml">Para poder crear una cuenta, deberás acceder al apartado "Iniciar sesión o Registrarse", y a continuación seguir los pasos que se indiquen.</p>

		<li><h2 class="mt">¿Cómo escuchar música?</h2></li>

		<p class="ml">Una vez creada una cuenta, puedes acceder a la opción "subir track" y llenar los formularios correspondientes.</p>

		<li><h2 class="mt">¿Cómo subir música?</h2></li>
		
		<p class="ml">Una vez creada una cuenta, puedes acceder a la opción "subir track" y llenar los formularios correspondientes.</p>
	</ul>
	
    <!-- Copyright -->
		<div id="copyright">
			<div class="container">
			<h2>CONTACTENOS</h2><hr/>
				LINEA DE ATENCIÓN: <a href="#" title="telefono movil">(+55) 3328120294</a> | CORREO: <a href="#" title="Correo electronico">viom2_team@hotmail.com</a><br/>
				COPYRIGHT © 2019
				
			</div>
		</div>
</body>
</html>