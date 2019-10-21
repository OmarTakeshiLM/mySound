<?php
// session_start();
if(isset($_POST['btn_acceder'])) {
    // $_SESSION['account'] = $_POST['correo'];
    // header('Location: ');
    echo 'Consulta';
}
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <title> MySound</title>
        <link rel="stylesheet" href="resource/css/style.css">
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
				<a class="ml seleccion" href="login.php">Acceso</a>
                <a class="ml btn-underline" href="registro.php">Registro</a>
            </nav>
        </header>
        
        <div id="text" class="centrarInicioDeSesion" style="margin:10px 0px 0px 0px;">
            <h1>Acceso</h1>
        </div>
        
        <div class="centrarInicioDeSesion">
            <div class="container-form centrarInicioDeSesion">
                <form method="post" action="./lib/login.php" class="form" id="registro">

                    <!-- Campo correo-->
                    <div class="line-input">
                        <label class="lnr lnr-envelope"></label>
                        <input type="text" placeholder="Correo" name="correo">
                    </div>

                    <!-- Campo contraseña -->
                    <div class="line-input">
                        <label class="lnr lnr-lock"></label>
                        <input type="password" placeholder="Contraseña" name="pass">
                    </div>		

                    <button type="submit" name="btn_acceder">Iniciar Sesion <label class="lnr lnr-chevron-right"></label></button>

                </form>
            </div>
        </div>
		<img src="resource/images/wave_login.svg">
    </body>
</html>