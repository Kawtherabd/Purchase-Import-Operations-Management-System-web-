<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="Assistant.css">
     <script src="Assistant.js"></script>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
     <script src="https://kit.fontawesome.com/9c46b212c9.js" crossorigin="anonymous"></script>
     <title>Interface de Assitant</title>
</head>
<style>
    .msgintrv{
        background-color:#211f25;  
    border-color:white ;
    border-width: 1px;
    border-style: solid;
    border-radius: 20px;
    color: white;
    display::flex;
    
    z-index: 9999;
    }

   
    
  .pAccueitable{
    display: flow-root; 
    align-items: center;
    justify-content: center;
    background-color: #eefff1;       /*#9ceca6 ;*/
    
   
    margin-left: 280px;
    border-color:white;  /*#488651;*/
    border-width: 1px;
    border-style: solid;
    border-radius: 20px;
    

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
        <hr><br>
        <div class="iconcenter">
        <img src="person-icon.png"/>
        </div>
        <div class="iconcenter">
        <p>Assistant</p>
        </div><br>
        
        <div class="Buttons"  >
            <!--<button    href="#" class="Accueil" onclick="afficherInterface(1)">  <img src="home.png" class="icon"/> Accueil</button>-->
        
        
            <button   href="#" class="Accueil"   onclick="afficherInterface(2)"> <img src="Capture.PNG" class="icon2"/> Vérifier demandes</button>
        
        
            <button  href="#" class="Accueil" onclick="afficherInterface(3)"> <img src="Capture.PNG" class="icon2"/> Consulter envoyées</button>
        
        
            
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
                <p>Vérifier demandes</p>
            </div>
              
          

            <br><br><br><br> <br>
            <form  methode="GET">
            <div class="search-box">
                			<!-- Création de la division nommé "search-box" -->
                <input class="search-txt" type="search" name="searchdemande" placeholder="Rechercher demande">			<!-- Création d'une barre pour taper du texte que j'ai nommé "search-txt" et j'ai fait afficher "Tape ta recherche" dans la barre lorsque la barre est vide -->
                <a class="search-btn"   name="rech">			<!-- Bouton qui mène à la page actuelle (#) -->
                    <i class="fas fa-search"></i>			<!-- Îcone de recherche importé à partir de fontawesome.com -->
                </a>

              
                
            </div><br><br>
                </form>
            
            <br>
            <div class="table-container">
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


                           $allusers = $con->query('SELECT * FROM nouvellesdemandesassistant');
                            if (isset($_GET['searchdemande']) AND !empty($_GET['searchdemande'])){
                              $recherche = htmlspecialchars($_GET['searchdemande']);
                            $allusers = $con->query('SELECT * FROM nouvellesdemandesassistant WHERE Ndemande LIKE "%'.$recherche.'%" ');
                          }


                       
                        
                        /*$sql = "SELECT  `Ndemande`, `Date` , `reference_marche`, `Statuts_demandeur`, `Motifs`, `Article`, `Designation_article`, `Quantite`, `Lettre` FROM nouvellesdemandesassistant";
                        $result = $con->query($sql);*/
                        if ($allusers->num_rows > 0) {
                            while ($row = $allusers->fetch_assoc()) {
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
                                echo "<td><button class='success' onclick='toggleForm()'>Valider</button>";
                                echo "<div id='overlay' onclick='toggleForm()'></div>
                                      <div id='formWrapper' class='divform'>
                                      <form method='post' enctype='multipart/form-data'>
                                   <label for='fname'>N°_demande:</label>
                                   <input type='text' id='fname' name='dem' class='forminput'required><br><br>
                                   <div class='butend'><button  class='success' name='chd'>Envoyer CHD</button></div>
                                  </form>";

                                 
                                

                                if(isset($_POST['chd'])) {
                                    $numdemande=$_POST['dem'];
                                  
                                  
                                     
                                    $req="SELECT  `Ndemande`, `Date` , `reference_marche`, `Statuts_demandeur`, `Motifs`, `Article`, `Designation_article`, `Quantite`, `Lettre` FROM `nouvellesdemandesassistant` WHERE `Ndemande` = '$numdemande'";
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
                                        
                                        $insertQuery = "INSERT INTO `demandeenvoyee` (`id`, `Ndemande`, `Date`, `reference_marche`, `Statuts_demandeur`, `Motifs`, `Article`, `Designation_article`, `Quantite`, `Lettre` ) VALUES (NULL, '$demande', '$date', '$ref', '$status', '$motid', '$article', '$designation', '$qte', '$lettre')";

                                        if ($con->query($insertQuery) === TRUE) {
                                            $insertMessage = "La demande a été insérée dans la nouvelle table avec succès.";
                                        
                                            // Maintenant, copiez les données dans l'autre table
                                            $lastInsertedId = $con->insert_id; // Récupérez l'ID de la dernière insertion
                                            $chd = "INSERT INTO `demandeenvoyeechd` SELECT * FROM `demandeenvoyee` WHERE `id` = $lastInsertedId";
                                        
                                            if ($con->query($chd) === TRUE) {
                                                $insertMessage .= " Les données ont été copiées dans la deuxième table avec succès.";
                                            } else {
                                                $insertMessage .= " Erreur lors de la copie des données dans la deuxième table : " . $con->error;
                                            }
                                        } else {
                                            $insertMessage = "Erreur lors de l'insertion de la demande dans la première table : " . $con->error;
                                        }
                                        
                                        $deleteQuery = "DELETE FROM `nouvellesdemandesassistant` WHERE `Ndemande` = '$numdemande'";
                                        if ($con->query($deleteQuery) === TRUE) {
                                            $deleteMessage = "La demande a été supprimée avec succès.";
                                        } else {
                                            $deleteMessage = "Erreur lors de la suppression de la demande : " . $con->error;
                                        }
                                        
                                    
                                        
                                }
                                
                                echo "</tr>";
                            }
                     }else{
                       echo " <tr><td> <div class='msgintrv'>
                              <br>
                             <p> Demande introuvable </p>
                              </div> </td></tr>";
                     }
                        ?>

                        

                          
                            </div>
                        </td>
                    </tr>
                    
                </table>  
            </div></div>
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
                <p>Consulter demandes</p>
            </div>
            
            <br><br><br><br> <br>
            <div class="search-box">			<!-- Création de la division nommé "search-box" -->
                <input class="search-txt" type="text" name="" placeholder="Rechercher demande">			<!-- Création d'une barre pour taper du texte que j'ai nommé "search-txt" et j'ai fait afficher "Tape ta recherche" dans la barre lorsque la barre est vide -->
                <a class="search-btn" href="#">			<!-- Bouton qui mène à la page actuelle (#) -->
                    <i class="fas fa-search"></i>			<!-- Îcone de recherche importé à partir de fontawesome.com -->
                </a>
            </div><br><br>
            <div class="table-container">
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
                    <?php
                               $sql = "SELECT  `Ndemande`, `Date` , `reference_marche`, `Statuts_demandeur`, `Motifs`, `Article`, `Designation_article`, `Quantite`, `Lettre` FROM demandeenvoyee";
                               $result = $con->query($sql);
                               if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
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
