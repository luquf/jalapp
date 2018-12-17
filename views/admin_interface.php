<?php

//session_start();

// if(!isset($_SESSION["connected"]) || $_SESSION["connected"] == "false") {
//     header("Location: views/inscription.php");
// }

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
        <link rel="stylesheet" href="../public/css/admin_interface.css" />
        <link rel="icon" type="image/png" href="../public/assets/favicon.png" />
		<title>Domisep : Accueil</title>
	</head>

	<body>

    <div id="bandeau">
				<div class="logo">
					<a href="domicile.php"> <img id="logo" src="../public/assets/logo.png" alt = "Logo Domisep" title = "Logo Domisep" />
				</div>

                <div class="bandeau_droite">
                    <a href="admin_reglages.php" class="parametres"> Paramètres </a>
                    <a href="inscription.php" class="deconnexion"> Déconnexion </a>
                </div>
			    


		</div>


        <div id="tableau" >
            <input type="text" id="rechercher" onkeyup="tri()" placeholder="Rechercher..">
            
                

<table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Email</th>
                        <th>Téléphone</th>
                    </tr>
                </thead>


                <tbody id="table">
                <?php
						require_once __DIR__.'/../controllers/admin_interface.php';
						$utilisateur = getUsers();
						if (count($utilisateur) == 0) {
							echo "<li><i class='fa fa-exclamation-triangle'></i> Vous n'avez pas encore de client sur votre site.</li>";
						} else {
							foreach ($utilisateur as $utilisateur) {
                                echo "<tr><td>".$utilisateur[0]."</td>
                                <td><a href= 'capteurs_admin.php?selected=".$utilisateur[0]."' class='lien_ID'>".$utilisateur[1]."</a></td>
                                <td><a href= 'capteurs_admin.php?selected=".$utilisateur[0]."' class='lien_ID'>".$utilisateur[2]."</a></td>
                                <td><a href= 'capteurs_admin.php' class='lien_ID'>".$utilisateur[3]."</a></td>
                                <td><a href= 'capteurs_admin.php' class='lien_ID'>".$utilisateur[8]."</a></td>
                                <form action='../controllers/admin_interface.php' method='post'>
                                <td><input  type='hidden' value='del_user' name='action' id='action'/>
                                <button type='submit'>X</button></td></tr></form>";
                            }
                         }
                                ?>
                    
                    <script type="text/javascript">
                            function deleteRow(r)
                            {
                                var i = r.parentNode.parentNode.rowIndex;
                                document.getElementById("table").deleteRow(i);
                            }
                    </script>



                    <script>
                            function tri() {
                              var input, filter, table, tr, td, i;
                              input = document.getElementById("rechercher");
                              filter = input.value.toUpperCase();
                              table = document.getElementById("table");
                              tr = table.getElementsByTagName("tr");
                              for (i = 0; i < tr.length; i++) {
                                td = tr[i].getElementsByTagName("td")[0];
                                td = tr[i].getElementsByTagName("td")[1];
                                if (td) {
                                  if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                                    tr[i].style.display = "";
                                  } else {
                                    tr[i].style.display = "none";
                                  }
                                }
                              }
                            }
                    </script>


                </tbody>
            </table>

        </div>
