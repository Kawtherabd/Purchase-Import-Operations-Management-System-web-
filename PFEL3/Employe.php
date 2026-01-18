<!DOCTYPE html>
<html>
<head>
  
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com" >
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin >
    <link rel="stylesheet" href="Employe.css">
    <link href="https://fonts.googleapis.com/css2?family=Allura&family=Amatic+SC&family=Beth+Ellen&family=Tangerine:wght@700&display=swap"rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Allura&family=Beth+Ellen&family=Tangerine:wght@700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp"crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N"crossorigin="anonymous"></script>
	<title>authentification</title>
    
    
    </head>


<body>
<?php
        //inclure la bddd
        include_once "Bddconnexion.php";
        
        ?>
   
    <div class="video-container">
      <video autoplay loop muted>
        <source src="video.mp4" type="video/mp4">
      </video>
      <div class="content">
        <header >
     
             <nav class= "navbar navbar-expand-lg navbar-light fixed-top">
                <div class="log" style="text-align: left;" >
                    <img src="Logo_Algérie_Télécom.svg.png" class="mini-logo">
                </div>
               
              </nav>

                <h2>Veulliez remplir ce formulaire !</h2>
                <form method="post">

                    <label for="nom">Nom:</label>
                    <input type="text" id="nom" name="nom" class="input-icon" required>
              
                    <label for="prenom">Prenom:</label>
                    <input type="text" id="prenom" name="prenom"class="input-icon" required>
              
                    <label for="E-mail">E-mail:</label>
                    <input type="email" id="E-mail" name="E-mail" class="input-icon1" placeholder="    Exemple@gmail.com" required>
              
                    <label for="mdp">Mot de passe:</label>
                    <input type="password" id="mdp" name="mdp" placeholder="................" required>
                    
                     <label for="pays">Emploi :</label>
                     <select type="travail" id="travail" name="travail" required>
                     <option value="">Sélectionnez votre emploi :</option>
                     <option value="Structure metier">Structure metier</option>
                     <option value="Assistant">Assistant</option>
                     <option value="Chef de departement">Chef de departement</option>
                     <option value="Acheteur">Acheteur</option>
                     <option value="Transitaire">Transitaire</option>
                     <option value="Contrôleur">Contrôleur</option>
                     <option value="Directeur">Directeur</option>
                    </select>

                    <input type="submit" class="btn" value="Envoyer" name="submit" >

                    <?php
                            if (isset($_POST["submit"])) {
                                // Récupérer les valeurs du formulaire
                                $nom = $_POST["nom"];
                                $prenom = $_POST["prenom"];
                                $email = $_POST["E-mail"];
                                $motDePasse = $_POST["mdp"];
                                $travail = $_POST["travail"];

                                $sql = "SELECT * FROM employé WHERE Nom='$nom' AND Prenom= '$prenom' AND Email='$email' AND Mot_de_passe='$motDePasse' AND Poste='$travail'";
                                $result = $con->query($sql);

                                if ($result->num_rows > 0) {
                                // Les informations d'authentification sont correctes
                                // Rediriger l'utilisateur vers une autre page
                                if ($travail == "Structure metier") {
                                    // Afficher l'interface pour Structure métier
                                    header("Location:ST.php");
                                } else if ($travail == "Assistant") {
                                    // Afficher l'interface pour Assistant
                                     header("Location:Assistant.php");
                                } else if ($travail == "Chef de departement") {
                                    // Afficher l'interface pour Chef de département
                                      header("Location: Chef-de-département.php");
                                } else if ($travail == "Acheteur") {
                                    // Afficher l'interface pour Acheteur
                                     header("Location: Acheteur.php ");
                                } else if ($travail == "Transitaire") {
                                    // Afficher l'interface pour Transitaire
                                      header("Location: Transitaire.php");
                                } else if ($travail == "Contrôleur") {
                                    // Afficher l'interface pour Contrôleur
                                    header("Location: controlleur.php");
                                } else if ($travail == "Directeur") {
                                    // Afficher l'interface pour Directeur
                                    header("Location: Directeur.php");
                                } 
                            } else { 

                                
                               
                                echo "<p>Veuillez vérifier les informations saisies!</p>";
                                
                            }
    
                               } 
                            
                            
                            
                            
                    ?>


                </form>    
      
            
      
      
          </header>
      
        </div>
     
     
  </body>
  </html>