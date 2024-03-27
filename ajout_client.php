
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
  $prenom = $_POST['prenom'];
  $nom = $_POST['nom'];
  //$prix = mysqli_real_escape_string($conn, $prix); 
  $mail = $_POST['mail'];
  $telephone = $_POST['telephone'];
 // $numero_billet = mysqli_real_escape_string($connexion, $numero_billet);

  //requéte SQL
    $query = "INSERT into `client` (prenom, nom, telephone, adresse_email)
              VALUES ('$prenom','$nom', '$telephone', '$mail ')";
  // Exécuter la requête sur la base de données
    $res = mysqli_query($connexion, $query);
    if($res){
       header("Location: list_client.php");
    }
}else{
?>

        <div class="container">
        <form class="form" method="post">
            
            <p class="title">Ajouter un client </p>
            <p class="message">

            </p><br>

            </label> 
            <label>
                <input class="input" name="prenom" type="text" placeholder="" required="">
                <span><i class="fa-solid fa-chair"></i> prenom</span>
            </label> 
            <label>
                <input class="input" name="nom" type="text" placeholder="" required="">
                <span><i class="fa-solid fa-money-bill"></i> Nom</span>
            </label>
            <label>
                <input class="input" name="telephone" type="telephone" placeholder="" required="">
                <span><i class="fa-solid fa-money-bill"></i> telephone</span>
            </label>
            <label>
                <input class="input" name="mail" type="email" placeholder="" required="">
                <span><i class="fa-solid fa-money-bill"></i> Email</span>
            </label>

            <button class="submit" name="envoyer">Ajouter</button>
            <p class="signin"><a href="list_client.php">Annuler</a> </p>
        </form>

        <?php }  ?>
        

<div class="photo">
            <img src="images/1.png" alt="image" >
        </div>

        </div>


</body>
</html>