<?php
//1_recuperation des donnees de la formulaire
$refpi=$_POST['refp'];
$nomprod=$_POST['nomprod'];
$ref=$_POST['ref'];
$prix=$_POST['prix'];
$descprod=$_POST['descprod'];
$idcat=$_POST['idcat'];
//upload image
$target_dir = "assets/images";
$target_file = $target_dir . basename($_FILES["image"]["name"]);
if 
  (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) 
  {
    $image=$_FILES["image"]["tmp_name"];
  } 
  else 
  {
    echo "Sorry, there was an error uploading your file.";
  }
//2_la chaine de connexion
include "../Controller/inc/functions.php";
$conn = connect();

try {
    
//3_Creation de la requette 
$requette = " UPDATE produits SET nomprod='$nomprod',ref='$ref',prix='$prix',descprod='$descprod',idcat='$idcat',image='$image' WHERE ref='$refpi' ";

//4_Execution de la requette 
$resultat = $conn->query($requette);
if($resultat){
    header('location:listeprod.php?modif=ok');

}

  } catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    if ($e->getcode()==23000){
   header('location:listeprod.php?erreur=duplicate');
  }
  }
?>