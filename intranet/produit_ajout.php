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

<!------ Include the above in your HEAD tag ---------->

<div id="wrapper">
  <?php
    include('admin_menu.php');

    session_start();
    if ($_SESSION['authOK'] != 1) {
        header('Location: authent.php');
    }
  ?>

    <!-- Page Content -->
    <div id="page-content-wrapper">
        <button type="button" class="hamburger is-closed" data-toggle="offcanvas">
            <span class="hamb-top"></span>
            <span class="hamb-middle"></span>
            <span class="hamb-bottom"></span>
        </button>
        <div class="container">
          <h1 class="title">Ajouter un produit</h1>

            <div class="row">

                <div class="col-lg-4 col-lg-offset-0">
                  <form name="form1" action="menu_filesLogicCreate.php" method="post" enctype="multipart/form-data" >
                    <fieldset>
                      <div class="form-group">
                        <label for="titre">Nom du produit</label>
                        <input type="text" class="form-control" name="nom" id="nom" placeholder="Nom">
                      </div>
                      <div class="form-group">
                        <label for="titre">Description</label>
                        <input type="text" class="form-control" name="description" id="description" placeholder="Ingrédients">
                      </div>
                      <div class="form-group">
                        <label for="selection">Categorie</label>
                        <select name='categorie' id="categorie" class="form-control">
                          <option value="">Liste des categories...</option>
                          <optgroup>
                            <?php
                              require 'lib/bddFunction.php';
                              $resultat = getCategorie();
                              foreach  ($resultat as $categorie) {
                                echo '<option value="'. $categorie['id'] .'">'. $categorie['nom'] . '</option>';
                              }
                            ?>
                          </optgroup>
                        </select>
                      </div>
                      
                    </fieldset>
                  <div class="form-group">
                    <label for="myfile">Uploader l'image : </label>
                    <input type="file" name="myfile"> <br>
                  </div>
                </div>
                <div class="col-lg-4 col-lg-offset-0">
                    <fieldset>
                    <div class="form-group">
                        <label for="titre">Prix :</label>
                        <input type="text" class="form-control" name="prixSeul" id="prixSeul" placeholder="Format : 5.30">
                      </div>
                    </fieldset>
                  </div>
                  <div class="col-lg-4 col-lg-offset-5">
                    <button type="submit" name='save' class="btn btn-danger">Ajouter le menu</button>
                  </div>
                  </form>
            </div>
        </div>
    </div>
    <!-- /#page-content-wrapper -->

</div>
<!-- /#wrapper -->

</body>
</html>
