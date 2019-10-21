<?php

	session_start();
	
	include('UserData.php');
	
	if(isset($_POST['btn_registrar'])) {
		
		$name = (isset($_POST['nombreUsuario'])) ? $_POST['nombreUsuario'] : null;
		$artistName = (isset($_POST['nombreArtistico'])) ? $_POST['nombreArtistico'] : null;
		$email = (isset($_POST['correo'])) ? $_POST['correo'] : null;
		$psw1 = (isset($_POST['password'])) ? $_POST['password'] : null;
		$psw2 = (isset($_POST['confirmedPassword'])) ? $_POST['confirmedPassword'] : null;
		$gender = (isset($_POST['sexo'])) ? $_POST['sexo'] : null;
		$countrie = (isset($_POST['pais'])) ? $_POST['pais'] : null;
    
		$musica = (isset($_POST['musica'])) ? $_POST['musica'] : 'off';
		$podcast = (isset($_POST['podcast'])) ? $_POST['podcast'] : 'off';
		$audiolibro = (isset($_POST['audiolibro'])) ? $_POST['audiolibro'] : 'off';
	
		$rock = (isset($_POST['musicaRock'])) ? $_POST['musicaRock'] : 'off';
		$pop = (isset($_POST['musicaPop'])) ? $_POST['musicaPop'] : 'off';
		$banda = (isset($_POST['musicaBanda'])) ? $_POST['musicaBanda'] : 'off';
		$comedia = (isset($_POST['podcastComedia'])) ? $_POST['podcastComedia'] : 'off';
		$sociedad = (isset($_POST['podcastSociedad'])) ? $_POST['podcastSociedad'] : 'off';
		$noticias = (isset($_POST['podcastNoticia'])) ? $_POST['podcastNoticia'] : 'off';
		$fantasia = (isset($_POST['libroFantasia'])) ? $_POST['libroFantasia'] : 'off';
		$ficcion = (isset($_POST['libroFiccion'])) ? $_POST['libroFiccion'] : 'off';
		$terror = (isset($_POST['libroTerror'])) ? $_POST['libroTerror'] : 'off';
		
		$info = array(
						"nombreUsuario" => $name,
						"nombreArtistico" => $artistName,
						"email" => $email,
						"pass1" => $psw1,
						"pass2" => $psw2,
						"genero" => $gender,
						"pais" => $countrie
					);
		
		$gustos = array(
						array("M",$musica,"Rock",$rock),
						array("M",$musica,"Pop",$pop),
						array("M",$musica,"Banda",$banda),
						array("P",$podcast,"Comedia",$comedia),
						array("P",$podcast,"Sociedad",$sociedad),
						array("P",$podcast,"Noticias",$noticias),
						array("L",$audiolibro,"Fantasía",$fantasia),
						array("L",$audiolibro,"Ciencia Ficción",$ficcion),
						array("L",$audiolibro,"Terror",$terror)
					);

		$mensaje = registrarUsuario($info,$gustos);
		if( $mensaje != '' ){
			echo "<span class='container-form1 mensajeAdvertencia' style='margin-left:720px; margin-top:510px;'> $mensaje</span> ";
		}
		
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
        <a href="index.html" class="logo">
            <h2>MySound</h2>
        </a>
        <nav class="options">
                <a class="ml seleccion" href="#">explorar</a>
				<a class="ml" href="MisionVision.html">¿Quiénes somos?</a>
				<a class="ml" href="faqs.html">FAQ'S</a>
				<a class="ml" href="login.php">Acceso</a>
				<a class="ml btn-underline" href="registro.php">Registro</a>
				<a class="ml" href="PerfilUsuario.html">Perfil</a>
        </nav>
    </header>
	
	
	<div id="text" class="centrarInicioDeSesion" style="margin:50px 0px 0px 540px;">
		<h1>Registro</h1>
	</div>

	
	<div class="container-form1">
		<form method="post" id="registro">
            
			
			<!-- Campo nombre -->
			<div class="line-input" style="width: 290px; height:35px;">
                <label class="lnr lnr-user"></label>
                <input type="text" placeholder="Nombre Usuario" name="nombreUsuario" value="<?php echo isset($_POST['nombreUsuario']) ? $_POST['nombreUsuario'] : ''; ?>">
				<label style="color:red;">*</label>
			</div>

			<!-- Campo correo-->
			<div class="line-input" style="width: 290px; height:35px;">
			    <label class="lnr lnr-envelope"></label>
                <input type="email" placeholder="Correo     Ej. patatas@gmail.com" name="correo" value="<?php echo isset($_POST['correo']) ? $_POST['correo'] : ''; ?>">
				<label style="color:red;">*</label>
			</div>
			
			
			<!-- Campo contraseña -->
            <div class="line-input" style="width: 290px; height:35px;">
                <label class="lnr lnr-lock"></label>
                <input type="password" placeholder="Contraseña" name="password">
				<label style="color:red;">*</label>
			</div>
			
			<!-- Campo confirmación contraseña -->
            <div class="line-input" style="width: 290px; height:35px;">
                <label class="lnr lnr-lock"></label>
                <input type="password" placeholder="Confirmar contraseña" name="confirmedPassword" >
				<label style="color:red;">*</label>
			</div>
			
			
			</br></br></br>
			
			<!-- Campo nombre artístico -->
			
			<div class="line-input" style="width: 290px; height:35px;">
                <label class="lnr lnr-heart"></label>
				<label style="color:#26283F; margin-left:15px;">@</label>
                <input type="text" placeholder="Nombre Artístico" id="nombreArtistico" name="nombreArtistico" value="<?php echo isset($_POST['nombreArtistico']) ? $_POST['nombreArtistico'] : ''; ?>">
				<label style="color:red;">*</label>
			</div>
			
			<!-- Campo sexo -->
			<div class="line-input" style="width: 400px; height:65px;">
			
				<label class="lnr lnr-smile"></label>
				<span class="label-input1">¿Cuál es tu sexo? <label style="color:red;">*</label></span>
				

				<div>
					<span class="label-input1">Masculino</span>
					<input  id="radio1" type="radio" name="sexo" value="hombre" >
				</div>

				<div>
					<span class="label-input1">Femenino</span>
					<input id="radio2" type="radio" name="sexo" value="mujer">
				</div>

			</div>	

			<!-- Campo pais -->
			<div class="line-input" style="width: 500px; height:65px;">
				
				<label class="lnr lnr-flag"></label>
				<span class="label-input1">¿De qué país eres? <label style="color:red;">*</label></span>
				
				
				<select class="countrie-list" id="countrie" name="pais">
				
	<option value="" selected></option>
	<option value="Afghanistan">Afghanistan</option>
	<option value="Albania">Albania</option>
    <option value="Algeria">Algeria</option>
    <option value="American Samoa">American Samoa</option>
    <option value="Andorra">Andorra</option>
    <option value="Angola">Angola</option>
    <option value="Anguilla">Anguilla</option>
    <option value="Antartica">Antarctica</option>
    <option value="Antigua and Barbuda">Antigua and Barbuda</option>
    <option value="Argentina">Argentina</option>
    <option value="Armenia">Armenia</option>
    <option value="Aruba">Aruba</option>
    <option value="Australia">Australia</option>
    <option value="Austria">Austria</option>
    <option value="Azerbaijan">Azerbaijan</option>
    <option value="Bahamas">Bahamas</option>
    <option value="Bahrain">Bahrain</option>
    <option value="Bangladesh">Bangladesh</option>
    <option value="Barbados">Barbados</option>
    <option value="Belarus">Belarus</option>
    <option value="Belgium">Belgium</option>
    <option value="Belize">Belize</option>
    <option value="Benin">Benin</option>
    <option value="Bermuda">Bermuda</option>
    <option value="Bhutan">Bhutan</option>
    <option value="Bolivia">Bolivia</option>
    <option value="Bosnia and Herzegowina">Bosnia and Herzegowina</option>
    <option value="Botswana">Botswana</option>
    <option value="Bouvet Island">Bouvet Island</option>
    <option value="Brazil">Brazil</option>
    <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
    <option value="Brunei Darussalam">Brunei Darussalam</option>
    <option value="Bulgaria">Bulgaria</option>
    <option value="Burkina Faso">Burkina Faso</option>
    <option value="Burundi">Burundi</option>
    <option value="Cambodia">Cambodia</option>
    <option value="Cameroon">Cameroon</option>
    <option value="Canada">Canada</option>
    <option value="Cape Verde">Cape Verde</option>
    <option value="Cayman Islands">Cayman Islands</option>
    <option value="Central African Republic">Central African Republic</option>
    <option value="Chad">Chad</option>
    <option value="Chile">Chile</option>
    <option value="China">China</option>
    <option value="Christmas Island">Christmas Island</option>
    <option value="Cocos Islands">Cocos (Keeling) Islands</option>
    <option value="Colombia">Colombia</option>
    <option value="Comoros">Comoros</option>
    <option value="Congo">Congo</option>
    <option value="Congo">Congo, the Democratic Republic of the</option>
    <option value="Cook Islands">Cook Islands</option>
    <option value="Costa Rica">Costa Rica</option>
    <option value="Cota D'Ivoire">Cote d'Ivoire</option>
    <option value="Croatia">Croatia (Hrvatska)</option>
    <option value="Cuba">Cuba</option>
    <option value="Cyprus">Cyprus</option>
    <option value="Czech Republic">Czech Republic</option>
    <option value="Denmark">Denmark</option>
    <option value="Djibouti">Djibouti</option>
    <option value="Dominica">Dominica</option>
    <option value="Dominican Republic">Dominican Republic</option>
    <option value="East Timor">East Timor</option>
    <option value="Ecuador">Ecuador</option>
    <option value="Egypt">Egypt</option>
    <option value="El Salvador">El Salvador</option>
    <option value="Equatorial Guinea">Equatorial Guinea</option>
    <option value="Eritrea">Eritrea</option>
    <option value="Estonia">Estonia</option>
    <option value="Ethiopia">Ethiopia</option>
    <option value="Falkland Islands">Falkland Islands (Malvinas)</option>
    <option value="Faroe Islands">Faroe Islands</option>
    <option value="Fiji">Fiji</option>
    <option value="Finland">Finland</option>
    <option value="France">France</option>
    <option value="France Metropolitan">France, Metropolitan</option>
    <option value="French Guiana">French Guiana</option>
    <option value="French Polynesia">French Polynesia</option>
    <option value="French Southern Territories">French Southern Territories</option>
    <option value="Gabon">Gabon</option>
    <option value="Gambia">Gambia</option>
    <option value="Georgia">Georgia</option>
    <option value="Germany">Germany</option>
    <option value="Ghana">Ghana</option>
    <option value="Gibraltar">Gibraltar</option>
    <option value="Greece">Greece</option>
    <option value="Greenland">Greenland</option>
    <option value="Grenada">Grenada</option>
    <option value="Guadeloupe">Guadeloupe</option>
    <option value="Guam">Guam</option>
    <option value="Guatemala">Guatemala</option>
    <option value="Guinea">Guinea</option>
    <option value="Guinea-Bissau">Guinea-Bissau</option>
    <option value="Guyana">Guyana</option>
    <option value="Haiti">Haiti</option>
    <option value="Heard and McDonald Islands">Heard and Mc Donald Islands</option>
    <option value="Holy See">Holy See (Vatican City State)</option>
    <option value="Honduras">Honduras</option>
    <option value="Hong Kong">Hong Kong</option>
    <option value="Hungary">Hungary</option>
    <option value="Iceland">Iceland</option>
    <option value="India">India</option>
    <option value="Indonesia">Indonesia</option>
    <option value="Iran">Iran (Islamic Republic of)</option>
    <option value="Iraq">Iraq</option>
    <option value="Ireland">Ireland</option>
    <option value="Israel">Israel</option>
    <option value="Italy">Italy</option>
    <option value="Jamaica">Jamaica</option>
    <option value="Japan">Japan</option>
    <option value="Jordan">Jordan</option>
    <option value="Kazakhstan">Kazakhstan</option>
    <option value="Kenya">Kenya</option>
    <option value="Kiribati">Kiribati</option>
    <option value="Democratic People's Republic of Korea">Korea, Democratic People's Republic of</option>
    <option value="Korea">Korea, Republic of</option>
    <option value="Kuwait">Kuwait</option>
    <option value="Kyrgyzstan">Kyrgyzstan</option>
    <option value="Lao">Lao People's Democratic Republic</option>
    <option value="Latvia">Latvia</option>
    <option value="Lebanon">Lebanon</option>
    <option value="Lesotho">Lesotho</option>
    <option value="Liberia">Liberia</option>
    <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
    <option value="Liechtenstein">Liechtenstein</option>
    <option value="Lithuania">Lithuania</option>
    <option value="Luxembourg">Luxembourg</option>
    <option value="Macau">Macau</option>
    <option value="Macedonia">Macedonia, The Former Yugoslav Republic of</option>
    <option value="Madagascar">Madagascar</option>
    <option value="Malawi">Malawi</option>
    <option value="Malaysia">Malaysia</option>
    <option value="Maldives">Maldives</option>
    <option value="Mali">Mali</option>
    <option value="Malta">Malta</option>
    <option value="Marshall Islands">Marshall Islands</option>
    <option value="Martinique">Martinique</option>
    <option value="Mauritania">Mauritania</option>
    <option value="Mauritius">Mauritius</option>
    <option value="Mayotte">Mayotte</option>
    <option value="Mexico">Mexico</option>
    <option value="Micronesia">Micronesia, Federated States of</option>
    <option value="Moldova">Moldova, Republic of</option>
    <option value="Monaco">Monaco</option>
    <option value="Mongolia">Mongolia</option>
    <option value="Montserrat">Montserrat</option>
    <option value="Morocco">Morocco</option>
    <option value="Mozambique">Mozambique</option>
    <option value="Myanmar">Myanmar</option>
    <option value="Namibia">Namibia</option>
    <option value="Nauru">Nauru</option>
    <option value="Nepal">Nepal</option>
    <option value="Netherlands">Netherlands</option>
    <option value="Netherlands Antilles">Netherlands Antilles</option>
    <option value="New Caledonia">New Caledonia</option>
    <option value="New Zealand">New Zealand</option>
    <option value="Nicaragua">Nicaragua</option>
    <option value="Niger">Niger</option>
    <option value="Nigeria">Nigeria</option>
    <option value="Niue">Niue</option>
    <option value="Norfolk Island">Norfolk Island</option>
    <option value="Northern Mariana Islands">Northern Mariana Islands</option>
    <option value="Norway">Norway</option>
    <option value="Oman">Oman</option>
    <option value="Pakistan">Pakistan</option>
    <option value="Palau">Palau</option>
    <option value="Panama">Panama</option>
    <option value="Papua New Guinea">Papua New Guinea</option>
    <option value="Paraguay">Paraguay</option>
    <option value="Peru">Peru</option>
    <option value="Philippines">Philippines</option>
    <option value="Pitcairn">Pitcairn</option>
    <option value="Poland">Poland</option>
    <option value="Portugal">Portugal</option>
    <option value="Puerto Rico">Puerto Rico</option>
    <option value="Qatar">Qatar</option>
    <option value="Reunion">Reunion</option>
    <option value="Romania">Romania</option>
    <option value="Russia">Russian Federation</option>
    <option value="Rwanda">Rwanda</option>
    <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option> 
    <option value="Saint LUCIA">Saint LUCIA</option>
    <option value="Saint Vincent">Saint Vincent and the Grenadines</option>
    <option value="Samoa">Samoa</option>
    <option value="San Marino">San Marino</option>
    <option value="Sao Tome and Principe">Sao Tome and Principe</option> 
    <option value="Saudi Arabia">Saudi Arabia</option>
    <option value="Senegal">Senegal</option>
    <option value="Seychelles">Seychelles</option>
    <option value="Sierra">Sierra Leone</option>
    <option value="Singapore">Singapore</option>
    <option value="Slovakia">Slovakia (Slovak Republic)</option>
    <option value="Slovenia">Slovenia</option>
    <option value="Solomon Islands">Solomon Islands</option>
    <option value="Somalia">Somalia</option>
    <option value="South Africa">South Africa</option>
    <option value="South Georgia">South Georgia and the South Sandwich Islands</option>
    <option value="Span">Spain</option>
    <option value="SriLanka">Sri Lanka</option>
    <option value="St. Helena">St. Helena</option>
    <option value="St. Pierre and Miguelon">St. Pierre and Miquelon</option>
    <option value="Sudan">Sudan</option>
    <option value="Suriname">Suriname</option>
    <option value="Svalbard">Svalbard and Jan Mayen Islands</option>
    <option value="Swaziland">Swaziland</option>
    <option value="Sweden">Sweden</option>
    <option value="Switzerland">Switzerland</option>
    <option value="Syria">Syrian Arab Republic</option>
    <option value="Taiwan">Taiwan, Province of China</option>
    <option value="Tajikistan">Tajikistan</option>
    <option value="Tanzania">Tanzania, United Republic of</option>
    <option value="Thailand">Thailand</option>
    <option value="Togo">Togo</option>
    <option value="Tokelau">Tokelau</option>
    <option value="Tonga">Tonga</option>
    <option value="Trinidad and Tobago">Trinidad and Tobago</option>
    <option value="Tunisia">Tunisia</option>
    <option value="Turkey">Turkey</option>
    <option value="Turkmenistan">Turkmenistan</option>
    <option value="Turks and Caicos">Turks and Caicos Islands</option>
    <option value="Tuvalu">Tuvalu</option>
    <option value="Uganda">Uganda</option>
    <option value="Ukraine">Ukraine</option>
    <option value="United Arab Emirates">United Arab Emirates</option>
    <option value="United Kingdom">United Kingdom</option>
    <option value="United States">United States</option>
    <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
    <option value="Uruguay">Uruguay</option>
    <option value="Uzbekistan">Uzbekistan</option>
    <option value="Vanuatu">Vanuatu</option>
    <option value="Venezuela">Venezuela</option>
    <option value="Vietnam">Viet Nam</option>
    <option value="Virgin Islands (British)">Virgin Islands (British)</option>
    <option value="Virgin Islands (U.S)">Virgin Islands (U.S.)</option>
    <option value="Wallis and Futana Islands">Wallis and Futuna Islands</option>
    <option value="Western Sahara">Western Sahara</option>
    <option value="Yemen">Yemen</option>
    <option value="Yugoslavia">Yugoslavia</option>
    <option value="Zambia">Zambia</option>
    <option value="Zimbabwe">Zimbabwe</option>
			</select>
				
			</div>
			
			</br></br></br></br>
		
			<!-- Campo tipo track gusto -->
			<div class="line-input" style="width: 450px; height:100px;">
				
				<div>
					<label class="lnr lnr-list"></label>
					<span class="label-input1">¿En qué estás interesado escuchar? <br></br></span>
				</div>
				
				<fieldset class="config-Field">
					<div>
						<span class="label-input1">Música</span>
						<input class="config2" type="checkbox" id="musica" name="musica">
					</div>
				</fieldset>
				
				<fieldset class="config-Field">
					<div>
						<span class="label-input1">Podcasts</span>
						<input class="config2" type="checkbox"  id="podcast" name="podcast">
					</div>
				</fieldset>
				
				<fieldset class="config-Field">
					<div>
						<span class="label-input1">Audio Libros</span>
						<input class="config2" type="checkbox" id="audiolibro" name="audiolibro">
					</div>
				</fieldset>
				
			</div>
            	
			<!-- Campo gusto por track -->
			<div class="line-input"  style="width: 750px; height:100px;">
				
				<div>
					<label class="lnr lnr-list"></label>
					<span id="gustos" class="label-input1">Selecciona los gustos de tu agrado <br></br></span>
				</div>
			
				
				<fieldset class="line-boxes config-Field">
				<div>
					<span class="label-input1"  >Rock</span>
					<input id="disabled1" disabled="true" type="checkbox" name="musicaRock" >
				</div>
			
				<div>
					<span class="label-input1"  >Pop</span>
					<input id="disabled2" disabled="true" type="checkbox" name="musicaPop" >
				</div>
				</fieldset>
			
				<fieldset class="line-boxes config-Field">
				<div>
					<span class="label-input1"  >Banda</span>
					<input id="disabled3" disabled="true" type="checkbox" name="musicaBanda" >
				</div>
				
				<div>
					<span class="label-input1"  >Comedia</span>
					<input id="disabled4" disabled="true" type="checkbox" name="podcastComedia">
				</div>
				</fieldset>
			
				<fieldset class="line-boxes config-Field">
				<div>
					<span class="label-input1"  >Sociedad</span>
					<input id="disabled5" disabled="true" type="checkbox" name="podcastSociedad" >
				</div>
			
				<div>
					<span class="label-input1"  >Noticias</span>
					<input id="disabled6" disabled="true" type="checkbox" name="podcastNoticia" >
				</div>
				</fieldset>
				
				<fieldset class="line-boxes config-Field">
				<div >
					<span class="label-input1"  >Fantasía</span>
					<input id="disabled7" disabled="true" type="checkbox" name="libroFantasia">
				</div>
			
				<div>
					<span class="label-input1"  >Ciencia Ficción</span>
					<input id="disabled8" disabled="true" type="checkbox" name="libroFiccion">
				</div>
				</fieldset>
			
				<div>
					<span class="label-input1"  >Terror</span>
					<input id="disabled9" disabled="true" type="checkbox" name="libroTerror">
				</div>
				
			</div>

			</br></br></br></br></br></br></br>
			
			<button class="button-form" type="submit" style="font-size: 14px; margin-left: 400px; margin-top: 10px;" name="btn_registrar"> Registrar<label class="lnr lnr-chevron-right"></label></button>
			
			
			
        </form>
    </div>
    
    
	<script src="resource/js/jquery.js"></script>
    <script src="resource/js/script.js"></script>
	
	
	<script>
	
		$("#musica").click(function () {
            if ($(this).is(":checked")) {
                $("#disabled1").attr('disabled', false);$("#disabled2").attr('disabled', false);$("#disabled3").attr('disabled', false);
            } else {
                $("#disabled1").attr('disabled', true);$("#disabled2").attr('disabled', true);$("#disabled3").attr('disabled', true);
				$("input[name='musicaRock']:checkbox").prop('checked',false);$("input[name='musicaPop']:checkbox").prop('checked',false);$("input[name='musicaBanda']:checkbox").prop('checked',false);
			}
        });
		$("#podcast").click(function () {
            if ($(this).is(":checked")) {
				$("#disabled4").attr('disabled', false);$("#disabled5").attr('disabled', false);$("#disabled6").attr('disabled', false);
            } else {
                $("#disabled4").attr('disabled', true);$("#disabled5").attr('disabled', true);$("#disabled6").attr('disabled', true);
				$("input[name='podcastComedia']:checkbox").prop('checked',false);$("input[name='podcastNoticia']:checkbox").prop('checked',false);$("input[name='podcastSociedad']:checkbox").prop('checked',false);
			}
        });
		$("#audiolibro").click(function () {
            if ($(this).is(":checked")) {
                $("#disabled7").attr('disabled', false);$("#disabled8").attr('disabled', false);$("#disabled9").attr('disabled', false);
            } else {
                $("#disabled7").attr('disabled', true);$("#disabled8").attr('disabled', true);$("#disabled9").attr('disabled', true);
				$("input[name='libroFantasia']:checkbox").prop('checked',false);$("input[name='libroFiccion']:checkbox").prop('checked',false);$("input[name='libroTerror']:checkbox").prop('checked',false);
			}
        });

		document.getElementById("nombreArtistico").onkeypress = function(e) {
			var chr = String.fromCharCode(e.which);
			if (" ´!#$%&'()*+,-./:;<=>?@[\]^_`{|}~ /\"/".indexOf(chr) >= 0){
				alert(" !#$%&'()*+,-./:;<=>?@[\]^_`{|}~ /\"/: Estos caracteres son inválidos");
				return false;
			}
		};


	</script>
	
	<img src="resource/images/wave_login.svg">
</body>

</html>