
<!DOCTYPE html>
<html lang="fr">
<head>
  <link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
</head>
<body>

    <?php require_once "nav.php" ?>
    
    <div class="billet-list">
        <?php

        require_once "config.php";
        // Récupérer et afficher les idées
        // $sql = "SELECT * FROM billet ";
        $sql = "SELECT vol.*, billet.*
        FROM vol
        INNER JOIN billet ON vol.id_vol = billet.id_vol";
        $result = $connexion->query($sql);
        while ($row = $result->fetch_assoc()) {
            echo'<div class="flip-card">';
              echo'<div class="flip-card-inner">';
                  echo'<div class="flip-card-front">';
                      echo'<p class="title">Billet numero</p><br/><br/>';
                      echo "<h2>{$row['numero_billet']}</h2>";
                  echo'</div>';
                  echo'<div class="flip-card-back">';
                      //echo'<p class="title">Billet numero {$row["numero_billet"]}</p><br/><br/>';
                      echo "<h2>Billet numero: {$row["numero_billet"]}</h2>";
                      echo "<h2>Vol numero: {$row["numero_vol"]}</h2>";
                      echo "<h2>Compagnie: {$row["compagnie_aerienne"]}</h2>";
                      echo "<h2>Prix: {$row['prix']}</h2>";
                      echo "<h2>Origine: {$row['lieu_depart']}</h2>";
                      echo "<h2>Destination: {$row['destination']}</h2>";
                      echo "<h2>Classe: {$row['classe']}</h2><br/>";
                      echo '<button class="cssbuttons-io">
                      <a href="modif_billet.php?id='. $row['id_bilet'] .'"><span class="fa fa-pencil"></span>modifier</a>
                      </button><br/>';
                        echo '<button class="cssbuttons-io">
                        <a href="sup_billet.php?id='. $row['id_bilet'] .'"><span class="fa fa-trash"></span>Supprimer</a>
                      </button>';
                      echo'</div>';
                echo'</div>';
          echo'</div>';
        }

        ?>

    </div>
     <script src="script.js"></script>



</body>
</html>