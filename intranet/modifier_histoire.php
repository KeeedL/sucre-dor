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
    <script src="js/bar-menu.js"></script>
    <script src="lib/ckeditor/ckeditor.js"></script>
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
          <h1 class="title">Modifer l'histoire de la gauffre</h1>

            <div class="row">
                <div class="col-lg-4 col-lg-offset-0">
                  <form name="form1" action="edit_histoire.php" method="post" enctype="multipart/form-data" >
                    <fieldset>
                      <div class="form-group">
                        <div class="form-group">
                          <label for="editor4">Modifier l'histoire : </label>
                          <?php
                            require 'lib/bddFunction.php';
                            $bdd = getBdd();

                            $resultat = getHistoire();

                            foreach  ($resultat as $histoire){
                              echo '<textarea name="histoire" id="histoire" rows="10" cols="80"  placeholder="Entrer un histoire">'.$histoire['histoire'].'</textarea>
                                      <script>
                                        CKEDITOR.replace( "editor4" );
                                      </script>';
                            }
                          ?>
                        </div>
                    </fieldset>
                    <button type="submit" name='save' class="btn btn-success">Modifier</button>
                  </form>
            </div>
        </div>
    </div>
    <!-- /#page-content-wrapper -->

</div>
<!-- /#wrapper -->

</body>
</html>
