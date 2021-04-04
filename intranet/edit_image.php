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

var_dump( $_POST);
var_dump( $_FILES);

$filename    = $_FILES['myfile']['name'];

$destination = '../img/' . $filename;
$extension = pathinfo($filename, PATHINFO_EXTENSION);
$file = $_FILES['myfile']['tmp_name'];

if (!in_array($extension, ['pdf', 'jpeg', 'jpg', 'png']))
{
    echo "You file extension must be .jpg, .pdf, jpeg or .png";
}
else
{
    // move the uploaded (temporary) file to the specified destination
    $destination = '../img/' . $filename;

    if (move_uploaded_file($file, $destination))
    {
        $destination = 'img/' . $filename;
        $sql = "UPDATE images SET image = '$destination' WHERE id = $id";
        if ($bdd->query($sql))
        {
            $message = "Image modifié";
            echo "<script type='text/javascript'>alert('$message');</script>";
            echo "Modifié";
            header('Location: modifier_image.php');
        }
        else
        {
          $message = "Echec de la modification de l'image";
          echo "Failed modification";
          echo "<script type='text/javascript'>alert('$message');</script>";
        }
    }
    else
    {
      echo "Failed upload";

      $message = "Echec de l'upload de fichier ";
      echo "<script type='text/javascript'>alert('$message');</script>";
    }
}
// the physical file on a temporary uploads directory on the server
?>
