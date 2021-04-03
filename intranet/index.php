<!DOCTYPE html>
<html lang="en">
<head>
    <title>Sucre d'or</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Conference project">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    <script src="js/bar-menu.js"></script>
    <link rel="stylesheet" type="text/css" href="styles/index.css">
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
        <div class="container">
          <div class="col-sm-9">
            <h1 class="title">Nombre de visiteurs</h1>
        </div>
          <div class="container py-5 text-white">
        <div class="row">
            <div class="col-lg-7 mx-auto">
                <div class="card border-0 shadow">
                    <div class="card-body p-5">

                        <!-- Responsive table -->
                        <div class="table-responsive">
                            <table class="table m-0">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Page</th>
                                        <th scope="col">Visiteur unique</th>
                                        <th scope="col">Visiteurs totaux</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                  
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
