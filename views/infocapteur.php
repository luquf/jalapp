<?php

session_start();

// if(!isset($_SESSION["connected"]) || $_SESSION["connected"] == "false") {
//     header("Location: views/inscription.php");
// }

if (isset($_GET['capteur'])) {
	$_SESSION['capteur_id'] = $_GET['capteur'];
    $type = 1;
} else if (isset($_GET['controleur'])) {
    $_SESSION['controleur_id'] = $_GET['controleur'];
    $type = 2;     
} else {
    header("Location: domicile.php");
 }
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<script src="../public/js/addonglet.js" type="text/javascript"></script>
		<link rel="stylesheet" href="../public/css/piece1.css" />
		<link rel="icon" type="image/png" href="../public/assets/favicon.png" />
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
		<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
		<script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js'></script>
		<title>Domisep: Infos Capteur </title>

	</head>

	<body>
		<div id="bandeau">
			<div class="logo">

					<a href="domicile.php"> <img src="../public/assets/logo.png" alt = "Logo Domisep" id="logo" title = "Logo Domisep"  />

			</div>

			<div class="bandeau-droite">

					<a href= "aide_accueil.php" class = "aide"> Aide </a>
                    <a href= "inscription.php"  class = "deconnexion" > Déconnexion</a>

            </div>
		</div>

		<div id="slogan">
			<h1>
			Informations
			</h1>
		</div>

		</div>
		<div id='tab1'>
			<?php echo "<a href='piece1.php?piece=".$_SESSION['piece_id']."' style='text-decoration: none;color: #515659;'><i class='fa fa-arrow-circle-left fa-lg'></i> <b>Retour</b></a>";?>
		
		    <div class="sensor-left">
                
                        <?php 
                        require_once __DIR__.'/../controllers/capteur.php';
                        require_once __DIR__.'/../models/piece.php';
                        $pieces = getPiecesByID($_SESSION['piece_id']);
                        $capteurs = getCapteursController($_SESSION['capteur_id']);
                        $controleurs = getControleursController($_SESSION['controleur_id']);
if ($type == 1) {
    if (count($capteurs) == 0) {
        header("Location: piece1.php?piece=".$_SESSION['piece_id']);
    }
                        foreach ($capteurs as $capteur) {
                            $t = "";
                            switch ($capteur[2]) {
                                case "LUM":
                                    $t = "Capteur de luminosité";
                                    break;
                                case "TEMP":
                                    $t = "Capteur de température";
                                    break;
                                case "FUM":
                                    $t = "Capteur de fumée";
                                    break;
                                default:
                                    break;
                            }
                        echo"
                        <div class='infos'>
                        <h1 class='titre'><i class='fa fa-microchip fa-sm'></i> Infos du capteur <em>'".$capteur[1]."'</em></h1>
                        <br/>
                            <span>Numéro de série : </span><b>".$capteur[0]."</b>
                            <br/><span>Type : </span><b>".$t."</b>
                            <br/><span>Emplacement : </span><b>".$pieces[0][1]."</b>
                        </div>
					
                        <div class ='historique'>
                            <h1 class='titre'><i class='fa fa-history fa-sm'></i> Historique du capteur <em>'".$capteur[1]."'</em></h1><br/>";
                        }

                            require __DIR__ . '/../controllers/releve.php';

                            $releve_capteur = getCapteurDataByID($_SESSION['capteur_id']);
                            foreach ($releve_capteur as $k=>$releve) {
                                echo "
                                    <div class='datas'>
                                        <span>[ ".$releve[2]." ] Valeur : ".$releve[4]."</span>
                                    </div>";
                                    if ($k >= 24) {
                                        break;
                                    }    
                            }
                            
    
} else {
    if (count($controleurs) == 0) {
        header("Location: piece1.php?piece=".$_SESSION['piece_id']);
    }
                        foreach ($controleurs as $controleurs) {
                            $t = "";
                            switch ($controleurs[2]) {
                                case "LUM":
                                    $t = "Controleur de luminosité";
                                    break;
                                case "VOL":
                                    $t = "Controleur de volet";
                                    break;
                                case "CH":
                                    $t = "Controleur de chauffage";
                                    break;
                                default:
                                    break;
                            }
                        echo"
                        
                        <div class='infos'>
                        <h1 class='titre'><i class='fa fa-microchip fa-sm'></i> Infos du controleur <em>'".$controleurs[1]."'</em></h1>
                        <span>Numéro de série : </span><b>".$controleurs[0]."</b>
                        <br/><span>Type : </span><b>".$t."</b>
                        <br/><span>Emplacement : </span><b>".$pieces[0][1]."</b>
                        </div>
					
                        <div class ='historique'>
                            <h1 class='titre'><i class='fa fa-history fa-sm'></i> Historique du controleur <em>'".$controleurs[1]."'</em></h1>";
                        }
                            ?>
                            <?php
                                require __DIR__ . '/../controllers/releve.php';
                                $releve_cont = getControleurDataByID($_SESSION['controleur_id']);
                                foreach ($releve_cont as $k=>$releve) {
                                    echo "
                                        <div class='datas'>
                                            <span>[ ".$releve[2]." ] Valeur : ".$releve[4]." </span>
                                        </div>";
                                        if ($k >= 24) {
                                            break;
                                        }    
                                }
				             
}
?>
</div> 
			
                    </div>
                </div>  
                </body>
                <footer>

		<div class = 'info_footer'> 
        	<div>Powered by 
        <a href = "jala.php"> <img id="logo_JALA" src="../public/assets/logo_JALA.png" alt = "Logo JALA" title = "Logo JALA"/></a>
          ©</div>
		  <a href= 'mentionslegales.php'> Mentions Légales </a> 
		  <a href= 'cgu.php'> ConditionsGénérales </a> 


        </div>

		
	</footer>

            
</html>

