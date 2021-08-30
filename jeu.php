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

$parfums = [
    'vanille' => 2,
    'fraise' => 3,
    'chocolat' => 2,
    'pistache' => 3,
    'mangue' => 2,
];
$cornets = [
    'pot' => 0.5,
    'cornet' => 1,
];
$supplements = [
    'chantilly' => 1,
    'pépites de chocolat' => 1.5,
];
$ingredients = [];
$total = 0;

foreach(['parfum' , 'supplement' , 'cornet'] as $name){
    if (isset($_GET[$name])){
        $liste = $name . "s";
        $choix = $_GET[$name];
        if (is_array($choix)){
            foreach($choix as $value){
                if (isset($$liste[$value])){
                    $ingredients[] = $value;
                    $total += $$liste[$value];
                }
            }
        }
        else {
            if (isset($$liste[$value])){
                $ingredients[] = $value;
                $total += $$liste[$value];
            }
        }
    }
}


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

    <br><br>
    
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
    
    <br><br>

    <h2>Maintenant, payer votre glace €€€</h2>
    <div class="row">
        <div class="col-md-4">
            <h5>Votre glace</h5>
            <div class="">
                <ul>
                    <?php foreach($ingredients as $ingredient): ?>
                        <li> <?= $ingredient ?> </li>
                    <?php endforeach ?>
                </ul>
            </div>
            <div class="">
                Au prix de <?= $total ?> €
            </div>
        </div>
        <div class="col-md-4">
            <form action="/jeu.php" method="get">
                <!-- liste parfum -->
                <h5>Choisissez vos parfums:</h5>
                <?php foreach($parfums as $parfum => $prix): ?>
                    <div class="checkbox">
                        <label>
                            <?= checkbox('parfum' , $parfum , $_GET) ?>
                            <?= $parfum ?> - <?= $prix ?> €
                        </label>
                    </div>
                <?php endforeach ?>
                
                <!-- liste cornet -->
                <br>
                <h5>Choisissez votre cornet:</h5>
                <?php foreach($cornets as $cornet => $prix): ?>
                    <div class="checkbox">
                        <label>
                            <?= radio('cornet' , $cornet , $_GET) ?>
                            <?= $cornet ?> - <?= $prix ?> €
                        </label>
                    </div>
                <?php endforeach ?>

                <!-- liste supplément -->
                <br>
                <h5>Choisissez vos suppléments:</h5>
                <?php foreach($supplements as $supplement => $prix): ?>
                    <div class="checkbox">
                        <label>
                            <?= checkbox('supplement' , $supplement , $_GET) ?>
                            <?= $supplement ?> - <?= $prix ?> €
                        </label>
                    </div>
                <?php endforeach ?>

                <br>

                <button type="submit">Donnez moi le prix svp</button>
                
            </form>
        </div>
    </div>

    


</div>

<!-- FOOTER -->
<?php require 'footer.php'?>