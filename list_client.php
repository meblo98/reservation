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

    <div class="container">
    <div class="billet-list">
     <h1 class="titre>Clients</h1>
    <a class="btn btn-primary" href="ajout_client.php">Ajouter</a>
  <?php

  require_once "config.php";
  $sql = "SELECT * FROM client";
          $result = $connexion->query($sql);
          while ($row = $result->fetch_assoc()) {
              echo "<div class='billet'>";
              echo "<h2>{$row['prenom']} {$row['nom']}</h2>";
              echo '<a href="lire_client.php?id='. $row['id_client'] .'" class="btn btn-primary" title="View Record" data-toggle="tooltip"><span class="fa fa-eye"></span></a>';
              echo "</div>";
          }
          ?>
    </div>
  
    </div>


<?php require_once "footer.php" ?>
</body>
</html>