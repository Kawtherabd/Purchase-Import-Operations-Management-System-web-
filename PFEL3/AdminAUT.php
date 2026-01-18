<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="AdminAUT.css" >
    <title> Admin</title>
</head>

<body>

<?php
        //inclure la bddd
        include_once "Bddconnexion.php";
      
        ?>

  <video id="video-background" autoplay muted loop>
    <source src="video.mp4" type="video/mp4">
  </video>

  <nav>
    <div class="logo">
      <img src="Logo_Algérie_Télécom.svg.png" class="mini-logo">
      <p> Toujours plus proche</p>
    </div>

    
    <div class="menu">
                 
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a href="PFE.html">Accueil</a></li>
        <li class="nav-item"><a href="contact.html">Contact</a></li>
        <Li class="nav-item activ"><a href="#">Admin</a></Li>
    </ul>
  
    </div>

    <div class="toggle"></div>
  </nav>

    <div class="center-content">
      <p>Veuillier remplir ce formulaire !</p>

      <div class="form">
      <form method="post">

        <label for="nom">Nom:</label>
        <input type="text" id="nom" name="nom" class="input-icon" required>
  
        <label for="prenom">Prenom:</label>
        <input type="text" id="prenom" name="prenom"class="input-icon" required>
  
        <label for="E-mail">E-mail:</label>
        <input type="email" id="E-mail" name="E-mail" class="input-icon1" placeholder="    Exemple@gmail.com" required>
  
        <label for="mdp">Mot de passe:</label>
        <input type="password" id="mdp" name="mdp" placeholder="................" required>
  
        <input type="submit" class="btn" value="Envoyer" name="submit1">

        <?php
                            if (isset($_POST["submit1"])) {
                                // Récupérer les valeurs du formulaire
                                $nom = $_POST["nom"];
                                $prenom = $_POST["prenom"];
                                $email = $_POST["E-mail"];
                                $motDePasse = $_POST["mdp"];
                               

                                $sql = "SELECT * FROM employé WHERE Nom='$nom' AND Prenom= '$prenom' AND Email='$email' AND Mot_de_passe='$motDePasse' AND Poste='Admin' ";
                                $result = $con->query($sql);

                               
                                if ($result->num_rows > 0) {
                                    // Les informations d'authentification sont correctes
                                    // Rediriger l'utilisateur vers une autre page
                                    
                                        header("Location:Adminn.php");
                                     
                                } else { 
    
                                    
                                   
                                    echo "<p>Veuillez vérifier les informations saisies!</p>";
                                    
                                }
        
                                   }
    
                    
                            
                            
                            
                            
                    ?>
      
      </form>
    </div>


    </div>

    
   
      

  <script>
    const toggleButton = document.querySelector('.toggle');
    const menu = document.querySelector('.menu');

    toggleButton.addEventListener('click', () => {
      menu.classList.toggle('active');
    });
  </script>
</body>
</html>