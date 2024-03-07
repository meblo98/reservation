<?php
require_once "config.php";
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (isset($_POST["id"]) && !empty($_POST["id"])) {
    // Get hidden input value
    $id = $_POST["id"];
    $classe = trim($_POST["classe"]);
    $prix = trim($_POST["prix"]);

    // Supposons que votre table a les colonnes id_bilet (entier), prix (chaîne), classe (chaîne), id_vol (entier)
    $sql = "UPDATE billet SET prix=?, classe=? WHERE id_bilet=?";
    if ($stmt = mysqli_prepare($connexion, $sql)) {
        mysqli_stmt_bind_param($stmt, "ssi", $param_prix, $param_classe, $param_id);
    
        // Définir les paramètres
        $param_prix = $prix;
        $param_classe = $classe;
        $param_id = $id;

        if (mysqli_stmt_execute($stmt)) {
            // Rediriger vers la page d'accueil après la mise à jour
            header("location: index.php");
            exit();
        } else {
            echo "Oops! Something went wrong. Please try again later.";
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }

    // Close connection
    mysqli_close($connexion);
} else {
    // Check existence of id parameter before processing further
    if (isset($_GET["id"]) && !empty(trim($_GET["id"]))) {
        // Get URL parameter
        $id = trim($_GET["id"]);

        // Prepare a select statement
        $sql = "SELECT * FROM billet WHERE id_bilet = ?";
        if ($stmt = mysqli_prepare($connexion, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "i", $param_id);
            // Set parameters
            $param_id = $id;

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                $result = mysqli_stmt_get_result($stmt);

                if (mysqli_num_rows($result) == 1) {
                    /* Fetch result row as an associative array. Since the result set
                    contains only one row, we don't need to use a while loop */
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

                    // Retrieve individual field value
                    $classe = $row["classe"];
                    $prix = $row["prix"];
                    
                } else {
                    // URL doesn't contain a valid id. Redirect to error page
                    header("location: error.php");
                    exit();
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);

        // Close connection
        mysqli_close($connexion);
    } else {
        // URL doesn't contain an id parameter. Redirect to error page
        header("location: error.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
</head>
<body>
<?php require_once "nav.php";
?>
    <div class="container">
        <form class="form" method="post">
            <p class="title">modifier un billet </p>
            <p class="message"> </p><br>
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