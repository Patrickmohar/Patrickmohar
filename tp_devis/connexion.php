<?php
session_start();

require 'tools.php';


/*Etape 1 on créer un formulaire de connexion
* Etape 2 Connexion à bdd et créeation de l'objet  PDO $bdd
* Etape 3 on hash le MDP
* Etape 4 on créer la fonction retourneMDP et on l'associe a la bdd
* Etape 5 on test la requete que phpmyadmin
* Etape 6 On associe notre variable bdd à notre variable sql 
* Etape 7 on execute sous forme d'un tableaux avec notre variable login
* Etape 8 on determine notre variable ligne pour quelle retourne une colonne depuis 
la ligne mdp
* Etape 9 on ferme notre requete
* Etape 10 on retourne la variable ligne*/

try {
    $options = [
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
        PDO::ATTR_ERRMODE =>  PDO::ERRMODE_EXCEPTION
    ];
    $bdd = new PDO('mysql:host=localhost;dbname=devis', 'root', '', $options);
} catch (Exception $e) {

    die('Erreur : ' . $e->getMessage());
}

function retourneMDP($bdd, $login)
{

    $sql = 'SELECT mdp FROM utilisateurs WHERE login = ?';
    $q = $bdd->prepare($sql);
    $q->execute(array(
        $login
    ));

    $line = $q->fetchColumn();
    $q->closeCursor();

    return $line;
}

/* Si la variable post login , post mdp est déclarée et qu'elle 
est pas vide on envois un msg disant de remplir correctement le formulaire
Sinon le mdp recuperer de la bdd est identique au post login , on verifie si post mdp = a mdp
& session login = post login
alors on redirige vers index.php

Sinon on envois un message " Login ou MDP incorrecte
*/
if (isset($_GET['deconnecter'])) unset($_SESSION['login']);
if (isset($_POST['login'], $_POST['mdp'])) {
    if (empty($_POST['login'] or empty($_POST['mdp']))) {
        $_SESSION['msg'] = 'Veuillez remplir correctement les champs ! ';
    } else {
        $mdp = retourneMDP($bdd, $_POST['login']);
        if (password_verify($_POST['mdp'], $mdp)) {
            $_SESSION['login'] = $_POST['login'];
            header('Location: index.php');
        } else {
            $_SESSION['msg'] = 'Login ou Mot de passe incorrecte ! ';
        }
    }
}





?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion tp_devis</title>
</head>

<body>
    <h1>DEVIS</h1>


    <fieldset>
        <form action="" method="post">
            <?php if (isset($_SESSION['msg'])) afficheMsg(); ?>
            <h2>Se connecter</h2>
            <div class="field">
                <label for="login">Login : </label>
                <input type="text" name="login" id="login">
            </div>
            <div class="field">
                <label for="mdp">Mot de passe : </label>
                <input type="password" name="mdp" id="mdp">


            </div>
            <div class="field">
                <input type="submit" value="Se connecter">
            </div>


        </form>




    </fieldset>

</body>

</html>