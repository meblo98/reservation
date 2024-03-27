
<!DOCTYPE html>
<html lang="fr">

<body>
    
<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once "nav.php";
 require_once "config.php";
//if (isset($_REQUEST['prix'], $_REQUEST['classe'], $_REQUEST['numero_billet'])){
  // récupérer les données saissi par l'utilisateur et supprimer les antislashes ajoutés par le formulaire
  if (isset($_POST['envoyer'])) {
  $prix = $_POST['prix'];
  $id_vol = $_POST['id_vol'];
  //$prix = mysqli_real_escape_string($conn, $prix); 
  $classe = $_POST['classe'];
  $numero_billet = $_POST['numero_billet'];
 // $numero_billet = mysqli_real_escape_string($connexion, $numero_billet);

  //requéte SQL
    $query = "INSERT into `billet` (numero_billet, prix, classe, id_vol)
              VALUES ('$numero_billet','$prix', '$classe', '$id_vol ')";
  // Exécuter la requête sur la base de données
    $res = mysqli_query($connexion, $query);
    if($res){
       header("Location: index.php");
    }
}else{
?>

        <div class="container">
        <form class="form" method="post">
            
            <p class="title">Ajouter un billet </p>
            <p class="message">Reserve maintenant pour profiter du meilleur des voyages </p><br>
            <label>
                <span><i class="fa-solid fa-plane"></i> Client</span>
                <select name="id_vol" class="input"  id="categorie">
            <?php
                              // Connexion à la base de données
                require_once "config.php";
                          
                              // Récupération des données
                $sql_client = "SELECT * FROM client";
                $result = $connexion->query($sql_client);
                if ($result->num_rows > 0) {
                     while ($row_client = $result->fetch_assoc()) {
                        echo "<option value='" . $row_client["id_client"] . "'>" . $row_client["nom"]. " ".$row_client["prenom"] . "</option>";
                    }
                } else {
                     echo "<option value=''>Aucun client trouvé</option>";
                 }

                 $connexion->close();
           
    echo '  </select>
            </label> 
            <label>
                <span><i class="fa-solid fa-plane"></i> Numero Vol</span>
                <select name="id_vol" class="input"  id="categorie">';
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
            <label>
                <input class="input" name="classe" type="text" placeholder="" required="">
                <span><i class="fa-solid fa-chair"></i> Classe</span>
            </label> 
            <label>
                <input class="input" name="prix" type="number" placeholder="" required="">
                <span><i class="fa-solid fa-money-bill"></i> Prix</span>
            </label>
            <label>
                <input class="input" id="numero_billet" name="numero_billet" type="hidden"  <?php
                $numero_billet = rand(100000, 999999);
                echo "value='$numero_billet'";
                ?>placeholder="" required="">
                <!-- <span><i class="fa-solid fa-list-ol"></i> Numero Billet</span> -->
            </label>
            <button class="submit" name="envoyer">Ajouter</button>
            <p class="signin"><a href="index.php">Annuler</a> </p>
        </form>

        <?php } 
        
        ?>

<div class="photo">
            <img src="images/1.png" alt="image" >
        </div>

        </div>


</body>
</html>