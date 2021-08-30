<!-- LOGIQUE PHP -->
<?php require 'header.php';

// variables
$devinette = 25;
$fail = null;
$success = null;
$result = null;
$styleResult = null;
$value = null;
$listParfumsItem = null;
$listParfums = null ;

// Le chiffre est trop haut ou trop bas ou correct ?
if (isset($_GET['chiffre'])){
    if($_GET['chiffre'] > $devinette){
        $fail = "Trop haut !";
    }
    elseif ($_GET['chiffre'] < $devinette){
        $fail = "Trop bas !";
    }
    else{
        $success="Félicitation ! J'ai bien <strong>$devinette</strong> ans.";
    }
    $value = htmlentities($_GET['chiffre']);
}

// Attribution du style et du resultat
if($success){
    $result = $success;
    $styleResult = 'alert alert-success';
}
elseif ($fail){
    $result = $fail;
    $styleResult = 'alert alert-danger';
}

// Liste des parfums
if(isset($_POST['parfum'])){

    foreach($_POST['parfum'] as $parfumItrem){
        $listParfumsItem .= $parfumItrem . " ";
    }
$listParfums = "Voici votre glace " . $listParfumsItem;
}

?>

<!-- HTML -->

<div class="section" style="margin: 60px 30px">

<!-- Jeu de l'age -->
    <h2>Deviner mon age</h2>
    <form action="/jeu.php" method="get">
    <!-- name dans input sert pour que php récupère la donnée -->
        <input type="number" name="chiffre" placeholder="entre 0 et 100" value="<?= $value?>">
        <button type="submit">Deviner</button>
    </form>
    <div class="<?= $styleResult ?>"><?= $result ?></div>

    <!-- Methode GET pour avoir les données dans l'url, méthode POST pour les cacher(safe). -->
    <h2>Quels sont vos parfums de glace préférés ?</h2>
    <form action="/jeu.php" method="post">
    <!-- Si on veut récupérer plusieurs valeur d'input, alors mettre une liste dans le name -->
        <input type="checkbox" name="parfum[]" value="Fraise"> Fraise <br>
        <input type="checkbox" name="parfum[]" value="Vanille"> Vanille <br>
        <input type="checkbox" name="parfum[]" value="Chocolat"> Chocolat <br>
        <input type="checkbox" name="parfum[]" value="Pistache"> Pistache <br>
        <input type="checkbox" name="parfum[]" value="Mangue"> Mangue <br>
        <button type="submit">Commander</button>
    </form>
    <div class="listParfum"> <?= $listParfums ?></div>

</div>

<!-- FOOTER -->
<?php require 'footer.php'?>