<?php

require 'lib/bddFunction.php';
$keys = array_keys($_POST);

$delete = deleteUnique('categorie','id',$keys[0]);

if ($delete)
{
    header('Location: modifier_categorie.php');
}
else
{
  $message = "Echec de la suppresion du spectacle";
  echo "<script type='text/javascript'>alert('$message');</script>";
}
