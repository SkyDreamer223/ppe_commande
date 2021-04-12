<?php
    require_once('./src/Produit.php');
    session_start();
    $commande = $_SESSION['commande'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Order Report</title>
</head>
<body>
    <main>
        <section>
            <h2>Votre Commande du <?=$_SESSION['time']?></h2>
            <h3>Détail de votre commande:</h3>
            <p>Nombre de produits: <?= $commande->getNbProduits();?></p>
            <ul>

                <li><?=$commande->getTablettes()?> : Tablettes</li>
                <li><?=$commande->getPc()?> : PC</li>
                <li><?=$commande->getPortable()?> : Portables</li>
            </ul>
            <p>Le total de votre commande est de : <?=$commande->getPrix()?>€ (<?=$commande->getPrixHT()?>€ HT)</p>
            <p>Adresse : <i><?=$commande->getAdresse()?></i></p>
        </section>
    </main>
</body>
</html>