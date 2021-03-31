<?php
  
  include_once('./src/Produit.php');
  session_start();
  
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Technos Prod</title>
  <link rel="stylesheet" href="./css/style.css">
</head>
<body>
<?php

  $produitLimite = "entre 0 et 10 unités maximum";
  $adresseVide = $panierVide = $adresse = $limiteTablettes = $limitePc = $limitePortable = "";
  $pc = $tablettes = $portable = 0;



  if(isset($_POST['tablettes'], $_POST['pc'], $_POST['portable'], $_POST['adresse'])) {
    $tablettes = $_POST['tablettes'];
    $pc = $_POST['pc'];
    $portable = $_POST['portable'];
    $adresse = $_POST['adresse'];
    $adresseVide = testAdresse($adresse) ? "" : "Insérer une adresse";

    if(validerPanier($tablettes, $pc, $portable) && testAdresse($adresse)){
      $commande = new Produit($tablettes, $pc, $portable, $adresse);
      $_SESSION['commande'] = $commande;
      $_SESSION['time'] = date('d/m/Y, H:i');
      header('Location: validation_commande.php');
    }

  }
  function testProduit($produit){
    return (0 <= $produit && $produit <= 10);
  }
  function testAdresse($adresse){
    return $adresse !== "";
  }
  function validerPanier($tablettes, $pc, $portable){
    $checkPanierVide = ($tablettes+$pc+$portable)!=0;
    $checkLimite = testProduit($tablettes) && testProduit($pc) && testProduit($portable);
    return $checkLimite && $checkPanierVide;
  }

?>
  <header>
    <h1>Technos Prod</h1>
    <h2>Formulaire de commande</h2>
  </header>
<main>
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
    <table>
      <thead>
        <tr>
          <th>Produits</th>
          <th>Quantité</th>
        </tr>
      </thead>
      <tr>
        <td><label for="tablettes">Tablettes</label></td>
        <td>
          <input type="number" name="tablettes" id="tablettes" value="<?php echo $tablettes;?>" autofocus autocomplete="off">
          <span class="error"><?php if(!testProduit($tablettes)){echo $produitLimite;}?></span>
        </td>
      </tr>
      <tr>
        <td><label for="pc">Pc</label></td>
        <td>
          <input type="number" name="pc"  id="pc" value="<?php echo $pc;?>" autocomplete="off">
          <span class="error"><?php if(!testProduit($pc)){echo $produitLimite;}?></span>
        </td>
      </tr>
      <tr>
        <td><label for="portable">Portable</label></td>
        <td>
          <input type="number" name="portable" id="portable" value="<?php echo $portable;?>" autocomplete="off">
          <span class="error"><?php if(!testProduit($portable)){echo $produitLimite;}?></span>
        </td>
      </tr>
      <tr>
        <td><label for="adresse">Adresse</label></td>
        <td>
          <input type="text" name="adresse" id="adresse" value="<?php echo $adresse;?>">
          <span class="error"><?php echo $adresseVide; ?></span>
        </td>
      </tr>
      <tfoot>
        <tr>
          <td colspan=2><input type=submit name="submit" value="Envoyer la commande"></td>
        </tr>
    </tfoot>
    </table>
  </form> 
</main>

</body>
</html>

