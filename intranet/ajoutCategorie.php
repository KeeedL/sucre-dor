<!DOCTYPE html>
<html lang="en">
<head>
    <title>Sucre d'or - ajout categorie</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Conference project">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    <script src="lib/ckeditor/ckeditor.js"></script>
    <script src="js/bar-menu.js"></script>
    <link rel="stylesheet" type="text/css" href="styles/index.css">
    <link rel="stylesheet" type="text/css" href="styles/ajoutSpectacle.css">

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
          <h1 class="title">Ajouter une categorie</h1>

            <div class="row">

                <div class="col-lg-4 col-lg-offset-0">
                  <form name="form1" action="addCategorie.php" method="post" enctype="multipart/form-data" >
                    <fieldset>
                      <div class="form-group">
                        <label for="titre">Entrer la categorie </label>
                        <input type="text" class="form-control" name="categorie" id="categorie" placeholder="Categorie">
                      </div>
                      <div class="form-group">
                        <label for="titre">Description</label>
                        <input type="text" class="form-control" name="description" id="description" placeholder="Description de la categorie">
                      </div>
                      <div class="form-group">
                        <label for="myfile">Uploader l'image : </label>
                        <input type="file" name="myfile"> <br>
                      </div>
                    </div>
                    </fieldset>
                    <button type="submit" name='save' class="btn btn-danger">Ajouter la categorie</button>
                  </form>
            </div>
        </div>
    </div>
    <!-- /#page-content-wrapper -->

</div>
<!-- /#wrapper -->

</body>
</html>
