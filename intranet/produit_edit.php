<!DOCTYPE html>
<html lang="en">
<head>
    <title>Best Of Burger</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Conference project">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    <script src="lib/ckeditor/ckeditor.js"></script>
    <script src="js/bar-menu.js"></script>
    <link rel="stylesheet" type="text/css" href="styles/index.css">
    <link rel="stylesheet" type="text/css" href="styles/custom.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">


</head>

<body>


<?php

include('admin_menu.php');

session_start();
if ($_SESSION['authOK'] != 1) {
    header('Location: authent.php');
}

require 'lib/bddFunction.php';
$keys = array_keys($_POST);

$resultat = getUnique('produit','id',$keys[0]);

if ($resultat)
{
  echo '<div id="wrapper">';
  echo '
      <!-- Page Content -->
      <div id="page-content-wrapper">
          <button type="button" class="hamburger is-closed" data-toggle="offcanvas">
              <span class="hamb-top"></span>
              <span class="hamb-middle"></span>
              <span class="hamb-bottom"></span>
          </button>
          <div class="container">';
          foreach  ($resultat as $menu){
            $categories = getUnique('categorie','id', $menu["categorie_id"]);
            echo'
            <h1 class="title">Modifier un produit</h1>

            <div class="row">

                <div class="col-lg-4 col-lg-offset-0">
                  <form name="form1" action="menu_filesLogicUpdate.php" method="post" enctype="multipart/form-data" >
                    <fieldset>
                      <div class="form-group">
                        <label for="titre">Nom du menu</label>
                        <input type="text" class="form-control" name="nom" id="nom" value="'. $menu['nom'] .'">
                      </div>
                      <div class="form-group">
                        <label for="titre">Description</label>
                        <input type="text" class="form-control" name="description" id="description" value="'. $menu['description'] .'">
                      </div>
                      <div class="form-group">
                        <label for="selection">Categorie</label>
                        <select name="categorie" id="categorie" class="form-control">';
                        foreach  ($categories as $categorie){
                          echo'
                          <option value='. $categorie['id'] .'>'. $categorie['nom'] .'</option>';
                        }
                        echo '<optgroup>';
                            
                              $resultat = getCategorie();
                              foreach  ($resultat as $categorie){
                                echo'<option value="'. $categorie['id'] .'">'. $categorie['nom'] . '</option>;';
                              }
                            
                            echo'
                          </optgroup>
                        </select>
                      </div>
                      
                    </fieldset>
                    <div class="form-group">
                    <label>Photo :    <img class="img-edit-spectacle2"src="../' . $menu['image'] .'" alt=""></img> </label>
                    <br>
                    <label for="myfile">Charger une nouvelle image : </label>
                      <input type="file" name="myfile"> <br>
                    </div>
                </div>
                <div class="col-lg-4 col-lg-offset-0">
                    <fieldset>
                    <div class="form-group">
                        <label for="titre">Prix seul</label>
                        <input type="text" class="form-control" name="prix" id="prixSeul" value="'. $menu['prix'] .'">
                      </div>
                    </fieldset>
                  </div>
                    <div class="col-lg-4 col-lg-offset-7">
                      <button type="submit" name="'. $menu['id'] .'" class="btn btn-success">Modifier le menu</button>
                    </div>
                    </form>
              </div>
          </div>
      </div>
      <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->';
}
}
else
{
  $message = "Echec de la modification du spectacle";
  echo "<script type='text/javascript'>alert('$message');</script>";
}
?>
