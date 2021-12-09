<?php
//echo "ID de categorie".$_GET['idc'];
$idcategorie = $_GET['idc'];
include "../Controller/inc/functions.php";
$conn= connect();
$requette = "DELETE FROM categories WHERE idcat='$idcategorie'";
$resultat = $conn->query($requette);
if($resultat){
    header('location:listecat.php?delete=ok');

}

?>
