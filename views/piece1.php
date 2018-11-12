/*
<?php
session_start();

lignes dessous pas obligatoire
$_SESSION['prenom']='jean';
$_SESSION['nom']='depuont';
$_SESSION['prenom']='24';
?> 

pour la deconnexion : 
session_destroy();

cookie :
<?php
setcookie('pseudo','M@teo21',time() + 365*24*3600, null, null, false, true);
?>
*/


<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="../public/css/piece1.css" /> 
		<title>Domisep: Domicile > Pièce 1</title>
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
					<a href= "aide_accueil.php" style="color: #fff; text-decoration: underline;">Aide/Nous Contacter </a> 
				</p>
			</div>

		</div>
		<div id="onglet">
    		<ul>
        		<li><a href="#container" rel="url1">Domicile 1</a></li> 
        		<li><a href="#container" rel="url2">Domicile 2</a></li> 
    		</ul>
		</div>

		<div id="container"></div>
			

		<script type="text/javascript">
			function loadit( element)
			{
				var container = document.getElementById('container');
				container.src=element.rel;

				var tabs=document.getElementById('tabs').getElementsByTagName("a");
				for (var i=0; i < tabs.length; i++)
				{
					if(tabs[i].rel == element.rel) 
						tabs[i].className="selected";
					else
						tabs[i].className="";
				}
			}

			function startit()
			{
				var tabs=document.getElementById('tabs').getElementsByTagName("a");
				var container = document.getElementById('container');
				container.src = tabs[0].rel;
			}

			window.onload=startit;

		</script>
		<div class="bouton"><a href="#">Lampe 1 </a></div>