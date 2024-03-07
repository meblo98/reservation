
<!DOCTYPE html>
<html lang="fr">
<head>
  <link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
</head>
<body>

<?php require_once "nav.php" ?>
   
    <?php

    
 require_once "config.php";

if (isset($_POST["id"]) && !empty($_POST["id"])){

$id = $_POST["id"];
$prix = trim($_POST["prix"]);
$classe = trim($_POST["classe"]);
$vol = trim($_POST["id_vol"]);
  //requéte SQL

    $sql = "UPDATE billet SET prix=?, classe=?, id_vol=? WHERE id_bilet=?";

  // Exécuter la requête sur la base de données
    if($stmt = mysqli_prepare($connexion, $query)){
        mysqli_stmt_bind_param($stmt, "sssi", $param_prix, $param_classe,$param_vol ,$param_id);
            
            // Set parameters

            $param_prix = $titre;
            $param_classe = $categorie;
            $param_vol = $description;
            $param_id = $id;
            if(mysqli_stmt_execute($stmt)){
                // Records updated successfully. Redirect to landing page
                header("location: index.php");
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }    
    }
    mysqli_stmt_close($stmt);
    
    // Close connection
    mysqli_close($connexion);
}else{
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
        // Get URL parameter
        $id =  trim($_GET["id"]);
        
        // Prepare a select statement
        $sql = "SELECT * FROM billet WHERE id_bilet = ?";
        if($stmt = mysqli_prepare($connexion, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "i", $param_id);
            
            // Set parameters
            $param_id = $id;
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);
    
                if(mysqli_num_rows($result) == 1){
                    /* Fetch result row as an associative array. Since the result set
                    contains only one row, we don't need to use while loop */
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    
                    // Retrieve individual field value
                    
                    $prix = $row["prix"];
                    $vol = $row["id_vol"];
                    $classe = $row["classe"];
                    
                } else{
                    // URL doesn't contain valid id. Redirect to error page
                    header("location: error.php");
                    exit();
                }
                
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
        
        // Close connection
        mysqli_close($connexion);
    }  else{
        // URL doesn't contain id parameter. Redirect to error page
        header("location: error.php");
        exit();
    }
}

?>
    <div class="container">
        <form class="form" method="post">
            
            <p class="title">modifier un billet </p>
            <p class="message"> </p><br>

            <label>
                <!-- <input class="input" type="text" placeholder="" required=""> -->
                <span><i class="fa-solid fa-plane"></i> Numero Vol</span>
                <select name="vol" class="input" value="<?php echo $vol; ?>"  id="categorie">
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
            <label>
                <input class="input" name="classe" value="<?php echo $classe; ?>" type="text" placeholder="" required="">
                <span><i class="fa-solid fa-chair"></i> Classe</span>
            </label> 
            <label>
                <input class="input" name="prix" type="number" value="<?php echo $prix; ?>" placeholder="" required="">
                <span>Prix</span>
            </label>

            <button class="submit">modifier</button>
            <p class="signin"><a href="index.php">Annuler</a> </p>
        </form>
        
        <div class="photo">
            <img src="images/1.png" alt="image" >
        </div>
    </div>



</body>
</html>