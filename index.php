<!-- Etape 1 -->
<!-- on commence une session -->
<!-- une session permet de stocker côté serveur d'une façon temporaire -->

<!-- Etape 2 -->
<!-- on va aussi utiliser une superglobale -->
<!-- une superglobale est une variable native de PHP et elles sont disponibles partout, il y'en a 9 en tout -->

<?php session_start();

if(!isset($_SESSION['User'])){
    // isset va vérifier si une variable est déclarée et est différentes de null retourne true/false
    header ('location:login.php');
    // ici si la session 'user' n'est pas (!) définie (isset) alors je renvoie vers login.php dans le header.
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Netflix sans BDD</title>
</head>
<body>
<?php include("SRC/header.php"); ?>


<section>
    <div id="login-body">
        Vous êtes connecté "<?php echo $_SESSION['User']; ?>" <a href="logout.php"><strong style ='color:red'>cliquez ici pour vous déconnecter</strong></a>
    </div>
</section>


<?php include("SRC/footer.php"); ?>
</body>
</html>