<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="../public/css/domicile.css" />
        <script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
		<title>Domisep: Domicile </title>
   
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
        
	<div class= 'tabs'>
		<ul class='tabs'>
			<li><a href='#tab1'>Domicile 1</a></li>
			<li><a href='#tab2'>Domicile 2</a></li>
            <li><a href='#tab3'>Domicile 3</a></li>
            <li><input class='button' type="button"  value='+' onclick="openModal()"/></li>
        </ul>


        <div id = "modal">
  			 <h1> Ajout Domicile</h1>
			   <div class="infos"> 
                </br>
                        <p>
                            <input type="type" name="type" id="type" placeholder="Type de domicile : " size="30" maxlength="20"/>
                            <input type="submit" value="Valider"/>
                        </p>
                        <p>
                            <input type="rooms" name="rooms" id="rooms" placeholder="Nombre de pièces : " size="30" maxlength="20"/>
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
    	<script src="app.js" type="text/javascript"></script>
        
        <div id='tab1'>
			<h3>Liste des Pièces</h3>
			<p>
            <a href= "piece1.php" style= "background: #3A2D8C; color: white; text-decoration : underline;">Pièce 1</a>			
            </br>
            <a href= "piece2.php" style="background: #3A2D8C; color: white; text-decoration : underline;">Pièce 2</a>			
        </br>
        <a href= "piece3.php" style="background: #3A2D8C; color: white; text-decoration : underline;">Pièce 3</a>			    
        </p>
		</div>
		<div id='tab2'>
			<h3>Liste des Pièces</h3>
			<p>
            <a href= "piece1.php" style= "background: #3A2D8C; color: white; text-decoration : underline;">Pièce 1</a>			
            </br>
            <a href= "piece2.php" style="background: #3A2D8C; color: white; text-decoration : underline;">Pièce 2</a>			
            </p>		</div>
		<div id='tab3'>
			<h3>Liste des Pièces</h3>
			<p>
            <a href= "piece1.php" style= "background: #3A2D8C; color: white; text-decoration : underline;">Pièce 1</a>			
            </p>		</div>
        </div>
	</body>
</html>
