<?php
// connect to the database
require 'lib/bddFunction.php';
if( !isset($_POST['categorie']) || !isset($_POST['nom'])) {
  $message = "Des champs requis sont manquants";
  echo "<script type='text/javascript'>alert('$message');</script>";
}
$bdd = getBdd();

$nom         = $bdd->quote($_POST['nom']);
$description = 'NULL';
if($_POST['description'])
{
  $description = $bdd->quote($_POST['description']);

}
$prix         = 'NULL';
if($_POST['prixSeul'])
{
  $prix = $_POST['prixSeul'];
}
$categorie   = $_POST['categorie'];

if( $_FILES['myfile']['name'] ){
  $filename    = $_FILES['myfile']['name'];

  $destination = '../img/' . $filename;
  $extension = pathinfo($filename, PATHINFO_EXTENSION);
  $file = $_FILES['myfile']['tmp_name'];

  if (!in_array($extension, ['pdf', 'jpeg', 'jpg', 'png']))
  {
      echo "You file extension must be 'pdf', 'jpeg', 'jpg', 'png'";
  }
  else
  {
      // move the uploaded (temporary) file to the specified destination
      if (move_uploaded_file($file, $destination))
      {
        $destination = 'img/' . $filename;

          $sql = "INSERT INTO `produit`(`nom`, `description`, `categorie_id`, `prix`, `image`) VALUES ($nom, $description, $categorie, $prix, '$destination')";

          $return = $bdd->prepare($sql);
          if ($return->execute())
          {
              $message = "menu ajouté";
              echo "<script type='text/javascript'>alert('$message');</script>";
              header('Location: produit_afficher.php');
          }
          else
          {
            $message = "Echec de l'ajout du menu";
            echo "<script type='text/javascript'>alert('$message');</script>";
          }
      }
      else
      {
        $message = "Echec de l'upload de fichier ";
        echo "<script type='text/javascript'>alert('$message');</script>";
      }
  }

}
// the physical file on a temporary uploads directory on the server
?>
