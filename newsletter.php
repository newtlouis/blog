
<!-- LOGIQUE -->
<?php 
$nav = "newsletter";
$title = "newsletter";
require 'header.php'; 

$error = null;
$success = null;
$email = null;
// Verification email
if (!empty($_POST['email'])){
    $email = $_POST['email'];
    if (filter_var($email , FILTER_VALIDATE_EMAIL)){
        $file = __DIR__ . DIRECTORY_SEPARATOR . 'emails' . DIRECTORY_SEPARATOR . date('Y-m-d');
        file_put_contents($file , $email . PHP_EOL , FILE_APPEND);
        $success = "Félicitation vous venez de vous inscrire à la newsletter du glacier !";

    } else{
        $error = "Le format de l'email n'est pas valide";
    }
}
?>

<!-- Begin page content -->
<main class="flex-shrink-0">
  <div class="container">
    <h1 class="mt-5">Newsletter</h1>
    <p class="lead">Inscrivez vous à notre newletter pour être au courant des toutes dernières glaces maisons disponible dans votre glacier préféré !</p>
    
    <?php if ($error): ?>
        <div class="alert alert-danger">
            <?= $error ?>
        </div>
    <?php endif ?>

    <?php if ($success): ?>
        <div class="alert alert-success">
            <?= $success ?>
        </div>
    <?php endif ?>
    
    <form action="/newsletter.php" method="post" class="form-inline">
        <input type="email" name="email" placeholder="Entrer votre email" required class="form-control"?>
        <button type="submit" class="btn btn-primary">S'inscrire</button>
    </form>
  </div>
</main>

<?php require 'footer.php'; ?>
