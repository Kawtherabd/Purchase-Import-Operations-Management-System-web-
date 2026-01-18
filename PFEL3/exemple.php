<!DOCTYPE html>
<html>
<head>
<style>
        table {
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid black;
        }
    </style>
    <title>Affichage des éléments de la table</title>
</head>
<body>

<?php


//connexion a la bdd
$con = mysqli_connect("localhost","root","","importations");
if(!$con){
   echo "Vous n'êtes pas connecté à la base de donnée";
}






// Vérification de la connexion
if ($con->connect_error) {
    die("Erreur de connexion à la base de données : " . $con->connect_error);
}

// Requête SQL pour récupérer tous les éléments de la table
$sql = "SELECT * FROM demande";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    /*echo "<table>";
    echo "<tr><th>n°demande</th><th>Date</th><th>ref</th><th>status</th><th>Motif</th><th>article</th><th>designation</th><th>qt</tr><th>lettre</th>";*/

    // Affichage des données pour chaque ligne
    while ($row = $result->fetch_assoc()) { echo $row["Lettre"];
    }
    /*echo "</table>";*/
} else {
    echo "Aucun élément trouvé dans la table.";
}

// Fermeture de la connexion à la base de données
$con->close();
?>

</body>
</html>
