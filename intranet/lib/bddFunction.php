<?php

function getBdd() {
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $conn = null;

    try {
        $conn = new PDO("mysql:host=$servername;dbname=sucreDor", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // echo "Connected successfully";
    }
    catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }

    return $conn;
}

function insertUnique($table, $column, $value) {
  $bdd = getBdd();
  $value = $bdd->quote($value);
  $requete = "INSERT INTO $table($column) VALUES($value)";

  return $bdd->query($requete);
}

function getSlider() {
  $bdd = getBdd();
  $requete = "SELECT * FROM slider";

  return $bdd->query($requete);
}

function getCategorie() {
  $bdd = getBdd();
  $requete = "SELECT * FROM categorie";

  return $bdd->query($requete);
}

function getImages() {
  $bdd = getBdd();
  $requete = "SELECT * FROM images";

  return $bdd->query($requete);
}

function getImagesMagasin() {
  $bdd = getBdd();
  $requete = "SELECT * FROM image_magasin";

  return $bdd->query($requete);
}

function getProduits() {
  $bdd = getBdd();
  $requete = "SELECT * FROM produit";

  return $bdd->query($requete);
}

function getProduitsByCategorie($categorieId) {
  $bdd = getBdd();
  $requete = "SELECT * FROM produit where categorie_id = $categorieId";

  return $bdd->query($requete);
}

function getImageMagasin(){
  $bdd = getBdd();
  $requete = "SELECT * FROM image_magasin";

  return $bdd->query($requete);
}

function getHistoire(){
  $bdd = getBdd();
  $requete = "SELECT * FROM histoire";

  return $bdd->query($requete);
}


function getTextMagasin(){
  $bdd = getBdd();
  $requete = "SELECT * FROM text_magasin";

  return $bdd->query($requete);
}

function getImageByType($type){
  $bdd = getBdd();
  $requete = "SELECT * FROM images where type = '$type'";

  return $bdd->query($requete);
}

function getUnique($table, $column, $value) {
  $bdd = getBdd();
  $requete;
  if(gettype($value) == 'string')
  {
    $requete = "SELECT * FROM $table where $column = '$value'";
  }
  elseif (gettype($value) == 'integer') {
    $requete = "SELECT * FROM $table where $column = $value";
  }
  return $bdd->query($requete);
}

function deleteUnique($table, $column, $value){
  $bdd = getBdd();
  $requete = "DELETE FROM $table where $column = '$value'";
  return $bdd->query($requete);
}

function getVisitor() {
  $bdd = getBdd();
  $requete = "SELECT * FROM pages";

  return $bdd->query($requete);
}

function getVisitorUnique($page) {
  $bdd = getBdd();
  $requete = "SELECT count(DISTINCT visitor_ip) as visitors FROM page_views where page_name='$page'";

  return $bdd->query($requete);
}

?>
