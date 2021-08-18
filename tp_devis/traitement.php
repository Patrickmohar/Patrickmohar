<?php

$plume = 2.95;
$bille = 0.90;
$papier = 0.50;
$gomme = 0.35;
$TotalHT = $plume * $_POST['plume'] + $bille * $_POST['bille'] + $papier * $_POST['papier'] + $gomme * $_POST['gomme'];
$TVA = $TotalHT * .10;
$TTC = $TotalHT + $TVA;






?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TP Devis</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/style.css">


</head>

<body>
    <form action="traitement.php" method="post">
        <fieldset>
            <div class='wrapper'>

                <div class="adresse">
                    <h1>Mon Entreprise</h1>

                    <p>12 Rue des Stylos <br>16000 Angoulême</p>

                    <p>France</p>
                    <p> Tel : <strong>05 45 45 45 45</strong> <br>Fax : <strong>05 45 46 47 48</strong></p>
                    <p>Mail :<strong> legrossistelibrairie@stylo.fr</strong></p>
                    <p>Numéro de SIRET:<strong> 123 456 789 12132</strong></p>
                </div>
                <div class="le">
                    <div class="image">
                        <img src="img/logo.png" alt="" height="220" width="220">
                    </div>
                    <form action="traitement.php" method="post">
                        <div class='ligne'>
                            <div class='info_client'>
                                <strong>
                                    <p>Code Client</p><?php echo $_POST['client']; ?>
                                </strong>
                            </div>
                            <div class='info_client'>
                                <strong><?php echo $_POST['nom']; ?>
                            </div></strong>
                            <div class='info_client'>
                                <?php echo $_POST['adresse']; ?>
                            </div>
                            <div class='info_client'>
                                <?php echo $_POST['cp']; ?>
                            </div>
                            <div class='info _client'>
                                <?php echo $_POST['ville']; ?>
                            </div>
                            <div class='info _client'>
                                <?php echo $_POST['mail']; ?>
                            </div>
                            <div class='info _client'>
                                <?php echo $_POST['formjur']; ?>
                            </div>
                            <div class='info _client'>
                                <?php echo $_POST['siret']; ?>
                            </div>



                            <p>Numéros de Devis :
                                <strong><?php echo (rand(1000, 2000)); ?>
                            </p></strong>

                            <label for="date">Date D’émmision: <?php echo date('d/m/Y'); ?>


                        </div>
                    </form>
                </div>
        </fieldset>

        <table>
            <div class="designation">
                <h2 class="devis">Devis</h2>
                <th>Désignation</th>
                <th>Prix Unitaire</th>
                <th>Quantité</th>
                <th>Montant HT</th>
                <tr>

                    <td>Stylo plumes </td>
                    <td>2.95€</td>
                    <td> <?php echo $_POST['plume']; ?></td>
                    <td><?php echo $plume = 2.95 * $_POST['plume']; ?></td>



                <tr>
                    <td>Stylo Bille</td>
                    <td>0.90</td>
                    <td>
                        <?php echo $_POST['bille']; ?>
                    </td>
                    <td><?php echo $bille = .90 * $_POST['bille']; ?></td>

                </tr>

                <tr>
                    <td>Crayon Papier</td>
                    <td>0.50€</td>
                    <td> <?php echo $_POST['papier']; ?></td>
                    <td><?php echo $papier = .50 * $_POST['papier']; ?></td>

                </tr>

                <tr>
                    <td>Gomme</td>
                    <td>0.35</td>
                    <td> <?php echo $_POST['gomme']; ?></td>
                    <td><?php echo $gomme = .35 * $_POST['gomme']; ?></td>
                </tr>
            </div>

        </table>

        <table class="tab2">
            <tr>
                <th>Total HT</th>
                <td><?php echo $plume + $bille + $papier + $gomme; ?></td>
            </tr>
            <tr>
                <th>Tva :</th>
                <td><?php echo $TotalHT * 0.10; ?></td>
            </tr>
            <tr>
                <th>TTC :</th>
                <td><?php echo $TotalHT + $TVA; ?></td>
            </tr>
        </table>
    </form>
    <footer>
        <p><strong>Fait à Angoulême le : <?php echo date('d/m/Y'); ?></strong>

        </p>

        <p>Signature du client , suivie de la mention manuscrite <strong>“bon pour accord”</strong>.</p><br><br><br>
    </footer>
</body>

</html>