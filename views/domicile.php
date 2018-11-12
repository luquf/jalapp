<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="../public/css/domicile.css" /> 
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
                    <a href= "Deconnexion.php" style="color: #fff; text-decoration : underline;">Déconnexion</a>			
					<a href= "aide_accueil.php" style="color: #fff; text-decoration: underline;">Aide/Nous Contacter </a> 
				</p>
            </div>
</div>




<div class="onglet">
    <script type="text/javascript">
    function BasculeElement(_this){
    var Onglet_li = document.getElementById('ul_onglets').getElementsByTagName('li');
    if(Onglet_li[])
    for(var i = 0; i < Onglet_li.length; i++){
    if(Onglet_li[i].id){
    if(Onglet_li[i].id == _this.id){
        Onglet_li[i].className = 'onglet_selectionner';
        document.getElementById('#' + _this.id).style.display = 'block';
    }
    else{
        Onglet_li[i].className = 'onglet';
        document.getElementById('#' + Onglet_li[i].id).style.display = 'none';
    }
    }
    } 
    }
</script>
    <ul id="ul_onglets">
    <li id="1" class="onglet_selectionner" onclick="BasculeElement(this);">Domicile 1</li>
    <li id="2" class="onglet" onclick="BasculeElement(this);">Domicile 2</li>
    <li id="2" class="onglet" onclick="BasculeElement(this);">+</li>
</ul>

    <div id="conteneur-onglet">
    <div id="#1" class="contenu-onglet"><a href="aide_accueil.php" style="color: black; text-decoration: underline;">Aide/Nous Contacter </a> </div>
    <div id="#2" class="contenu-onglet" style="display: none;">Liste des pièces Domicile 2</div>
    <div id="#3" class="contenu-onglet" style="display: none;"><a href
</div>
    </div>

</body>
</html>