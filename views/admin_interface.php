<?php

session_start();

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
                        <th>Téléphone</th>
                        <th>Email</th>
                    </tr>
                </thead>


                <tbody id="table">
                    
                    <script type="text/javascript">
                            function deleteRow(r)
                            {
                                var i = r.parentNode.parentNode.rowIndex;
                                document.getElementById("table").deleteRow(i);
                            }
                    </script>

                    <tr>
                        <td><a href= "capteurs_admin.php" class="lien_ID"> 0000000001 </a></td>
                        <td>Nom 1</td>
                        <td>Prenom 1</td>
                        <td>0633058516</td>
                        <td>Email@email.com</td>
                        <td><input class ="button" type="button" value="X" onclick="deleteRow(this);"></td>
                    </tr>

                    <tr>
                        <td><a href= "capteurs_admin.php" class="lien_ID">0000000002 </a></td>
                        <td>Nom 2</td>
                        <td>Prenom 2</td>
                        <td>Téléphone 2</td>
                        <td>Email@email.com</td>
                        <td><input class ="button" type="button" value="X" onclick="deleteRow(this);"></td>
                    </tr>

                    <tr>
                        <td><a href= "capteurs_admin.php" class="lien_ID">0000000003 </a></td>
                        <td>Nom 3</td>
                        <td>Prenom 3</td>
                        <td>Téléphone 3</td>
                        <td>Email@email.com</td>
                        <td><input class ="button" type="button" value="X" onclick="deleteRow(this);"></td>
                    </tr>

                    <tr>
                        <td><a href= "capteurs_admin.php" class="lien_ID">0000000004 </a></td>
                        <td>Nom 4</td>
                        <td>Prenom 4</td>
                        <td>Téléphone 4</td>
                        <td>Email@email.com</td>
                        <td><input class ="button" type="button" value="X" onclick="deleteRow(this);"></td>
                    </tr>

                    <tr>
                        <td><a href= "capteurs_admin.php" class="lien_ID">0000000005 </a> </td>
                        <td>Nom 5</td>
                        <td>Prenom 5</td>
                        <td>Téléphone 5</td>
                        <td>Email@email.com</td>
                        <td><input class ="button" type="button" value="X" onclick="deleteRow(this);"></td>
                    </tr>

                    <tr>
                        <td><a href= "capteurs_admin.php" class="lien_ID">0000000006 </a> </td>
                        <td>Nom 6</td>
                        <td>Prenom 6</td>
                        <td>Téléphone 6</td>
                        <td>Emoomail@email.com</td>
                        <td><input class ="button" type="button" value="X" onclick="deleteRow(this);"></td>
                    </tr>
                    <tr>
                        <td><a href= "capteurs_admin.php" class="lien_ID">0000000007 </a></td>
                        <td>Nom 7</td>
                        <td>Prenom 7</td>
                        <td>Téléphone 7</td>
                        <td>Email@email.com</td>
                        <td><input class ="button" type="button" value="X" onclick="deleteRow(this);"></td>
                    </tr>

                    <tr>
                        <td><a href= "capteurs_admin.php" class="lien_ID"e>0000000008 </a></td>
                        <td>Nom 8</td>
                        <td>Prenom 8</td>
                        <td>Téléphone 8</td>
                        <td>Email@email.com</td>
                        <td><input class ="button" type="button" value="X" onclick="deleteRow(this);"></td>
                    </tr>

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
	</br>
