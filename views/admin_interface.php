<?php

session_start();

require_once __DIR__ . '/../controllers/admin_interface.php';

if (!isset($_SESSION["connected"]) || $_SESSION["connected"] == "false") {
    header("Location: inscription.php");
    exit();
} else {
    if (isset($_SESSION["is_admin"]) && $_SESSION["is_admin"] == 0) {
        header("Location: domicile.php");
        exit();
    }
}

$page = testinput((int) $_GET["page"]);
if (!isset($page) || $page == "" || $page == 0) {
    header("Location: admin_interface.php?page=1");
}

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
        <link rel="stylesheet" href="../public/css/admin_interface.css" />
        <link rel="icon" type="image/png" href="../public/assets/favicon.png" />
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
		<title>Domisep : Accueil</title>
	</head>

	<body>

    <div id="bandeau">
				<div class="logo">
					<a href="admin_interface.php"> <img id="logo" src="../public/assets/logo.png" alt = "Logo Domisep" title = "Logo Domisep" />
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
                        <th>Suppression</th>
                    </tr>
                </thead>


                <tbody id="table">
                <?php
$utilisateur = getUsersAdmin();
$up = getUsersAdmin();

if (count($utilisateur) == 0) {
    echo "<p style='text-align: center;'><i class='fa fa-exclamation-triangle'></i> Pas d'utilisateurs</p>";
} else {
    foreach (array_slice($utilisateur, ($page * 10) - 10, 10) as $utilisateur) {
        echo "
                                <tr>
                                <td><a href= 'capteurs_admin.php?selected=" . $utilisateur[0] . "' class='lien_ID'>" . $utilisateur[0] . "</td>
                                <td><a href= 'capteurs_admin.php?selected=" . $utilisateur[0] . "' class='lien_ID'>" . $utilisateur[1] . "</a></td>
                                <td><a href= 'capteurs_admin.php?selected=" . $utilisateur[0] . "' class='lien_ID'>" . $utilisateur[2] . "</a></td>
                                <td><a href= 'capteurs_admin.php?selected=" . $utilisateur[0] . "' class='lien_ID'>" . $utilisateur[3] . "</a></td>
                                <td><a href= 'capteurs_admin.php?selected=" . $utilisateur[0] . "' class='lien_ID'>" . $utilisateur[8] . "</a></td>
                                <form method='post' action='../controllers/admin_interface.php'>
								<td class = delete><input type='hidden' value='".$utilisateur[0]."' name='user' id='user'/>
								<input type='hidden' value='del_user' name='action' id='action'/>
								<button id= buttondelete  type='submit'><i class='fa fa-trash' style='color:red;'></i></button></td>
                                </form>";
    }
}
?>
                </tbody>
            </table>

            <script>
                            function tri() {
                              var input, filter, table, tr, td, i;
                              input = document.getElementById("rechercher");
                              filter = input.value.toUpperCase();
                              table = document.getElementById("table");
                              tr = table.getElementsByTagName("tr");
                              for (i = 0; i < tr.length; i++) {
                                td1 = tr[i].getElementsByTagName("td")[0];
                                if (td1) {
                                  if (td1.innerHTML.toUpperCase().indexOf(filter) > -1) {
                                    tr[i].style.display = '';
                                  } else {
                                    tr[i].style.display = 'none';
                                  }
                                }
                                td2 = tr[i].getElementsByTagName("td")[1];
                                if (td2) {
                                  if (td2.innerHTML.toUpperCase().indexOf(filter) > -1) {
                                    tr[i].style.display = '';
                                  } else {
                                    tr[i].style.display = 'none';
                                  }
                                }
                                td3 = tr[i].getElementsByTagName("td")[2];
                                if (td3) {
                                  if (td3.innerHTML.toUpperCase().indexOf(filter) > -1) {
                                    tr[i].style.display = '';
                                  } else {
                                    tr[i].style.display = 'none';
                                  }
                                }
                                td4 = tr[i].getElementsByTagName("td")[3];
                                if (td4) {
                                  if (td4.innerHTML.toUpperCase().indexOf(filter) > -1) {
                                    tr[i].style.display = '';
                                  } else {
                                    tr[i].style.display = 'none';
                                  }
                                }


                              }
                            }
                    </script>


          <?php
$previous = $page - 1;
$next = $page + 1;
if ($page == 1) {
    echo "<p class='page-button' style='margin-right: 1%;color: #96999e;'><i class='fa fa-arrow-left'></i></p> ";
} else {
    echo "<a class='page-button' href='admin_interface.php?page=" . $previous . "' style='margin-right: 1%;'><i class='fa fa-arrow-left'></i></a> ";
}
if (((($page-1)*10)+1>count($up)) || ((($page-1)*10)+10>count($up))) {
    echo "<p class='page-button' style='margin-left: 1%;color: #96999e;'><i class='fa fa-arrow-right'></i></p> ";
} else if ((($page-1)*10)+10>=count($up)) {
    echo "<p class='page-button' style='margin-left: 1%;color: #96999e;'><i class='fa fa-arrow-right'></i></p> ";
} else {
    echo "<a class='page-button' href='admin_interface.php?page=" . $next . "' style='margin-left: 1%;'><i class='fa fa-arrow-right'></i></a>";
}
?>
        </div>
  </body>
</html>
