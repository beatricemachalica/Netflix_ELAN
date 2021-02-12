<!-- Etape 3 -->
<!-- On va vérifier si notre formulaire est soumis avec le bouton submit -->
<?php session_start();

if(isset($_POST['Submit'])){
    // Définir le username et le mot de passe associé pour 3 utilisateurs fictifs :
    $logins = array('test@test.fr'=>'test', 'truc@truc.fr'=>'truc', 'bidule@bidule.fr'=>'bidule');

    // je vérifie et j'assigne le username et mdp soumis à une variable :
    
    $username = isset($_POST['Email'])? $_POST['Email'] : '';
    $password = isset($_POST['Password'])? $_POST['Password'] : '';

    // on va vérifier si le username et le password existent dans mon tableau d'utilisateurs fictifs :
        
        if(isset($logins[$username]) && $logins[$username] == $password){
            
            // on lui set les variables en session et on le redirige vers une autre page
            $_SESSION['User'] = $logins[$username];

            header('location:index.php');
            exit;
        
            // si la vérification a échouée else et on set un message d'erreur 
            } else {
                $message = "<span style='color:red'>Identifiants invalides </span>";
        }
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
<?php include('src/header.php'); ?>

<section>
    <div id="login-body">

        <h1>Connextez vous</h1>

        <!-- l'attribut "action" va permettre de définir l'emplacement URL où seront envoyé les données récoltées par le formulaire -->
        <!-- l'attribut "method" va définir la méthode HTTP utilisée pour envoyer les données du formulaire -->
        <!-- On retrouve GET (lecture simple et qui va se retrouver dans l'URL) ou POST (vers le serveur et recommandé par W3C) -->

        <form action="login.php" method="POST" name="Login_form">

        <?php if(isset($message)){ ?>
        <p> <?php echo $message; ?> </p>
        <?php } ?>

            <table class="">
                <tr>
                    <td>Email</td>
                    <td><input type="email" class="Input" name="Email"></td>
                </tr>
                <tr>
                    <td>Mot de passe</td>
                    <td><input type="password" class="Input" name="Password"></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td><input type="submit" class="button" name="Submit" valeur="Login"></td>
                </tr>
            </table>
            <label id="option"><input type="checkbox" name="auto" checked>Se souvenir de moi</label>
        </form>

    </div>
</section>


<?php include('src/footer.php'); ?>
</body>
</html>