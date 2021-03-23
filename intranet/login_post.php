
<?php
// on vérifie que les données du formulaire sont présentes
if (isset($_POST['login']) && isset($_POST['password'])) {
    require 'lib/bddFunction.php';
    $bdd = getBdd();
    // cette requête permet de récupérer l'utilisateur depuis la BD
    $requete = "SELECT * FROM admin WHERE login=? AND password=?";
    $resultat = $bdd->prepare($requete);
    $login = $_POST['login'];
    $mdp = $_POST['password'];
    $resultat->execute([$login, $mdp]);
    if ($resultat->rowCount() == 1) {
        session_start();  // démarrage d'une session
        // l'utilisateur existe dans la table
        // on ajoute ses infos en tant que variables de session
        $_SESSION['login'] = $login;
        $_SESSION['mdp'] = $mdp;
        // cette variable indique que l'authentification a réussi
        $_SESSION['authOK'] = 1;
    }
}
?>

<?php
echo $_SESSION;
if ($_SESSION['authOK'] == 1) {
    header('Location: index.php');
}
else {
  header('Location: authent.php');
}

?>
