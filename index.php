
<!DOCTYPE html>
<html lang="fr">
<head>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="style_card1.css">
  <link rel="stylesheet" href="style.scss">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
</head>
<body>

    <?php require_once "nav.php" ?>

    <div class="container">
         
  <ul class="cards">
  <li>
    <a href="list_billet.php" class="card">
      <img src="images/billet.png" class="card__image" alt="" />
      <div class="card__overlay">
        <div class="card__header">
          <svg class="card__arc" xmlns="http://www.w3.org/2000/svg"><path /></svg>                     
          <img class="card__thumb" src="images/billet2.png" alt="" />
          <div class="card__header-text">
            <h3 class="card__title">Billet</h3>            
            <span class="card__status">Liste des billet</span>
          </div>
        </div>
        <p class="card__description">Pour la liste des billets veillez cliquer !</p>
      </div>
    </a>      
  </li>
  <li>
    <a href="list_client.php" class="card">
      <img src="images/travel.png" class="card__image" alt="" />
      <div class="card__overlay">        
        <div class="card__header">
          <svg class="card__arc" xmlns="http://www.w3.org/2000/svg"><path /></svg>                 
          <img class="card__thumb" src="images/client.png" alt="" />
          <div class="card__header-text">
            <h3 class="card__title">Client</h3>
            <span class="card__status">enregistrés</span>
          </div>
        </div>
        <p class="card__description">Pour la liste des clients veillez cliquer !</p>
      </div>
    </a>
  </li>
  <li>
    <a href="list_vol.php" class="card">
      <img src="images/travel3.png" class="card__image" alt="" />
      <div class="card__overlay">
        <div class="card__header">
          <svg class="card__arc" xmlns="http://www.w3.org/2000/svg"><path /></svg>                     
          <img class="card__thumb" src="images/vol1.png" alt="" />
          <div class="card__header-text">
            <h3 class="card__title">Vol</h3>
            <span class="card__tagline">Lorem ipsum dolor sit amet consectetur</span>            
            <span class="card__status">liste vol</span>
          </div>
        </div>
        <p class="card__description">Pour la liste des vols veillez cliquer !</p>
      </div>
    </a>
  </li>
  
</ul>


    </div>



    <?php require_once "footer.php" ?>
     <script src="script.js"></script>
</body>
</html>