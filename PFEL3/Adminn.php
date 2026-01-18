<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSSADMIN.css">
    <script src="Assistant.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/9c46b212c9.js" crossorigin="anonymous"></script>
    <title>Interface de l'admin</title>
</head>
<style>
   li p{
    color: white;
        font-family: Arial, Helvetica, sans-serif;
    }
    .Accueilassist{
    background-color:#d8eedb;   
    /*height: 100%;
    width: 100%;
    flex-direction: column; */
    overflow: auto;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  z-index: -1;
  
    /*position: relative;*/
}
.Accueilbut {
    display: block;
    width: 200px;
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
        <p>Admin</p>
        </div><br>
        
        <div class="Buttons"  >
            
            <!--<button    href="#" class="Accueil" onclick="afficherInterface(1)">  <img src="home.png" class="icon"/> Accueil</button>-->
            <ul class="sub-menu">
                <li><p>📒Consulter employé</p></li>
            <li><button   href="#" class="Accueilbut"   onclick="afficherInterface(2)"> <img src="liste.png" class="icon2"/> Liste des employés</button></li>
        
        
           <li><button  href="#" class="Accueilbut" onclick="afficherInterface(3)"> <img src="employee.png" class="icon2"/>  Employés archivés</button></li>
            </ul>
        
            <button  href="#" class="Accueil" onclick="afficherInterface(4)" > <img src="employee.png" class="icon2"/> Ajouter un nouvel employé</button>

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
            <br><br><br><br>
            <div class="pAccuei">
                <p>Liste des employés</p>
            </div>
            <br><br><br><br> <br>
            <div class="search-box">			<!-- Création de la division nommé "search-box" -->
                <input class="search-txt" type="text" name="" placeholder="Rechercher un employé">			<!-- Création d'une barre pour taper du texte que j'ai nommé "search-txt" et j'ai fait afficher "Tape ta recherche" dans la barre lorsque la barre est vide -->
                <a class="search-btn" href="#">			<!-- Bouton qui mène à la page actuelle (#) -->
                    <i class="fas fa-search"></i>			<!-- Îcone de recherche importé à partir de fontawesome.com -->
                </a>
            </div><br><br>
            <div class="pAccueitable">
                <table>
                    <tr>
                        
                        
                        <td>Nom</td>
                        <td>Prénom</td>
                        <td>Email</td>
                        <td>Status</td>
                        <td>Poste</td>
                        <td>Mot de passe</td>
                        
                        
                    </tr>
                    <?php
                    $sql = "SELECT  `Nom`, `Prenom` , `Email`, `Status`, `Poste`, `Mot_de_passe` FROM `employé`";
                    $result = $con->query($sql);
                    if ($result->num_rows > 0) {
                     while ($row = $result->fetch_assoc()) {
                         echo "<tr>";
                         echo "<td>" . $row["Nom"] . "</td>";
                         echo "<td>" . $row["Prenom"] . "</td>";
                         echo "<td>" . $row["Email"] . "</td>";
                         echo "<td>" . $row["Status"] . "</td>";
                         echo "<td>" . $row["Poste"] . "</td>";
                         echo "<td>" . $row["Mot_de_passe"] . "</td>";
                         
                         echo "
                        
                         <td><button class='successedera' onclick='toggleForm()'>Archiver</button> 
                             <div id='overlay' onclick='toggleForm()'></div>
                             <div id='formWrapper' class='divform'>
                                 <p>Voulez-vous vraiment archiver cet employé ?</p>
                                 <div class='butcentr'>
                                 <button class='successedera'>Confirmer</button>&nbsp
                                 <button class='annul' onclick='annuler()' >Annuler</button>
                                 </div>
                             </div>
                             
                             <button class='success1' onclick='toggleForm2()'>Modifier</button>
                             <div id='overlay2' onclick='toggleForm2()'></div>
                            <div id='formWrapper2' class='divform'>
                             <form class='formitem'>
                                 <p>Modifier un employé</p>
                                 
                                 <label for='fname'>Nom :</label>
                                 <input type='text' id='fname' name='nomem' class='forminput'  required><br><br>
                                 <label for='fname'>Prénom :</label>
                                 <input type='text' id='fname' name='prenomem' class='forminput' required><br><br>
                                 <label for='fname'>Email :</label>
                                 <input type='email' id='fname' name='emailem' class='forminput' required><br><br>
                                 <label for='fname'>Status :</label>
                                 <input type='text' id='fname' name='statusem' class='forminput' required><br><br>
                                 <label for='fname'>Poste:</label>
                                 <input type='text' id='fname' name='postem' class='forminput' required><br><br>
                                 
                                 <label for='fname'>Mot de passe:</label>
                                 <input type='text' id='name' name='passe' class='forminput  required><br><br>
                                 
                                 <div class='butend'><button  class='modifbtn' name='modiem'>Modifier</button></div>
                              </form>
                         </div>
                         </div>
                         
                         </td>";
                         if(isset($_POST['modiem'])) {
                            $nom=$_POST['nomem'];
                            $prenom=$_POST['prenomem']; 
                            $email=$_POST['emailem'];
                            $status=$_POST['statusem'];
                            $poste=$_POST['postem'];
                            $mdp=$_POST['passe'];
                            
                            $insertQueryy = "INSERT INTO `employé` (`id`,`Nom`, `Prenom` , `Email`, `Status`, `Poste` ,`Mot_de_passe` ) VALUES (NULL, '$nom', ' $prenom', '$email', ' $status' , '$poste' , '$mdp')";
                            
                           
                  
                             if ($con->query($insertQueryy) === TRUE) {
                                $insertMessage = "La demande a été insérée dans la nouvelle table avec succès.";
                            } else {
                                $insertMessage = "Erreur lors de l'insertion de la demande dans la nouvelle table : " . $con->error;
                            }

                            
                        }
                        
                     } 
                 }


                 
               ?>
                   
                </table>
            </div>
            <br><br><br>
        </div>
    </div>
    <div id="interface3" class="interface">
        <nav class="navacc">
            <div class="Buttons1">
                   <button href="#" class="Accueil1"> <img src="notif.jpg" class="icon3"/> </button>
            </div> 
        </nav>

        <div class="Accueilassist">
            <br><br><br><br>
            <div class="pAccuei">
                <p>Employés supprimés</p>
            </div>
            
            <br><br><br><br> <br>
            <div class="search-box">			<!-- Création de la division nommé "search-box" -->
                <input class="search-txt" type="text" name="" placeholder="Rechercher employé">			<!-- Création d'une barre pour taper du texte que j'ai nommé "search-txt" et j'ai fait afficher "Tape ta recherche" dans la barre lorsque la barre est vide -->
                <a class="search-btn" href="#">			<!-- Bouton qui mène à la page actuelle (#) -->
                    <i class="fas fa-search"></i>			<!-- Îcone de recherche importé à partir de fontawesome.com -->
                </a>
            </div><br><br>
            <div class="pAccueitable">
                <table>
                    <tr>
                            <td>Id</td>
                            <td>Nom d'utilisateur</td>
                            <td>Mot de passe</td>
                            <td>Nom</td>
                            <td>Prénom</td>
                            <td>Status</td>
                            <td>Profile</td>
                            <td>Email</td>
                    </tr>
                    <?php
                    $sql = "SELECT  `Nom`, `Prenom` , `Email`, `Status`, `Poste`, `Mot_de_passe` FROM `emlpoyearchive`";
                    $result = $con->query($sql);
                    if ($result->num_rows > 0) {
                     while ($row = $result->fetch_assoc()) {
                         echo "<tr>";
                         echo "<td>" . $row["Nom"] . "</td>";
                         echo "<td>" . $row["Prenom"] . "</td>";
                         echo "<td>" . $row["Email"] . "</td>";
                         echo "<td>" . $row["Status"] . "</td>";
                         echo "<td>" . $row["Poste"] . "</td>";
                         echo "<td>" . $row["Mot_de_passe"] . "</td>";
                     }
                    
                    }
                   ?> 
                    
                </table>
            </div>
            <br><br><br>
        </div>
    
    </div>
    <div id="interface4" class="interface">
        <nav class="navacc">
            <div class="Buttons1">
                   <button href="#" class="Accueil1"> <img src="notif.jpg" class="icon3"/> </button>
            </div> 
        </nav>

        <div class="Accueilassist">
            <br><br><br><br>
            <div class="pAccuei">
                <p>Ajouter un nouvel employé</p>
            </div>
            
                <br><br><br>
                <?php
               echo" <div id='formbg' class='divform'>
                    <form>
                    <label for='fname'>Nom :</label>
                    <input type='text' id='fname' name='nomem' class='forminput'  required><br><br>
                    <label for='fname'>Prénom :</label>
                    <input type='text' id='fname' name='prenomem' class='forminput' required><br><br>
                    <label for='fname'>Email :</label>
                    <input type='email' id='fname' name='emailem' class='forminput' required><br><br>
                    <label for='fname'>Status :</label>
                    <input type='text' id='fname' name='statusem' class='forminput' required><br><br>
                    <label for='fname'>Poste:</label>
                    <input type='text' id='fname' name='postem' class='forminput' required><br><br>
                    
                    <label for='fname'>Mot de passe:</label>
                    <input type='text' id='name' name='passe' class='forminput  required><br><br>
                      <button  class='ajoutbtn' name='ajout'>Ajouter</button>
                     </form>
                </div>";

                if(isset($_POST['ajout'])) {
                            $nom=$_POST['nomem'];
                            $prenom=$_POST['prenomem']; 
                            $email=$_POST['emailem'];
                            $status=$_POST['statusem'];
                            $poste=$_POST['postem'];
                            $mdp=$_POST['passe'];
                            
                            $insertQueryy = "INSERT INTO `employé` (`id`,`Nom`, `Prenom` , `Email`, `Status`, `Poste` ,`Mot_de_passe` ) VALUES (NULL, '$nom', ' $prenom', '$email', ' $status' , '$poste' , '$mdp')";
                            
                           
                  
                             if ($con->query($insertQueryy) === TRUE) {
                                $insertMessage = "La demande a été insérée dans la nouvelle table avec succès.";
                            } else {
                                $insertMessage = "Erreur lors de l'insertion de la demande dans la nouvelle table : " . $con->error;
                            }

                            
                        }
                        
                   
                
                 ?>

            <br><br><br><br> <br>

            
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