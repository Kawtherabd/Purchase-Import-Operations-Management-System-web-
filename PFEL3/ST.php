<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="ST.css">
    <script src="Assistant.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/9c46b212c9.js" crossorigin="anonymous"></script>
    <title>Interface de la structure metier</title>
    <style>
    .Accueilassist{
    background-color:#d8eedb;   
    /*height: 100%;
    width: 100%;
    flex-direction: column; */
   
  
  width: 100%;
  height: 3000px;
  z-index: 0;
  overflow: auto;
    position: relative;
}

    .search-box:hover > .search-txt {			/*Lorsque la sourie passe par dessus la boÃ®te de recherche, la barre de texte prend les valeurs suivantes*/
	width: 240px;		/*Lorsque la sourie passe sur la boÃ®te de recherche, la barre de texte prend une largeur de 240 pixels*/
	padding: 0 6px;
}

</style>
</head>

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
                <p>Structure metier</p>
            </div><br>
            
            
            <div class="Buttons"  >
                <!--<button    href="#" class="Accueil" onclick="afficherInterface(1)">  <img src="home.png" class="icon"/> Accueil</button>-->
            
            
                <button   href="#" class="Accueil"   onclick="afficherInterface(2)"> <img src="Capture.png" class="icon2"/>Effectuer une demande</button>
            
                <button   href="#" class="Accueil"   onclick="afficherInterface(3)"> <img src="Capture.png" class="icon2"/>Consulter demandes</button>
            
            
                <button  href="#" class="Accueil" onclick="deconnecter()"> <p  class="icon3"> 🛑 &nbsp Déconnecter</p></button>
            </div> 
            
       
    
            
        </aside>
      
<div id="interfaceContainer">

   <!--<div id="interface1" class="interface">

<nav class="navacc">
    <div class="Buttons1">
           <button href="#" class="Accueil1"> <img src="notif.jpg" class="icon3"/> </button>
    </div> 
</nav>


<div class="Accueilassist1">
    <br>
    <div class="pAccuei">
        <p>Informations générale</p>
    </div>
    <br><br>
    <div class="caree">
    <div class="caree1">
        <ul>
        <br>  
        <li>Demandes effectuées</li>
        </ul>
        <div class="dash"> 
            <p><?php  
         
         
                
        
                // Requête pour compter les lignes dans la table spécifiée
                $query = "SELECT COUNT(*) as count FROM demande";
                $statement = $con->query($query);
                $rowCount = $statement->fetch_assoc();
                echo $rowCount['count'];


            ?></p>
        <div>
    </div>
    
</div>
</div>
</div> -->

        
                
        <div id="interface2" class="interface">
            <nav class="navacc">
                <div class="Buttons1">
                       <button href="#" class="Accueil1"> <img src="notif.jpg" class="icon3"/> </button>
                </div> 
            </nav>
    
            <div class="Accueilassistform">
                <br>
                <div class="pAccuei">
                    <p>Effectuer une demande</p>
                </div>
                
                <br>
                
                   
                
                                <div id="overlaysup"></div>
                                <div id="confirmationWrapper" > </div>
                            
                            
                            <div id="formbg" >
                                    <form method="post">
                                        <label for="fname">N° demande:</label>
                                        <input type="text" id="fname" name="ndemande" class="input"  required><br><br>
                                        <label for="fname">Date :</label>
                                        <input type="date" id="fname" name="date" class="input" required><br><br>
                                        <label for="fname">référence_marché :</label>
                                        <input type="text" id="fname" name="reference" class="input"  required><br><br>
                                        <label for="fname">Statuts demandeur :</label>
                                        <input type="text" id="fname" name="status" class="input"  required><br><br>
                                        <label for="fname">Motif(s) :</label>
                                        <input type="text" id="fname" name="motif" class="input"  required><br><br>
                                        <label for="fname">Article :</label>
                                        <input type="text" id="fname" name="article" class="input" required><br><br>
                                        <label for="fname">Désignation_article :</label>
                                        <input type="text" id="fname" name="designation" class="input" required><br><br>
                                        <label for="fname">Quantité :</label>
                                        <input type="text" id="fname" name="qte" class="input" required><br><br>
                                        <label for="fname">Lettre :</label>
                                        <textarea type="text" id="fname" name="lettre" class="input" required> </textarea><br><br>
                                        <button  class="ajoutbtn" name='submit'>Effectuer la demande</button>
                                       </form>
                                      <?php
                                       
                                       if (isset($_POST['submit'])) {
                                        // Le formulaire a été soumis
                                     
                                        // Récupérer les valeurs soumises
                                        $ndemande = $_POST['ndemande'];
                                        $date = $_POST['date'];
                                        $reference = $_POST['reference'];
                                        $status = $_POST['status'];
                                        $motif = $_POST['motif'];
                                        $article = $_POST['article'];
                                        $designation = $_POST['designation'];
                                        $qte = $_POST['qte'];
                                        $lettre = $_POST['lettre'];

                                        $sql = "INSERT INTO demande (`Ndemande`, `Date` , `reference_marche`, `Statuts_demandeur`, `Motifs`, `Article`, `Designation_article`, `Quantite`, `Lettre`)
                                                 VALUES ('$ndemande', '$date', '$reference', '$status', '$motif', '$article', '$designation', '$qte', '$lettre')";
                                        $ass =   "INSERT INTO nouvellesdemandesassistant (`Ndemande`, `Date` , `reference_marche`, `Statuts_demandeur`, `Motifs`, `Article`, `Designation_article`, `Quantite`, `Lettre`)
                                        VALUES ('$ndemande', '$date', '$reference', '$status', '$motif', '$article', '$designation', '$qte', '$lettre')";       



                                        // Exécuter la requête
                                        if ($con->query($sql)  && $con->query($ass) === TRUE ) {
                                            echo "Enregistrement effectué avec succès.";
                                        } else {
                                            echo "Erreur lors de l'enregistrement : " . $con->error;
                                        }

    
                                        }
                               
                                    ?>
                               
                            </div>
            </div>
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
            
            <form  methode="GET">
            <div class="search-box">
                			<!-- Création de la division nommé "search-box" -->
                <input class="search-txt" type="search" name="searchdemande" placeholder="Rechercher demande">			<!-- Création d'une barre pour taper du texte que j'ai nommé "search-txt" et j'ai fait afficher "Tape ta recherche" dans la barre lorsque la barre est vide -->
                <a class="search-btn"   name="rech">			<!-- Bouton qui mène à la page actuelle (#) -->
                    <i class="fas fa-search"></i>			<!-- Îcone de recherche importé à partir de fontawesome.com -->
                </a>

              
                
            </div><br><br>
                </form>
                <br><br>
            <div class="pAccueitable">
                <table>
                    <tr>
                        <td>N°_demande</td>
                        <td>Date</td>
                        <td>référence_marché</td>
                        <td>Motif(s)</td>
                        <td>Article</td>
                        <td>Désignation_article</td>
                        <td>Quantité</td>
                        <td>Lettre</td>
                    </tr>
                     
                    <?php      
                               $allusers = $con->query('SELECT * FROM demande');
                               if (isset($_GET['searchdemande']) AND !empty($_GET['searchdemande'])){
                                 $recherche = htmlspecialchars($_GET['searchdemande']);
                               $allusers = $con->query('SELECT * FROM demande WHERE Ndemande LIKE "%'.$recherche.'%" ');
                             }
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
                                    echo "</tr>";
                                } 
                            }else{
                                echo " <tr><td> <div class='msgintrv'>
                                       <br>
                                      <p> Demande introuvable </p>
                                       </div> </td></tr>";
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