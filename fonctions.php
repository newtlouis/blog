
<?php

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
        nav_item('/jeu.php', 'Jeu', $linkClass);
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
}

// Calcul du prix de la glace


?>

