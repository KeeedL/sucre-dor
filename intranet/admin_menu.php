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
                <a href="index.php">Dashboard</a>
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
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Gerer les promotions <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                    <li class="dropdown-header">Promotions</li>
                    <li><a href="ajoutSpectacle.php">Ajouter une promotion</a></li>
                    <li><a href="modifierSpectacle.php">Modifier les promotions</a></li>
                </ul>
            </li>
            <li>
                <a href="theatre.php">Slider</a>
            </li>
        </ul>
    </nav>
    <!-- /#sidebar-wrapper -->'

?>
