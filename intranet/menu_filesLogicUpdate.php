<?php
// connect to the database
require 'lib/bddFunction.php';
$bdd = getBdd();
if( !isset($_POST['categorie']) || !isset($_POST['nom'])) {
  $message = "Des champs requis sont manquants";
  echo "<script type='text/javascript'>alert('$message');</script>";
}

$nom         = $bdd->quote($_POST['nom']);
$description = 'NULL';
if($_POST['description'])
{
  $description = $bdd->quote($_POST['description']);

}
$prix        = $_POST['prix'];
if(!$prix)
{
  $prix = 'NULL';

}
$categorie   = $_POST['categorie'];

$keys = array_keys($_POST);
foreach ($keys as $key) {
    if( gettype($key) == 'integer')
    {
      $id = $key;
    }
  }
  
  if( $_FILES['myfile']['name'] ) {
    $filename    = $_FILES['myfile']['name'];
  
    $destination = '../img/' . $filename;  
    $extension = pathinfo($filename, PATHINFO_EXTENSION);
    $file = $_FILES['myfile']['tmp_name'];
  
    if (!in_array($extension, ['pdf', 'jpeg', 'jpg', 'png']))
    {
        echo "You file extension must be .zip, .pdf or .docx";
    } else {

    $resultat = getUnique('produit','id',$id);
    if ($resultat)
    {
      // move the uploaded (temporary) file to the specified destination
      if (move_uploaded_file($file, $destination))
      {
          
          $destination = 'img/' . $filename;

          $sql = "UPDATE `produit` SET `nom`=$nom,`description`=$description,`categorie_id`=$categorie,`prix`=$prix,`image`= '$destination' WHERE id =$id";

          echo $sql;

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
  } else {

    $sql = "UPDATE `produit` SET `nom`=$nom,`description`=$description,`categorie_id`=$categorie,`prix`= $prix WHERE id =$id";
    echo $sql;
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

// the physical file on a temporary uploads directory on the server
?>