<!DOCTYPE html>
<html lang="en">
<head>
    <title>Sucre d'or</title>
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
    <link rel="stylesheet" type="text/css" href="styles/ajoutSpectacle.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">


</head>

<body>

<!------ Include the above in your HEAD tag ---------->

<div id="wrapper">
  <?php
    include('lib/bddFunction.php');
  ?>

    <!-- Page Content -->
    <div id="page-content-wrapper">
        <button type="button" class="hamburger is-closed" data-toggle="offcanvas">
            <span class="hamb-top"></span>
            <span class="hamb-middle"></span>
            <span class="hamb-bottom"></span>
        </button>
        <div class="container">
          <div class="container">
            <div class="col-sm-9">
              <h1 class="title">Modifer les images</h1>
          </div>
            <div class="container py-5 text-white">
          <div class="row">
              <div class="col-lg-10 mx-auto">
                  <div class="card border-0 shadow">
                      <div class="card-body p-5">
                        <h3 class="title">Modifier le background magasin</h3>
                          <!-- Responsive table -->
                          <div class="table-responsive">
                              <table class="table m-0">
                                  <thead>
                                      <tr>
                                          <th scope="col">#</th>
                                          <th scope="col">Image</th>
                                          <th scope="col">Upload</th>
                                          <th scope="col"></th>
                                      </tr>
                                  </thead>
                                  <tbody>

                                    <?php
                                      $bdd = getBdd();
                                      $sql = "SELECT * from image_magasin where type = 'background'";

                                      $count = 0;
                                      foreach  ($bdd->query($sql) as $row){
                                        $count++;
                                        echo '<tr>
                                                <form action="edit_image_magasin.php" method="post" enctype="multipart/form-data">
                                                  <th scope="row">'. $count .'</th>
                                                  <td><img class="sizeImage" src="../' . $row['image'] . '"></td>
                                                  <td>
                                                    <div class="form-group">
                                                      <label for="myfile">Modifer l image : </label>
                                                      <input type="file" name="myfile"> <br>
                                                    </div>
                                                  </td>
                                                  <td>
                                                    <!-- Call to action buttons -->
                                                    <ul class="list-inline m-0">
                                                        <li class="list-inline-item">
                                                        <button name="'. $row['id'] .'" type="submit" type="button" class="btn btn-labeled btn-warning">
                                                          <span class="btn-label"><i class="glyphicon glyphicon-floppy-save"></i></span>   Enregistrer
                                                        </button>
                                                        </li>
                                                    </ul>
                                                   </form>

                                                  </td>
                                              </tr>';
                                      }
                                    ?>
                                  </tbody>
                              </table>
                          </div>
                          <h3 class="title">Modifier les images</h3>
                            <!-- Responsive table -->
                            <div class="table-responsive">
                                <table class="table m-0">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Image</th>
                                            <th scope="col">Titre</th>
                                            <th scope="col">Description</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                      <?php
                                        $sql = "SELECT * from image_magasin where type = 'image'";

                                        $count = 0;
                                        foreach  ($bdd->query($sql) as $row){
                                          $count++;
                                          echo '<tr>
                                                  <form action="image_magasin_edit.php" method="post" enctype="multipart/form-data">
                                                    <th scope="row">'. $count .'</th>
                                                    <td><img class="sizeImage" src="../' . $row['image'] . '"></td>
                                                    <td>'.$row['titre'].'</td>
                                                    <td>'.$row['description'].'</td>
                                                    <td>
                                                      <!-- Call to action buttons -->
                                                      <ul class="list-inline m-0">
                                                          <li class="list-inline-item">
                                                          <form action="image_magasin_edit.php" method="post"" >
                                                          <button name="'. $row['id'] .'" type="submit" class="btn btn-labeled btn-success">
                                                            <span class=""><i class="glyphicon glyphicon-pencil"></i></span>
                                                          </button>
                                                          </form>
                                                          </li>
                                                          <li class="list-inline-item">
                                                          <form action="produit_delete.php" method="post"" >
                                                          <button name="'. $row['id'] .'" type="submit" class="btn btn-labeled btn-danger">
                                                            <span class=""><i class="glyphicon glyphicon-trash"></i></span>
                                                          </button>
                                                          </form>
                                                          </li>
                                                      </ul>
                                                    </td>
                                                </tr>';
                                        }
                                      ?>
                                    </tbody>
                                </table>
                            </div>

                            <h3 class="title">Modifier le texte</h3>
                            <?php
                            $sql = "SELECT * from text_magasin where type = 'entete'";
                              foreach  ($bdd->query($sql) as $row){
                                echo '<form name="form2" action="updateDescription.php" method="post" >
                                        <fieldset>
                                          <div class="form-group">
                                            <textarea name="description" id="editor4" rows="10" cols="80">' . $row['description']. '</textarea>
                                            <script>
                                            CKEDITOR.replace( "editor4" );
                                            </script>
                                          </div>
                                        </fieldset>
                                        <button name="'. $row['id'] .'" type="submit" type="button" class="btn btn-labeled btn-warning">
                                          <span class="btn-label"><i class="glyphicon glyphicon-pencil"></i></span>   Modifier
                                        </button>
                                    </form>';
                              }
                            ?>
                      </div>
                  </div>
              </div>
            </div>
          </div>
        </section>
    </div>
    <!-- /#page-content-wrapper -->

</div>

</body>
</html>
