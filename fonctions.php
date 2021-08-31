
<?php

// LOGIN
function est_connecte () : bool {
    if ( session_status === PHP_SESSION_NONE ){
        session_start();
    }
    return !empty($_SESSION['connecte']);
}

function force_connexion (): void {
    if( !est_connecte() ){
        header('Location : /login.php');
        exit();
    }
}

// HEADER
function nav_item (string $link, string $titre, string $linkClass = ''): string
 {
 $class = 'nav-link';
 if($_SERVER['SCRIPT_NAME'] === $link){
    $class = $class . ' active';
}
return <<<HTML
    <li class="$linkClass">
    <a class="$class" href="$link">$titre</a>
    </li>
HTML;
    // ALTERNATIVE FONCTION CLASS ACTIVE
    // return '<li class="nav_item">
    //           <a class="' . $class . '" href="'.$link.'"> ' . $titre . '</a>
    //         </li>';
}

function nav_menu ( string $linkClass = ''):string {
    return
        nav_item('/index.php','Accueil', $linkClass) .
        nav_item('/contact.php', 'Contact', $linkClass) .
        nav_item('/jeu.php', 'Jeu', $linkClass).
        nav_item('/newsletter.php', 'Newsletter', $linkClass).
        nav_item('/profil.php', 'Profil', $linkClass).
        nav_item('/autorisation.php', 'Autorisation', $linkClass).
        nav_item('/login.php', 'Login', $linkClass);

}



// PRIX DE LA GLACE

// insertion checkbox
function checkbox( string $name , string $value , array $data): string {
    $attribute = '';
    if (isset($_GET[$name]) && in_array($value , $data[$name])) {
        $attribute .= "checked";
    }
    return <<<HTML
        <input type="checkbox" name="{$name}[]" value="$value" $attribute>
        HTML;
}

// insertion radio
function radio( string $name , string $value , array $data): string {
    $attribute = '';
    if (isset($_GET[$name]) && $value === $data[$name]) {
        $attribute .= "checked";
    }
    return <<<HTML
        <input type="radio" name="$name" value="$value" $attribute>
        HTML;
};

// Creneaux page contact
function creneaux_html(array $creneaux): string{
    $phrases = [];
    if (empty($creneaux)){
        return 'Fermé';
    }
    else{
        foreach ($creneaux as $creneau){
            $phrases[] = "de <strong> $creneau[0]h</strong> à <strong>$creneau[1]h</strong>";
        }
        return 'Ouvert ' . implode(' et ' , $phrases);
    }
    
};
// Magasin ouvert ou fermé ?
function is_open(array $creneaux){
    $today = "";
    foreach(JOURS as $k => $jour){
        if((int)date('N') === ($k + 1)){
            $today = JOURS[$k];
        }
    }
    // return $creneaux[$today][0][0];
   
    if(((int)date('H')+2) > $creneaux[$today][0][0] && ((int)date('H')+2) < $creneaux[$today][0][1] || ((int)date('H')+2) > $creneaux[$today][1][0] && ((int)date('H')+2) < $creneaux[$today][1][1] ){
        return <<<HTML
        <div class="alert alert-success"> Le glacier est ouvert actuellement</div>
        HTML;
    }
    else{
        return <<<HTML
        <div class="alert alert-danger"> Le glacier est fermé actuellement</div>
        HTML;
    }      
};

// Ajouter vue
function ajouter_vue(): void{
    $fichier = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'blog' . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'compteur';
    $compteur = 1;
    if (file_exists($fichier)){
        $compteur = (int)file_get_contents($fichier);
        $compteur++;
    }
    file_put_contents($fichier , $compteur);
};

// Nombre vues
function nombre_vues(): string {
    $fichier = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'blog' . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'compteur';
    return file_get_contents($fichier);
}


// Affichage tableau
function dump(array $list){
    echo '<pre>';
    var_dump($list);
    echo '</pre>';
}

?>

