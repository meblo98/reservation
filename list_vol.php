<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style_card1.css">
</head>
<body>
     <?php require_once "nav.php" ?>

     <h1>Liste des vols</h1>
     <div class="billet-list">
  <?php

  require_once "config.php";
  $sql = "SELECT * FROM vol";
          $result = $connexion->query($sql);
          while ($row = $result->fetch_assoc()) {
              echo "<div class='billet'>";
              echo "<h2>Numero du vol : {$row['numero_vol']}</h2>";
              echo "<p>Compagnie : {$row['compagnie_aerienne']}</p><br/>";
              echo '<a href="lire_vol.php?id='. $row['id_vol'] .'" class="btn btn-primary" title="View Record" data-toggle="tooltip"><span class="fa fa-eye"></span></a>';
              echo "</div>";
          }
          ?>
      </div>
  

<?php require_once "footer.php" ?>
</body>
</html>