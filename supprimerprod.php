<?php
//echo "ID de categorie".$_GET['refp'];
$referenceproduit = $_GET['refp'];
include "../Controller/inc/functions.php";
$conn= connect();
$requette = "DELETE FROM produits WHERE ref='$referenceproduit'";
$resultat = $conn->query($requette);
if($resultat){
    header('location:listeprod.php?delete=ok');

}

?>