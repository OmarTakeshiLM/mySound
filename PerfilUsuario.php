<?php
	
	require_once 'UserController.php';
	session_start();
	$active = false;
	if(isset($_SESSION['idu'])) {
		$active = true;	
	}else {
		header('Location: index.php');
	}
	$data = obtenerInformacion($_SESSION['idu']);
	
?>

<!DOCTYPE html>
<html lang="es" id="userprofile">
    
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
				
						echo "<a class='ml' href='PerfilUsuario.php'>Perfil</a>";
						echo "<a class='ml' href='logout.php'>salir</a>";
				
					}else {
						echo "<a class='ml' href='login.php'>Acceso</a>";
						echo "<a class='ml btn-underline' href='registro.php'>Registro</a>";
					} 
				?>
            </nav>
        </header>
        
        <!-- Información Usuario -->
		
			
			<div class="user-Info">
		
				
				<?php
					if (isset($_POST['updateName'])) {
						actualizaInformacionUsuario($_SESSION['idu'],'2',htmlspecialchars($_POST['update1']));
						echo "<meta http-equiv='refresh' content='0'>";
					}
					if (isset($_POST['updateArtist'])) {
						actualizaInformacionUsuario($_SESSION['idu'],'1',htmlspecialchars($_POST['update2']));
						echo "<meta http-equiv='refresh' content='0'>";
					}
					if (isset($_POST['updateCountrie'])) {
						actualizaInformacionUsuario($_SESSION['idu'],'7',htmlspecialchars($_POST['update3']));
						echo "<meta http-equiv='refresh' content='0'>";
					}
					if (isset($_POST['updateBiography'])) {
						actualizaInformacionUsuario($_SESSION['idu'],'6',htmlspecialchars($_POST['update4']));
						echo "<meta http-equiv='refresh' content='0'>";
					}
				?>
				
				<div class="profilePicture">
					<img src="<?php if($data['u5wfj3']){ echo $data['u5wfj3']; }else{  echo 'resource/images/defaultPicture.jpg';} ?>">
				</div>
				
				</br>
			
				<textarea disabled="true" spellcheck="false"> <?php echo $data['u5hwo4'] ?> </textarea>
				<button id="btn-abrir-popup1" type="button" title="Editar"><label class="lnr lnr-pencil"></label></button>	
						
				<div class="overlay" id="overlay1">
					<div class="popup" id="popup1">
						<a id="btn-cerrar-popup1" class="btn-cerrar-popup"><i class="fas fa-times"></i></a>
						</br>
						<form method="POST">
							<div class="contenedor-inputs">
								<input name="update1" type="text" placeholder="Ingresa el nombre">
							</div>
							<input id="A" name="updateName" type="submit" class="btn-submit" value="Guardar Nombre">
						</form>
					</div>
				</div>
				
				</br>
				
				<textarea class="user-Info-input" disabled="true" style="font-weight: bold;" spellcheck="false">@<?php echo $_SESSION['idu'] ?> </textarea>
				<button id="btn-abrir-popup2" type="button" title="Editar"><label class="lnr lnr-pencil"></label></button>	
						
				<div class="overlay" id="overlay2">
					<div class="popup" id="popup2">
						<a id="btn-cerrar-popup2" class="btn-cerrar-popup"><i class="fas fa-times"></i></a>
						</br>
						<form method="POST">
							<div class="contenedor-inputs">
								<input name="update2" type="text" placeholder="Ingresa el nombre artístico">
							</div>
							<input id="B" name="updateArtist" type="submit" class="btn-submit" value="Guardar Nombre">
						</form>
					</div>
				</div>
				
				
				</br>
				
				
				<textarea class="user-Info-area" disabled="true" spellcheck="false" style="margin-top:20px;"><?php echo $data['u5ybn4'] ?></textarea>
				<button id="btn-abrir-popup3" type="button" title="Editar" style="margin-top:25px;"><label class="lnr lnr-pencil"></label></button>	
						
				<div class="overlay" id="overlay3">
					<div class="popup" id="popup3">
						<a id="btn-cerrar-popup3" class="btn-cerrar-popup"><i class="fas fa-times"></i></a>
						</br>
						<form method="post">
							<div class="contenedor-inputs">
								<label>Seleccione el país</label>
								<select name="update3" style="width:400px" id="countrie">
										<option value="<?php echo $data['u5ybn4'] ?>"> <?php echo $data['u5ybn4'] ?></option>
										<option value="Afganistan">Afghanistan</option>
										<option value="Albania">Albania</option>
										<option value="Algeria">Algeria</option>
										<option value="American Samoa">American Samoa</option>
										<option value="Andorra">Andorra</option>
										<option value="Angola">Angola</option>
										<option value="Anguilla">Anguilla</option>
										<option value="Antigua & Barbuda">Antigua & Barbuda</option>
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
										<option value="Bonaire">Bonaire</option>
										<option value="Bosnia & Herzegovina">Bosnia & Herzegovina</option>
										<option value="Botswana">Botswana</option>
										<option value="Brazil">Brazil</option>
										<option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
										<option value="Brunei">Brunei</option>
										<option value="Bulgaria">Bulgaria</option>
										<option value="Burkina Faso">Burkina Faso</option>
										<option value="Burundi">Burundi</option>
										<option value="Cambodia">Cambodia</option>
										<option value="Cameroon">Cameroon</option>
										<option value="Canada">Canada</option>
										<option value="Canary Islands">Canary Islands</option>
										<option value="Cape Verde">Cape Verde</option>
										<option value="Cayman Islands">Cayman Islands</option>
										<option value="Central African Republic">Central African Republic</option>
										<option value="Chad">Chad</option>
										<option value="Channel Islands">Channel Islands</option>
										<option value="Chile">Chile</option>
										<option value="China">China</option>
										<option value="Christmas Island">Christmas Island</option>
										<option value="Cocos Island">Cocos Island</option>
										<option value="Colombia">Colombia</option>
										<option value="Comoros">Comoros</option>
										<option value="Congo">Congo</option>
										<option value="Cook Islands">Cook Islands</option>
										<option value="Costa Rica">Costa Rica</option>
										<option value="Cote DIvoire">Cote DIvoire</option>
										<option value="Croatia">Croatia</option>
										<option value="Cuba">Cuba</option>
										<option value="Curaco">Curacao</option>
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
										<option value="Falkland Islands">Falkland Islands</option>
										<option value="Faroe Islands">Faroe Islands</option>
										<option value="Fiji">Fiji</option>
										<option value="Finland">Finland</option>
										<option value="France">France</option>
										<option value="French Guiana">French Guiana</option>
										<option value="French Polynesia">French Polynesia</option>
										<option value="French Southern Ter">French Southern Ter</option>
										<option value="Gabon">Gabon</option>
										<option value="Gambia">Gambia</option>
										<option value="Georgia">Georgia</option>
										<option value="Germany">Germany</option>
										<option value="Ghana">Ghana</option>
										<option value="Gibraltar">Gibraltar</option>
										<option value="Great Britain">Great Britain</option>
										<option value="Greece">Greece</option>
										<option value="Greenland">Greenland</option>
										<option value="Grenada">Grenada</option>
										<option value="Guadeloupe">Guadeloupe</option>
										<option value="Guam">Guam</option>
										<option value="Guatemala">Guatemala</option>
										<option value="Guinea">Guinea</option>
										<option value="Guyana">Guyana</option>
										<option value="Haiti">Haiti</option>
										<option value="Hawaii">Hawaii</option>
										<option value="Honduras">Honduras</option>
										<option value="Hong Kong">Hong Kong</option>
										<option value="Hungary">Hungary</option>
										<option value="Iceland">Iceland</option>
										<option value="Indonesia">Indonesia</option>
										<option value="India">India</option>
										<option value="Iran">Iran</option>
										<option value="Iraq">Iraq</option>
										<option value="Ireland">Ireland</option>
										<option value="Isle of Man">Isle of Man</option>
										<option value="Israel">Israel</option>
										<option value="Italy">Italy</option>
										<option value="Jamaica">Jamaica</option>
										<option value="Japan">Japan</option>
										<option value="Jordan">Jordan</option>
										<option value="Kazakhstan">Kazakhstan</option>
										<option value="Kenya">Kenya</option>
										<option value="Kiribati">Kiribati</option>
										<option value="Korea North">Korea North</option>
										<option value="Korea Sout">Korea South</option>
										<option value="Kuwait">Kuwait</option>
										<option value="Kyrgyzstan">Kyrgyzstan</option>
										<option value="Laos">Laos</option>
										<option value="Latvia">Latvia</option>
										<option value="Lebanon">Lebanon</option>
										<option value="Lesotho">Lesotho</option>
										<option value="Liberia">Liberia</option>
										<option value="Libya">Libya</option>
										<option value="Liechtenstein">Liechtenstein</option>
										<option value="Lithuania">Lithuania</option>
										<option value="Luxembourg">Luxembourg</option>
										<option value="Macau">Macau</option>
										<option value="Macedonia">Macedonia</option>
										<option value="Madagascar">Madagascar</option>
										<option value="Malaysia">Malaysia</option>
										<option value="Malawi">Malawi</option>
										<option value="Maldives">Maldives</option>
										<option value="Mali">Mali</option>
										<option value="Malta">Malta</option>
										<option value="Marshall Islands">Marshall Islands</option>
										<option value="Martinique">Martinique</option>
										<option value="Mauritania">Mauritania</option>
										<option value="Mauritius">Mauritius</option>
										<option value="Mayotte">Mayotte</option>
										<option value="Mexico">Mexico</option>
										<option value="Midway Islands">Midway Islands</option>
										<option value="Moldova">Moldova</option>
										<option value="Monaco">Monaco</option>
										<option value="Mongolia">Mongolia</option>
										<option value="Montserrat">Montserrat</option>
										<option value="Morocco">Morocco</option>
										<option value="Mozambique">Mozambique</option>
										<option value="Myanmar">Myanmar</option>
										<option value="Nambia">Nambia</option>
										<option value="Nauru">Nauru</option>
										<option value="Nepal">Nepal</option>
										<option value="Netherland Antilles">Netherland Antilles</option>
										<option value="Netherlands">Netherlands (Holland, Europe)</option>
										<option value="Nevis">Nevis</option>
										<option value="New Caledonia">New Caledonia</option>
										<option value="New Zealand">New Zealand</option>
										<option value="Nicaragua">Nicaragua</option>
										<option value="Niger">Niger</option>
										<option value="Nigeria">Nigeria</option>
										<option value="Niue">Niue</option>
										<option value="Norfolk Island">Norfolk Island</option>
										<option value="Norway">Norway</option>
										<option value="Oman">Oman</option>
										<option value="Pakistan">Pakistan</option>
										<option value="Palau Island">Palau Island</option>
										<option value="Palestine">Palestine</option>
										<option value="Panama">Panama</option>
										<option value="Papua New Guinea">Papua New Guinea</option>
										<option value="Paraguay">Paraguay</option>
										<option value="Peru">Peru</option>
										<option value="Phillipines">Philippines</option>
										<option value="Pitcairn Island">Pitcairn Island</option>
										<option value="Poland">Poland</option>
										<option value="Portugal">Portugal</option>
										<option value="Puerto Rico">Puerto Rico</option>
										<option value="Qatar">Qatar</option>
										<option value="Republic of Montenegro">Republic of Montenegro</option>
										<option value="Republic of Serbia">Republic of Serbia</option>
										<option value="Reunion">Reunion</option>
										<option value="Romania">Romania</option>
										<option value="Russia">Russia</option>
										<option value="Rwanda">Rwanda</option>
										<option value="St Barthelemy">St Barthelemy</option>
										<option value="St Eustatius">St Eustatius</option>
										<option value="St Helena">St Helena</option>
										<option value="St Kitts-Nevis">St Kitts-Nevis</option>
										<option value="St Lucia">St Lucia</option>
										<option value="St Maarten">St Maarten</option>
										<option value="St Pierre & Miquelon">St Pierre & Miquelon</option>
										<option value="St Vincent & Grenadines">St Vincent & Grenadines</option>
										<option value="Saipan">Saipan</option>
										<option value="Samoa">Samoa</option>
										<option value="Samoa American">Samoa American</option>
										<option value="San Marino">San Marino</option>
										<option value="Sao Tome & Principe">Sao Tome & Principe</option>
										<option value="Saudi Arabia">Saudi Arabia</option>
										<option value="Senegal">Senegal</option>
										<option value="Seychelles">Seychelles</option>
										<option value="Sierra Leone">Sierra Leone</option>
										<option value="Singapore">Singapore</option>
										<option value="Slovakia">Slovakia</option>
										<option value="Slovenia">Slovenia</option>
										<option value="Solomon Islands">Solomon Islands</option>
										<option value="Somalia">Somalia</option>
										<option value="South Africa">South Africa</option>
										<option value="Spain">Spain</option>
										<option value="Sri Lanka">Sri Lanka</option>
										<option value="Sudan">Sudan</option>
										<option value="Suriname">Suriname</option>
										<option value="Swaziland">Swaziland</option>
										<option value="Sweden">Sweden</option>
										<option value="Switzerland">Switzerland</option>
										<option value="Syria">Syria</option>
										<option value="Tahiti">Tahiti</option>
										<option value="Taiwan">Taiwan</option>
										<option value="Tajikistan">Tajikistan</option>
										<option value="Tanzania">Tanzania</option>
										<option value="Thailand">Thailand</option>
										<option value="Togo">Togo</option>
										<option value="Tokelau">Tokelau</option>
										<option value="Tonga">Tonga</option>
										<option value="Trinidad & Tobago">Trinidad & Tobago</option>
										<option value="Tunisia">Tunisia</option>
										<option value="Turkey">Turkey</option>
										<option value="Turkmenistan">Turkmenistan</option>
										<option value="Turks & Caicos Is">Turks & Caicos Is</option>
										<option value="Tuvalu">Tuvalu</option>
										<option value="Uganda">Uganda</option>
										<option value="United Kingdom">United Kingdom</option>
										<option value="Ukraine">Ukraine</option>
										<option value="United Arab Erimates">United Arab Emirates</option>
										<option value="United States of America">United States of America</option>
										<option value="Uraguay">Uruguay</option>
										<option value="Uzbekistan">Uzbekistan</option>
										<option value="Vanuatu">Vanuatu</option>
										<option value="Vatican City State">Vatican City State</option>
										<option value="Venezuela">Venezuela</option>
										<option value="Vietnam">Vietnam</option>
										<option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
										<option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
										<option value="Wake Island">Wake Island</option>
										<option value="Wallis & Futana Is">Wallis & Futana Is</option>
										<option value="Yemen">Yemen</option>
										<option value="Zaire">Zaire</option>
										<option value="Zambia">Zambia</option>
										<option value="Zimbabwe">Zimbabwe</option>
									</select>
							</div>
							</br>
							<input id="C" name="updateCountrie" type="submit" class="btn-submit" value="Guardar País">
						</form>
					</div>
				</div>
				
				
				</br></br>
				
				
				<span style="margin-left:10px;font-size:16px;font-family:'Open Sans','Roboto',sans-serif;">Biografía</span>
				<button id="btn-abrir-popup4" type="button" title="Editar" style="margin-left: 5px; margin-top:-5px"><label class="lnr lnr-pencil"></label></button>						
				
				</br></br>
				
				<textarea class="user-Biography" style="height:290px; width:230px;" disabled="true" spellcheck="false"><?php echo $data['u5rem2'] ?></textarea>
					
				<div class="overlay" id="overlay4">
					<div class="popup" id="popup4">
						<a id="btn-cerrar-popup4" class="btn-cerrar-popup"><i class="fas fa-times"></i></a>
						</br>
						<form method="post">
							<div class="contenedor-inputs">
								<textarea name="update4" style="width:500px; height:100px" type="text" placeholder="Escribe algo sobre ti :)"></textarea>
							</div>
							</br>
							<input id="D" name="updateBiography" type="submit" class="btn-submit" value="Guardar Biografía">
						</form>
					</div>
				</div>
				
				
				
				
			</div>

		
		<!-- Tracks Usuario -->
		<h4 class="music-title" style="margin-top:-770px; margin-left:350px; font-weight:normal;">Tracks</h4>
		
		<div class="container-User-Tracks">
			</br>
			<?php
			
				$reply = obtenerTracks($_SESSION['idu']);
				if($reply) {
					echo '<a href="crear-audio.php">Crear track</a>';
					echo '<br></br>';
					foreach ($reply as $track) {
						
						if (isset($_POST['EliminaT'])) {
							
							borrarTrack();
							echo "<meta http-equiv='refresh' content='0'>";
						}
						
						echo '
						<div class="container-track-profile" style="margin-bottom: 1rem;">
							<img style="object-fit: cover; width: 130px; height: 130px;" src="'.$track->t5jds0.'">
							<div class="info-track-profile">
								<h3>'.$track->t5prc4.'</h3>
								<p>'.$track->t5zpw1.'</p>
								<i class="btn-play material-icons">play_arrow</i>
								<input class="path" type="hidden" value="'.$track->t5tlc3.'">
								
								<form method="POST"  style="margin-left:210px; margin-top:-40px;" onsubmit="return confirm(\'¿Estás seguro quieres eliminar este track?\');">
									<button name="EliminaT" class="btn_delete_t_p" type="submit" value="'.$track->t5isk2.'" title="Eliminar" ><label class="lnr lnr-trash"></label></button>
								</form>
								
							</div>	
						</div>
						';
						
					}
				}else { 
					echo " <span style='color:#26283F;'>Aún no tienes tracks creados</span>";
					echo " <a href='crear-audio.php'>Crea tu primer track</a>";
				}

				
			?>
		</div>
		
		
		<!-- PlayList Usuario -->
		<h4 class="music-title" style="margin-top:-770px; margin-left:950px; font-weight:normal;">PlayList</h4>
		
		<div class="container-User-PlayList">
			</br>
			<?php
			
				$reply = obtenerPlaylists($_SESSION['idu']);
				$conjunto = array();
				if($reply) {
					
					foreach ($reply as $playlist) {
						
						$band = false;
						for ($fila=0; $fila<count($conjunto); $fila++) {
							if( $conjunto[$fila] == $playlist->p5uss6){
								$band = true;
							}
						}
						if( $band == false ){
							array_push($conjunto,$playlist->p5uss6);
							
							$cont = 0;
							foreach ($reply as $playlist2) {
								if( $playlist2->p5uss6 == end($conjunto) ){
									$cont++;
								}
							}
							
							if (isset($_POST['EliminaP'])) {
								borrarPlaylist();
								echo "<meta http-equiv='refresh' content='0'>";
							}
							
							echo '
								<div class="container-playlist-profile" style="margin-top: 1rem;">
									<img style="object-fit: cover; width: 120px; height: 120px;" src="resource/images/playlist.jpg">
									<div class="info-playlist-profile">
										<h3>'.$playlist->p5uss6.'</h3>
										<p>Tracks: '.$cont.'</p>
										<a href="#"><i class="btn-play material-icons">play_arrow</i></a>
										
										<form method="POST" style="margin-left:200px; margin-top:-40px;" onsubmit="return confirm(\'¿Estás seguro quieres eliminar este playlist?\');">
											<button name="EliminaP" class="btn_delete_t_p" type="submit" value="'.$playlist->p5lqm5.'" title="Eliminar"><label class="lnr lnr-trash"></label></button>
										</form>
										
									</div>
								</div>
							';
							
						}
						
						
					}
				}else { 
					echo " <span style='color:#26283F;'>Aún no tienes playlists creados</span>";
				}
				
				
				
			?>
		</div>
		
		</br></br>
	
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
		
			var btnAbrirPopup1 = document.getElementById('btn-abrir-popup1');
			var btnCerrarPopup1 = document.getElementById('btn-cerrar-popup1');
			
			var overlay1 = document.getElementById('overlay1');
			var popup1 = document.getElementById('popup1');
			

			btnAbrirPopup1.addEventListener('click', function(){
				overlay1.classList.add('active');
				popup1.classList.add('active');
			});

			btnCerrarPopup1.addEventListener('click', function(e){
				e.preventDefault();
				overlay1.classList.remove('active');
				popup1.classList.remove('active');
			});

			
			var btnGuardarName = document.getElementById('A');
			
			btnGuardarName.addEventListener('click', function(){
			
				e.preventDefault();
				overlay1.classList.remove('active');
				popup1.classList.remove('active');
			
			});

			
			//----------------------------------------------------------------------
			var btnAbrirPopup2 = document.getElementById('btn-abrir-popup2');
			var btnCerrarPopup2 = document.getElementById('btn-cerrar-popup2');
			
			var overlay2 = document.getElementById('overlay2');
			var popup2 = document.getElementById('popup2');
			

			btnAbrirPopup2.addEventListener('click', function(){
				overlay2.classList.add('active');
				popup2.classList.add('active');
			});

			btnCerrarPopup2.addEventListener('click', function(e){
				e.preventDefault();
				overlay2.classList.remove('active');
				popup2.classList.remove('active');
			});

			
			var btnGuardarArtista = document.getElementById('B');
			
			btnGuardarArtista.addEventListener('click', function(){
			
				e.preventDefault();
				overlay2.classList.remove('active');
				popup2.classList.remove('active');
			
			});
			
			//-------------------------------------------------------------
			var btnAbrirPopup3 = document.getElementById('btn-abrir-popup3');
			var btnCerrarPopup3 = document.getElementById('btn-cerrar-popup3');
			
			var overlay3 = document.getElementById('overlay3');
			var popup3 = document.getElementById('popup3');
			

			btnAbrirPopup3.addEventListener('click', function(){
				overlay3.classList.add('active');
				popup3.classList.add('active');
			});

			btnCerrarPopup3.addEventListener('click', function(e){
				e.preventDefault();
				overlay3.classList.remove('active');
				popup3.classList.remove('active');
			});

			
			var btnGuardarPais = document.getElementById('C');
			
			btnGuardarPais.addEventListener('click', function(){
			
				e.preventDefault();
				overlay3.classList.remove('active');
				popup3.classList.remove('active');
			
			});
		
		
			//-------------------------------------------------------------
			var btnAbrirPopup4 = document.getElementById('btn-abrir-popup4');
			var btnCerrarPopup4 = document.getElementById('btn-cerrar-popup4');
			
			var overlay4 = document.getElementById('overlay4');
			var popup4 = document.getElementById('popup4');
			

			btnAbrirPopup4.addEventListener('click', function(){
				overlay4.classList.add('active');
				popup4.classList.add('active');
			});

			btnCerrarPopup4.addEventListener('click', function(e){
				e.preventDefault();
				overlay4.classList.remove('active');
				popup4.classList.remove('active');
			});

			
			var btnGuardarBiografia = document.getElementById('D');
			
			btnGuardarBiografia.addEventListener('click', function(){
			
				e.preventDefault();
				overlay3.classList.remove('active');
				popup3.classList.remove('active');
			
			});
		
		
		</script>
		
		
		
    </body>
</html>