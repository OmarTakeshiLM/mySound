<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title> MySound</title>
	<link rel="stylesheet" href="resource/css/footer.css">
    <link rel="stylesheet" href="resource/css/style.css">
    <link rel="stylesheet" href="resource/css/icons.css">
    <link rel="stylesheet" href="resource/css/fuente.css">
    <link rel="stylesheet" href="resource/css/animate.css">
	<style> .mt{margin-top:50px;} p{margin-top:15px}</style>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>



<header class="menu">
        <a href="index.html" class="logo">
            <h2>MySound</h2>
        </a>
        <nav class="options">
                <a class="ml" href="index.html">explorar</a>
                <a class="ml" href="MisionVision.html">¿Quiénes somos?</a>
                <a class="ml" href="faqs.html">FAQ'S</a>
				<a class="ml" href="login.php">Acceso</a>
                <a class="ml btn-underline" href="registro.html">Registro</a>
        </nav>
    </header>



<body>
    <div id="backgrounPlayList">

        <div id="lista">
            <style>
                /* Force scrollbars onto browser window */


                /*body {
                margin-bottom: 200%;
                }    Este es para el escroll de toda la pagina */ 
                
                /* Box styles */
                .myBox {
                    margin-top: 50px;
                    float: right;
                    border: none;
                    padding: 10px;
                    font: 24px/36px sans-serif;
                    width: 350px;
                    height:700px;
                    overflow: scroll;
                    background-color: rgb(255, 255, 255);
                }
                
                /* Scrollbar styles */
                ::-webkit-scrollbar {
                width: 12px;
                height: 12px;
                }
                
                ::-webkit-scrollbar-track {
                box-shadow: inset 0 0 10px #2F3559;
                border-radius: 10px;
                }
                
                ::-webkit-scrollbar-thumb {
                border-radius: 10px;
                background: #2F3559; 
                box-shadow: inset 0 0 6px rgba(0,0,0,0.5); 
                }
                
                ::-webkit-scrollbar-thumb:hover {
                background: #2F3559;
                }
                </style>


            <div class="myBox">
                <div class="textoAnimado2">
                    Lista de playlist
                </div>
            
            <br>
            <br>
            

                    <div class="espacioEnListaParaPlayList">
                        <div class="textoAnimado3">
                            Nombre de playlist   
                        </div>
                    </div>



        </div> 
    </div>  



        <div class="separadorInvisible2"></div>
        <div id="descripciontrack">
            <div class="separadorInvisible1"></div>
                <img src="resource/images/imagen_soundtrack.jpg" alt="imagen no cargada">
                <div class="textoAnimado">
                    <br>
                    <br>
                    <p class="animated fadeIn">Descripción del Track</p>
                    <p class="animated fadeIn">Aqui se pone toda la informacion de cada una de las pistas</p>
                </div>
        </div>
      
        
    </div>



</div>

    

</body>



<div class="music-control"> 
    <i class="material-icons">skip_previous</i>
    <i class="material-icons">play_arrow</i>
    <i class="material-icons">skip_next</i>
    <div class="progress"></div>
    <i class="material-icons">volume_up</i>
</div>




<div id="copyrightz">		
    CONTACTENOS
    LINEA DE ATENCIÓN: <a href="#" title="telefono movil">(+55) 3328120294</a> | CORREO: <a href="#" title="Correo electronico">viom2_team@hotmail.com</a><br/>
    COPYRIGHT © 2019 
</div>

    

</html>