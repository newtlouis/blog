
<?php

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

?>

