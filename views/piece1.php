<?php

require __DIR__.'/../controllers/authentification.php';

if(!isset($_COOKIE['conn_token'])) {
    header('Location: inscription.php');
} else {
	$cipher_content = $_COOKIE['conn_token'];
	//$decipher_content = decryptToken($cipher_content, $secret_key);
	$ok = decryptToken($cipher_content, $secret_key);
	//echo gettype($decipher_content);
	if (!$ok) {
		header('Location: accueil.php');
	}
}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="../public/css/piece1.css" />
        <script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
		<title>Domisep: Domicile > Pièce </title>
   
	</head>

	<body>
		<div id="bandeau">
			<div class="logo">
				<p>
					<a href="accueil.php"> <img src="../public/assets/logo.png" alt = "Logo Domisep" title = "Logo Domisep" style="width: 150px; height: auto;" /> 
				</p>
			</div>
		
			<div class="aide">
				<p>
				</br>	
                    <a href= "Deconnexion.php" style="color: #fff; text-decoration : underline;">Déconnexion</a>			
					<a href= "aide_accueil.php" style="color: #fff; text-decoration: underline;">Aide/Nous Contacter </a> 
				</p>
            </div>
</div>


		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
		<script>
			$(document).ready(function(){
				$('ul.tabs').each(function(){
					var $active, $content, $links = $(this).find('a');
					$active = $($links.filter('[href="'+location.hash+'"]')[0] || $links[0]);
					$active.addClass('active');

					$content = $($active[0].hash);

					$links.not($active).each(function () {
						$(this.hash).hide();
					});

					$(this).on('click', 'a', function(e){
						$active.removeClass('active');
						$content.hide();

						$active = $(this);
						$content = $(this.hash);

						$active.addClass('active');
						$content.show();

						e.preventDefault();
					});
				});
			});
        </script>
	
	<div class="retour">
	<a href= "domicile.php" style="color: #3A2D8C ; text-decoration : underline;"> < Retour</a>
		</div>

	<div class= 'tabs'>
		<ul class='tabs'>
			<li><a href='#tab1'>Pièce 1</a></li>
			<li><a href='#tab2'>Pièce 2</a></li>
            <li><a href='#tab3'>Pièce 3</a></li>
            <li><input class='button' type="button"  value='+' onclick="openModal()"/></li>
        </ul>

        <div id = "modal">
  			 <h1> Ajout Pièce</h1>
			   <div class="infos"> 
                </br>
                        <p>
                            <input type="type" name="type" id="type" placeholder="Type de Pièce : " size="30" maxlength="20"/>
                            <input type="submit" value="Valider"/>
                        </p>

                        <p>
                            <input type="capteurs" name="capteurs" id="capteurs" placeholder="Nombre de capteurs" size="30" maxlength="30" />
                            <input type="submit" value="Valider"/>
                        </p>          
        		</div>

		<button id ="close" onclick ="closeModal()">X</button>
		<button id ="validation" onclick ="closeModal()">Valider</button>
		</div>
	</div>

    	



		<div id='tab1'>

			<div class="flex_titres">
					<h3> Liste des capteurs </h3>

					<h3> Informations Pièce </h3>

			</div>

			<br><br>


			<div class="flex">

				<br> <br>					
				<div class="gauche">

						<div class="boutton">
								<input type="button" name="boutton1" class="boutton_image">
								<p class="boutton_texte"> Lampe 1 </p>


														<!-- POPUP ARTHUR -->

																	
															<div class="button_container">
														        <button id = button_modalpop onclick="openModal2()"> infos capteurs </button>
														 	    </div>

																<div id = "modalpop">

														            <div class="infos">
														                <h2> 
														                    Historique
														                </h2>  
															</br>
														                        <p>
																				12/11/2018 15:44 : ON
														                        </p>
														                        <p>
																				12/11/2018 12:12 : OFF
														                       
														                        </p>
																	
														                        <p>
																				12/11/2018 11:42 : ON    
																				</p>
														                        <p> 
																				11/11/2018 23:45 : OFF    
														                      
														                        </p>
														                        <p>
																				11/11/2018 18:00 : ON  
														                         
														                        </p>
														                        <p>
																				11/11/2018 14:00 : OFF
														                        
														                        </p>
														                        
														                </div>
														            <div class="modif_infos">
														                <h2> 
														                    Consommation Ampoule 4
														                </h2>  
																		<p>
																			 <img src="conso_ampoule." alt = "Conso ampoule" title = "Conso Ampoule" style="width: 400px; height: auto;" /> 
																		</p>
														            </div>                  


																<button id ="fermer" onclick ="closeModal2()">X</button>
																<button id ="valider" onclick ="closeModal2()">Valider</button>
																</div>
																
																<script src="app2.js" type="text/javascript"></script>
																
														  <!-- Fin partie popup arthur --> 
						</div>

						<div class="boutton">
							<input type="button" name="boutton2" class="boutton_image">
							<p class="boutton_texte"> Lampe 2 </p>
						</div>

						<div class="boutton">
							<input type="button" name="boutton3" class="boutton_image">
							<p class="boutton_texte"> Volets 1 </p>
						</div>

						<div class="boutton">
							<input type="button" name="boutton4" class="boutton_image">
							<p class="boutton_texte"> Volets 2 </p>
						</div>
				</div>
				

				<div class="droite">

					<img src="conso_ampoule.jpg">

				</div>

			</div>

			<div>
				<p>
				<input id='add_capteur' type="button"  value='+' onclick="openModal1()"/>
				</p>
			</div>


		</div> 



		

		<div id='tab2'>
			<h3>Liste des Capteurs</h3>
			<p>
			<input id='add_capteur' type="button"  value='+' onclick="openModal1()"/>
		</p>
		</div>

		<div id='tab3'>
			<h3>Liste des Capteurs</h3>
			<p>
			<input id='add_capteur' type="button"  value='+' onclick="openModal1()"/>
		</p>
		</div>

				
		</div>

		<div id = "modal1">																																								
  			 <h1> Ajout Capteur</h1>
			   <div class="infos"> 
                </br>
                        <p>
                            <input type="type" name="type" id="type" placeholder="Type de Capteur : " size="30" maxlength="20"/>
                            <input type="submit" value="Valider"/>
                        </p>

                        <p>
                            <input type="capteurs" name="capteurs" id="capteurs" placeholder="titre 2" size="30" maxlength="30" />
                            <input type="submit" value="Valider"/>
                        </p>
                        
        		</div>

		<button id ="close" onclick ="closeModal1()">X</button>
		<button id ="validation" onclick ="closeModal1()">Valider</button>
		</div>
		</div>
		

    	<script src="app.js" type="text/javascript"></script>
		<script src="app1.js" type="text/javascript"></script>

        
        </div>
	</body>
</html>
