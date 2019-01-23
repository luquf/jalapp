<?php

session_start();
session_unset();
$_SESSION['lang'] = "en";

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="../../public/css/inscription.css" />
		<link rel="icon" type="image/png" href="../../public/assets/favicon.png" />
		<link rel="stylesheet" href="../../public/assets/fontawesome-free-5.6.3-web/css/all.css" />
		<title>Domisep : Sign up</title>
	</head>

	<body>
		<div id="bandeau">
			<div class="logo">

					<a href="accueil.php"> <img src="../../public/assets/logo.png" alt = "Logo Domisep" id="logo" title = "Logo Domisep"/>

			</div>

				<div id="bandeau_droite">
						<div class="language">
						<a href= "../inscription.php"> <img src="../../public/assets/france.png" id = "language"></a>
							</div>
						<div class="aide">
								<a href= "aide_accueil.php" style = "text-decoration: none; color: #515659"	> Help </a>
							</div>

						<div class="contact">
							<a href="contact.php" style = "text-decoration: none; color: #515659"> Contact </a>
						</div>
						<div class="connexion1">
							<a href="inscription.php" style = "text-decoration: none; color: #515659"> Login </a>
						</div>


			</div>

		</div>


		<div id="slogan">
			<h1>
				Login !
			</h1>
		</div>
		<div id="conteneur">
			<div class="connexion">
				<h1 class="titre">
					<i class="fa fa-sign-in-alt fa-sm"></i> Login
				</h1>
				<?php
try {
    $error = htmlspecialchars($_GET['error']);
    if (isset($error) && $error == "credentials") {
        echo "<p style='color:red'>Email or password is wrong.</p>";
    }
} catch (Exception $e) {}
?>
    			<form class="conn-form" method="post" action="../../controllers/authentification.php">
            		<input class="input" type="email" name="email1" id="email1" placeholder="email@example.com" size="30" maxlength="100" required/>
            		<input class="input" type="password" name="pass" id="pass" placeholder="********" size="30" maxlength="100" required/>
        			<input class="input button" type="submit" value="Login"/>
				   </form>
				   <a href="password.php" style="text-decoration: none; color: #515659;">Forgot your password ?</a>
   			</div>
			<div class="inscription">
				<h1 class="titre">
				<i class="fa fa-user-alt fa-xs"></i> Sign up
				</h1>
				<?php

try {
    $error = htmlspecialchars($_GET['error']);
    if (isset($error) && $error == "alreadyexists") {
        echo "<p style='color:red'>This email already exists.</p>";
    } else if (isset($error) && $error == "false") {
		echo "<p style='color:green'>Your account was created. Check your mailbox.</p>";
	}
} catch (Exception $e) {}
?>
				<form method="post" action="../../controllers/inscription.php">
            		<input class="input" type="text" name="nom" id="nom" placeholder="Last name" size="30" maxlength="30" required />
            		<input class="input" type="text" name="prénom" id="prénom" placeholder="First name" size="30" maxlength="30" required />
            		<input class="input" type="email" name="email2" id="email2" placeholder="email@example.com" size="30" maxlength="30" required />
            		<input class="input" type="text" name="adresse" id="adresse" placeholder="Post address" size="30" maxlength="40" required />
       				<select class="input" name="pays" id="pays" required >
          			<option value="france">France</option>
       				</select>
       				<select class="input" name="ville" id="ville" required>
					<option value="Paris">Paris</option>
           			<option value="Lyon">Lyon</option>
           			<option value="Marseille">Marseille</option>
           			<option value="Lille">Lille</option>
           			<option value="Bordeaux">Bordeaux</option>
           			<option value="Nantes">Nantes</option>
       				</select>
            		<input class="input" type="tel" name="tel" id="tel" placeholder="+33 (0)6 00 00 00 00" size="30" maxlength="10" required />
					<input class="input" type="text" name="cle" id="cle" placeholder="Client code given by the store" size="30" maxlength="20" required />
					<div style='display:inline-block;margin-top:5%;'>
					<span id="emailinfo">Password generated and sent by email</span><br><br>
						<input type="checkbox" id="cguaccept" required>
						<label for="scales">By staying, you agree with the <a href='cgu.php' style='text-decoration:none;'>CGU</a></label>
						</div>
        			<input class="input button" type="submit" value="Sign up"/>
				   </form>
			   </div>
				</div>


	</body>



</html>
