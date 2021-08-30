<!-- FOOTER -->
<?php require 'header.php';
$devinette = 25;
$fail = null;
$success = null;
$result = null;
$styleResult = null;
$value = null;

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

if($success){
    $result = $success;
    $styleResult = 'alert alert-success';
}
else{
    $result = $fail;
    $styleResult = 'alert alert-danger';
}

?>

<div class="section" style="margin: 60px 30px">
    <h2>Deviner mon age</h2>
    <form action="/jeu.php" method="get">
    <!-- name dans input sert pour que php récupère la donnée -->
        <input type="number" name="chiffre" placeholder="entre 0 et 100" value="<?= $value?>">
        <button type="submit">Deviner</button>
    </form>

    <div class="<?= $styleResult ?>"><?= $result ?></div>


</div>

<!-- FOOTER -->
<?php require 'footer.php'?>