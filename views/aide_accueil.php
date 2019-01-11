<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="../public/css/aide_accueil.css" />
		<link rel="icon" type="image/png" href="../public/assets/favicon.png" />
		<title>Domisep : Aide</title>
	</head>

	<body>
	<div id="bandeau">

	<div class="logo">
		<a href="accueil.php"> <img id="logo" src="../public/assets/logo.png" alt = "Logo Domisep" title = "Logo Domisep" />
	</div>

	<div id="bandeau_droite">
		
		<div class="connexion">
			<a href="inscription.php" style = "text-decoration: none; color: #515659"; > Connexion </a>
		</div>
	</div>


	</div>

		<div id="slogan">
			<h1>
				FAQ Domisep
			</h1>
		</div>

		<div id="FAQ">
	

				<p>
					Unde Rufinus ea tempestate praefectus praetorio ad discrimen trusus est ultimum. ire enim ipse compellebatur ad militem, quem exagitabat inopia simul et feritas, et alioqui coalito more in ordinarias dignitates asperum semper et saevum, ut satisfaceret atque monstraret, quam ob causam annonae convectio sit impedita.
Haec igitur Epicuri non probo, inquam. De cetero vellem equidem aut ipse doctrinis fuisset instructior est enim, quod tibi ita videri necesse est, non satis politus iis artibus, quas qui tenent, eruditi appellantur aut ne deterruisset alios a studiis. quamquam te quidem video minime esse deterritum.
Novitates autem si spem adferunt, ut tamquam in herbis non fallacibus fructus appareat, non sunt illae quidem repudiandae, vetustas tamen suo loco conservanda; maxima est enim vis vetustatis et consuetudinis. Quin in ipso equo, cuius modo feci mentionem, si nulla res impediat, nemo est, quin eo, quo consuevit, libentius utatur quam intractato et novo. Nec vero in hoc quod est animal, sed in iis etiam quae sunt inanima, consuetudo valet, cum locis ipsis delectemur, montuosis etiam et silvestribus, in quibus diutius commorati sumus.
				</p>
		</div>
		<div id="slogan">
			<h1>
				Nous Contacter
			</h1>
		</div>
		<div id="FAQ">
	

		<form name="contactform" method="post" action="../controllers/nouscontacter.php">
			<table width="450px">
			<tr>
			<td valign="top">
			<label for="first_name">Prénom *</label>
			</td>
			<td valign="top">
			<input  type="text" name="first_name" maxlength="50" size="30">
			</td>
			</tr>
			<tr>
			<td valign="top">
			<label for="last_name">Nom *</label>
			</td>
			<td valign="top">
			<input  type="text" name="last_name" maxlength="50" size="30">
			</td>
			</tr>
			<tr>
			<td valign="top">
			<label for="email">Email *</label>
			</td>
			<td valign="top">
			<input  type="text" name="email" maxlength="80" size="30">
			</td>
			</tr>
			<tr>
			<td valign="top">
			<label for="comments">Dit nous tout ! *</label>
			</td>
			<td valign="top">
			<textarea  name="comments" maxlength="1000" cols="25" rows="6"></textarea>
			</td>
			</tr>
			<tr>
			<td colspan="2" style="text-align:center">
			<input type="submit" value="Submit">  
			</td>
			</tr>
			</table>
			<?php
                $error = $_GET['error'];
                if (isset($error)) {
                    if ($error == "true") {
                        echo "<p style='color:red;'>Une erreur s'est produite.</p>";
                    } else {
                        echo "<p style='color:green;'>Votre email a bien été envoyé ! Merci beaucoup et à bientôt !.</p>";
                    }
                }
                ?>
			</form>
		</div>
	</body>

	<footer>

		    <div class = 'info_footer'> 
          <div class='inf'> Powered by </div>
          <div class='inf'> <a href = "jala.php"> <img id="logo_JALA" src="../public/assets/logo_JALA.png" alt = "Logo JALA" title = "Logo JALA"/></a></div>
          <div class='inf'>©</div>
        </div>


	</footer>

</html>
