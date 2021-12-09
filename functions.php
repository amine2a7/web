<?php

function connect (){
$servername = "localhost";
$username = "root";
$password = "root";

try {
  $conn = new PDO("mysql:host=$servername;dbname=animali", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
return $conn;
}

function getAllCategories(){
$conn= connect ();
$requette = "SELECT * FROM categories";
$resultat = $conn->query($requette);
$categories = $resultat->fetchAll();
//var_dump($categories);
return $categories;
}
function getAllProducts(){
    $conn= connect ();
    $requette = "SELECT * FROM produits";
    $resultat = $conn->query($requette);
    $produits = $resultat->fetchAll();
    //var_dump($produits);
    return $produits;
    }
function searchProduits($keywords){
    $conn= connect ();
    $requette = "SELECT * FROM produits WHERE nomprod LIKE '%keywords%' ";
    $resultat = $conn->query($requette);
    $produits = $resultat->fetchAll();
    return $produits;
}
function getProduitById($ref){
    $conn= connect ();
    $requette = "SELECT * FROM produits WHERE ref =$ref";
    $resultat = $conn->query($requette);
    $produit = $resultat->fetch();
    return $produit;

}
function getProductsByIdcat($produits,$idcat){
    $produitsIdcat= array();

    foreach ($produits as $p){
        if($p['idcat']== $idcat){
            array_push($produitsIdcat,$p);

        }
    }
    return $produitsIdcat ;
}

?>