<!-- FOOTER -->
<?php require 'header.php'?>
<?php $devinette = 3 ?>

<div class="section" style="margin: 60px 30px">
    <form action="/jeu.php" method="get">
    <!-- name dans input sert pour que php récupère la donnée -->
        <input type="number" name="chiffre" placeholder="entre 0 et 10" value="<?= (int)$_GET['chiffre']?>">
        <button type="submit">Deviner</button>
    </form>


    <?php if($_GET['chiffre'] > $devinette): ?>
        Trop haut !
    <?php elseif ($_GET['chiffre'] < $devinette): ?>
        Trop bas ..
    <?php else: ?>
        Bravo vous avez trouvé le bon chiffre !
    <?php endif ?>

<pre>
    <?php $_GET ?>
</pre>

</div>

<!-- FOOTER -->
<?php require 'footer.php'?>