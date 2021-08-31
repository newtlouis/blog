<?php 
$nav = "login";
$title = "Connexion";
require 'header.php'; 
// password_hash('mdp') pour hasher le mdp
// password_verify('mdphash') pour vérifier le bon ddp

$erreur = null;
if( !empty($_POST['pseudo']) && !empty($_POST['mdp']) ){
    if( $_POST['pseudo'] === "lou" && $_POST['mdp'] === "mi" ){
        session_start();
        $_SESSION['connecté'] = 1;
        header('location: /index.php');
    }else{
        $erreur = "identifiants incorrects";
    }
}

?>

<!-- Begin page content -->
<main class="flex-shrink-0">
  <div class="container">
    <h1 class="mt-5">Login</h1>
    <?php if ($erreur): ?>
        <div class="alert alert-danger">
            <?= $erreur ?>
        </div>
    <?php endif ?>
    <form action="" method="post">
        <input type="text" name="pseudo" placeholder="lou">
        <input type="password" name="mdp" placeholder="mi">
        <button type="submit" class="btn btn-primary">Se connecter</button>
    </form>
  </div>
</main>

<?php require 'footer.php'; ?>
