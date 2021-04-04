<?php

if( !isset($_POST['categorie']) )
{
  $message = "Le champs categorie est requis";
  echo "<script type='text/javascript'>alert('$message');</script>";
}
require 'lib/bddFunction.php';
$bdd = getBdd();
$nom         = $bdd->quote($_POST['categorie']);
$description = $bdd->quote($_POST['description']);

$resultat = getCategorie();

$alreadyExist = 0;
foreach  ($resultat as $categorieGet){
  if($nom == $categorieGet['nom'])
  {
    $message = "Cette categorie existe deja";
    echo "<script type='text/javascript'>alert('$message');</script>";
    $alreadyExist = 1;
  }
}

if( $alreadyExist == 0 )
{
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

            $sql = "INSERT INTO `categorie`(`nom`, `description`, `image`) VALUES ($nom, $description,'$destination')";
            $return = $bdd->prepare($sql);
            if ($return->execute())
            {
                $message = "categorie ajouté";
                echo "<script type='text/javascript'>alert('$message');</script>";
                header('Location: modifier_categorie.php');
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
}

?>
