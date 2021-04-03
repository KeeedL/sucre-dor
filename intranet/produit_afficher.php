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
          <div class="col-sm-9">
            <h1 class="title">Modifer les produits</h1>
        </div>
        <a onclick="window.location.href='produit_ajout.php'" class="btn btn-success margin" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Nouveau produit</span></a>

          <section class="pb-5 header text-center">
            <div class="container py-5 text-white">
          <div class="row">
              <div class="col-lg-10 mx-auto">
                  <div class="card border-0 shadow">
                      <div class="card-body p-5">
                      <?php
                          $count = 0;
                          require 'lib/bddFunction.php';
                          $categories = getCategorie();

                          foreach( $categories as $categorie )
                          {

                              $result = getProduitsByCategorie($categorie['id']);

                              //Responsive table
                              echo '
                              <div class="table-responsive">
                                  <table class="table m-0">
                                      <thead>
                                          <h2 style="margin-top: 100px;">'. $categorie['nom'] .'</h2>
                                          <tr>
                                              <th scope="col">#</th>
                                              <th class="align-text" scope="col">Image</th>
                                              <th class="align-text reduce" scope="col">Nom</th>
                                              <th class="align-text reduce2" scope="col">Description</th>
                                              <th class="align-text" scope="col">Categorie</th>
                                              <th class="align-text" scope="col">Prix</th>
                                          </tr>
                                      </thead>
                                      <tbody>';

                                      foreach  ($result as $produit){
                                        $count++;
                                        echo '<tr>
                                                  <th scope="row">'. $count .'</th>
                                                  <td><img class="img-edit-spectacle"src="../' . $produit['image'] .'" alt=""></img></td>
                                                  <td>' . $produit['nom'] . '</td>
                                                  <td>' . $produit['description'] . '</td>
                                                  <td>' . $categorie['nom'] . '</td>
                                                  <td>' . $produit['prix'] . '</td>
                                                  <td>
                                                    <!-- Call to action buttons -->
                                                    <ul class="list-inline m-0">
                                                        <li class="list-inline-item">
                                                        <form action="produit_edit.php" method="post"" >
                                                        <button name="'. $produit['id'] .'" type="submit" class="btn btn-labeled btn-success">
                                                          <span class=""><i class="glyphicon glyphicon-pencil"></i></span>
                                                        </button>
                                                        </form>
                                                        </li>
                                                        <li class="list-inline-item">
                                                        <form action="produit_delete.php" method="post"" >
                                                        <button name="'. $produit['id'] .'" type="submit" class="btn btn-labeled btn-danger">
                                                          <span class=""><i class="glyphicon glyphicon-trash"></i></span>
                                                        </button>
                                                        </form>
                                                        </li>
                                                    </ul>
                                                  </td>
                                              </tr>';
                                      }
                                    }
                                    ?>
                                  </tbody>
                              </table>
                          </div>
                      </div>
                  </div>
              </div>
            </div>
          </div>
        </section>
    </div>
    <!-- /#page-content-wrapper -->

</div>
<!-- /#wrapper -->
</body>
</html>