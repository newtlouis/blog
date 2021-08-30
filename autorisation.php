<?php 
$nav = "autorisation";
$title = "autorisation";
require 'header.php'; 

$age = null;

if (!empty($_POST['birthday'])){
    setcookie('birthday' , $_POST['birthday']);
}

if (!empty($_COOKIE['birthday'])){
    $birthday = (int)$_COOKIE['birthday'];
    $age = (int)date('Y') - $birthday;
}


?>

<!-- Begin page content -->
<br><br><br>
<main class="flex-shrink-0">
    <div class="container">
        <?php if ($age && $age  >= 18 ) : ?>
            <h2 style="color : green">Contenu autorisé</h2>

        <?php else: ?>
            <h2 style="color : red">Désolé, vous n'êtes pas autorisé à consulter cette section</h2>
        
        <?php endif ?>

        <form action="" method="post">
            <label for="birthday">Section réservé pour les adultes, veuillez entrer votre année de naissance</label>
            <select name="birthday" id="birthday" class="form-control">
                <?php for( $i = 2021 ; $i > 1900 ; $i --) : ?>
                    <option value="<?= $i ?>"> <?= $i ?> </option>
                <?php endfor ?>
            </select>
            <button type="submit">Envoyer</button>
        </form>
    </div>
</main>

<?php require 'footer.php'; ?>
