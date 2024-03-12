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
    <h1>Liste des billets</h1>
    </div>
     <div class="billet-list">
  <?php

  require_once "config.php";
  $sql = "SELECT vol.*, billet.*
  FROM vol
  INNER JOIN billet ON vol.id_vol = billet.id_vol";
          $result = $connexion->query($sql);
          while ($row = $result->fetch_assoc()) {
              echo "<div class='billet'>";
              echo "<h2>Numero du billet: {$row['numero_billet']}</h2>";
              echo "<p>Destination: {$row['destination']}</p><br/>";
              echo '<a href="lire_billet.php?id='. $row['id_bilet'] .'" class="btn btn-primary" title="View Record" data-toggle="tooltip"><span class="fa fa-eye"></span></a>';
              echo "</div>";
          }
          ?>
      </div>
  

    <?php require_once "footer.php" ?>
</body>
</html>