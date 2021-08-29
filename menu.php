
<?php
if (!function_exists('nav_item')){
    function nav_item (string $link, string $titre): string
    {
    $class = 'nav-link';
    if($_SERVER['SCRIPT_NAME'] === $link){
        $class = $class . ' active';
    }
    return <<<HTML
        <li class="nav_item">
        <a class="$class" href="$link">$titre</a>
        </li>;
HTML;
    // ALTERNATIVE FONCTION CLASS ACTIVE
    // return '<li class="nav_item">
    //           <a class="' . $class . '" href="'.$link.'"> ' . $titre . '</a>
    //         </li>';
    }
}
?>

<?= nav_item('/index.php','Accueil'); ?>
<?= nav_item('/contact.php', 'Contact'); ?>