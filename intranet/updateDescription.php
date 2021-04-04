<?php
// connect to the database
require 'lib/bddFunction.php';
$bdd = getBdd();

$keys = array_keys($_POST);

foreach ($keys as $key) {
  if( gettype($key) == 'integer')
  {
    $id = $key;
  }
}

$description = $_POST['description'];

$sql = "UPDATE text_magasin SET description = '$description' WHERE id = $id";
if ($bdd->query($sql))
{
    $message = "Description modifié";
    echo "<script type='text/javascript'>alert('$message');</script>";
    header('Location: modifier_magasin.php');
}
else
{
    $message = "Echec de la modification de la description";
    echo "Failed modification";
    echo "<script type='text/javascript'>alert('$message');</script>";
}
// the physical file on a temporary uploads directory on the server
?>
