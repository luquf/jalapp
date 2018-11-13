<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="../public/css/ajoutdomicile.css" />
		<title>Domisep : Ajout d'un premier domicile</title>
	</head>

	<body>

	</div>


		<div id="bandeau">
			<div class="logo">
				<p>
					<a href="accueil.php"> <img src="../public/assets/logo.png" alt = "Logo Domisep" title = "Logo Domisep" style="width: 150px; height: auto;" /> 
				</p>
			</div>
			<div class="aide">
				<p>
				</br>	
					<select name="Langue" id="Langue" >
						<option value="Français">Français</option>
						<option value="English">English</option>
						</select>
					<a href= "aide_accueil.php" style="color: #fff; text-decoration: none;">Aide </a> 
				</p>
			</div>

			<div class="deconnexion">
					<a href="accueil.php" style="color: #fff; text-decoration: none;"> Déconnexion </a>
			</div>
			






		</div>
		<div class="button_container">
        <button id = button_modal onclick="openModal()">+ </button>
 	    </div>

		<div class="textboutton"> Ajouter un domicile </div>
		</div>
		<div id = "modal">
  			 <h1> Ajout Domicile</h1>
			   <div class="infos"> 
           
                        <p>
                            <input type="name" name="name" id="name" placeholder="Nom du domicile : " size="30" maxlength="20"/>
                        
                        </p>
                        <p>
                            <input type="address" name="address" id="address" placeholder="Adresse : " size="30" maxlength="20"/>
                        
                        </p>
			
                        <p>
                            <input type="town" name="town" id="town" placeholder="Ville : " size="30" maxlength="30" />
                        
                        </p>

						<p>
                            <input type="country" name="country" id="country" placeholder="Pays : " size="30" maxlength="30" />
                        
                        </p>
                        


		<button id ="close" onclick ="closeModal()">X</button>
		<button id ="validation" onclick ="closeModal()">Valider</button>
    	</div>
    	<script src="app.js" type="text/javascript"></script>

	</body>