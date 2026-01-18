<?php
//connexion a la bdd
$con = mysqli_connect("localhost","root","","importations");
if(!$con){
   echo "Vous n'êtes pas connecté à la base de donnée";
}
?>