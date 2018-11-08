<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
        <link rel="stylesheet" href="../public/css/admin_interface.css" />
		<title>Domisep : Accueil</title>
	</head>

	<body>
		<div id="bandeau">
			<div class="logo">
				<p>
					<a href="accueil.php"> <img src="../public/assets/logo.png" alt = "Logo Domisep" title = "Logo Domisep" style="width: 150px; height: auto;" /> 
				</p>
			</div>

			<div class="deconnexion">
				<p>
                </br>	
                    <a href="admin_reglages.php" style="color : #fff; text-decoration : underline;">Préférences</a>			
					<a href= "accueil.php" style="color: #fff; text-decoration: underline;">Déconnexion </a> 
				</p>
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
                    <th>Dernière connexion</th>
                    <th>Supprimer un utilisateur</th>
                </tr>
                </thead>
            </table>
            <table id="table">
                <tbody>
                    <script type="text/javascript">
                            function deleteRow(r) 
                            {
                                var i = r.parentNode.parentNode.rowIndex;
                                document.getElementById("table").deleteRow(i);
                            }
                    </script>
                    <tr>
                        <td>0000000001</td>
                        <td>Nom 1</td>
                        <td>Prenom 1</td>
                        <td>Téléphone 1</td>
                        <td>Email@email.com</td>
                        <td>01/01/2000</td>
                        <td><input class ="button" type="button" value="X" onclick="deleteRow(this);"></td>
                    </tr>
                    <tr>
                        <td>0000000002</td>
                        <td>Nom 2</td>
                        <td>Prenom 2</td>
                        <td>Téléphone 2</td>
                        <td>Email@email.com</td>
                        <td>01/01/2000</td>
                        <td><input class ="button" type="button" value="X" onclick="deleteRow(this);"></td>
                    </tr>
                    <tr>
                        <td>0000000003</td>
                        <td>Nom 3</td>
                        <td>Prenom 3</td>
                        <td>Téléphone 3</td>
                        <td>Email@email.com</td>
                        <td>01/01/2000</td>
                        <td><input class ="button" type="button" value="X" onclick="deleteRow(this);"></td>
                    </tr>
                    <tr>
                        <td>0000000004</td>
                        <td>Nom 4</td>
                        <td>Prenom 4</td>
                        <td>Téléphone 4</td>
                        <td>Email@email.com</td>
                        <td>01/01/2000</td>
                        <td><input class ="button" type="button" value="X" onclick="deleteRow(this);"></td>
                    </tr>
                    <tr>
                        <td>0000000005</td>
                        <td>Nom 5</td>
                        <td>Prenom 5</td>
                        <td>Téléphone 5</td>
                        <td>Email@email.com</td>
                        <td>01/01/2000</td>
                        <td><input class ="button" type="button" value="X" onclick="deleteRow(this);"></td>
                    </tr>
                    <tr>
                        <td>0000000006</td>
                        <td>Nom 6</td>
                        <td>Prenom 6</td>
                        <td>Téléphone 6</td>
                        <td>Email@email.com</td>
                        <td>01/01/2000</td>
                        <td><input class ="button" type="button" value="X" onclick="deleteRow(this);"></td>
                    </tr>
                    <tr>
                        <td>0000000007</td>
                        <td>Nom 7</td>
                        <td>Prenom 7</td>
                        <td>Téléphone 7</td>
                        <td>Email@email.com</td>
                        <td>01/01/2000</td>
                        <td><input class ="button" type="button" value="X" onclick="deleteRow(this);"></td>
                    </tr>
                    <tr>
                        <td>0000000008</td>
                        <td>Nom 8</td>
                        <td>Prenom 8</td>
                        <td>Téléphone 8</td>
                        <td>Email@email.com</td>
                        <td>01/01/2000</td>
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