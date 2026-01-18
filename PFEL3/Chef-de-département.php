<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Assistant.css">
    <script src="Assistant.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/9c46b212c9.js" crossorigin="anonymous"></script>
    <title>Interface du chef de département</title>
</head>
<style>
    .pAccueitable{
    display: flow-root; 
    align-items: center;
    justify-content: center;
    background-color: #eefff1;       /*#9ceca6 ;*/
    
   
    margin-left: 270px;
    border-color:white;  /*#488651;*/
    border-width: 1px;
    border-style: solid;
    border-radius: 20px;
    

}
.Accueilbut {
    display: block;
    width: 225px;
    height: 50px;
    color: white;
    margin: 0px;
    display: flex;
    display: inline;
    background: transparent;
    border: 0;
    padding: 0;
    cursor: pointer;
    text-align: left;
}

.Accueilbut:hover {
    background-color: #3c3a48;
  }
  .Accueilbut:active,
.Accueilbut:focus {
    background-color:  #3c3a48;/* Couleur lorsque le bouton est actif */
  }
  li p{
    color: white;
        font-family: Arial, Helvetica, sans-serif;
    }
</style>
<body>
        <?php
         //inclure la bddd
        include_once "Bddconnexion.php";
        
        ?>

    

    <aside class="sidbar">

        <header>
            <img src="Logo_Algérie_Télécom.svg.PNG"/>
        </header><br>
        
        <div class="iconcenter">
        <img src="person-icon.png"/>
        </div>
        <div class="iconcenter">
        <p>Chef de département</p>
        </div>
        
        <div class="Buttons"  >
          <!--  <button    href="#" class="Accueil" onclick="afficherInterface(1)">  <img src="home.png" class="icon"/> Accueil</button> -->
        
        
            <button   href="#" class="Accueil"   onclick="afficherInterface(2)"> <img src="Capture.PNG" class="icon2"/> Choisir acheteur</button><br>
            <ul class="sub-menu">
                <li><p>📒Consultations</p></li>
        
            <li><button  href="#" class="Accueilbut" onclick="afficherInterface(3)"> <img src="Capture.PNG" class="icon2"/> Consulter demandes </button></li>
            <li><button  href="#" class="Accueilbut" onclick="afficherInterface(4)"> <img src="Capture.PNG" class="icon2"/> Consulter bons de commandes </button></li>
            <li><button  href="#" class="Accueilbut" onclick="afficherInterface(5)"> <img src="Capture.PNG" class="icon2"/> Consulter lettres de rejet </button></li>
            <li><button  href="#" class="Accueilbut" onclick="afficherInterface(6)"> <img src="Capture.PNG" class="icon2"/> Consulter lettres de credit </button></li>
            <li><button  href="#" class="Accueilbut" onclick="afficherInterface(7)"> <img src="Capture.PNG" class="icon2"/> Consulter Livraisons </button></li>
            </ul>
        
            <button  href="#" class="Accueil" onclick="deconnecter()"> <p  class="icon3"> 🛑 &nbsp Déconnecter</p></button>
        </div> 
          
    </aside>

