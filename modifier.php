<?php
//1_recuperation des donnees de la formulaire
$idi=$_POST['idc'];
$nom=$_POST['nomcat'];
$ID=$_POST['idcat'];
//2_la chaine de connexion
include "../Controller/inc/functions.php";
$conn = connect();

//3_Creation de la requette 
$requette = "UPDATE  categories SET nomcat='$nom', idcat='$ID' WHERE idcat='$idi'  " ;

//4_Execution de la requette 
$resultat = $conn->query($requette);
if($resultat){
    header('location:listecat.php?modif=ok');

}
?>