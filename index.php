
<!DOCTYPE html>
<html lang="fr">
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
</head>
<body>

    <?php require_once "nav.php" ?>
    
    <div class="billet-list">
        <?php

        require_once "config.php";
        // Récupérer et afficher les idées
        $sql = "SELECT * FROM billet ";
        $result = $connexion->query($sql);
        while ($row = $result->fetch_assoc()) {
            echo "<div class='billet'>";
            echo "<h2>{$row['numero_billet']}</h2>";
            // echo "<p>Catégorie: {$row['category']}</p>";
            echo '<a href="voir_billet.php?id='. $row['id_bilet'] .'" class="btn btn-primary" title="View Record" data-toggle="tooltip"><span class="fa fa-eye"></span></a>';
            echo "</div>";
            //echo"<div class='body'>";
//     echo"<div class='swiper-container'>";
//   echo"<div class='swiper-wrapper'>";
//     echo "<div class='slider-item swiper-slide'>";
//       echo "<div class='slider-image-wrapper'>";
//         echo "<img class='slider-image' src='images/billet.png' alt='SliderImg'>";
//       echo "</div>";
//       echo "<div class='slider-item-content'>";
//         echo "<h1>{$row['numero_billet']}</h1>";
//         echo "<p>Discover the breathtaking landscapes, rich history, and delectable cuisine of Italy in this mesmerizing journey.</p>";
//       echo "</div>";
//     echo "</div>  ";
//   echo "</div>";
//   echo "<div class='slider-buttons'>";
//     echo "<button class='swiper-button-prev'>Prev</button>";
//     echo "<button class='swiper-button-next'>Next</button>";
//   echo "</div>";
// ;
//   echo "<div class='swiper-pagination'></div>";
//   echo "</div>";
// echo "</div>";

        }

        ?>

    
     <script src="script.js"></script>



</body>
</html>