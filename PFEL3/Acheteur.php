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
    <title>Interface de l'acheteur</title>
</head>
<style>
    
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
.pAccueitabledem{
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
    
    overflow: auto;
}
.Accueilassist{
    background-color:#d8eedb;   
    height: 100vh;
    width: 100%;
    flex-direction: column; 
    overflow: auto;
    
  
    /*position: relative;*/
}
.Accueilacheteurbut {
    display: block;
    width: 225px;
    height: 45px;
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
.Accueilacheteurbut:hover {
    background-color: #3c3a48;
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
        <p>Acheteur</p>
        </div>
        
        <div class="Buttons"  >
           <!-- <button    href="#" class="Accueilacheteur" onclick="afficherInterface(1)">  <img src="home.png" class="icon"/> Accueil</button>-->
        
        
            <button   href="#" class="Accueilacheteur"   onclick="afficherInterface(2)"> <img src="Capture.PNG" class="icon2"/> Gérer demandes</button>
        
        
            <ul class="sub-menu">
                <li><p>📒Consultations</p></li>

           <li> <button  href="#" class="Accueilacheteurbut" onclick="afficherInterface(3)"> <img src="Capture.PNG" class="icon2"/> Bons de commande</button></li>

           <li> <button  href="#" class="Accueilacheteurbut" onclick="afficherInterface(4)"> <img src="Capture.PNG" class="icon2"/> Demandes rejetées</button></li>


           <li> <button  href="#" class="Accueilacheteurbut" onclick="afficherInterface(5)"> <img src="Capture.PNG" class="icon2"/> Lettres de credit</button></li>

           <li> <button  href="#" class="Accueilacheteurbut" onclick="afficherInterface(6)"> <P class="icon3"> ✅ Fixer dates des livraisons</P></li>

           <li> <button  href="#" class="Accueilacheteurbut" onclick="afficherInterface(7)"> <P class="icon3"> ✅ Consulter livraisons</P></li>
           </ul>
            <button  href="#" class="Accueilacheteur" onclick="deconnecter()"> <p  class="icon3"> 🛑 &nbsp Déconnecter</p></button>
        </div> 
          
    </aside>

    <div id="interfaceContainer">
       
        <div id="interface2" class="interface">
            
            <nav class="navacc">
                <div class="Buttons1">
                       <button href="#" class="Accueil1"> <img src="notif.jpg" class="icon3"/> </button>
                </div> 
            </nav>
           
            <div class="Accueilassist">
                <br>
                <div class="pAccuei">
                    <p>Nouvelles demandes</p>
                </div>
                <br><br><br><br> <br>
                <div class="search-box">			<!-- Création de la division nommé "search-box" -->
                    <input class="search-txt" type="text" name="" placeholder="Rechercher demande">			<!-- Création d'une barre pour taper du texte que j'ai nommé "search-txt" et j'ai fait afficher "Tape ta recherche" dans la barre lorsque la barre est vide -->
                    <a class="search-btn" href="">			<!-- Bouton qui mène à la page actuelle (#) -->
                        <i class="fas fa-search"></i>			<!-- Îcone de recherche importé à partir de fontawesome.com -->
                    </a>
                </div><br><br>
                
                <br>
                <div class="table-container">
                <div class="pAccueitabledem">
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
                        $sql = "SELECT  `Ndemande`, `Date`, `reference_marche`, `Statuts_demandeur`, `Motifs`, `Article`, `Designation_article`, `Quantite`, `Lettre`, `Nom_acheteur` FROM nouvellesdemandesacheteur";
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
                                echo "<td>" . $row["Nom_acheteur"] . "</td>";   
                    
                                echo "<td><button  class='success' onclick='toggleForm()'>Accepter</button> 
                                <div id='overlay' onclick='toggleForm()'></div>
                                <div id='formWrapper' class='divform'>
                                      <form method='post' enctype='multipart/form-data' class='formitem'>
                                      <p>Bon de commande</p>
                                      <label for='fname'>Acheteur:</label>
                                      <input type='text' id='fname' name='acheteur' class='forminput'required><br><br>
                                      <label for='fname'>Fournisseur:</label>
                                      <input type='text' id='fname' name='fournisseur' class='forminput'required><br><br>
                                      <label for='fname'>Adresse fournisseur:</label>
                                      <input type='text' id='fname' name='adresse' class='forminput'required><br><br>
                                      <label for='fname'>Tel fournisseur:</label>
                                      <input type='text' id='fname' name='tel' class='forminput'required><br><br>
                                      <label for='fname'>N° bon de commande:</label>
                                      <input type='text' id='fname' name='numbon' class='forminput'required><br><br>
                                      <label for='fname'>N°demande:</label>
                                      <input type='text' id='fname' name='numdem' class='forminput'required><br><br>
                                      <label for='fname'>Article:</label>
                                      <input type='text' id='fname' name='article' class='forminput'required><br><br>
                                      <label for='fname'>Désignation:</label>
                                      <input type='text' id='fname' name='des' class='forminput'required><br><br>
                                      <label for='fname'>Qté:</label>
                                      <input type='text' id='fname' name='qte' class='forminput'required><br><br>
                                      <label for='fname'>PU:</label>
                                      <input type='text' id='fname' name='pu' class='forminput'required><br><br>
                                      <label for='fname'>Montant:</label>
                                      <input type='text' id='fname' name='mont' class='forminput'required><br><br>
                                      <div class='butend'><button  class='success' name='accept'>Envoyer</button></div><br>
                                    </form>
                                    
                               </div>
                               </div>";
                        
                            
                               
                                echo "<div class='butend'><button  class='success' onclick='toggleForm2()'>Rejeter</button><div class='butend'>";
                                echo "<div id='overlay2' onclick='toggleForm2()'></div>
                                      <div id='formWrapper2' class='divform'>
                                             <form method='post' enctype='multipart/form-data' class='formitem'>
                                             <p>Lettre du rejet</p>
                                             <label for='fname'>N°demande:</label>
                                            <input type='text' id='fname' name='numdemr' class='forminput' required><br>
                                             <label for='fname'>Date du rejet:</label>
                                            <input type='date' id='fname' name='dater' class='forminput' required><br>
                                            <label for='fname'>Nom de la structure métier:</label>
                                            <input type='text' id='fname' name='st' class='forminput'required><br>
                                            <label for='fname' class='labelmotif'>Motif:</label><br>
                                            <div class='textarea'><textarea type='text' id='fname' name='motrej' class='forminputlong'required><br></textarea></div><br><br>
                                            <div class='butend'><button  class='success' name='rejet'>Envoyer</button></div>
                                         </form></div>
                                         </div>
                                     </td>";

                                         if(isset($_POST['accept'])) {
                                            $acheteur=$_POST['acheteur'];
                                            $fournisseur=$_POST['fournisseur'];
                                            $adress=$_POST['adresse'];
                                            $tel =$_POST['tel'];
                                            $numbon=$_POST['numbon'];
                                            $numdemande=$_POST['numdem'];
                                            $article=$_POST['article'];
                                            $designation=$_POST['des'];
                                            $qte=$_POST['qte'];
                                            $pu=$_POST['pu'];
                                            $montant=$_POST['mont'];
                                            
                                            $insertQuery = "INSERT INTO `bondecommande` (`id`,`Nom_acheteur`, `Nom_fournisseur` , `Adresse_fournisseur`, `Tel_fournisseur`, `Nbon_commande`, `Ndemande`, `Article`, `Designation_article`, `Quantite` , `PU`, `Montant` ) VALUES (NULL, '$acheteur', '$fournisseur', '$adress', '$tel ', '$numbon', '$numdemande', '$article', '$designation', '$qte', '$pu','$montant')";
                                            
                                            $chd = "INSERT INTO `bondecommandetransitaire` (`id`,`Nom_acheteur`, `Nom_fournisseur` , `Adresse_fournisseur`, `Tel_fournisseur`, `Nbon_commande`, `Ndemande`, `Article`, `Designation_article`, `Quantite` , `PU`, `Montant` ) VALUES (NULL, '$acheteur', '$fournisseur', '$adress', '$tel ', '$numbon', '$numdemande', '$article', '$designation', '$qte', '$pu','$montant')";
                                            
                                  
                                             if ($con->query($insertQuery) && $con->query($chd) === TRUE) {
                                                $insertMessage = "La demande a été insérée dans la nouvelle table avec succès.";
                                            } else {
                                                $insertMessage = "Erreur lors de l'insertion de la demande dans la nouvelle table : " . $con->error;
                                            }
        
                                            $deleteQuery = "DELETE FROM `nouvellesdemandesacheteur` WHERE `Ndemande` = '$numdemande'";
                                            if ($con->query($deleteQuery) === TRUE) {
                                                $deleteMessage = "La demande a été supprimée avec succès.";
                                            } else {
                                                $deleteMessage = "Erreur lors de la suppression de la demande : " . $con->error;
                                            }
                                        }
                                        if(isset($_POST['rejet'])) {
                                            $numdemander=$_POST['numdemr'];
                                            $datr=$_POST['dater']; 
                                            $struc=$_POST['st'];
                                            $motrej=$_POST['motrej'];
                                            
                                            $insertQueryy = "INSERT INTO `lettredurejet` (`id`,`Date`, `status_demandeur` , `N°demande`, `Motifs`, `Nbon_commande` ) VALUES (NULL, '$datr', '$struc', '$numdemander', '$motrej')";
                                            
                                           
                                  
                                             if ($con->query($insertQueryy) === TRUE) {
                                                $insertMessage = "La demande a été insérée dans la nouvelle table avec succès.";
                                            } else {
                                                $insertMessage = "Erreur lors de l'insertion de la demande dans la nouvelle table : " . $con->error;
                                            }
        
                                            $deleteQuery = "DELETE FROM `nouvellesdemandesacheteur` WHERE `Ndemande` = '$numdemande'";
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
                    <p>Demandes rejetées</p>
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
                    <p>Lettres de credit</p>
                </div>
                <br><br><br><br> <br>
                <div class="search-box">			<!-- Création de la division nommé "search-box" -->
                    <input class="search-txt" type="text" name="" placeholder="Rechercher">			<!-- Création d'une barre pour taper du texte que j'ai nommé "search-txt" et j'ai fait afficher "Tape ta recherche" dans la barre lorsque la barre est vide -->
                    <a class="search-btn" href="#">			<!-- Bouton qui mène à la page actuelle (#) -->
                        <i class="fas fa-search"></i>			<!-- Îcone de recherche importé à partir de fontawesome.com -->
                    </a>
                </div><br><br>
                <div class="pAccueitable">
                <table id="table">
                            <tr>
                                <td>N° lettre</td>
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
                                <td>Destination</td>
                        </tr>
                        <?php
                               $sql = "SELECT  `Nletrre`, `Type_engagement`, `Nbon_commande`, `Nom_fournisseur`, `Montant`, `Credit_docummentaire`, `Designation_article`, `Tarif_douanier`, `Terme_vente`, `Mode_expedition`,  `Transbordement`, `exppart` ,`lieu`, `Destination` FROM lettredecredit";
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
                                    echo "<td>" . $row["lieu"] . "</td>";
                                    echo "<td>" . $row["Destination"] . "</td>";
                                    echo "</tr>";
                                } 
                            }


                            
                          ?>
                            
                           
                            
                        </table>
                </div>
                <br><br><br>
            </div>
        </div>

        <div id="interface6" class="interface">
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
                <p>Saisir dates</p>
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
                        
                    </tr>
                          
                    <?php
                        $sql = "SELECT  `Nbon_commande`, `Nletrre`  FROM lettredecreditacheteur";
                        $result = $con->query($sql);
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row["Nbon_commande"] . "</td>";
                                echo "<td>" . $row["Nletrre"] . "</td>";
                                echo "<td> <input type='date' name='date'></td> ";
                                echo "<td><button  class='success' name='chd'>Valider</button></td>";

                                if(isset($_POST['chd'])) {
                                    $numbon=$_POST['Nbon_commande'];
                                    $numlettre=$_POST['Nletrre'];
                                    $date=$_POST['date'];
                                    
                                   
                                        
                                    $insertQuery = "INSERT INTO `validations` (`id`,`Nbon_commande` ,`Nletrre`, `	date`) VALUES (NULL, '$numbon','$numlettre', '$date')";
                                    
                                    

                                     if ($con->query($insertQuery)  === TRUE) {
                                        $insertMessage = "La demande a été insérée dans la nouvelle table avec succès.";
                                    } else {
                                        $insertMessage = "Erreur lors de l'insertion de la demande dans la nouvelle table : " . $con->error;
                                    }

                                    $deleteQuery = "DELETE FROM `lettredecreditacheteur` WHERE `Nbon_commande` = '$numbon'";
                                    if ($con->query($deleteQuery) === TRUE) {
                                        $deleteMessage = "La demande a été supprimée avec succès.";
                                    } else {
                                        $deleteMessage = "Erreur lors de la suppression de la demande : " . $con->error;
                                    }
                                    
                                        
                                }



                            }}

                                  ?>

                               




                    
                    
                    
                    
                </table>
            </div>
            <br><br><br>
        </div>
    </div>


    <div id="interface7" class="interface">
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