<div id="interfaceContainer">
    <div id="interface2" class="interface">
        <div class="divnav">
        <nav class="navacc">
            <div class="Buttons1">
                   <button href="#" class="Accueil1"> <img src="notif.jpg" class="icon3"/> </button>
            </div> 
        </nav>
        </div>

        <div class="Accueilassist">
            <br>
            <div class="pAccuei">
                <p>Nouvelles demandes</p>
            </div>
            <br><br><br><br> <br>
            <div class="search-box">			<!-- Création de la division nommé "search-box" -->
                <input class="search-txt" type="text" name="" placeholder="Rechercher demande">			<!-- Création d'une barre pour taper du texte que j'ai nommé "search-txt" et j'ai fait afficher "Tape ta recherche" dans la barre lorsque la barre est vide -->
                <a class="search-btn" href="#">			<!-- Bouton qui mène à la page actuelle (#) -->
                    <i class="fas fa-search"></i>			<!-- Îcone de recherche importé à partir de fontawesome.com -->
                </a>
            </div><br><br>
            
            <br>
            <div class="pAccueitable">
                <table>
                    <tr>
                    <td>N°_demande</td>
                        <td>Date</td>
                        <td>référence_marché</td>
                        <td>Département demandeur</td>
                        <td>Motif(s)</td>
                        <td>Article</td>
                        <td>Désignation_article</td>
                        <td>Quantité</td>
                        <td>Lettre</td>
                        
                    </tr>
                    
                    <tr>
                    <?php
                        $sql = "SELECT  `Ndemande`, `Date` , `reference_marche`, `Statuts_demandeur`, `Motifs`, `Article`, `Designation_article`, `Quantite`, `Lettre`  FROM `demandeenvoyee`";
                        $result = $con->query($sql);
                        if ($result->num_rows > 0) {
                            foreach ($result as $row) {
                                echo "<tr>";
                                echo "<td>" . $row["Ndemande"] . "</td>";
                                echo "<td>" . $row["Date"] . "</td>";
                                echo "<td>" . $row["reference_marche"] . "</td>";
                                echo "<td>" . $row["Statuts_demandeur"] . "</td>";
                                echo "<td>" . $row["Motifs"] . "</td>";
                                echo "<td>" . $row["Article"] . "</td>";
                                echo "<td>" . $row["Designation_article"] . "</td>";
                                echo "<td>" . $row["Quantite"] . "</td>";
                                echo "<td>" . $row["Lettre"] . "</td>";
                            
                                echo "<td><button  class='success' onclick='toggleForm()'>Valider</button>";
                                echo "<div id='overlay' onclick='toggleForm()'></div>
                                <div id='formWrapper' class='divform'>
                                      <form method='post' enctype='multipart/form-data'>
                                      <p>Choisir acheteur: </p>
                                      <label for='fname'>N°_demande:</label>
                                      <input type='text' id='fname' name='dem' class='forminput'required><br><br>
                                      <label for='fname'>Acheteur:</label>
                                      <select name='employe' id='employe'><br><br>";
                                      $sel = "SELECT `Nom` , `Prenom` FROM `employé` WHERE Poste = 'Acheteur'";
                                      $result = $con->query($sel);
                                      if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            echo "<option>" . $row["Nom"] . " ".$row["Prenom"] . "</option>";
                                        }
                                    }

                                echo "</select><div class='butend'><button  class='success' name='val'>Valider</button></div>
                                  </form> </div>
                                  </div>
                              </td>";

                                 
                                

                                if(isset($_POST['val'])) {
                                    $numdemande=$_POST['dem'];
                                    $acheteur=$_POST['employe'];

                                    
                                     
                                    $req="SELECT  `Ndemande`, `Date` , `reference_marche`, `Statuts_demandeur`, `Motifs`, `Article`, `Designation_article`, `Quantite`, `Lettre` FROM `demandeenvoyeechd` WHERE `Ndemande` = '$numdemande'";
                                    $result = $con->query($req);
                                
                                    
                                    
                                        foreach ($result as $row ) {
                                            $demande= $row["Ndemande"] ;
                                            $date= $row["Date"] ;
                                            $ref=$row["reference_marche"] ;
                                            $status= $row["Statuts_demandeur"] ;
                                            $motid= $row["Motifs"] ;
                                            $article= $row["Article"] ;
                                            $designation= $row["Designation_article"] ;
                                            $qte= $row["Quantite"] ;
                                            $lettre =$row["Lettre"] ;
                                            
                                            

                                        }
                                        
                                    $insertQuery = "INSERT INTO `demandesenvoyeechdacheteur` (`id`, `Ndemande`, `Date`, `reference_marche`, `Statuts_demandeur`, `Motifs`, `Article`, `Designation_article`, `Quantite`, `Lettre`, `Nom_acheteur`) VALUES (NULL, '$demande', '$date', '$ref', '$status', '$motid', '$article', '$designation', '$qte', '$lettre' , '$acheteur')";
                                    $acht = "INSERT INTO `nouvellesdemandesacheteur` (`id`, `Ndemande`, `Date`, `reference_marche`, `Statuts_demandeur`, `Motifs`, `Article`, `Designation_article`, `Quantite`, `Lettre`,  `Nom_acheteur`) VALUES (NULL, '$demande', '$date', '$ref', '$status', '$motid', '$article', '$designation', '$qte', '$lettre' , '$acheteur')";
                                    

                                     if ($con->query($insertQuery)  && $con->query($acht)  === TRUE) {
                                        $insertMessage = "La demande a été insérée dans la nouvelle table avec succès.";
                                    } else {
                                        $insertMessage = "Erreur lors de l'insertion de la demande dans la nouvelle table : " . $con->error;
                                    }

                                    $deleteQuery = "DELETE FROM `demandeenvoyeechd` WHERE `Ndemande` = '$numdemande'";
                                    if ($con->query($deleteQuery) === TRUE) {
                                        $deleteMessage = "La demande a été supprimée avec succès.";
                                    } else {
                                        $deleteMessage = "Erreur lors de la suppression de la demande : " . $con->error;
                                    }
                                    
                                        
                                }
                                echo "</tr>";
                            }
                     }
                   

                        ?>
                    </tr>
                    
                    
                    
            
                    
                    
                    
                </table>  
            </div>
            <br><br><br>
        </div>
    </div>


    <div id="interface3" class="interface">
        <div class="divnav">
        <nav class="navacc">
            <div class="Buttons1">
                   <button href="#" class="Accueil1"> <img src="notif.jpg" class="icon3"/> </button>
            </div> 
        </nav>
        </div>

        <div class="Accueilassist">
            <br>
            <div class="pAccuei">
                <p>Demandes envoyées</p>
            </div>
            
            <br><br><br><br> <br>
            <div class="search-box">			<!-- Création de la division nommé "search-box" -->
                <input class="search-txt" type="text" name="" placeholder="Rechercher demande">			<!-- Création d'une barre pour taper du texte que j'ai nommé "search-txt" et j'ai fait afficher "Tape ta recherche" dans la barre lorsque la barre est vide -->
                <a class="search-btn" href="#">			<!-- Bouton qui mène à la page actuelle (#) -->
                    <i class="fas fa-search"></i>			<!-- Îcone de recherche importé à partir de fontawesome.com -->
                </a>
            </div><br><br>
            <div class="pAccueitable">
                <table>
                    <tr>
                    <td>N°_demande</td>
                        <td>Date</td>
                        <td>référence_marché</td>
                        <td>Département demandeur</td>
                        <td>Motif(s)</td>
                        <td>Article</td>
                        <td>Désignation_article</td>
                        <td>Quantité</td>
                        <td>Lettre</td>
                      
                        <td>Acheteur</td>
                    </tr>
                    
                    <?php
                               $aff = "SELECT   `Ndemande`, `Date`, `reference_marche`, `Statuts_demandeur`, `Motifs`, `Article`, `Designation_article`, `Quantite`, `Lettre`, `demande` , `Nom_acheteur` FROM demandesenvoyeechdacheteur";
                               $result = $con->query($aff);
                               if ($result->num_rows > 0) {
                                foreach ($result as $row) {
                                    echo "<tr>";
                                    echo "<td>" . $row["Ndemande"] . "</td>";
                                    echo "<td>" . $row["Date"] . "</td>";
                                    echo "<td>" . $row["reference_marche"] . "</td>";
                                    echo "<td>" . $row["Statuts_demandeur"] . "</td>";
                                    echo "<td>" . $row["Motifs"] . "</td>";
                                    echo "<td>" . $row["Article"] . "</td>";
                                    echo "<td>" . $row["Designation_article"] . "</td>";
                                    echo "<td>" . $row["Quantite"] . "</td>";
                                    echo "<td>" . $row["Lettre"] . "</td>";
                                    echo "<td>" . $row["Nom_acheteur"] . "</td>";
                                    echo "</tr>";
                                } 
                            }


                            $con->close();
                          ?>
                        
                    
                </table>
            </div>
            <br><br><br>
        </div>
    
    </div>

                        </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script>
    function deconnecter() {
      // Mettez ici le code pour déconnecter l'utilisateur
      // ...

      // Redirection vers la page d'authentification
      window.location.href = "Accueil.html";
    }
  </script>

</body>
</html>