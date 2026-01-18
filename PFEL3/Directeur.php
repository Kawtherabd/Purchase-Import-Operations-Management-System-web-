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
    <title>Interface du directeur</title>
</head>
<style>
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

.pAccueitableg{
      display: flow-root; 
      align-items: center;
      justify-content: center;
      background-color: #eefff1;       /*#9ceca6 ;*/
      
      margin-right: 10px;
      margin-left: 270px;
      border-color:white;  /*#488651;*/
      border-width: 1px;
      border-style: solid;
      border-radius: 20px;
      width: 1500px ;
      
  
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
        <br>
        <div class="iconcenter">
        <img src="person-icon.png"/>
        </div>
        <div class="iconcenter">
        <p>Directeur</p>
        </div>
        
        <div class="Buttons"  >
        
        
            <ul class="sub-menu">
                <li><p>📒Consultations</p></li>
        
            <li><button  href="#" class="Accueilbut" onclick="afficherInterface(1)"> <img src="Capture.PNG" class="icon2"/> Consulter demandes </button></li>
            <li><button  href="#" class="Accueilbut" onclick="afficherInterface(2)"> <img src="Capture.PNG" class="icon2"/> Consulter bons de commandes </button></li>
            <li><button  href="#" class="Accueilbut" onclick="afficherInterface(3)"> <img src="Capture.PNG" class="icon2"/> Consulter lettres de rejet </button></li>
            <li><button  href="#" class="Accueilbut" onclick="afficherInterface(4)"> <img src="Capture.PNG" class="icon2"/> Consulter lettres de credit </button></li>
            <li><button  href="#" class="Accueilbut" onclick="afficherInterface(5)"> <img src="Capture.PNG" class="icon2"/> Consulter Livraisons </button></li>
            </ul>
        
        
            <button  href="#" class="Accueil" onclick="deconnecter()"> <p  class="icon3"> 🛑 &nbsp Déconnecter</p></button>
        </div> 
        
   
    </aside>

    <div id="interfaceContainer">
        <div id="interface1" class="interface">
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
    
    
                              
                              ?>
                        
                        
                        
                    </table>
                </div>
                <br><br><br>
            </div>
                            </div>
        </div>
    
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
                    <p>Bons de commande</p>
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
                    <p>Lettres de rejet</p>
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
                            <td>Date</td>
                            <td>département demandeur</td>
                            <td>N°demande</td>
                            <td>Motif</td>
                        </tr>   
                        
                    <?php
                               $sql = "SELECT  `Date`, `status_demandeur` , `Ndemande`, `Motifs` FROM lettredurejet";
                               $result = $con->query($sql);
                               if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>" . $row["Date"] . "</td>";
                                    echo "<td>" . $row["status_demandeur"] . "</td>";
                                    echo "<td>" . $row["Ndemande"] . "</td>";
                                    echo "<td>" . $row["Motifs"] . "</td>";
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
                    <p>Lettres de credit</p>
                </div>
                
                <br><br><br><br> <br>
                <div class="search-box">			<!-- Création de la division nommé "search-box" -->
                    <input class="search-txt" type="text" name="" placeholder="Rechercher lettre">			<!-- Création d'une barre pour taper du texte que j'ai nommé "search-txt" et j'ai fait afficher "Tape ta recherche" dans la barre lorsque la barre est vide -->
                    <a class="search-btn" href="#">			<!-- Bouton qui mène à la page actuelle (#) -->
                        <i class="fas fa-search"></i>			<!-- Îcone de recherche importé à partir de fontawesome.com -->
                    </a>
                </div><br><br>
                <div class="pAccueitableg">
                    <table>
                        <tr>
                            <td>N°lettre</td>
                            <td>Type d'engagement</td>
                            <td>N°bon de commande</td>
                            <td>Nom fournisseur</td>
                            <td>Montant</td>
                            <td>Crédit documentaire</td>
                            <td>Designation article</td>
                            <td>Tarif douanier</td>
                            <td>Terme de vente</td>
                            <td>Mode d'expédition</td>
                            <td>Transbordement</td>
                            <td>Expédition partielle</td>
                            <td>Lieu de chargement</td>
                            <td>Nom banque</td>
                            <td>Adresse bancaire</td>
                            <td>Nom compte</td>
                    </tr>
                    <?php
                           $sql = "SELECT   `Nletrre`,`Type_engagement`, `Nbon_commande`, `Nom_fournisseur`, `Montant`, `Credit_docummentaire`, `Designation_article`, `Tarif_douanier`, `Terme_vente`, `Mode_expedition`,  `Transbordement`, `exppart` ,`lieudechargement`, `Nombanque` , `Adressebancaire` , `Nomcompte` FROM lettredecredit";
                           $result = $con->query($sql);
                           if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row["Nletrre"] . "</td>";
                                echo "<td>" . $row["Type_engagement"] . "</td>";
                                echo "<td>" . $row["Nbon_commande"] . "</td>";
                                echo "<td>" . $row["Nom_fournisseur"] . "</td>";
                                echo "<td>" . $row["Montant"] . "</td>";
                                echo "<td>" . $row["Credit_docummentaire"] . "</td>";
                                echo "<td>" . $row["Designation_article"] . "</td>";
                                echo "<td>" . $row["Tarif_douanier"] . "</td>";
                                echo "<td>" . $row["Terme_vente"] . "</td>";
                                echo "<td>" . $row["Mode_expedition"] . "</td>";
                                echo "<td>" . $row["Transbordement"] . "</td>";
                                echo "<td>" . $row["exppart"] . "</td>";
                                echo "<td>" . $row["lieudechargement"] . "</td>";
                                echo "<td>" . $row["Nombanque"] . "</td>";
                                echo "<td>" . $row["Adressebancaire"] . "</td>";
                                echo "<td>" . $row["Nomcompte"] . "</td>";
                                echo "</tr>";
                            } 
                        }


                       
                      ?>
                        
                       
                        
                    </table>
                    <br><br>
                </div>
                
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
                <p>validations</p>
            </div>
            <br><br><br><br> <br>
            <div class="search-box">			<!-- Création de la division nommé "search-box" -->
                <input class="search-txt" type="text" name="" placeholder="Rechercher ">			<!-- Création d'une barre pour taper du texte que j'ai nommé "search-txt" et j'ai fait afficher "Tape ta recherche" dans la barre lorsque la barre est vide -->
                <a class="search-btn" href="#">			<!-- Bouton qui mène à la page actuelle (#) -->
                    <i class="fas fa-search"></i>			<!-- Îcone de recherche importé à partir de fontawesome.com -->
                </a>
            </div><br><br>
            <div class="pAccueitable">
                <table>
                    <tr>
                        
                        <td>N° bon de commande</td>
                        <td>N° lettre de credit</td>
                        <td>Date de recéption</td>
                        <td>validation</td>
                        
                    </tr>
                    <tr>
                    <td>202378656</td>
                        <td>BC2023-5421</td>
                        <td>12/07/2023</td>
                        <td><input type="checkbox"></td>
                        
                    </tr>
                          
                    <?php
                        $sql = "SELECT  `Nbon_commande`, `Nletrre`, `date`  FROM validations";
                        $result = $con->query($sql);
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row["Nbon_commande"] . "</td>";
                                echo "<td>" . $row["Nletrre"] . "</td>";
                                echo "<td>" . $row["date"] . "</td>";
                                echo"<td><input type='checkbox'></td>";
                                
                                

                                



                            }}

                                  ?>

                               




                    
                    
                    
                    
                </table>
            </div>
            <br><br><br>
        </div>
    </div>
    
    
    
    
    



        
    
    
    
    
    </div>
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