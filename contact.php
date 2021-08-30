<br><br><br>

<?php
$nav = "contact";
$title = "Contact";
require 'header.php';

require_once 'config.php';
  ?>

<div class="row">
    <div class="col-md-8">
        <h2>Nous contacter</h2>
        <p>Blablabla</p>
    </div>

    <div class="col-md-4">
        <h2>Horaires d'ouverture</h2>

        <?= is_open(CRENEAUX) ?>
        <ul>
            <?php foreach(JOURS as $k => $jour): ?>
                <li <?php if((int)date('N') === ($k + 1)): ?> style="color : green"; <?php endif ?> > <strong> <?= $jour ?> : </strong> <?= creneaux_html(CRENEAUX[$jour]) ?> </li>
            <?php endforeach ?>
            
        </ul>
        
    </div>
</div>


<?php require 'footer.php'; ?>
