<?php


echo '
    <!-- Sidebar -->
    <nav class="navbar navbar-inverse navbar-fixed-top" id="sidebar-wrapper" role="navigation">
        <ul class="nav sidebar-nav">
            <li class="sidebar-brand">
                <a href="#">
                    Intranet
                </a>
            </li>
            <li>
                <a href="index.php">Accueil</a>
            </li>

            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Gerer les produits <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                    <li class="dropdown-header">Produits</li>
                    <li><a href="produit_ajout.php">Ajouter un produit</a></li>
                    <li><a href="produit_afficher.php">Modifier les produits</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Gerer les categories <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                    <li class="dropdown-header">Gerer les categories</li>
                    <li><a href="ajoutCategorie.php">Ajout categorie</a></li>
                    <li><a href="modifier_categorie.php">Modifier les categories</a></li>
                </ul>
            </li>
            <li>
                <a href="modifier_histoire.php">Modifier histoire</a>
            </li>
            <li>
                <a href="modifier_magasin.php">Magasin</a>
            </li>
            <li>
                <a href="modifier_image.php">Images de fonds</a>
            </li>
        </ul>
    </nav>
    <!-- /#sidebar-wrapper -->'

?>
