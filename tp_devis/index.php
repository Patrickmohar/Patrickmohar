<?php
session_start();






try {
    $options = [
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
        PDO::ATTR_ERRMODE =>  PDO::ERRMODE_EXCEPTION
    ];
    $bdd = new PDO('mysql:host=localhost;dbname=devis', 'root', '', $options);
} catch (Exception $e) {

    die('Erreur : ' . $e->getMessage());
}

?>





<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pré-devis</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <header>
        <div class='wrapper'>
            <div class="adresse">
                <h1>Mon Entreprise</h1>

                <p>12 Rue des Stylos <br>16000 Angoulême</p>

                <p>France</p>
                <p> Tel :<strong> 05 45 45 45 45 </strong><br>Fax :<strong> 05 45 46 47 48</strong></p>
                <p>Mail :<strong> legrossistelibrairie@stylo.fr</strong></p>
                <p>Numéro de SIRET:<strong> 123 456 789 12132</strong></p>
            </div>

            <div class="image">
                <img src="logo.png" alt="" height="220" width="220">
            </div>
            <a href="connexion.php?deconnecter" class="deconnexion"><img class="btn_deco" src="img/se-deconnecter.png" alt="" height="50" weight="50"></a>
        </div>

    </header>

    <main>

        <div class="autre"><span class="bd">N° du devis : <strong><?php echo (rand(1000, 2000)); ?></strong></p>
                <span class="data">Date :</span><?php echo date('d/m/Y'); ?>
        </div>
        <p class="create_devis"><strong>Réaliser un devis</strong></p>

        <h2>Informations Clients</h2>
        <fieldset>
            <form action="traitement.php" method="post">
                <div class='info'>
                    <label for="nom">Nom :
                        <input type="text" name="nom" id="nom" require placeholder="Nom" size="35"></label>
                </div>
                <div class='info'>
                    <label for="mail">Mail :
                        <input type="text" name="mail" id="mail" require placeholder="Mail" size="35"></label>
                </div>
                <div class='info'>
                    <label for="adresse">Adresse :
                        <input type="text" name="adresse" id="adresse" require placeholder="Adresse" size="35"></label>
                </div>
                <div class='info'>
                    <label for="cp">Code Postal :
                        <input type="text" name="cp" id="cp" require placeholder="Code Postal"></label>
                </div>
                <div class='info'>
                    <label for="ville">Ville :
                        <input type="text" name="ville" id="ville" require placeholder="Ville" size="35"></label>
                </div>
                <div class='info'>
                    <label for="client">Code Client :
                        <input type="text" name="client" id="client" require placeholder="Code Client" size="35"></label>
                </div>
                <div class='info'>
                    <label for="formjur">Forme Juridique :
                        <input type="text" name="formjur" id="formjur" require placeholder="Forme Juridique" size="35"></label>
                </div>
                <div class='info'>
                    <label for="siret">Numéro de SIRET :
                        <input type="text" name="siret" id="siret" require placeholder="Numéro de SIRET" size="35"></label>
                </div>
        </fieldset>

        <h3>Commandes</h3>
        <fieldset>


            <div class="articles">
                <div class="artc">
                    <label for="plume">Stylo Plume 2.95€/u:</label>
                    <input type="number" id="plume" name="plume" value="0" min="0" size="25">
                </div>

                <div class="artc">
                    <label for="bille">Stylo Bille 0.90€/u:</label>
                    <input type="number" id="bille" name="bille" value="0" min="0" size="25">
                </div>

                <div class="artc">

                    <label for="papier">Crayon à papier 0.50€/u:</label>
                    <input type="number" id="crayon" name="papier" value="0" min="0" size="25">
                </div>

                <div class="artc">
                    <label for="gomme">Gommes 0.35€/u: </label>
                    <input type="number" id="gommes" name="gomme" value="0" min="0" size="25">
                </div>




        </fieldset>

        <div>
            <input type="submit" class="bouton" value="Générer le devis" />
        </div>
        </form>
    </main>

</body>

</html>