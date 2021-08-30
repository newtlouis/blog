<!-- Pour stocker des tableaux, serialize les données et quand on les récupère faire unserialize -->

<?php 
$nom = null;
if (!empty($_GET['action']) && $_GET['action'] === 'deconnecter'){
    // unset($_COOKIE['utilisateur']);
    setcookie('utilisateur' , '' , time() - 10);
}
if (isset($_COOKIE['utilisateur'])){
    $nom = $_COOKIE['utilisateur'];
}
if (isset($_POST['nom'])){
    setcookie('utilisateur' , $_POST['nom']);
}
$nav = "profil";
$title = "Profil";
require 'header.php'; 
?>

<!-- Begin page content -->
<br><br><br>
<main class="flex-shrink-0">
  <div class="container">
    <h1 class="mt-5">Profil</h1>
    <br>
    <?php if ($nom) : ?>
        <h2>Bonjour <?= htmlentities($nom) ?> </h2>
        <a href="profil.php?action=deconnecter">Se déconnecter</a>
    <?php else : ?>
        <form action="/profil.php" method="post">
            <input type="text" name="nom" placeholder="Entrer votre nom">
            <button class="btn btn-primary" type="submit">Se connecter</button>
        </form>
    <?php endif ?>
</div>
</main>

<?php require 'footer.php'; ?>
