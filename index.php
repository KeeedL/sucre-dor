<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Sucre d'or</title>
<meta name="description" content="">
<meta name="author" content="">

<!-- Favicons
    ================================================== -->
<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
<link rel="apple-touch-icon" href="img/apple-touch-icon.png">
<link rel="apple-touch-icon" sizes="72x72" href="img/apple-touch-icon-72x72.png">
<link rel="apple-touch-icon" sizes="114x114" href="img/apple-touch-icon-114x114.png">

<script type="text/javascript" src="js/more-products.js"></script>

<!-- Bootstrap -->
<link rel="stylesheet" type="text/css"  href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="fonts/font-awesome/css/font-awesome.css">

<!-- Stylesheet
    ================================================== -->
<link rel="stylesheet" type="text/css"  href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/nivo-lightbox/nivo-lightbox.css">
<link rel="stylesheet" type="text/css" href="css/nivo-lightbox/default.css">
<link href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,600,700" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Dancing+Script:400,700" rel="stylesheet">

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<?php
  require 'intranet/lib/bddFunction.php';
  $resultat = getImageByType('background');
  $backgound;
  foreach  ($resultat as $image){
    $backgound = $image['image'];
  }

  echo "<body id='page-top' data-spy='scroll' data-target='.navbar-fixed-top' style='font-family: ".'Raleway' . ", sans-serif; text-rendering: optimizeLegibility !important; -webkit-font-smoothing: antialiased !important; color: #777; font-weight: 300; width: 100% !important; height: 100% !important; background-image: url(".$backgound.") !important;'>";
  ?>


  <!-- Navigation
    ==========================================-->
<nav id="menu" class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      <a class="navbar-brand page-scroll" href="#page-top">Sucre d'or</a> </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#about" class="page-scroll">Histoire</a></li>
        <li><a href="#portfolio" class="page-scroll">Produits</a></li>
        <li><a href="#team" class="page-scroll">Magasin</a></li>
        <li><a href="#contact" class="page-scroll">Contact</a></li>
      </ul>
    </div>
    <!-- /.navbar-collapse -->
  </div>
</nav>
<!-- Header -->
<header id="header">
</head>
<?php
  $resultat = getImageByType('accueil');
  $accueil;
  foreach  ($resultat as $image){
    $accueil = $image['image'];
  }

  echo "<div class='intro' style='display: table;
  	width: 100%;
  	padding: 0;
  	background: url(".$accueil.") no-repeat center center;
  	background-color: #e5e5e5;
  	-webkit-background-size: cover;
  	-moz-background-size: cover;
  	background-size: cover;
  	-o-background-size: cover;'>";
  ?>
  <div class="overlay">
      <div class="container">
        <div class="row">
          <div class="intro-text">
            <h1>Sucre d'or</h1>
            <p></p>
            <a href="#about" class="btn btn-custom btn-lg page-scroll">Visiter le site</a> </div>
        </div>
      </div>
    </div>
  </div>
</header>
<!-- About Section -->
<div id="about" class="align background">
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-md-8 col-md-offset-2">
        <div class="about-img"><img src="img/gaufrette.png" class="img-responsive" alt=""></div>
        <div class="about-text">
          <?php
            $resultat = getHistoire();
            foreach  ($resultat as $histoire){
              $histoire = $histoire['histoire'];
              echo '<p>'.$histoire.'</p>';
            }
          ?>
        </div>
      </div>

      </div>
    </div>
  </div>
</div>
<!-- Portfolio Section -->
<div id="portfolio">
  <?php
    $resultat = getCategorie();
    foreach  ($resultat as $categorie){
      $description = $categorie['description'];
      $image       = $categorie['image'];
      $categorieId = $categorie['id'];
      $nom         = $categorie['nom'];

      $compteurProduct = 0;

      $produits = getProduitsByCategorie($categorieId);

      echo '<div class="section-title text-center center" style="background: #444 url('. $image.') center center no-repeat fixed; background-size: cover;">';
        echo '<div class="overlay">';
          echo '<h2>'. $nom .'</h2>';
          echo '<hr>';
          echo '<p>'. $description .'</p>';
        echo "</div>";
      echo "</div>";
      echo '<div class="container">';
        echo '<div id="categorie-'.$categorieId.'" class="row paddingCategorie">';
          echo '<div class="portfolio-items centerElement">';

          foreach ($produits as $produit ) {
            if($compteurProduct < 3) {
              echo '<div class="col-sm-6 col-md-4 col-lg-4 breakfast">';
              echo '<div class="portfolio-item resizeBloc">';
              echo '<div class="hover-bg"> <a href="'.$produit['image'].'" title="'.$produit['nom'].'" data-lightbox-gallery="gallery1">';
                echo '<div class="hover-text">';
                  echo '<h4>'.$produit['nom'].'</h4>';
                echo '</div>';
                echo '<img src="'.$produit['image'].'" class="img-responsive resize" alt="Project Title"> </a> </div>';
              echo '</div>';
              echo '<p class="alignCenter">'.$produit['nom'].'</p>';
            echo '</div>';
            }
            if($compteurProduct == 3) {
                //echo '<div id="hidden-product" class="hidden-product">';
            }
            if($compteurProduct >= 3) {
              echo '<div id="hidden-product" class="hidden-product col-sm-6 col-md-4 col-lg-4 breakfast">';

              echo '<div class="portfolio-item resizeBloc">';
              echo '<div class="hover-bg"> <a href="'.$produit['image'].'" title="'.$produit['nom'].'" data-lightbox-gallery="gallery1">';
                echo '<div class="hover-text">';
                  echo '<h4>'.$produit['nom'].'</h4>';
                echo '</div>';
                echo '<img src="'.$produit['image'].'" class="img-responsive resize" alt="Project Title"> </a> </div>';
              echo '</div>';
              echo '<p class="alignCenter">'.$produit['nom'].'</p>';
            echo '</div>';
            }
            $compteurProduct++;
          }
          if($compteurProduct > 3 && $compteurProduct == $produits->rowCount()) {

          }

      echo '</div>';


      echo '<div class="more-products-center col-md-12">';
      if( $compteurProduct > 3) {
        $ua = strtolower($_SERVER['HTTP_USER_AGENT']);
        $isMob = is_numeric(strpos($ua, "mobile"));

        echo '<button onclick="display('.$categorieId.', '.$compteurProduct.', '.$isMob.')" type="button" class="button-text btn-custom btn-lg page-scroll more-products-button btn">Afficher plus</button>';
      }
      echo '</div>';
      echo '</div>';
      echo '</div>';
    }
