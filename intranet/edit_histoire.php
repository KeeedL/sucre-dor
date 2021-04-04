<?php
// connect to the database
require 'lib/bddFunction.php';
if( !isset($_POST['histoire'])) {
  $message = "Des champs requis sont manquants";
  echo "<script type='text/javascript'>alert('$message');</script>";
}
$bdd = getBdd();

$histoire         = $bdd->quote($_POST['histoire']);

$sql = "UPDATE `histoire` SET `histoire`=$histoire WHERE id > 0";

$return = $bdd->prepare($sql);
if ($return->execute())
{
    $message = "Histoire modifié";
    echo "<script type='text/javascript'>alert('$message');</script>";
    header('Location: index.php');
}
else
{
  $message = "Echec de l'ajout du menu";
  echo "<script type='text/javascript'>alert('$message');</script>";
}

// the physical file on a temporary uploads directory on the server
?>
