
<!DOCTYPE html>
<html lang="fr">

<body>

<?php require_once "nav.php" ?>
    <div class="container">
    <?php

    
 require_once "config.php";
 session_start();
if (isset($_REQUEST['numero_billet'], $_REQUEST['prix'], $_REQUEST['classe'], $_REQUEST['vol'])){
  // récupérer les données saissi par l'utilisateur et supprimer les antislashes ajoutés par le formulaire
  $numero_billet = stripslashes($_REQUEST['numero_billet']);
  $numero_billet = mysqli_real_escape_string($connexion, $numero_billet); 
  $prix = stripslashes($_REQUEST['prix']);
  $classe = stripslashes($_REQUEST['classe']);
  $classe = mysqli_real_escape_string($connexion, $classe);
  $vol = stripslashes($_REQUEST['vol']);

  //requéte SQL
    $query = "INSERT into `billet` (numero_billet, prix, classe, id_vol)
              VALUES ('$numero_billet','$prix', '$classe', '$vol ')";
  // Exécuter la requête sur la base de données
    $res = mysqli_query($connexion, $query);
    if($res){
        header("Location: index.php");
    }
}else{
?>
        <form class="form" method="post">
            
            <p class="title">Ajouter un billet </p>
            <p class="message">Reserve maintenant pour profiter du meilleur des voyages </p><br>

            <label>
                <!-- <input class="input" type="text" placeholder="" required=""> -->
                <span><i class="fa-solid fa-plane"></i> Numero Vol</span>
                <select name="vol" class="input"  id="categorie">
            <?php
                              // Connexion à la base de données
                require_once "config.php";
                          
                              // Récupération des données
                $sql = "SELECT * FROM vol";
                $result = $connexion->query($sql);
                if ($result->num_rows > 0) {
                     while ($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row["id_vol"] . "'>" . $row["numero_vol"] . "</option>";
                    }
                } else {
                     echo "<option value=''>Aucun vol trouvé</option>";
                 }

                 $connexion->close();
            ?>
      </select>
            </label> 
            <!-- <label>
                <input class="input" name="date" type="date" placeholder="" required="">
                <span><i class="fa-solid fa-calendar"></i> Date Reservation</span>
            </label>  -->
            <label>
                <input class="input" name="classe" type="text" placeholder="" required="">
                <span><i class="fa-solid fa-chair"></i> Classe</span>
            </label> 
            <label>
                <input class="input" name="prix" type="number" placeholder="" required="">
                <span>Prix</span>
            </label>
            <label>
                <input class="input" id="numero_billet" name="numero_billet" type="text" disabled <?php
                $numero_billet = rand(100000, 999999);
                echo "value='$numero_billet'";
                ?>placeholder="" required="">
                <span>Numero</span>
            </label>
            <button class="submit">Ajouter</button>
            <p class="signin"><a href="index.php">Annuler</a> </p>
        </form>
        <?php } ?>
        <div class="photo">
            <img src="images/1.png" alt="image" >
        </div>
    </div>



</body>
</html>