?>

</div>

<!-- Team Section -->
<?php
echo '<div id="team" class="text-center">';
$imageMagasin = getImageMagasin();
$images = [];
foreach ($imageMagasin as $image) {
  if($image['type'] == 'background')
  {
    $backgound = $image['image'];
  }
  else {
    array_push($images,$image);
  }
}

$textMagasin = getTextMagasin();
foreach ($textMagasin as $text) {
  if($text['type'] == 'entete')
  {
    $entete = $text['description'];
  }
  else {
    $footer = $text['description'];
  }
}

  echo '<div class="overlay" style="color: #fff;
                         background: #444 url('.$backgound.') center top no-repeat fixed;
                         background-size: cover;">';
    echo '<div class="container">';
      echo '<div class="col-md-10 col-md-offset-1 section-title">';
        echo '<h2>Notre boutique</h2>
              <hr>
              <p>'.$entete.'</p>';
        echo'</div>';
        echo '<div id="row">';
        // foreach
        $count = 0;
        foreach ($images as $image) {
            echo '<div class="col-md-4 team">';
              echo '<div class="thumbnail">';
                echo '<div class="team-img"><img src="'.$image['image'].'" alt="..."></div>
                      <div class="caption">';
                    echo '<h3>'.$image['titre'].'</h3>';
                    echo '<p>'.$image['description'].'</p>';
                echo '</div>';
              echo '</div>';
            echo '</div>';
            $count++;
            if( $count == 3)
            {
              echo '</div>';
              echo '</div>';
              echo '<div class="container">';
              echo '<div id="row">';
            }
            if( $count == 6)
            {
              echo '</div>';
              echo '</div>';
              echo '<div class="container">';
              echo '<div id="row">';
            }
        }
          //end foreach
        echo '</div>';
      echo '</div>';
    echo '</div>';
echo '</div>';



?>

<div id="contact" class="text-center">
  <div class="container">
    <div class="section-title text-center">
      <h2>Contact Form</h2>
      <hr>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit duis sed.</p>
    </div>
    <div class="col-md-10 col-md-offset-1">
      <form name="sentMessage" id="contactForm" novalidate>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <input type="text" id="name" class="form-control" placeholder="Name" required="required">
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <input type="email" id="email" class="form-control" placeholder="Email" required="required">
              <p class="help-block text-danger"></p>
            </div>
          </div>
        </div>
        <div class="form-group">
          <textarea name="message" id="message" class="form-control" rows="4" placeholder="Message" required></textarea>
          <p class="help-block text-danger"></p>
        </div>
        <div id="success"></div>
        <button type="submit" class="btn btn-custom btn-lg">Send Message</button>
      </form>
    </div>
  </div>
</div>
<div id="footer">
  <div class="container text-center">
    <div class="col-md-4">
      <h3>Addresse</h3>
      <div class="contact-item">
        <p>64 Rue Faidherbe,</p>
        <p> 59000 Lille</p>
      </div>
    </div>
    <div class="col-md-4">
      <h3>Heures d'ouverture</h3>
      <div class="contact-item">
        <p>Lundi-Samedi: 10:00 - 20:00 PM</p>
      </div>
    </div>
    <div class="col-md-4">
      <h3>Contact Info</h3>
      <div class="contact-item">
        <p>Tel: XX XX XX XX XX</p>
        <p>Email: mail@mail.com</p>
      </div>
    </div>
  </div>
  <div class="container-fluid text-center copyrights">
    <div class="col-md-8 col-md-offset-2">
      <div class="social">
        <ul>
          <li><a href="#"><i class="fa fa-facebook"></i></a></li>
          <li><a href="#"><i class="fa fa-twitter"></i></a></li>
          <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
        </ul>
      </div>
      <p>&copy; 2016 Touché. All rights reserved. Designed by <a href="http://www.templatewire.com" rel="nofollow">TemplateWire</a></p>
    </div>
  </div>
</div>
<script type="text/javascript" src="js/jquery.1.11.1.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/SmoothScroll.js"></script>
<script type="text/javascript" src="js/nivo-lightbox.js"></script>
<script type="text/javascript" src="js/jquery.isotope.js"></script>
<script type="text/javascript" src="js/jqBootstrapValidation.js"></script>
<script type="text/javascript" src="js/contact_me.js"></script>
<script type="text/javascript" src="js/main.js"></script>

</body>
</html>
