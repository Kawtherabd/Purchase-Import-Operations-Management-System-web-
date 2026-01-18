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
    <title>Interface transitaire</title>
</head>
<style>

    .pAccueitablesast{
      display: flow-root; 
      align-items: center;
      justify-content: center;
      background-color: #eefff1;       /*#9ceca6 ;*/
      
      margin-right: 10px;
      margin-left: 280px;
      border-color:white;  /*#488651;*/
      border-width: 1px;
      border-style: solid;
      border-radius: 20px;
      overflow: auto;
  
  }
  .pAccueitable{
      display: flow-root; 
      align-items: center;
      justify-content: center;
      background-color: #eefff1;       /*#9ceca6 ;*/
      
      margin-right: 10px;
      margin-left: 280px;
      border-color:white;  /*#488651;*/
      border-width: 1px;
      border-style: solid;
      border-radius: 20px;
      
  
  }
  
  li p{
    color: white;
        font-family: Arial, Helvetica, sans-serif;
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
        <p>Transitaire</p>
        </div><br>
        
        <div class="Buttons"  >
           <!-- <button    href="#" class="Accueil" onclick="afficherInterface(1)">  <img src="home.png" class="icon"/> Accueil</button>-->
           <ul class="sub-menu">
                <li><p>📒Consultations</p></li>
        
           <li> <button   href="#" class="Accueilbut"   onclick="afficherInterface(2)"> <img src="Capture.PNG" class="icon2"/> Gérer tarifs</button></li>

         <li><button  href="#" class="Accueilbut" onclick="afficherInterface(3)"> <img src="Capture.PNG" class="icon2"/> Consulter bons de commandes</button></li>
        
           <li> <button  href="#" class="Accueilbut" onclick="afficherInterface(4)"> <img src="Capture.PNG" class="icon2"/> Tarifs</button></li>
        
</ul>
            <button  href="#" class="Accueil" onclick="afficherInterface(5)" > <P class="icon3"> ✅ Valider livraisons</P></button>
         
        
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
                <p>Saisir tarifs et autorisations</p>
            </div>
            <br><br><br><br> <br>
            <div class="search-box">			<!-- Création de la division nommé "search-box" -->
                <input class="search-txt" type="text" name="" placeholder="Rechercher">			<!-- Création d'une barre pour taper du texte que j'ai nommé "search-txt" et j'ai fait afficher "Tape ta recherche" dans la barre lorsque la barre est vide -->
                <a class="search-btn" href="#">			<!-- Bouton qui mène à la page actuelle (#) -->
                    <i class="fas fa-search"></i>			<!-- Îcone de recherche importé à partir de fontawesome.com -->
                </a>
            </div><br><br>
            <div class="pAccueitablesast">
                <table>
                    <tr>
                    <td>Nom acheteur</td>
                            <td>Nom fournisseur</td>
                            <td>Adresse fournisseur</td>
                            <td>tél fournisseur</td>
                            <td>numéro bon de commande</td>
                            <td>numéro demande</td>
                            <td>Article</td>
                            <td>Désignation article</td>
                            <td>quantité</td>
                            <td>PU</td>
                            <td>Montant</td>
                            <td>Tarifs et autaurisations</td>
                         
                    </tr>
                    <?php
                               $sql = "SELECT  `Nom_acheteur`, `Nom_fournisseur` , `Adresse_fournisseur`, `Tel_fournisseur`, `Nbon_commande`, `Ndemande`, `Article`, `Designation_article`, `Quantite` , `PU`, `Montant` FROM bondecommandetransitaire";
                               $result = $con->query($sql);
                               if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>" . $row["Nom_acheteur"] . "</td>";
                                    echo "<td>" . $row["Nom_fournisseur"] . "</td>";
                                    echo "<td>" . $row["Adresse_fournisseur"] . "</td>";
                                    echo "<td>" . $row["Tel_fournisseur"] . "</td>";
                                    echo "<td>" . $row["Nbon_commande"] . "</td>";
                                    echo "<td>" . $row["Ndemande"] . "</td>";
                                    echo "<td>" . $row["Article"] . "</td>";
                                    echo "<td>" . $row["Designation_article"] . "</td>";
                                    echo "<td>" . $row["Quantite"] . "</td>";
                                    echo "<td>" . $row["PU"] . "</td>";
                                    echo "<td>" . $row["Montant"] . "</td>";
                                    echo "<td><form method='post' enctype='multipart/form-data'><input type='text' name='tarif' required>
                                    <input type='file' name='auto'><button class='success' name='val'>valider</button></form></td>";
                                    echo "</tr>";
                                    $numdem= $row["Ndemande"] ;
                                    $bon= $row["Nbon_commande"];
                                    
                            }


                            if(isset($_POST['val'])) {
                                $tarif=$_POST['tarif'];
                                
                                
                                 
                                $req="SELECT   `Nbon_commande` FROM `bondecommande` WHERE `Ndemande` = '$numdem'";
                                $result = $con->query($req);
                            
                                
                                
                                    foreach ($result as $row ) {
                                        $bon= $row["Nbon_commande"] ;
                                        
                                        

                                    }
                                    
                                $insertQuery = "INSERT INTO `commandestarifiee` (`id`, `Nbon_commande`, `Tarifs` ) VALUES (NULL, '$bon', '$tarif' )";

                                $acht = "INSERT INTO `nouvellescommandescontroleur` (`id`, `Nbon_commande`, `Tarifs`) VALUES (NULL, '$bon', '$tarif')";


                                 if ($con->query($insertQuery)  && $con->query($acht)  === TRUE) {
                                    $insertMessage = "La demande a été insérée dans la nouvelle table avec succès.";
                                } else {
                                    $insertMessage = "Erreur lors de l'insertion de la demande dans la nouvelle table : " . $con->error;
                                }

                                $deleteQuery = "DELETE FROM `bondecommandetransitaire` WHERE `Ndemande` = '$numdem'";
                                if ($con->query($deleteQuery) === TRUE) {
                                    $deleteMessage = "La demande a été supprimée avec succès.";
                                } else {
                                    $deleteMessage = "Erreur lors de la suppression de la demande : " . $con->error;
                                }
                                
                                    
                            }
                            echo "</tr>";
                        
                        }

                            
                          ?>
                 




                    
                    
                      
                        
                    
                    
                    
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
                    <p>Commandes</p>
                </div>
                <br><br><br><br> <br>
                <div class="search-box">			<!-- Création de la division nommé "search-box" -->
                    <input class="search-txt" type="text" name="" placeholder="Rechercher bon de commande">			<!-- Création d'une barre pour taper du texte que j'ai nommé "search-txt" et j'ai fait afficher "Tape ta recherche" dans la barre lorsque la barre est vide -->
                    <a class="search-btn" href="#">			<!-- Bouton qui mène à la page actuelle (#) -->
                        <i class="fas fa-search"></i>			<!-- Îcone de recherche importé à partir de fontawesome.com -->
                    </a>
                </div><br><br>
                <div class="pAccueitable">
                    <table>
                        <tr>
                            <td>Nom acheteur</td>
                            <td>Nom fournisseur</td>
                            <td>Adresse fournisseur</td>
                            <td>tél fournisseur</td>
                            <td>numéro bon de commande</td>
                            <td>numéro demande</td>
                            <td>Article</td>
                            <td>Désignation article</td>
                            <td>quantité</td>
                            <td>PU</td>
                            <td>Montant</td>
                            
                        </tr>
                        
                        <?php
                               $sql = "SELECT  `Nom_acheteur`, `Nom_fournisseur` , `Adresse_fournisseur`, `Tel_fournisseur`, `Nbon_commande`, `Ndemande`, `Article`, `Designation_article`, `Quantite` , `PU`, `Montant` FROM bondecommande";
                               $result = $con->query($sql);
                               if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>" . $row["Nom_acheteur"] . "</td>";
                                    echo "<td>" . $row["Nom_fournisseur"] . "</td>";
                                    echo "<td>" . $row["Adresse_fournisseur"] . "</td>";
                                    echo "<td>" . $row["Tel_fournisseur"] . "</td>";
                                    echo "<td>" . $row["Nbon_commande"] . "</td>";
                                    echo "<td>" . $row["Ndemande"] . "</td>";
                                    echo "<td>" . $row["Article"] . "</td>";
                                    echo "<td>" . $row["Designation_article"] . "</td>";
                                    echo "<td>" . $row["Quantite"] . "</td>";
                                    echo "<td>" . $row["PU"] . "</td>";
                                    echo "<td>" . $row["Montant"] . "</td>";
                                    echo "</tr>";
                                } 
                            }


                            
                          ?>
                    </table>
                </div>
                <br><br><br>
            </div>
        </div>

    <div id="interface4" class="interface">
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
                <p>Commandes tarifiées</p>
            </div>
            <br><br><br><br> <br>
            <div class="search-box">			<!-- Création de la division nommé "search-box" -->
                <input class="search-txt" type="text" name="" placeholder="Rechercher">			<!-- Création d'une barre pour taper du texte que j'ai nommé "search-txt" et j'ai fait afficher "Tape ta recherche" dans la barre lorsque la barre est vide -->
                <a class="search-btn" href="#">			<!-- Bouton qui mène à la page actuelle (#) -->
                    <i class="fas fa-search"></i>			<!-- Îcone de recherche importé à partir de fontawesome.com -->
                </a>
            </div><br><br>
            <div class="pAccueitable">
                <table>
                    <tr>
                        
                        <td>N° bon de commande</td>
                        
                        
                        <td>Tarifs</td>
                        <td>Autorisations</td>
                        
                    </tr>               
                    <?php
                               $sql = "SELECT `Nbon_commande`, `Tarifs`, `Autorisations` FROM `commandestarifiee`";
                               $result = $con->query($sql);
                               if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>" . $row["Nbon_commande"] . "</td>";
                                    echo "<td>" . $row["Tarifs"] . "</td>";
                                    echo "<td>" . $row["Autorisations"] . "</td>";
                                    
                                    echo "</tr>";
                                } 
                            }


                            
                          ?>
                        
                    
                    
                </table>
            </div>
            <br><br><br>
        </div>
    </div>
    <div id="interface5" class="interface">
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
                <p>Validation des commandes</p>
            </div>
            <br><br><br><br> <br>
            <div class="search-box">			<!-- Création de la division nommé "search-box" -->
                <input class="search-txt" type="text" name="" placeholder="Rechercher">			<!-- Création d'une barre pour taper du texte que j'ai nommé "search-txt" et j'ai fait afficher "Tape ta recherche" dans la barre lorsque la barre est vide -->
                <a class="search-btn" href="#">			<!-- Bouton qui mène à la page actuelle (#) -->
                    <i class="fas fa-search"></i>			<!-- Îcone de recherche importé à partir de fontawesome.com -->
                </a>
            </div><br><br>
            <div class="pAccueitable">
                <table>
                    <tr>
                        <td>N° demande</td>
                        <td>N° lettre de credit</td>
                        <td>Date livraison</td>
                        <td>Validation</td>
                        
                    </tr>
                    <tr>
                    <td>202378656</td>
                        <td>BC2023-5421</td>
                        <td>12/07/2023</td>
                        <td><input type="checkbox"></td>
                        
                    </tr>
                     
                    
                    
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