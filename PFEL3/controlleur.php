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
    <title>Interface du controlleur</title>
</head>
<style>

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
  .pAccueitable{
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
        <p>Controlleur</p>
        </div><br>
        
        <div class="Buttons"  >
            <!--<button    href="#" class="Accueil" onclick="afficherInterface(1)">  <img src="home.png" class="icon"/> Accueil</button>-->
        
        
            <button   href="#" class="Accueil"   onclick="afficherInterface(2)"> <img src="Capture.PNG" class="icon2"/> Générer lettre de crédit</button>
        
        
            <button  href="#" class="Accueil" onclick="afficherInterface(3)" > <img src="Capture.PNG" class="icon2"/> Consulter lettres de credit</button>
        
        
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
                    <p>Nouvelles commandes</p>
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
                        $sql = "SELECT  `Nbon_commande`, `Tarifs` , `Autorisations` FROM `nouvellescommandescontroleur`";
                        $result = $con->query($sql);
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row["Nbon_commande"] . "</td>";
                                echo "<td>" . $row["Tarifs"] . "</td>";
                                echo "<td>" . $row["Autorisations"] . "</td>";
                                
                                echo "<td> <button  class='success' onclick='toggleForm()'>Générer</button> ";
                                echo "<div id='overlay' onclick='toggleForm()'></div>
                                <div id='formWrapper' class='divform' >
                                      <form method='post' enctype='multipart/form-data' class='formitem'>
                                      <p>Lettre de credit</p>
                                      <label for='fname'>N° Lettre:</label>
                                      <input type='text' id='fname' name='numletr' class='forminput'required><br><br>
                                      <label for='fname'>Type d'engagement:</label>
                                      <select id='fname' name='type' class='forminput'required>
                                       <option>Marché</option>
                                       <option>Avenant</option>
                                       <option>Contrat</option>
                                       <option>Bon de commande</option>
                                      </select>
                                       <br><br>
                                     
                                      <label for='fname'>N° bon de commande:</label>
                                      <input type='text' id='fname' name='numbon' class='forminput'required><br><br>
                                      <label for='fname'>Nom du fournisseur:</label>
                                      <input type='text' id='fname' name='fourn' class='forminput'required><br><br>
                                      
                                      <label for='fname'>Montant(en chiffre):</label>
                                      <input type='text' id='fname' name='montant' class='forminput'required><br><br>
                                      <label for='fname'>Type de crédit documentaire:</label>
                                      <select id='fname' name='cred' class='forminput' required>
                                       <option>Irrévocable</option>
                                       <option>Irrévocable et confirmé</option>
                                      </select>
                                       <br><br>
                                       <label for='fname'>Désignation du produit:</label>
                                      <input type='text' id='fname' name='des' class='forminput'required><br><br>
                                      <label for='fname'>Tarif douanier:</label>
                                      <input type='text' id='fname' name='tardouan' class='forminput'required><br><br>
                                      <label for='fname'>Terme de vente:</label>
                                      <select id='fname' name='termvent' class='forminput'required>
                                       <option>FOB</option>
                                       <option>CFR</option>
                                       <option>CPT</option>
                                      </select>
                                       <br><br>
                                       <label for='fname'>Mode d'expédition:</label>
                                      <select id='fname' name='modexp' class='forminput'required>
                                       <option>Voie maritime</option>
                                       <option>Voie aérienne</option>
                                       </select>
                                       <br><br>
                                       <label for='fname'>Transbordement:</label>
                                      <select id='fname' name='transbord' class='forminput'required>
                                       <option>Autorisé</option>
                                       <option>Interdit</option>
                                       </select>
                                       <br><br>
                                       <label for='fname'>Expédition patielle:</label>
                                      <select id='fname' name='expart' class='forminput'required>
                                       <option>Autorisée</option>
                                       <option>Interdite</option>
                                      </select><br><br>
                                      <label for='fname'>Lieu de chargement:</label>
                                      <input type='text' id='fname' name='lieu' class='forminput'required><br><br>
                                      <label for='fname'>Nom banque:</label>
                                      <input type='text' id='fname' name='destina' class='forminput'required><br><br>
                                      <label for='fname'>Adrese bancaire:</label>
                                      <input type='text' id='fname' name='destina' class='forminput'required><br><br>
                                      <label for='fname'>Nom compte:</label>
                                      <input type='text' id='fname' name='destina' class='forminput'required><br><br>
                                      <div class='butend'><button  class='success' name='chd'>Générer</button></div>
                                      
                                  </form></div>
                                  </div>
                              </td>";


                                  
                                if(isset($_POST['chd'])) {
                                    $numletr=$_POST['numletr'];
                                    $typeeng=$_POST['type'];
                                    $numbon=$_POST['numbon'];
                                    $nomfourn=$_POST['fourn'];
                                    $montant=$_POST['montant'];
                                    $credit=$_POST['cred'];
                                    $designation=$_POST['des'];
                                    $tarifdouan=$_POST['tardouan'];
                                    $termvent=$_POST['termvent'];
                                    $modexp=$_POST['modexp'];
                                    $transbord=$_POST['transbord'];
                                    $exppart=$_POST['expart'];
                                    $lieu=$_POST['lieu'];
                                    $desti=$_POST['destina'];
                                   
                                     
                                   
                                        
                                    $insertQuery = "INSERT INTO `lettredecredit` (`id`,`Nletrre` ,`Type_engagement`, `Nbon_commande`, `Nom_fournisseur`, `Montant`, `Credit_docummentaire`, `Designation_article`, `Tarif_douanier`, `Terme_vente`, `Mode_expedition`,  `Transbordement`, `exppart` ,`lieu`, `Destination`) VALUES (NULL, '$numletr','$typeeng', '$numbon', '$nomfourn', ' $montant', '$credit', ' $designation', '$tarifdouan', '$termvent', '$modexp', ' $transbord' , '$exppart' ,'$lieu' ,'$desti')";
                                    
                                    $acht="INSERT INTO `lettredecreditacheteur` (`id`,`Nletrre` , `Nbon_commande` )	VALUES (NULL, ' $numletr','$numbon')";

                                     if ($con->query($insertQuery) && $con->query($acht) === TRUE) {
                                        $insertMessage = "La demande a été insérée dans la nouvelle table avec succès.";
                                    } else {
                                        $insertMessage = "Erreur lors de l'insertion de la demande dans la nouvelle table : " . $con->error;
                                    }

                                    $deleteQuery = "DELETE FROM `nouvellescommandescontroleur` WHERE `Nbon_commande` = '$numbon'";
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
            </div></div>
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


                            $con->close();
                          ?>
                            
                           
                            
                        </table>
                        <br><br>
                    </div>
                    
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