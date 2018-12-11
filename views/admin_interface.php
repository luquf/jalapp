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
            
                

<?php

include('connect-mysql.php');
$sqlget = "SELECT * FROM utilisateurs";
$sqldata = mysqli_query($dbcon, $sqlget) or die ('error getting');

echo "<table>";
echo "<thead><tr> <th>ID</th> <th>Nom</th> <th>Prénom</th> <th>Téléphone</th> <th>Email</th> </tr> </thead>";

while ($row = mysqli_fetch_array($sqldatqa, MYSQLI_ASSOC)) {
    echo "<tr><td>";
    echo $row["cle"];
    echo "</tr></td>";
    echo "<tr><td>";
    echo $row["nom"];
    echo "</tr></td>";
    echo "<tr><td>";
    echo $row["prenom"];
    echo "</tr></td>";
    echo "<tr><td>";
    echo $row["telephone"];
    echo "</tr></td>";
    echo "<tr><td>";
    echo $row["email"];
    echo "</tr></td>";
}
?>
    <td><input class ="button" type="button" value="X" onclick="deleteRow(this);"></td>

                    
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
	</br>
