<?php
//1_recuperation des donnees de la formulaire
$nom=$_POST['nomcat'];
$ID=$_POST['idcat'];
//2_la chaine de connexion
include "../Controller/inc/functions.php";
$conn = connect();

try {
    
//3_Creation de la requette 
$requette = "INSERT INTO categories(nomcat,idcat)VALUES ('$nom','$ID')";

//4_Execution de la requette 
$resultat = $conn->query($requette);
if($resultat){
    header('location:listecat.php?ajout=ok');

}

  } catch(PDOException $e) {
    //echo "Connection failed: " . $e->getMessage();
    if ($e->getcode()==23000){
    header('location:listecat.php?erreur=duplicate');
    }
  }
?>